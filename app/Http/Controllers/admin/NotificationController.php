<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;
use App\Models\CompanyEmployee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:notification-list|notification-create|notification-edit|notification-delete', ['only' => ['index','store']]);
        $this->middleware('permission:notification-create', ['only' => ['create','store']]);
        $this->middleware('permission:notification-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:notification-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Notification::with('user')->orderby('id', 'desc')->where('id', '>', 0);
            
            if($request['search'] != ""){
                $query->where(function($q) use ($request) {
                    $q->where('title', 'like', '%'. $request['search'] .'%')
                      ->orWhere('description', 'like', '%'. $request['search'] .'%')
                      ->orWhere('module', 'like', '%'. $request['search'] .'%');
                });
            }
            
            if($request['user_id'] && $request['user_id'] != "All"){
                $query->where('user_id', $request['user_id']);
            }
            
            if($request['is_read'] != "All"){
                $query->where('is_read', $request['is_read'] == '1' ? 1 : 0);
            }
            
            $models = $query->paginate(10);
            return (string) view('admin.notification.search', compact('models'));
        }
        
        $page_title = 'All Notifications';
        $users = User::orderBy('name', 'asc')->get();
        $models = Notification::with('user')->orderby('id', 'desc')->paginate(10);
        return View('admin.notification.index', compact("models", "page_title", "users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Notification';
        $users = User::orderBy('name', 'asc')->get();
        return View('admin.notification.create', compact('page_title', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'module' => 'nullable|string|max:100',
            'module_id' => 'nullable|integer',
            'module_slug' => 'nullable|string|max:255',
            'reference_module' => 'nullable|string|max:100',
            'reference_id' => 'nullable|integer',
            'reference_slug' => 'nullable|string|max:255',
            'is_read' => 'nullable|boolean',
            'is_view' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $model = new Notification();
        $model->user_id = $request->user_id;
        $model->title = $request->title;
        $model->description = $request->description;
        $model->module = $request->module;
        $model->module_id = $request->module_id;
        $model->module_slug = $request->module_slug;
        $model->reference_module = $request->reference_module;
        $model->reference_id = $request->reference_id;
        $model->reference_slug = $request->reference_slug;
        $model->is_read = $request->is_read ?? false;
        $model->is_view = $request->is_view ?? false;
        $model->save();

        return redirect()->route('notification.index')->with('message', 'Notification Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_title = 'Notification Details';
        $model = Notification::with('user')->where('id', $id)->first();
        
        if (!$model) {
            return redirect()->route('notification.index')->with('error', 'Notification not found!');
        }
        
        // Mark as read and viewed when shown
        $model->is_read = true;
        $model->is_view = true;
        $model->save();
        
        return View('admin.notification.show', compact('model', 'page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Edit Notification';
        $model = Notification::where('id', $id)->first();
        $users = User::orderBy('name', 'asc')->get();
        
        if (!$model) {
            return redirect()->route('notification.index')->with('error', 'Notification not found!');
        }
        
        return View('admin.notification.edit', compact('model', 'page_title', 'users'));
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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'module' => 'nullable|string|max:100',
            'module_id' => 'nullable|integer',
            'module_slug' => 'nullable|string|max:255',
            'reference_module' => 'nullable|string|max:100',
            'reference_id' => 'nullable|integer',
            'reference_slug' => 'nullable|string|max:255',
            'is_read' => 'nullable|boolean',
            'is_view' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $model = Notification::where('id', $id)->first();
        
        if (!$model) {
            return redirect()->route('notification.index')->with('error', 'Notification not found!');
        }

        $model->user_id = $request->user_id;
        $model->title = $request->title;
        $model->description = $request->description;
        $model->module = $request->module;
        $model->module_id = $request->module_id;
        $model->module_slug = $request->module_slug;
        $model->reference_module = $request->reference_module;
        $model->reference_id = $request->reference_id;
        $model->reference_slug = $request->reference_slug;
        $model->is_read = $request->is_read ?? false;
        $model->is_view = $request->is_view ?? false;
        $model->update();

        return redirect()->route('notification.index')->with('message', 'Notification Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Notification::where('id', $id)->first();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }

    /**
     * Get notification count for current user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCount()
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return response()->json(['count' => 0]);
            }
            
            // Check if user administers a company
            if ($user->administeredCompany) {
                $company = $user->administeredCompany;
                
                // Get current date
                $today = Carbon::today();
                $next7 = Carbon::today()->addDays(7);

                $employees = CompanyEmployee::where('company_id', $company->id)
                    ->whereNotNull('date_of_birth')
                    ->whereBetween(
                        DB::raw("DATE_FORMAT(date_of_birth, '%m-%d')"),
                        [
                            $today->format('m-d'),
                            $next7->format('m-d')
                        ]
                    )
                    ->get();
                // Check each employee for upcoming birthday
                $currentYear = $today->year;
                foreach ($employees as $employee) {
                    try {
                        // Check if notification for this year's birthday already exists
                        $existingNotification = Notification::where('user_id', $user->id)
                            ->where('module', 'company_employee')
                            ->where('module_id', $employee->id)
                            ->where('reference_module', 'birthday')
                            ->whereYear('created_at', $currentYear)
                            ->count();
                            
                        // If notification doesn't exist for this year, create it
                        if ($existingNotification == 0) {
                            // Create notification
                            
                            $notification = Notification::create([
                                'user_id' => $user->id,
                                'module' => 'company_employee',
                                'module_id' => $employee->id,
                                'module_slug' => 'company_employee',
                                'reference_module' => 'birthday',
                                'reference_id' => $employee->id,
                                'reference_slug' => 'birthday',
                                'title' => 'Upcoming Birthday: ' . $employee->first_name . ' ' . $employee->last_name,
                                'description' => $employee->first_name . ' ' . $employee->last_name . ' birthday is on (' . $employee->date_of_birth->format('M d') . ').',
                                'is_read' => false,
                                'is_view' => false,
                            ]);
                        }
                    } catch (\Exception $e) {
                        // Log error but continue with other employees
                        \Log::error('Error creating birthday notification for employee ' . $employee->id . ': ' . $e->getMessage());
                        return response()->json(['count' => $e->getMessage()]);
                    }
                }
            }
            
            // Get unread notification count
            $count = Notification::where('user_id', $user->id)
                ->where('is_read', false)
                ->count();
            
            return response()->json(['count' => $count]);
        } catch (\Exception $e) {
            \Log::error('Error in getCount: ' . $e->getMessage());
            // Return count 0 on error to prevent breaking the UI
            $user = Auth::user();
            if ($user) {
                $count = Notification::where('user_id', $user->id)
                    ->where('is_read', false)
                    ->count();
                return response()->json(['count' => $count]);
            }
            return response()->json(['count' => $e->getMessage()]);
        }
    }

    /**
     * Get notification list for current user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        
        $unreadCount = Notification::where('user_id', $user->id)
            ->where('is_read', false)
            ->count();
        
        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $unreadCount
        ]);
    }

    /**
     * Mark notification as read
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAsRead($id)
    {
        $user = Auth::user();
        $notification = Notification::where('id', $id)
            ->where('user_id', $user->id)
            ->first();
        
        if ($notification) {
            $notification->is_read = true;
            $notification->is_view = true;
            $notification->save();
            return response()->json(['success' => true]);
        }
        
        return response()->json(['success' => false], 404);
    }
}
