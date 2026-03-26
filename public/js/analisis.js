// =====================================================
//  ANALISIS.JS — Quantara
//  Dashboard data + FAB + Slide-up panel
// =====================================================

// ── Format Rupiah ──
function formatRupiah(n) {
    if (n === 0) return 'Rp 0';
    const abs = Math.abs(n);
    const f = abs.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    return (n < 0 ? '-' : '') + 'Rp ' + f;
}

// ── Format tanggal ──
function formatTanggal(ts) {
    const d = new Date(ts);
    const bulan = ['Jan','Feb','Mar','Apr','Mei','Jun',
                   'Jul','Agt','Sep','Okt','Nov','Des'];
    const jam = d.getHours().toString().padStart(2,'0');
    const mnt = d.getMinutes().toString().padStart(2,'0');
    return {
        tgl:  d.getDate() + ' ' + bulan[d.getMonth()] + ' ' + d.getFullYear(),
        jam:  jam + ':' + mnt,
        ts:   ts,
        bulan: d.getMonth(),
        tahun: d.getFullYear(),
        hariIni: isHariIni(d),
    };
}

function isHariIni(d) {
    const now = new Date();
    return d.getDate()     === now.getDate()     &&
           d.getMonth()    === now.getMonth()    &&
           d.getFullYear() === now.getFullYear();
}

// ── Periode header ──
function updatePeriode() {
    const months = ['Januari','Februari','Maret','April','Mei','Juni',
                    'Juli','Agustus','September','Oktober','November','Desember'];
    const now = new Date();
    document.getElementById('currentPeriod').textContent =
        months[now.getMonth()] + ' ' + now.getFullYear();
}

// ── FAB: stop before footer ──
function adjustFab() {
    const fab    = document.getElementById('fabWrapper');
    const footer = document.querySelector('footer');
    if (!fab || !footer) return;

    const footerTop = footer.getBoundingClientRect().top;
    const viewportH = window.innerHeight;
    const margin    = 36;

    if (footerTop < viewportH) {
        const overlap = viewportH - footerTop;
        fab.style.bottom = (overlap + margin) + 'px';
    } else {
        fab.style.bottom = margin + 'px';
    }
}

// ── Toggle panel ──
let panelOpen = false;

function togglePanel() {
    panelOpen ? tutupPanel() : bukaPanel();
}

function bukaPanel() {
    panelOpen = true;
    document.getElementById('slidePanel').classList.add('open');
    document.getElementById('panelBackdrop').classList.add('open');
    document.getElementById('fabWrapper').classList.add('panel-open');
    document.body.style.overflow = 'hidden';
    lucide.createIcons();
}

function tutupPanel() {
    panelOpen = false;
    document.getElementById('slidePanel').classList.remove('open');
    document.getElementById('panelBackdrop').classList.remove('open');
    document.getElementById('fabWrapper').classList.remove('panel-open');
    document.body.style.overflow = '';
}

// ── Update progress bars ──
function updateProgressBars(hpp, operasional, marketing, logistik, lainnya, totalBiaya) {
    const items = [
        { persen: 'hppPersen',         bar: 'hppProgress',         val: hpp },
        { persen: 'operasionalPersen', bar: 'operasionalProgress', val: operasional },
        { persen: 'marketingPersen',   bar: 'marketingProgress',   val: marketing },
        { persen: 'logistikPersen',    bar: 'logistikProgress',    val: logistik },
        { persen: 'lainnyaPersen',     bar: 'lainnyaProgress',     val: lainnya },
    ];
    items.forEach(item => {
        const pct = totalBiaya > 0 ? Math.round((item.val / totalBiaya) * 100) : 0;
        document.getElementById(item.persen).textContent = pct + '%';
        document.getElementById(item.bar).style.width    = pct + '%';
    });
}

// ── Storage key untuk kalkulasi ──
const KALKULASI_KEY = 'quantara_kalkulasi';

