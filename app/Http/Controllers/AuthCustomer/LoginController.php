<?php

namespace App\Http\Controllers\AuthCustomer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('customerguestcheck')->only('logout');
    }

    public function showLoginForm()
    {
        return view('customer.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // return $credential;

        // Attempt to log the user in
        if(Auth::guard('customer')->attempt($credential, $request->member)){
            // If login successful, then redirect to their intended location
            return redirect()->intended(route('home.index'));
        }

        // If Unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->with('fail', 'Email or password was not correctly successfully!');
    }

    public function logout()
    {
        // return Auth::guard('customer')->user()->name;
        // return 'hello';
        Auth::guard('customer')->logout();
        return redirect()->route('home.index');
    }
}
