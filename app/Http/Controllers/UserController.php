<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register (Request $req) {
        $req->validate([
            'fullname' => ['required', 'max:100'],
            'email' => ['required', 'unique:users,email', 'max:100'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $user = User::create([
            'fullname' => $req->fullname,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);

        $user->refresh();

        Auth::login($user);

        return redirect('/blog');
    }

    public function logout(Request $req){
        Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect('/');
    }

    public function login(Request $req){
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
 
            return redirect('/blog');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
