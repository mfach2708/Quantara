@extends('layouts.app')

@section('title', 'About - Quantara')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
<section class="about">
    <h1>About <span>Us</span></h1>
    <p class="about-sub">
        Quantara hadir untuk membantu pelaku usaha mengelola bisnis
        dengan lebih cerdas.
    </p>
    <div class="stats stats-left">
        <h2>Rp 5M+</h2>
        <p>Transaksi Terkelola</p>
    </div>
    <div class="stats stats-right">
        <div class="stats-box">
            <h2>150+</h2>
            <p>UMKM Mitra</p>
        </div>
        <div class="stats-box">
            <h2>98%</h2>
            <p>Tingkat Kepuasan</p>
        </div>
    </div>
    <div class="stage">
        <div class="stack" id="stack">
            <div class="card" data-i="0">
                <div class="icon-wrap"><i data-lucide="book-open"></i></div>
                <h2>Mencatat Keuangan</h2>
                <p>Kalkulator laba rugi sederhana untuk membantu UMKM mencatat pendapatan dan pengeluaran.</p>
            </div>
            <div class="card" data-i="1">
                <div class="icon-wrap"><i data-lucide="bar-chart-2"></i></div>
                <h2>Analisis Penjualan</h2>
                <p>Pantau tren penjualan agar bisa mengambil keputusan bisnis yang lebih tepat.</p>
            </div>
            <div class="card" data-i="2">
                <div class="icon-wrap"><i data-lucide="package"></i></div>
                <h2>Kelola Stok Barang</h2>
                <p>Catat keluar masuk produk secara real-time sehingga stok selalu terpantau.</p>
            </div>
            <div class="card" data-i="3">
                <div class="icon-wrap"><i data-lucide="users"></i></div>
                <h2>Data Pelanggan</h2>
                <p>Simpan informasi pelanggan untuk membangun hubungan bisnis jangka panjang.</p>
            </div>
        </div>
    </div>
    <p class="about-desc">
        Kami menyediakan solusi sederhana untuk mencatat keuangan,
        memahami analisis laba dan rugi, mempelajari pemasaran digital,
        serta mendapatkan rekomendasi strategi yang dapat membantu
        bisnis berkembang secara berkelanjutan.
    </p>
</section>
@endsection

@section('scripts')
<script src="{{ asset('js/about.js') }}"></script>
<script src="{{ asset('js/about-mobile-patch.js') }}"></script>
@endsection
