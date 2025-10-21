<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessCardOption;
use Illuminate\Support\Facades\Route;

class BusinessCardOptionController extends Controller
{
    public function index()
    {
        $options = BusinessCardOption::all()->groupBy('option_type');
        
        return view('admin.business-card-options.index', compact('options'));
    }

    public function create()
    {
        $optionTypes = [
            'paper_stock' => 'Paper Stock',
            'corner_style' => 'Corner Style',
            'quantity' => 'Quantity',
            'additional_service' => 'Additional Services'
        ];

        return view('admin.business-card-options.create', compact('optionTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'option_type' => 'required|string',
            'option_key' => 'required|string|unique:business_card_options,option_key',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_modifier' => 'required|numeric',
            'is_active' => 'boolean',
            'sort_order' => 'required|integer|min:0'
        ]);

        BusinessCardOption::create($request->all());

        return redirect()->route('admin.business-card-options.index')
                        ->with('success', 'Business card option created successfully.');
    }

    public function show(BusinessCardOption $businessCardOption)
    {
        return view('admin.business-card-options.show', compact('businessCardOption'));
    }

    public function edit(BusinessCardOption $businessCardOption)
    {
        $optionTypes = [
            'paper_stock' => 'Paper Stock',
            'corner_style' => 'Corner Style',
            'quantity' => 'Quantity',
            'additional_service' => 'Additional Services'
        ];

        return view('admin.business-card-options.edit', compact('businessCardOption', 'optionTypes'));
    }

    public function update(Request $request, BusinessCardOption $businessCardOption)
    {
        $request->validate([
            'option_type' => 'required|string',
            'option_key' => 'required|string|unique:business_card_options,option_key,' . $businessCardOption->id,
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_modifier' => 'required|numeric',
            'is_active' => 'boolean',
            'sort_order' => 'required|integer|min:0'
        ]);

        $businessCardOption->update($request->all());

        return redirect()->route('admin.business-card-options.index')
                        ->with('success', 'Business card option updated successfully.');
    }

    public function destroy(BusinessCardOption $businessCardOption)
    {
        $businessCardOption->delete();

        return redirect()->route('admin.business-card-options.index')
                        ->with('success', 'Business card option deleted successfully.');
    }

    public function toggleActive(BusinessCardOption $businessCardOption)
    {
        $businessCardOption->update([
            'is_active' => !$businessCardOption->is_active
        ]);

        return response()->json([
            'success' => true,
            'is_active' => $businessCardOption->is_active,
            'message' => $businessCardOption->is_active ? 'Option activated' : 'Option deactivated'
        ]);
    }

    /**
     * Get options of a specific type via AJAX
     */
    public function getByType(Request $request)
    {
        $options = BusinessCardOption::getByType($request->type);
        
        return response()->json($options);
    }
}