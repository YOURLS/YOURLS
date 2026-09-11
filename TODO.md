# TODO

## Enable dark mode

Add a dark theme to the YOURLS admin interface.

**Why:** this instance runs at `https://s.satrawi.com/admin/` and the admin
pages are the only part anyone actually looks at. The stock palette is a light
one — `css/style.css` opens with `background:#e3f3ff` on `body` and
`color:#595441` — with no dark variant anywhere in the tree.

**Where the colours live:**

| File | Covers |
|---|---|
| `css/style.css` | the admin interface (388 lines, the bulk of the work) |
| `css/infos.css` | the per-link stats pages |
| `css/cal.css` | the date picker on the stats pages |
| `css/share.css` | the share box |
| `css/tablesorter.css` | sortable table headers |

`admin/index.php`, `admin/plugins.php` and `admin/tools.php` all load
`css/style.css`, so that file is where a theme has to start.

**Approach to decide before writing any CSS:**

1. **A plugin under `user/plugins/`** — hooks a stylesheet in via
   `yourls_add_action( 'html_head', ... )`. Survives a YOURLS upgrade, and is
   the only option that survives this deployment's container image being
   replaced, because `user/plugins/` is the persisted volume and the rest of
   the webroot is not. Preferred unless something rules it out.
2. **Editing `css/style.css` directly** — simplest, but every upgrade
   overwrites it, and in the containerised deployment it is lost on any pod
   restart. Only viable as a throwaway experiment.

**Worth doing either way:**

- Drive it from CSS custom properties on `:root` rather than hardcoding a
  second set of hex values, so light and dark share one definition.
- Respect `prefers-color-scheme: dark` so it follows the OS by default, and
  leave room for an explicit toggle later.
- Check contrast on the elements that carry colour as *meaning*, not
  decoration: the traffic-light link status, the "keyword already exists"
  error state, and the sparkline/chart colours on the stats pages. These are
  the ones a naive palette inversion breaks.

**Upstream note:** this repo is a fork of
[YOURLS/YOURLS](https://github.com/YOURLS/YOURLS). If the theme lands as a
self-contained plugin it is a candidate to offer upstream; if it lands as an
edit to `css/style.css` it is not.
