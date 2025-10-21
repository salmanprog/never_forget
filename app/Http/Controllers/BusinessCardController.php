<?php

namespace App\Http\Controllers;

use App\Models\BusinessCard;
use App\Models\BusinessCardTemplate;
use App\Models\BusinessCardOrder;
use App\Models\BusinessCardOption;
use App\Models\UserBusinessCardDesign;
use App\Http\Controllers\BusinessCardOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BusinessCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $templates = BusinessCardTemplate::active()->orderBy('sort_order')->get();
        return view('website.business-cards.index', compact('templates'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $templateId = $request->get('template_id');
        
        if ($templateId) {
            $template = BusinessCardTemplate::with('elements')->findOrFail($templateId);
        } else {
            // Create a default template for simple creation
            $template = new BusinessCardTemplate();
            $template->id = 0;
            $template->name = 'Simple Business Card';
            $template->template_data = (object)[
                'background_color' => '#ffffff',
                'text_color' => '#333333',
                'layout' => 'simple'
            ];
            $template->elements = collect([]);
        }
        
        return view('website.business-cards.create', compact('template'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if this is a business card order (coming from order form)
        if ($request->has('paper_stock')) {
            // This is a business card order - handle it here
            return $this->handleBusinessCardOrder($request);
        }
        
        // This is a regular business card creation
        $request->validate([
            'template_id' => 'nullable|exists:business_card_templates,id',
            'name' => 'required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'address' => 'nullable|string|max:500',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'upload_files' => 'nullable|array',
            'upload_files.*' => 'nullable|file|mimes:pdf,png,jpg,jpeg,jp2|max:51200', // 50MB max
            'design_data' => 'nullable|string',
            'corner_style' => 'required|in:standard,rounded',
            'paper_stock' => 'nullable|string|in:matte,glossy,premium,kraft',
            'quantity' => 'nullable|string',
            'custom_quantity' => 'nullable|string',
            'text_font' => 'nullable|string',
            'text_color' => 'nullable|string',
            'card_shape' => 'nullable|string',
            'card_orientation' => 'nullable|string',
            'card_weight' => 'nullable|string',
            'text_alignment' => 'nullable|string',
            'background_color' => 'nullable|string',
            'notes' => 'nullable|string|max:1000',
            'is_front_design' => 'nullable|boolean',
        ]);

        $data = $request->only([
            'template_id', 'name', 'job_title', 'company', 'phone', 'email', 'website', 'address',
            'corner_style', 'paper_stock', 'quantity', 'custom_quantity', 'text_font', 'text_color', 
            'card_shape','card_orientation','card_weight','text_alignment','background_color', 'notes', 'design_data', 'is_front_design'
        ]);
        
        $data['user_id'] = Auth::id();
        $data['status'] = 'draft';
        
        // Handle template_id if not provided or empty
        if (!$data['template_id'] || $data['template_id'] === '') {
            $data['template_id'] = null; // No template for uploaded designs
        }
        
        // Note: category_id doesn't exist in the database schema

        // Handle color fields
        if ($request->text_color) {
            $data['text_color'] = $request->text_color;
        }
        if ($request->background_color) {
            $data['background_color'] = $request->background_color;
        }

        if ($request->font_family_select) {
            $data['text_font'] = $request->font_family_select;
        }
         if ($request->card_shape) {
            $data['card_shape'] = $request->card_shape;
        }
         if ($request->card_orientation) {
            $data['card_orientation'] = $request->card_orientation;
        }
        if ($request->card_weight) {
            $data['card_weight'] = $request->card_weight;
        }
        if ($request->text_alignment) {
            $data['text_alignment'] = $request->text_alignment;
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            
            // Create directory if it doesn't exist
            $uploadDir = public_path('admin/assets/images/business_cards/logos/');
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $fileName = date('YmdHis') . '.' . $logo->getClientOriginalExtension();
            $logo->move($uploadDir, $fileName);
            $data['logo_path'] = $fileName;
        }

        // Handle upload_files (for business card orders)
        if ($request->hasFile('upload_files')) {
            $uploadFileNames = [];
            foreach ($request->file('upload_files') as $file) {
                $uploadDir = public_path('admin/assets/images/business_cards/uploads/');
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                
                $fileName = date('YmdHis') . '.' . $file->getClientOriginalExtension();
                $file->move($uploadDir, $fileName);
                $uploadFileNames[] = $fileName;
            }
            
            // Use first upload as logo if no logo is provided
            if (!$request->hasFile('logo') && !empty($uploadFileNames)) {
                $data['logo_path'] = $uploadFileNames[0];
            }
            
            // Update design_data with upload filenames
            $designData = $request->design_data ? json_decode($request->design_data, true) : [];
            $designData['upload_files'] = $uploadFileNames;
            $data['design_data'] = json_encode($designData);
        }

        // Update design_data with form data if not already set
        if (!$request->hasFile('upload_files')) {
            $designData = $request->design_data ? json_decode($request->design_data, true) : [];
            
            if ($request->paper_stock) $designData['paper_stock'] = $request->paper_stock;
            if ($request->quantity) $designData['quantity'] = $request->quantity;
            if ($request->custom_quantity) $designData['custom_quantity'] = $request->custom_quantity;
            if ($request->text_color) $designData['text_color'] = $request->text_color;
            if ($request->background_color) $designData['background_color'] = $request->background_color;
            if ($request->notes) $designData['notes'] = $request->notes;
            
            $data['design_data'] = json_encode($designData);
        }

        $businessCard = BusinessCard::create($data);

        // Always redirect after creation

        return redirect()->route('business-cards.show', $businessCard)
            ->with('success', 'Business card created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessCard $businessCard)
    {
        $businessCard->load(['template', 'template.elements']);
        return view('website.business-cards.show', compact('businessCard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessCard $businessCard)
    {
        $businessCard->load(['template', 'template.elements']);
        
        // Fetch related business card orders
        $businessCardOrders = BusinessCardOrder::where('business_card_id', $businessCard->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Get the latest order if exists
        $latestOrder = $businessCardOrders->first();
        
        return view('website.business-cards.edit', compact('businessCard', 'businessCardOrders', 'latestOrder'));
    }
    public function update(Request $request, BusinessCard $businessCard)
    {
        // Debug logging
        \Log::info('Business Card Update Request:', [
            'business_card_id' => $businessCard->id,
            'request_data' => $request->all(),
            'files' => $request->allFiles(),
            'is_ajax' => $request->ajax()
        ]);

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'job_title' => 'nullable|string|max:255',
                'company' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255',
                'website' => 'nullable|url|max:255',
                'address' => 'nullable|string|max:500',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'template_id' => 'nullable|exists:business_card_templates,id',
                'corner_style' => 'required|in:standard,rounded',
                'paper_stock' => 'nullable|string|in:matte,glossy,premium,kraft',
                'quantity' => 'nullable|string',
                'custom_quantity' => 'nullable|string',
                'upload_files' => 'nullable|array',
                'upload_files.*' => 'nullable|file|mimes:pdf,png,jpg,jpeg,jp2|max:10240',
                'back_upload_files' => 'nullable|array',
                'back_upload_files.*' => 'nullable|file|mimes:pdf,png,jpg,jpeg,jp2|max:10240',
                'text_color' => 'nullable|string',
                'background_color' => 'nullable|string',
                'notes' => 'nullable|string|max:1000',
                'design_data' => 'nullable|string',
                'is_front_design' => 'nullable|boolean',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation failed:', $e->errors());
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $e->errors()
                ], 422);
            }
            
            throw $e;
        }

        $data = $request->only([
            'name', 'job_title', 'company', 'phone', 'email', 'website', 'address', 
            'template_id', 'corner_style', 'paper_stock', 'quantity', 'custom_quantity',
            'text_color', 'background_color', 'notes', 'design_data', 'is_front_design'
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($businessCard->logo_path) {
                $oldLogoPath = public_path($businessCard->logo_path);
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }
            
            $logo = $request->file('logo');
            
            // Create directory if it doesn't exist
            $uploadDir = public_path('admin/assets/images/business_cards/logos/');
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $fileName = date('YmdHis') . '.' . $logo->getClientOriginalExtension();
            $logo->move($uploadDir, $fileName);
            $data['logo_path'] = $fileName;
        }

        // Handle file uploads and always update design_data with form data
        $designData = $businessCard->design_data ? json_decode($businessCard->design_data, true) : [];
        
        if ($request->hasFile('upload_files')) {
            $uploadFileNames = [];
            foreach ($request->file('upload_files') as $file) {
                $uploadDir = public_path('admin/assets/images/business_cards/uploads/');
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                
                $fileName = date('YmdHis') . '_front.' . $file->getClientOriginalExtension();
                $file->move($uploadDir, $fileName);
                $uploadFileNames[] = $fileName;
            }
            
            // Update design_data with upload filenames
            $designData['front_upload_files'] = $uploadFileNames;
        }
        
        if ($request->hasFile('back_upload_files')) {
            $backUploadFileNames = [];
            foreach ($request->file('back_upload_files') as $file) {
                $uploadDir = public_path('admin/assets/images/business_cards/uploads/');
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                
                $fileName = date('YmdHis') . '_back.' . $file->getClientOriginalExtension();
                $file->move($uploadDir, $fileName);
                $backUploadFileNames[] = $fileName;
            }
            
            // Update design_data with back upload filenames
            $designData['back_upload_files'] = $backUploadFileNames;
        }
        
        // Always update design_data with form data (paper_stock, quantity, etc.)
        if ($request->paper_stock) $designData['paper_stock'] = $request->paper_stock;
        if ($request->quantity) $designData['quantity'] = $request->quantity;
        if ($request->custom_quantity) $designData['custom_quantity'] = $request->custom_quantity;
        if ($request->text_color) $designData['text_color'] = $request->text_color;
        if ($request->background_color) $designData['background_color'] = $request->background_color;
        if ($request->notes) $designData['notes'] = $request->notes;
        
        $data['design_data'] = json_encode($designData);

        try {
            $businessCard->update($data);
            
            \Log::info('Business card updated successfully:', [
                'business_card_id' => $businessCard->id,
                'updated_data' => $data
            ]);
        } catch (\Exception $e) {
            \Log::error('Failed to update business card:', [
                'business_card_id' => $businessCard->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update business card: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->route('business-cards.edit', $businessCard)
                ->with('error', 'Failed to update business card: ' . $e->getMessage());
        }

        // Handle AJAX requests
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Business card updated successfully!',
                'redirect_url' => route('business-cards.show', $businessCard)
            ]);
        }

        // Redirect back to edit page with success message
        return redirect()->route('business-cards.edit', $businessCard)
            ->with('success', 'Business card updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessCard $businessCard)
    {
        // Delete logo if exists
        if ($businessCard->logo_path) {
            $logoPath = public_path($businessCard->logo_path);
            if (file_exists($logoPath)) {
                unlink($logoPath);
            }
        }

        $businessCard->delete();

        // Redirect to index page with success message
        return redirect()->route('business-cards.index')
            ->with('success', 'Business card deleted successfully!');
    }

    /**
     * Save user design
     */
    public function saveDesign(Request $request)
    {
        $request->validate([
            'business_card_id' => 'required|exists:business_cards,id',
            'design_name' => 'required|string|max:255',
            'front_design_data' => 'required|json',
            'back_design_data' => 'nullable|json',
        ]);

        $design = UserBusinessCardDesign::create([
            'user_id' => Auth::id(),
            'business_card_id' => $request->business_card_id,
            'design_name' => $request->design_name,
            'front_design_data' => json_decode($request->front_design_data, true),
            'back_design_data' => $request->back_design_data ? json_decode($request->back_design_data, true) : null,
            'last_modified' => now(),
        ]);

        // Redirect back to business card page with success message
        return redirect()->route('business-cards.show', $design->business_card_id)
            ->with('success', 'Design saved successfully!');
    }

    /**
     * Export business card as PDF
     */
    public function exportPdf(BusinessCard $businessCard)
    {
        $businessCard->load(['template', 'template.elements']);
        
        $pdf = Pdf::loadView('website.business-cards.pdf', compact('businessCard'))
            ->setPaper([0, 0, 252, 144], 'portrait') // 3.5" x 2" in points
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

        return $pdf->download('business-card-' . $businessCard->id . '.pdf');
    }

    /**
     * Export business card as PNG
     */
    public function exportPng(BusinessCard $businessCard)
    {
        $businessCard->load(['template', 'template.elements']);
        
        // Create canvas for business card (3.5" x 2" at 300 DPI)
        $width = 1050; // 3.5 inches * 300 DPI
        $height = 600;  // 2 inches * 300 DPI
        
        $image = Image::canvas($width, $height, '#ffffff');
        
        // Add background color or image
        if ($businessCard->template->background_image) {
            $bgImage = Image::make(public_path($businessCard->template->background_image));
            $bgImage->resize($width, $height);
            $image->insert($bgImage);
        } else {
            $image->fill($businessCard->template->background_color);
        }

        // Add text elements
        $designData = $businessCard->design_data;
        if ($designData && isset($designData['elements'])) {
            foreach ($designData['elements'] as $element) {
                if ($element['type'] === 'text') {
                    $fontSize = $element['fontSize'] ?? 12;
                    $color = $element['fill'] ?? '#000000';
                    $x = $element['left'] ?? 0;
                    $y = $element['top'] ?? 0;
                    
                    $image->text($element['text'], $x, $y, function($font) use ($fontSize, $color) {
                        $font->file(public_path('fonts/arial.ttf')); // You'll need to add fonts
                        $font->size($fontSize);
                        $font->color($color);
                    });
                }
            }
        }

        return $image->response('png');
    }

    /**
     * Get templates by category
     */
    public function getTemplatesByCategory($category)
    {
        $templates = BusinessCardTemplate::active()
            ->category($category)
            ->orderBy('sort_order')
            ->get();

        // Redirect to business card index with templates
        return redirect()->route('business-cards.index')
            ->with('templates_category', $category);
    }

    /**
     * Handle business card order creation
     */
    private function handleBusinessCardOrder(Request $request)
    {
        try {
            // Validate the order request
            $request->validate([
                'paper_stock' => 'required|string',
                'corner_style' => 'required|string|in:standard,rounded',
                'quantity' => 'required|numeric|min:1',
                'custom_quantity' => 'nullable|string',
                'upload_files' => 'nullable|array',
                'upload_files.*' => 'file|mimes:pdf,png,jpg,jpeg,jp2|max:51200', // 50MB max
                'back_upload_files' => 'nullable|array',
                'back_upload_files.*' => 'file|mimes:pdf,png,jpg,jpeg,jp2|max:51200', // 50MB max
                'notes' => 'nullable|string|max:1000',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'company' => 'nullable|string|max:255',
                'job_title' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:500',
                'text_color' => 'nullable|string',
                'background_color' => 'nullable|string',
            ]);

            // Ensure at least one design file is uploaded
            if (!$request->hasFile('upload_files') && !$request->hasFile('back_upload_files')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please upload at least one design file (front or back)'
                ], 422);
            }

            // Handle front design file uploads
            $frontUploadFileNames = [];
            if ($request->hasFile('upload_files')) {
                $uploadDir = public_path('admin/assets/images/business_cards/uploads/');
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                foreach ($request->file('upload_files') as $index => $file) {
                    $timestamp = date('YmdHis') . '_' . $index;
                    $fileName = $timestamp . '_front.' . $file->getClientOriginalExtension();
                    $file->move($uploadDir, $fileName);
                    $frontUploadFileNames[] = $fileName;
                }
            }

            // Handle back design file uploads
            $backUploadFileNames = [];
            if ($request->hasFile('back_upload_files')) {
                $uploadDir = public_path('admin/assets/images/business_cards/uploads/');
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                foreach ($request->file('back_upload_files') as $index => $file) {
                    $timestamp = date('YmdHis') . '_' . ($index + 100); // Add offset to avoid conflicts
                    $fileName = $timestamp . '_back.' . $file->getClientOriginalExtension();
                    $file->move($uploadDir, $fileName);
                    $backUploadFileNames[] = $fileName;
                }
            }

            // Combine all upload files and remove duplicates
            $uploadFileNames = array_unique(array_merge($frontUploadFileNames, $backUploadFileNames));

            if ($request->input('business_card_image_front')) {
                $imageDataFront = $request->input('business_card_image_front');
                $imageFront = str_replace('data:image/png;base64,', '', $imageDataFront);
                $imageFront = str_replace(' ', '+', $imageFront);
                $imageNameFront = 'card_front' . time() . '.png';
                Storage::disk('public')->put('business_cards/' . $imageNameFront, base64_decode($imageFront));

                $request->merge(['card_front_image' => 'business_cards/' . $imageNameFront]);
            }
            if ($request->input('business_card_image_back')) {
                $imageDataBack = $request->input('business_card_image_back');
                $imageBack = str_replace('data:image/png;base64,', '', $imageDataBack);
                $imageBack = str_replace(' ', '+', $imageBack);
                $imageNameBack = 'card_back' . time() . '.png';
                Storage::disk('public')->put('business_cards/' . $imageNameBack, base64_decode($imageBack));

                $request->merge(['card_back_image' => 'business_cards/' . $imageNameBack]);
            }
            // Handle quantity (regular or custom)
            $quantity = $request->quantity;
            if ($request->quantity === 'custom' && $request->custom_quantity) {
                $quantity = $request->custom_quantity;
            }

            // Calculate pricing
            $totalPrice = \App\Models\BusinessCardOrder::calculateTotal(
                $quantity, 
                $request->paper_stock, 
                $request->corner_style
            );

            // First create a business card record for customer reference
            $businessCard = BusinessCard::create([
                'user_id' => auth()->id(),
                'template_id' => null, // No template for uploaded designs
                'name' => $request->name,
                'job_title' => $request->job_title,
                'company' => $request->company,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'logo_path' => $frontUploadFileNames[0] ?? null, // Use first front upload as logo
                'notes' => $request->notes,
                'design_data' => json_encode([
                    'front_upload_files' => $frontUploadFileNames,
                    'back_upload_files' => $backUploadFileNames,       
                ]),
                'corner_style' => $request->corner_style,
                'text_color' => $request->text_color,
                'text_font' => $request->font_family_select,
                'card_shape' => $request->card_shape,
                'card_orientation' => $request->card_orientation,
                'card_weight' => $request->card_weight,
                'text_alignment' => $request->text_alignment,
                'background_color' => $request->background_color,
                'background_front_image' => $frontUploadFileNames[0] ?? '',
                'background_back_image' => $backUploadFileNames[0] ?? '',
                'is_front_design' => !empty($frontUploadFileNames),
                'card_front_image' => 'business_cards/' . $imageNameFront,
                'is_back_design' => !empty($backUploadFileNames),
                'card_back_image' => 'business_cards/' . $imageNameBack,
                'status' => 'order_placed'
            ]);

            // Create business card order with reference to business card
            $order = \App\Models\BusinessCardOrder::create([
                'user_id' => auth()->id(),
                'business_card_id' => $businessCard->id,
                'order_number' => \App\Models\BusinessCardOrder::generateOrderNumber(),
                'paper_stock' => $request->paper_stock,
                'corner_style' => $request->corner_style,
                'quantity' => $quantity,
                'text_color' => $request->text_color ?? '#333333',
                'background_color' => $request->background_color ?? '#ffffff',
                'upload_files' => $uploadFileNames, // Combined front and back files
                'options_data' => json_encode([
                    'paper_display' => \App\Models\BusinessCardOption::where('option_key', $request->paper_stock)->first()->name ?? $request->paper_stock
                ]),
                'base_price' => $totalPrice,
                'total_price' => $totalPrice,
                'status' => 'pending',
                'notes' => $request->notes,
            ]);

            // Add to cart
            $this->addToCart($request, $order);

            // Return JSON response for AJAX requests
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Business card order created successfully!',
                    'order_id' => $order->id,
                    //'redirect_url' => route('business-cards.order.show', $order->id)
                    'redirect_url' => route('cart.list')
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
    private function addToCart(Request $request, $order)
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
                'company_name' => $order->businessCard->company,
                'card_front_image' => $request->card_front_image ?? null,
                'card_back_image'  => $request->card_back_image ?? null,
            ]
        ]);
    }

    /**
     * Get user's saved designs
     */
    public function getUserDesigns()
    {
        $designs = UserBusinessCardDesign::where('user_id', Auth::id())
            ->with('businessCard.template')
            ->orderBy('updated_at', 'desc')
            ->get();

        // Redirect to business card index with user designs
        return redirect()->route('business-cards.index')
            ->with('user_designs', $designs);
    }
}
