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

    @yield('head')
</head>

<body class="vertical-layout boxed loaded">

@if(session('success'))
    <div id="toast-wrapper">
        <div id="toast" class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{session('success')}}
                </div>
                <button type="button" class="btn-close btn-close-white m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

@if(session('fail'))
    <div id="toast-wrapper">
        <div id="toast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{session('fail')}}
                </div>
                <button type="button" class="btn-close btn-close-white m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

<div class="page-box">
    <div class="app-container">

        @include('authenticated.medic.layouts.components.horizontal')
        @include('authenticated.medic.layouts.components.vertical')

        <main class="main-content mb-0">
            <div class="main-content-wrap">
                <header class="page-header">
                    @yield('header')
                </header>
                <div class="page-content">
                    @yield('main')
                </div>
            </div>
        </main>

    </div>
</div>

@yield('modals')

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-migrate-1.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

@yield('scripts')

</body>
</html>
