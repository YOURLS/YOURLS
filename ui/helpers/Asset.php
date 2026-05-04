<?php
declare(strict_types=1);

namespace YOURLS\UI;

/**
 * Resolves logical asset names to public URLs using ui/assets/dist/manifest.json.
 *
 * Falls back to a versioned URL based on YOURLS_VERSION when the manifest
 * is absent (e.g. before the first build).
 */
final class Asset
{
    private static ?array $manifest = null;

    public static function url(string $logical): string
    {
        $manifest = self::manifest();
        $hashed = $manifest[$logical] ?? $logical;

        // Surface a one-line debug notice when the manifest references an
        // asset that does not exist on disk -- typically a stale or
        // missing build. Only fires under YOURLS_DEBUG so production stays
        // silent.
        if (defined('YOURLS_DEBUG') && YOURLS_DEBUG) {
            $physical = dirname(__DIR__) . '/assets/dist/' . ltrim($hashed, '/');
            if (!is_file($physical) && function_exists('yourls_debug_log')) {
                yourls_debug_log("[YOURLS\\UI] Asset '$logical' resolved to '$hashed' but file is missing. Did you run `npm run build`?");
            }
        }

        $base = function_exists('yourls_site_url')
            ? rtrim((string) yourls_site_url(false), '/')
            : '';

        $version = defined('YOURLS_VERSION') ? (string) YOURLS_VERSION : '0';

        return $base . '/ui/assets/dist/' . ltrim($hashed, '/') . '?v=' . rawurlencode($version);
    }

    public static function path(string $logical): string
    {
        $manifest = self::manifest();
        $hashed = $manifest[$logical] ?? $logical;
        return dirname(__DIR__) . '/assets/dist/' . ltrim($hashed, '/');
    }

    private static function manifest(): array
    {
        if (self::$manifest !== null) {
            return self::$manifest;
        }

        $manifestPath = dirname(__DIR__) . '/assets/dist/manifest.json';
        if (is_file($manifestPath)) {
            $decoded = json_decode((string) file_get_contents($manifestPath), true);
            if (is_array($decoded)) {
                self::$manifest = $decoded;
                return self::$manifest;
            }
        }

        self::$manifest = [];
        return self::$manifest;
    }
}
