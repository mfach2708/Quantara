@extends('layouts.app')

@section('title', 'Pengaturan - Quantara')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/settings.css') }}">
@endsection

@section('content')

<section class="st-page">

    <div class="st-container">

        <button class="st-back-btn" onclick="history.back()">
            <i data-lucide="arrow-left"></i>
            <span>Kembali</span>
        </button>

        <div class="st-header">
            <span class="st-tag">Akun</span>
            <h1 class="st-title">Pengaturan</h1>
        </div>

        {{-- Notifikasi --}}
        <div class="st-card">
            <div class="st-card-header">
                <div class="st-card-icon" style="background:#EFF4F8;">
                    <i data-lucide="bell" style="color:#4D84AE;"></i>
                </div>
                <div>
                    <h3 class="st-card-title">Notifikasi</h3>
                    <p class="st-card-desc">Kelola preferensi notifikasi Anda</p>
                </div>
            </div>
            <div class="st-divider"></div>
            <div class="st-toggle-list">
                <div class="st-toggle-item">
                    <div>
                        <span class="st-toggle-label">Notifikasi Email</span>
                        <span class="st-toggle-sub">Terima ringkasan aktivitas via email</span>
                    </div>
                    <label class="st-switch">
                        <input type="checkbox" checked>
                        <span class="st-slider"></span>
                    </label>
                </div>
                <div class="st-toggle-item">
                    <div>
                        <span class="st-toggle-label">Notifikasi Transaksi</span>
                        <span class="st-toggle-sub">Pemberitahuan setiap ada transaksi baru</span>
                    </div>
                    <label class="st-switch">
                        <input type="checkbox" checked>
                        <span class="st-slider"></span>
                    </label>
                </div>
                <div class="st-toggle-item">
                    <div>
                        <span class="st-toggle-label">Notifikasi Analisis</span>
                        <span class="st-toggle-sub">Laporan hasil analisis keuangan</span>
                    </div>
                    <label class="st-switch">
                        <input type="checkbox">
                        <span class="st-slider"></span>
                    </label>
                </div>
            </div>
        </div>

        {{-- Tampilan --}}
        <div class="st-card">
            <div class="st-card-header">
                <div class="st-card-icon" style="background:#FDF0F6;">
                    <i data-lucide="monitor" style="color:#DD4D93;"></i>
                </div>
                <div>
                    <h3 class="st-card-title">Tampilan</h3>
                    <p class="st-card-desc">Sesuaikan tampilan aplikasi</p>
                </div>
            </div>
            <div class="st-divider"></div>
            <div class="st-toggle-list">
                <div class="st-toggle-item">
                    <div>
                        <span class="st-toggle-label">Mode Gelap</span>
                        <span class="st-toggle-sub">Aktifkan tema gelap pada aplikasi</span>
                    </div>
                    <label class="st-switch">
                        <input type="checkbox">
                        <span class="st-slider"></span>
                    </label>
                </div>
            </div>
        </div>

        {{-- Privasi & Keamanan --}}
        <div class="st-card">
            <div class="st-card-header">
                <div class="st-card-icon" style="background:#FFF0EF;">
                    <i data-lucide="shield" style="color:#F44336;"></i>
                </div>
                <div>
                    <h3 class="st-card-title">Privasi & Keamanan</h3>
                    <p class="st-card-desc">Atur keamanan dan privasi akun Anda</p>
                </div>
            </div>
            <div class="st-divider"></div>
            <div class="st-toggle-list">
                <div class="st-toggle-item">
                    <div>
                        <span class="st-toggle-label">Autentikasi Dua Faktor</span>
                        <span class="st-toggle-sub">Tambahkan lapisan keamanan ekstra</span>
                    </div>
                    <label class="st-switch">
                        <input type="checkbox">
                        <span class="st-slider"></span>
                    </label>
                </div>
                <div class="st-toggle-item">
                    <div>
                        <span class="st-toggle-label">Aktivitas Login</span>
                        <span class="st-toggle-sub">Notifikasi saat ada login dari perangkat baru</span>
                    </div>
                    <label class="st-switch">
                        <input type="checkbox" checked>
                        <span class="st-slider"></span>
                    </label>
                </div>
            </div>
        </div>

        {{-- Simpan --}}
        <div class="st-footer">
            <button class="st-btn-save">Simpan Pengaturan</button>
        </div>

    </div>

</section>

@endsection
