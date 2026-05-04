<?php
/**
 * YOURLS UI Bootstrap
 *
 * Loaded conditionally from includes/load-yourls.php after the core has
 * defined YOURLS_USERDIR, YOURLS_VERSION, and the procedural API
 * (yourls_apply_filter, yourls_do_action, yourls_esc_*, etc.).
 *
 * - Verifies that Blade is available; if not, leaves the legacy code path
 *   alone (graceful fallback).
 * - Registers default style/script handles for the new admin asset bundle.
 * - Triggers an action `yourls_ui_loaded` so plugins can enqueue assets or
 *   register components without depending on a specific load order.
 */

if (defined('YOURLS_UI_DISABLE') && YOURLS_UI_DISABLE) {
    return;
}

if (!class_exists(\YOURLS\UI\BladeFactory::class)) {
    return;
}

if (!\YOURLS\UI\BladeFactory::isAvailable()) {
    return;
}

\YOURLS\UI\Enqueue::registerStyle(
    'yourls-tokens',
    yourls_ui_asset('admin.css'),
    [],
    defined('YOURLS_VERSION') ? (string) YOURLS_VERSION : null
);

\YOURLS\UI\Enqueue::registerScript(
    'yourls-admin',
    yourls_ui_asset('admin.js'),
    [],
    defined('YOURLS_VERSION') ? (string) YOURLS_VERSION : null,
    true
);

\YOURLS\UI\Enqueue::registerScript(
    'yourls-jquery-shim',
    function_exists('yourls_site_url') ? rtrim((string) yourls_site_url(false), '/') . '/js/jquery-3.5.1.min.js' : '/js/jquery-3.5.1.min.js',
    [],
    '3.5.1',
    false
);

if (function_exists('yourls_do_action')) {
    yourls_do_action('yourls_ui_loaded');
}
