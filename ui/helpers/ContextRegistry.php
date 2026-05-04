<?php
declare(strict_types=1);

namespace YOURLS\UI;

/**
 * Tracks the current "html context" (e.g. index, infos, plugins, login, install).
 *
 * Mirrors yourls_set_html_context / yourls_get_html_context so that views and
 * components can branch on the active context without re-reading globals.
 */
final class ContextRegistry
{
    private static string $context = '';

    public static function set(string $context): void
    {
        self::$context = $context;
        if (function_exists('yourls_set_html_context')) {
            yourls_set_html_context($context);
        }
    }

    public static function get(): string
    {
        if (self::$context !== '') {
            return self::$context;
        }
        if (function_exists('yourls_get_html_context')) {
            self::$context = (string) yourls_get_html_context();
        }
        return self::$context;
    }
}
