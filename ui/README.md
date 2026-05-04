# YOURLS UI

The new Blade-based UI layer for YOURLS, built on TailwindCSS + Alpine.js,
designed to be **backward compatible** with every existing plugin.

This document is for **plugin authors** and **theme contributors**. End
users do not need to read it: nothing here changes how you install or
run YOURLS.

---

## TL;DR

- All existing hooks (`html_head`, `admin_page_before_table`,
  `table_head_cells`, `table_add_row_cell_array`, `action_links`,
  `admin_notices`, `admin_links`, `admin_sublinks`, `bodyclass`,
  `html_title`, `html_footer`, `shunt_html_addnew`, …) keep firing
  with the same name, the same args, in the same order.
- All legacy DOM IDs and class names plugins target (`#new_url`,
  `#main_table`, `.tblSorter`, `#shareboxes`, `#delete-confirm-dialog`,
  `#admin_menu`, `#login`, etc.) are still emitted.
- `js/jquery-3.5.1.min.js`, `js/common.js`, `css/style.css` and the
  rest of the legacy asset bundle are still loaded on every admin
  page. Plugins can rely on them.
- The new UI is opt-in at boot: defining `YOURLS_UI_DISABLE` in
  `user/config.php` disables it entirely and the legacy renderer takes
  over.

If your plugin only uses YOURLS hooks, **no changes required**. Skip
to "What's new" if you want to take advantage of the new components.

---

## Folder layout

```
ui/
├── tokens/         design tokens (CSS custom properties + Tailwind config)
├── layouts/        full-page shells: admin, auth, public, error
├── views/          page-level views (admin/dashboard, public/infos, …)
├── components/
│   ├── atoms/      buttons, inputs, badges, icons, …
│   ├── molecules/  form-field, search-input, pagination, tabs, …
│   ├── organisms/  table, modal, banner, card, drawer, …
│   └── forms/      add-url, share-box, login-form
├── partials/       logo, language-attributes, favicon, version notice
├── helpers/        PSR-4 classes (YOURLS\UI\*)
├── helpers.php     procedural yourls_ui_* functions
├── facade.php      legacy yourls_html_*/yourls_table_* (M7+)
└── assets/
    ├── src/        Tailwind + Alpine sources
    └── dist/       compiled bundle (committed)
```

---

## Hook contract

Every hook the legacy `includes/functions-html.php` fires is still
fired by the new layer. The Blade layouts and components delegate to
`\YOURLS\UI\HookBridge::action()` / `::filter()` which are thin
wrappers around `yourls_do_action()` / `yourls_apply_filter()`.

The full list (preserved name + args):

| Phase | Hook | Type | Payload |
|---|---|---|---|
| head | `pre_html_head` | action | `$context, $title` |
| head | `admin_headers` | action | `$context, $title` (admin only) |
| head | `html_head_content-type` | filter | `$contentType` |
| head | `html_head_meta_content-type` | filter | `$contentType` |
| head | `html_head_meta` | action | `$context` |
| head | `bodyclass` | filter | `$bodyclass` |
| head | `html_title` | filter | `$title, $context` |
| head | `html_head` | action | `$context` |
| head | `html_language_attributes_doctype` | filter | `$doctype` |
| head | `html_language_attributes` | filter | `$attrs, $doctype, $locale` |
| head | `shunt_html_favicon` | filter | `null` (returning a non-null value short-circuits) |
| logo | `pre_html_logo` | action | – |
| logo | `html_logo` | action | – |
| menu | `logout_link` | filter | `$logoutLinkHtml` |
| menu | `help_link` | filter | `$helpLinkHtml` |
| menu | `admin_links` | filter | `array` |
| menu | `admin_sublinks` | filter | `array` |
| menu | `admin_menu` | action | – |
| menu | `admin_notices` | action | – |
| menu | `admin_notice` | action | – (alias) |
| page | `admin_page_before_content` | action | – |
| page | `admin_page_before_form` | action | – |
| page | `admin_page_before_table` | action | – |
| page | `admin_page_after_table` | action | – |
| addnew | `shunt_html_addnew` | filter | `null, $url, $keyword` |
| addnew | `html_addnew` | action | – |
| sharebox | `shunt_share_box` | filter | `null` |
| sharebox | `share_box_data` | filter | `array` |
| sharebox | `shareboxes_before/middle/after` | action | `$longurl, $shorturl, $title, $text` |
| sharebox | `share_links` | action | `$longurl, $shorturl, $title, $text` |
| table | `table_head_start/end` | filter | `$html` |
| table | `table_head_cells` | filter | `array` |
| table | `table_tbody_start/end` | filter | `$html` |
| table | `table_end` | filter | `$html` |
| table | `table_add_row_action_array` | filter | `array, $keyword` |
| table | `action_links` | filter | `$html, $keyword, $url, $ip, $clicks, $timestamp` |
| table | `add_row_protocol_warning` | filter | `$html` |
| table | `table_add_row_cell_array` | filter | `array, $keyword, $url, $title, $ip, $clicks, $timestamp` |
| table | `table_add_row` | filter | `$html, $keyword, $url, $title, $ip, $clicks, $timestamp` |
| edit | `table_edit_row` | filter | `$html, $keyword, $url, $title` |
| tfooter | `html_tfooter` | action | – |
| tfooter | `html_select_options` | filter | `$options, $name, $selected, $display, $label` |
| tfooter | `html_select` | filter | `$html, $name, $options, $selected, $display` |
| login | `login_form_top/bottom/end` | action | – |
| die | `pre_yourls_die` | action | `$message, $title, $header_code` |
| die | `die_title` | filter | `$html` |
| die | `die_message` | filter | `$html` |
| die | `yourls_die` | action | – |
| footer | `html_footer_text` | filter | `$html` |
| footer | `html_footer` | action | `$context` |
| plugin pages | `load-{slug}` | action | – (dynamic) |
| bookmarklet | `bookmarklet` | action | – |
| bookmarklet | `pre_share_redirect` | action | – |
| bookmarklet | `share_redirect_{network}` | action | `$return` (dynamic) |

