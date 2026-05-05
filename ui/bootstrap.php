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

// Load the Blade-backed alternatives to yourls_html_*.
$facadeFile = __DIR__ . '/facade.php';
if (is_file($facadeFile)) {
    require_once $facadeFile;
}

// Theme-aware Google Charts options. Background is rendered transparent
// (the surrounding card already provides the surface) and the line color
// uses the design-system primary so charts read correctly in both
// light and dark modes (the rest of the recoloring is handled in CSS,
// since Google Charts paints the rest as inline SVG).
if (function_exists('yourls_add_filter')) {
    yourls_add_filter('stats_line_options', function ($options) {
        $options['backgroundColor'] = "{ fill: 'transparent' }";
        $options['colors']          = "['#3b82f6']";
        $options['chartArea']       = "{ left: 40, top: 16, right: 16, bottom: 32 }";
        return $options;
    });
    yourls_add_filter('stats_pie_options', function ($options) {
        $options['backgroundColor']  = "{ fill: 'transparent' }";
        $options['legend']           = "{ position: 'right', textStyle: { color: '#737373', fontSize: 12 } }";
        $options['pieSliceTextStyle'] = "{ color: '#ffffff', fontSize: 12 }";
        $options['colors']           = "['#3b82f6', '#60a5fa', '#93c5fd', '#bfdbfe', '#1d4ed8', '#1e40af']";
        $options['chartArea']        = "{ left: 12, top: 12, right: 12, bottom: 12 }";
        return $options;
    });
}

if (function_exists('yourls_do_action')) {
    yourls_do_action('yourls_ui_loaded');
}
