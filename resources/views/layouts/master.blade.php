<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset('backend/assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/simplebar/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/@simonwep/pickr/themes/nano.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/jsvectormap/css/jsvectormap.min.css') }}">

    <!-- Main JS (in head) -->
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>

    @stack('styles')
</head>

<body>
    <!-- Loader -->
    <div id="loader">
        <img src="{{ asset('backend/assets/images/brand-logos/desktop-logo.png') }}" alt="loader">
    </div>

    <div class="page">
        <!-- Header -->
        <header class="app-header">
            @include('partials.navbar')
        </header>

        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Content -->
        <div class="content">
            <div class="main-content">
                @yield('content')
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer mt-auto">
            <div class="container text-center py-3">
                <span class="text-muted">&copy; {{ date('Y') }} SIMS. All rights reserved.</span>
            </div>
        </footer>
    </div>

    <!-- Back to Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>

    <!-- Responsive Overlay -->
    <div id="responsive-overlay"></div>

    <!-- JS -->
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
    <script src="{{ asset('backend/assets/js/index.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom-switcher.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>

    @stack('scripts')
</body>

</html>
