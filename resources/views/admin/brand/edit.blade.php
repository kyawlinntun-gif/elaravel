@extends('layouts.dashboard.master')

@section('content')

    <div class="manufacture_edit">
        <div class="content-wrapper">
            <!-- form start -->
            @include('messages.success.success')
            <form role="form" method="POST" action="{{ route('brand.update', $manufacture->id) }}">
                <h1>Edit Manufacture</h1>
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="manufacture_name">Manufacture Name</label>
                        <input type="text" class="form-control" id="manufacture_name" placeholder="Enter Manufacture Name"
                            value="{{ old('brand_name') ? old('brand_name') : $manufacture->name }}" name="brand_name">
                    </div>
                    @include('messages.errors.brand.brand_name')
                    <div class="form-group">
                        <label for="manufacture_description">Manufacture Description</label>
                        <textarea name="brand_description" id="manufacture_description" cols="30" rows="10"
                            class="form-control">{{ old('brand_description') ? old('brand_description') : $manufacture->description }}</textarea>
                    </div>
                    @include('messages.errors.brand.brand_description')
                    <input type="submit" value="Edit Manufacture" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

@endsection