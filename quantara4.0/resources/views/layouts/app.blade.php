<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Quantara')</title>

    {{-- Poppins 100–600 --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">

    {{-- Lucide Icons (outline thin) --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    {{-- Shared: navbar, footer, reset, body --}}
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">

    {{-- Smooth entrance animations --}}
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">

    {{-- Page-specific CSS --}}
    @yield('styles')

    {{-- Responsive / Mobile — harus SETELAH page-specific CSS agar override --}}
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    @yield('head_scripts')
</head>
<body>

    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')

    {{-- FAB & overlays — rendered setelah footer, di luar semua content --}}
    @stack('after_footer')

    <script>
        lucide.createIcons();
    </script>
    @yield('scripts')

    {{-- ── HAMBURGER MENU SCRIPT ── --}}
    <script>
    (function () {
        var ham = document.getElementById('mainHamburger');
        var overlay = document.getElementById('mainOverlay');
        var drawer = document.getElementById('mainDrawer');
        var closeBtn = document.getElementById('mainClose');

        if (!ham) return; // halaman tanpa navbar (tidak seharusnya)

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

        // Tutup juga kalau user tekan ESC
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeMenu();
        });
    })();
    </script>
</body>
</html>
