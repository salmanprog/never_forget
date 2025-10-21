<?php

namespace App\Http\Controllers;

use App\Models\BusinessCard;
use App\Models\BusinessCardOrder;
use App\Models\BusinessCardOption;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Stripe\Stripe;

class BusinessCardOrderController extends Controller
{
    /**
     * Show the business card order form
     */
    public function index()
    {
        $paperStocks = BusinessCardOption::getByType('paper_stock');
        $quantities = $this->getQuantityOptions();

        return view('website.business-cards.order', compact('paperStocks', 'quantities'));
    }

    /**
     * Show the business card order details
     */
    public function show($orderId)
    {
        try {
            $order = BusinessCardOrder::with('businessCard')->findOrFail($orderId);
            
            // Ensure user can only view their own orders
            if (auth()->id() !== $order->user_id) {
                abort(403, 'Unauthorized to view this order');
            }
            
            // Get the related business card
            $businessCard = $order->businessCard;
            
            return view('website.business-cards.order-details', compact('order', 'businessCard'));
            
        } catch (\Exception $e) {
            // If order not found or unauthorized, redirect to order page
            return redirect()->route('business-cards.order')
                ->with('error', 'Order not found or you do not have permission to view it.');
        }
    }

    /**
     * Process the business card order
     */
    public function store(Request $request)
    {
        try {
            \Illuminate\Support\Facades\Log::info('Business card order request received', [
                'request_data' => $request->all(),
                'files' => $request->hasFile('upload_files') ? 'Files present' : 'No files',
                'file_count' => $request->hasFile('upload_files') ? count($request->file('upload_files')) : 0,
                'has_name' => $request->has('name'),
                'has_email' => $request->has('email'),
                'has_upload_files' => $request->has('upload_files')
            ]);
            
            try {
                $request->validate([
            'paper_stock' => 'required|string',
            'corner_style' => 'required|string|in:standard,rounded',
            'quantity' => 'required|numeric|min:1',
            'custom_quantity' => 'nullable|string',
            'upload_files' => 'required|array|min:1',
            'upload_files.*' => 'file|mimes:pdf,png,jpg,jpeg,jp2|max:51200', // 50MB max
            'notes' => 'nullable|string|max:1000',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'text_color' => 'nullable|string',
            'background_color' => 'nullable|string',
            'payment_intent_id' => 'nullable|string'
        ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
                \Illuminate\Support\Facades\Log::error('Validation failed:', [
                    'errors' => $e->errors(),
                    'request_data' => $request->all()
                ]);
                
                if ($request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Validation failed',
                        'errors' => $e->errors()
                    ], 422);
                }
                
                throw $e;
            }
            // Upload files
            $uploadFileNames = [];
            if ($request->hasFile('upload_files')) {
                foreach ($request->file('upload_files') as $file) {
                    $uploadDir = public_path('admin/assets/images/business_cards/uploads/');
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0755, true);
                    }
                    
                    $fileName = date('YmdHis') . '.' . $file->getClientOriginalExtension();
                    $file->move($uploadDir, $fileName);
                    $uploadFileNames[] = $fileName;
                }
                
                // Update design_data with upload filenames
                $designData = $request->design_data ? json_decode($request->design_data, true) : [];
                $designData['upload_files'] = $uploadFileNames;
                $request['design_data'] = json_encode($designData);
            }

            // Handle quantity (regular or custom)
            $quantity = $request->quantity;
            if ($request->quantity === 'custom' && $request->custom_quantity) {
                $quantity = $request->custom_quantity;
            }

            // Calculate pricing
            $totalPrice = BusinessCardOrder::calculateTotal(
                $quantity, 
                $request->paper_stock, 
                $request->corner_style
            );

            // First create a business card record for customer reference
            $businessCard = BusinessCard::create([
                'user_id' => auth()->id(),
                'template_id' => null, // No template for uploaded designs - make nullable
                'name' => $request->name,
                'job_title' => $request->job_title,
                'company' => $request->company,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'logo_path' => $uploadFileNames[0] ?? null, // Use first upload as logo
                'design_data' => json_encode([
                    'upload_files' => $uploadFileNames,
                    'notes' => $request->notes
                ]),
                'corner_style' => $request->corner_style,
                'text_color' => $request->text_color,
                'background_color' => $request->background_color,
                'is_front_design' => true,
                'status' => 'order_placed'
            ]);

