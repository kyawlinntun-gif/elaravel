<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $order = Order::findOrFail($id);
        $order->status = $status;
        $order->update();

        return response([
            'order' => $order 
        ]);
    }

    public function destroy(Order $order_id)
    {
        $order = $order_id;
        $order->delete();
        Session::flash('success', 'Order was deleted successfully!');
        // $request->session()->flash('success', 'Category was deleted successfully!');
        return response([
            'success' => true
        ]);
    }
}
