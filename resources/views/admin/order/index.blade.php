@extends('layouts.dashboard.master')

@section('content')

    <div class="order_index">
        <div class="content-wrapper">
            @include('messages.success.success')
            @if($orders)
                <table class="table m-2">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Order Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->customer->name }}</td>
                                <td>${{ $order->total }}</td>
                                <td class="status-bar"><span class="badge {{ $order->status === 1 ? 'badge-success' : 'badge-secondary' }}">{{ $order->status === 1 ? 'Pending' : 'Unpending' }}</span></td>
                                <td class="d-flex justify-content-between align-items-center">
                                    <a href="#" class="status badge {{ $order->status === 0 ? 'badge-success' : 'badge-secondary' }}" data-id="{{ $order->id }}" data-status="{{ $order->status === 1 ? 0 : 1 }}"><i class="far {{ $order->status === 0 ? 'fa-thumbs-up' : 'fa-thumbs-down' }}"></i></a>
                                    <a href="{{ url('order/show/'.$order->id) }}" class="badge badge-info"><i class="far fa-eye"></i></a>
                                    <a href="#" class="badge badge-danger delete" data-id="{{ $order->id }}"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection

@section('jQuery')
    <script>
        $(document).ready(function(){
            $('.status').on('click', function(){
                var target = $(this);
                var children = target.children();
                var id = $(this).attr('data-id');
                var status = $(this).attr('data-status');
                // var token = "{{ csrf_token()}}";
                var token = "{{ Session::token() }}";
                var status_bar = target.parent().parent().children('td.status-bar');
                // var method = "{{ method_field('put') }}";

                $.ajax({
                    url: '{{ url("order/status") }}',
                    // type: 'post',
                    method: 'post',
                    dataType: "json",
                    // data: {_method: method, _token: token, id: id, status: status},
                    data: {_method: 'put', _token: token, id: id, status: status},
                    success: function(data){
                        // console.log(data);
                        // console.log(data.category.publication_status);
                        // console.log(target);   
                        if(data.order.status == 1)
                        {
                            target.attr('data-status', '0');
                            target.removeClass('badge-success');
                            target.addClass('badge-secondary');
                            children.removeClass('fa-thumbs-up');
                            children.addClass('fa-thumbs-down');
                            status_bar.children('span').html('Pending');
                            status_bar.children('span').removeClass('badge-secondary');
                            status_bar.children('span').addClass('badge-success');
                            // console.log('0');
                        }
                        else
                        {
                            target.attr('data-status', '1');
                            target.removeClass('badge-secondary');
                            target.addClass('badge-success');
                            children.removeClass('fa-thumbs-down');
                            children.addClass('fa-thumbs-up');
                            status_bar.children('span').html('Unpending');
                            status_bar.children('span').removeClass('badge-success');
                            status_bar.children('span').addClass('badge-secondary');
                            // console.log('1');
                        }
                    },
                    error: function(data)
                    {
                        console.log(data);
                    } 
                });
            });

            $('.delete').on('click', function(e){
                e.preventDefault();
                if(confirm("Are you sure"))
                {
                    var id = $(this).attr('data-id');
                    var token = "{{ Session::token() }}";
                    // console.log(id);
                    $.ajax({
                        url: '{{ url("order") }}' + '/' + id,
                        method: 'POST',
                        data: {_method: 'DELETE', _token: token},
                        success: function(resp){
                            location.reload();
                        },
                        error: function(error){
                            console.log(error);
                        }
                    });
                }
                else
                {
                    return false;
                }
            })
        });
    </script>
@endsection