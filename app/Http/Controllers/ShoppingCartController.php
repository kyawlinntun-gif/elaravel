<?php

namespace App\Http\Controllers;

use App\Product;
use App\Rules\lowercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cart;
use Illuminate\Support\Facades\Validator;

class ShoppingCartController extends Controller
{

    public function index()
    {
        return view('elaravel.cart.index');
    }
    
    // Cart add
    public function addCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'qty' => 'required|integer|min:0',
            'product_id' => 'required|integer|exists:products,id'
        ]);

        if($validator->fails())
        {
            Session::flash('error', 'Information was wrong!');

            return response([
                'error' => true
            ]);
        }

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

    // Cart Update
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'qty' => ['required', 'integer', 'min:0'],
            'rowId' => ['required', 'alpha_num', new lowercase],
        ]);

        if($validator->fails())
        {
            Session::flash('error', $validator->errors()->first());
            return response([
                'error' => true
            ]);
        }

        Cart::update($request->rowId, $request->qty);
        Session::flash('success', 'Items was update successfully!');

        return response([
            'success' => true
        ]);
    }

    // Cart Delete
    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rowId' => ['required', 'alpha_num', new lowercase]
        ]);   

        // return $validator->errors();
        
        if($validator->fails())
        {

            Session::flash('error', $validator->errors()->first());
            return response([
                'error' => true
            ]);
        }

        Cart::update($request->rowId, 0);
        Session::flash('success', 'Items was removed successfully!');

        return response([
            'success' => true
        ]);
    }

}
