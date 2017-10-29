<?php
/* Bootstrap YOURLS
 *
 * This file initialize everything needed for YOURLS
 * If you need to bootstrap YOURLS (ie access its functions and features) simply include this file.
 */

require __DIR__ . '/vendor/autoload.php';

// Set up YOURLS config

$config = new \YOURLS\Config\Config;
/* The following require has to be at global level so the variables inside config.php, including user defined if any,
 * are registered in the global scope. If this require is moved in \YOURLS\Config\Config, $yourls_user_passwords for
 * instance isn't registered.
 */
if (!defined('YOURLS_CONFIGFILE')) {
    define('YOURLS_CONFIGFILE', $config->find_config());
}
require_once YOURLS_CONFIGFILE;
$config->define_core_constants();

// Initialize YOURLS with default behaviors

$init_defaults = new \YOURLS\Config\InitDefaults;
new \YOURLS\Config\Init($init_defaults);
