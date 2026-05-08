<?php

namespace App\Http\Controllers;

use App\Models\BillingAddress;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyPackageController extends Controller
{
    /**
     * Ensure package is in cart and return cart id.
     */
    private function ensurePackageInCart(): array
    {
        $package = getPackageSettings();
        $cartId = 'package_upgrade';
        $attrs = [
            'product_type' => 'package_upgrade',
            'product_id' => 0,
            'package_employees' => $package['employees'],
            'package_clients' => $package['clients'],
        ];
        if (!Cart::get($cartId)) {
            Cart::add([
                'id' => $cartId,
                'name' => $package['name'],
                'price' => $package['amount'],
                'quantity' => 1,
                'attributes' => $attrs,
            ]);
        } else {
            Cart::update($cartId, [
                'name' => $package['name'],
                'price' => $package['amount'],
                'quantity' => 1,
                'attributes' => $attrs,
            ]);
        }
        return $package;
    }

    /**
     * Show the package upgrade page in the dashboard. Ensures package is in cart and shows upgrade option.
     */
    public function packageUpgrade()
    {
        $package = $this->ensurePackageInCart();
        $billing_addresses = collect();
        if (Auth::check()) {
            $query = BillingAddress::where('customer_id', Auth::id())->where('status', 1);
            if (\Illuminate\Support\Facades\Schema::hasColumn('billing_addresses', 'is_company_profile')) {
                $query->orderByRaw('COALESCE(is_company_profile, 0) DESC');
            }
            $billing_addresses = $query->get();
        }
        $page_title = 'Upgrade Package';
        return view('company.package-upgrade', compact('package', 'page_title', 'billing_addresses'));
    }

    /**
     * Start PayPal flow for package upgrade: total = package amount only, no delivery. Redirect to PayPal; on return go to dashboard.
     */
    public function initPayPal(Request $request)
    {
        $request->validate(['billing_address_id' => 'required|exists:billing_addresses,id']);
        $package = $this->ensurePackageInCart();
        $amount = (float) $package['amount'];
        $cartItems = [];
        foreach (Cart::getContent() as $item) {
            $cartItems[] = [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'attributes' => $item->attributes->toArray(),
            ];
        }
        session([
            'paypal_checkout' => [
                'amount' => round($amount, 2),
                'tax_amount' => 0,
                'discount' => null,
                'billing_address_id' => $request->billing_address_id,
                'guest' => [],
                'cart_items' => $cartItems,
            ],
            'order_success_redirect' => route('admin.company_employee.index'),
            'paypal_cancel_redirect' => route('company.package-upgrade'),
        ]);
        return redirect()->route('paypal.checkout');
    }

    /**
     * Charge package amount via Authorize.net (modal). Total = package amount only. No redirect to website.
     */
    public function charge(Request $request)
    {
        $request->validate([
            'billing_address_id' => 'required|exists:billing_addresses,id',
            'authorizenet_data_descriptor' => 'required|string',
            'authorizenet_data_value' => 'required|string',
        ]);
        $package = $this->ensurePackageInCart();
        $amount = (float) $package['amount'];
        $result = OrderController::chargeAuthorizeNetForAmount(
            $amount,
            $request->authorizenet_data_descriptor,
            $request->authorizenet_data_value
        );
        if (!$result['success']) {
            return redirect()->route('company.package-upgrade')->with('error', $result['error'] ?? 'Payment failed.');
        }
        $user = Auth::user();
        $order = new Order();
        $order->billing_address_id = $request->billing_address_id;
        $order->payment_id = $result['transaction_id'] ?? 'auth_' . uniqid();
        $order->order_number = mt_rand(100000, 999999);
        $order->customer_id = $user->id;
        $order->payment_status = 'paid';
        $order->order_status = 'Pending';
        $order->order_date = date('Y-m-d');
        $order->tax_amount = 0;
        $order->total_amount = $amount;
        $order->save();
        $cartItems = Cart::getContent();
        foreach ($cartItems as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_type' => $item->attributes->product_type ?? 'product',
                'product_id' => $item->attributes->product_id ?? 0,
                'product_slug' => $item->name,
                'category_id' => null,
                'sub_category_id' => null,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'message' => null,
                'variation_id' => null,
                'discount_type' => null,
                'discount_amount' => null,
                'tax' => null,
                'sub_total' => $item->price * $item->quantity,
                'order_status' => 'Succeeded',
                'order_date' => date('Y-m-d'),
            ]);
        }
        OrderController::applyPackageUpgradeFromItems($order, $cartItems);
        Cart::clear();
        return redirect()->route('admin.company_employee.index')->with('success', 'Package upgraded successfully. Your new limits are now active.');
    }
}
