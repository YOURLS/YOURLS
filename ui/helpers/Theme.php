<?php
declare(strict_types=1);

namespace YOURLS\UI;

/**
 * Theme resolution: light/dark with persistence in localStorage on the client.
 *
 * Server-side this class only emits the inline blocking script that sets
 * data-theme before paint to avoid FOUC. Persistence is fully client-side.
 */
final class Theme
{
    public const LIGHT = 'light';
    public const DARK  = 'dark';

    /** Inline script printed in <head> before any stylesheet to prevent FOUC. */
    public static function preloadScript(): string
    {
        return <<<'JS'
<script>(function(){try{var s=localStorage.getItem('yourls.theme');var m=window.matchMedia&&window.matchMedia('(prefers-color-scheme: dark)').matches;var t=s||(m?'dark':'light');document.documentElement.setAttribute('data-theme',t);}catch(e){}})();</script>
JS;
    }

    /**
     * Default theme name when the client has no preference.
     */
    public static function default(): string
    {
        return self::LIGHT;
    }
}
