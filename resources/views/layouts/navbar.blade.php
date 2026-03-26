@if(session('is_logged_in'))
{{-- ── NAVBAR AFTER LOGIN ── --}}
<nav class="navbar">
    <div class="logo">Quantara.</div>
    <ul class="menu">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active-nav' : '' }}">Home</a></li>
        <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active-nav' : '' }}">About</a></li>
        <li><a href="{{ route('analisis') }}" class="{{ request()->routeIs('analisis') ? 'active-nav' : '' }}">Analysis</a></li>
        <li><a href="{{ route('edukasi') }}" class="{{ request()->routeIs('edukasi') ? 'active-nav' : '' }}">Education</a></li>
        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active-nav' : '' }}">Contact</a></li>
    </ul>
    <div class="nav-icons">
        <a href="{{ route('settings') }}" class="nav-icon-link {{ request()->routeIs('settings') ? 'nav-icon-active' : '' }}">
            <i data-lucide="settings"></i>
        </a>
        <a href="{{ route('profile') }}">
            <img src="https://i.pravatar.cc/40" alt="User Avatar">
        </a>
    </div>
</nav>

@else
{{-- ── NAVBAR GUEST (belum login) ── --}}
<nav class="navbar">
    <a href="{{ route('landing') }}" class="logo" style="text-decoration:none;color:#111;">Quantara.</a>
    <ul class="menu">
        <li><a href="{{ route('landing') }}">Home</a></li>
        <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active-nav' : '' }}">About</a></li>
        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active-nav' : '' }}">Contact</a></li>
    </ul>
    <a href="{{ route('signin') }}" class="nav-signin">Sign In</a>
</nav>
@endif
