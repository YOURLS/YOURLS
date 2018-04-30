<?php

/**
 * Define the YOURLS config
 */

namespace YOURLS\Config;

use YOURLS\Exceptions\ConfigException;

class Config {

    /**
     * @param string
     */
    protected $root;

    /**
     * @param mixed
     */
    protected $config;

    /**
     * @since  1.7.3
     * @param  mixed $config   Optional user defined config path
     */
    public function __construct($config = false) {
        $this->set_root( $this->fix_win32_path( dirname( dirname( __DIR__ ) ) ) );
        $this->set_config($config);
    }

    /**
     * Convert antislashes to slashes
     *
     * @since  1.7.3
     * @param  string  $path
     * @return string  path with \ converted to /
     */
    public function fix_win32_path($path) {
        return str_replace('\\', '/', $path);
    }

    /**
     * @since  1.7.3
     * @param  string  path to config file
     * @return void
     */
    public function set_config($config) {
        $this->config = $config;
    }

    /**
     * @since  1.7.3
     * @param  string  path to YOURLS root directory
     * @return void
     */
    public function set_root($root) {
        $this->root = $root;
    }

    /**
     * Find config.php, either user defined or from standard location
     *
     * @since  1.7.3
     * @return string         path to found config file
     * @throws ConfigException
     */
    public function find_config() {

        $config = $this->fix_win32_path($this->config);

        if (!empty($config) && is_readable($config)) {
            return $config;
        }

        if (!empty($config) && !is_readable($config)) {
            throw new ConfigException("User defined config not found at '$config'");
        }

        // config.php in /user/
        if (file_exists($this->root . '/user/config.php')) {
            return $this->root . '/user/config.php';
        }

        // config.php in /includes/
        if (file_exists($this->root . '/includes/config.php')) {
            return $this->root . '/includes/config.php';
        }

        // config.php not found :(

        throw new ConfigException('Cannot find config.php. Please read the readme.html to learn how to install YOURLS');
    }

    /**
     * Define core constants that have not been user defined in config.php
     *
     * @since  1.7.3
     * @return void
     * @throws ConfigException
     */
    public function define_core_constants() {
        // Check minimal config job has been properly done
        $must_haves = array('YOURLS_DB_USER', 'YOURLS_DB_PASS', 'YOURLS_DB_NAME', 'YOURLS_DB_HOST', 'YOURLS_DB_PREFIX', 'YOURLS_SITE');
        foreach($must_haves as $must_have) {
            if (!defined($must_have)) {
                throw new ConfigException('Config is incomplete (missing at least '.$must_have.') Check config-sample.php and edit your config accordingly');
            }
        }

        /**
         * The following has an awful CRAP index and it would be much shorter reduced to something like
         * defining an array of ('YOURLS_SOMETHING' => 'default value') and then a simple loop over the
         * array, checking if $current is defined as a constant and otherwise define said constant with
         * its default value. I did not wrote it that way because that would make it difficult for code
         * parsers to identify which constants are defined and where. So, here it is, that long list of
         * if (!defined) define(). Ho and by the way, such beautiful comment, much right aligned, wow !
         */

        // physical path of YOURLS root
        if (!defined( 'YOURLS_ABSPATH' ))
            define('YOURLS_ABSPATH', $this->root);

        // physical path of includes directory
        if (!defined( 'YOURLS_INC' ))
            define('YOURLS_INC', YOURLS_ABSPATH.'/includes');

        // physical path of user directory
        if (!defined( 'YOURLS_USERDIR' ))
            define( 'YOURLS_USERDIR', YOURLS_ABSPATH.'/user' );

        // URL of user directory
        if (!defined( 'YOURLS_USERURL' ))
            define( 'YOURLS_USERURL', YOURLS_SITE.'/user' );

        // physical path of asset directory
        if( !defined( 'YOURLS_ASSETDIR' ) )
            define( 'YOURLS_ASSETDIR', YOURLS_ABSPATH.'/assets' );

        // URL of asset directory
        if( !defined( 'YOURLS_ASSETURL' ) )
            define( 'YOURLS_ASSETURL', YOURLS_SITE.'/assets' );

        // physical path of translations directory
        if (!defined( 'YOURLS_LANG_DIR' ))
            define( 'YOURLS_LANG_DIR', YOURLS_USERDIR.'/languages' );

        // physical path of plugins directory
        if (!defined( 'YOURLS_PLUGINDIR' ))
            define( 'YOURLS_PLUGINDIR', YOURLS_USERDIR.'/plugins' );

        // URL of plugins directory
        if (!defined( 'YOURLS_PLUGINURL' ))
            define( 'YOURLS_PLUGINURL', YOURLS_USERURL.'/plugins' );

        // physical path of themes directory
        if( !defined( 'YOURLS_THEMEDIR' ) )
            define( 'YOURLS_THEMEDIR', YOURLS_USERDIR.'/themes' );

        // URL of themes directory
        if( !defined( 'YOURLS_THEMEURL' ) )
            define( 'YOURLS_THEMEURL', YOURLS_USERURL.'/themes' );

        // physical path of pages directory
        if (!defined( 'YOURLS_PAGEDIR' ))
            define('YOURLS_PAGEDIR', YOURLS_ABSPATH.'/pages' );

        // table to store URLs
        if (!defined( 'YOURLS_DB_TABLE_URL' ))
            define( 'YOURLS_DB_TABLE_URL', YOURLS_DB_PREFIX.'url' );

        // table to store options
        if (!defined( 'YOURLS_DB_TABLE_OPTIONS' ))
            define( 'YOURLS_DB_TABLE_OPTIONS', YOURLS_DB_PREFIX.'options' );

        // table to store hits, for stats
        if (!defined( 'YOURLS_DB_TABLE_LOG' ))
            define( 'YOURLS_DB_TABLE_LOG', YOURLS_DB_PREFIX.'log' );

        // minimum delay in sec before a same IP can add another URL. Note: logged in users are not throttled down.
        if (!defined( 'YOURLS_FLOOD_DELAY_SECONDS' ))
            define( 'YOURLS_FLOOD_DELAY_SECONDS', 15 );

        // comma separated list of IPs that can bypass flood check.
        if (!defined( 'YOURLS_FLOOD_IP_WHITELIST' ))
            define( 'YOURLS_FLOOD_IP_WHITELIST', '' );

        // life span of an auth cookie in seconds (60*60*24*7 = 7 days)
        if (!defined( 'YOURLS_COOKIE_LIFE' ))
            define( 'YOURLS_COOKIE_LIFE', 60*60*24*7 );

        // life span of a nonce in seconds
        if (!defined( 'YOURLS_NONCE_LIFE' ))
            define( 'YOURLS_NONCE_LIFE', 43200 ); // 3600 * 12

        // if set to true, disable stat logging (no use for it, too busy servers, ...)
        if (!defined( 'YOURLS_NOSTATS' ))
            define( 'YOURLS_NOSTATS', false );

        // if set to true, force https:// in the admin area
        if (!defined( 'YOURLS_ADMIN_SSL' ))
            define( 'YOURLS_ADMIN_SSL', false );

        // if set to true, verbose debug infos. Will break things. Don't enable.
        if (!defined( 'YOURLS_DEBUG' ))
            define( 'YOURLS_DEBUG', false );

        // Error reporting
        if (defined( 'YOURLS_DEBUG' ) && YOURLS_DEBUG == true ) {
            error_reporting( -1 );
        } else {
            error_reporting( E_ERROR | E_PARSE );
        }
    }

}
