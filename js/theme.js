// Giao diện sáng / tối: lựa chọn của từng người dùng, lưu trong localStorage của trình duyệt (không lưu trên máy chủ).
// Nạp ở <head> (không defer) để áp dụng trước khi vẽ trang, tránh nháy sáng. Nút bật/tắt: phần tử có thuộc tính data-theme-toggle.
(function () {
    var KEY = 'yourls_theme';
    var root = document.documentElement;

    function stored() {
        try { var v = localStorage.getItem(KEY); if (v === 'dark' || v === 'light') return v; } catch (e) {}
        return 'light';
    }
    function apply(t) {
        root.setAttribute('data-theme', t);
        var m = document.querySelector('meta[name="theme-color"]');
        if (m) m.setAttribute('content', t === 'dark' ? '#0f172a' : '#4f46e5');
    }
    function sync() {
        var dark = root.getAttribute('data-theme') === 'dark';
        var label = dark ? 'Light mode' : 'Dark mode';
        var btns = document.querySelectorAll('[data-theme-toggle]');
        for (var i = 0; i < btns.length; i++) {
            btns[i].setAttribute('title', label);
            btns[i].setAttribute('aria-pressed', dark ? 'true' : 'false');
            btns[i].textContent = dark ? '☀ Light' : '☾ Dark';
        }
    }
    function set(t) {
        try { localStorage.setItem(KEY, t); } catch (e) {}
        apply(t);
        sync();
    }

    apply(stored());
    document.addEventListener('DOMContentLoaded', sync);
    document.addEventListener('click', function (e) {
        var b = e.target.closest && e.target.closest('[data-theme-toggle]');
        if (b) { e.preventDefault(); set(root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark'); }
    });
})();
