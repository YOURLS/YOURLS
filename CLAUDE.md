# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

YOURLS ("Your Own URL Shortener") is a self-hosted PHP application (PHP ^8.1, MySQL/MariaDB via PDO). It has no build step and no linter configured. Dependencies are installed with Composer into `includes/vendor/` (not `vendor/`; see `composer.json` `vendor-dir`), and that directory is tracked in the repo. User documentation lives at docs.yourls.org.

## Commands

Tests need a **real, empty MySQL/MariaDB database**: the suite installs YOURLS into it and erases everything. Never point it at an existing database.

```bash
composer -d tests/ install                         # install PHPUnit (tests/composer.json)
cp tests/data/config/yourls-tests-config-sample.php tests/yourls-tests-config.php   # then edit DB credentials/paths
phpunit --configuration phpunit.xml.dist           # run the whole suite from repo root (config is found by `yut_find_config()` in `tests/includes/install.php`: `yourls-tests-config.php` in the repo root or `tests/`, else `user/config.php`)
phpunit --configuration phpunit.xml.dist --group formatting   # one group
phpunit --configuration phpunit.xml.dist --filter test_name   # one test
phpunit --configuration phpunit.xml.dist tests/tests/db/DBGetTest.php   # one file
```

Notes:
- `phpunit.xml.dist` has `stopOnFailure="true"` and excludes the `ajax` group.
- CI (`.github/workflows/ci.yml`) copies `tests/data/config/yourls-tests-config-ci.php` to `user/config.php` and runs PHPUnit on PHP 8.1–8.6 against MariaDB.
- Tests live in `tests/tests/<area>/` (api, auth, db, format, links, plugins, shorturl, ...). Shared helpers are in `tests/includes/`.
- Things that can happen only once per PHP process (a constant defined, a file `require_once`d) must be tested with `NewProcessTrait::run_in_new_process()` (`tests/includes/new-process.php`). Scenarios are plain PHP files in `tests/data/scripts/scenarios/` that act and return nothing; the test asserts on the JSON report (defined `YOURLS_*` constants, included files).

## Architecture

### Entry points (all bootstrap through `includes/load-yourls.php`)
- `yourls-loader.php`: front controller, reached via rewrite rules for any URL under the install. Parses the request with `yourls_get_request()` and the regex `^(.+?)(\+(all)?)?/?$`, then dispatches: a URL with a scheme goes to the admin bookmarklet ("prefix-n-shorten"), a taken keyword or plugin page goes to `yourls-go.php` (redirect), `keyword+` / `keyword+all` goes to `yourls-infos.php` (stats page), anything else redirects to the site root. `yourls-go.php` and `yourls-infos.php` expect variables (`$keyword`, `$stats_all`) set by the loader and are not meant to be hit directly.
- `yourls-api.php`: public API (actions `shorturl`, `expand`, `url-stats`, `stats`, `db-stats`, `version`, dispatched to `yourls_api_action_*()` in `includes/functions-api.php`, plus plugin actions). Output formats (json, jsonp, xml, simple) are chosen with `format`.
- `admin/`: `index.php` (dashboard), `admin-ajax.php` (JSON actions guarded by `yourls_verify_nonce()`), `install.php`, `upgrade.php`, `plugins.php`, `tools.php`. Admin scripts define `YOURLS_ADMIN` (and `YOURLS_AJAX`) before loading, and call `yourls_maybe_require_auth()`.

### Boot sequence
`load-yourls.php` loads the Composer autoloader, locates and `require`s the user's `config.php` **at global scope** (so `$yourls_user_passwords`, `$yourls_reserved_URL` etc. land in globals; the test bootstraps explicitly `global` these variables for the same reason), then `Config\Config::define_core_constants()` fills in every unset `YOURLS_*` constant and validates mandatory ones (including a non-default `YOURLS_COOKIEKEY`). Finally `Config\Init` runs, driven by the boolean flags of `Config\InitDefaults`; tests override those flags to skip steps that need a web context or an installed DB (see `yut_boot_yourls()` in `tests/includes/boot.php`). `Init` includes the procedural `includes/functions-*.php` files, builds the global `$ydb` (`Database\YDB`, extending Aura.Sql `ExtendedPdo`), and registers `yourls_shutdown`.

