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
