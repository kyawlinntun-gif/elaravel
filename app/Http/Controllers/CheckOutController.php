<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index(Request $request)
    {
        return $request->all();
        // return view('elaravel.checkout.index');
    }
}
