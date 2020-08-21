@extends('layouts.frontend.master')

@section('title', 'Checkout')

@section('section')

    @if(Cart::count())

        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                    </ol>
                </div><!--/breadcrums-->

                <div class="shopper-informations">
                    <div class="row">
                        <div class="col-12 clearfix">
                            <div class="bill-to">
                                <p>Bill To</p>
                                <form>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="first_name" class="form-control" name="first_name" id="first_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="last_name" class="form-control" name="last_name" id="last_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="address" class="form-control" name="address" id="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile_number">Mobile Number</label>
                                        <input type="mobile_number" class="form-control" name="mobile_number" id="mobile_number">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="city" class="form-control" name="city" id="city">
                                    </div>
                                    <input type="submit" value="Done" class="btn btn-primary" />
                                </form>
                            </div>
                        </div>					
                    </div>
                </div>

                <div class="review-payment">
                    <h2>Review & Payment</h2>
                </div>

                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description"></td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach (Cart::content() as $item)

                                <tr>
                                    <td class="cart_product">
                                        <a href=""><img src="{{ asset('storage/'. $item->options->image) }}" alt="" style="height: 100px; weight: 200px"></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{ $item->name }}</a></h4>
                                        <p>Web ID: {{ $item->id }}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>${{ $item->price }}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <input class="cart_quantity_input" type="text" name="quantity" value="{{ $item->qty }}" autocomplete="off" readonly>
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">${{ $item->total }}</p>
                                    </td>
                                </tr>
                                
                            @endforeach

                            <tr>
                                <td colspan="5" class="cart_total text-right"><p class="cart_total_price pr-3">TotalPrice: {{ Cart::total() }}</p></td>
                            </tr>
                    
                        </tbody>
                    </table>
                </div>
                <div class="payment-options">
                        <span>
                            <label><input type="checkbox"> Direct Bank Transfer</label>
                        </span>
                        <span>
                            <label><input type="checkbox"> Check Payment</label>
                        </span>
                        <span>
                            <label><input type="checkbox"> Paypal</label>
                        </span>
                    </div>
            </div>
    
        </section> <!--/#cart_items-->

    @endif

@endsection