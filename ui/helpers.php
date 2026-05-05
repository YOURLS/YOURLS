<?php
/**
 * YOURLS UI - Procedural helpers
 *
 * Loaded automatically via Composer autoload "files".
 * Defines top-level functions (yourls_ui_*) used by templates and plugins.
 *
 * Implementations live in PSR-4 classes under YOURLS\UI\* (ui/helpers/).
 * This file is intentionally minimal: it only forwards to those classes.
 */

if (!function_exists('yourls_ui_asset')) {
    /**
     * Resolve a logical asset name to its public URL with cache-busting.
     *
     * @param string $logical e.g. "admin.css", "admin.js"
     */
    function yourls_ui_asset(string $logical): string
    {
        return \YOURLS\UI\Asset::url($logical);
    }
}

if (!function_exists('yourls_ui_enqueue_style')) {
    function yourls_ui_enqueue_style(string $handle, ?string $src = null, array $deps = [], ?string $ver = null, string $media = 'all'): void
    {
        \YOURLS\UI\Enqueue::style($handle, $src, $deps, $ver, $media);
    }
}

if (!function_exists('yourls_ui_enqueue_script')) {
    function yourls_ui_enqueue_script(string $handle, ?string $src = null, array $deps = [], ?string $ver = null, bool $in_footer = true): void
    {
        \YOURLS\UI\Enqueue::script($handle, $src, $deps, $ver, $in_footer);
    }
}

if (!function_exists('yourls_ui_dequeue_style')) {
    function yourls_ui_dequeue_style(string $handle): void { \YOURLS\UI\Enqueue::dequeueStyle($handle); }
}
if (!function_exists('yourls_ui_dequeue_script')) {
    function yourls_ui_dequeue_script(string $handle): void { \YOURLS\UI\Enqueue::dequeueScript($handle); }
}
if (!function_exists('yourls_ui_register_style')) {
    function yourls_ui_register_style(string $handle, string $src, array $deps = [], ?string $ver = null): void { \YOURLS\UI\Enqueue::registerStyle($handle, $src, $deps, $ver); }
}
if (!function_exists('yourls_ui_register_script')) {
    function yourls_ui_register_script(string $handle, string $src, array $deps = [], ?string $ver = null): void { \YOURLS\UI\Enqueue::registerScript($handle, $src, $deps, $ver); }
}
if (!function_exists('yourls_ui_localize_script')) {
    function yourls_ui_localize_script(string $handle, string $object, array $data): void { \YOURLS\UI\Enqueue::localize($handle, $object, $data); }
}
if (!function_exists('yourls_ui_print_styles')) {
    function yourls_ui_print_styles(string $position = 'head'): void { \YOURLS\UI\Enqueue::printStyles($position); }
}
if (!function_exists('yourls_ui_print_scripts')) {
    function yourls_ui_print_scripts(string $position = 'footer'): void { \YOURLS\UI\Enqueue::printScripts($position); }
}

if (!function_exists('yourls_ui_view')) {
    /**
     * Render a Blade view, returning the resulting HTML.
     *
     * @param string               $view   dotted view name, e.g. "admin.dashboard"
     * @param array<string, mixed> $data   variables passed to the view
     */
    function yourls_ui_view(string $view, array $data = []): string
    {
        return \YOURLS\UI\BladeFactory::instance()->render($view, $data);
    }
}

if (!function_exists('yourls_ui_view_echo')) {
    function yourls_ui_view_echo(string $view, array $data = []): void
    {
        echo yourls_ui_view($view, $data);
    }
}

if (!function_exists('yourls_ui_is_enabled')) {
    /**
     * Return true if the new Blade-based UI is active for the current request.
     *
     * Disabled if YOURLS_UI_DISABLE is defined and truthy.
     */
    function yourls_ui_is_enabled(): bool
    {
        if (defined('YOURLS_UI_DISABLE') && YOURLS_UI_DISABLE) {
            return false;
        }
        return \YOURLS\UI\BladeFactory::isAvailable();
    }
}
