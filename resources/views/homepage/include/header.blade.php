<script src="{{ asset('assets/vendor/js/dropdown-hover.js') }}"></script>
<script src="{{ asset('assets/vendor/js/mega-dropdown.js') }}"></script>

<!-- Navbar: Start -->
<nav class="layout-navbar container shadow-none py-0">
    <div class="navbar navbar-expand-lg landing-navbar border-top-0 px-4 px-md-8" style="border: 2px solid #ebebeb;">
        <!-- Menu logo wrapper: Start -->
        <div class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-6">
            <!-- Mobile menu toggle: Start-->
            <button class="navbar-toggler border-0 px-0 me-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="tf-icons ri-menu-fill ri-24px align-middle"></i>
            </button>
            <!-- Mobile menu toggle: End-->
            <a href="{{ route('dashboard_homepage') }}" class="app-brand-link">
                <span class="app-brand-logo demo">
                    <span style="color: #666cff">
                        <img src="images/twh.png" width="33" height="33" alt="Logo">
                    </span>
                </span>
                <span class="app-brand-text demo menu-text fw-semibold ms-2 ps-1">DirektoriPT</span>
            </a>
        </div>
        <!-- Menu logo wrapper: End -->
        <!-- Menu wrapper: Start -->
        <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
            <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
                type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tf-icons ri-close-fill"></i>
            </button>
            <ul class="navbar-nav me-auto p-4 p-lg-0">
                <li class="nav-item {{ request()->routeIs('dashboard_homepage') ? 'active' : '' }}">
                    <a class="nav-link" aria-current="page" href="{{ route('dashboard_homepage') }}">Home</a>
                </li>

                <li class="nav-item {{ request()->routeIs('listPT') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ 'listPT' }}">List Perguruan Tinggi</a>
                </li>

                <li class="nav-item dropdown {{ request()->routeIs('sebaranPT') || request()->routeIs('kerjasamaPT') || 
                    request()->routeIs('inovasiPT') ? 'active' : '' }}">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="ri-menu-search-line me-1"></i>Pencarian Data
                    </a>
                    <ul class="dropdown-menu">
                        <li class="menu-item {{ request()->routeIs('sebaranPT') ? 'active' : '' }}">
                            <a href="{{ 'sebaranPT' }}" class="dropdown-item d-flex align-items-center">
                                <i class="ri-map-pin-line scaleX-n1-rtl me-2"></i>Sebaran Perguruan Tinggi</a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('kerjasamaPT') ? 'active' : '' }}">
                            <a href="{{ 'kerjasamaPT' }}" class="dropdown-item d-flex align-items-center">
                                <i class="ri-book-2-line scaleX-n1-rtl me-2"></i>Kerjasama Perguruan Tinggi</a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('inovasiPT') ? 'active' : '' }}">
                            <a href="{{ 'inovasiPT' }}" class="dropdown-item d-flex align-items-center">
                                <i class="ri-list-view scaleX-n1-rtl me-2"></i>Inovasi Perguruan Tinggi</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown {{ request()->routeIs('imp4a') || request()->routeIs('impMBKM') || 
                    request()->routeIs('pemantauanTM') ? 'active' : '' }}">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="ri-menu-line me-1"></i>Akademik
                    </a>
                    <ul class="dropdown-menu">
                        <li class="menu-item {{ request()->routeIs('imp4a') ? 'active' : '' }}">
                            <a href="{{ 'imp4a' }}" class="dropdown-item d-flex align-items-center">
                                <i class="ri-arrow-right-s-line scaleX-n1-rtl me-2"></i>Implementasi 4A</a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('impMBKM') ? 'active' : '' }}">
                            <a href="{{ 'impMBKM' }}" class="dropdown-item d-flex align-items-center">
                                <i class="ri-arrow-right-s-line scaleX-n1-rtl me-2"></i>Implementasi MBKM</a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('pemantauanTM') ? 'active' : '' }}">
                            <a href="{{ 'pemantauanTM' }}" class="dropdown-item d-flex align-items-center">
                                <i class="ri-arrow-right-s-line scaleX-n1-rtl me-2"></i>Pemantauan Tatap Muka</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="landing-menu-overlay d-lg-none"></div>
        <!-- Menu wrapper: End -->
        <!-- Toolbar: Start -->
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- navbar button: Start -->
            <li>
                <a href="{{ route('login') }}" class="btn btn-primary px-2 px-sm-4 px-lg-2 px-xl-4"><span
                        class="tf-icons ri-user-line me-md-1"></span><span
                        class="d-none d-md-block">Login/Register</span></a>
            </li>
            <!-- navbar button: End -->
        </ul>
        <!-- Toolbar: End -->
    </div>
</nav>
<!-- Navbar: End -->
