<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MTSDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-list', ['only' => ['index']]);
    }

    /**
     * Display MTS Dashboard
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        
        if($request->ajax()){
            $query = User::orderby('id', 'desc')->where('id', '>', 0)
                ->whereNotNull('account_type')
                ->whereIn('account_type', ['Company', 'Individual']);
            
            // Check user role and permissions
            if($user->isAdmin()) {
                // Admin role: can see all users and filter by type
                if($request['account_type'] && $request['account_type'] != "All"){
                    $query->where('account_type', $request['account_type']);
                }
            } elseif($user->isCompany() && $user->isCompanyAdmin()) {
                // Company role + administers company: can only see users from their company
                $company = $user->administeredCompany;
                $query->where('company_id', $company->id);
            } else {
                // Individual role or other: limited access
                $query->where('id', $user->id); // Only see themselves
            }
            
            if($request['search'] != ""){
                $query->where(function($q) use ($request) {
                    $q->where('name', 'like', '%'. $request['search'] .'%')
                      ->orWhere('last_name', 'like', '%'. $request['search'].'%')
                      ->orWhere('email', 'like', '%'. $request['search'].'%')
                      ->orWhere('phone', 'like', '%'. $request['search'].'%');
                });
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $users = $query->paginate(10);
            return (string) view('admin.mts-dashboard.search', compact('users'));
        }
        
        $query = User::orderBy('id','DESC')
            ->whereNotNull('account_type')
            ->whereIn('account_type', ['Company', 'Individual']);
        
        // Check user role and permissions
        if($user->isAdmin()) {
            // Admin role: can see all users and filter by type
            if($request->get('account_type') && $request->get('account_type') != "All"){
                $query->where('account_type', $request->get('account_type'));
                $page_title = ucfirst($request->get('account_type')) . ' Users - MTS Dashboard';
            } else {
                $page_title = 'MTS Dashboard';
            }
        } elseif($user->isCompany() && $user->isCompanyAdmin()) {
            // Company role + administers company: can only see users from their company
            $company = $user->administeredCompany;
            $query->where('company_id', $company->id);
            $page_title = $company->name . ' - MTS Dashboard';
        } else {
            // Individual role or other: limited access
            $query->where('id', $user->id); // Only see themselves
            $page_title = 'My Profile - MTS Dashboard';
        }
        
        // Apply search filter
        if($request->get('search') != ""){
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%'. $request->get('search') .'%')
                  ->orWhere('last_name', 'like', '%'. $request->get('search').'%')
                  ->orWhere('email', 'like', '%'. $request->get('search').'%')
                  ->orWhere('phone', 'like', '%'. $request->get('search').'%');
            });
        }
        
        // Apply status filter
        if($request->get('status') != "All"){
            $status = $request->get('status');
            if($status == 2){
                $status = 0;
            }
            $query->where('status', $status);
        }
        
        $users = $query->paginate(10);
        return view('admin.mts-dashboard.index', compact('users','page_title'));
    }
}
