<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Coupon;
use App\Models\Ticket;
use App\Models\Product;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\BillingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Hash;
use Stripe\Stripe as StripeAPI;
use Stripe\PaymentIntent;
use Stripe\Customer as StripeCustomer;
use Stripe\Exception\ApiErrorException;

/**
 * @property-read \Stripe\StripeClient $stripe
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Order::orderby('id', 'desc');

        // If the user is not an admin, filter by their orders
        if (!$user->hasRole('Admin')) {
            $query->where('customer_id', $user->id);
        }

        if ($request->ajax()) {
            if ($request['search'] != "") {
                $query->where('order_number', 'like', '%' . $request['search'] . '%');
            }
            if ($request['status'] != "All") {
                if ($request['status'] == 2) {
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.order.search', compact('models'));
        }

        $page_title = 'All Order';
        $models = $query->paginate(10);
        $orderdetails = OrderDetail::where('status', 1)->get();
        return view('admin.order.index', compact("models", "page_title", "orderdetails"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a new order
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ApiErrorException
     */
    public function store(Request $request)
    {
        try {
            if (!$request->stripeToken) {
                return back()->with('error', 'Stripe token missing!');
            }

            // Check if cart is empty
            if (Cart::isEmpty()) {
                return back()->with('error', 'Your cart is empty. Please add products before checking out.');
            }
            
            // Validate guest checkout fields if not authenticated
            if (!Auth::check()) {
                $request->validate([
                    'guest_first_name' => 'required|string|max:255',
                    'guest_last_name' => 'required|string|max:255',
                    'guest_email' => 'required|email|max:255',
                    'guest_phone' => 'required|string|max:20',
                    'guest_country' => 'required|string|max:255',
                    'guest_street' => 'required|string|max:255',
                    'guest_city' => 'required|string|max:255',
                    'guest_postal_code' => 'required|string|max:20',
                ]);
            } else {
                // Validate billing address for authenticated users
                $request->validate([
                    'billing_address_id' => 'required|exists:billing_addresses,id',
                ]);
            }

            StripeAPI::setApiKey(config('services.stripe.secret'));
            $amount = Cart::getTotal() * 100; // cents

            //check user
            $user = User::where('email', $request->guest_email)->first();
            if(!$user){
                do{
                    $user_id = rand(1000, 9999);
                }while(User::where('user_id', $user_id)->first());

                $user = User::create([
                    'first_name' => $request->guest_first_name,
                    'last_name' => $request->guest_last_name,
                    'account_type' => 'app_user',
                    'email' => $request->guest_email,
                    'user_id' => $user_id,
                    'phone' => $request->guest_phone,
                    'password' => Hash::make('Test@123'),
                ]);
            }
            $cartItems = Cart::getContent();
            // Create PaymentIntent with token
            $payment = PaymentIntent::create([
                'amount' => $amount,
                'currency' => config('services.stripe.currency'),
                'payment_method_types' => ['card'],
                'description' => 'Order payment',
                'confirm' => true,
                'payment_method_data' => [
                    'type' => 'card',
                    'card' => [
                        'token' => $request->stripeToken,
                    ],
                ],
            ]);

            if ($payment->status === 'succeeded') {
                // Handle billing address for guests
                $billing_address_id = $request->billing_address_id;
                if (!Auth::check() && $request->billing_address_id == 0) {
                    // Create a temporary billing address for guest
                    $guest_address = BillingAddress::create([
                        'customer_id' => $user->id, // Guest user
                        'first_name' => $request->guest_first_name,
                        'last_name' => $request->guest_last_name,
                        'company' => $request->guest_company ?? '',
                        'country' => $request->guest_country,
                        'street' => $request->guest_street,
                        'town' => $request->guest_city, // Using 'town' instead of 'city'
                        'postcode' => $request->guest_postal_code, // Using 'postcode' instead of 'postal_code'
                        'phone' => $request->guest_phone,
                        'email' => $request->guest_email,
                        'status' => 1,
                    ]);
                    $billing_address_id = $guest_address->id;
                }
                
                // Store order
                $order = new Order(); 
                $order->billing_address_id = $billing_address_id;
                $order->payment_id = $payment->id;
                $order->order_number = mt_rand(100000, 999999);
                $order->customer_id = Auth::check() ? Auth::id() : $user->id; // Use 0 for guests instead of null
                $order->payment_status = 'paid';
                $order->order_status = 'Pending';
                $order->order_date = date('Y-m-d');
                $order->total_amount = Cart::getTotal();
                
                // Store guest information if not logged in
                if (!Auth::check()) {
                    $order->guest_email = $request->guest_email;
                    $order->guest_first_name = $request->guest_first_name;
                    $order->guest_last_name = $request->guest_last_name;
                    $order->guest_phone = $request->guest_phone;
                }

                $discount = null;
                if (session()->has('discount')) {
                    $discount = session()->get('discount');
                    $order->coupon_code = $discount['coupon'] ?? ($discount['code'] ?? null);
                    $order->discount_amount = $discount['discount'] ?? null;
                }

                $order->save();

                // Store order details
                $item_front_images = [];
                $item_back_images = [];
                foreach ($cartItems as $item) {
                    $front = $item->attributes->get('card_front_image');
                    $back  = $item->attributes->get('card_back_image');

                    if (!empty($front)) {
                        $item_front_images[] = $front;
                    }

                    if (!empty($back)) {
                        $item_back_images[] = $back;
                    }
                    OrderDetail::create([
                        'order_id' => $order->id, 
                        'product_type' => $item->attributes->product_type ?? 'product',
                        'product_id' => $item->attributes->business_card_id ?? 0,
                        'product_slug' => $item->name,
                        'category_id' => $item->attributes->category_id ?? null,
                        'sub_category_id' => $item->attributes->sub_category_id ?? null,
                        'price' => $item->price,
                        'quantity' => $item->quantity,
                        'message' => $item->attributes->message ?? null,
                        'variation_id' => $item->attributes->variation_id ?? null,
                        'discount_type' => isset($discount) ? ($discount['type'] ?? null) : null,
                        'discount_amount' => isset($discount) ? ($discount['discount'] ?? null) : null,
                        'tax' => null,
                        'sub_total' => $item->price * $item->quantity,
                        'order_status' => 'Succeeded',
                        'order_date' => date('Y-m-d'),
                    ]);
                }

                // Clear cart and discount
                Cart::clear();
                session()->forget('discount');

                // Send emails only if order and payment are successful
                $details = [
                        'from'          => 'customer-new-booking',
                        'title'         => "You have received the following order from" . $user->first_name . ' ' . $user->last_name . ',',
                        'body'          => $order,
                        'front_images'  => $item_front_images ?? [],
                        'back_images'   => $item_back_images ?? [],
                    ];

                \Mail::to($order->guest_email)->send(new \App\Mail\Email($details));
                try {
            
                    $admin = User::role('Admin')->where('status', 1)->first();
                    if ($admin) {
                        $admin_email = $admin->email;
                        $customer_name = Auth::check() ? Auth::user()->name : ($order->guest_first_name . ' ' . $order->guest_last_name);
                        $details = [
                            'from' => 'admin-new-booking',
                            'title' => "You have received the following order from " . $customer_name,
                            'body' => $order,
                            'front_images'  => $item_front_images ?? [],
                            'back_images'   => $item_back_images ?? [],
                        ];
                        Mail::to('herry@yopmail.com')->send(new \App\Mail\Email($details));
                    }
                    
                    // Send confirmation email to customer
                    $customer_email = Auth::check() ? Auth::user()->email : $order->guest_email;
                    
                    if ($customer_email) {
                        $details = [
                            'from' => 'customer-new-booking',
                            'title' => "Your order has been placed successfully.",
                            'body' => $order,
                            'front_images'  => $item_front_images ?? [],
                            'back_images'   => $item_back_images ?? [],
                        ];
                        Mail::to($customer_email)->send(new \App\Mail\Email($details));
                    }
                } catch (\Exception $mailEx) {
                    // Log or ignore email errors
                }

                // Redirect to success page with order details
                return redirect()->route('order.success')->with('order', $order)->with('success', 'Order placed and payment successful!');
            }

            return back()->with('error', 'Payment failed. Please try again.');

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Display the order success page
     * 
     * @return \Illuminate\View\View
     */
    public function success()
    {
        return view('website.order-success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_title = 'Order Details';
        $model = Order::with('hasCustomer')->with('products')->find($id);
        return view('admin.order.show', compact('model', 'page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Edit Subscribers';
        $model  = Order::where('id', $id)->first();
        return view('admin.order.edit', compact('model','page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Order::where('id', $id)->first(); 
        $update->order_status = $request->order_status;
        $update->update();

        return redirect()->route('order.index')->with('message', 'Order Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function invoice($id)
    {
        $orders = Order::with('hasBillingAddress', 'hasShippingAddress')->find($id);
        if (!$orders) {
            return back()->with('error', 'Order not found.');
        }

        $order_details = OrderDetail::with('hasProduct')->where('order_id', $id)->get();
        
        $pdf = PDF::loadView('admin.order.mypdf', compact('orders', 'order_details'));
        return $pdf->download('order-invoice.pdf');
    }
}
