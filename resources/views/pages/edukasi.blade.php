@extends('layouts.app')

@section('title', 'Edukasi Bisnis - Quantara')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/edukasi.css') }}">
@endsection

@section('content')
<div class="edu-page">

    {{-- Header --}}
    <div class="edu-header">
        <div>
            <p class="sub-label">Pusat Pengetahuan</p>
            <h1>Edukasi <strong>Bisnis</strong></h1>
        </div>
        <div class="edu-search">
            <i data-lucide="search"></i>
            <input type="text" id="searchInput" placeholder="Cari artikel…" oninput="filterKonten()">
        </div>
    </div>

    {{-- Tabs --}}
    <div class="edu-tabs">
        <button class="edu-tab active" onclick="filterTab(this,'semua')">Semua</button>
        <button class="edu-tab" onclick="filterTab(this,'keuangan')">Keuangan</button>
        <button class="edu-tab" onclick="filterTab(this,'marketing')">Marketing</button>
        <button class="edu-tab" onclick="filterTab(this,'operasional')">Operasional</button>
        <button class="edu-tab" onclick="filterTab(this,'strategi')">Strategi</button>
    </div>

    {{-- Grid artikel --}}
    <div class="edu-grid" id="eduGrid">

        <div class="edu-card" data-cat="keuangan" data-title="laporan laba rugi membaca">
            <div class="card-accent" style="background:#F44336"></div>
            <span class="edu-tag">Keuangan</span>
            <h3>Cara Membaca Laporan Laba Rugi</h3>
            <p>Laporan L/R adalah cermin kesehatan bisnis. Pelajari cara membacanya — dari gross profit hingga net margin.</p>
            <button onclick="bukaArtikel('laba-rugi')">Baca →</button>
        </div>

        <div class="edu-card" data-cat="keuangan" data-title="arus kas cash flow">
            <div class="card-accent" style="background:#C12456"></div>
            <span class="edu-tag">Keuangan</span>
            <h3>Memahami Arus Kas (Cash Flow)</h3>
            <p>Bisnis bisa untung di kertas tapi bangkrut di lapangan. Pelajari bedanya laba akuntansi dan kas nyata.</p>
            <button onclick="bukaArtikel('cash-flow')">Baca →</button>
        </div>

        <div class="edu-card" data-cat="keuangan" data-title="hpp harga pokok penjualan">
            <div class="card-accent" style="background:#DD4D93"></div>
            <span class="edu-tag">Keuangan</span>
            <h3>Cara Hitung HPP yang Benar</h3>
            <p>HPP yang salah hitung memangkas untung tanpa disadari. Ini rumus dan contoh nyatanya untuk UMKM.</p>
            <button onclick="bukaArtikel('hpp')">Baca →</button>
        </div>

        <div class="edu-card" data-cat="keuangan" data-title="dana darurat usaha">
            <div class="card-accent" style="background:#4D84AE"></div>
            <span class="edu-tag">Keuangan</span>
            <h3>Dana Darurat untuk Usaha</h3>
            <p>Idealnya UMKM punya dana darurat 3–6 bulan biaya operasional. Begini cara membangunnya dari nol.</p>
            <button onclick="bukaArtikel('dana-darurat')">Baca →</button>
        </div>

        <div class="edu-card" data-cat="marketing" data-title="instagram umkm konten">
            <div class="card-accent" style="background:#F44336"></div>
            <span class="edu-tag">Marketing</span>
            <h3>Instagram untuk UMKM</h3>
            <p>Konten visual dan storytelling yang menjual — tanpa harus jadi fotografer profesional.</p>
            <button onclick="bukaArtikel('instagram')">Baca →</button>
        </div>

        <div class="edu-card" data-cat="marketing" data-title="word of mouth pelanggan">
            <div class="card-accent" style="background:#C12456"></div>
            <span class="edu-tag">Marketing</span>
            <h3>Word of Mouth: Marketing Gratis</h3>
            <p>Pelanggan yang puas adalah iklan terbaik. Cara membangun loyalitas yang membuat mereka bercerita.</p>
            <button onclick="bukaArtikel('wom')">Baca →</button>
        </div>

        <div class="edu-card" data-cat="marketing" data-title="penetapan harga jual">
            <div class="card-accent" style="background:#DD4D93"></div>
            <span class="edu-tag">Marketing</span>
            <h3>Strategi Penetapan Harga Jual</h3>
            <p>Terlalu murah rugi, terlalu mahal sepi. Cara menentukan harga yang tepat dan kompetitif.</p>
            <button onclick="bukaArtikel('harga-jual')">Baca →</button>
        </div>

        <div class="edu-card" data-cat="operasional" data-title="manajemen stok inventori">
            <div class="card-accent" style="background:#4D84AE"></div>
            <span class="edu-tag">Operasional</span>
            <h3>Manajemen Stok untuk UMKM</h3>
            <p>Stok terlalu banyak = modal mengendap. Terlalu sedikit = kehilangan penjualan. Temukan keseimbangannya.</p>
            <button onclick="bukaArtikel('stok')">Baca →</button>
        </div>

        <div class="edu-card" data-cat="operasional" data-title="efisiensi biaya operasional">
            <div class="card-accent" style="background:#F44336"></div>
            <span class="edu-tag">Operasional</span>
            <h3>5 Cara Efisiensi Biaya</h3>
            <p>Pangkas biaya bukan berarti kualitas turun. Strategi efisiensi yang terbukti di banyak UMKM.</p>
            <button onclick="bukaArtikel('efisiensi')">Baca →</button>
        </div>

        <div class="edu-card" data-cat="operasional" data-title="pelayanan pelanggan customer service">
            <div class="card-accent" style="background:#C12456"></div>
            <span class="edu-tag">Operasional</span>
            <h3>Pelayanan yang Membuat Pelanggan Kembali</h3>
            <p>Mendapat pelanggan baru 5× lebih mahal dari mempertahankan yang lama. Ini standar minimalnya.</p>
            <button onclick="bukaArtikel('cs')">Baca →</button>
        </div>

        <div class="edu-card" data-cat="strategi" data-title="rencana bisnis sederhana">
            <div class="card-accent" style="background:#DD4D93"></div>
            <span class="edu-tag">Strategi</span>
            <h3>Rencana Bisnis 1 Halaman</h3>
            <p>Bukan template berlembar-lembar. Cara merencanakan bisnis dalam satu halaman yang langsung bisa dieksekusi.</p>
            <button onclick="bukaArtikel('rencana-bisnis')">Baca →</button>
        </div>

        <div class="edu-card" data-cat="strategi" data-title="skala usaha ekspansi pertumbuhan">
            <div class="card-accent" style="background:#4D84AE"></div>
            <span class="edu-tag">Strategi</span>
            <h3>Kapan Waktu Tepat Menskala Usaha?</h3>
            <p>Banyak UMKM tumbuh terlalu cepat dan akhirnya kolaps. Ini sinyal bahwa Anda sudah siap ekspansi.</p>
            <button onclick="bukaArtikel('skala-usaha')">Baca →</button>
        </div>

    </div>

    {{-- CTA --}}
    <div class="edu-cta">
        <div>
            <p class="sub-label">Coba Sekarang</p>
            <h2>Sudah paham teorinya?<br><strong>Hitung laba bisnis Anda.</strong></h2>
        </div>
        <a href="{{ route('analisis') }}" class="cta-btn">
            Buka Kalkulator <i data-lucide="arrow-right"></i>
        </a>
    </div>

</div>

{{-- Modal --}}
<div class="modal-overlay" id="modalOverlay" onclick="tutupArtikel()">
    <div class="modal-box" onclick="event.stopPropagation()">
        <button class="modal-close" onclick="tutupArtikel()"><i data-lucide="x"></i></button>
        <div id="modalContent"></div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/edukasi.js') }}"></script>
@endsection