A regression in any of these is treated as a release blocker.

---

## What's new (and how to use it)

### Procedural helpers

```php
yourls_ui_asset(string $logical): string
// Returns the public URL of a built asset, e.g.
// yourls_ui_asset('admin.css')

yourls_ui_view(string $name, array $data = []): string
// Renders a Blade view from ui/views/ and returns the HTML.

yourls_ui_view_echo(string $name, array $data = []): void
// Same, but echoes directly.

yourls_ui_is_enabled(): bool
// True when the new Blade layer is loaded.
```

### Enqueue API

A small system inspired by `wp_enqueue_script`/`wp_enqueue_style` for
plugins that want their assets delivered with proper dependency
resolution and cache-busting.

```php
yourls_ui_register_style($handle, $src, $deps = [], $ver = null);
yourls_ui_register_script($handle, $src, $deps = [], $ver = null);
yourls_ui_enqueue_style($handle, $src = null, $deps = [], $ver = null);
yourls_ui_enqueue_script($handle, $src = null, $deps = [], $ver = null, $in_footer = true);
yourls_ui_dequeue_style($handle);
yourls_ui_dequeue_script($handle);
yourls_ui_localize_script($handle, $object, array $data);
```

Default registered handles:
- `yourls-tokens`, `yourls-admin` (CSS)
- `yourls-alpine`, `yourls-admin` (JS)
- `yourls-jquery-shim` — jQuery 3.5; **not** auto-enqueued. Plugins
  that still need jQuery should call
  `yourls_ui_enqueue_script('yourls-jquery-shim')` explicitly. Until
  M7 ships, the legacy `<script src="js/jquery-3.5.1.min.js">` keeps
  loading from the head partial too, so this is forward-looking.

### Theme toggle

The `data-theme` attribute on `<html>` switches between `light` and
`dark`. The Alpine store handles persistence:

```html
<button @click="$store.theme.toggle()">Toggle</button>
```

Plugins can register additional themes by overriding tokens under a
new selector:

```css
body[data-theme="my-brand"] {
  --color-primary-500: 255 0 128;
}
```

### Toast notifications

```html
<button @click="$store.notices.push('Saved', 'success')">Save</button>
```

Tones: `info` (default), `success`, `warning`, `danger`.

### Modals via Alpine store

```html
<button @click="$store.modals.show('settings')">Open</button>
<x-organisms::drawer name="settings" title="Settings">…</x-organisms::drawer>
```

---

## Writing a custom view

```php
// In your plugin:
yourls_register_plugin_page('mine', 'My Plugin', function () {
    echo yourls_ui_view('admin.plugin-page', [
        'slug'  => 'mine',
        'title' => 'My Plugin',
        'body'  => '<p>Hello!</p>',
    ]);
});
```

To use components from a Blade view in your own theme:

```blade
<x-organisms::card title="Stats">
    <x-atoms::badge tone="success" dot>active</x-atoms::badge>
    <x-molecules::pagination :current="$page" :total="$total" />
</x-organisms::card>
```

Anonymous component path prefixes:
- `<x-atoms::*>`     → `ui/components/atoms/`
- `<x-molecules::*>` → `ui/components/molecules/`
- `<x-organisms::*>` → `ui/components/organisms/`
- `<x-forms::*>`     → `ui/components/forms/`

For sub-folders, use a dot: `<x-organisms::table.row>` resolves to
`ui/components/organisms/table/row.blade.php`.

---

## Debug

Set `YOURLS_DEBUG = true` in `user/config.php`. The new layer surfaces
a few additional debug log entries:

- `[YOURLS\UI] Asset 'X' resolved to 'Y' but file is missing. Did you
  run `npm run build`?` — the built bundle is missing or stale.
- `[YOURLS\UI] Blade init failed: …` — Blade could not start;
  the legacy renderer is taking over.
- `[YOURLS\UI\Enqueue] cycle detected at H` — your plugin declared a
  dependency cycle in its enqueue graph.

---

## Building the assets

End users never need to do this. Contributors who modify CSS/JS
sources should:

```bash
npm ci
npm run build
git status --porcelain ui/assets/dist   # must be clean before commit
```

Assets are committed to `ui/assets/dist/` so end users always get a
ready-to-use bundle without running Node themselves.

---

## Disabling the new layer

```php
// user/config.php
define('YOURLS_UI_DISABLE', true);
```

The legacy `includes/functions-html.php` continues to render every
admin page. This is the recommended escape hatch if a critical plugin
breaks; please open an issue on GitHub so we can fix the regression.
