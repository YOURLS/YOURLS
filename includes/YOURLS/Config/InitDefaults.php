<?php

/**
 * YOURLS defaut actions upon instantiating
 *
 * This class defines all the default actions to be performed when instantiating YOURLS. The idea
 * is that this is easily tuneable depending on the scenario, namely when running YOURLS for
 * unit tests.
 *
 * @see \YOURLS\Config\Init
 */

namespace YOURLS\Config;

class InitDefaults {

    /**
     * Whether to include core function files
     * @var bool
     */
    public $include_core_funcs = true;

    /**
     * Whether to include auth function files
     * @var bool
     */
    public $include_auth_funcs = false;             // by default do not load (let YOURLS decide depending on yourls_is_private() value)

    /**
     * Whether to include auth function files
     * @var bool
     */
    public $include_install_upgrade_funcs = false;  // by default do not load

    /**
     * Whether to set default time zone
     * @var bool
     */
    public $default_timezone = true;

    /**
     * Whether to load default text domain
     * @var bool
     */
    public $load_default_textdomain = true;

    /**
     * Whether to check for maintenance mode and maybe die here
     * @var bool
     */
    public $check_maintenance_mode = true;

    /**
     * Whether to fix $_REQUEST for IIS
     * @var bool
     */
    public $fix_request_uri = true;

    /**
     * Whether to redirect to SSL if needed
     * @var bool
     */
    public $redirect_ssl = true;

    /**
     * Whether to include DB engine
     * @var bool
     */
    public $include_db = true;

    /**
     * Whether to include cache layer
     * @var bool
     */
    public $include_cache = true;

    /**
     * Whether to end instantiating early if YOURLS_FAST_INIT is defined and true
     * @var bool
     */
    public $return_if_fast_init = true;

    /**
     * Whether to read all options at once during starting
     * @var bool
     */
    public $get_all_options = true;

    /**
     * Whether to register shutdown action
     * @var bool
     */
    public $register_shutdown = true;

    /**
     * Whether to trigger action 'init' after core is loaded
     * @var bool
     */
    public $core_loaded = true;

    /**
     * Whether to redirect to install procedure if needed
     * @var bool
     */
    public $redirect_to_install = true;

    /**
     * Whether to redirect to upgrade procedure if needed
     * @var bool
     */
    public $check_if_upgrade_needed = true;

    /**
     * Whether to load all plugins
     * @var bool
     */
    public $load_plugins = true;

    /**
     * Whether to trigger the "plugins_loaded" action
     * @var bool
     */
    public $plugins_loaded_action = true;

    /**
     * Whether to check if a new version if available
     * @var bool
     */
    public $check_new_version = true;

    /**
     * Whether to trigger 'admin_init' if applicable
     * @var bool
     */
    public $init_admin = true;

}
