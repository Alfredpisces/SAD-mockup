<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="default" class="light"
    data-header-styles="light" data-menu-styles="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIMS Dashboard')</title>
    <meta name="description" content="SIMS Admin Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('backend/assets/images/brand-logos/favicon.ico') }}">

    <script src="{{ asset('backend/assets/js/main.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/simplebar/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/@simonwep/pickr/themes/nano.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/jsvectormap/css/jsvectormap.min.css') }}">

    @stack('styles')

    <style>
        @media (min-width: 992px) {
            .main-content.app-content {
                margin-left: 240px !important;
            }

            .app-header {
                padding-left: 240px !important;
            }
        }
    </style>
</head>

<body>

    <div id="loader" style="display: none;">
        <img src="{{ asset('backend/assets/images/media/loader.svg') }}" alt="">
    </div>

    <div class="page">

        <header class="app-header">
            @include('partials.navbar')
        </header>

        @include('partials.sidebar')

        <div class="main-content app-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        <footer class="footer mt-auto py-3 bg-white text-center dark:bg-bodybg">
            <div class="container">
                <span class="text-muted"> Copyright © <span id="year"></span> <a href="javascript:void(0);"
                        class="text-primary">SIMS</a>.
                    Designed with <span class="fa fa-heart text-danger"></span> All rights reserved
                </span>
            </div>
        </footer>

    </div>

    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill text-xl"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    <script src="{{ asset('backend/assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

    <script src="{{ asset('backend/assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

    <script src="{{ asset('backend/assets/js/defaultmenu.js') }}"></script>

    <script src="{{ asset('backend/assets/js/switch.js') }}"></script>

    <script src="{{ asset('backend/assets/js/sticky.js') }}"></script>

    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>

    <script src="{{ asset('backend/assets/libs/preline/preline.js') }}"></script>

    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ asset('backend/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('backend/assets/js/us-merc-en.js') }}"></script>

    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>

    <script>
        document.getElementById('year').textContent = new Date().getFullYear();

        // This script forces your browser to forget the buggy "overlay" mode if it was saved
        document.addEventListener("DOMContentLoaded", function() {
            if (localStorage.getItem('ynex-vertical-style') === 'overlay') {
                localStorage.removeItem('ynex-vertical-style');
                document.documentElement.setAttribute('data-vertical-style', 'default');
            }
        });
    </script>

    @stack('scripts')

</body>

</html>
