<?php

/**
 * Boot YOURLS the way the test suite needs it.
 *
 * Used by tests/bootstrap.php (which installs the DB and runs unit tests) and by
 * tests/data/scripts/run-scenario.php (which runs tests in a NEW process, to allow testing
 * specific scenarios with constants).
 */

require_once __DIR__ . '/install.php';

/**
 * Load the test config file and boot YOURLS core
 *
 * Bootstrap steps that need a web context, or a YOURLS that's already installed, are skipped.
 * Callers can turn any other step on or off with $init_overrides.
 *
 * @param array $init_overrides  Properties of \YOURLS\Config\InitDefaults to override, as $name => $bool
 * @return string                The config file that was loaded
 */
function yut_boot_yourls( $init_overrides = array() ) {
    // Globalize YOURLS variables: this is a function, and PHPUnit loads tests/bootstrap.php
    // inside one too. See https://github.com/sebastianbergmann/phpunit/issues/325
    // This has to be done before including any file
    global $yourls_user_passwords, $yourls_reserved_URL,          // main object & config file
           $yourls_filters, $yourls_actions,                      // used by plugin API
           $yourls_locale, $yourls_l10n, $yourls_locale_formats,  // used by L10N API
           $yourls_allowedentitynames, $yourls_allowedprotocols;  // used by KSES

    // Include relevant config file
    if( !defined( 'YOURLS_CONFIGFILE' ) ) {
        define( 'YOURLS_CONFIGFILE', yut_find_config() );
    }
    require_once YOURLS_CONFIGFILE;

    // Bootstrap YOURLS, with test data instead of the user directory
    require_once YOURLS_ABSPATH . '/includes/vendor/autoload.php';
    define( 'YOURLS_TESTDATA_DIR', dirname( __DIR__ ) . '/data' );
    define( 'YOURLS_LANG_DIR', YOURLS_TESTDATA_DIR . '/pomo' );
    define( 'YOURLS_PLUGINDIR', YOURLS_TESTDATA_DIR . '/plugins' );
    define( 'YOURLS_PAGEDIR', YOURLS_TESTDATA_DIR . '/pages' );
    $config = new \YOURLS\Config\Config( YOURLS_CONFIGFILE );
    $config->define_core_constants();

    // Define YOURLS actions upon new instance
    $init = new \YOURLS\Config\InitDefaults;
    $init->check_maintenance_mode  = false;
    $init->fix_request_uri         = false;
    $init->redirect_ssl            = false;
    $init->check_new_version       = false;
    $init->redirect_to_install     = false;
    $init->check_if_upgrade_needed = false;
    // Do not attempt to load (no DB yet to store data), but do send the 'plugins_loaded' action (some code depend on it)
    $init->load_plugins            = false;

    foreach( $init_overrides as $step => $value ) {
        $init->$step = $value;
    }

    new \YOURLS\Config\Init( $init );

    return YOURLS_CONFIGFILE;
}
