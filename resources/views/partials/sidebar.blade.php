<aside class="app-sidebar" id="sidebar">

    <div class="main-sidebar-header !justify-start">
        <a href="{{ route('dashboard') }}" class="header-logo flex items-center gap-2">
            <i class="ri-shield-user-line text-primary text-[2rem] desktop-logo"></i>
            <i class="ri-shield-user-line text-primary text-[2rem] desktop-dark"></i>
            <i class="ri-shield-user-line text-primary text-[2rem] desktop-white"></i>
            <i class="ri-shield-user-line text-primary text-[1.5rem] toggle-logo"></i>
            <i class="ri-shield-user-line text-primary text-[1.5rem] toggle-dark"></i>

            <span
                class="desktop-logo desktop-dark desktop-white font-bold text-[1.2rem] text-defaulttextcolor">SIMS</span>
        </a>
    </div>
    <div class="main-sidebar" id="sidebar-scroll">
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>

            <ul class="main-menu">
                <li class="slide__category"><span class="category-name">Main</span></li>

                <li class="slide">
                    <a href="{{ route('dashboard') }}"
                        class="side-menu__item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bx bx-home side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>

                <li class="slide__category"><span class="category-name">Management</span></li>

                <li class="slide">
                    <a href="{{ route('users.index') }}"
                        class="side-menu__item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                        <i class="bx bx-group side-menu__icon"></i>
                        <span class="side-menu__label">Users</span>
                    </a>
                </li>

                {{-- <li class="slide">
                    <a href="{{ route('roles.index') }}"
                        class="side-menu__item {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                        <i class="bx bx-shield-quarter side-menu__icon"></i>
                        <span class="side-menu__label">Roles</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="{{ route('permissions.index') }}"
                        class="side-menu__item {{ request()->routeIs('permissions.*') ? 'active' : '' }}">
                        <i class="bx bx-key side-menu__icon"></i>
                        <span class="side-menu__label">Permissions</span>
                    </a>
                </li> --}}
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
