<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MediCare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body class="public-layout">

<div class="page-box">
    <div class="app-container @yield('type')">

        <div class="content-box">
            <div class="content-header mb-5">
                <div class="app-logo">
                    <div class="logo-wrap justify-content-center">
                        @include('components/logo')
                    </div>
                </div>
            </div>

            <div class="content-body">
                <div class="w-100">
                    @yield('main')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-migrate-1.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>


</body>
</html>
