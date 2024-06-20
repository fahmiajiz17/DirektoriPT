<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard_admin') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <span style="color: var(--bs-primary)">
                    <img src="images/twh.png" width="33" height="33" alt="Logo">
                </span>
            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2">DirektoriPT</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.47365 11.7183C8.11707 12.0749 8.11707 12.6531 8.47365 13.0097L12.071 16.607C12.4615 16.9975 12.4615 17.6305 12.071 18.021C11.6805 18.4115 11.0475 18.4115 10.657 18.021L5.83009 13.1941C5.37164 12.7356 5.37164 11.9924 5.83009 11.5339L10.657 6.707C11.0475 6.31653 11.6805 6.31653 12.071 6.707C12.4615 7.09747 12.4615 7.73053 12.071 8.121L8.47365 11.7183Z"
                    fill-opacity="0.9" />
                <path
                    d="M14.3584 11.8336C14.0654 12.1266 14.0654 12.6014 14.3584 12.8944L18.071 16.607C18.4615 16.9975 18.4615 17.6305 18.071 18.021C17.6805 18.4115 17.0475 18.4115 16.657 18.021L11.6819 13.0459C11.3053 12.6693 11.3053 12.0587 11.6819 11.6821L16.657 6.707C17.0475 6.31653 17.6805 6.31653 18.071 6.707C18.4615 7.09747 18.4615 7.73053 18.071 8.121L14.3584 11.8336Z"
                    fill-opacity="0.4" />
            </svg>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <!-- Dashboards -->
        <li class="menu-item {{ request()->routeIs('dashboard_admin') ? 'active' : '' }}">
            <a href="{{ route('dashboard_admin') }}" class="menu-link">
                <i class="menu-icon tf-icons ri-home-smile-line"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <!-- Main Navigation -->
        <li class="menu-header mt-5">
            <span class="menu-header-text" data-i18n="Main Navigation">Main Navigation</span>
        </li>

        <!-- Kelola Data Lembaga -->
        <li class="menu-item {{ request()->routeIs('kelola_data_pt') || request()->routeIs('kelola_data_prodi') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-graduation-cap-line"></i>
                <div data-i18n="Kelola Data Lembaga">Kelola Data Lembaga</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('kelola_data_pt') ? 'active' : '' }}">
                    <a href="{{ route('kelola_data_pt') }}" class="menu-link">
                        <div data-i18n="Data Perguruan Tinggi">Data Perguruan Tinggi</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('kelola_data_prodi') ? 'active' : '' }}">
                    <a href="{{ route('kelola_data_prodi') }}" class="menu-link">
                        <div data-i18n="Data Program Studi">Data Program Studi</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ request()->routeIs('rekap_apt') || request()->routeIs('rekap_aprodi') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-file-list-3-line"></i>
                <div data-i18n="Rekap Data">Rekap Data</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('rekap_apt') ? 'active' : '' }}">
                    <a href="{{ route('rekap_apt') }}" class="menu-link">
                        <div data-i18n="Akreditasi Perguruan Tinggi">Akreditasi Perguruan Tinggi</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('rekap_aprodi') ? 'active' : '' }}">
                    <a href="{{ route('rekap_aprodi') }}" class="menu-link">
                        <div data-i18n="Akreditasi Program Studi">Akreditasi Program Studi</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Validasi Data -->
        <li class="menu-header mt-5">
            <span class="menu-header-text" data-i18n="Validasi Data">Validasi Data</span>
        </li>

        <!-- Extended components -->
        <li class="menu-item {{ request()->routeIs('penyelenggara') || request()->routeIs('lembaga_data_pokok') || request()->routeIs('lembaga_data_pendirian') || request()->routeIs('lembaga_data_akreditasi') || request()->routeIs('prodi_data_pokok') || request()->routeIs('prodi_data_pendirian') || request()->routeIs('prodi_data_akreditasi') ? 'active' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-list-view"></i>
                <div data-i18n="Lembaga & Yayasan">Lembaga & Yayasan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('penyelenggara') ? 'active' : '' }}">
                    <a href="#" class="menu-link">
                        <div data-i18n="Penyelenggara">Penyelenggara</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('lembaga_data_pokok') || request()->routeIs('lembaga_data_pendirian') || request()->routeIs('lembaga_data_akreditasi') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="Lembaga">Lembaga</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('lembaga_data_pokok') ? 'active' : '' }}">
                            <a href="#" class="menu-link">
                                <div data-i18n="Data Pokok">Data Pokok</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('lembaga_data_pendirian') ? 'active' : '' }}">
                            <a href="#" class="menu-link">
                                <div data-i18n="Data Pendirian">Data Pendirian</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('lembaga_data_akreditasi') ? 'active' : '' }}">
                            <a href="#" class="menu-link">
                                <div data-i18n="Data Akreditasi">Data Akreditasi</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item {{ request()->routeIs('prodi_data_pokok') || request()->routeIs('prodi_data_pendirian') || request()->routeIs('prodi_data_akreditasi') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="Program Studi">Program Studi</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->routeIs('prodi_data_pokok') ? 'active' : '' }}">
                            <a href="#" class="menu-link">
                                <div data-i18n="Data Pokok">Data Pokok</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('prodi_data_pendirian') ? 'active' : '' }}">
                            <a href="#" class="menu-link">
                                <div data-i18n="Data Pendirian">Data Pendirian</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->routeIs('prodi_data_akreditasi') ? 'active' : '' }}">
                            <a href="#" class="menu-link">
                                <div data-i18n="Data Akreditasi">Data Akreditasi</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<!-- / Menu -->
