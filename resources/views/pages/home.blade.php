@extends('layouts.app')

@section('title', 'Quantara - Home')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('head_scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('content')
<section class="hero">
    <div class="hero-top">
        <div class="hero-title">
            <h1>Let's Manage <b>Your<br>Business</b> Finances<br>Easily</h1>
        </div>
    </div>
    <div class="chart-area">
        <svg id="chartSvg" viewBox="0 0 1200 220" preserveAspectRatio="none">
            <defs>
                <linearGradient id="lineGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="white" stop-opacity="0"/>
                    <stop offset="55%" stop-color="#7c3aed"/>
                    <stop offset="100%" stop-color="#ff3b3b"/>
                </linearGradient>
            </defs>
            <path
                id="linePath"
                fill="none"
                stroke="url(#lineGradient)"
                stroke-width="4"
                stroke-linecap="round"
            />
        </svg>
        <div class="chart-bottom-left">
            <p>Kelola keuangan, pantau performa, dan kembangkan usaha Anda bersama Quantara.</p>
            <div class="line"></div>
        </div>
        <div class="stats">
            <div class="card">
                <div class="card-top">
                    <div class="icon"><i data-lucide="wallet"></i></div>
                    <span class="card-label">Bulan ini</span>
                </div>
                <h3>Rp 45,8 Jt</h3>
                <p>Total Pendapatan</p>
            </div>
            <div class="card">
                <div class="card-top">
                    <div class="icon"><i data-lucide="trending-up"></i></div>
                    <span class="card-label">Laba</span>
                </div>
                <h3>Rp 17,4 Jt</h3>
                <p>Laba Bersih</p>
            </div>
            <div class="card">
                <div class="card-top">
                    <div class="icon"><i data-lucide="shopping-cart"></i></div>
                    <span class="card-label growth">+12.3%</span>
                </div>
                <h3>Rp 28,4 Jt</h3>
                <p>Total Pengeluaran</p>
            </div>
            <div class="card">
                <div class="card-top">
                    <div class="icon"><i data-lucide="users"></i></div>
                    <span class="card-label">Pelanggan</span>
                </div>
                <h3>1.248</h3>
                <p>Customer Aktif</p>
            </div>
        </div>
    </div>
</section>

<section class="discover">
    <div class="discover-header">
        <div class="discover-title">
            <div class="marquee">
                <div class="marquee-track">
                    <h2>Let's discover your <b>data</b> insights.</h2>
                    <h2>Let's discover your <b>data</b> insights.</h2>
                </div>
            </div>
        </div>
        <div class="discover-info">
            <div class="info-left">
                <p>Jelajahi data Anda untuk menemukan informasi penting dan membantu pengambilan keputusan.</p>
                <div class="line"></div>
            </div>
            <div class="info-right">Next Step pengambilan keputusan.</div>
        </div>
    </div>
    <div class="discover-grid">
        <div class="education">
            <div class="card-header">
                <h4>Edukasi Digital Marketing</h4>
                <a href="{{ route('edukasi') }}"><button class="view-all">View All</button></a>
            </div>
            <ul>
                <li class="edu-item clickable" onclick="window.location='{{ route('edukasi') }}'">
                    <div class="edu-icon"><i data-lucide="users"></i></div>
                    <div class="edu-text">
                        <h5>Word of Mouth: Marketing Gratis</h5>
                        <p>Cara membangun loyalitas pelanggan yang membuat mereka bercerita.</p>
                    </div>
                </li>
                <li class="edu-item clickable" onclick="window.location='{{ route('edukasi') }}'">
                    <div class="edu-icon"><i data-lucide="tag"></i></div>
                    <div class="edu-text">
                        <h5>Strategi Penetapan Harga Jual</h5>
                        <p>Cara menentukan harga yang tepat dan kompetitif untuk bisnis Anda.</p>
                    </div>
                </li>
            </ul>
        </div>
        <div class="transaction">
            <div class="trans-header">
                <h4>Transaksi</h4>
                <button class="view-all" id="btn-view-transaksi">View All</button>
            </div>
            <div class="trans-filter">
                <span class="active">Bulan ini</span>
                <span>3 bulan lalu</span>
                <span>6 bulan lalu</span>
            </div>
            <div class="trans-table">
                <div class="trans-head">
                    <span>Nama Transaksi</span>
                    <span>Waktu</span>
                    <span>Jumlah</span>
                </div>
                <div id="trans-body">
                    <div class="trans-empty">Belum ada transaksi. Tambahkan lewat Catatan Transaksi.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="cta-container">
        <div class="cta-left">
            <h2>Mau<br><b>Menambahkan</b><br>kan Data<br>Baru?</h2>
        </div>
        <div class="cta-right">
            <div class="cta-item" id="btn-tambah-transaksi">
                <span>Catatan Transaksi</span>
                <div class="cta-icon"><i data-lucide="plus"></i></div>
            </div>
            <a href="{{ route('analisis') }}" style="text-decoration:none;color:inherit;">
                <div class="cta-item">
                    <span>Hitung Laba Rugi</span>
                    <div class="cta-icon"><i data-lucide="line-chart"></i></div>
                </div>
            </a>
            <a href="{{ route('edukasi') }}" style="text-decoration:none;color:inherit;">
                <div class="cta-item">
                    <span>Ikuti Edukasi</span>
                    <div class="cta-icon"><i data-lucide="book"></i></div>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection

{{-- ── POPUP TAMBAH TRANSAKSI ── --}}
<div id="popup-transaksi" class="popup-overlay" style="display:none;">
    <div class="popup-box">
        <div class="popup-header">
            <h3>Tambah Transaksi</h3>
            <button class="popup-close" id="popup-close"><i data-lucide="x"></i></button>
        </div>
        <div class="popup-body">
            <div class="popup-field">
                <label>Nama Transaksi</label>
                <input type="text" id="inp-nama" placeholder="Contoh: Penjualan Produk A">
            </div>
            <div class="popup-row">
                <div class="popup-field">
                    <label>Jenis</label>
                    <select id="inp-jenis">
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>
                </div>
                <div class="popup-field">
                    <label>Jumlah (Rp)</label>
                    <input type="number" id="inp-jumlah" placeholder="Contoh: 850000">
                </div>
            </div>
        </div>
        <div class="popup-footer">
            <button class="popup-btn-cancel" id="popup-cancel">Batal</button>
            <button class="popup-btn-save" id="popup-save">Simpan</button>
        </div>
    </div>
</div>

{{-- ── POPUP VIEW ALL TRANSAKSI ── --}}
<div id="popup-view-transaksi" class="popup-overlay" style="display:none;">
    <div class="popup-box popup-box-wide">
        <div class="popup-header">
            <h3>Semua Transaksi</h3>
            <button class="popup-close" id="popup-view-close"><i data-lucide="x"></i></button>
        </div>
        <div class="popup-view-body">
            <div class="trans-table">
                <div class="trans-head trans-head-delete">
                    <span>Nama Transaksi</span>
                    <span>Waktu</span>
                    <span>Jumlah</span>
                    <span></span>
                </div>
                <div id="trans-view-body">
                    <div class="trans-empty">Belum ada transaksi.</div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="{{ asset('js/script.js') }}"></script>
@endsection
