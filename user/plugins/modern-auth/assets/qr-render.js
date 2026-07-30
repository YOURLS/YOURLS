// Renders a small QR code SVG into every .modern-qr-code[data-url] element on the page,
// and shows a larger version in a popup on click. Uses the vendored qrcode-generator library
// (vendor/qrcode.js + vendor/qrcode_UTF8.js), no network calls, no external service.
(function () {
    function renderInto(el, size) {
        var url = el.getAttribute('data-url');
        if (!url) return null;
        var qr = qrcode(0, 'M');
        qr.addData(url);
        qr.make();
        el.innerHTML = qr.createSvgTag({ cellSize: 2, margin: 0, scalable: true });
        return url;
    }

    function closePopup() {
        var existing = document.querySelector('.modern-qr-popup');
        if (existing) existing.remove();
        document.removeEventListener('click', onDocClick, true);
    }

    function onDocClick(e) {
        var popup = document.querySelector('.modern-qr-popup');
        if (popup && !popup.contains(e.target) && !e.target.closest('.modern-qr-code')) {
            closePopup();
        }
    }

    function showPopup(el, url) {
        closePopup();

        var qr = qrcode(0, 'M');
        qr.addData(url);
        qr.make();

        var popup = document.createElement('div');
        popup.className = 'modern-qr-popup';
        popup.innerHTML = qr.createSvgTag({ cellSize: 6, margin: 0, scalable: true }) +
            '<br/><a href="' + qr.createDataURL(8, 4) + '" download="qrcode.gif">Download</a>';

        document.body.appendChild(popup);

        var rect = el.getBoundingClientRect();
        popup.style.left = Math.max(8, rect.left) + 'px';
        popup.style.top = (rect.bottom + 8) + 'px';

        setTimeout(function () {
            document.addEventListener('click', onDocClick, true);
        }, 0);
    }

    function init() {
        document.querySelectorAll('.modern-qr-code[data-url]').forEach(function (el) {
            var url = renderInto(el);
            if (!url) return;
            el.addEventListener('click', function () {
                showPopup(el, url);
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Re-run after AJAX adds a new row (bookmarklet / "add new link" without page reload)
    document.addEventListener('modern_auth:table_row_added', init);
})();
