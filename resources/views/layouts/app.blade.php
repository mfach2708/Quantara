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
</body>
</html>
