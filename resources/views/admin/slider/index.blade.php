@extends('layouts.dashboard.master')

@section('content')

    <div class="categroy_index">
        <div class="content-wrapper">
            @include('messages.success.success')
            @if($sliders)
                <table class="table m-2">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Publication_status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <th scope="row">{{ $slider->id }}</th>
                                <td class="text-center"><img src="{{ asset('storage/'. $slider->image) }}" alt="" class="img-fluid" style="width: 200px; height: 100px;"></td>
                                <td class="status-bar"><span class="badge {{ $slider->publication_status === 1 ? 'badge-success' : 'badge-secondary' }}">{{ $slider->publication_status === 1 ? 'Active' : 'Unactive' }}</span></td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="#" class="status badge {{ $slider->publication_status === 0 ? 'badge-success' : 'badge-secondary' }} mr-2" data-id="{{ $slider->id }}" data-status="{{ $slider->publication_status === 1 ? 0 : 1 }}"><i class="far {{ $slider->publication_status === 0 ? 'fa-thumbs-up' : 'fa-thumbs-down' }}"></i></a>
                                    <a href="#" class="badge badge-danger delete" data-id="{{ $slider->id }}"><i class="far fa-trash-alt"></i></a>
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
                    url: '{{ url("slider/status") }}',
                    // type: 'post',
                    method: 'post',
                    dataType: "json",
                    // data: {_method: method, _token: token, id: id, status: status},
                    data: {_method: 'put', _token: token, id: id, status: status},
                    success: function(data){
                        // console.log(data);
                        // console.log(data.brand.publication_status);
                        // console.log(target);   
                        if(data.slider.publication_status == 1)
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
                        url: '{{ url("slider") }}' + '/' + id,
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
            });
        });
    </script>
@endsection