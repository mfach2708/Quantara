// ===================== ABOUT PAGE — CARD STACK =====================
(function () {
    const stack = document.getElementById('stack');
    const stage = document.querySelector('.stage');
    if (!stack || !stage) return;

    const cards = Array.from(document.querySelectorAll('.card'));

    let isSpread = false;
    let isBusy   = false;

    const STACKED = [
        { tx: -7,  ty: -10, rot: -5, z: 4, shadow: '0 5px 22px rgba(0,0,0,0.09)' },
        { tx: -2,  ty:   2, rot: -2, z: 3, shadow: '0 5px 18px rgba(0,0,0,0.08)' },
        { tx:  3,  ty:   9, rot:  2, z: 2, shadow: '0 4px 16px rgba(0,0,0,0.07)' },
        { tx:  9,  ty:  16, rot:  5, z: 1, shadow: '0 4px 14px rgba(0,0,0,0.07)' },
    ];

    const GAP    = 260;
    const SPREAD = cards.map((_, i) => ({
        tx:     (i - (cards.length - 1) / 2) * GAP,
        ty:     0,
        rot:    0,
        z:      i + 1,
        shadow: '0 20px 60px rgba(0,0,0,0.11)',
    }));

    function place(card, pos, easing) {
        card.style.transition   = `transform ${easing}, box-shadow ${easing}`;
        card.style.transform    = `translate(${pos.tx}px,${pos.ty}px) rotate(${pos.rot}deg)`;
        card.style.boxShadow    = pos.shadow;
        card.style.zIndex       = pos.z;
    }

    function entrance() {
        cards.forEach((card, i) => {
            const p = STACKED[i];

            card.style.transition = 'none';
            card.style.transform  = `translate(${p.tx}px,${p.ty + 40}px) rotate(${p.rot}deg)`;
            card.style.opacity    = '0';

            card.getBoundingClientRect(); // force reflow

            setTimeout(() => {
                card.style.transition = 'transform 1s ease, opacity .7s ease';
                card.style.transform  = `translate(${p.tx}px,${p.ty}px) rotate(${p.rot}deg)`;
                card.style.opacity    = '1';
            }, 200 + i * 120);
        });
    }

    function spread() {
        isBusy = true;
        cards.forEach((card, i) => {
            setTimeout(() => { place(card, SPREAD[i], '1.3s ease'); }, i * 100);
        });
        setTimeout(() => { isBusy = false; }, 1700);
    }

    function collapse() {
        isBusy = true;
        [...cards].reverse().forEach((card, i) => {
            setTimeout(() => {
                place(card, STACKED[cards.indexOf(card)], '1.3s ease');
            }, i * 90);
        });
        setTimeout(() => { isBusy = false; }, 1600);
    }

    stack.addEventListener('click', () => {
        if (isBusy || isSpread) return;
        isSpread = true;
        spread();
    });

    stage.addEventListener('click', () => {
        if (isBusy || !isSpread) return;
        isSpread = false;
        collapse();
    });

    entrance();
})();
