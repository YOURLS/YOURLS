// Menu trái dạng ngăn kéo trên màn hình nhỏ (< 992px): nút ☰ mở, bấm nền mờ / liên kết / phím Esc để đóng.
(function () {
    function sidebar() { return document.getElementById('sidebar'); }
    function backdrop() { return document.getElementById('mobile-backdrop'); }
    function setOpen(open) {
        var s = sidebar(), b = backdrop();
        if (!s) return;
        s.classList.toggle('show', open);
        if (b) b.classList.toggle('show', open);
        var t = document.getElementById('sidebar-toggle');
        if (t) t.setAttribute('aria-expanded', open ? 'true' : 'false');
    }
    document.addEventListener('click', function (e) {
        var t = e.target;
        if (!t || !t.closest) return;
        if (t.closest('#sidebar-toggle')) { setOpen(!(sidebar() && sidebar().classList.contains('show'))); return; }
        if (t.closest('#mobile-backdrop') || t.closest('#sidebar a')) setOpen(false);
    });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') setOpen(false); });

    // Phân trang: ô nhập số trang -> chuyển tới trang đó
    document.addEventListener('submit', function (e) {
        var f = e.target;
        if (!f || !f.classList || !f.classList.contains('page-jump')) return;
        e.preventDefault();
        var max = parseInt(f.getAttribute('data-max'), 10) || 1;
        var n = parseInt(f.querySelector('input').value, 10);
        if (isNaN(n)) return;
        n = Math.max(1, Math.min(max, n));
        window.location.href = f.getAttribute('data-url').replace('__PAGE__', n);
    });
})();
