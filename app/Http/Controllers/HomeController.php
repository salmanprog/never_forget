<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BillingAddress;
use App\Models\ShippingAddress;
use App\Models\Order;
use App\Models\Category;
use App\Models\Variations;
use App\Models\Product;
use App\Models\Sizes;
use App\Models\Newsletter;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        if (Auth::check() && $user->hasRole('Admin')) {
            $page_title = 'Dashboard';
            $total_category = Category::where('status', 1)->count();
            $total_sizes = Sizes::where('status', 1)->count();
            $total_variations = Variations::where('status', 1)->count();
            $total_products = Product::where('status', 1)->count();
            $total_subscribers = Newsletter::where('status', 1)->count();
            $total_contactus = ContactUs::where('status', 1)->count();
            $total_order = Order::where('status', 1)->count();
            return view('admin.dashboard.dashboard', compact('page_title', 'total_category', 'total_sizes', 'total_variations', 'total_products', 'total_subscribers', 'total_order', 'total_contactus')); //admin dashboard
        } elseif (Auth::check() && $user->hasRole('Individual')) {
            if (Session::has('slug')) {
                $slug = Session::get('slug');
                Session::forget('slug');
                return redirect()->route('single-product', $slug)->with('success', 'You are welcome. You are login now.');;
            }
            $page_title = 'Dashboard';
            $customer = User::where('id', $user->id)->first();
            $address = BillingAddress::where('customer_id', $user->id)->first();
            $total_billing_address = BillingAddress::where('customer_id', $user->id)->count();
            $shipping = ShippingAddress::where('customer_id', $user->id)->first();
            $total_shipping_address = ShippingAddress::where('customer_id', $user->id)->count();
            $order = Order::where('customer_id', $user->id)->orderby('id', 'desc')->get();
            $total_orders = Order::where('customer_id', $user->id)->count();
            // Fetch favorite products (adjust as needed for your app)
            $products = [];
            if (method_exists($customer, 'favoriteProducts')) {
                $products = $customer->favoriteProducts()->get();
            }
            return view('website.individual-dashboard.dashboard', compact('customer', 'address', 'shipping', 'order', 'page_title', 'products', 'total_billing_address', 'total_shipping_address', 'total_orders'));
        } elseif (Auth::check() && $user->hasRole('Company')) {
            if (Session::has('slug')) {
                $slug = Session::get('slug');
                Session::forget('slug');
                return redirect()->route('single-product', $slug)->with('success', 'You are welcome. You are login now.');;
            }
            $page_title = 'Dashboard';
            $customer = User::where('id', $user->id)->first();
            $address = BillingAddress::where('customer_id', $user->id)->first();
            $total_billing_address = BillingAddress::where('customer_id', $user->id)->count();
            $shipping = ShippingAddress::where('customer_id', $user->id)->first();
            $total_shipping_address = ShippingAddress::where('customer_id', $user->id)->count();
            $order = Order::where('customer_id', $user->id)->orderby('id', 'desc')->get();
            $total_orders = Order::where('customer_id', $user->id)->count();
            // Fetch favorite products (adjust as needed for your app)
            $products = [];
            if (method_exists($customer, 'favoriteProducts')) {
                $products = $customer->favoriteProducts()->get();
            }
            return view('website.company-dashboard.dashboard', compact('customer', 'address', 'shipping', 'order', 'page_title', 'products', 'total_billing_address', 'total_shipping_address', 'total_orders'));
        } else {
            return redirect()->route('index');
        }
    }
}
