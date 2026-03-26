(function () {
    const svg = document.getElementById('chartSvg');
    const path = document.getElementById('linePath');
    if (!svg || !path) return;

    const W = 1200, H = 220;

    const points = [
        { x: 0,    y: 0.75 },
        { x: 0.07, y: 0.70 },
        { x: 0.13, y: 0.60 },
        { x: 0.20, y: 0.65 },
        { x: 0.28, y: 0.55 },
        { x: 0.35, y: 0.85 },
        { x: 0.42, y: 0.50 },
        { x: 0.50, y: 0.105 },
        { x: 0.58, y: 0.40 },
        { x: 0.65, y: 0.28 },
        { x: 0.72, y: 0.100 },
        { x: 0.80, y: 0.50 },
        { x: 0.88, y: 0.25 },
        { x: 0.95, y: 0.15 },
        { x: 1.00, y: 0.10 },
    ];

    const pad = 20;
    const coords = points.map(p => ({
        x: pad + p.x * (W - pad * 2),
        y: pad + p.y * (H - pad * 2),
    }));

    function buildPath(pts) {
        let d = `M ${pts[0].x} ${pts[0].y}`;
        for (let i = 1; i < pts.length; i++) {
            const prev = pts[i - 1];
            const curr = pts[i];
            const cpx = (prev.x + curr.x) / 2;
            d += ` C ${cpx} ${prev.y}, ${cpx} ${curr.y}, ${curr.x} ${curr.y}`;
        }
        return d;
    }

    path.setAttribute('d', buildPath(coords));

    const len = path.getTotalLength();
    path.style.strokeDasharray = len;
    path.style.strokeDashoffset = len;

    // Opacity fade-in alongside draw
    path.style.opacity = '0';

    // Delay chart draw to sync with hero title appearing
    const startDelay = 700; // ms after page load

    setTimeout(() => {
        // Fade in opacity
        path.style.transition = 'opacity 0.6s ease';
        path.style.opacity = '1';

        // Then draw the line slowly with premium easing
        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                path.style.transition =
                    'stroke-dashoffset 2.8s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.6s ease';
                path.style.strokeDashoffset = '0';
            });
        });
    }, startDelay);

    // Animate dots appearing after line draws
    // (pulse effect on the endpoint)
    setTimeout(() => {
        const lastCoord = coords[coords.length - 1];
        const dot = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
        dot.setAttribute('cx', lastCoord.x);
        dot.setAttribute('cy', lastCoord.y);
        dot.setAttribute('r', '6');
        dot.setAttribute('fill', '#ff3b3b');
        dot.style.opacity = '0';
        dot.style.transition = 'opacity 0.5s ease, r 0.5s ease';
        svg.appendChild(dot);

        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                dot.style.opacity = '1';
            });
        });

        // Pulse ring
        const ring = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
        ring.setAttribute('cx', lastCoord.x);
        ring.setAttribute('cy', lastCoord.y);
        ring.setAttribute('r', '6');
        ring.setAttribute('fill', 'none');
        ring.setAttribute('stroke', '#ff3b3b');
        ring.setAttribute('stroke-width', '2');
        ring.style.opacity = '0.6';
        ring.style.animation = 'svgPulse 2s ease-out infinite';
        svg.insertBefore(ring, dot);

        // Inject pulse keyframes if not present
        if (!document.getElementById('svgPulseStyle')) {
            const s = document.createElement('style');
            s.id = 'svgPulseStyle';
            s.textContent = `
                @keyframes svgPulse {
                    0%   { r: 6; opacity: 0.6; }
                    100% { r: 22; opacity: 0; }
                }
                circle[style*="svgPulse"] { animation: svgPulse 2s ease-out infinite; }
            `;
            document.head.appendChild(s);
        }
    }, startDelay + 2800);
})();

