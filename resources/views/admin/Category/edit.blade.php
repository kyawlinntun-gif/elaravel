@extends('layouts.dashboard.master')

@section('content')

    <div class="categroy_edit">
        <div class="content-wrapper">
            <!-- form start -->
            @include('messages.success.success')
            <form role="form" method="POST" action="{{ route('category.update', $category->id) }}">
                <h1>Edit Category</h1>
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" placeholder="Enter Category Name"
                            value="{{ old('category_name') ? old('category_name') : $category->name }}" name="category_name">
                    </div>
                    @include('messages.errors.category.category_name')
                    <div class="form-group">
                        <label for="category_description">Category Description</label>
                        <textarea name="category_description" id="category_description" cols="30" rows="10"
                            class="form-control">{{ old('category_description') ? old('category_description') : $category->description }}</textarea>
                    </div>
                    @include('messages.errors.category.category_description')
                    <input type="submit" value="Edit Category" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

@endsection