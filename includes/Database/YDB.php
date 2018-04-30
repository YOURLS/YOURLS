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

use YOURLS\Admin\Logger;
use Aura\Sql\ExtendedPdo;
use PDO;

class YDB extends ExtendedPdo {

    /**
     * Debug mode, default false
     * @var bool
     */
    protected $debug = false;

    /**
     * Page context (ie "infos", "bookmark", "plugins"...)
     * @var string
     */
    protected $context = '';

    /**
     * Information related to a short URL keyword (eg timestamp, long URL, ...)
     *
     * @var array
     *
     */
    protected $infos = array();

    /**
     * Is YOURLS installed and ready to run?
     * @var bool
     */
    protected $installed = false;

    /**
     * Options
     * @var array
     */
    protected $option = array();

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
     * Are we emulating prepare statements ?
     * @var bool
     */
    protected $is_emulate_prepare;

    /**
     * @since 1.7.3
     * @param string $dsn         The data source name
     * @param string $user        The username
     * @param string $pass        The password
     * @param array  $options     Driver-specific options
     * @param array  $attributes  Attributes to set after a connection
     */
    public function __construct($dsn, $user, $pass, $options, $attributes) {
        parent::__construct($dsn, $user, $pass, $options, $attributes);
    }

    /**
     * Init everything needed
     *
     * Everything we need to set up is done here in init(), not in the constructor, so even
     * when the connection fails (eg config error or DB dead), the constructor has worked
     * and we have a $ydb object properly instantiated (and for instance yourls_die() can
     * correctly die, even if using $ydb methods)
     *
     * @since  1.7.3
     * @return void
     */
    public function init() {
        $this->connect_to_DB();

        $this->set_emulate_state();

        $this->start_profiler();
    }

    /**
     * Check if we emulate prepare statements, and set bool flag accordingly
     *
     * Check if current driver can PDO::getAttribute(PDO::ATTR_EMULATE_PREPARES)
     * Some combinations of PHP/MySQL don't support this function. See
     * https://travis-ci.org/YOURLS/YOURLS/jobs/271423782#L481
     *
     * @since  1.7.3
     * @return void
     */
    public function set_emulate_state() {
        try {
            $this->is_emulate_prepare = $this->getAttribute(PDO::ATTR_EMULATE_PREPARES);
        } catch (\PDOException $e) {
            $this->is_emulate_prepare = false;
        }
    }

    /**
     * Get emulate status
     *
     * @since  1.7.3
     * @return bool
     */
    public function get_emulate_state() {
        return $this->is_emulate_prepare;
    }

    /**
     * Initiate real connection to DB server
     *
     * This is to check that the server is running and/or the config is OK
     *
     * @since  1.7.3
     * @return void
     * @throws \PDOException
     */
    public function connect_to_DB() {
        try {
            $this->connect();
        } catch ( \Exception $e ) {
            $this->dead_or_error($e);
        }
    }

    /**
     * Die with an error message
     *
     * @since  1.7.3
     *
     * @param \Exception $exception
     *
     * @return void
     */
    public function dead_or_error(\Exception $exception) {
        // Use any /user/db_error.php file
        if( file_exists( YOURLS_USERDIR . '/db_error.php' ) ) {
            include_once( YOURLS_USERDIR . '/db_error.php' );
            die();
        }

        $message  = yourls__( 'Incorrect DB config, or could not connect to DB' );
        $message .= '<br/>' . get_class($exception) .': ' . $exception->getMessage();

        yourls_die( yourls__( $message ), yourls__( 'Fatal error' ), 503 );
        die();
    }

    /**
     * Start a Message Logger
     *
     * @since  1.7.3
     * @see    \YOURLS\Admin\Logger
     * @see    \Aura\Sql\Profiler
     * @return void
     */
    public function start_profiler() {
        $this->profiler = new Logger($this);
    }

    /**
     * @param string $context
     */
    public function set_html_context($context) {
        $this->context = $context;
    }

    /**
     * @return string
     */
    public function get_html_context() {
        return $this->context;
    }

    // Options low level functions, see \YOURLS\Database\Options

    /**
     * @param string $name
     * @param mixed  $value
     */
    public function set_option($name, $value) {
        $this->option[$name] = $value;
    }

    /**
     * @param  string $name
     * @return bool
     */
    public function has_option($name) {
        return array_key_exists($name, $this->option);
    }

    /**
     * @param  string $name
     * @return string
     */
    public function get_option($name) {
        return $this->option[$name];
    }

    /**
     * @param string $name
     */
    public function delete_option($name) {
        unset($this->option[$name]);
    }


    // Infos (related to keyword) low level functions

    /**
     * @param string $keyword
     * @param mixed  $infos
     */
    public function set_infos($keyword, $infos) {
        $this->infos[$keyword] = $infos;
    }

    /**
     * @param  string $keyword
     * @return bool
     */
    public function has_infos($keyword) {
        return array_key_exists($keyword, $this->infos);
    }

    /**
     * @param  string $keyword
     * @return array
     */
    public function get_infos($keyword) {
        return $this->infos[$keyword];
    }

