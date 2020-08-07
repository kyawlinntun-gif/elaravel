@extends('layouts.dashboard.master')

@section('content')

    <div class="categroy_create">
        <div class="content-wrapper">
            <!-- form start -->
            @include('messages.success.success')
            <form role="form" method="POST" action="{{ url('category') }}">
                <h1>Add Category</h1>
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" placeholder="Enter Category Name"
                            value="{{ old('category_name') ? old('category_name') : null }}" name="category_name">
                    </div>
                    @include('messages.errors.category_name')
                    <div class="form-group">
                        <label for="category_description">Category Description</label>
                        <textarea name="category_description" id="category_description" cols="30" rows="10"
                            class="form-control">{{ old('category_description') ? old('category_description') : null }}</textarea>
                    </div>
                    @include('messages.errors.category_description')
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