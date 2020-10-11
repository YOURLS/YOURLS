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

require_once dirname( __FILE__ ) . '/includes/utils.php';
require_once dirname( __FILE__ ) . '/includes/install.php';

// Include relevant config file
define('YOURLS_CONFIGFILE', yut_find_config());
require_once YOURLS_CONFIGFILE;

// Bootstrap YOURLS
require_once YOURLS_ABSPATH . '/includes/vendor/autoload.php';
define('YOURLS_TESTDATA_DIR', dirname( __FILE__ ) . '/data');
define('YOURLS_LANG_DIR', YOURLS_TESTDATA_DIR.'/pomo');
define('YOURLS_PLUGINDIR', YOURLS_TESTDATA_DIR.'/plugins');
define('YOURLS_PAGEDIR', YOURLS_TESTDATA_DIR.'/pages');
$config = new \YOURLS\Config\Config(YOURLS_CONFIGFILE);
$config->define_core_constants();

// Define YOURLS actions upon new instance
$init = new \YOURLS\Config\InitDefaults;
$init->check_maintenance_mode        = false;
$init->fix_request_uri               = false;
$init->redirect_ssl                  = false;
$init->redirect_to_install           = false;
$init->check_if_upgrade_needed       = false;
$init->load_plugins                  = false; // do not attempt to load (no DB yet to store data), but do send the 'plugins_loaded' action (some code depend on it)
$init->get_all_options               = false;
$init->check_new_version             = false;
$init->include_install_upgrade_funcs = true;
new \YOURLS\Config\Init($init);

// All set -- install
yut_install_yourls();

// All set -- instantiate the rest
yourls_get_all_options();
yourls_load_plugins();

/**
 * Compatibility with PHPUnit 6+
 */
if ( class_exists( 'PHPUnit\Runner\Version' ) ) {
	require_once dirname( __FILE__ ) . '/includes/phpunit6-compat.php';
}

// At this point, tests will start
echo "YOURLS installed, starting PHPUnit\n\n";
