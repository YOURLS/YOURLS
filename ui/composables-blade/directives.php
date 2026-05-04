<?php
/**
 * Custom Blade directives for YOURLS UI.
 *
 * This file is included by BladeFactory::registerDirectives() with
 * a $blade variable already in scope (the Jenssegers\Blade\Blade instance).
 *
 * Directives intentionally remain thin: they expand to direct PHP calls
 * to the procedural YOURLS API, so plugins keep behaving exactly as before.
 */

/** @var \Jenssegers\Blade\Blade $blade */

$blade->directive('yourlsAction', function (string $expression): string {
    return "<?php \\YOURLS\\UI\\HookBridge::action({$expression}); ?>";
});

$blade->directive('yourlsFilter', function (string $expression): string {
    return "<?php echo \\YOURLS\\UI\\HookBridge::filter({$expression}); ?>";
});

$blade->directive('yourlsT', function (string $expression): string {
    return "<?php echo function_exists('yourls_esc_html') && function_exists('yourls__') ? yourls_esc_html(yourls__({$expression})) : htmlspecialchars((string) {$expression}, ENT_QUOTES); ?>";
});

$blade->directive('yourlsTraw', function (string $expression): string {
    return "<?php echo function_exists('yourls__') ? yourls__({$expression}) : (string) {$expression}; ?>";
});

$blade->directive('yourlsNonce', function (string $expression): string {
    return "<?php if (function_exists('yourls_nonce_field')) { yourls_nonce_field({$expression}); } ?>";
});

$blade->directive('yourlsAsset', function (string $expression): string {
    return "<?php echo \\YOURLS\\UI\\Asset::url({$expression}); ?>";
});

$blade->directive('yourlsThemeBoot', function () {
    return "<?php echo \\YOURLS\\UI\\Theme::preloadScript(); ?>";
});
