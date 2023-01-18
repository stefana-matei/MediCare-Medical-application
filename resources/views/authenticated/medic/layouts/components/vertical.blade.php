<!-- Vertical navbar -->
<div id="navbar2" class="app-navbar vertical">
    <div class="navbar-wrap">

        <button class="no-style navbar-toggle navbar-close icofont-close-line d-lg-none"></button>


        <div class="app-logo">
            <div class="logo-wrap">
                <a class="item-link" href="{{ route('medic.dashboard') }}">
                    @include('components.logo')
                </a>
            </div>
        </div>

        <div class="main-menu">
            <nav class="main-menu-wrap">
                <ul class="menu-ul">
                    <li class="menu-item">
                        <span class="group-title">Cont medic</span>
                    </li>

                    <li class="menu-item">
                        <a class="item-link" href="{{ route('medic.dashboard') }}">
                            <span class="link-icon icofont-ui-home"></span>
                            <span class="link-text">Home</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="item-link" href="{{ route('medic.appointments.list') }}">
                            <span class="link-icon icofont-calendar"></span>
                            <span class="link-text">Programări</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="item-link" href="{{ route('patients.myPatients') }}">
                            <span class="link-icon icofont-users"></span>
                            <span class="link-text">Pacienții mei</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

{{--        <div class="add-patient">--}}
{{--            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-patient">--}}
{{--                <span class="btn-icon icofont-plus me-2"></span>--}}
{{--                Adăugare pacient--}}
{{--            </button>--}}
{{--        </div>--}}

        <div class="vertical-overlay">
            <span class="large-icon icofont-doctor"></span>
        </div>
    </div>
</div>
<!-- end Vertical navbar -->
