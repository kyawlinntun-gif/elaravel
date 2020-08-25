@extends('layouts.dashboard.master')

@section('content')

    <div class="content-wrapper">
        <div class="dashboard">
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h1>Admin Info</h1>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" value="{{ Auth::check() ? Auth::user()->name : null }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" class="form-control" value="{{ Auth::check() ? Auth::user()->email : null }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <input type="text" id="role" class="form-control" value="{{ Auth::user()->roles->pluck('name')->implode('') }}" readonly>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection