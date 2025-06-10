<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm() 
     {
        return view('movies.login');
    
    }
    public function login(Request $request) 
     {
        $credentials = $request->validate(
            [
            'email' => 'required|email',
            'password' => 'required|min:3'
            ]
            );
        
            if (Auth ::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect('/')->with('success', 'Login Successfullly, Welcome' .Auth::user()->name);
            }
            
            return back()->withErrors(
                ['email' => 'Email not Found!']
            )->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
