@extends('layouts.dashboard.master')

@section('content')

    <div class="product_create">
        <div class="content-wrapper">
            <!-- form start -->
            @include('messages.success.success')
            <form role="form" method="POST" action="{{ url('product') }}">
                <h1>Add Product</h1>
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name" placeholder="Enter Product Name"
                            value="{{ old('product_name') ? old('product_name') : null }}" name="product_name">
                    </div>
                    @include('messages.errors.product.name')

                    <div class="form-group">
                        <label for="product_short_description">Product Short Description</label>
                        <textarea name="product_short_description" id="product_short_description" cols="30" rows="10"
                            class="form-control">{{ old('product_short_description') ? old('product_short_description') : null }}</textarea>
                    </div>
                    @include('messages.errors.product.short_description')

                    <div class="form-group">
                        <label for="product_long_description">Product Long Description</label>
                        <textarea name="product_long_description" id="product_long_description" cols="30" rows="10"
                            class="form-control">{{ old('product_long_description') ? old('product_long_description') : null }}</textarea>
                    </div>
                    @include('messages.errors.product.long_description')

                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input type='text' name="product_price" id="product_price" class="form-control" value="{{ old('product_price') ? old('product_price') : null }}">
                    </div>
                    @include('messages.errors.product.price')

                    <div class="form-group">
                        <label for="product_image">Product Image</label>
                        <input type="text" name="product_image" id="product_image" class="form-control" value="{{ old('product_image') ? old('product_image') : null }}">
                    </div>
                    @include('messages.errors.product.image')

                    <div class="form-group">
                        <label for="product_size">Product Size</label>
                        <input type="text" name="product_size" id="product_size" class="form-control" value="{{ old('product_size') ? old('product_size') : null }}">
                    </div>
                    @include('messages.errors.product.size')

                    <div class="form-group">
                        <label for="product_color">Product Color</label>
                        <input type="text" name="product_color" id="product_color" class="form-control" value="{{ old('product_color') ? old('product_color') : null }}">
                    </div>
                    @include('messages.errors.product.color')

                    <div class="form-group">
                        <label for="category">Select Category</label>
                        <select class="form-control" id="category" name="category_id">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    @include('messages.errors.product.category_id')

                    <div class="form-group">
                        <label for="brand">Select Brand</label>
                        <select class="form-control" id="brand" name="brand_id">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    @include('messages.errors.product.brand_id')

                    <div class="form-check pl-0">
                        <label for="publication_status" class="mr-1">Publication Status</label>
                        <input type="checkbox" id="publication_status" value="1" name="publication_status">
                    </div>
                    <input type="submit" value="Add Category" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

@endsection