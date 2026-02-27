<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\City;
use App\Models\State;
use App\Models\Role as UserRole;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use App\Models\Company;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        
        if($request->ajax()){
            $query = User::orderby('id', 'desc')->where('id', '>', 0);
            
            // Check if current user is a company admin
            if($user->isCompanyAdmin()) {
                // Company admin can only see users from their company
                $company = $user->administeredCompany;
                $query->where('company_id', $company->id);
            } else {
                // Admin can see all users, filter by type if specified
                if($request['type'] && $request['type'] != "All"){
                    // Map 'salesperson' to 'Sales Person' for database query
                    $accountType = $request['type'] == 'salesperson' ? 'Sales Person' : $request['type'];
                    $query->where('account_type', $accountType);
                }
            }
            
            if($request['search'] != ""){
                $query->where(function($q) use ($request) {
                    $q->where('name', 'like', '%'. $request['search'] .'%')
                      ->orWhere('last_name', 'like', '%'. $request['search'].'%')
                      ->orWhere('email', 'like', '%'. $request['search'].'%');
                });
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $users = $query->paginate(10);
            return (string) view('admin.user.search', compact('users'));
        }
        
        $query = User::orderBy('id','DESC');
        
        // Check if current user is a company admin
        if($user->isCompanyAdmin()) {
            // Company admin can only see users from their company
            $company = $user->administeredCompany;
            $query->where('company_id', $company->id);
            $page_title = $company->name . ' - Company Users';
        } else {
            // Admin can see all users, filter by type if specified
            if($request->get('type')){
                // Map 'salesperson' to 'Sales Person' for database query
                $accountType = $request->get('type') == 'salesperson' ? 'Sales Person' : $request->get('type');
                $query->where('account_type', $accountType);
                $page_title = $accountType == 'Sales Person' ? 'Sales Person Users' : ucfirst($request->get('type')) . ' Users';
            } else {
                $page_title = 'All Users';
            }
        }
        
        $users = $query->paginate(10);
        return view('admin.user.index', compact('users','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Sales Person';
        $salesperson_roles = Role::orderby('id', 'desc')->where('name', 'Sales Person')->get(['name', 'id']);
        $roles = Role::orderby('id', 'desc')->get(['name', 'id']);
        return view('admin.user.create',compact('roles','page_title','salesperson_roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required', 
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'account_type' => 'required', 
        ]);

        // Generate unique verify_token
        do{
            $verify_token = uniqid();
        }while(User::where('verify_token', $verify_token)->first());
        
        // Generate unique user_id
        do{
            $user_id = rand(1000, 9999);
        }while(User::where('user_id', $user_id)->first());

        $user = User::create([
            'name' => $request->first_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'account_type' => $request->account_type,
            'password' => Hash::make($request->password),
            'status' => 1, // Activate account
            'verify_token' => $verify_token,
            'user_id' => $user_id,
        ]);

        $user->assignRole($request->input('account_type'));

        // Generate verification link
        $verification_link = route('email-verification', $verify_token);

        // Send email to salesperson
        $details = [
            'from' => 'verify',
            'title' => "Hi ".$request->first_name.' '.$request->last_name.',',
            'body' => "Your Sales Person account has been created successfully on NEVER FORGET Showing Appreciation. Please verify your email address by clicking on the verification link below to activate your account.",
            'regard' => 'We look forward to seeing you soon.',
            'account_type' => 'Sales Person',
            'verify_token' => $verify_token,
            'email' => $request->email,
            'password' => $request->password,
            'login_url' => route('login'),
        ];

        try {
            \Mail::to($user->email)->send(new \App\Mail\Email($details));
            $message = 'Sales Person created successfully. An email has been sent with login credentials and verification link.';
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Failed to send email to salesperson: ' . $e->getMessage());
            // Still show success but include verification link in message
            $message = 'Sales Person created successfully. Email could not be sent (check logs). Verification link: ' . $verification_link;
        }

        return redirect()->route('user.index')
                        ->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Edit Customer';
        $user = User::with('roles')->find($id);
        $roles = Role::orderby('id', 'desc')->get(['name', 'id']);
        $userRole = $user->roles->pluck('name','name')->all();
        $company = ($user->account_type == 'Company') ? ($user->administeredCompany ?? $user->company) : null;
        return view('admin.user.edit', compact('user', 'roles', 'userRole', 'page_title', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|max:200|email|unique:users,email,'.$id,
        ]);

        $user = User::find($id);

        if(!empty($request->input('password'))){
            $user->password = Hash::make($request->input('password'));
        }
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->status = $request->input('status', 1);
        $user->update();

        if ($user->account_type == 'Company') {
            $company = $user->administeredCompany ?? $user->company;
            if (!$company) {
                $company = new Company();
                $company->admin_user_id = $user->id;
                $company->name = $request->input('billing_company', $request->input('company_name', $user->name));
                $company->plan = 'Basic';
                $company->options = 'Both';
                $company->save();
            }
            $company->name = $request->input('billing_company', $request->input('company_name', $company->name));
            $company->registration_number = $request->input('registration_number', $company->registration_number);
            $company->industry = $request->input('industry', $company->industry);
            $company->website = $request->input('company_website', $company->website);
            $company->year_established = $request->input('year_established', $company->year_established);
            $company->number_of_employees = $request->filled('number_of_employees') ? (int) $request->number_of_employees : $company->number_of_employees;
            $company->primary_contact_name = $request->filled('billing_first_name') ? trim($request->billing_first_name . ' ' . $request->input('billing_last_name', '')) : $request->input('primary_contact_name', $company->primary_contact_name);
            $company->job_title = $request->input('job_title', $company->job_title);
            $company->billing_email = $request->input('billing_email', $company->billing_email);
            $company->billing_phone = $request->input('billing_phone', $company->billing_phone);
            $company->billing_address_line_1 = $request->input('billing_address_line_1', $company->billing_address_line_1);
            $company->billing_address_line_2 = null; // Single Street field used (same as Create Billing Address form)
            $company->city = $request->input('billing_city', $company->city);
            $company->state = $request->input('billing_state', $company->state);
            $company->zip_code = $request->input('billing_zip_code', $company->zip_code);
            $company->billing_country = $request->input('billing_country', $company->billing_country);
            if ($request->hasFile('company_logo')) {
                $logoDir = public_path('admin/assets/images/company-logos');
                File::ensureDirectoryExists($logoDir, 0755, true);
                $logoName = 'company_logo_' . $company->id . '_' . time() . '.' . $request->file('company_logo')->getClientOriginalExtension();
                $request->file('company_logo')->move($logoDir, $logoName);
                $company->logo = $logoName;
            }
            $company->is_profile_completed = $this->isCompanyProfileComplete($company) ? 1 : 0;
            $company->save();
        }

        if($request->input('user_role') == 'Sales Person'){
            return redirect()->to(route('user.index') . '?type=salesperson')->with('message','Sales Person updated successfully');
        }else{
            return redirect()->route('user.index')->with('message','Customer updated successfully');
        }
    }

    /**
     * Individual read-only profile (My Profile).
     */
    public function IndividualProfileShow()
    {
        if (Auth::user()->account_type == 'Company') {
            return redirect()->route('company.profile');
        }
        $page_title = 'My Profile';
        $user = User::where('id', Auth::user()->id)->first();
        return view('website.individual-dashboard.profile', compact('user', 'page_title'));
    }

    public function IndividualEditProfile()
    {
        if (Auth::user()->account_type == 'Company') {
            return redirect()->route('company.profile.edit');
        }
        $page_title = 'Edit Profile';
        $cities = City::where('status', 1)->get();
        $states = State::where('city_id')->get();
        $user = User::where('id', Auth::user()->id)->first();
        return view('website.individual-dashboard.edit', compact('cities', 'states', 'user', 'page_title'));
    }

    /**
     * Read-only company profile view (sidebar "Company Profile" link).
     */
    public function CompanyProfileShow()
    {
        if (Auth::user()->account_type != 'Company') {
            return redirect()->route('member.profile.edit');
        }
        $page_title = 'Company Profile';
        $user = User::where('id', Auth::user()->id)->first();
        $company = $user->administeredCompany;
        return view('website.company-dashboard.profile', compact('user', 'company', 'page_title'));
    }

    /**
     * Edit company profile form (header "Edit Profile" button).
     */
    public function CompanyEditProfile()
    {
        if (Auth::user()->account_type != 'Company') {
            return redirect()->route('member.profile.edit');
        }
        $page_title = 'Edit Profile';
        $user = User::where('id', Auth::user()->id)->first();
        $company = $user->administeredCompany;
        return view('website.company-dashboard.edit', compact('user', 'company', 'page_title'));
    }

    public function SalesPersonEditProfile()
    {
        $page_title = 'Edit Profile'; 
        $user =  User::where('id', Auth::user()->id)->first();
        return view('website.sales-person-dashboard.edit', compact('user', 'page_title'));
    }

    public function individualUpdateProfile(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        /*  $user->middle_name = $request->middle_name; */
        $user->last_name = $request->last_name;
        $user->phone = $request->phone ?? $user->phone;
        $user->address = $request->address ?? $user->address;
        $user->designation = $request->designation ?? $user->designation;
       /*  $user->team = $request->team; */
        $user->about_me = $request->about_me ?? $user->about_me;
        $user->date_of_birth = $request->date_of_birth ?? $user->date_of_birth;
        $user->gender = $request->gender ?? $user->gender;
        $user->whatsapp = $request->whatsapp ?? $user->whatsapp;
        $user->facebook = $request->facebook ?? $user->facebook;
        $user->twitter = $request->twitter ?? $user->twitter;
        $user->linkedin = $request->linkedin ?? $user->linkedin;
        $user->city_id = $request->city_id ?? $user->city_id;
        $user->state_id = $request->state_id ?? $user->state_id;
        $user->zip_code = $request->zip_code ?? $user->zip_code;
        if (isset($request->image)) {
            $photo = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/UserImage'), $photo);
            $user->image = $photo;
        }

        if (empty($request->name)) {
            $this->validate($request, [
                'name' => 'required',
                'city_id' => 'required',
                'state_id' => 'required',
            ]);
        }

        if (isset($request->password)) {
            $this->validate($request, [
                'name' => 'required',
                'password' => 'required|same:confirm-password',
            ]);
            $user->password = Hash::make($request->password);
        }

        // Company account type: validate required company fields before saving
        if ($user->account_type == 'Company') {
            $companyForValidation = $user->administeredCompany;
            $logoRequired = !$companyForValidation || empty(trim($companyForValidation->logo ?? ''));
            $companyRules = [
                'billing_first_name' => 'required|max:255',
                'billing_last_name'  => 'required|max:255',
                'billing_company'    => 'required|max:255',
                'billing_country'   => 'required|max:255',
                'number_of_employees' => 'required|integer|min:0',
                'billing_email'     => 'required|email',
                'billing_phone'     => 'required|max:50',
            ];
            if ($logoRequired) {
                $companyRules['company_logo'] = 'required';
            }
            $this->validate($request, $companyRules, [
                'billing_first_name.required' => 'First Name is required.',
                'billing_last_name.required'  => 'Last Name is required.',
                'billing_company.required'   => 'Company is required.',
                'billing_country.required'   => 'Country is required.',
                'number_of_employees.required' => 'Number of Employees is required.',
                'number_of_employees.integer'  => 'Number of Employees must be a number.',
                'number_of_employees.min'      => 'Number of Employees must be 0 or more.',
                'billing_email.required' => 'Email is required.',
                'billing_email.email'    => 'Email must be a valid email address.',
                'billing_phone.required' => 'Phone is required.',
                'company_logo.required'  => 'Company Logo is required.',
            ]);
        }

        $user->update();

        // Company account type: save/update company profile fields
        if ($user->account_type == 'Company') {
            $company = $user->administeredCompany;
            if (!$company) {
                $company = new Company();
                $company->admin_user_id = $user->id;
                $company->name = $request->billing_company ?? $request->company_name ?? $user->name;
                $company->plan = 'Basic';
                $company->options = 'Both';
                $company->save();
            }
            $company->name = $request->billing_company ?? $request->company_name ?? $company->name;
            $company->registration_number = $request->registration_number ?? $company->registration_number;
            $company->industry = $request->industry ?? $company->industry;
            $company->website = $request->company_website ?? $company->website;
            $company->year_established = $request->year_established ?? $company->year_established;
            $company->number_of_employees = $request->filled('number_of_employees') ? (int) $request->number_of_employees : $company->number_of_employees;
            $company->primary_contact_name = $request->filled('billing_first_name') ? trim($request->billing_first_name . ' ' . ($request->billing_last_name ?? '')) : ($request->primary_contact_name ?? $company->primary_contact_name);
            $company->job_title = $request->job_title ?? $company->job_title;
            $company->billing_email = $request->billing_email ?? $company->billing_email;
            $company->billing_phone = $request->billing_phone ?? $company->billing_phone;
            $company->billing_address_line_1 = $request->billing_address_line_1 ?? $company->billing_address_line_1;
            $company->billing_address_line_2 = null; // Single Street field (same as Create Billing Address form)
            $company->city = $request->billing_city ?? $company->city;
            $company->state = $request->billing_state ?? $company->state;
            $company->zip_code = $request->billing_zip_code ?? $company->zip_code;
            $company->billing_country = $request->billing_country ?? $company->billing_country;
            if ($request->hasFile('company_logo')) {
                $logoDir = public_path('admin/assets/images/company-logos');
                File::ensureDirectoryExists($logoDir, 0755, true);
                $logoName = 'company_logo_' . $company->id . '_' . time() . '.' . $request->file('company_logo')->getClientOriginalExtension();
                $request->file('company_logo')->move($logoDir, $logoName);
                $company->logo = $logoName;
            }
            $company->is_profile_completed = $this->isCompanyProfileComplete($company) ? 1 : 0;
            $company->save();
        }

        return redirect()->back()->with('message', 'Profile updated successfully');
    }

    /**
     * Check if company has all required profile fields filled.
     */
    private function isCompanyProfileComplete(Company $company)
    {
        return !empty(trim($company->name ?? ''))
            && !empty(trim($company->billing_email ?? ''))
            && !empty(trim($company->billing_phone ?? ''));
    }
    public function SalesPersonUpdateProfile(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->address = $request->address; 
        if (isset($request->password)) {
            $this->validate($request, [ 
                'password' => 'required|same:confirm-password',
            ]);

            $user->password = Hash::make($request->password);
        }

        $user->update();
        return redirect()->back()->with('message', 'Profile updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ifdeleted = User::find($id)->delete();
        if($ifdeleted){
            return true;
        }
    }
}
