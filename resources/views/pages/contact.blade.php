@extends('layouts.app')

@section('title', 'Contact - Quantara')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')

{{-- ═══ HEADER BAND ═══ --}}
<div class="ct-header">
    <div class="ct-header-left">
        <div class="ct-badge">
            <span class="ct-badge-dot"></span>
            Hubungi Kami
        </div>
        <h1 class="ct-title">Let's Connect</h1>
    </div>
    <div class="ct-header-right">
        <p class="ct-tagline">
            Punya pertanyaan tentang Quantara, ingin berkolaborasi,
            atau sekadar ingin menyapa? Kami selalu senang mendengar dari Anda.
        </p>
        <div class="ct-stat-row">
            <div class="ct-stat">
                <span class="ct-stat-num">150<span class="ct-stat-plus">+</span></span>
                <span class="ct-stat-label">UMKM Mitra</span>
            </div>
            <div class="ct-stat-divider"></div>
            <div class="ct-stat">
                <span class="ct-stat-num">98<span class="ct-stat-plus">%</span></span>
                <span class="ct-stat-label">Kepuasan</span>
            </div>
            <div class="ct-stat-divider"></div>
            <div class="ct-stat">
                <span class="ct-stat-num">24<span class="ct-stat-plus">h</span></span>
                <span class="ct-stat-label">Respons</span>
            </div>
        </div>
    </div>
</div>

{{-- ═══ MAIN GRID ═══ --}}
<div class="ct-grid">

    {{-- LOCATION BIG CARD --}}
    <div class="ct-loc-card">
        <div class="ct-loc-top">
            <div class="ct-loc-icon">
                <i data-lucide="map-pin"></i>
            </div>
            <span class="ct-section-tag">Lokasi Kami</span>
        </div>
        <div class="ct-loc-address">
            <h2>Kuningan</h2>
            <h3>Jawa Barat</h3>
        </div>
        <div class="ct-loc-detail">
            <p>Jl. Siliwangi No. 12<br>Kuningan, Jawa Barat 45511<br>Indonesia</p>
        </div>
        <div class="ct-loc-chips">
            <span class="ct-chip"><i data-lucide="navigation"></i> Jawa Barat</span>
            <span class="ct-chip"><i data-lucide="globe"></i> Indonesia</span>
            <span class="ct-chip"><i data-lucide="clock"></i> WIB (UTC+7)</span>
        </div>
        <div class="ct-loc-accent"></div>
    </div>

    {{-- SOCIALS PANEL --}}
    <div class="ct-socials-panel">
        <div class="ct-socials-header">
            <span class="ct-section-tag">Media Sosial</span>
            <h2>Temukan Kami</h2>
        </div>
        <ul class="ct-social-list">
            <li>
                <a href="#" class="ct-social-row ct-s-instagram" aria-label="Instagram">
                    <div class="ct-social-left">
                        <div class="ct-social-ico">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5"/>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                            </svg>
                        </div>
                        <div class="ct-social-text">
                            <span class="ct-social-name">Instagram</span>
                            <span class="ct-social-handle">@quantara.id</span>
                        </div>
                    </div>
                    <i data-lucide="arrow-up-right" class="ct-social-arr"></i>
                </a>
            </li>
            <li>
                <a href="#" class="ct-social-row ct-s-x" aria-label="X (Twitter)">
                    <div class="ct-social-left">
                        <div class="ct-social-ico">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </div>
                        <div class="ct-social-text">
                            <span class="ct-social-name">X (Twitter)</span>
                            <span class="ct-social-handle">@quantara_id</span>
                        </div>
                    </div>
                    <i data-lucide="arrow-up-right" class="ct-social-arr"></i>
                </a>
            </li>
            <li>
                <a href="#" class="ct-social-row ct-s-linkedin" aria-label="LinkedIn">
                    <div class="ct-social-left">
                        <div class="ct-social-ico">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"/>
                                <rect x="2" y="9" width="4" height="12"/>
                                <circle cx="4" cy="4" r="2"/>
                            </svg>
                        </div>
                        <div class="ct-social-text">
                            <span class="ct-social-name">LinkedIn</span>
                            <span class="ct-social-handle">Quantara Indonesia</span>
                        </div>
                    </div>
                    <i data-lucide="arrow-up-right" class="ct-social-arr"></i>
                </a>
            </li>
            <li>
                <a href="#" class="ct-social-row ct-s-tiktok" aria-label="TikTok">
                    <div class="ct-social-left">
                        <div class="ct-social-ico">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.77 0 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.34 6.34 0 1 0 5.54 6.29V8.94a8.18 8.18 0 0 0 4.78 1.52V7.01a4.85 4.85 0 0 1-1.01-.32z"/>
                            </svg>
                        </div>
                        <div class="ct-social-text">
                            <span class="ct-social-name">TikTok</span>
                            <span class="ct-social-handle">@quantara.id</span>
                        </div>
                    </div>
                    <i data-lucide="arrow-up-right" class="ct-social-arr"></i>
                </a>
            </li>
            <li>
                <a href="mailto:hello@quantara.id" class="ct-social-row ct-s-email" aria-label="Email">
                    <div class="ct-social-left">
                        <div class="ct-social-ico">
                            <i data-lucide="mail"></i>
                        </div>
                        <div class="ct-social-text">
                            <span class="ct-social-name">Email</span>
                            <span class="ct-social-handle">hello@quantara.id</span>
                        </div>
                    </div>
                    <i data-lucide="arrow-up-right" class="ct-social-arr"></i>
                </a>
            </li>
        </ul>
    </div>

</div>

@endsection
