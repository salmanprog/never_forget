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
        return view('admin.user.edit',compact('user','roles','userRole', 'page_title'));
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
        if($request->input('user_role') == 'Sales Person'){
            return redirect()->to(route('user.index') . '?type=salesperson')->with('message','Sales Person updated successfully');
        }else{
            return redirect()->route('user.index')->with('message','Customer updated successfully');
        }
    }

    public function IndividualEditProfile()
    {
        $page_title = 'Edit Profile';
        $cities = City::where('status', 1)->get();
        $states = State::where('city_id')->get();
        $user =  User::where('id', Auth::user()->id)->first();
        return view('website.individual-dashboard.edit', compact('cities', 'states', 'user', 'page_title'));
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
        $user->address = $request->address;
        $user->designation = $request->designation;
       /*  $user->team = $request->team; */
        $user->about_me = $request->about_me;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->whatsapp = $request->whatsapp;
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->linkedin = $request->linkedin;
        // $user->instagram = $request->instagram;
        // $user->skype = $request->skype;
        // $user->youtube = $request->youtube;
        $user->city_id = $request->city_id;
        $user->state_id = $request->state_id;
        $user->zip_code = $request->zip_code;
        // $user->license = $request->license;
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

        $user->update();
        return redirect()->back()->with('message', 'Profile updated successfully');
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
