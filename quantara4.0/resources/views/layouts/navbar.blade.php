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
    <button class="hamburger" id="mainHamburger" aria-label="Open menu">
        <span></span><span></span><span></span>
    </button>
</nav>

<div class="mobile-nav-overlay" id="mainOverlay"></div>
<div class="mobile-nav-drawer" id="mainDrawer">
    <div class="mobile-nav-header">
        <span class="mobile-nav-logo">Quantara.</span>
        <button class="mobile-nav-close" id="mainClose">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
    </div>
    <ul class="mobile-nav-links">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active-nav' : '' }}">Home</a></li>
        <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active-nav' : '' }}">About</a></li>
        <li><a href="{{ route('analisis') }}" class="{{ request()->routeIs('analisis') ? 'active-nav' : '' }}">Analysis</a></li>
        <li><a href="{{ route('edukasi') }}" class="{{ request()->routeIs('edukasi') ? 'active-nav' : '' }}">Education</a></li>
        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active-nav' : '' }}">Contact</a></li>
        <li><a href="{{ route('settings') }}" class="{{ request()->routeIs('settings') ? 'active-nav' : '' }}">Settings</a></li>
        <li><a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active-nav' : '' }}">Profile</a></li>
    </ul>
</div>

@else
{{-- ── NAVBAR GUEST ── --}}
<nav class="navbar">
    <a href="{{ route('landing') }}" class="logo" style="text-decoration:none;color:#111;">Quantara.</a>
    <ul class="menu">
        <li><a href="{{ route('landing') }}">Home</a></li>
        <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active-nav' : '' }}">About</a></li>
        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active-nav' : '' }}">Contact</a></li>
    </ul>
    <a href="{{ route('signin') }}" class="nav-signin">Sign In</a>
    <button class="hamburger" id="mainHamburger" aria-label="Open menu">
        <span></span><span></span><span></span>
    </button>
</nav>

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
        <a href="{{ route('signin') }}" class="nav-signin" style="flex:1;text-align:center;">Sign In</a>
    </div>
</div>
@endif
