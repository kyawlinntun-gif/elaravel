<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        // foreach($orders as $order)
        // {
        //     echo $order->id .'<br>';
        //     echo $order->customer->name . '<br>';
        //     echo $order->total . '<br>';
        //     echo $order->status . '<br>';
        // }
        // return $order_details->order;
        return view('admin.order.index', [
            'orders' => $orders
        ]);
    }

    public function show(Order $order_id)
    {
        $order = $order_id;
        return view('admin.order.show', [
            'order' => $order
        ]);
    }
}
