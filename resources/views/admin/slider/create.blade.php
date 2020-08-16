@extends('layouts.dashboard.master')

@section('content')

    <div class="slider_create">
        <div class="content-wrapper">
            <!-- form start -->
            @include('messages.success.success')
            <form role="form" method="POST" action="{{ url('slider') }}" enctype="multipart/form-data">
                <h1>Add Slider</h1>
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="slider_image">Slider Image</label>
                        {{-- <input type="text" name="slider_image" id="slider_image" class="form-control" value="{{ old('slider_image') ? old('slider_image') : null }}"> --}}
                        <input type="file" name="slider_image" id="slider_image" class="form-control">
                    </div>
                    @include('messages.errors.slider.image')

                    <div class="form-check pl-0">
                        <label for="publication_status" class="mr-1">Publication Status</label>
                        <input type="checkbox" id="publication_status" value="1" name="publication_status">
                    </div>
                    <input type="submit" value="Add Slider" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

@endsection