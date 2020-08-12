@extends('layouts.dashboard.master')

@section('content')

    <div class="brand_create">
        <div class="content-wrapper">
            <!-- form start -->
            @include('messages.success.success')
            <form role="form" method="POST" action="{{ url('brand') }}">
                <h1>Add Brand</h1>
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="brand_name">Brand Name</label>
                        <input type="text" class="form-control" id="brand_name" placeholder="Enter Brand Name"
                            value="{{ old('brand_name') ? old('brand_name') : null }}" name="brand_name">
                    </div>
                    @include('messages.errors.brand.brand_name')
                    <div class="form-group">
                        <label for="brand_description">Brand Description</label>
                        <textarea name="brand_description" id="brand_description" cols="30" rows="10"
                            class="form-control">{{ old('brand_description') ? old('brand_description') : null }}</textarea>
                    </div>
                    @include('messages.errors.brand.brand_description')
                    <div class="form-check pl-0">
                        <label for="publication_status" class="mr-1">Publication Status</label>
                        <input type="checkbox" id="publication_status" value="1" name="publication_status">
                    </div>
                    <input type="submit" value="Add Brand" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

@endsection