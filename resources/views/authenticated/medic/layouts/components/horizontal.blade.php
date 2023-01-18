<!-- Horizontal navbar -->
<div id="navbar1" class="app-navbar horizontal">
    <div class="navbar-wrap">

        <button class="no-style navbar-toggle navbar-open d-lg-none">
            <span></span><span></span><span></span>
        </button>

        <x-breadcrumbs></x-breadcrumbs>

        <div class="app-actions">
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
                            <a href="{{ route('medic.updateView') }}" class="align-items-center">
                                <span class="icon icofont-ui-user"></span>
                                Profilul meu
                            </a>
                        </li>

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
        </div>


    </div>
</div>
<!-- end Horizontal navbar -->
