// Mã QR tự động cho các short URL (thư viện qrcode.min.js, cùng module với ứng dụng qlvanban).
// Mọi <img class="qr-thumb" data-qr="URL"> trong trang (kể cả hàng mới thêm/sửa bằng AJAX) được tự vẽ; bấm vào ảnh để xem
// mã QR lớn, sao chép link, mở link hoặc tải mã QR về (PNG). Chuỗi chữ lấy từ yourls_qr_l10n (đã dịch phía PHP).
(function () {
    var L = window.yourls_qr_l10n || { title: 'QR code', copy: 'Copy', copied: 'Copied', open: 'Open link', download: 'Download QR code', close: 'Close' };
    var CACHE = {};

    function qrDataUrl(link, width) {
        var key = link + '|' + width;
        if (!CACHE[key]) CACHE[key] = QRCode.toDataURL(link, { width: width, margin: 1, errorCorrectionLevel: 'M' });
        return CACHE[key]; // Promise
    }

    function hydrate(root) {
        if (typeof QRCode === 'undefined') return;
        var imgs = (root || document).querySelectorAll('img.qr-thumb[data-qr]');
        for (var i = 0; i < imgs.length; i++) {
            (function (img) {
                var link = img.getAttribute('data-qr');
                if (!link || img.getAttribute('data-qr-done') === link) return;
                img.setAttribute('data-qr-done', link);
                var size = Math.max(img.width || 40, 40) * 3;
                qrDataUrl(link, size).then(function (u) { img.src = u; }).catch(function () { img.alt = 'QR'; });
            })(imgs[i]);
        }
    }

    function copyText(text, btn) {
        var done = function () {
            if (!btn) return;
            var old = btn.getAttribute('data-label') || btn.textContent;
            btn.setAttribute('data-label', old);
            btn.textContent = L.copied;
            setTimeout(function () { btn.textContent = old; }, 1500);
        };
        var fallback = function () {
            var t = document.createElement('textarea');
            t.value = text; t.style.position = 'fixed'; t.style.opacity = '0';
            document.body.appendChild(t); t.select();
            try { document.execCommand('copy'); done(); } catch (e) { window.prompt('', text); }
            document.body.removeChild(t);
        };
        if (navigator.clipboard && window.isSecureContext) navigator.clipboard.writeText(text).then(done, fallback);
        else fallback();
    }

    var dlg;
    function ensureDialog() {
        if (dlg) return dlg;
        dlg = document.createElement('dialog');
        dlg.id = 'qr-dialog';
        dlg.innerHTML =
            '<div class="modal-head"><h2></h2><button type="button" class="modal-close" aria-label="' + L.close + '">&times;</button></div>' +
            '<div class="modal-body qr-body"><img id="qr-big" alt="" width="260" height="260">' +
            '<div class="add-result-row"><input type="text" class="text" id="qr-link" readonly><button type="button" class="button" id="qr-copy">' + L.copy + '</button></div></div>' +
            '<div class="modal-foot"><a class="button" id="qr-open" target="_blank" rel="noopener">' + L.open + '</a><a class="button primary" id="qr-dl" download="qr.png">' + L.download + '</a></div>';
        dlg.querySelector('h2').textContent = L.title;
        document.body.appendChild(dlg);
        dlg.querySelector('.modal-close').addEventListener('click', function () { dlg.close(); });
        dlg.addEventListener('click', function (e) { if (e.target === dlg) dlg.close(); });
        dlg.querySelector('#qr-copy').addEventListener('click', function () { copyText(dlg.querySelector('#qr-link').value, this); });
        return dlg;
    }

    function openQr(link, title) {
        var d = ensureDialog();
        d.querySelector('h2').textContent = title || L.title;
        d.querySelector('#qr-link').value = link;
        d.querySelector('#qr-open').href = link;
        var big = d.querySelector('#qr-big');
        big.removeAttribute('src');
        if (!d.open) d.showModal();
        qrDataUrl(link, 520).then(function (u) {
            big.src = u;
            var a = d.querySelector('#qr-dl');
            a.href = u;
            a.download = 'qr-' + link.replace(/^https?:\/\//, '').replace(/[^\w.-]+/g, '_').slice(0, 40) + '.png';
        });
    }

    document.addEventListener('click', function (e) {
        var img = e.target && e.target.closest ? e.target.closest('img.qr-thumb[data-qr]') : null;
        if (!img) return;
        e.preventDefault();
        openQr(img.getAttribute('data-qr'));
    });

    function start() {
        hydrate();
        // Hàng mới thêm / sửa bằng AJAX: tự tạo mã QR ngay
        if (window.MutationObserver) {
            new MutationObserver(function () { hydrate(); }).observe(document.body, { childList: true, subtree: true });
        }
    }
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', start); else start();

    window.YourlsQR = { hydrate: hydrate, open: openQr, copy: copyText, dataUrl: qrDataUrl };
})();
