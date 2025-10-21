<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect()->route('dashboard')->with('success', 'You are welcome. You can login from here.');
        }
        $page_title = 'Log In';
        return view('auth.admin.login', compact('page_title'));
    }
    public function editProfile()
    {
        return view('admin.dashboard.edit');
    }

    public function updateProfile(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;

        if(empty($request->name)){
            $this->validate($request, [
                'name' => 'required',
            ]);
        }

        if(isset($request->password)){
            $this->validate($request, [
                'name' => 'required',
                'password' => 'required|same:confirm-password',
            ]);

            $user->password = Hash::make($request->password);
        }

        $user->update();
        return redirect()->back()
        ->with('message','Profile updated successfully');
    }
    public function logOut()
    {
        if(Auth::check() && Auth::user()->hasRole('Admin')){
            Auth::logout();
            return redirect()->route('admin.login');
        }elseif(Auth::check() && Auth::user()->hasRole('User')){
            Auth::logout();
            return redirect()->route('login');
        }else{
            Auth::logout();
            return redirect()->route('login');
        }
    }
    //Password reset
    public function forgotPassword()
    {
        $page_title = 'Forgot Password';
        return view('auth.admin.passwords.forgot-password', compact('page_title'));
    }
    public function passwordResetLink(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);

        $user = User::where('email', $request->email)->where('status', 1)->first();
        if(empty($user)){
            return redirect()->back()->with('error', 'Your account not found.');
        }elseif($user->status != 1){
            return redirect()->back()->with('error', 'Your account is not verified. We have sent verification email verify first.');
        }
        if(!empty($user) && $user->status==1 && $user->hasRole('Admin')){
            $page_title = 'Change Password';
            do{
                $verify_token = uniqid();
            }while(User::where('verify_token', $verify_token)->first());

            $user->verify_token = $verify_token;
            $user->update();

            $details = [
                'from' => 'admin-password-reset',
                'title' => "Hello! ". $user->name,
                'body' => "You are receiving this email because we received a password reset request for your account.",
                'verify_token' => $user->verify_token,
            ];

            \Mail::to($user->email)->send(new \App\Mail\Email($details));

            return redirect()->route('admin.login')->with('message', 'We have emailed your password reset link!');
        }else{
            return redirect()->route('login')->with('error', 'You have not allow to access from that panel. Try from this.');
        }
    }
    public function resetPassword($verify_token)
    {
        $page_title = 'Reset Password';
        return view('auth.admin.passwords.change-password', compact('page_title', 'verify_token'));
    }
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|same:confirm-password',
        ]);

        $user = User::where('verify_token', $request->verify_token)->first();
        $user->password = Hash::make($request->password);
        $user->verify_token = null;
        $user->update();

        if($user){
            return redirect()->route('admin.login')->with('message', 'You have updated password. You can login again.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong try again');
        }
    }
}
