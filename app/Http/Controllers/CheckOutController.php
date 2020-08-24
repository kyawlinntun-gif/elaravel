<?php

namespace App\Http\Controllers;

use Cart;
use App\Order;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index(Request $request)
    {
        // return Cart::content();
        // foreach($rows as $row)
        // {
        //     echo $row->id .'<br>';
        // }

        // Check Request Data
        $this->validate($request, [
            
            // Shippings Data
            'email' => 'required|email',
            'first_name' => 'required|string|alpha_num|min:2|max:15',
            'last_name' => 'required|string|alpha_num|min:2|max:15',
            'address' => 'required|string|regex:/[a-zA-Z0-9\s]+/|max:50',
            'mobile_number' => 'required|numeric|digits_between:9,12',
            'city' => 'required|string|max:20',

            // Payments Data
            'payment' => 'required|string|max:20',

        ]);

        // Shipping Data
        $shipping = new Shipping;
        $shipping->email = $request->email;
        $shipping->first_name = ucwords($request->first_name);
        $shipping->last_name = ucwords($request->last_name);
        $shipping->address = $request->address;
        $shipping->mobile_number = $request->mobile_number;
        $shipping->city = ucfirst($request->city);
        $shipping->save();

        // Payments Data
        $payment = new Payment;
        $payment->payment_method = ucwords($request->payment);
        $payment->payment_status = 'Pending';
        $payment->save();

        // Order Data
        $order = new Order;
        $order->customer_id = Auth::guard('customer')->id();
        $order->shipping_id = $shipping->id;
        $order->payment_id = $payment->id;
        $order->total = Cart::total();
        $order->status = true;
        $order->save();

        // Order details Data
        $carts = Cart::content();
        foreach($carts as $cart)
        {
            DB::insert('insert into order_details (order_id, product_id, subtotal_price, subtotal_qty, created_at, updated_at) values (?, ?, ?, ?, ?, ?)', [$order->id, $cart->id, $cart->subtotal, $cart->qty, now(), now()]);
        }

        // Cart destroy
        Cart::destroy();

        if($request->payment == 'Hand Cash')
        {
            return view('elaravel.payment.handcash');
        }

        return $request->all();
        return view('elaravel.checkout.index');
    }
}
