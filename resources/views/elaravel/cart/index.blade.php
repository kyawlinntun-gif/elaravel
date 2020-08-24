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
                    <form action="{{ url('checkout') }}" method="POST">
                        <div class='col-md-6'>
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
                                        @error('payment')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bill-to">
                                <p>Bill To</p>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') ? old('email') : null }}">
                                </div>
                                @error('email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="first_name" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') ? old('first_name') : null }}">
                                </div>
                                @error('first_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="last_name" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') ? old('last_name') : null }}">
                                </div>
                                @error('last_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="address" class="form-control" name="address" id="address" value="{{ old('address') ? old('address') : null }}">
                                </div>
                                @error('address')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="mobile_number">Mobile Number</label>
                                    <input type="mobile_number" class="form-control" name="mobile_number" id="mobile_number" value="{{ old('mobile_number') ? old('mobile_number') : null }}">
                                </div>
                                @error('mobile_number')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <select name="city" id="city">
                                        <option value="Yangon">Yangon</option>
                                        <option value="Mandalay">Mandalay</option>
                                        <option value="Maypyidaw">Maypyidaw</option>
                                        <option value="Taungyi">Taungyi</option>
                                        <option value="Mawlamyine">Mawlamyine</option>
                                        <option value="Bago">Bago</option>
                                        <option value="Monywa">Monywa</option>
                                        <option value="Myitkyina">Myitkyina</option>
                                        <option value="Pathein">Pathein</option>
                                        <option value="Sittwe">Sittwe</option>
                                        <option value="Pyay">Pyay</option>
                                        <option value="Pakoku">Pakoku</option>
                                        <option value="Myeik">Myeik</option>
                                        <option value="Meiktila">Meiktila</option>
                                        <option value="Taungoo">Taungoo</option>
                                    </select>
                                </div>
                                @error('city')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="submit" class="btn btn-default check_out" value="Check Out">
                            </div>
                        </div>
                    </form>
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