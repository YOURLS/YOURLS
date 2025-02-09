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

use \Aura\Sql\ExtendedPdo;
use \YOURLS\Database\Profiler;
use \YOURLS\Database\Logger;
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
    protected $infos = [];

    /**
     * Is YOURLS installed and ready to run?
     * @var bool
     */
    protected $installed = false;

    /**
     * Options
     * @var array
     */
    protected $option = [];

    /**
     * Plugin admin pages informations
     * @var array
     */
    protected $plugin_pages = [];

    /**
     * Plugin informations
     * @var array
     */
    protected $plugins = [];

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
    public function __construct($dsn, $user, $pass, $options) {
        parent::__construct($dsn, $user, $pass, $options);
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
     * @see    \Aura\Sql\Profiler\Profiler
     * @see    \Aura\Sql\Profiler\MemoryLogger
     * @return void
     */
    public function start_profiler() {
        // Instantiate a custom logger and make it the profiler
        $yourls_logger = new Logger();
        $profiler = new Profiler($yourls_logger);
        $this->setProfiler($profiler);

        /* By default, make "query" the log level. This way, each internal logging triggered
         * by Aura SQL will be a "query", and logging triggered by yourls_debug() will be
         * a "message". See includes/functions-debug.php:yourls_debug()
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

}