// ===================== HERO CARDS — data dari analisis =====================
(function () {
    function getAnalisisHistory() {
        try { return JSON.parse(localStorage.getItem('quantara_kalkulasi') || '[]'); }
        catch { return []; }
    }

    function formatHeroRupiah(n) {
        if (!n || isNaN(n)) return 'Rp 0';
        const abs = Math.abs(n);
        if (abs >= 1_000_000_000) return (n < 0 ? '-' : '') + 'Rp ' + (abs / 1_000_000_000).toFixed(1).replace('.0','') + ' M';
        if (abs >= 1_000_000)     return (n < 0 ? '-' : '') + 'Rp ' + (abs / 1_000_000).toFixed(1).replace('.0','') + ' Jt';
        if (abs >= 1_000)         return (n < 0 ? '-' : '') + 'Rp ' + (abs / 1_000).toFixed(0) + ' rb';
        return (n < 0 ? '-' : '') + 'Rp ' + abs;
    }

    function updateHeroCards() {
        const history = getAnalisisHistory();

        // elemen cards hero
        const elPendapatan   = document.querySelector('.stats .card:nth-child(1) h3');
        const elLaba         = document.querySelector('.stats .card:nth-child(2) h3');
        const elPengeluaran  = document.querySelector('.stats .card:nth-child(3) h3');
        const elLabelLaba    = document.querySelector('.stats .card:nth-child(3) .card-label');

        if (!elPendapatan) return;

        if (history.length === 0) {
            elPendapatan.textContent  = 'Rp 0';
            elLaba.textContent        = 'Rp 0';
            elPengeluaran.textContent = 'Rp 0';
            if (elLabelLaba) elLabelLaba.textContent = '+0%';
            return;
        }

        const latest = history[history.length - 1];
        const pendapatan  = latest.pendapatan   || 0;
        const totalBiaya  = latest.totalBiaya   || 0;
        const labaBersih  = latest.labaBersih   || 0;
        const marginLaba  = latest.marginLaba   || 0;

        elPendapatan.textContent  = formatHeroRupiah(pendapatan);
        elLaba.textContent        = formatHeroRupiah(Math.abs(labaBersih));
        elPengeluaran.textContent = formatHeroRupiah(totalBiaya);
        if (elLabelLaba) {
            const sign = labaBersih >= 0 ? '+' : '-';
            elLabelLaba.textContent = sign + Math.abs(marginLaba) + '%';
            elLabelLaba.className = 'card-label ' + (labaBersih >= 0 ? 'growth' : '');
        }
    }

    updateHeroCards();
})();

