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
    @yield('head_scripts')
</head>
<body>

    {{-- Navbar gaya landing (pre-login) --}}
    <nav class="ln-nav">
        <a href="{{ route('landing') }}" class="ln-logo" style="text-decoration:none;color:#111;">Quantara.</a>
        <ul class="ln-menu">
            <li><a href="{{ route('landing') }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'ln-menu-active' : '' }}">About</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'ln-menu-active' : '' }}">Contact</a></li>
        </ul>
        <a href="{{ route('signin') }}" class="ln-signin">Sign In</a>
    </nav>

    @yield('content')

    @include('layouts.footer')

    <script>lucide.createIcons();</script>
    @yield('scripts')
</body>
</html>
