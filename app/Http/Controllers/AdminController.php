<?php

namespace App\Http\Controllers;

use App\Mail\AdminForgotPasswordEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function login(){
        return view('login.login');
    }

    public function loginSubmit(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin=User::find(1);
        if (Hash::check($request->password, $admin->password)) {
            session(['admin' => $admin]);
            return redirect()->route('admin.dashboard');
        }
        else {
            return back()->withInput()->with('error','Email or Password entered is incorrect.');
        }
    }

    public function logout(){
        session()->forget('admin');
        return redirect()->route('admin.login');
    }

    public function forgotPassword(){
        return view('login.forgot-password');
    }

    public function forgotPasswordSubmit(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);

        $admin= User::find(1);
        if ($request->email==$admin->email){
            $random_token = Str::random(20);
            $details=[
                'token' => $random_token,
                'admin' => $admin,
            ];

            Mail::to($admin->email)->send(new AdminForgotPasswordEmail($details));
            User::where('id', 1)->update(['remember_token'=> $random_token]);
            return redirect()->back()->with('message', 'Please check your inbox to reset your password.');
        }
        else{
            return redirect()->back()->withInput()->with('error', 'Email is incorrect.');
        }
    }

    public function checkPasswordResetToken($token){
        if (!is_null($token)){
            $admin=User::where('remember_token', '=' ,$token)->first();
            if ($admin){
                session()->put('admin_id', $admin->id);
                return redirect()->route('admin.resetPassword')->with('message', 'Email Verified Successfully, Please reset your password.');
            }
            else{
                return redirect()->route('admin.login')->with('error','Email verification failed (Link Expired).');
            }
        }
        else{
            return redirect()->route('admin.login')->with('error','Email verification failed (Link Expired).');
        }
    }

    public function resetPassword(){
        return view('login.reset-password');
    }

    public function resetPasswordSubmit(Request $request){
        $request->validate([
            'password' =>'required|min:8|max:15',
            'confirm_password' =>'required|in:'.$request->password,
        ]);

        if (session()->has('admin_id')){
            $admin=User::where('id', session()->get('admin_id'))->update(['password'=> Hash::make($request->password), 'remember_token'=> null]);
            if ($admin){
                session()->forget('admin_id');
                return redirect()->route('admin.login')->with('message', 'Password reset successfully. Please login with new password.');
            }
            else{
                return redirect()->route('admin.login')->with('error','Email verification failed (Link Expired).');
            }
        }
        else{
            return redirect()->route('admin.login')->with('error', 'Session has expired.');
        }
    }



}
