/**
 * about-mobile-patch.js
 * Override jarak antar cards di stack animasi untuk tampilan mobile.
 * Di-load setelah about.js via @section('scripts') di about.blade.php
 */
(function () {
    if (window.innerWidth > 768) return; // hanya aktif di mobile

    var stack = document.getElementById('stack');
    if (!stack) return;

    // Offset horizontal lebih rapat untuk mobile
    var offsetX  = window.innerWidth <= 480 ? 8  : 10;  // px per card
    var rotDeg   = 3;  // derajat rotasi per card

    function applyMobileOffsets() {
        var cards = stack.querySelectorAll('.card');
        cards.forEach(function (card, i) {
            var x   = i * offsetX;
            var rot = i * rotDeg;
            card.style.transform = 'translateX(' + x + 'px) rotate(' + rot + 'deg)';
        });
    }

    // Jalankan setelah about.js selesai setup (tunggu sebentar)
    setTimeout(applyMobileOffsets, 50);

    // Re-apply setiap kali ada klik/animasi selesai
    stack.addEventListener('click', function () {
        setTimeout(applyMobileOffsets, 320); // 320ms = setelah transisi selesai
    });
})();
