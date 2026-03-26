<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantara — Business Clarity, Built for Small Business</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
</head>
<body>

{{-- ═══ NAVBAR ═══ --}}
<nav class="ln-nav">
    <div class="ln-logo">Quantara.</div>
    <ul class="ln-menu">
        <li><a href="#">Home</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
    </ul>
    <a href="{{ route('signin') }}" class="ln-signin">Sign In</a>
</nav>

{{-- ═══ HERO ═══ --}}
<section class="ln-hero">
    <div class="ln-hero-inner">
        <h1 class="ln-heading">
            Business Clarity,<br>
            Built for Small Business.
        </h1>
        <p class="ln-desc">
            Quantara helps you track income, analyze profit and loss, and understand your
            business performance — all in one place. No accounting degree required.
        </p>
        <div class="ln-actions">
            <a href="{{ route('signin') }}" class="ln-btn-primary">Get Started</a>
            <a href="{{ route('about') }}" class="ln-btn-ghost">View Detail</a>
        </div>
    </div>
</section>

{{-- ═══ PREVIEW SECTION ═══ --}}
<section class="ln-preview">
    <div class="ln-preview-label">
        <span class="ln-preview-dot"></span>
        Dashboard Preview
    </div>
    <div class="ln-preview-window">
        <div class="ln-window-bar">
            <span class="ln-dot ln-dot-red"></span>
            <span class="ln-dot ln-dot-yellow"></span>
            <span class="ln-dot ln-dot-green"></span>
            <span class="ln-window-title">Quantara — Analisis Laba / Rugi</span>
        </div>
        <div class="ln-window-body">
            <img
                src="{{ asset('images/analisis-preview.png') }}"
                alt="Quantara Dashboard Preview"
                class="ln-preview-img"
            >
        </div>
    </div>
</section>

{{-- ═══ FOOTER ═══ --}}
<footer class="ln-footer-full">
    <div class="footer-container">
        <div class="footer-col">
            <h3>Quantara</h3>
            <p>Platform analisis bisnis untuk membantu UMKM memahami performa finansial mereka.</p>
        </div>
        <div class="footer-col">
            <h4>Product</h4>
            <a href="#">Analytics</a>
            <a href="#">Finance</a>
            <a href="#">Dashboard</a>
        </div>
        <div class="footer-col">
            <h4>Resources</h4>
            <a href="{{ route('edukasi') }}">Edukasi</a>
            <a href="#">Blog</a>
            <a href="#">Help Center</a>
        </div>
        <div class="footer-col">
            <h4>Company</h4>
            <a href="{{ route('about') }}">About</a>
            <a href="#">Careers</a>
            <a href="{{ route('contact') }}">Contact</a>
        </div>
    </div>
    <div class="copyright">© 2026 Quantara. All Rights Reserved</div>
</footer>

<script>lucide.createIcons();</script>
</body>
</html>
