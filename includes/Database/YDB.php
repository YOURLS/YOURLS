<?php

/**
 * Aura SQL wrapper for YOURLS that creates the almighty YDB object.
 *
 * A fine example of a "class that knows too much" (see https://en.wikipedia.org/wiki/God_object)
 *
 * Note to plugin authors: you most likely SHOULD NOT use directly methods and properties of this class. Use instead
 * function wrappers (e.g. don't use $ydb->option, or $ydb->set_option(), use yourls_*_options() functions instead).
 *
 * @since 1.7.3
 */

namespace YOURLS\Database;

use Aura\Sql\ExtendedPdo;
use PDO;

class YDB extends ExtendedPdo {

    /**
     * Debug mode, default false
     * @var bool
     */
    protected bool $debug = false;

    /**
     * Page context (ie "infos", "bookmark", "plugins"...)
     * @var string
     */
    protected string $context = '';

    /**
     * Information related to a short URL keyword (e.g. timestamp, long URL, ...)
     *
     * @var array
     *
     */
    protected array $infos = [];

    /**
     * Is YOURLS installed and ready to run?
     * @var bool
     */
    protected bool $installed = false;

    /**
     * Options
     * @var array
     */
    protected array $option = [];

    /**
     * Plugin admin pages information
     * @var array
     */
    protected array $plugin_pages = [];

    /**
     * Plugin information
     * @var array
     */
    protected array $plugins = [];

    /**
     * Are we emulating prepare statements ?
     * @var bool
     */
    protected bool $is_emulate_prepare;

    /**
     * Bypass shunt filter? See fetch_wrapper()
     * @var bool
     */
    private bool $bypass_shunt_filter = false;

    /**
     * @since 1.7.3
     * @param string $dsn     The data source name
     * @param string $user    The username
     * @param string $pass    The password
     * @param array  $options Driver-specific options
     */
    public function __construct($dsn, $user, $pass, $options) {
        parent::__construct($dsn, $user, $pass, $options);
    }

    /**
     * Init everything needed
     *
     * Everything we need to set up is done here in init(), not in the constructor, so even
     * when the connection fails (e.g. config error or DB dead), the constructor has worked,
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
            list($dsn, $_user, $_pwd, $_opt, $_queries) = $this->args;
            $this->connect($dsn);
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
        $file = YOURLS_USERDIR . '/db_error.php';
        if(file_exists($file)) {
            if(yourls_include_file_sandbox( $file ) === true) {
                die();
            }
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
     * @see    includes/Database/Logger.php
     * @see    includes/Database/Profiler.php
     * @return void
     */
    public function start_profiler() {
        // Instantiate a custom logger and make it the profiler
        $yourls_logger = new Logger();
        $profiler = new Profiler($yourls_logger);
        $this->setProfiler($profiler);

        /* By default, make "query" the log level. This way, each internal logging triggered
         * by Aura SQL will be a "query", and logging triggered by yourls_debug_log() will be
         * a "debug". See includes/functions-debug.php:yourls_debug_log()
         */
        $profiler->setLoglevel('query');
    }

    /**
     * @param string $context
     * @return void
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
     * @return void
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
     * @return void
     */
    public function delete_option($name) {
        unset($this->option[$name]);
    }


    // Infos (related to keyword) low level functions

    /**
     * @param string $keyword
     * @param mixed  $infos
     * @return void
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
     * @return void
     */
    public function delete_infos($keyword) {
        if (isset($this->infos[$keyword])) {
            unset($this->infos[$keyword]);
        }
    }

