@extends('layouts.app')

@section('title', 'Analisis Laba Rugi - Quantara')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/analisis.css') }}">
@endsection

@section('content')

{{-- ════════════════════════════════════
     HALAMAN UTAMA — hanya tampilkan data
════════════════════════════════════ --}}
<div class="analisis-page" id="analisisPage">

    {{-- Header --}}
    <div class="page-header">
        <div class="page-header-inner">
            <div>
                <p class="page-header-sub">Dashboard</p>
                <h1><strong>Analisis</strong> Laba / Rugi</h1>
            </div>
            <div class="header-right">
                <div class="period-badge">
                    <i data-lucide="calendar"></i>
                    <span id="currentPeriod">—</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Summary Cards --}}
    <div class="summary-row">
        <div class="summary-card">
            <div class="summary-icon si-blue"><i data-lucide="trending-up"></i></div>
            <p class="summary-label">Total Pendapatan</p>
            <p class="summary-value" id="totalPendapatan">Rp 0</p>
            <p class="summary-sub" id="subPendapatan">belum ada data</p>
        </div>
        <div class="summary-card">
            <div class="summary-icon si-red"><i data-lucide="shopping-bag"></i></div>
            <p class="summary-label">Total Biaya</p>
            <p class="summary-value" id="totalBiaya">Rp 0</p>
            <p class="summary-sub" id="subBiaya">belum ada data</p>
        </div>
        <div class="summary-card summary-laba" id="labaCard">
            <div class="summary-icon si-laba" id="labaIcon"><i data-lucide="wallet"></i></div>
            <p class="summary-label" id="labaStatus">Laba Bersih</p>
            <p class="summary-value" id="labaBersih">Rp 0</p>
            <p class="summary-margin" id="marginTrend">—</p>
        </div>
        <div class="summary-card">
            <div class="summary-icon si-rose"><i data-lucide="percent"></i></div>
            <p class="summary-label">Margin Laba</p>
            <p class="summary-value" id="marginLaba">0%</p>
            <p class="summary-sub">dari total pendapatan</p>
        </div>
    </div>

    {{-- Detail Row --}}
    <div class="detail-row">
        <div class="detail-card">
            <p class="panel-label">Rincian Biaya</p>
            <div class="breakdown-list">
                <div class="breakdown-row">
                    <span class="bd-dot" style="background:#F44336"></span>
                    <span>HPP</span><span id="breakdownHpp">Rp 0</span>
                </div>
                <div class="breakdown-row">
                    <span class="bd-dot" style="background:#C12456"></span>
                    <span>Operasional</span><span id="breakdownOperasional">Rp 0</span>
                </div>
                <div class="breakdown-row">
                    <span class="bd-dot" style="background:#DD4D93"></span>
                    <span>Marketing</span><span id="breakdownMarketing">Rp 0</span>
                </div>
                <div class="breakdown-row">
                    <span class="bd-dot" style="background:#4D84AE"></span>
                    <span>Logistik</span><span id="breakdownLogistik">Rp 0</span>
                </div>
                <div class="breakdown-row">
                    <span class="bd-dot" style="background:#aaa"></span>
                    <span>Lainnya</span><span id="breakdownLainnya">Rp 0</span>
                </div>
                <div class="breakdown-row breakdown-total">
                    <span class="bd-dot" style="background:transparent"></span>
                    <span>Total Biaya</span><span id="totalBiayaDetail">Rp 0</span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <p class="panel-label">Metrik Performa</p>
            <div class="metric-list">
                <div class="metric-item">
                    <p class="metric-label">Rasio Biaya</p>
                    <p class="metric-value" id="rasioBiaya">0%</p>
                </div>
                <div class="metric-item">
                    <p class="metric-label">ROE</p>
                    <p class="metric-value" id="roe">0%</p>
                </div>
                <div class="metric-item">
                    <p class="metric-label">BEP</p>
                    <p class="metric-value metric-small" id="bep">Rp 0</p>
                </div>
                <div class="metric-item">
                    <p class="metric-label">Jumlah Kalkulasi</p>
                    <p class="metric-value" id="jumlahKalkulasi">0</p>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <p class="panel-label">Komposisi Biaya</p>
            <div class="progress-list">
                <div class="progress-row">
                    <div class="progress-meta"><span>HPP</span><span id="hppPersen">0%</span></div>
                    <div class="bar-bg"><div class="bar-fill" id="hppProgress" style="width:0%"></div></div>
                </div>
                <div class="progress-row">
                    <div class="progress-meta"><span>Operasional</span><span id="operasionalPersen">0%</span></div>
                    <div class="bar-bg"><div class="bar-fill" id="operasionalProgress" style="width:0%"></div></div>
                </div>
                <div class="progress-row">
                    <div class="progress-meta"><span>Marketing</span><span id="marketingPersen">0%</span></div>
                    <div class="bar-bg"><div class="bar-fill" id="marketingProgress" style="width:0%"></div></div>
                </div>
                <div class="progress-row">
                    <div class="progress-meta"><span>Logistik</span><span id="logistikPersen">0%</span></div>
                    <div class="bar-bg"><div class="bar-fill" id="logistikProgress" style="width:0%"></div></div>
                </div>
                <div class="progress-row">
                    <div class="progress-meta"><span>Lainnya</span><span id="lainnyaPersen">0%</span></div>
                    <div class="bar-bg"><div class="bar-fill" id="lainnyaProgress" style="width:0%"></div></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Rekomendasi --}}
    <div class="reko-card">
        <div class="reko-icon"><i data-lucide="lightbulb"></i></div>
        <div class="reko-body">
            <p class="panel-label">Rekomendasi</p>
            <p class="reko-text" id="rekomendasiText">Klik tombol di bawah untuk memasukkan data dan mendapatkan rekomendasi bisnis Anda.</p>
        </div>
    </div>

