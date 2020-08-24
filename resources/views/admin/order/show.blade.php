@extends('layouts.dashboard.master')

@section('content')

    <div class="order_show">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h1>Customer Details</h1>
                        </div>
                        <div class="card-body">
                            <table class="table w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $order->customer->name }}</th>
                                        <th scope="row">{{ $order->customer->email }}</th>
                                        <td>{{ $order->customer->phone_number }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h1>Shipping Details</h1>
                        </div>
                        <div class="card-body">
                            <table class="table w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">City</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $order->shipping->first_name }} {{ $order->shipping->last_name }}</th>
                                        <td>{{ $order->shipping->email }}</td>
                                        <td>{{ $order->shipping->address }}</td>
                                        <td>{{ $order->shipping->mobile_number }}</td>
                                        <td>{{ $order->shipping->city }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Order Details</h1>
                        </div>
                        <div class="card-body">
                            <table class="table w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Product Price</th>
                                        <th scope="col">Product Quantity</th>
                                        <th scope="col">Product Price Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderDetails as $orderDetail)
                                        <tr>
                                            <th scope="row">{{ $orderDetail->product->id }}</th>
                                            <th scope="row">{{ $orderDetail->product->name }}</th>
                                            <th scope="row">{{ $orderDetail->product->price }}</th>
                                            <td>{{ $orderDetail->subtotal_qty }}</td>
                                            <td>{{ $orderDetail->subtotal_price }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5">Total Price: <span class="text-bold">${{ $order->total }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
