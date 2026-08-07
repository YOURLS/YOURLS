<?php
/**
 * YOURLS Unit Test. No, I don't know what I'm doing.
 */

// Globalize some YOURLS variables because PHPUnit loads this inside a function
// See https://github.com/sebastianbergmann/phpunit/issues/325
// This has to be done before including any file
global $yourls_user_passwords, $yourls_reserved_URL,          // main object & config file
       $yourls_filters, $yourls_actions,                      // used by plugin API
       $yourls_locale, $yourls_l10n, $yourls_locale_formats,  // used by L10N API
       $yourls_allowedentitynames, $yourls_allowedprotocols;  // used by KSES

require_once __DIR__ . '/includes/utils.php';
require_once __DIR__ . '/includes/install.php';
require_once __DIR__ . '/includes/boot.php';
require_once __DIR__ . '/includes/new-process.php';

// Load config & bootstrap YOURLS. There's no database yet, so don't read from it: options and
// plugins are loaded further below, once installed.
echo "Using config file: " . yut_boot_yourls( array( 'get_all_options' => false ) ) . "\n";

// Mark as 'installing' to avoid flood checks
yourls_add_filter( 'is_installing', 'yourls_return_true' );

// All set -- install
yut_install_yourls();

// Unmark as 'installing' to allow normal execution of code
yourls_remove_filter( 'is_installing', 'yourls_return_true' );

// All set -- instantiate the rest
yourls_get_all_options();
yourls_load_plugins();

// At this point, tests will start

// Simplify yourls_die() when running unit tests
yourls_add_action( 'pre_yourls_die', function($params) {
    printf("\n\nCalling yourls_die(). %s : %s (%s)\n\n", $params[1], $params[0], $params[2]);
    echo "Last 10 Backtrace:\n";
    $trace = debug_backtrace();
    foreach( array_slice($trace, 0, 10) as $t ) {
        printf("** %s:%d %s() with args\n%s\n", $t['file'], $t['line'], $t['function'], var_export($t['args'], true));
    }

    die(1);
} );

echo "YOURLS installed, starting PHPUnit\n\n";

require_once __DIR__ . "/tests/auth/AbstractLoginTestCase.php";
require_once __DIR__ . "/tests/auth/LoginAssertionTrait.php";