    /**
     * @param string $keyword
     * @param mixed  $infos
     * @return void
     */
    public function update_infos_if_exists($keyword, $infos) {
        if ($this->has_infos($keyword) && $this->infos[$keyword]) {
            $this->infos[$keyword] = array_merge($this->infos[$keyword], $infos);
        }
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
     * @return void
     */
    public function set_plugins(array $plugins) {
        $this->plugins = $plugins;
    }

    /**
     * @param string $plugin  plugin filename
     * @return void
     */
    public function add_plugin($plugin) {
        $this->plugins[] = $plugin;
    }

    /**
     * @param string $plugin  plugin filename
     * @return void
     */
    public function remove_plugin($plugin) {
        unset($this->plugins[$plugin]);
    }


    // Plugin Pages low level functions, see functions-plugins.php

    /**
     * @return array
     */
    public function get_plugin_pages() {
        return is_array( $this->plugin_pages ) ? $this->plugin_pages : [];
    }

    /**
     * @param array $pages
     * @return void
     */
    public function set_plugin_pages(array $pages) {
        $this->plugin_pages = $pages;
    }

    /**
     * @param string   $slug
     * @param string   $title
     * @param callable $function
     * @return void
     */
    public function add_plugin_page( $slug, $title, $function ) {
        $this->plugin_pages[ $slug ] = [
            'slug'     => $slug,
            'title'    => $title,
            'function' => $function,
        ];
    }

    /**
     * @param string $slug
     * @return void
     */
    public function remove_plugin_page( $slug ) {
        unset( $this->plugin_pages[ $slug ] );
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
     * @since  1.7.3
     * @return array
     */
    public function get_queries() {
        $queries = $this->getProfiler()->getLogger()->getMessages();

        // Only keep messages that start with "SQL "
        $queries = array_filter($queries, function($query) {return substr( $query, 0, 4 ) === "SQL ";});

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
     * Return MySQL version
     *
     * @since  1.7.3
     * @return string
     */
    public function mysql_version() {
        return $this->pdo->getAttribute(PDO::ATTR_SERVER_VERSION);
    }

    /**
     * Fetch the number of affected rows from a cached query
     * Results are cached to avoid redundant database queries for identical statements.
     *
     * @since 1.10.4
     * @param string $statement SQL statement to execute
     * @param array  $values    Optional. Values to bind to the statement. Default empty array.
     * @return int Number of affected rows
     */
    public function fetchAffected(string $statement, array $values = []): int {
        return $this->fetch_wrapper('fetchAffected', $statement, $values);
    }

    /**
     * Fetch all rows from a cached query
     * Results are cached to avoid redundant database queries for identical statements.
     *
     * @since 1.10.4
     * @param string $statement SQL statement to execute
     * @param array  $values    Optional. Values to bind to the statement. Default empty array.
     * @return array All rows returned by the query
     */
    public function fetchAll(string $statement, array $values = []): array {
        return $this->fetch_wrapper('fetchAll', $statement, $values);
    }

    /**
     * Fetch all rows as associative arrays from a cached query
     * Results are cached to avoid redundant database queries for identical statements.
     *
     * @since 1.10.4
     * @param string $statement SQL statement to execute
     * @param array  $values    Optional. Values to bind to the statement. Default empty array.
     * @return array All rows as associative arrays
     */
    public function fetchAssoc(string $statement, array $values = []): array {
        return $this->fetch_wrapper('fetchAssoc', $statement, $values);
    }

    /**
     * Fetch a single column from all rows from a cached query
     * Results are cached to avoid redundant database queries for identical statements.
     *
     * @since 1.10.4
     * @param string $statement SQL statement to execute
     * @param array  $values    Optional. Values to bind to the statement. Default empty array.
     * @return array First column values from all rows
     */
    public function fetchCol(string $statement, array $values = []): array {
        return $this->fetch_wrapper('fetchCol', $statement, $values);
    }

    /**
     * Fetch rows grouped by the first column from a cached query
     * Results are cached to avoid redundant database queries for identical statements.
     *
     * @since 1.10.4
     * @param string $statement SQL statement to execute
     * @param array  $values    Optional. Values to bind to the statement. Default empty array.
     * @param int    $style     Optional. PDO fetch style constant. Default PDO::FETCH_COLUMN.
     * @return array Rows grouped by the first column value
     */
    public function fetchGroup(string $statement, array $values = [], int $style = PDO::FETCH_COLUMN): array {
        return $this->fetch_wrapper('fetchGroup', $statement, $values, $style);
    }

    /**
     * Fetch a single row as an object from a cached query
     * Results are cached to avoid redundant database queries for identical statements.
     *
     * @since 1.10.4
     * @param string $statement SQL statement to execute
     * @param array  $values    Optional. Values to bind to the statement. Default empty array.
     * @param string $class     Optional. Class name for the returned object. Default 'stdClass'.
     * @param array  $args      Optional. Constructor arguments for the class. Default empty array.
     * @return object|false Object representing the row, or false if no rows found
     */
    public function fetchObject(string $statement, array $values = [], string $class = 'stdClass', array $args = []): object|false {
        return $this->fetch_wrapper('fetchObject', $statement, $values, $class, $args);
    }

    /**
     * Fetch all rows as objects from a cached query
     * Results are cached to avoid redundant database queries for identical statements.
     *
     * @since 1.10.4
     * @param string $statement SQL statement to execute
     * @param array  $values    Optional. Values to bind to the statement. Default empty array.
     * @param string $class     Optional. Class name for the returned objects. Default 'stdClass'.
     * @param array  $args      Optional. Constructor arguments for the class. Default empty array.
     * @return array All rows as objects
     */
    public function fetchObjects(string $statement, array $values = [], string $class = 'stdClass', array $args = []): array {
        return $this->fetch_wrapper('fetchObjects', $statement, $values, $class, $args);
    }

    /**
     * Fetch a single row as an array from a cached query
     * Results are cached to avoid redundant database queries for identical statements.
     *
     * @since 1.10.4
     * @param string $statement SQL statement to execute
     * @param array  $values    Optional. Values to bind to the statement. Default empty array.
     * @return array|false Associative array representing the row, or false if no rows found
     */
    public function fetchOne(string $statement, array $values = []): array|false {
        return $this->fetch_wrapper('fetchOne', $statement, $values);
    }

    /**
     * Fetch key-value pairs from a cached query
     * Results are cached to avoid redundant database queries for identical statements.
     *
     * @since 1.10.4
     * @param string $statement SQL statement to execute
     * @param array  $values    Optional. Values to bind to the statement. Default empty array.
     * @return array Associative array of key-value pairs
     */
    public function fetchPairs(string $statement, array $values = []): array {
        return $this->fetch_wrapper('fetchPairs', $statement, $values);
    }

    /**
     * Fetch a single value from a cached query
     * Results are cached to avoid redundant database queries for identical statements.
     *
     * @since 1.10.4
     * @param string $statement SQL statement to execute
     * @param array  $values    Optional. Values to bind to the statement. Default empty array.
     * @return mixed Single value from the query result
     */
    public function fetchValue(string $statement, array $values = []): mixed {
        return $this->fetch_wrapper('fetchValue', $statement, $values);
    }

    /**
     * Wrapper for all fetch methods, allowing plugins to intercept and modify query results.
     *
     * @since 1.10.4
     * @param string $method  The parent fetch method name to call (e.g., 'fetchAll', 'fetchValue')
     * @param mixed  ...$args Variable number of arguments to pass to the parent method
     * @return mixed The cached result if available, otherwise the fresh query result
     */
    public function fetch_wrapper(string $method, ...$args): mixed {
        // Allow plugins to short-circuit the whole function if we're not in bypass mode
        if (!$this->bypass_shunt_filter) {
            $pre = yourls_apply_filter('shunt_fetch_wrapper', yourls_shunt_default(), $method, ...$args);
            if (yourls_shunt_default() !== $pre) {
                return $pre;
            }
        }

        // Filter the query statement
        $args[0] = yourls_apply_filter('fetch_wrapper_statement', $args[0], $method, $args);

        return parent::$method( ...$args);
    }

    /**
     * Execute a callback with filters temporarily disabled
     *
     * This method allows bypassing the plugin filter system for the duration of the callback execution. Useful to
     * prevent infinite loops when a filter needs to call the original method without re-triggering itself.
     *
     * Example usage:
     *      $ydb = yourls_get_db('write-get_from_cache');
     *      $result = $ydb->withoutFilters(function($db) use ($method, $args) {
     *          return $db->fetch_wrapper($method, ...$args);
     *      });
     *
     * @since 1.10.4
     * @param callable $callback
     * @return mixed
     */
    public function without_filters(callable $callback): mixed {
        $this->bypass_shunt_filter = true;
        try {
            return $callback($this);
        } finally {
            $this->bypass_shunt_filter = false;
        }
    }
}
