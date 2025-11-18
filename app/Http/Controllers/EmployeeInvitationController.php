<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyEmployee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class EmployeeInvitationController extends Controller
{
    /**
     * Show the invitation acceptance form
     */
    public function showAcceptForm($token)
    {
        $employee = CompanyEmployee::where('invite_token', $token)
            ->where('is_active', false)
            ->first();

        if (!$employee) {
            return view('employee-invitation.invalid', [
                'message' => 'Invalid or expired invitation link.'
            ]);
        }

        // Check if invitation is expired (7 days)
        if ($employee->invited_at && $employee->invited_at->addDays(7)->isPast()) {
            return view('employee-invitation.invalid', [
                'message' => 'This invitation has expired. Please contact your company administrator for a new invitation.'
            ]);
        }

        return view('employee-invitation.accept', compact('employee'));
    }

    /**
     * Process the invitation acceptance
     */
    public function acceptInvitation(Request $request, $token)
    {
        $employee = CompanyEmployee::where('invite_token', $token)
            ->where('is_active', false)
            ->first();

        if (!$employee) {
            return redirect()->back()
                ->with('error', 'Invalid or expired invitation link.');
        }

        // Check if invitation is expired (7 days)
        if ($employee->invited_at && $employee->invited_at->addDays(7)->isPast()) {
            return redirect()->back()
                ->with('error', 'This invitation has expired. Please contact your company administrator for a new invitation.');
        }

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'phone' => 'nullable|string|max:20'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check if user already exists with this email
        $existingUser = User::where('email', $employee->email)->first();
        
        if ($existingUser) {
            // Update existing user to link with company
            $existingUser->update([
                'account_type' => 'company',
                'company_id' => $employee->company_id,
                'phone' => $request->phone ?: $existingUser->phone
            ]);
        } else {
            // Create new user
            $user = User::create([
                'name' => $employee->first_name,
                'last_name' => $employee->last_name,
                'email' => $employee->email,
                'password' => Hash::make($request->password),
                'account_type' => 'company',
                'company_id' => $employee->company_id,
                'phone' => $request->phone ?: $employee->phone,
                'status' => 1
            ]);
        }

        // Update employee record
        $employee->update([
            'is_active' => true,
            'joined_at' => Carbon::now()
        ]);

        return view('employee-invitation.success', [
            'employee' => $employee,
            'company' => $employee->company
        ]);
    }
}
