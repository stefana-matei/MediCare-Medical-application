<!-- Horizontal navbar -->
<div id="navbar1" class="app-navbar horizontal">
    <div class="navbar-wrap">

        <button class="no-style navbar-toggle navbar-open d-lg-none">
            <span></span><span></span><span></span>
        </button>

        <x-breadcrumbs></x-breadcrumbs>

        <div class="app-actions">
{{--            <div class="dropdown item">--}}
{{--                <button--}}
{{--                    class="no-style dropdown-toggle"--}}
{{--                    type="button"--}}
{{--                    data-bs-toggle="dropdown"--}}
{{--                    aria-haspopup="true"--}}
{{--                    aria-expanded="false"--}}
{{--                    data-bs-offset="0, 12"--}}
{{--                >--}}
{{--                    <span class="icon icofont-notification"></span>--}}
{{--                    <span class="badge badge-danger badge-sm">5</span>--}}
{{--                </button>--}}

{{--                <div class="dropdown-menu dropdown-menu-right dropdown-menu-w-280">--}}
{{--                    <div class="menu-header">--}}
{{--                        <h4 class="h5 menu-title mt-0 mb-0">Notifications</h4>--}}

{{--                        <a href="#" class="text-danger">Clear All</a>--}}
{{--                    </div>--}}

{{--                    <ul class="list">--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <span class="icon icofont-heart"></span>--}}

{{--                                <div class="content">--}}
{{--                                    <span class="desc">Sara Crouch liked your photo</span>--}}
{{--                                    <span class="date">17 minutes ago</span>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <span class="icon icofont-users-alt-6"></span>--}}

{{--                                <div class="content">--}}
{{--                                    <span class="desc">New user registered</span>--}}
{{--                                    <span class="date">23 minutes ago</span>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <span class="icon icofont-share"></span>--}}

{{--                                <div class="content">--}}
{{--                                    <span class="desc">Amanda Lie shared your post</span>--}}
{{--                                    <span class="date">25 minutes ago</span>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <span class="icon icofont-users-alt-6"></span>--}}

{{--                                <div class="content">--}}
{{--                                    <span class="desc">New user registered</span>--}}
{{--                                    <span class="date">32 minutes ago</span>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">--}}
{{--                                <span class="icon icofont-ui-message"></span>--}}

{{--                                <div class="content">--}}
{{--                                    <span class="desc">You have a new message</span>--}}
{{--                                    <span class="date">58 minutes ago</span>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}

{{--                    <div class="menu-footer">--}}
{{--                        <button class="btn btn-primary w-100">--}}
{{--                            View all notifications--}}
{{--                            <span class="btn-icon ms-2 icofont-tasks-alt"></span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


            {{-- User --}}
            <div class="dropdown item">
                <button
                    class="no-style dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                    data-bs-offset="0, 10"
                >
                <span class="d-flex align-items-center">
                  <img src="{{ auth()->user()->avatar }}" alt="" width="40" height="40"
                       class="rounded-500 me-1">
                    <span class="ms-2"><strong>{{ Auth::user()->name }}</strong></span>
                  <i class="icofont-simple-down ms-2"></i>
                </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-account">
                    <ul class="list">
                        <li>
                            <a href="{{ route('account.updateView') }}" class="align-items-center">
                                <span class="icon icofont-ui-home"></span>
                                Profilul meu
                            </a>
                        </li>
                        {{--                        <li>--}}
                        {{--                            <a href="./user-profile.html" class="align-items-center">--}}
                        {{--                                <span class="icon icofont-ui-user"></span>--}}
                        {{--                                User profile--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}

                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); $('#logout').submit();"
                               class="align-items-center">
                                <span class="icon icofont-logout"></span>
                                Log Out
                            </a>
                        </li>
                        <form id="logout" method="POST" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
            {{-- End User --}}

        </div>


    </div>
</div>
<!-- end Horizontal navbar -->
