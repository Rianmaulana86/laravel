<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function login()
    {
        return view('login', [
            'title' => 'login',
            'active' => 'login'
        ]);
    }
    public function log(Request $request)
    {
        $login = $request->validate([
            'email' => 'required|email',
            'password' => 'required'

        ]);
        if(Auth::attempt($login))
        {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('loginError', 'Login Failed!');

    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
     
    }
}
