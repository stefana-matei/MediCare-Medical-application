<!-- Vertical navbar -->
<div id="navbar2" class="app-navbar vertical">
    <div class="navbar-wrap">

        <button class="no-style navbar-toggle navbar-close icofont-close-line d-lg-none"></button>

        <div class="app-logo">
            <div class="logo-wrap">
                @include('components/logo')
            </div>
        </div>

        <div class="main-menu">
            <nav class="main-menu-wrap">
                <ul class="menu-ul">
                    <li class="menu-item">
                        <span class="group-title">Cont pacient</span>
                    </li>

                    <li class="menu-item">
                        <a class="item-link" href="{{ route('dashboard') }}">
                            <span class="link-icon icofont-ui-home"></span>
                            <span class="link-text">Home</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="item-link" href="{{ route('visits.list') }}">
                            <span class="link-icon icofont-ui-copy"></span>
                            <span class="link-text">Consultatii</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="item-link" href="{{ route('appointments.list') }}">
                            <span class="link-icon icofont-calendar"></span>
                            <span class="link-text">Programari</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="item-link" href="{{ route('medics.myMedics') }}">
                            <span class="link-icon icofont-stethoscope-alt"></span>
                            <span class="link-text">Medicii mei</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
        <div class="main-menu">
            <nav class="main-menu-wrap">
                <ul class="menu-ul">
                    <li class="menu-item">
                        <span class="group-title">Sanatate</span>
                    </li>

                    <li class="menu-item">
                        <a class="item-link" href="{{ route('medics.list') }}">
                            <span class="link-icon icofont-users"></span>
                            <span class="link-text">Medici</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="vertical-overlay">
            <span class="large-icon icofont-doctor"></span>
        </div>

    </div>
</div>
<!-- end Vertical navbar -->
