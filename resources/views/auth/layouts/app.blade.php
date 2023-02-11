<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MedicApp - Medical & Hospital HTML5/Bootstrap admin template</title>
    <meta name="keywords" content="MedicApp">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.typeahead.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/leaflet.css') }}">

    <!-- Theme CSS -->
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
<script src="{{ asset('assets/js/jquery.typeahead.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('assets/js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/js/raphael-min.js') }}"></script>
<script src="{{ asset('assets/js/morris.min.js') }}"></script>
<script src="{{ asset('assets/js/echarts.min.js') }}"></script>
<script src="{{ asset('assets/js/echarts-gl.min.js') }}"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>


</body>
</html>
