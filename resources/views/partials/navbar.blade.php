<nav class="main-header" aria-label="Global">
    <div class="main-header-container !px-[0.85rem]">

        <div class="header-content-left">
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="{{ url('/dashboard') }}" class="header-logo flex items-center gap-2">
                        <i class="ri-shield-user-line text-primary text-[1.8rem]"></i>
                        <span class="font-bold text-[1.1rem] text-defaulttextcolor hidden sm:block">SIMS</span>
                    </a>
                </div>
            </div>

            <div class="header-element !items-center">
                <a aria-label="Hide Sidebar" id="main-header-toggle" data-bs-toggle="sidebar"
                    class="sidemenu-toggle animated-arrow header-link hor-toggle horizontal-navtoggle inline-flex items-center"
                    href="javascript:void(0);"><i class="header-icon fe fe-align-left"></i></a>
                <div class="main-header-center hidden lg:block">
                    <input
                        class="form-control placeholder:!text-headerprimecolor placeholder:opacity-70 placeholder:font-thin placeholder:text-sm"
                        placeholder="Search for anything..." type="search">
                    <button class="btn"><i class="fa fa-search hidden md:block opacity-[0.5]"></i></button>
                </div>
            </div>
        </div>

        <div class="header-content-right">
            <div class="header-element header-theme-mode hidden !items-center sm:block !py-[1rem] !px-[0.65rem]">
                <a aria-label="anchor"
                    class="hs-dark-mode-active:hidden flex hs-dark-mode group flex-shrink-0 justify-center items-center gap-2 rounded-full font-medium transition-all text-xs dark:bg-bodybg dark:hover:bg-black/20 dark:text-white/70 dark:hover:text-white dark:focus:ring-white/10 dark:focus:ring-offset-white/10"
                    href="javascript:;" data-hs-theme-click-value="dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" height="24"
                        viewBox="0 -960 960 960" width="24">
                        <path
                            d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z" />
                    </svg>
                </a>
                <a aria-label="anchor"
                    class="hs-dark-mode-active:flex hidden hs-dark-mode group flex-shrink-0 justify-center items-center gap-2 rounded-full font-medium text-defaulttextcolor transition-all text-xs dark:bg-bodybg dark:hover:bg-black/20 dark:text-white/70 dark:hover:text-white dark:focus:ring-white/10 dark:focus:ring-offset-white/10"
                    href="javascript:;" data-hs-theme-click-value="light">
                    <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" fill="currentColor" height="24"
                        viewBox="0 -960 960 960" width="24">
                        <path
                            d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z" />
                    </svg>
                </a>
            </div>

            <div class="header-element header-fullscreen py-[1rem] md:px-[0.65rem] px-2">
                <a aria-label="anchor" onclick="openFullscreen();" href="javascript:void(0);"
                    class="inline-flex flex-shrink-0 justify-center items-center gap-2 !rounded-full font-medium dark:hover:bg-black/20 dark:text-textmuted dark:hover:text-white dark:focus:ring-white/10 dark:focus:ring-offset-white/10">
                    <i class="bx bx-fullscreen full-screen-open header-link-icon"></i>
                    <i class="bx bx-exit-fullscreen full-screen-close header-link-icon hidden"></i>
                </a>
            </div>

            <div
                class="header-element md:!px-[0.5rem] px-2 hs-dropdown profile-dropdown !items-center ti-dropdown [--placement:bottom-left]">
                <button id="dropdown-profile" type="button"
                    class="hs-dropdown-toggle ti-dropdown-toggle !gap-2 !p-0 flex-shrink-0 me-0 !rounded-full !shadow-none text-xs align-middle !border-0 !shadow-transparent">
                    <img class="inline-block rounded-full" src="{{ asset('backend/assets/images/faces/6.jpg') }}"
                        width="37" height="37" alt="Profile">
                </button>
                <div class="main-header-dropdown !-mt-2 !p-0 hs-dropdown-menu ti-dropdown-menu bg-white !border-0 border-defaultborder hidden !m-0"
                    aria-labelledby="dropdown-profile">
                    <ul class="dropdown-menu pt-0 header-profile-dropdown dropdown-menu-end main-profile-menu">
                        <li>
                            <div class="main-header-profile bg-primary menu-header-content text-white">
                                <div class="my-auto">
                                    <h6 class="mb-0 leading-none text-white">{{ Auth::user()->name ?? 'Administrator' }}
                                    </h6>
                                    <span
                                        class="text-[.6875rem] opacity-[0.7] leading-none">{{ Auth::user()->email ?? '' }}</span>
                                </div>
                            </div>
                        </li>
                        <li><a class="dropdown-item text-defaulttextcolor flex" href="#"><i
                                    class="bx bx-user-circle text-[1.125rem] me-2 opacity-[0.7]"></i>Profile</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="dropdown-item text-defaulttextcolor !rounded-bl-md !rounded-br-md flex w-full">
                                    <i class="bx bx-log-out text-[1.125rem] me-2 opacity-[0.7]"></i>Sign Out
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
