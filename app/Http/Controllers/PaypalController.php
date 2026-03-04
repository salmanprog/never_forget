<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\BillingAddress;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class PaypalController extends Controller
{
    private $provider;

    public function __construct(PayPalClient $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Create PayPal order and redirect to PayPal (GET - after OrderController redirected with session).
     */
    public function checkout(Request $request)
    {
        $checkout = session('paypal_checkout');
        if (!$checkout || empty($checkout['amount'])) {
            return redirect()->route('check-out')->with('error', 'Session expired or invalid. Please fill billing and try again.');
        }

        if (Cart::isEmpty()) {
            return redirect()->route('check-out')->with('error', 'Your cart is empty.');
        }

        $provider = $this->provider;
        $provider->getAccessToken();

        $amount = number_format((float) $checkout['amount'], 2, '.', '');
        $paymentData = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => config('paypal.currency', 'USD'),
                        'value' => $amount,
                    ],
                    'description' => 'Order payment - ' . config('app.name'),
                ]
            ],
            'application_context' => [
                'return_url' => route('paypal.complete'),
                'cancel_url' => route('paypal.cancel'),
            ],
        ];

        $response = $provider->createOrder($paymentData);
        \Log::info('PayPal createOrder response:', is_array($response) ? $response : ['response' => $response]);

        if (isset($response['id']) && isset($response['links'])) {
            foreach ($response['links'] as $link) {
                if (isset($link['rel']) && $link['rel'] === 'approve') {
                    return redirect($link['href']);
                }
            }
        }

        \Log::error('PayPal createOrder failed:', is_array($response) ? $response : ['response' => $response]);
        return redirect()->route('check-out')->with('error', 'Payment failed, please try again!');
    }

    /**
     * User approved on PayPal - capture payment and create order.
     */
    public function complete(Request $request)
    {
        $token = $request->get('token'); // PayPal returns order ID as token
        if (!$token) {
            return redirect()->route('check-out')->with('error', 'Payment failed, please try again!');
        }

        $provider = $this->provider;
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($token);
        \Log::info('PayPal capture response:', is_array($response) ? $response : ['response' => $response]);

        $status = $response['status'] ?? ($response['status_code'] ?? null);
        if ($status !== 'COMPLETED' && $status !== 201) {
            $status = $response['status'] ?? 'unknown';
            return redirect()->route('check-out')->with('error', 'Payment could not be completed. Please try again.');
        }

        $checkout = session('paypal_checkout');
        if (!$checkout) {
            Cart::clear();
            session()->forget('paypal_checkout');
            return redirect()->route('check-out')->with('error', 'Session expired. Your payment was received; please contact us with your PayPal transaction.');
        }

        // Create user if guest
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            $guest = $checkout['guest'] ?? [];
            $user = User::where('email', $guest['guest_email'] ?? '')->first();
            if (!$user) {
                do {
                    $user_id = rand(1000, 9999);
                } while (User::where('user_id', $user_id)->first());
                $user = User::create([
                    'first_name' => $guest['guest_first_name'] ?? 'Guest',
                    'last_name' => $guest['guest_last_name'] ?? '',
                    'account_type' => 'app_user',
                    'email' => $guest['guest_email'],
                    'user_id' => $user_id,
                    'phone' => $guest['guest_phone'] ?? '',
                    'password' => Hash::make('Test@123'),
                ]);
            }
        }

        // Billing address
        $billing_address_id = $checkout['billing_address_id'] ?? null;
        if (!$billing_address_id && !Auth::check()) {
            $guest = $checkout['guest'] ?? [];
            $guest_address = BillingAddress::create([
                'customer_id' => $user->id,
                'first_name' => $guest['guest_first_name'] ?? 'Guest',
                'last_name' => $guest['guest_last_name'] ?? '',
                'company' => $guest['guest_company'] ?? '',
                'country' => $guest['guest_country'] ?? '',
                'street' => $guest['guest_street'] ?? '',
                'state' => $guest['guest_state'] ?? '',
                'town' => $guest['guest_city'] ?? '',
                'postcode' => $guest['guest_postal_code'] ?? '',
                'phone' => $guest['guest_phone'] ?? '',
                'email' => $guest['guest_email'] ?? '',
                'status' => 1,
            ]);
            $billing_address_id = $guest_address->id;
        }

        $taxAmount = (float) ($checkout['tax_amount'] ?? 0);
        $discountData = $checkout['discount'] ?? null;
        $finalTotal = (float) ($checkout['amount'] ?? 0);

        $order = new Order();
        $order->billing_address_id = $billing_address_id;
        $order->payment_id = $token;
        $order->order_number = mt_rand(100000, 999999);
        $order->customer_id = $user->id;
        $order->payment_status = 'paid';
        $order->order_status = 'Pending';
        $order->order_date = date('Y-m-d');
        $order->tax_amount = $taxAmount;
        $order->total_amount = $finalTotal;

        if (!Auth::check()) {
            $guest = $checkout['guest'] ?? [];
            $order->guest_email = $guest['guest_email'] ?? null;
            $order->guest_first_name = $guest['guest_first_name'] ?? null;
            $order->guest_last_name = $guest['guest_last_name'] ?? null;
            $order->guest_phone = $guest['guest_phone'] ?? null;
        }

        if ($discountData) {
            $order->coupon_code = $discountData['coupon'] ?? $discountData['code'] ?? null;
            $order->discount_amount = $discountData['discount'] ?? null;
        }
        $order->save();

        $item_front_images = [];
        $item_back_images = [];
        $cartItems = $checkout['cart_items'] ?? [];
        foreach ($cartItems as $item) {
            $front = $item['attributes']['card_front_image'] ?? null;
            $back = $item['attributes']['card_back_image'] ?? null;
            if (!empty($front)) $item_front_images[] = $front;
            if (!empty($back)) $item_back_images[] = $back;

            OrderDetail::create([
                'order_id' => $order->id,
                'product_type' => $item['attributes']['product_type'] ?? 'product',
                'product_id' => $item['attributes']['business_card_id'] ?? ($item['attributes']['product_id'] ?? 0),
                'product_slug' => $item['name'],
                'category_id' => $item['attributes']['category_id'] ?? null,
                'sub_category_id' => $item['attributes']['sub_category_id'] ?? null,
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'message' => $item['attributes']['message'] ?? null,
                'variation_id' => $item['attributes']['variation_id'] ?? null,
                'discount_type' => $discountData['type'] ?? null,
                'discount_amount' => $discountData['discount'] ?? null,
                'tax' => null,
                'sub_total' => $item['price'] * $item['quantity'],
                'order_status' => 'Succeeded',
                'order_date' => date('Y-m-d'),
            ]);
        }

        Cart::clear();
        session()->forget('paypal_checkout');
        session()->forget('discount');

        try {
            $customer_email = Auth::check() ? Auth::user()->email : ($order->guest_email ?? null);
            if ($customer_email) {
                $details = [
                    'from' => 'customer-new-booking',
                    'title' => 'Your order has been placed successfully.',
                    'body' => $order,
                    'front_images' => $item_front_images ?? [],
                    'back_images' => $item_back_images ?? [],
                ];
                Mail::to($customer_email)->send(new \App\Mail\Email($details));
            }
            $admin = User::role('Admin')->where('status', 1)->first();
            if ($admin) {
                $customer_name = Auth::check() ? Auth::user()->first_name . ' ' . Auth::user()->last_name : ($order->guest_first_name . ' ' . $order->guest_last_name);
                $details = [
                    'from' => 'admin-new-booking',
                    'title' => "You have received the following order from " . $customer_name,
                    'body' => $order,
                    'front_images' => $item_front_images ?? [],
                    'back_images' => $item_back_images ?? [],
                ];
                Mail::to($admin->email)->send(new \App\Mail\Email($details));
            }
        } catch (\Exception $e) {
            \Log::warning('Order confirmation email failed: ' . $e->getMessage());
        }

        return redirect()->route('order.success')->with('order', $order)->with('success', 'Order placed and payment successful!');
    }

    public function cancel()
    {
        session()->forget('paypal_checkout');
        return redirect()->route('check-out')->with('error', 'Payment was cancelled.');
    }
}
