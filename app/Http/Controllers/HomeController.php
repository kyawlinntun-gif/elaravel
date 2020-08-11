<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('elaravel.index', [
            'categories' => $categories
        ]);
    }
}