    /**
     * @param string $keyword
     */
    public function delete_infos($keyword) {
        unset($this->infos[$keyword]);
    }

    /**
     * @todo: infos & options are working the same way here. Abstract this.
     */


    // Plugin low level functions, see functions-plugins.php

    /**
     * @return array
     */
    public function get_plugins() {
        return $this->plugins;
    }

    /**
     * @param array $plugins
     */
    public function set_plugins(array $plugins) {
        $this->plugins = $plugins;
    }

    /**
     * @param string $plugin  plugin filename
     */
    public function add_plugin($plugin) {
        $this->plugins[] = $plugin;
    }

    /**
     * @param string $plugin  plugin filename
     */
    public function remove_plugin($plugin) {
        unset($this->plugins[$plugin]);
    }


    // Plugin Pages low level functions, see functions-plugins.php

    /**
     * @return array
     */
    public function get_plugin_pages() {
        return $this->plugin_pages;
    }

    /**
     * @param array $pages
     */
    public function set_plugin_pages(array $pages) {
        $this->plugin_pages = $pages;
    }

    /**
     * @param string   $slug
     * @param string   $title
     * @param callable $function
     */
    public function add_plugin_page($slug, $title, $function) {
        $this->plugin_pages[$slug] = array(
            'slug'     => $slug,
            'title'    => $title,
            'function' => $function,
        );
    }

    /**
     * @param string $slug
     */
    public function remove_plugin_page($slug) {
        unset($this->plugin_pages[$slug]);
    }


    /**
     * Return count of SQL queries performed
     *
     * @since  1.7.3
     * @return int
     */
    public function get_num_queries() {
        return count( (array) $this->get_queries() );
    }

    /**
     * Return SQL queries performed
     *
     * Aura\Sql\Profiler logs every PDO command issued. But depending on PDO::ATTR_EMULATE_PREPARES, some are
     * actually sent to the mysql server or not :
     *  - if PDO::ATTR_EMULATE_PREPARES is true, prepare() statements are not sent to the server and are performed
     *    internally, so they are removed from the logger
     *  - if PDO::ATTR_EMULATE_PREPARES is false, prepare() statements are actually performed by the mysql server,
     *    and count as an actual query
     *
     * Resulting array is something like:
     *   array (
     *      0 => array (
     *           'duration' => 1.0010569095611572265625,
     *           'function' => 'connect',
     *           'statement' => NULL,
     *           'bind_values' => array (),
     *           'trace' => ...back trace...,
     *       ),
     *       // key index might not be sequential if 'prepare' function are filtered out
     *       2 => array (
     *           'duration' => 0.000999927520751953125,
     *           'function' => 'perform',
     *           'statement' => 'SELECT option_value FROM yourls_options WHERE option_name = :option_name LIMIT 1',
     *           'bind_values' => array ( 'option_name' => 'test_option' ),
     *           'trace' => ...back trace...,
     *       ),
     *   );
     *
     * @since  1.7.3
     * @return array
     */
    public function get_queries() {
        $queries = $this->getProfiler()->getProfiles();

        if ($this->get_emulate_state()) {
            // keep queries if $query['function'] != 'prepare'
            $queries = array_filter($queries, function($query) {return $query['function'] !== 'prepare';});
        }

        return $queries;
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
    public function is_installed() {
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
        $version = $this->pdo->getAttribute(PDO::ATTR_SERVER_VERSION);
        return $version;
    }

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
     * Deprecated functions since 1.7.3
     */

    // @codeCoverageIgnoreStart

    public function escape($string) {
        yourls_deprecated_function( '$ydb->'.__FUNCTION__, '1.7.3', 'PDO' );
        // This will escape using PDO->quote(), but then remove the enclosing quotes
        return substr($this->quote($string), 1, -1);
    }

    public function get_col($query) {
        yourls_deprecated_function( '$ydb->'.__FUNCTION__, '1.7.3', 'PDO' );
        yourls_debug_log('LEGACY SQL: '.$query);
        return $this->fetchCol($query);
    }

    public function get_results($query) {
        yourls_deprecated_function( '$ydb->'.__FUNCTION__, '1.7.3', 'PDO' );
        yourls_debug_log('LEGACY SQL: '.$query);
        $stm = parent::query($query);
        return($stm->fetchAll(PDO::FETCH_OBJ));
    }

    public function get_row($query) {
        yourls_deprecated_function( '$ydb->'.__FUNCTION__, '1.7.3', 'PDO' );
        yourls_debug_log('LEGACY SQL: '.$query);
        $row = $this->fetchObjects($query);
        return isset($row[0]) ? $row[0] : null;
    }

    public function get_var($query) {
        yourls_deprecated_function( '$ydb->'.__FUNCTION__, '1.7.3', 'PDO' );
        yourls_debug_log('LEGACY SQL: '.$query);
        return $this->fetchValue($query);
    }

    public function query($query) {
        yourls_deprecated_function( '$ydb->'.__FUNCTION__, '1.7.3', 'PDO' );
        yourls_debug_log('LEGACY SQL: '.$query);
        return $this->fetchAffected($query);
    }
    // @codeCoverageIgnoreEnd
}
