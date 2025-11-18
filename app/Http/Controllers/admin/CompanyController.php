<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Show the form for creating a new company
     */
    public function create()
    {
        $user = Auth::user();
        
        // Check if user already has a company
        if ($user->administeredCompany) {
            return redirect()->route('admin.company.edit')
                ->with('info', 'You already have a company. You can edit it here.');
        }
        
        $page_title = 'Create Company';
        return view('admin.company.create', compact('page_title'));
    }

    /**
     * Store a newly created company
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        
        // Check if user already has a company
        if ($user->administeredCompany) {
            return redirect()->route('admin.company.edit')
                ->with('info', 'You already have a company.');
        }
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'address' => 'nullable|string|max:500',
            'industry' => 'nullable|string|max:255',
            'billing_email' => 'nullable|email|max:255',
            'billing_phone' => 'nullable|string|max:20',
            'plan' => 'required|in:Basic,Standard,Enterprise',
            'options' => 'required|in:Clientele,Employees,Both',
            'description' => 'nullable|string|max:1000'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $company = Company::create([
            'name' => $request->name,
            'website' => $request->website,
            'address' => $request->address,
            'industry' => $request->industry,
            'billing_email' => $request->billing_email,
            'billing_phone' => $request->billing_phone,
            'plan' => $request->plan,
            'options' => $request->options,
            'description' => $request->description,
            'admin_user_id' => $user->id
        ]);

        return redirect()->route('admin.company_employee.index')
            ->with('success', 'Company created successfully! You can now manage employees.');
    }

    /**
     * Show the form for editing the company
     */
    public function edit()
    {
        $user = Auth::user();
        $company = $user->administeredCompany;
        
        if (!$company) {
            return redirect()->route('admin.company.create')
                ->with('info', 'Please create a company first.');
        }
        
        $page_title = 'Edit Company';
        return view('admin.company.edit', compact('company', 'page_title'));
    }

    /**
     * Update the company
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $company = $user->administeredCompany;
        
        if (!$company) {
            return redirect()->route('admin.company.create')
                ->with('error', 'Company not found. Please create a company first.');
        }
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'address' => 'nullable|string|max:500',
            'industry' => 'nullable|string|max:255',
            'billing_email' => 'nullable|email|max:255',
            'billing_phone' => 'nullable|string|max:20',
            'plan' => 'required|in:Basic,Standard,Enterprise',
            'options' => 'required|in:Clientele,Employees,Both',
            'description' => 'nullable|string|max:1000'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $company->update([
            'name' => $request->name,
            'website' => $request->website,
            'address' => $request->address,
            'industry' => $request->industry,
            'billing_email' => $request->billing_email,
            'billing_phone' => $request->billing_phone,
            'plan' => $request->plan,
            'options' => $request->options,
            'description' => $request->description
        ]);

        return redirect()->route('admin.company.edit')
            ->with('success', 'Company updated successfully!');
    }
}