// ===================== TRANSAKSI (localStorage) =====================
(function () {
    const STORAGE_KEY = 'quantara_transactions';

    function getTransactions() {
        try { return JSON.parse(localStorage.getItem(STORAGE_KEY)) || []; }
        catch { return []; }
    }

    function saveTransactions(list) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(list));
    }

    function formatRupiah(num) {
        const n = parseInt(num, 10);
        if (isNaN(n)) return 'Rp 0';
        if (n >= 1_000_000_000) return 'Rp ' + (n / 1_000_000_000).toFixed(1).replace('.0','') + ' M';
        if (n >= 1_000_000)     return 'Rp ' + (n / 1_000_000).toFixed(1).replace('.0','') + ' Jt';
        if (n >= 1_000)         return 'Rp ' + (n / 1_000).toFixed(0) + ' rb';
        return 'Rp ' + n;
    }

    function formatWaktu(iso) {
        const d = new Date(iso);
        const now = new Date();
        const diffMs = now - d;
        const diffMin = Math.floor(diffMs / 60000);
        if (diffMin < 1)   return 'Baru saja';
        if (diffMin < 60)  return diffMin + ' menit lalu';
        const diffH = Math.floor(diffMin / 60);
        if (diffH < 24)    return 'Hari ini, ' + d.toLocaleTimeString('id-ID', {hour:'2-digit',minute:'2-digit'});
        return d.toLocaleDateString('id-ID', {day:'numeric', month:'short'}) +
               ', ' + d.toLocaleTimeString('id-ID', {hour:'2-digit',minute:'2-digit'});
    }

    function getInitial(name) {
        return name.trim().charAt(0).toUpperCase() || '?';
    }

    function buildRows(list, withDelete = false) {
        if (list.length === 0) return '<div class="trans-empty">Belum ada transaksi. Tambahkan lewat Catatan Transaksi.</div>';
        return list.map(t => `
            <div class="trans-row" data-time="${t.time}">
                <div class="trans-name">
                    <div class="trans-icon orange">${getInitial(t.name)}</div>
                    ${t.name}
                </div>
                <div class="trans-time">${formatWaktu(t.time)}</div>
                <div class="trans-amount ${t.jenis === 'pemasukan' ? 'plus' : 'minus'}">
                    ${t.jenis === 'pemasukan' ? '+' : '-'}${formatRupiah(t.jumlah)}
                </div>
                ${withDelete ? `<button class="trans-delete-btn" data-time="${t.time}" title="Hapus"><i data-lucide="trash-2"></i></button>` : ''}
            </div>
        `).join('');
    }

    // render 5 terbaru di card
    function renderTransaksi() {
        const body = document.getElementById('trans-body');
        if (!body) return;
        const list = [...getTransactions()].sort((a,b) => new Date(b.time) - new Date(a.time)).slice(0, 5);
        body.innerHTML = buildRows(list);
    }

    // render semua di popup view (dengan tombol hapus)
    function renderViewAll() {
        const body = document.getElementById('trans-view-body');
        if (!body) return;
        const list = [...getTransactions()].sort((a,b) => new Date(b.time) - new Date(a.time));
        if (list.length === 0) {
            body.innerHTML = '<div class="trans-empty">Belum ada transaksi.</div>';
            return;
        }
        body.innerHTML = buildRows(list, true);
        if (window.lucide) lucide.createIcons();

        // pasang event hapus
        body.querySelectorAll('.trans-delete-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const time = this.dataset.time;
                const all  = getTransactions().filter(t => t.time !== time);
                saveTransactions(all);
                renderTransaksi();
                renderViewAll();
            });
        });
    }

    // ── popup tambah ──
    const overlayAdd   = document.getElementById('popup-transaksi');
    const btnOpen      = document.getElementById('btn-tambah-transaksi');
    const btnCloseAdd  = document.getElementById('popup-close');
    const btnCancelAdd = document.getElementById('popup-cancel');
    const btnSave      = document.getElementById('popup-save');

    function openAddPopup() {
        if (!overlayAdd) return;
        document.getElementById('inp-nama').value   = '';
        document.getElementById('inp-jumlah').value = '';
        document.getElementById('inp-jenis').value  = 'pemasukan';
        overlayAdd.style.display = 'flex';
        if (window.lucide) lucide.createIcons();
    }

    function closeAddPopup() { if (overlayAdd) overlayAdd.style.display = 'none'; }

    if (btnOpen)      btnOpen.addEventListener('click', openAddPopup);
    if (btnCloseAdd)  btnCloseAdd.addEventListener('click', closeAddPopup);
    if (btnCancelAdd) btnCancelAdd.addEventListener('click', closeAddPopup);
    if (overlayAdd)   overlayAdd.addEventListener('click', e => { if (e.target === overlayAdd) closeAddPopup(); });

    if (btnSave) btnSave.addEventListener('click', function () {
        const nama   = document.getElementById('inp-nama').value.trim();
        const jenis  = document.getElementById('inp-jenis').value;
        const jumlah = document.getElementById('inp-jumlah').value;
        if (!nama)                       { alert('Nama transaksi wajib diisi.'); return; }
        if (!jumlah || parseInt(jumlah) <= 0) { alert('Jumlah harus lebih dari 0.'); return; }
        const list = getTransactions();
        list.push({ name: nama, jenis, jumlah: parseInt(jumlah), time: new Date().toISOString() });
        saveTransactions(list);
        renderTransaksi();
        closeAddPopup();
    });

    // ── popup view all ──
    const overlayView  = document.getElementById('popup-view-transaksi');
    const btnView      = document.getElementById('btn-view-transaksi');
    const btnCloseView = document.getElementById('popup-view-close');

    function openViewPopup() {
        if (!overlayView) return;
        renderViewAll();
        overlayView.style.display = 'flex';
        if (window.lucide) lucide.createIcons();
    }

    function closeViewPopup() { if (overlayView) overlayView.style.display = 'none'; }

    if (btnView)       btnView.addEventListener('click', openViewPopup);
    if (btnCloseView)  btnCloseView.addEventListener('click', closeViewPopup);
    if (overlayView)   overlayView.addEventListener('click', e => { if (e.target === overlayView) closeViewPopup(); });

    // ── init ──
    renderTransaksi();
})();
