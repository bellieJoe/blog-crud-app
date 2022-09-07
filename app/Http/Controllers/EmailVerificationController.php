<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
    public function showVerificationNotice(){
        return view('auth.verify_email');
    }

    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect('/blog');
    }
    public function sendVerification(Request $request){
        // $request->user()->sendEmailVerificationNotification();
     
        // return back()->with('message', 'Verification link sent!');

        $user = User::find(Auth::user()->user_id);
        $user->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    }
    
}