            // Create business card order with reference to business card
            $order = BusinessCardOrder::create([
                'user_id' => auth()->id(),
                'business_card_id' => $businessCard->id,
                'order_number' => BusinessCardOrder::generateOrderNumber(),
                'paper_stock' => $request->paper_stock,
                'corner_style' => $request->corner_style,
                'quantity' => $quantity,
                'text_color' => $request->text_color ?? '#333333',
                'background_color' => $request->background_color ?? '#ffffff',
                'upload_files' => $uploadFileNames,
                'options_data' => json_encode([
                    'paper_display' => BusinessCardOption::where('option_key', $request->paper_stock)->first()->name ?? $request->paper_stock
                ]),
                'base_price' => $totalPrice,
                'total_price' => $totalPrice,
                'status' => 'pending',
                'notes' => $request->notes,
                'payment_intent_id' => $request->payment_intent_id
            ]);

            // Add to cart
            $this->addToCart($request, $order);

            // Return JSON response for AJAX requests
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Business card order created successfully!',
                    'order_id' => $order->id,
                    'redirect_url' => route('business-cards.order.show', $order->id)
                ]);
            }

            // Redirect to order details page
            return redirect()->route('business-cards.order.show', $order->id)
                ->with('success', 'Business card order created successfully!');

        } catch (\Exception $e) {
            // Log the error
            \Illuminate\Support\Facades\Log::error('Business Card Order Error:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);
            
            // Return JSON response for AJAX requests
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error processing order: ' . $e->getMessage()
                ], 500);
            }
            
            // Redirect back with error message
            return redirect()->back()
                ->with('error', 'Error processing order: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Add business card order to cart
     */
    private function addToCart(Request $request, BusinessCardOrder $order)
    {
        // Use the existing cart system (Darryldecode\Cart)
        $cartId = 'business_card_' . $order->id;
        
        \Darryldecode\Cart\Facades\CartFacade::add([
            'id' => $cartId,
            'name' => 'Business Card Order - ' . $order->paper_stock . ' (' . $order->quantity . ' cards)',
            'price' => $order->total_price,
            'quantity' => 1, // Each order is one item
            'attributes' => [
                'order_id' => $order->id,
                'business_card_id' => $order->business_card_id,
                'paper_stock' => $order->paper_stock,
                'corner_style' => $order->corner_style,
                'quantity' => $order->quantity,
                'upload_files' => $order->upload_files,
                'product_type' => 'business_card',
                'customer_name' => $order->businessCard->name,
                'customer_email' => $order->businessCard->email,
                'company_name' => $order->businessCard->company
            ]
        ]);
    }

    private function updateCart(Request $request, BusinessCardOrder $order)
    {
        $cartId = 'business_card_' . $order->id;

        // Check if item exists in the cart
        if (\Darryldecode\Cart\Facades\CartFacade::get($cartId)) {
            // 🧠 Update existing cart item
            \Darryldecode\Cart\Facades\CartFacade::update($cartId, [
                'name' => 'Business Card Order - ' . $order->paper_stock . ' (' . $order->quantity . ' cards)',
                'price' => $order->total_price,
                'quantity' => 1, // each order = 1 item
                'attributes' => [
                    'order_id' => $order->id,
                    'business_card_id' => $order->business_card_id,
                    'paper_stock' => $order->paper_stock,
                    'corner_style' => $order->corner_style,
                    'quantity' => $order->quantity,
                    'upload_files' => $order->upload_files,
                    'product_type' => 'business_card',
                    'customer_name' => $order->businessCard->name,
                    'customer_email' => $order->businessCard->email,
                    'company_name' => $order->businessCard->company
                ],
            ]);
        } else {
            // 👇 If not exists, add it fresh
            $this->addToCart($request, $order);
        }
    }

    /**
     * Get quantity options for dropdown
     */
    public function getQuantityOptions()
    {
        return [
            ['value' => 50, 'label' => '50 cards'],
            ['value' => 100, 'label' => '100 cards - $25'],
            ['value' => 200, 'label' => '200 cards - $42'],
            ['value' => 500, 'label' => '500 cards - $200'],
            ['value' => 1000, 'label' => '1,000 cards - $380'],
            ['value' => 2000, 'label' => '2,000 cards - $700'],
            ['value' => 5000, 'label' => '5,000 cards - $1,500'],
            ['value' => 10000, 'label' => '10,000 cards - $2,500'],
            ['value' => 50000, 'label' => '50,000+ cards - Contact us']
        ];
    }

    /**
     * Create Stripe payment intent
     */
    public function createPaymentIntent(Request $request)
    {
        try {
            $amount = $request->amount; // Amount in cents
            
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $amount,
                'currency' => 'usd',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);
            
            return response()->json([
                'client_secret' => $paymentIntent->client_secret
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}