<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\CompanyEmployee;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
class CompanyEmployeeController extends Controller
{
     function __construct()
    {
        $this->middleware('permission:company_employee-list|company_employee-create|company_employee-edit|company_employee-delete', ['only' => ['index','store']]);
        $this->middleware('permission:company_employee-create', ['only' => ['create','store']]);
        $this->middleware('permission:company_employee-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:company_employee-delete', ['only' => ['destroy']]);
    } 

    /**
     * Get the company for the current user or return null
     */
    private function getCompany()
    {
        $user = Auth::user();
        return $user->administeredCompany;
    }

    /**
     * Display a listing of employees for the company
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $company = $this->getCompany();
        
        // If no company, show empty page with message to create company
        if (!$company) {
            $page_title = 'Company Employees';
            // Create a paginator with empty collection
            $employees = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10, 1);
            return view('admin.company_employee.index', compact('employees', 'page_title', 'company'));
        }
             
        $page_title = 'Company Employees';
        
        // Build query
        $query = $company->employees()->orderBy('id', 'DESC');
        
        // Apply search filter
        if($request->get('search') != ""){
            $query->where(function($q) use ($request) {
                $q->where('first_name', 'like', '%'. $request->get('search') .'%')
                  ->orWhere('last_name', 'like', '%'. $request->get('search').'%')
                  ->orWhere('email', 'like', '%'. $request->get('search').'%')
                  ->orWhere('phone', 'like', '%'. $request->get('search').'%');
            });
        }
        
        // Apply type filter
        if($request->get('type') != "All" && $request->get('type') != null){
            $query->where('type', $request->get('type'));
        }
        
        // Apply status filter (if needed in future)
        // if($request->get('status') != "All" && $request->get('status') != null){
        //     $query->where('is_active', $request->get('status') == 'Active' ? 1 : 0);
        // }
        
        $employees = $query->paginate(10)->appends($request->query());
        
        // Handle AJAX requests
        if ($request->ajax()) {
            return view('admin.company_employee.search', compact('employees'));
        }
        
        return view('admin.company_employee.index', compact('employees', 'page_title', 'company'));
    }

    /**
     * Show the form for creating a new employee
     */
    public function create()
    {
        $company = $this->getCompany();
        
        if (!$company) {
            return redirect()->route('admin.company.create')
                ->with('error', 'Please create a company first before adding employees.');
        }
        
        $page_title = 'Add Employee';
        return view('admin.company_employee.create', compact('page_title'));
    }

    /**
     * Store a newly created employee
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:company_employees,email',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'type' => 'required|in:employee,client'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $company = $this->getCompany();
        
        // Format date_of_birth to YYYY-MM-DD format (date only, no time)
        $dateOfBirth = $request->date_of_birth ? Carbon::parse($request->date_of_birth)->format('Y-m-d') : null;
        
        $employee = CompanyEmployee::create([
            'company_id' => $company->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $dateOfBirth,
            'type' => $request->type,
            'invite_token' => CompanyEmployee::generateInviteToken(),
            'invited_at' => Carbon::now()
        ]);

        // Send invitation email
        //$this->sendInvitationEmail($employee);

        return redirect()->route('admin.company_employee.index')
            ->with('success', 'Employee added successfully and invitation sent!');
    }

    /**
     * Show bulk upload form
     */
    public function bulkUpload()
    {
        $company = $this->getCompany();
        
        if (!$company) {
            return redirect()->route('admin.company.create')
                ->with('error', 'Please create a company first before uploading employees.');
        }
        
        $page_title = 'Bulk Upload Employees';
        return view('admin.company_employee.bulk-upload', compact('page_title'));
    }

    /**
     * Process bulk CSV upload
     */
    public function processBulkUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|file|mimes:csv,txt|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $company = $this->getCompany();
        $file = $request->file('csv_file');
        $csvData = array_map('str_getcsv', file($file->getRealPath()));
        
        // Remove header row
        $header = array_shift($csvData);
        
        $successCount = 0;
        $errorCount = 0;
        $errors = [];

