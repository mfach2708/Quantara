// ── EDUKASI.JS ──

const artikelDB = {
    'laba-rugi': {
        judul: 'Cara Membaca Laporan Laba Rugi', tag: 'Keuangan', durasi: '5 menit',
        konten: `<p>Laporan laba rugi (P&L) menunjukkan apakah bisnis Anda benar-benar menghasilkan uang dalam suatu periode. Ini dokumen keuangan paling penting yang wajib dipahami.</p>
        <h4>Komponen Utama</h4><ul><li><strong>Pendapatan</strong> — Total uang masuk dari penjualan.</li><li><strong>HPP</strong> — Biaya langsung untuk memproduksi barang.</li><li><strong>Laba Kotor</strong> — Pendapatan dikurangi HPP.</li><li><strong>Biaya Operasional</strong> — Sewa, gaji, listrik, marketing.</li><li><strong>Laba Bersih</strong> — Yang tersisa setelah semua biaya.</li></ul>
        <h4>Angka Penting</h4><ul><li><strong>Gross Margin</strong> — Laba kotor ÷ pendapatan. Idealnya &gt;30% untuk produk fisik.</li><li><strong>Net Margin</strong> — Laba bersih ÷ pendapatan. Efisiensi keseluruhan bisnis.</li><li>Bandingkan minimal 3 bulan — satu bulan tidak cukup.</li></ul>`
    },
    'cash-flow': {
        judul: 'Memahami Arus Kas (Cash Flow)', tag: 'Keuangan', durasi: '4 menit',
        konten: `<p>Banyak pengusaha bangkrut bukan karena rugi, tapi kehabisan kas. "Profitable but cash-poor" — untung di atas kertas, tapi tidak punya uang untuk bayar tagihan.</p>
        <h4>Tiga Arus Kas</h4><ul><li><strong>Operasional</strong> — Kas dari aktivitas sehari-hari. Harus selalu positif.</li><li><strong>Investasi</strong> — Kas untuk beli aset. Wajar negatif saat ekspansi.</li><li><strong>Pendanaan</strong> — Kas dari pinjaman atau modal.</li></ul>
        <h4>Tips Menjaga Kas Sehat</h4><ul><li>Minta DP dari pelanggan sebelum produksi dimulai.</li><li>Negosiasikan tempo bayar lebih panjang ke supplier.</li><li>Pantau piutang — jangan biarkan pelanggan menunggak lama.</li><li>Buat proyeksi kas 3 bulan ke depan setiap bulannya.</li></ul>`
    },
    'hpp': {
        judul: 'Cara Hitung HPP yang Benar', tag: 'Keuangan', durasi: '3 menit',
        konten: `<p>HPP yang salah hitung = harga jual yang salah = kerugian tersembunyi. Ini bisa berlangsung berbulan-bulan tanpa disadari.</p>
        <h4>Rumus HPP</h4><p><strong>HPP = Bahan Baku + Tenaga Kerja Langsung + Overhead Produksi</strong></p>
        <h4>Yang Sering Terlupakan</h4><ul><li>Penyusutan peralatan produksi</li><li>Biaya kemasan dan packing</li><li>Bahan yang terbuang atau susut</li><li>Listrik dan air untuk produksi</li></ul>
        <h4>Panduan Margin</h4><ul><li>Kuliner: harga jual minimal 3× HPP bahan baku</li><li>Fashion: 2–3× HPP total</li><li>Jasa: minimal 2× biaya langsung</li></ul>`
    },
    'dana-darurat': {
        judul: 'Dana Darurat untuk Usaha', tag: 'Keuangan', durasi: '4 menit',
        konten: `<p>Dana darurat adalah pelampung saat kondisi tidak terduga datang: penurunan penjualan tiba-tiba, peralatan rusak, atau tagihan menumpuk bersamaan.</p>
        <h4>Berapa Idealnya?</h4><p>3–6 bulan biaya operasional tetap (sewa, gaji, utilitas). Jika biaya bulanan Rp 20jt, targetkan Rp 60–120 juta.</p>
        <h4>Cara Membangun dari Nol</h4><ul><li>Sisihkan 5–10% dari laba bersih setiap bulan.</li><li>Gunakan rekening tabungan bisnis terpisah.</li><li>Anggap sebagai "biaya wajib", bukan opsional.</li><li>Isi kembali segera setelah digunakan.</li></ul>`
    },
    'instagram': {
        judul: 'Instagram untuk UMKM', tag: 'Marketing', durasi: '6 menit',
        konten: `<p>Dengan strategi yang tepat, akun UMKM bisa membangun komunitas pelanggan setia — tanpa budget iklan besar.</p>
        <h4>Fondasi Akun yang Kuat</h4><ul><li>Foto profil bersih dan profesional</li><li>Bio jelas: siapa, apa yang dijual, cara pesan</li><li>Link aktif ke WhatsApp atau toko online</li></ul>
        <h4>Formula Konten</h4><ul><li><strong>70%</strong> — Edukasi, inspirasi, behind-the-scenes</li><li><strong>20%</strong> — Engagement: pertanyaan, polls</li><li><strong>10%</strong> — Promosi langsung</li></ul>
        <h4>Foto Produk Tanpa Kamera Mahal</h4><ul><li>Manfaatkan cahaya alami dari jendela pagi hari</li><li>Latar bersih: kain putih atau papan kayu</li><li>Edit dengan Lightroom Mobile (gratis)</li></ul>`
    },
    'wom': {
        judul: 'Word of Mouth: Marketing Gratis', tag: 'Marketing', durasi: '5 menit',
        konten: `<p>92% konsumen lebih percaya rekomendasi orang yang dikenal dibanding iklan apapun. WOM adalah marketing paling kuat — dan sepenuhnya gratis.</p>
        <h4>Cara Membuat Pelanggan Mau Bercerita</h4><ul><li>Berikan lebih dari yang dijanjikan: nota tangan, bonus kecil.</li><li>Buat produk yang foto-worthy dan mudah di-share.</li><li>"Kalau puas, boleh share ya" lebih efektif dari minta 5 bintang.</li><li>Balas komentar dan DM dalam 2 jam.</li></ul>
        <h4>Program Referral Sederhana</h4><p>Pelanggan dapat diskon untuk setiap teman yang mereka rekomendasikan. Biayanya jauh lebih rendah dari iklan berbayar.</p>`
    },
    'harga-jual': {
        judul: 'Strategi Penetapan Harga Jual', tag: 'Marketing', durasi: '5 menit',
        konten: `<p>Harga adalah pernyataan nilai produk Anda. Terlalu murah = sinyal kualitas rendah. Terlalu mahal tanpa diferensiasi = kehilangan pasar.</p>
        <h4>Tiga Metode Penetapan Harga</h4><ul><li><strong>Cost-plus</strong> — HPP + markup. Paling sederhana.</li><li><strong>Competitive</strong> — Mengacu harga pesaing. Aman tapi bisa perang harga.</li><li><strong>Value-based</strong> — Berdasarkan nilai yang dirasakan pelanggan. Paling menguntungkan.</li></ul>
        <h4>Psikologi Harga</h4><ul><li>Rp 99.000 terasa jauh lebih murah dari Rp 100.000</li><li>Bundling meningkatkan nilai transaksi rata-rata</li><li>Harga "sebelum" yang dicoret memperkuat persepsi diskon</li></ul>`
    },
    'stok': {
        judul: 'Manajemen Stok untuk UMKM', tag: 'Operasional', durasi: '4 menit',
        konten: `<p>Stok yang tidak dikelola adalah "modal mati" — uang terjebak dalam barang yang tidak bergerak.</p>
        <h4>ABC Analysis</h4><ul><li><strong>Kategori A</strong> (20% produk, 80% omzet) — Pantau ketat, stok selalu tersedia.</li><li><strong>Kategori B</strong> (30% produk, 15% omzet) — Kelola standar normal.</li><li><strong>Kategori C</strong> (50% produk, 5% omzet) — Minimalkan, pertimbangkan dihapus.</li></ul>
        <h4>Tips Praktis</h4><ul><li>Stock opname minimal sebulan sekali</li><li>Metode FIFO: yang masuk duluan harus keluar duluan</li><li>Catat semua keluar masuk stok — tidak ada yang dikira-kira</li></ul>`
    },
    'efisiensi': {
        judul: '5 Cara Efisiensi Biaya', tag: 'Operasional', durasi: '5 menit',
        konten: `<p>Efisiensi bukan tentang pelit — ini tentang menggunakan sumber daya lebih cerdas.</p>
        <h4>5 Strategi Terbukti</h4><ul><li><strong>Negosiasi supplier</strong> — Minta diskon volume atau pembayaran lebih awal.</li><li><strong>Audit biaya berulang</strong> — Cari langganan atau jasa "zombie" yang tidak lagi dipakai.</li><li><strong>Batch production</strong> — Produksi besar di satu waktu lebih efisien dari sedikit berkali-kali.</li><li><strong>Otomasi proses manual</strong> — WhatsApp Business, Google Sheets, Canva.</li><li><strong>Cross-training karyawan</strong> — Fleksibilitas dan kurangi ketergantungan satu orang.</li></ul>`
    },
    'cs': {
        judul: 'Pelayanan yang Membuat Pelanggan Kembali', tag: 'Operasional', durasi: '4 menit',
        konten: `<p>Mendapat pelanggan baru 5× lebih mahal dari mempertahankan yang lama.</p>
        <h4>Standar Minimum</h4><ul><li>Balas pesan maksimal 2 jam di jam kerja</li><li>Konfirmasi pesanan dalam 15 menit</li><li>Update pengiriman secara proaktif — jangan tunggu pelanggan tanya</li></ul>
        <h4>Menangani Komplain</h4><ul><li>Dengarkan dulu, jangan defensif</li><li>Minta maaf tanpa syarat — bukan "maaf tapi..."</li><li>Tawarkan solusi konkret: ganti produk, refund, atau kompensasi nyata</li><li>Follow up 3–5 hari setelah masalah selesai</li></ul>`
    },
    'rencana-bisnis': {
        judul: 'Rencana Bisnis 1 Halaman', tag: 'Strategi', durasi: '7 menit',
        konten: `<p>Rencana bisnis tidak harus 50 halaman. One-page business plan yang jelas jauh lebih berguna dari dokumen panjang yang tidak pernah dibaca lagi.</p>
        <h4>Template 1 Halaman</h4><ul><li><strong>Masalah</strong> — Apa masalah nyata pelanggan Anda?</li><li><strong>Solusi</strong> — Produk/jasa Anda memecahkan masalah itu bagaimana?</li><li><strong>Target pasar</strong> — Siapa tepatnya yang akan membeli?</li><li><strong>USP</strong> — Mengapa pilih Anda, bukan kompetitor?</li><li><strong>Model bisnis</strong> — Bagaimana Anda menghasilkan uang?</li><li><strong>Target keuangan</strong> — BEP, target omzet 3 bulan, margin yang diinginkan.</li></ul>`
    },
    'skala-usaha': {
        judul: 'Kapan Waktu Tepat Menskala Usaha?', tag: 'Strategi', durasi: '6 menit',
        konten: `<p>Skala terlalu cepat adalah penyebab utama kegagalan UMKM yang sebenarnya sudah di jalur benar.</p>
        <h4>Tanda Siap Ekspansi</h4><ul><li>Permintaan melebihi kapasitas selama minimal 3 bulan</li><li>Margin laba bersih stabil &gt;15% selama 6 bulan</li><li>Arus kas positif dan ada dana cadangan 6 bulan</li><li>Proses bisnis terdokumentasi, bisa jalan tanpa Anda setiap hari</li></ul>
        <h4>Tanda Belum Siap</h4><ul><li>Bergantung pada satu pelanggan besar (&gt;40% pendapatan)</li><li>Belum ada pencatatan keuangan yang konsisten</li><li>Arus kas sering negatif atau tidak terprediksi</li></ul>`
    }
};

function bukaArtikel(id) {
    const a = artikelDB[id];
    if (!a) return;
    document.getElementById('modalContent').innerHTML =
        `<span class="m-tag">${a.tag}</span>
         <h2>${a.judul}</h2>
         <p class="m-meta">${a.durasi} baca</p>
         ${a.konten}`;
    document.getElementById('modalOverlay').classList.add('open');
    lucide.createIcons();
}

function tutupArtikel() {
    document.getElementById('modalOverlay').classList.remove('open');
}

function filterTab(btn, cat) {
    document.querySelectorAll('.edu-tab').forEach(t => t.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('.edu-card').forEach(card => {
        card.classList.toggle('hidden', cat !== 'semua' && card.dataset.cat !== cat);
    });
}

function filterKonten() {
    const q = document.getElementById('searchInput').value.toLowerCase().trim();
    document.querySelectorAll('.edu-card').forEach(card => {
        const text = (card.dataset.title + ' ' + card.querySelector('h3').textContent).toLowerCase();
        card.classList.toggle('hidden', q !== '' && !text.includes(q));
    });
}

document.addEventListener('keydown', e => { if (e.key === 'Escape') tutupArtikel(); });
