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
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Hash;
use Stripe\Stripe as StripeAPI;
use Stripe\PaymentIntent;
use Stripe\Customer as StripeCustomer;
use Stripe\Exception\ApiErrorException;
use App\Services\TaxJarService;

/**
 * @property-read \Stripe\StripeClient $stripe
 */
class OrderController extends Controller
{

    protected $taxJarService;

    public function __construct(TaxJarService $taxJarService)
    {
        $this->taxJarService = $taxJarService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $user = Auth::user();
        //$query = Order::orderby('id', 'desc');
        $query = Order::whereDoesntHave('orderDetails', function ($q) {
            $q->where('product_type', 'business_card');
        })->orderBy('id', 'desc');

        // If the user is not an admin, filter by their order
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
        $models = $query->with('hasOrderDetails.productsItem')->paginate(10);
        $orderdetails = OrderDetail::with('productsItem')->where('status', 1)->get();
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

    //  public function calculateTax(Request $request)
    //  {
    //      $address = $request->all();  // Get the address from the request

    //      try {
    //          $taxData = $this->taxJarService->getTax($address);  // Get tax details from TaxJar

    //          // Log the API response for debugging
    //          \Log::info('TaxJar API Response:', $taxData); 
    //           // This will log the response from TaxJar API

    //          // Check if the expected values exist in the response
    //          if (!isset($taxData['tax']['amount_to_collect']) || !isset($taxData['tax']['total_amount'])) {
    //              throw new \Exception('Invalid TaxJar API Response');
    //          }

    //          // Return the tax data to the frontend
    //          return response()->json([
    //              'tax' => $taxData['tax']['amount_to_collect'],  // Tax to collect
    //              'total' => $taxData['tax']['total_amount'],    // Total amount including tax
    //          ]);
    //      } catch (\Exception $e) {
    //          // Log the error if something goes wrong
    //          \Log::error('Error calculating tax: ' . $e->getMessage());
    //          return response()->json(['error' => 'Failed to calculate tax.'], 500);
    //      }
    //  }

    public function calculateTax(Request $request)
    {
        $fromCountry = 'US';
        $fromState   = 'NY';
        $fromZip     = '10001';
        $fromCity    = 'New York';

        $toCountry = 'US';
        $shipping  = 0;
        $amount    = Cart::getSubTotal();

        // ============================
        // 🔹 LOGGED-IN USER
        // ============================
        if ($request->filled('billing_address_id')) {

            $address = BillingAddress::find($request->billing_address_id);

            if (!$address) {
                return response()->json(['error' => 'Invalid billing address'], 422);
            }

            $streetAddress = $address->street;
            $toCity        = $address->town;
            $toState       = $address->state ?? 'SC'; // make sure column exists
            $toZip         = $address->postcode;
        }

        // ============================
        // 🔹 GUEST USER
        // ============================
        else {
            $streetAddress = $request->guest_street;
            $toCity        = $request->guest_city;
            $toState       = $request->guest_state;
            $toZip         = $request->guest_postal_code;
        }

        // ============================
        // 🔹 SAFETY CHECK
        // ============================
        if (!$streetAddress || !$toCity || !$toState || !$toZip) {
            return response()->json(['error' => 'Incomplete address'], 422);
        }

        // ============================
        // 🔹 TAXJAR CALL
        // ============================
        $tax = $this->taxJarService->calculateSalesTax(
            $fromCountry,
            $fromState,
            $fromZip,
            $fromCity,
            $toCountry,
            $streetAddress,
            $toState,
            $toZip,
            $toCity,
            $amount,
            $shipping
        );

        if ($tax && isset($tax->amount_to_collect)) {

            session(['tax_amount' => $tax->amount_to_collect]);

            return response()->json([
                'tax'   => number_format($tax->amount_to_collect, 2),
                'total' => number_format($tax->order_total_amount, 2),
                'rate'  => $tax->rate
            ]);
        }

        return response()->json(['error' => 'Unable to calculate tax'], 500);
    }

    public function store(Request $request)
    {
        try {
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
                    'guest_state' => 'required|string|max:255',
                    'guest_city' => 'required|string|max:255',
                    'guest_postal_code' => 'required|string|max:20',
                ]);
            } else {
                // Validate billing address for authenticated users
                $request->validate([
                    'billing_address_id' => 'required|exists:billing_addresses,id',
                ]);
            }

