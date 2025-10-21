<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyEmployee;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CompanyEmployeeController extends Controller
{
    public function index()
    {
        $employees = CompanyEmployee::with(['user', 'company'])->paginate(10);
        return view('admin.company-employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('admin.company-employees.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'company_id' => 'required|exists:companies,id',
            'position' => 'nullable|string|max:255',
        ]);

        // Create user account
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt(Str::random(10)), // Random password
            'email_verified_at' => null,
        ]);

        // Create company employee record
        $employee = CompanyEmployee::create([
            'user_id' => $user->id,
            'company_id' => $request->company_id,
            'position' => $request->position,
            'status' => 'pending',
            'invitation_token' => Str::random(60),
        ]);

        // Send invitation email
        $this->sendInvitationEmail($employee);

        return redirect()->route('company.employees.index')
            ->with('success', 'Employee invitation sent successfully.');
    }

    public function show(CompanyEmployee $employee)
    {
        $employee->load(['user', 'company']);
        return view('admin.company-employees.show', compact('employee'));
    }

    public function edit(CompanyEmployee $employee)
    {
        $companies = Company::all();
        $employee->load(['user', 'company']);
        return view('admin.company-employees.edit', compact('employee', 'companies'));
    }

    public function update(Request $request, CompanyEmployee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $employee->user_id,
            'company_id' => 'required|exists:companies,id',
            'position' => 'nullable|string|max:255',
            'status' => 'required|in:pending,active,inactive',
        ]);

        // Update user
        $employee->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update employee record
        $employee->update([
            'company_id' => $request->company_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return redirect()->route('company.employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(CompanyEmployee $employee)
    {
        $employee->user->delete();
        $employee->delete();

        return redirect()->route('company.employees.index')
            ->with('success', 'Employee deleted successfully.');
    }

    public function bulkUpload()
    {
        return view('admin.company-employees.bulk-upload');
    }

    public function processBulkUpload(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        // Process CSV file
        $file = $request->file('csv_file');
        $csvData = array_map('str_getcsv', file($file->getPathname()));
        $header = array_shift($csvData);

        $successCount = 0;
        $errorCount = 0;

        foreach ($csvData as $row) {
            try {
                $data = array_combine($header, $row);
                
                // Create user
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt(Str::random(10)),
                    'email_verified_at' => null,
                ]);

                // Create employee
                $employee = CompanyEmployee::create([
                    'user_id' => $user->id,
                    'company_id' => $data['company_id'],
                    'position' => $data['position'] ?? null,
                    'status' => 'pending',
                    'invitation_token' => Str::random(60),
                ]);

                $this->sendInvitationEmail($employee);
                $successCount++;
            } catch (\Exception $e) {
                $errorCount++;
            }
        }

        return redirect()->route('company.employees.index')
            ->with('success', "Bulk upload completed. {$successCount} employees processed successfully, {$errorCount} errors.");
    }

    public function downloadTemplate()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="employee_template.csv"',
        ];

        $callback = function() {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['name', 'email', 'company_id', 'position']);
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function resendInvitation(CompanyEmployee $employee)
    {
        $employee->update(['invitation_token' => Str::random(60)]);
        $this->sendInvitationEmail($employee);

        return redirect()->back()
            ->with('success', 'Invitation resent successfully.');
    }

    private function sendInvitationEmail(CompanyEmployee $employee)
    {
        // This would typically send an email invitation
        // For now, we'll just log it
        \Log::info('Employee invitation sent', [
            'employee_id' => $employee->id,
            'email' => $employee->user->email,
            'token' => $employee->invitation_token
        ]);
    }
}
