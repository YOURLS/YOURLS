<?php
/**
 * Standalone bootstrap for the UI component test suite.
 *
 * Independent of the main YOURLS PHPUnit bootstrap (no DB, no config file)
 * so contributors can run the UI suite without provisioning the test
 * database.
 */

if (!defined('YOURLS_VERSION')) {
    define('YOURLS_VERSION', 'test');
}
if (!defined('YOURLS_USERDIR')) {
    define('YOURLS_USERDIR', sys_get_temp_dir() . '/yourls-ui-tests-' . posix_getpid());
    @mkdir(YOURLS_USERDIR . '/cache/views', 0775, true);
}

require_once dirname(__DIR__, 2) . '/includes/vendor/autoload.php';

if (!class_exists(\YOURLS\UI\BladeFactory::class) || !\YOURLS\UI\BladeFactory::isAvailable()) {
    fwrite(STDERR, "Blade is not available; the UI suite cannot run.\n");
    exit(1);
}
