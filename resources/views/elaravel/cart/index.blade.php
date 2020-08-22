@extends('layouts.frontend.master')

@section('title', 'Cart')

@section('section')

    @if (Cart::count())
        <section id="cart_items">
            <div class="container">
                @include('messages.success.success')
                @include('messages.errors.error.error')
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                    </ol>
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
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach (Cart::content() as $item)

                                <tr>
                                    <td class="cart_product">
                                        <a href=""><img src="{{ asset('storage/'. $item->options->image) }}" alt="" style="height:100px; width:200px;"></a>
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
                                            <input class="cart_quantity_input" type="number" name="quantity" value="{{ $item->qty }}" autocomplete="off" size="2" min="1" max="10">
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">${{ $item->total }}</p>
                                    </td>
                                    <td class="cart_delete">
                                        <a href="" class="cart-edit" data-id="{{ $item->rowId }}"><i class="fa fa-edit"></i></a>
                                        <a class="cart_quantity_delete" href="" style="" data-id="{{ $item->rowId }}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section> <!--/#cart_items-->

        <section id="do_action">
            <div class="container">
                <div class="heading">
                    <h3>What would you like to do next?</h3>
                    <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ url('checkout') }}" method="POST">
                            @csrf
                            <div class="total_area">
                                <ul>
                                    <li>Cart Sub Total <span>${{ Cart::subtotal() }}</span></li>
                                    <li>Eco Tax <span>${{ Cart::tax() }}</span></li>
                                    <li>Shipping Cost <span>Free</span></li>
                                    <li>Total <span>${{ Cart::total() }}</span></li>
                                    <li>
                                        <h3>Payment Methods</h3>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment"
                                                id="hand_cash" value="Hand Cash" checked>
                                            <label class="form-check-label" for="hand_cash">
                                                Hand Cash
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment"
                                                id="debit_card" value="Debit Card">
                                            <label class="form-check-label" for="debit_card">
                                                Debit Card
                                            </label>
                                        </div>
                                        <div class="form-check disabled">
                                            <input class="form-check-input" type="radio" name="payment"
                                                id="b-kash" value="B-kash">
                                            <label class="form-check-label" for="b-kash">
                                                B-kash
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                                <input type="submit" class="btn btn-default check_out" value="Check Out">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!--/#do_action-->
        
    @endif

@endsection

@section('jquery')
    <script>
        $(function() {
            $('.cart_quantity_delete').on('click', function(e){
                e.preventDefault();
                var rowId = $(this).attr('data-id');
                var token = "{{ Session::token() }}";
                if(confirm('Are you sure!'))
                {
                    $.ajax({
                        method: 'post',
                        url: '{{ url("cart/delete") }}',
                        data: {_method: 'delete', _token: token, rowId: rowId},
                        success: function(resp)
                        {
                            if(resp.success)
                            {
                                location.reload();
                            }
                            else if(resp.error)
                            {
                                location.reload();
                            }
                        },
                    });
                }
            });
            $('.cart-edit').on('click', function(e){
                e.preventDefault();
                var rowId = $(this).attr('data-id');
                var token = "{{ Session::token() }}";
                var qty = $(this).parent().parent().children('.cart_quantity').children('.cart_quantity_button').children('.cart_quantity_input').val();

                // console.log(qty);
                
                $.ajax({
                    method: 'post',
                    url: '{{ url("cart/edit") }}',
                    data: {_method: 'put', _token: token, rowId: rowId, qty: qty},
                    success: function(resp)
                    {
                        if(resp.success)
                        {
                            location.reload();
                        }
                        else if(resp.error)
                        {
                            location.reload();
                        }
                    },
                    error: function(resp)
                    {
                        console.log(resp);
                    }
                });
            });
        });
    </script>
@endsection