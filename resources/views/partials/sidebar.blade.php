<aside class="app-sidebar" id="sidebar">

    <!-- Sidebar Header / Logo -->
    <div class="main-sidebar-header">
        <a href="{{ url('/dashboard') }}" class="header-logo">
            <img src="{{ asset('backend/assets/images/brand-logos/desktop-logo.png') }}" alt="logo"
                class="desktop-logo">
            <img src="{{ asset('backend/assets/images/brand-logos/toggle-logo.png') }}" alt="logo"
                class="toggle-logo">
            <img src="{{ asset('backend/assets/images/brand-logos/desktop-dark.png') }}" alt="logo"
                class="desktop-dark">
            <img src="{{ asset('backend/assets/images/brand-logos/toggle-dark.png') }}" alt="logo"
                class="toggle-dark">
            <img src="{{ asset('backend/assets/images/brand-logos/desktop-white.png') }}" alt="logo"
                class="desktop-white">
        </a>
    </div>

    <!-- Sidebar Body -->
    <div class="main-sidebar" id="sidebar-scroll">
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>

            <ul class="main-menu">

                <!-- ========== MAIN ========== -->
                <li class="slide__category"><span class="category-name">Main</span></li>

                <!-- Dashboard -->
                <li class="slide">
                    <a href="{{ url('/dashboard') }}" class="side-menu__item">
                        <i class="bx bx-home side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>

                <!-- ========== MANAGEMENT ========== -->
                <li class="slide__category"><span class="category-name">Management</span></li>

                <!-- Users -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-user side-menu__icon"></i>
                        <span class="side-menu__label">Users</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1"><a href="javascript:void(0);">Users</a></li>
                        <li class="slide">
                            <a href="{{ url('/users') }}" class="side-menu__item">All Users</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('/users/create') }}" class="side-menu__item">Add User</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('/roles') }}" class="side-menu__item">Roles</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('/permissions') }}" class="side-menu__item">Permissions</a>
                        </li>
                    </ul>
                </li>

            </ul>

            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg>
            </div>
        </nav>
    </div>

</aside>
