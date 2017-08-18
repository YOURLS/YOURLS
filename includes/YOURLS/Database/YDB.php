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
    public $debug_log = array();

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
     * Aura Profiler
     * @var Profiler
     */
    // protected $profiler;

    // public $dsn;

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

    public function start_profiler() {
        $this->profiler = new Profiler();
    }

    public function set_html_context($context) {
        $this->context = $context;
    }

    public function get_html_context() {
        return $this->context;
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
     * Set option value
     *
     * @since  1.7.3
     * @param  string $name
     * @param  mixed  $value
     * @return void
     */
    public function zset_option($name, $value) {
        $this->option[$name] = $value;
    }

    /**
     * Get option value
     *
     * @since  1.7.3
     * @param  string $name
     * @return mixed
     */
    public function zget_option($name) {
        if(array_key_exists($name, $this->option)) {
            return $this->option[$name];
        }

        return false;
    }

    public function mysql_version() {
        return $this->ydb->getAttribute(PDO::ATTR_SERVER_VERSION);
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
