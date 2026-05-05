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
            // Use jenssegers/blade's Container subclass: it adds the
            // terminating() method that illuminate/view 9.x calls during
            // ViewServiceProvider::register() (Foundation\Application has it,
            // Illuminate\Container\Container does not).
            $container = new \Jenssegers\Blade\Container();

            // ComponentTagCompiler resolves the view Factory via the
            // global Container singleton, so promote our container to it
            // BEFORE constructing Blade (which calls ViewServiceProvider).
            \Illuminate\Container\Container::setInstance($container);

            self::$blade = new Blade($viewPaths, $cachePath, $container);

            // Anonymous <x-component> tags resolve Factory by interface;
            // jenssegers/blade only binds the 'view' alias, so wire the
            // contract + concrete to the same instance.
            $factory = $container->make('view');
            $container->instance(\Illuminate\Contracts\View\Factory::class, $factory);
            $container->instance(\Illuminate\View\Factory::class, $factory);

            // ComponentTagCompiler::guessClassName() does
            //   Container::getInstance()->make(Application::class)->getNamespace()
            // Outside of Laravel there is no Application; provide a stub
            // that returns an empty namespace so guessing falls through to
            // the anonymous-component path lookup.
            $container->instance(
                \Illuminate\Contracts\Foundation\Application::class,
                new class {
                    public function getNamespace(): string { return ''; }
                    public function __call($n, $a) { return null; }
                }
            );

            // Register anonymous component paths so authors can write
            // <x-atoms::button>, <x-molecules::pagination>, etc.
            $componentsRoot = dirname(__DIR__) . '/components';
            self::$blade->compiler()->anonymousComponentPath($componentsRoot . '/atoms',     'atoms');
            self::$blade->compiler()->anonymousComponentPath($componentsRoot . '/molecules', 'molecules');
            self::$blade->compiler()->anonymousComponentPath($componentsRoot . '/organisms', 'organisms');
            self::$blade->compiler()->anonymousComponentPath($componentsRoot . '/forms',     'forms');
        } catch (\Throwable $e) {
            self::$available = false;
            if (defined('YOURLS_DEBUG') && YOURLS_DEBUG) {
                error_log('[YOURLS\\UI] Blade init failed: ' . $e->getMessage());
            }
            return;
        }

        // In debug/dev mode disable the compiled-view cache so every
        // request re-compiles Blade templates — no manual cache flush needed.
        if (defined('YOURLS_DEBUG') && YOURLS_DEBUG) {
            $compiler = self::$blade->compiler();
            $ref = new \ReflectionProperty($compiler, 'shouldCache');
            $ref->setAccessible(true);
            $ref->setValue($compiler, false);
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
