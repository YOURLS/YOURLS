<?php
/**
 * Minimal shim exposing yourls_do_action / yourls_apply_filter as
 * pass-throughs that delegate recording to the Tracer. Loaded by the
 * UI test suite when no real YOURLS bootstrap is in scope.
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
