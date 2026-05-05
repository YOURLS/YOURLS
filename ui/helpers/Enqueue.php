<?php
declare(strict_types=1);

namespace YOURLS\UI;

/**
 * Minimal enqueue system inspired by wp_enqueue_*.
 *
 * Stores style/script registrations with dependencies. Resolves topology
 * via iterative DFS at print time. All output is escaped using yourls_esc_*
 * when those helpers are available.
 */
final class Enqueue
{
    /** @var array<string, array{src: string, deps: string[], ver: ?string, media: string, enqueued: bool}> */
    private static array $styles = [];

    /** @var array<string, array{src: string, deps: string[], ver: ?string, in_footer: bool, enqueued: bool, data: array<string,array<string,mixed>>}> */
    private static array $scripts = [];

    public static function registerStyle(string $handle, string $src, array $deps = [], ?string $ver = null, string $media = 'all'): void
    {
        self::$styles[$handle] = [
            'src' => $src, 'deps' => $deps, 'ver' => $ver, 'media' => $media,
            'enqueued' => self::$styles[$handle]['enqueued'] ?? false,
        ];
    }

    public static function registerScript(string $handle, string $src, array $deps = [], ?string $ver = null, bool $in_footer = true): void
    {
        self::$scripts[$handle] = [
            'src' => $src, 'deps' => $deps, 'ver' => $ver, 'in_footer' => $in_footer,
            'enqueued' => self::$scripts[$handle]['enqueued'] ?? false,
            'data' => self::$scripts[$handle]['data'] ?? [],
        ];
    }

    public static function style(string $handle, ?string $src = null, array $deps = [], ?string $ver = null, string $media = 'all'): void
    {
        if ($src !== null || !isset(self::$styles[$handle])) {
            self::registerStyle($handle, (string) $src, $deps, $ver, $media);
        }
        self::$styles[$handle]['enqueued'] = true;
    }

    public static function script(string $handle, ?string $src = null, array $deps = [], ?string $ver = null, bool $in_footer = true): void
    {
        if ($src !== null || !isset(self::$scripts[$handle])) {
            self::registerScript($handle, (string) $src, $deps, $ver, $in_footer);
        }
        self::$scripts[$handle]['enqueued'] = true;
    }

    public static function dequeueStyle(string $handle): void
    {
        if (isset(self::$styles[$handle])) self::$styles[$handle]['enqueued'] = false;
    }

    public static function dequeueScript(string $handle): void
    {
        if (isset(self::$scripts[$handle])) self::$scripts[$handle]['enqueued'] = false;
    }

    public static function localize(string $handle, string $object, array $data): void
    {
        if (!isset(self::$scripts[$handle])) return;
        self::$scripts[$handle]['data'][$object] = $data;
    }

    public static function printStyles(string $position = 'head'): void
    {
        $handles = self::resolve(self::$styles);
        foreach ($handles as $h) {
            $item = self::$styles[$h];
            if (!$item['enqueued']) continue;
            $href = self::escUrl(self::stamp($item['src'], $item['ver']));
            $media = self::escAttr($item['media']);
            echo '<link rel="stylesheet" id="' . self::escAttr($h) . '-css" href="' . $href . '" media="' . $media . '">' . "\n";
        }
    }

    public static function printScripts(string $position = 'footer'): void
    {
        $handles = self::resolve(self::$scripts);
        foreach ($handles as $h) {
            $item = self::$scripts[$h];
            if (!$item['enqueued']) continue;
            $isFooter = (bool) $item['in_footer'];
            if ($position === 'head' && $isFooter) continue;
            if ($position === 'footer' && !$isFooter) continue;

            foreach ($item['data'] as $obj => $data) {
                echo '<script id="' . self::escAttr($h) . '-' . self::escAttr($obj) . '-js-extra">' .
                    'window.' . self::escJsIdent($obj) . ' = ' . self::jsonEncode($data) . ';</script>' . "\n";
            }
            $src = self::escUrl(self::stamp($item['src'], $item['ver']));
            echo '<script id="' . self::escAttr($h) . '-js" src="' . $src . '" defer></script>' . "\n";
        }
    }

    /**
     * Iterative DFS topological sort with cycle detection.
     *
     * @template T of array
     * @param array<string, T> $items
     * @return string[]
     */
    private static function resolve(array $items): array
    {
        $sorted = [];
        $visited = [];
        $temp = [];

        $visit = function (string $h) use (&$visit, &$sorted, &$visited, &$temp, $items): void {
            if (!isset($items[$h])) return;
            if (isset($visited[$h])) return;
            if (isset($temp[$h])) {
                if (defined('YOURLS_DEBUG') && YOURLS_DEBUG) {
                    error_log('[YOURLS\\UI\\Enqueue] cycle detected at ' . $h);
                }
                return;
            }
            $temp[$h] = true;
            foreach ($items[$h]['deps'] as $dep) {
                $visit($dep);
            }
            unset($temp[$h]);
            $visited[$h] = true;
            $sorted[] = $h;
        };

        foreach (array_keys($items) as $h) {
            $visit($h);
        }
        return $sorted;
    }

    private static function stamp(string $src, ?string $ver): string
    {
        if ($ver === null) {
            $ver = defined('YOURLS_VERSION') ? (string) YOURLS_VERSION : '0';
        }
        if ($ver === '') return $src;
        return $src . (str_contains($src, '?') ? '&' : '?') . 'v=' . rawurlencode($ver);
    }

    private static function escAttr(string $s): string
    {
        return function_exists('yourls_esc_attr') ? yourls_esc_attr($s) : htmlspecialchars($s, ENT_QUOTES);
    }

    private static function escUrl(string $s): string
    {
        return function_exists('yourls_esc_url') ? yourls_esc_url($s) : htmlspecialchars($s, ENT_QUOTES);
    }

    private static function escJsIdent(string $s): string
    {
        return preg_replace('/[^A-Za-z0-9_$]/', '_', $s) ?? '_';
    }

    private static function jsonEncode(mixed $data): string
    {
        return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES);
    }
}
