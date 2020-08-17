<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cart;

class ShoppingCartController extends Controller
{

    public function index()
    {
        return view('elaravel.cart.index');
    }
    
    // Cart add
    public function addCart(Request $request)
    {
        if($request->qty <= 0)
        {
            Session::flash('error', 'No item was update successfully!');

            return response([
                'error' => true
            ]);
        }
        $product = Product::findOrFail($request->product_id);
        $data['id'] = $product->id;
        $data['name'] = $product->name;
        $data['qty'] = $request->qty;
        $data['price'] = $product->price;
        $data['weight'] = 0;
        $data['options']['image'] = $product->image;

        Cart::add($data);
        Session::flash('success', 'Items was update successfully!');

        return response([
            'success' => true
        ]);
    }
}
