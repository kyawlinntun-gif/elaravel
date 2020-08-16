<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Manufacture;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Request $request, $category_id = false)
    {
        $categories = Category::where('publication_status', 1)->get();
        $brands = Manufacture::where('publication_status', 1)->get();

        // Products or Products by Category
        if($category_id)
        {
            $category = Category::findOrFail($category_id);
            $products = $category->products()->paginate(9);
        }
        else
        {
            $products = Product::where('publication_status', 1)->paginate(9);
        }
        $sliders = Slider::where('publication_status', 1)->take(3)->get();
        return view('elaravel.index', [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $products,
            'sliders' => $sliders
        ]);
    }
}
