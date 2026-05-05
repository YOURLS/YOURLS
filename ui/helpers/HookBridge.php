<?php
declare(strict_types=1);

namespace YOURLS\UI;

/**
 * Thin, grep-able wrappers around yourls_do_action / yourls_apply_filter.
 *
 * Used inside Blade views via the @yourlsAction / @yourlsFilter directives,
 * and inside facade functions to make every preserved hook call explicit.
 */
final class HookBridge
{
    public static function action(string $hook, mixed ...$args): void
    {
        if (function_exists('yourls_do_action')) {
            yourls_do_action($hook, ...$args);
        }
    }

    public static function filter(string $hook, mixed $value, mixed ...$args): mixed
    {
        if (function_exists('yourls_apply_filter')) {
            return yourls_apply_filter($hook, $value, ...$args);
        }
        return $value;
    }
}
