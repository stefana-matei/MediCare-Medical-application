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
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">

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
</head>


<body class="vertical-layout boxed">

{{--<div class="app-loader main-loader">--}}
{{--    <div class="loader-box">--}}
{{--        <div class="bounceball"></div>--}}
{{--        <div class="text">Medic<span>app</span></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- .main-loader -->

<div class="page-box">
    <div class="app-container">

        @include('authenticated.layouts.components.horizontal')
        @include('authenticated.layouts.components.vertical')


        <main class="main-content">
            <div class="app-loader"><i class="icofont-spinner-alt-4 rotate"></i></div>

            <div class="main-content-wrap">
                <div class="page-content">
                    @yield('main')
                </div>
            </div>
        </main>

        @include('authenticated.layouts.components.footer')

    </div>
</div>

<!-- Add patients modals -->
<div class="modal fade" id="add-patient" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new patient</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group avatar-box d-flex">
                        <img src="{{ asset('assets/content/anonymous-400.jpg') }}" width="40" height="40" alt="" class="rounded-500 me-4">

                        <button class="btn btn-outline-primary" type="button">
                            Select image<span class="btn-icon icofont-ui-user ms-2"></span>
                        </button>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Name">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="number" placeholder="Number">
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <input class="form-control" type="number" placeholder="Age">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <select class="selectpicker" title="Gender">
                                    <option class="d-none">Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <textarea class="form-control" placeholder="Address" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-block">
                <div class="actions justify-content-between">
                    <button type="button" class="btn btn-error" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-info">Add patient</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Add patients modals -->

<!-- Add patients modals -->
<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Application's settings</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Layout</label>
                        <select class="selectpicker" title="Layout" id="layout">
                            <option value="horizontal-layout">Horizontal</option>
                            <option value="vertical-layout">Vertical</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Light/dark topbar</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="topbar">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Light/dark sidebar</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="sidebar">
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <label>Boxed/fullwidth mode</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="boxed" checked>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-block">
                <div class="actions justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="reset-to-default" type="button" class="btn btn-error">Reset to default</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Add patients modals -->

@yield('modals')

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