// ── Load & Save kalkulasi dari/ke localStorage ──
function loadKalkulasi() {
    try { return JSON.parse(localStorage.getItem(KALKULASI_KEY) || '[]'); }
    catch { return []; }
}

function saveKalkulasi(list) {
    localStorage.setItem(KALKULASI_KEY, JSON.stringify(list));
}

// ── Kalkulasi list (persistent, reset hanya saat logout) ──
let kalkulasiList = loadKalkulasi();

// ── Update summary dari data kalkulasi ──
function updateSummaryFromHistory(history) {
    if (history.length === 0) {
        document.getElementById('totalPendapatan').textContent = 'Rp 0';
        document.getElementById('totalBiaya').textContent      = 'Rp 0';
        document.getElementById('labaBersih').textContent      = 'Rp 0';
        document.getElementById('marginLaba').textContent      = '0%';
        document.getElementById('rasioBiaya').textContent      = '0%';
        document.getElementById('roe').textContent             = '0%';
        document.getElementById('bep').textContent             = 'Rp 0';
        document.getElementById('subPendapatan').textContent   = 'belum ada data';
        document.getElementById('subBiaya').textContent        = 'belum ada data';
        document.getElementById('marginTrend').textContent     = '—';
        document.getElementById('labaStatus').textContent      = 'Laba Bersih';
        document.getElementById('labaCard').classList.remove('positive','negative');
        document.getElementById('jumlahKalkulasi').textContent = '0';
        document.getElementById('rekomendasiText').textContent =
            'Klik tombol di bawah untuk memasukkan data dan mendapatkan rekomendasi bisnis Anda.';
        updateProgressBars(0,0,0,0,0,0);
        ['breakdownHpp','breakdownOperasional','breakdownMarketing',
         'breakdownLogistik','breakdownLainnya','totalBiayaDetail'].forEach(id => {
            document.getElementById(id).textContent = 'Rp 0';
        });
        return;
    }

    const latest = history[history.length - 1];
    const { pendapatan, hpp, operasional, marketing, logistik, lainnya,
            totalBiaya, labaBersih, marginLaba, rasioBiaya, roe } = latest;

    document.getElementById('totalPendapatan').textContent = formatRupiah(pendapatan);
    document.getElementById('totalBiaya').textContent      = formatRupiah(totalBiaya);
    document.getElementById('labaBersih').textContent      = formatRupiah(Math.abs(labaBersih));
    document.getElementById('marginLaba').textContent      = marginLaba + '%';
    document.getElementById('rasioBiaya').textContent      = rasioBiaya + '%';
    document.getElementById('roe').textContent             = roe + '%';
    document.getElementById('bep').textContent             = formatRupiah(totalBiaya);
    document.getElementById('subPendapatan').textContent   = 'kalkulasi terakhir';
    document.getElementById('subBiaya').textContent        = 'kalkulasi terakhir';
    document.getElementById('jumlahKalkulasi').textContent = history.length;

    const labaCard    = document.getElementById('labaCard');
    const labaStatus  = document.getElementById('labaStatus');
    const marginTrend = document.getElementById('marginTrend');
    labaCard.classList.remove('positive','negative');

    if (labaBersih > 0) {
        labaCard.classList.add('positive');
        labaStatus.textContent  = 'Laba';
        marginTrend.textContent = 'Margin ' + marginLaba + '%';
    } else if (labaBersih < 0) {
        labaCard.classList.add('negative');
        labaStatus.textContent  = 'Rugi';
        marginTrend.textContent = 'Margin ' + marginLaba + '%';
    } else {
        labaStatus.textContent  = 'Impas';
        marginTrend.textContent = 'Margin 0%';
    }

    document.getElementById('breakdownHpp').textContent         = formatRupiah(hpp);
    document.getElementById('breakdownOperasional').textContent = formatRupiah(operasional);
    document.getElementById('breakdownMarketing').textContent   = formatRupiah(marketing);
    document.getElementById('breakdownLogistik').textContent    = formatRupiah(logistik);
    document.getElementById('breakdownLainnya').textContent     = formatRupiah(lainnya);
    document.getElementById('totalBiayaDetail').textContent     = formatRupiah(totalBiaya);

    updateProgressBars(hpp, operasional, marketing, logistik, lainnya, totalBiaya);

    const reko = document.getElementById('rekomendasiText');
    if (labaBersih > 0) {
        if (marginLaba > 20)
            reko.textContent = '✅ Bisnis sangat sehat dengan margin ' + marginLaba + '%. Pertahankan strategi ini dan pertimbangkan memperluas pasar.';
        else if (marginLaba > 10)
            reko.textContent = '✅ Bisnis menguntungkan (margin ' + marginLaba + '%). Coba optimalkan efisiensi biaya untuk meningkatkan margin lebih jauh.';
        else
            reko.textContent = '⚠️ Laba tipis (margin ' + marginLaba + '%). Evaluasi komponen HPP dan cari supplier lebih kompetitif.';
    } else if (labaBersih < 0) {
        reko.textContent = '❌ Bisnis mengalami kerugian. Segera evaluasi harga jual dan efisiensi biaya.';
    } else {
        reko.textContent = '⚖️ Bisnis di titik impas. Tingkatkan volume penjualan atau naikkan harga untuk mulai menghasilkan laba.';
    }
}