</div>{{-- /analisis-page --}}
@endsection

{{-- ════════════════════════════════════
     FAB — di luar @content, fixed tengah bawah,
     berhenti sebelum footer via JS
════════════════════════════════════ --}}
@push('after_footer')

{{-- FAB Button --}}
<div class="fab-wrapper" id="fabWrapper">
    <button class="fab-btn" id="fabBtn" onclick="togglePanel()" aria-label="Input data baru">
        <i data-lucide="chevron-up" id="fabIcon"></i>
    </button>
    <span class="fab-label" id="fabLabel">Input Data</span>
</div>

{{-- Backdrop --}}
<div class="panel-backdrop" id="panelBackdrop" onclick="tutupPanel()"></div>

{{-- Slide-up Panel --}}
<div class="slide-panel" id="slidePanel">
    <div class="panel-handle" onclick="tutupPanel()">
        <div class="handle-bar"></div>
    </div>
    <div class="panel-inner">
        <div class="panel-head">
            <div>
                <p class="page-header-sub" style="margin-bottom:4px">Input Data</p>
                <h2>Perhitungan Baru</h2>
            </div>
            <button class="panel-close" onclick="tutupPanel()"><i data-lucide="x"></i></button>
        </div>
        <div class="panel-fields">
            <div class="field-item">
                <label><i data-lucide="trending-up"></i> Total Penjualan (Pendapatan)</label>
                <div class="field-input">
                    <span class="prefix">Rp</span>
                    <input type="number" id="pendapatan" placeholder="0">
                </div>
            </div>
            <div class="field-item">
                <label><i data-lucide="package"></i> Harga Pokok Penjualan (HPP)</label>
                <div class="field-input">
                    <span class="prefix">Rp</span>
                    <input type="number" id="hpp" placeholder="0">
                </div>
            </div>
            <div class="field-item">
                <label><i data-lucide="store"></i> Biaya Operasional</label>
                <div class="field-input">
                    <span class="prefix">Rp</span>
                    <input type="number" id="operasional" placeholder="0">
                </div>
            </div>
            <div class="field-item">
                <label><i data-lucide="megaphone"></i> Biaya Marketing</label>
                <div class="field-input">
                    <span class="prefix">Rp</span>
                    <input type="number" id="marketing" placeholder="0">
                </div>
            </div>
            <div class="field-item">
                <label><i data-lucide="truck"></i> Biaya Logistik</label>
                <div class="field-input">
                    <span class="prefix">Rp</span>
                    <input type="number" id="logistik" placeholder="0">
                </div>
            </div>
            <div class="field-item">
                <label><i data-lucide="receipt"></i> Biaya Lainnya</label>
                <div class="field-input">
                    <span class="prefix">Rp</span>
                    <input type="number" id="lainnya" placeholder="0">
                </div>
            </div>
        </div>
        <div class="panel-actions">
            <button class="btn-primary" onclick="hitungLabaRugi()">
                <i data-lucide="calculator"></i> Hitung &amp; Simpan
            </button>
            <button class="btn-ghost" onclick="resetForm()">
                <i data-lucide="refresh-cw"></i> Reset
            </button>
        </div>
    </div>
</div>

@endpush

@section('scripts')
<script src="{{ asset('js/analisis.js') }}"></script>
@endsection
