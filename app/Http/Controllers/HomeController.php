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
    public function index(Request $request) //$category_id = false, $brand_id = false
    {
        $category_id = $request->category_id ? $request->category_id : false;
        $brand_id = $request->brand_id ? $request->brand_id : false;

        $categories = Category::where('publication_status', 1)->get();
        $brands = Manufacture::where('publication_status', 1)->get();
        $products = Product::where('publication_status', 1)->paginate(9);

        // Products or Products by Brand
        if($brand_id)
        {
            if($brand_id)
            {
                $brand = Manufacture::findOrFail($brand_id);
                $products = $brand->products()->where('publication_status', 1)->paginate(9);
            }
            else
            {
                $products = Product::where('publication_status', 1)->paginate(9);
            }
        }

        // Products or Products by Category
        if($category_id){
            if($category_id)
            {
                $category = Category::findOrFail($category_id);
                $products = $category->products()->where('publication_status', 1)->paginate(9);
            }
            else
            {
                $products = Product::where('publication_status', 1)->paginate(9);
            }
        }

        $sliders = Slider::where('publication_status', 1)->take(3)->get();
        return view('elaravel.index', [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $products,
            'sliders' => $sliders
        ]);
    }

    // Product detail
    public function productShow(Product $product_id)
    {
        $categories = Category::where('publication_status', 1)->get();
        $brands = Manufacture::where('publication_status', 1)->get();

        $product = $product_id;
        return view('elaravel.product.detail', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
}