### Code layout
- The codebase is mostly **procedural**: functions prefixed `yourls_` in `includes/functions-*.php`, grouped by concern (shorturls, links, options, auth, formatting, html, http, plugins, l10n, kses, install/upgrade, geo, ...). Namespaced classes (PSR-4 `YOURLS\` → `includes/`) are limited to `Config/`, `Database/`, `Exceptions/`, `Views/`.
- **Database access goes through `$ydb`** (`includes/Database/YDB.php`), which also acts as a request-level cache for options, link infos and the plugin list. Use the `yourls_*` wrappers (e.g. `yourls_get_option()`, `yourls_get_keyword_infos()`) rather than touching `$ydb` properties directly. Table names are constants derived from `YOURLS_DB_PREFIX` (e.g. `YOURLS_DB_TABLE_URL`).
- `includes/functions-deprecated.php` holds shims for renamed functions; keep these when refactoring public functions since plugins depend on them.

### Plugin system (WordPress-style hooks)
`includes/functions-plugins.php` provides `yourls_add_filter/yourls_apply_filter` and `yourls_add_action/yourls_do_action`. Hooks are sprinkled throughout core (e.g. `pre_load_template`, `load_template_go`, `redirect_keyword_not_found`), so changing hook names/arguments is a compatibility break. Plugins are directories in `user/plugins/<name>/plugin.php` with a header comment (`Plugin Name:` ...); active plugins are stored in the options table and loaded by `yourls_load_plugins()`. Plugins can also register admin pages (`yourls_register_plugin_page()`) and static pages from `user/pages/`. The `user/` directory (config, plugins, languages, pages) is the only place site owners customize; core code should not depend on its content.

### Request-level behavior worth knowing
- Authentication (`includes/functions-auth.php`, `auth.php`): user/password map `$yourls_user_passwords` from `config.php` (`yourls_hash_passwords_now()` rewrites the config file to hash plaintext passwords; `phpass:` hashes are supported). Public vs. private install is controlled by `YOURLS_PRIVATE`.
- Short URL creation (`functions-shorturls.php`) applies filters for URL sanitizing, flood protection, reserved keywords (`$yourls_reserved_URL`), duplicates (`yourls_allow_duplicate_longurls()`), and keyword generation (base set by `YOURLS_URL_CONVERT`, default 36).
- `YOURLS_DEBUG` enables the DB profiler/logger (`Database\Profiler`, `Database\Logger`).

### Admin page layout and assets
- Admin/stats/login pages share one layout built in `includes/functions-html.php`: `yourls_html_head()` opens `#app-container`, `yourls_html_logo()` opens the left `<aside id="sidebar">` (logo), `yourls_html_menu()` outputs the menu and then closes the sidebar and opens `#main-content > #wrap`, `yourls_html_footer()` closes whatever is open. The current state is tracked by `yourls_html_layout_phase()` (0 none, 1 sidebar, 2 main), so a page must keep the `head → logo → menu → content → footer` order. Contexts without a menu (login, install, `yourls_die()`) call `yourls_html_logo( false )` and get a centered header instead of the sidebar.
- All CSS/JS in `<head>` must be linked with `yourls_asset_url( 'css/foo.css' )`, which appends the file's mtime (`?v=<mtime>`) so edits are never served from browser cache. Do not hardcode `?v=YOURLS_VERSION` for assets.
- Styling uses CSS variables defined in `css/style.css` (`:root` for light, `html[data-theme="dark"]` for dark); other CSS files must use these variables, not hardcoded colors. Dark mode is toggled by `js/theme.js` (localStorage `yourls_theme`); the mobile drawer by `js/layout.js`.
- Links table page (`admin/index.php`): the filter/search/sort form is `yourls_html_filterbar()` (above the table), pagination is `yourls_html_pagination()` (rendered above and in `<tfoot>` via `yourls_html_tfooter()`; "go to page" form handled in `js/layout.js`), and "Shorten a URL" is a native `<dialog id="add-modal">` built by `yourls_html_addnew()` and driven by `js/insert.js`. QR codes are automatic: every `img.qr-thumb[data-qr]` (rows are rendered by `yourls_table_add_row()`, also AJAX-inserted ones) is drawn by `js/qr.js` using `js/qrcode.min.js` (same module as the qlvanban app); translated labels come from `yourls_qr_l10n` printed in `yourls_html_head()`. Toast notifications sit behind open `<dialog>`s, so the modal shows its own `#feedback`.
