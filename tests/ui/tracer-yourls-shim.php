<?php
/**
 * Minimal shim exposing yourls_do_action / yourls_apply_filter as
 * pass-throughs that delegate recording to the Tracer, plus identity
 * stubs for the i18n helpers used by Blade views. Loaded by the UI
 * test suite when no real YOURLS bootstrap is in scope.
 */

if (!function_exists('yourls_do_action')) {
    function yourls_do_action(string $hook, mixed ...$args): void
    {
        Tracer::recordAction($hook, $args);
    }
}
if (!function_exists('yourls_apply_filter')) {
    function yourls_apply_filter(string $hook, mixed $value, mixed ...$args): mixed
    {
        Tracer::recordFilter($hook, array_merge([$value], $args));
        return $value;
    }
}
if (!function_exists('yourls__')) {
    function yourls__(string $text, string $domain = 'default'): string
    {
        return $text;
    }
}
if (!function_exists('yourls_e')) {
    function yourls_e(string $text, string $domain = 'default'): void
    {
        echo $text;
    }
}
if (!function_exists('yourls_s')) {
    function yourls_s(string $pattern, mixed ...$args): string
    {
        return vsprintf($pattern, $args);
    }
}
if (!function_exists('yourls_se')) {
    function yourls_se(string $pattern, mixed ...$args): void
    {
        echo vsprintf($pattern, $args);
    }
}
if (!function_exists('yourls_esc_attr__')) {
    function yourls_esc_attr__(string $text, string $domain = 'default'): string
    {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }
}
if (!function_exists('yourls_esc_html__')) {
    function yourls_esc_html__(string $text, string $domain = 'default'): string
    {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }
}