// ── Hitung & Simpan (session only) ──
function hitungLabaRugi() {
    const pendapatan  = parseFloat(document.getElementById('pendapatan').value)  || 0;
    const hpp         = parseFloat(document.getElementById('hpp').value)         || 0;
    const operasional = parseFloat(document.getElementById('operasional').value) || 0;
    const marketing   = parseFloat(document.getElementById('marketing').value)   || 0;
    const logistik    = parseFloat(document.getElementById('logistik').value)    || 0;
    const lainnya     = parseFloat(document.getElementById('lainnya').value)     || 0;

    if (pendapatan === 0 && hpp === 0 && operasional === 0 &&
        marketing === 0 && logistik === 0 && lainnya === 0) {
        alert('Masukkan minimal satu nilai untuk memulai perhitungan.');
        return;
    }

    const totalBiaya = hpp + operasional + marketing + logistik + lainnya;
    const labaBersih = pendapatan - totalBiaya;
    const marginLaba = pendapatan > 0 ? +((labaBersih / pendapatan) * 100).toFixed(1) : 0;
    const rasioBiaya = pendapatan > 0 ? +((totalBiaya  / pendapatan) * 100).toFixed(1) : 0;
    const roe        = totalBiaya  > 0 ? +((labaBersih / totalBiaya)  * 100).toFixed(1) : 0;

    const entry = {
        ts: Date.now(),
        pendapatan, hpp, operasional, marketing, logistik, lainnya,
        totalBiaya, labaBersih, marginLaba, rasioBiaya, roe
    };

    kalkulasiList.push(entry);
    saveKalkulasi(kalkulasiList);
    updateSummaryFromHistory(kalkulasiList);

    // Reset & tutup panel
    resetForm();
    tutupPanel();
}

// ── Reset form ──
function resetForm() {
    ['pendapatan','hpp','operasional','marketing','logistik','lainnya'].forEach(id => {
        document.getElementById(id).value = '';
    });
}

// ── ESC closes panel ──
document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && panelOpen) tutupPanel();
});

// ── Hapus data kalkulasi saat logout ──
function clearKalkulasiOnLogout() {
    localStorage.removeItem(KALKULASI_KEY);
}

// ── Init ──
window.addEventListener('DOMContentLoaded', () => {
    updatePeriode();
    updateSummaryFromHistory(kalkulasiList);
    adjustFab();
});

window.addEventListener('scroll', adjustFab, { passive: true });
window.addEventListener('resize', adjustFab, { passive: true });