        foreach ($csvData as $index => $row) {
            if (count($row) < 4) {
                $errors[] = "Row " . ($index + 2) . ": Insufficient data";
                $errorCount++;
                continue;
            }

            $data = [
                'first_name' => trim($row[0]),
                'last_name' => trim($row[1]),
                'email' => trim($row[2]),
                'phone' => isset($row[3]) ? trim($row[3]) : null,
                'type' => isset($row[4]) ? trim($row[4]) : 'employee'
            ];

            // Validate each row
            $rowValidator = Validator::make($data, [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:company_employees,email',
                'phone' => 'nullable|string|max:20',
                'type' => 'required|in:employee,client'
            ]);

            if ($rowValidator->fails()) {
                $errors[] = "Row " . ($index + 2) . ": " . implode(', ', $rowValidator->errors()->all());
                $errorCount++;
                continue;
            }

            try {
                $employee = CompanyEmployee::create([
                    'company_id' => $company->id,
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'type' => $data['type'],
                    'invite_token' => CompanyEmployee::generateInviteToken(),
                    'invited_at' => Carbon::now()
                ]);

                // Send invitation email
                //$this->sendInvitationEmail($employee);
                $successCount++;

            } catch (\Exception $e) {
                $errors[] = "Row " . ($index + 2) . ": " . $e->getMessage();
                $errorCount++;
            }
        }

        $message = "Bulk upload completed. Success: {$successCount}, Errors: {$errorCount}";
        
        if (!empty($errors)) {
            $message .= ". Errors: " . implode('; ', array_slice($errors, 0, 5));
            if (count($errors) > 5) {
                $message .= " and " . (count($errors) - 5) . " more errors.";
            }
        }

        return redirect()->route('admin.company_employee.index')
            ->with($errorCount > 0 ? 'warning' : 'success', $message);
    }

    /**
     * Download CSV template
     */
    public function downloadTemplate()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="employee_template.csv"',
        ];

        $callback = function() {
            $file = fopen('php://output', 'w');
            
            // Add header
            fputcsv($file, ['First Name', 'Last Name', 'Email', 'Phone', 'Type']);
            
            // Add sample data
            fputcsv($file, ['John', 'Doe', 'john.doe@example.com', '+1234567890', 'employee']);
            fputcsv($file, ['Jane', 'Smith', 'jane.smith@example.com', '+1234567891', 'client']);
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Show the form for editing the specified employee
     */
    public function edit($id)
    {
        $company = $this->getCompany();
        $employee = $company->employees()->findOrFail($id);
        
        $page_title = 'Edit Employee';
        return view('admin.company_employee.edit', compact('employee', 'page_title'));
    }

    /**
     * Update the specified employee
     */
    public function update(Request $request, $id)
    {
        $company = $this->getCompany();
        $employee = $company->employees()->findOrFail($id);

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:company_employees,email,' . $employee->id,
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'type' => 'required|in:employee,client'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Format date_of_birth to YYYY-MM-DD format (date only, no time)
        $dateOfBirth = $request->date_of_birth ? Carbon::parse($request->date_of_birth)->format('Y-m-d') : null;
        
        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $dateOfBirth,
            'type' => $request->type
        ]);

        return redirect()->route('admin.company_employee.index')
            ->with('success', 'Employee updated successfully!');
    }

    /**
     * Remove the specified employee
     */
    public function destroy($id)
    {
        $company = $this->getCompany();
        $employee = $company->employees()->findOrFail($id);
        
        $employee->delete();
        
        return response()->json(['success' => true]);
    }

    /**
     * Resend invitation to employee
     */
    public function resendInvitation($id)
    {
        $company = $this->getCompany();
        $employee = $company->employees()->findOrFail($id);
        
        $employee->update([
            'invite_token' => CompanyEmployee::generateInviteToken(),
            'invited_at' => Carbon::now()
        ]);

        $this->sendInvitationEmail($employee);

        return redirect()->back()
            ->with('success', 'Invitation resent successfully!');
    }

    /**
     * Send invitation email to employee
     */
    private function sendInvitationEmail($employee)
    {
        try {
            Mail::send('emails.employee-invitation', [
                'employee' => $employee,
                'company' => $employee->company,
                'inviteUrl' => route('employee.accept-invitation', $employee->invite_token)
            ], function ($message) use ($employee) {
                $message->to($employee->email)
                    ->subject('Invitation to join ' . $employee->company->name);
            });
        } catch (\Exception $e) {
            Log::error('Failed to send invitation email: ' . $e->getMessage());
        }
    }
}
