@extends('layouts.dashboard.master')

@section('content')

    <div class="categroy_index">
        <div class="content-wrapper">
            @include('messages.success.success')
            @if($products)
                <table class="table m-2">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Size</th>
                            <th scope="col">Color</th>
                            <th scope="col">Publication_status</th>
                            <th scope="col">Category</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td><img src="{{ asset('storage/'. $product->image) }}" alt="" class="img-fluid" style="width: 100px; height: 50px;"></td>
                                <td>{{ $product->size }}</td>
                                <td>{{ $product->color }}</td>
                                <td class="status-bar"><span class="badge {{ $product->publication_status === 1 ? 'badge-success' : 'badge-secondary' }}">{{ $product->publication_status === 1 ? 'Active' : 'Unactive' }}</span></td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->manufacture->name }}</td>
                                <td class="d-flex justify-content-between align-items-center">
                                    <a href="#" class="status badge {{ $product->publication_status === 0 ? 'badge-success' : 'badge-secondary' }}" data-id="{{ $product->id }}" data-status="{{ $product->publication_status === 1 ? 0 : 1 }}"><i class="far {{ $product->publication_status === 0 ? 'fa-thumbs-up' : 'fa-thumbs-down' }}"></i></a>
                                    <a href="{{ route('product.edit', $product->id) }}" class="badge badge-info"><i class="far fa-edit"></i></a>
                                    <a href="#" class="badge badge-danger delete" data-id="{{ $product->id }}"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">{{ $products->links() }}</td>
                        </tr>
                    </tfoot>
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
                    url: '{{ url("product/status") }}',
                    // type: 'post',
                    method: 'post',
                    dataType: "json",
                    // data: {_method: method, _token: token, id: id, status: status},
                    data: {_method: 'put', _token: token, id: id, status: status},
                    success: function(data){
                        // console.log(data);
                        // console.log(data.brand.publication_status);
                        // console.log(target);   
                        if(data.product.publication_status == 1)
                        {
                            target.attr('data-status', '0');
                            target.removeClass('badge-success');
                            target.addClass('badge-secondary');
                            children.removeClass('fa-thumbs-up');
                            children.addClass('fa-thumbs-down');
                            status_bar.children('span').html('active');
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
                            status_bar.children('span').html('unactive');
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
                        url: '{{ url("product") }}' + '/' + id,
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