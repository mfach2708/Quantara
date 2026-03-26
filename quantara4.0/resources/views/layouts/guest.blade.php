<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Quantara')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest"></script>

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">

    @yield('styles')
    {{-- Responsive — load terakhir agar bisa override semua CSS di atas --}}
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    @yield('head_scripts')
</head>
<body>

    {{-- Navbar landing (pre-login) --}}
    <nav class="ln-nav">
        <a href="{{ route('landing') }}" class="ln-logo" style="text-decoration:none;color:#111;">Quantara.</a>
        <ul class="ln-menu">
            <li><a href="{{ route('landing') }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'ln-menu-active' : '' }}">About</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'ln-menu-active' : '' }}">Contact</a></li>
        </ul>
        <a href="{{ route('signin') }}" class="ln-signin">Sign In</a>
        <button class="hamburger" id="mainHamburger" aria-label="Open menu">
            <span></span><span></span><span></span>
        </button>
    </nav>

    {{-- Mobile Drawer --}}
    <div class="mobile-nav-overlay" id="mainOverlay"></div>
    <div class="mobile-nav-drawer" id="mainDrawer">
        <div class="mobile-nav-header">
            <a href="{{ route('landing') }}" class="mobile-nav-logo">Quantara.</a>
            <button class="mobile-nav-close" id="mainClose">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <ul class="mobile-nav-links">
            <li><a href="{{ route('landing') }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active-nav' : '' }}">About</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active-nav' : '' }}">Contact</a></li>
        </ul>
        <div class="mobile-nav-bottom">
            <a href="{{ route('signin') }}" class="ln-signin" style="flex:1;text-align:center;">Sign In</a>
        </div>
    </div>

    @yield('content')

    @include('layouts.footer')

    <script>lucide.createIcons();</script>

    {{-- ── HAMBURGER MENU SCRIPT ── --}}
    <script>
    (function () {
        var ham = document.getElementById('mainHamburger');
        var overlay = document.getElementById('mainOverlay');
        var drawer = document.getElementById('mainDrawer');
        var closeBtn = document.getElementById('mainClose');

        if (!ham) return;

        function openMenu() {
            ham.classList.add('open');
            overlay.classList.add('open');
            drawer.classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeMenu() {
            ham.classList.remove('open');
            overlay.classList.remove('open');
            drawer.classList.remove('open');
            document.body.style.overflow = '';
        }

        ham.addEventListener('click', openMenu);
        if (overlay)  overlay.addEventListener('click', closeMenu);
        if (closeBtn) closeBtn.addEventListener('click', closeMenu);

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeMenu();
        });
    })();
    </script>

    @yield('scripts')
</body>
</html>
