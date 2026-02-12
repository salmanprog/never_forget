<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SmsReply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MTSDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-list', ['only' => ['index', 'smsReplies']]);
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
                ->whereIn('account_type', ['Company', 'Individual', 'Sales Person']);
            
            // Check user role and permissions
            if($user->isAdmin()) {
                // Admin role: can see all users and filter by type
                if($request['account_type'] && $request['account_type'] != "All"){
                    $query->where('account_type', $request['account_type']);
                }
            } elseif($user->hasRole('Sales Person')) {
                // Sales Person role: can see companies and individuals assigned to them
                $query->where('assigned_to_user_id', $user->id);
                // Allow filtering by account type
                if($request['account_type'] && $request['account_type'] != "All"){
                    $query->where('account_type', $request['account_type']);
                } else {
                    // Default: show both Company and Individual
                    $query->whereIn('account_type', ['Company', 'Individual']);
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
            
            // Get all salespersons for the dropdown
            $salespersons = User::where('account_type', 'Sales Person')
                ->where('status', 1)
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'last_name', 'email']);
            
            return (string) view('admin.mts-dashboard.search', compact('users', 'salespersons'));
        }
        
        $query = User::orderBy('id','DESC')
            ->whereNotNull('account_type')
            ->whereIn('account_type', ['Company', 'Individual', 'Sales Person']);
        
        // Check user role and permissions
        if($user->isAdmin()) {
            // Admin role: can see all users and filter by type
            if($request->get('account_type') && $request->get('account_type') != "All"){
                $query->where('account_type', $request->get('account_type'));
                $page_title = ucfirst($request->get('account_type')) . ' Users - MTS Dashboard';
            } else {
                $page_title = 'MTS Dashboard';
            }
        } elseif($user->hasRole('Sales Person')) {
            // Sales Person role: can see companies and individuals assigned to them
            $query->where('assigned_to_user_id', $user->id);
            // Allow filtering by account type
            if($request->get('account_type') && $request->get('account_type') != "All"){
                $query->where('account_type', $request->get('account_type'));
                $page_title = 'My Assigned ' . ucfirst($request->get('account_type')) . 's - MTS Dashboard';
            } else {
                // Default: show both Company and Individual
                $query->whereIn('account_type', ['Company', 'Individual']);
                $page_title = 'My Assigned Accounts - MTS Dashboard';
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
        
        // Get all salespersons for the dropdown
        $salespersons = User::where('account_type', 'Sales Person')
            ->where('status', 1)
            ->orderBy('name', 'asc')
            ->get(['id', 'name', 'last_name', 'email']);
        
        return view('admin.mts-dashboard.index', compact('users','page_title', 'salespersons'));
    }

    /**
     * Update assigned salesperson for a user
     */
    public function updateAssignedSalesperson(Request $request, $id)
    {
        $request->validate([
            'assigned_to_user_id' => 'nullable|exists:users,id'
        ]);

        $user = User::findOrFail($id);
        $user->assigned_to_user_id = $request->assigned_to_user_id;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Salesperson assigned successfully'
        ]);
    }

    /**
     * Display incoming SMS replies from users.
     */
    public function smsReplies(Request $request)
    {
        $replies = SmsReply::orderBy('created_at', 'desc')->paginate(20);
        $page_title = 'SMS Replies';
        return view('admin.mts-dashboard.sms-replies', compact('replies', 'page_title'));
    }

    /**
     * Send email from MTS Dashboard compose modal (no redirect to Gmail).
     */
    public function sendEmail(Request $request)
    {
        $request->validate([
            'to_email' => 'required|email',
            'subject' => 'required|string|max:255',
            'body' => 'required|string|max:10000',
            'to_name' => 'nullable|string|max:255',
        ]);

        $details = [
            'from' => 'mts-dashboard-email',
            'subject' => $request->subject,
            'body' => $request->body,
            'recipient_name' => $request->to_name ?? '',
        ];

        try {
            Mail::to($request->to_email)->send(new \App\Mail\Email($details));
            return response()->json([
                'success' => true,
                'message' => 'Email sent successfully.',
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('MTS Dashboard send email failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to send email. Please try again or check mail configuration.',
            ], 422);
        }
    }
}
