<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('index');
        $this->middleware('auth');
        // $this->middleware(['role:admin','permission:manager|edit pages'])->except('index');
        $this->middleware(['role:admin','permission:manager'])->except('index');
    }

    public function index()
    {
        return view('admin/auth/login');
    }

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }
}
