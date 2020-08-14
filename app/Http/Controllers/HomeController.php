<?php

namespace App\Http\Controllers;

use App\Category;
use App\Manufacture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('publication_status', 1)->get();
        $brands = Manufacture::where('publication_status', 1)->get();
        return view('elaravel.index', [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
}
