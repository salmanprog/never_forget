<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessCardTemplate;
use App\Models\BusinessCardElement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BusinessCardTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $templates = BusinessCardTemplate::with('elements')->orderBy('sort_order')->get();
        $page_title = 'Business Card Templates';
        return view('admin.business-card-templates.index', compact('templates', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_title = 'Create Business Card Template';
        return view('admin.business-card-templates.create', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'category' => 'required|string|max:50',
            'preview_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'background_color' => 'required|string|max:7',
            'available_colors' => 'required|array',
            'available_fonts' => 'required|array',
            'is_premium' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0'
        ]);

        $data = $request->all();

        // Handle preview image upload
        if ($request->hasFile('preview_image')) {
            $previewImage = $request->file('preview_image');
            $previewPath = 'admin/assets/images/business_cards/templates/previews/' . time() . '_' . $previewImage->getClientOriginalName();
            
            // Create directory if it doesn't exist
            $previewDir = public_path('admin/assets/images/business_cards/templates/previews/');
            if (!file_exists($previewDir)) {
                mkdir($previewDir, 0755, true);
            }
            
            // Resize and save preview image
            $image = Image::make($previewImage)->resize(400, 300);
            $image->save(public_path($previewPath));
            $data['preview_image'] = $previewPath;
        }

        // Handle background image upload
        if ($request->hasFile('background_image')) {
            $bgImage = $request->file('background_image');
            $bgPath = 'admin/assets/images/business_cards/templates/backgrounds/' . time() . '_' . $bgImage->getClientOriginalName();
            
            // Create directory if it doesn't exist
            $bgDir = public_path('admin/assets/images/business_cards/templates/backgrounds/');
            if (!file_exists($bgDir)) {
                mkdir($bgDir, 0755, true);
            }
            
            // Save background image
            $bgImage->move(public_path('admin/assets/images/business_cards/templates/backgrounds/'), $bgPath);
            $data['background_image'] = $bgPath;
        }

        // Set default template data
        $data['template_data'] = [
            'background_color' => $data['background_color'],
            'text_color' => '#333333',
            'accent_color' => '#2563eb'
        ];

        $template = BusinessCardTemplate::create($data);

        return redirect()->route('business_card_templates.index')
            ->with('success', 'Template created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessCardTemplate $businessCardTemplate)
    {
        $businessCardTemplate->load('elements');
        $page_title = 'Show Business Card Template';
        return view('admin.business-card-templates.show', compact('businessCardTemplate', 'page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessCardTemplate $businessCardTemplate)
    {
        $businessCardTemplate->load('elements');
        $page_title = 'Edit Business Card Template';
        return view('admin.business-card-templates.edit', compact('businessCardTemplate', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessCardTemplate $businessCardTemplate)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'category' => 'required|string|max:50',
            'preview_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'background_color' => 'required|string|max:7',
            'available_colors' => 'required|array',
            'available_fonts' => 'required|array',
            'is_premium' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0'
        ]);

        $data = $request->all();

        // Handle preview image upload
        if ($request->hasFile('preview_image')) {
            // Delete old preview image
            if ($businessCardTemplate->preview_image) {
                $oldPreviewPath = public_path($businessCardTemplate->preview_image);
                if (file_exists($oldPreviewPath)) {
                    unlink($oldPreviewPath);
                }
            }
            
            $previewImage = $request->file('preview_image');
            $previewPath = 'admin/assets/images/business_cards/templates/previews/' . time() . '_' . $previewImage->getClientOriginalName();
            
            // Create directory if it doesn't exist
            $previewDir = public_path('admin/assets/images/business_cards/templates/previews/');
            if (!file_exists($previewDir)) {
                mkdir($previewDir, 0755, true);
            }
            
            // Resize and save preview image
            $image = Image::make($previewImage)->resize(400, 300);
            $image->save(public_path($previewPath));
            $data['preview_image'] = $previewPath;
        }

        // Handle background image upload
        if ($request->hasFile('background_image')) {
            // Delete old background image
            if ($businessCardTemplate->background_image) {
                $oldBgPath = public_path($businessCardTemplate->background_image);
                if (file_exists($oldBgPath)) {
                    unlink($oldBgPath);
                }
            }
            
            $bgImage = $request->file('background_image');
            $bgPath = 'admin/assets/images/business_cards/templates/backgrounds/' . time() . '_' . $bgImage->getClientOriginalName();
            
            // Create directory if it doesn't exist
            $bgDir = public_path('admin/assets/images/business_cards/templates/backgrounds/');
            if (!file_exists($bgDir)) {
                mkdir($bgDir, 0755, true);
            }
            
            // Save background image
            $bgImage->move(public_path('admin/assets/images/business_cards/templates/backgrounds/'), $bgPath);
            $data['background_image'] = $bgPath;
        }

        $businessCardTemplate->update($data);

        return redirect()->route('business_card_templates.index')
            ->with('success', 'Template updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessCardTemplate $businessCardTemplate)
    {
        // Delete associated images
        if ($businessCardTemplate->preview_image) {
            $previewPath = public_path($businessCardTemplate->preview_image);
            if (file_exists($previewPath)) {
                unlink($previewPath);
            }
        }
        if ($businessCardTemplate->background_image) {
            $bgPath = public_path($businessCardTemplate->background_image);
            if (file_exists($bgPath)) {
                unlink($bgPath);
            }
        }

        $businessCardTemplate->delete();

        return redirect()->route('business_card_templates.index')
            ->with('success', 'Template deleted successfully');
    }

    /**
     * Toggle template active status
     */
    public function toggleActive(BusinessCardTemplate $businessCardTemplate)
    {
        $businessCardTemplate->update(['is_active' => !$businessCardTemplate->is_active]);
        
        return response()->json([
            'success' => true,
            'is_active' => $businessCardTemplate->is_active
        ]);
    }

    /**
     * Duplicate template
     */
    public function duplicate(BusinessCardTemplate $businessCardTemplate)
    {
        $newTemplate = $businessCardTemplate->replicate();
        $newTemplate->name = $businessCardTemplate->name . ' (Copy)';
        $newTemplate->is_active = false;
        $newTemplate->save();

        // Duplicate elements
        foreach ($businessCardTemplate->elements as $element) {
            $newElement = $element->replicate();
            $newElement->template_id = $newTemplate->id;
            $newElement->save();
        }

        return redirect()->route('business_card_templates.index')
            ->with('success', 'Template duplicated successfully');
    }
}
