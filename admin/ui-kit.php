<?php
/**
 * YOURLS UI Kit — private dev endpoint.
 *
 * Renders every atom and molecule for visual verification while the new
 * UI is being built. Gated so that production installs cannot reach it.
 *
 * Access: enable YOURLS_DEBUG, or define YOURLS_UI_KIT=true in user/config.php.
 *   /admin/ui-kit.php
 */

define('YOURLS_ADMIN', true);
require_once __DIR__ . '/../includes/load-yourls.php';
yourls_maybe_require_auth();

$enabled = (defined('YOURLS_UI_KIT') && YOURLS_UI_KIT)
        || (defined('YOURLS_DEBUG') && YOURLS_DEBUG);

if (!$enabled) {
    yourls_die('UI Kit is not enabled on this install.', 'Forbidden', 403);
}

if (!function_exists('yourls_ui_is_enabled') || !yourls_ui_is_enabled()) {
    yourls_die('Blade UI is not available; run composer install first.', 'UI not available', 500);
}

echo yourls_ui_view('kit.index');
