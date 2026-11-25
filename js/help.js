// Help page: tabs of the documentation (readme.html) displayed inside the admin layout content area.
(function () {
    var tabs = [];

    function names() {
        var lis = document.querySelectorAll('#Tabs li.Tab, #Tabs li.SelectedTab');
        tabs = [];
        for (var i = 0; i < lis.length; i++) tabs.push(lis[i].id.replace(/Tab$/, ''));
    }

    // target = tab name ("API"), anchor = optional id of a heading inside the tab
    function show(target, anchor) {
        if (tabs.indexOf(target) === -1) return false;
        tabs.forEach(function (t) {
            var li = document.getElementById(t + 'Tab'), div = document.getElementById(t + 'Div');
            if (li) li.className = (t === target) ? 'SelectedTab' : 'Tab';
            if (div) div.style.display = (t === target) ? 'block' : 'none';
        });
        var el = anchor ? document.getElementById(anchor) : null;
        var old = document.querySelector('#help-doc .highlight');
        if (old) old.classList.remove('highlight');
        if (el) {
            el.classList.add('highlight');
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } else {
            var main = document.getElementById('main-content');
            if (main) main.scrollTop = 0;
        }
        return true;
    }

    function fromHash(h) {
        var parts = String(h || '').replace(/^#/, '').split(';');
        return show(parts[0], parts[1]);
    }

    document.addEventListener('click', function (e) {
        var a = e.target && e.target.closest ? e.target.closest('#help-doc a[href^="#"]') : null;
        if (!a) return;
        var parts = a.getAttribute('href').replace(/^#/, '').split(';');
        if (show(parts[0], parts[1])) {
            e.preventDefault();
            try { history.replaceState(null, '', '#' + parts.join(';')); } catch (err) {}
        }
    });

    function start() {
        names();
        if (!tabs.length) return;
        if (!fromHash(location.hash)) show('About');
    }
    window.addEventListener('hashchange', function () { fromHash(location.hash); });
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', start); else start();
})();
