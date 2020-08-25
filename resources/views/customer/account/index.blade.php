<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="account-index mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            User Account Info
                            <a href="{{ url('home') }}" class="btn btn-primary float-right">Back Home</a>
                        </div>
                        <div class="card-body">
                            <form class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" readonly value="{{ Auth::guard('customer')->check() ? Auth::guard('customer')->user()->name : null }}">
                            </form>
                            <form class="form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control" readonly value="{{ Auth::guard('customer')->check() ? Auth::guard('customer')->user()->email : null }}">
                            </form>
                            <form class="form-group">
                                <label for="password">Password</label>
                                <input type="text" id="password" class="form-control" readonly value="{{ Auth::guard('customer')->check() ? Auth::guard('customer')->user()->password : null }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>

</body>

</html>