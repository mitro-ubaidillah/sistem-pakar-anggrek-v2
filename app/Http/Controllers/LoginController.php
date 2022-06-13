<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

// class LoginController extends Controller
// {
    
// }
class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Halaman Login'
        ]);
    }

    public function authenticated(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/home');
        }

        return back()->with('loginError', 'Login Failed!');
    }
}