            // PayPal flow: store billing + cart in session and redirect to PayPal (delivery charges apply; no 3% card fee)
            if ($request->get('pay_with') === 'paypal') {
                $subtotal = Cart::getSubTotal();
                $taxAmount = (float) (session('tax_amount', 0));
                $discount = session('discount');
                $discountAmount = $discount['discount'] ?? 0;
                $baseTotal = round($subtotal + $taxAmount - $discountAmount, 2);
                $deliveryFee = $baseTotal < 350 ? 39 : 45;
                $finalTotal = round($baseTotal + $deliveryFee, 2);

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
                        'amount' => round($finalTotal, 2),
                        'tax_amount' => $taxAmount,
                        'discount' => $discount,
                        'billing_address_id' => $request->billing_address_id,
                        'guest' => $request->only([
                            'guest_first_name', 'guest_last_name', 'guest_email', 'guest_phone',
                            'guest_company', 'guest_country', 'guest_street', 'guest_state',
                            'guest_city', 'guest_postal_code',
                        ]),
                        'cart_items' => $cartItems,
                    ],
                ]);
                return redirect()->route('paypal.checkout');
            }

            // Authorize.net flow: delivery charges + 3% card charges (card only); then create order
            if ($request->get('pay_with') === 'authorize') {
                $request->validate([
                    'authorizenet_data_descriptor' => 'required|string',
                    'authorizenet_data_value' => 'required|string',
                ]);
                $subtotal = Cart::getSubTotal();
                $taxAmount = (float) (session('tax_amount', 0));
                $discount = session('discount');
                $discountAmount = $discount['discount'] ?? 0;
                $baseTotal = round($subtotal + $taxAmount - $discountAmount, 2);
                $deliveryFee = $baseTotal < 350 ? 39 : 45;
                $cardFee = round($baseTotal * 0.03, 2);
                $finalTotal = round($baseTotal + $deliveryFee + $cardFee, 2);
                $authResult = $this->chargeAuthorizeNet(
                    $finalTotal,
                    $request->authorizenet_data_descriptor,
                    $request->authorizenet_data_value
                );
                if (!$authResult['success']) {
                    return back()->with('error', $authResult['error'] ?? 'Authorize.net payment failed. Please try again.');
                }
                // Resolve or create user
                if (Auth::check()) {
                    $user = Auth::user();
                } else {
                    $user = User::where('email', $request->guest_email)->first();
                    if (!$user) {
                        do {
                            $user_id = rand(1000, 9999);
                        } while (User::where('user_id', $user_id)->first());
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
                }
                $billing_address_id = $request->billing_address_id;
                if (!Auth::check() && (int) $request->billing_address_id === 0) {
                    $guest_address = BillingAddress::create([
                        'customer_id' => $user->id,
                        'first_name' => $request->guest_first_name,
                        'last_name' => $request->guest_last_name,
                        'company' => $request->guest_company ?? '',
                        'country' => $request->guest_country,
                        'street' => $request->guest_street,
                        'state' => $request->guest_state,
                        'town' => $request->guest_city,
                        'postcode' => $request->guest_postal_code,
                        'phone' => $request->guest_phone,
                        'email' => $request->guest_email,
                        'status' => 1,
                    ]);
                    $billing_address_id = $guest_address->id;
                }
                $cartItems = Cart::getContent();
                $order = new Order();
                $order->billing_address_id = $billing_address_id;
                $order->payment_id = $authResult['transaction_id'] ?? 'auth_' . uniqid();
                $order->order_number = mt_rand(100000, 999999);
                $order->customer_id = Auth::check() ? Auth::id() : $user->id;
                $order->payment_status = 'paid';
                $order->order_status = 'Pending';
                $order->order_date = date('Y-m-d');
                $order->tax_amount = $taxAmount;
                $order->total_amount = $finalTotal;
                if (!Auth::check()) {
                    $order->guest_email = $request->guest_email;
                    $order->guest_first_name = $request->guest_first_name;
                    $order->guest_last_name = $request->guest_last_name;
                    $order->guest_phone = $request->guest_phone;
                }
                $discountData = session('discount');
                if ($discountData) {
                    $order->coupon_code = $discountData['coupon'] ?? ($discountData['code'] ?? null);
                    $order->discount_amount = $discountData['discount'] ?? null;
                }
                $order->save();
                $item_front_images = [];
                $item_back_images = [];
                foreach ($cartItems as $item) {
                    $front = $item->attributes->get('card_front_image');
                    $back = $item->attributes->get('card_back_image');
                    if (!empty($front)) $item_front_images[] = $front;
                    if (!empty($back)) $item_back_images[] = $back;
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'product_type' => $item->attributes->product_type ?? 'product',
                        'product_id' => $item->attributes->business_card_id ?? ($item->attributes->product_id ?? 0),
                        'product_slug' => $item->name,
                        'category_id' => $item->attributes->category_id ?? null,
                        'sub_category_id' => $item->attributes->sub_category_id ?? null,
                        'price' => $item->price,
                        'quantity' => $item->quantity,
                        'message' => $item->attributes->message ?? null,
                        'variation_id' => $item->attributes->variation_id ?? null,
                        'discount_type' => $discountData['type'] ?? null,
                        'discount_amount' => $discountData['discount'] ?? null,
                        'tax' => null,
                        'sub_total' => $item->price * $item->quantity,
                        'order_status' => 'Succeeded',
                        'order_date' => date('Y-m-d'),
                    ]);
                }
                self::applyPackageUpgradeFromItems($order, $cartItems);
                Cart::clear();
                session()->forget('discount');
                try {
                    $customer_email = Auth::check() ? Auth::user()->email : $order->guest_email;
                    if ($customer_email) {
                        $details = ['from' => 'customer-new-booking', 'title' => 'Your order has been placed successfully.', 'body' => $order, 'front_images' => $item_front_images ?? [], 'back_images' => $item_back_images ?? []];
                        Mail::to($customer_email)->send(new \App\Mail\Email($details));
                    }
                    $admin = User::role('Admin')->where('status', 1)->first();
                    if ($admin) {
                        $customer_name = Auth::check() ? Auth::user()->name . ' ' . Auth::user()->last_name : ($order->guest_first_name . ' ' . $order->guest_last_name);
                        $details = ['from' => 'admin-new-booking', 'title' => "You have received the following order from " . $customer_name, 'body' => $order, 'front_images' => $item_front_images ?? [], 'back_images' => $item_back_images ?? []];
                        Mail::to($admin->email)->send(new \App\Mail\Email($details));
                    }
                } catch (\Exception $e) {
                    \Log::warning('Order confirmation email failed: ' . $e->getMessage());
                }
                return redirect()->route('order.success')->with('order', $order)->with('success', 'Order placed and payment successful!');
            }

            if (!$request->stripeToken) {
                return back()->with('error', 'Please select a payment method and complete card details.');
            }

            StripeAPI::setApiKey(config('services.stripe.secret'));
            // $taxAmount   = (float) $request->tax_amount;
            // $finalTotal = (float) $request->final_total;

            // // Stripe expects cents
            // $amount = round($finalTotal * 100); // cents

            //check user
            if (Auth::check()) {
                $user = Auth::user();
            } else {
                $user = User::where('email', $request->guest_email)->first();
                if (!$user) {
                    do {
                        $user_id = rand(1000, 9999);
                    } while (User::where('user_id', $user_id)->first());

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
            }
            $cartItems = Cart::getContent();
            $subtotal  = Cart::getSubTotal();
            $taxAmount = session('tax_amount', 0);
            $discount  = session('discount')['discount'] ?? 0;

            $finalTotal = $subtotal + $taxAmount - $discount;

            // Stripe needs cents
            $amount = (int) round($finalTotal * 100);
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
                        'state' => $request->guest_state,
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
                $order->tax_amount   = $taxAmount;
                $order->total_amount = $finalTotal;

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
                        'product_id' => $item->attributes->business_card_id ?? ($item->attributes->product_id ?? 0),
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

                self::applyPackageUpgradeFromItems($order, $cartItems);
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
        if (session()->has('order_success_redirect')) {
            $url = session()->pull('order_success_redirect');
            return redirect($url)->with('order', session('order'))->with('success', 'Order placed and payment successful! Your package limits have been updated.');
        }
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
        //$model = Order::with('hasCustomer', 'hasOrderDetails')->with('products','productsItem')->find($id);
        $model = Order::with([
            'hasCustomer',
            'hasBillingAddress',
            'hasOrderDetails' => function ($query) {
                $query->with('productsItem');
            },
        ])->find($id);
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
        return view('admin.order.edit', compact('model', 'page_title'));
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

    /**
     * Charge via Authorize.net using Accept.js payment nonce (opaque data).
     *
     * @param float  $amount
     * @param string $dataDescriptor
     * @param string $dataValue
     * @return array{success: bool, transaction_id?: string, error?: string}
     */
    private function chargeAuthorizeNet(float $amount, string $dataDescriptor, string $dataValue): array
    {
        $apiLoginId = config('services.authorize.api_login_id');
        $transactionKey = config('services.authorize.transaction_key');
        $apiUrl = config('services.authorize.api_url');

        if (empty($apiLoginId) || empty($transactionKey)) {
            return ['success' => false, 'error' => 'Authorize.net is not configured.'];
        }

        $payload = [
            'createTransactionRequest' => [
                'merchantAuthentication' => [
                    'name' => $apiLoginId,
                    'transactionKey' => $transactionKey,
                ],
                'refId' => 'ref' . uniqid(),
                'transactionRequest' => [
                    'transactionType' => 'authCaptureTransaction',
                    'amount' => round($amount, 2),
                    'payment' => [
                        'opaqueData' => [
                            'dataDescriptor' => $dataDescriptor,
                            'dataValue' => $dataValue,
                        ],
                    ],
                ],
            ],
        ];

        try {
            $response = Http::timeout(30)->post($apiUrl, $payload);
            $body = $response->json();
            $wrapper = $body['createTransactionResponse'] ?? $body;
            $txResponse = $wrapper['transactionResponse'] ?? $wrapper['transactionResponse'] ?? null;
            $messages = $wrapper['messages'] ?? $body['messages'] ?? [];

            if ($txResponse && isset($txResponse['responseCode']) && (string) $txResponse['responseCode'] === '1') {
                $transId = $txResponse['transId'] ?? null;
                return ['success' => true, 'transaction_id' => $transId];
            }

            $errors = is_array($txResponse) ? ($txResponse['errors'] ?? []) : [];
            $errorText = isset($errors[0]['errorText']) ? $errors[0]['errorText'] : null;
            if (!$errorText && isset($messages['message'][0]['text'])) {
                $errorText = $messages['message'][0]['text'];
            }
            return ['success' => false, 'error' => $errorText ?: 'Transaction declined.'];
        } catch (\Exception $e) {
            \Log::error('Authorize.net charge error: ' . $e->getMessage());
            return ['success' => false, 'error' => 'Payment could not be processed. Please try again.'];
        }
    }

    /**
     * Public static wrapper for package upgrade charge (dashboard modal).
     *
     * @return array{success: bool, transaction_id?: string, error?: string}
     */
    public static function chargeAuthorizeNetForAmount(float $amount, string $dataDescriptor, string $dataValue): array
    {
        $apiLoginId = config('services.authorize.api_login_id');
        $transactionKey = config('services.authorize.transaction_key');
        $apiUrl = config('services.authorize.api_url');
        if (empty($apiLoginId) || empty($transactionKey)) {
            return ['success' => false, 'error' => 'Authorize.net is not configured.'];
        }
        $payload = [
            'createTransactionRequest' => [
                'merchantAuthentication' => ['name' => $apiLoginId, 'transactionKey' => $transactionKey],
                'refId' => 'ref' . uniqid(),
                'transactionRequest' => [
                    'transactionType' => 'authCaptureTransaction',
                    'amount' => round($amount, 2),
                    'payment' => ['opaqueData' => ['dataDescriptor' => $dataDescriptor, 'dataValue' => $dataValue]],
                ],
            ],
        ];
        try {
            $response = Http::timeout(30)->post($apiUrl, $payload);
            $body = $response->json();
            $wrapper = $body['createTransactionResponse'] ?? $body;
            $txResponse = $wrapper['transactionResponse'] ?? null;
            $messages = $wrapper['messages'] ?? $body['messages'] ?? [];
            if ($txResponse && isset($txResponse['responseCode']) && (string) $txResponse['responseCode'] === '1') {
                return ['success' => true, 'transaction_id' => $txResponse['transId'] ?? null];
            }
            $errors = is_array($txResponse) ? ($txResponse['errors'] ?? []) : [];
            $errorText = isset($errors[0]['errorText']) ? $errors[0]['errorText'] : null;
            if (!$errorText && isset($messages['message'][0]['text'])) {
                $errorText = $messages['message'][0]['text'];
            }
            return ['success' => false, 'error' => $errorText ?: 'Transaction declined.'];
        } catch (\Exception $e) {
            \Log::error('Authorize.net charge error: ' . $e->getMessage());
            return ['success' => false, 'error' => 'Payment could not be processed. Please try again.'];
        }
    }

    /**
     * If the order contains a package upgrade cart item, update the customer's employees and clients limits.
     *
     * @param  Order  $order
     * @param  \Illuminate\Support\Collection|array  $cartItems  Cart::getContent() or session cart_items array
     */
    public static function applyPackageUpgradeFromItems(Order $order, $cartItems): void
    {
        $customerId = $order->customer_id;
        if (!$customerId) {
            return;
        }
        $user = User::find($customerId);
        if (!$user) {
            return;
        }
        foreach ($cartItems as $item) {
            $id = is_array($item) ? ($item['id'] ?? null) : $item->id;
            if ((string) $id !== 'package_upgrade') {
                continue;
            }
            $attrs = is_array($item) ? ($item['attributes'] ?? []) : $item->attributes;
            $employees = is_array($attrs) ? ($attrs['package_employees'] ?? null) : $attrs->get('package_employees');
            $clients = is_array($attrs) ? ($attrs['package_clients'] ?? null) : $attrs->get('package_clients');
            if ($employees !== null && $employees !== '') {
                $user->employees = (int) $employees;
            }
            if ($clients !== null && $clients !== '') {
                $user->clients = (int) $clients;
            }
            $user->save();
            if (\Illuminate\Support\Facades\Auth::check() && (int) \Illuminate\Support\Facades\Auth::id() === (int) $customerId) {
                \Illuminate\Support\Facades\Auth::user()->refresh();
            }
            break;
        }
    }
}
