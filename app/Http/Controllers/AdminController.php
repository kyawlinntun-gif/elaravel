<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:admin','permission:manager|edit pages'])->except('index');
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
