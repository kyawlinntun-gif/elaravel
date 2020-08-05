<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->admin_email, 'password' => $request->admin_password]))
        {
            return redirect('dashboard');
        }
        
        return redirect()->back()->with('fail', 'Email or password was not correctly successfully!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.index');
    }
}
