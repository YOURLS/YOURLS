<?php
declare(strict_types=1);

namespace YOURLS\UI;

use Jenssegers\Blade\Blade;

/**
 * Lazy singleton wrapper around jenssegers/blade.
 *
 * Wires view paths, cache directory, custom directives, and view composers.
 * Returns null/false gracefully if Blade is not installed so the legacy
 * functions-html.php can keep rendering during migration.
 */
final class BladeFactory
{
    private static ?Blade $blade = null;
    private static bool $bootstrapped = false;
    private static bool $available = false;

    public static function isAvailable(): bool
    {
        if (!self::$bootstrapped) {
            self::bootstrap();
        }
        return self::$available;
    }

    public static function instance(): Blade
    {
        if (!self::$bootstrapped) {
            self::bootstrap();
        }
        if (self::$blade === null) {
            throw new \RuntimeException('Blade is not available; call BladeFactory::isAvailable() first.');
        }
        return self::$blade;
    }

    private static function bootstrap(): void
    {
        self::$bootstrapped = true;

        if (!class_exists(Blade::class)) {
            self::$available = false;
            return;
        }

        $uiRoot = dirname(__DIR__);
        $viewPaths = [
            $uiRoot . '/views',
            $uiRoot . '/components',
            $uiRoot . '/layouts',
            $uiRoot . '/partials',
        ];

        $cachePath = self::resolveCachePath();

        try {
            self::$blade = new Blade($viewPaths, $cachePath);
        } catch (\Throwable $e) {
            self::$available = false;
            if (defined('YOURLS_DEBUG') && YOURLS_DEBUG) {
                error_log('[YOURLS\\UI] Blade init failed: ' . $e->getMessage());
            }
            return;
        }

        self::registerDirectives();
        self::registerComposers();

        self::$available = true;
    }

    private static function resolveCachePath(): string
    {
        $userDir = defined('YOURLS_USERDIR') ? YOURLS_USERDIR : null;

        $candidate = $userDir ? $userDir . '/cache/views' : null;

        if ($candidate !== null) {
            if (!is_dir($candidate)) {
                @mkdir($candidate, 0775, true);
            }
            if (is_dir($candidate) && is_writable($candidate)) {
                self::ensureCacheGuard(dirname($candidate));
                return $candidate;
            }
        }

        $fallback = sys_get_temp_dir() . '/yourls-views';
        if (!is_dir($fallback)) {
            @mkdir($fallback, 0775, true);
        }

        if (function_exists('yourls_add_notice') && $candidate !== null) {
            yourls_add_notice(
                sprintf('UI cache directory %s is not writable; falling back to %s.', $candidate, $fallback),
                'warning'
            );
        }

        return $fallback;
    }

    private static function ensureCacheGuard(string $cacheRoot): void
    {
        $htaccess = $cacheRoot . '/.htaccess';
        if (is_file($htaccess)) {
            return;
        }
        $body = "# Compiled Blade views must never be served directly.\n"
              . "<IfModule !mod_authz_core.c>\n    Order deny,allow\n    Deny from all\n</IfModule>\n"
              . "<IfModule mod_authz_core.c>\n    Require all denied\n</IfModule>\n";
        @file_put_contents($htaccess, $body);
    }

    private static function registerDirectives(): void
    {
        $directives = dirname(__DIR__) . '/composables-blade/directives.php';
        if (is_file($directives)) {
            $blade = self::$blade;
            require $directives;
        }
    }

    private static function registerComposers(): void
    {
        $composers = dirname(__DIR__) . '/composables-blade/composers.php';
        if (is_file($composers)) {
            $blade = self::$blade;
            require $composers;
        }
    }
}
