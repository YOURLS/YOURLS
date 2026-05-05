<?php
/**
 * Shared view composers for YOURLS UI.
 *
 * Receives a $blade variable from BladeFactory::registerComposers().
 * Composers run before each matching view renders and inject globals
 * that virtually every layout/component needs.
 */

/** @var \Jenssegers\Blade\Blade $blade */

$blade->composer('*', function ($view): void {
    $view->with([
        'yourls_ctx'     => \YOURLS\UI\ContextRegistry::get(),
        'yourls_version' => defined('YOURLS_VERSION') ? (string) YOURLS_VERSION : '0',
        'yourls_locale'  => function_exists('yourls_get_locale') ? yourls_get_locale() : 'en_US',
        'yourls_theme'   => \YOURLS\UI\Theme::default(),
    ]);
});
