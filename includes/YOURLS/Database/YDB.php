<?php

/**
 * Aura SQL wrapper for YOURLS that creates the allmighty YDB object.
 *
 * A fine example of a "class that knows too much" (see https://en.wikipedia.org/wiki/God_object)
 *
 * Note to plugin authors: you most likely SHOULD NOT use directly methods and properties of this class. Use instead
 * function wrappers (eg don't use $ydb->option, or $ydb->set_option(), use yourls_*_options() functions instead).
 *
 * @since 1.7.3
 */

namespace YOURLS\Database;

use Aura\Sql\ExtendedPdo;
use Aura\Sql\Profiler;


class YDB extends ExtendedPdo {

    /**
     * Message logger
     * @tempnote 1 plugin accessing this property (ozh_yourls_sqlite)
     * @var array
     */
    protected $debug_log = array();

    /**
     * Debug mode, default false
     * @var bool
     */
    protected $debug = false;

    /**
     * the Aura\Sql\ExtendedPdo instance
     * @var Aura\Sql\ExtendedPdo
     */
    // public $ydb;

    /**
     * Page context (ie "infos", "bookmark", "plugins"...)
     * @var string
     */
    protected $context = '';

    /**
     * Information related to a short URL keyword (eg timestamp, long URL, ...)
     *
     * @tempnote 3 plugins accessing this property
     * @var array
     *
     */
    protected $infos = array();

    /**
     * Is YOURLS installed and ready to run?
     * @tempnote 1 plugin accessing this property (apc cache)
     * @var bool
     */
    protected $installed = false;

    /**
     * Number of SQL queries fetched
     * @todo Get rid of this
     * @var int
     */
    protected $num_queries = 0;

    /**
     * Options
     * @tempnote 6 plugins accessing this property although there are functions to do so
     * @var array
     */
    public $option = array();

    /**
     * Plugin admin pages informations
     * @var array
     */
    protected $plugin_pages = array();

    /**
     * Plugin informations
     * @var array
     */
    protected $plugins = array();

    /**
     * Deprecated properties since 1.7.3, unused in 3rd party plugins as far as I know
     *
     * $ydb->DB_driver
     * $ydb->captured_errors
     * $ydb->dbh
     * $ydb->result
     * $ydb->rows_affected
     * $ydb->show_errors
     */

    /**
     * Class constructor
     *
     * Don't forget to end with a call to the parent constructor
     *
     * @since 1.7.3
     * @param string $dsn        The data source name
     * @param string $user       The username
     * @param string $pass       The password
     * @param array $options     Driver-specific options
     * @param array $attributes  Attributes to set after a connection
     */
    public function __construct($dsn, $user, $pass, $driver_options, $attributes) {
        parent::__construct($dsn, $user, $pass, $driver_options, $attributes);

        // The Aura\Sql\Profiler logs queries info
        $this->start_profiler();
    }

    public function start_profiler() {
        $this->profiler = new Profiler();
    }

    public function set_html_context($context) {
        $this->context = $context;
    }

    public function get_html_context() {
        return $this->context;
    }

    // Options low level functions, see \YOURLS\Database\Options

    public function set_option($name, $value) {
        $this->option[$name] = $value;
    }

    public function has_option($name) {
        return array_key_exists($name, $this->option);
    }

    public function get_option($name) {
        return $this->option[$name];
    }

    public function delete_option($name) {
        unset($this->option[$name]);
    }

    /**
     * Set YOURLS installed state
     *
     * @since  1.7.3
     * @param  bool $bool
     * @return void
     */
    public function set_installed($bool) {
        $this->installed = $bool;
    }

    /**
     * Get YOURLS installed state
     *
     * @since  1.7.3
     * @return bool
     */
    public function get_installed() {
        return $this->installed;
    }

    /**
     * Return standardized DB version
     *
     * The regex removes everything that's not a number at the start of the string, or remove anything that's not a number and what
     * follows after that.
     *   'omgmysql-5.5-ubuntu-4.20' => '5.5'
     *   'mysql5.5-ubuntu-4.20'     => '5.5'
     *   '5.5-ubuntu-4.20'          => '5.5'
     *   '5.5-beta2'                => '5.5'
     *   '5.5'                      => '5.5'
     *
     * @since  1.7.3
     * @return string
     */
    public function mysql_version() {
        $version = $this->pdo->getAttribute(\PDO::ATTR_SERVER_VERSION);
        return preg_replace('/(^[^0-9]*)|[^0-9.].*/', '', $version);
    }

    public function debug_log($msg) {
        $this->debug_log[] = $msg;
    }

    public function get_debug_log() {
        return $this->debug_log;
    }

    public function is_alive() {
        throw new \Exception\is_alive();
    }

    public function is_dead() {
        throw new \Exception\is_dead();
    }

    //** Compatibility with legacy ezSQL functions **

    public function escape() {
        throw new \Exception\escape();
    }

    public function get_col() {
        //->fetchAll(PDO::FETCH_COLUMN) -> array
        throw new \Exception\get_col();
    }

    public function get_results($query) {
        $stm = parent::query($query);
        return($stm->fetchAll(\PDO::FETCH_OBJ));
    }

    public function get_row() {
        throw new \Exception\get_row();
    }

    public function get_var() {
        throw new \Exception\get_var();
    }

    public function query($query) {
        throw new \Exception\query();
    }

}
