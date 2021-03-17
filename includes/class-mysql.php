<?php

/**
 * Connect to DB
 *
 * @since 1.0
 */

class DB_Mysql extends \YOURLS\Database\YDB {
    public function __construct($dsn, $user, $pass, $driver_options, $attributes) {
        parent::__construct($dsn, $user, $pass, $driver_options, $attributes);
    }

	 public function page($offset, $perpage) {
	     return "LIMIT $offset, $perpage";
	 }

    public function dt_year($fld) {
        return "DATE_FORMAT($fld, '%Y')";
    }

    public function dt_month($fld) {
        return "DATE_FORMAT($fld, '%m')";
    }

    public function dt_day($fld) {
        return "DATE_FORMAT($fld, '%d')";
    }

    public function dt_add($fld, $offset) {
        return "DATE_ADD($fld, INTERVAL $offset HOUR)";
    }

    public function dt_hour($fld) {
        return "DATE_FORMAT($fld, '%H %p')";
    }

    /**
     * FIXME:
     *
     * @since FIXME
     * @return FIXME
     */
    function yourls_create_database() {
       return $this->perform('CREATE DATABASE ' . YOURLS_DB_NAME);
	 }

    /**
     * FIXME:
     *
     * @since FIXME
     * @return FIXME
     */
    function show_tables_like($table) {
       return $this->fetchAffected(sprintf("SHOW TABLES LIKE '%s'", $table));
	 }

    /**
     * Create MySQL tables. Return array( 'success' => array of success strings, 'errors' => array of error strings )
     *
     * @since 1.3
     * @return array  An array like array( 'success' => array of success strings, 'errors' => array of error strings )
     */
    function yourls_create_sql_tables() {
       $error_msg = array();
       $success_msg = array();

       // Create Table Query
       $create_tables = array();
       $create_tables[YOURLS_DB_TABLE_URL] =
            'CREATE TABLE IF NOT EXISTS '.YOURLS_DB_TABLE_URL.' ('.
             'keyword varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT "",'.
             'url text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,'.
             'title text COLLATE utf8mb4_unicode_ci DEFAULT NULL,'.
             'timestamp timestamp NOT NULL DEFAULT current_timestamp(),'.
             'ip varchar(41) COLLATE utf8mb4_unicode_ci NOT NULL,'.
             'clicks int(10) unsigned NOT NULL,'.
             'PRIMARY KEY (keyword),'.
             'KEY ip (ip),'.
             'KEY timestamp (timestamp)'.
            ') DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;';

       $create_tables[YOURLS_DB_TABLE_OPTIONS] =
          'CREATE TABLE IF NOT EXISTS '.YOURLS_DB_TABLE_OPTIONS.' ('.
          'option_id bigint(20) unsigned NOT NULL auto_increment,'.
          'option_name varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL default "",'.
          'option_value longtext COLLATE utf8mb4_unicode_ci NOT NULL,'.
          'PRIMARY KEY  (option_id,option_name),'.
          'KEY option_name (option_name)'.
          ') AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;';

       $create_tables[YOURLS_DB_TABLE_LOG] =
          'CREATE TABLE IF NOT EXISTS '.YOURLS_DB_TABLE_LOG.' ('.
          'click_id int(11) NOT NULL auto_increment,'.
          'click_time datetime NOT NULL,'.
          'shorturl varchar(100) BINARY NOT NULL,'.
          'referrer varchar(200) NOT NULL,'.
          'user_agent varchar(255) NOT NULL,'.
          'ip_address varchar(41) NOT NULL,'.
          'country_code char(2) NOT NULL,'.
          'PRIMARY KEY  (click_id),'.
          'KEY shorturl (shorturl)'.
          ') AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;';


       $create_table_count = 0;

       yourls_debug_mode(true);

       // Create tables
       foreach ( $create_tables as $table_name => $table_query ) {
          $this->perform( $table_query );
          $create_success = $this->fetchAffected( "SHOW TABLES LIKE '$table_name'" );
          if( $create_success ) {
             $create_table_count++;
             $success_msg[] = yourls_s( "Table '%s' created.", $table_name );
          } else {
             $error_msg[] = yourls_s( "Error creating table '%s'.", $table_name );
          }
       }

       // Initializes the option table
       if( !yourls_initialize_options() )
          $error_msg[] = yourls__( 'Could not initialize options' );

       // Insert sample links
       if( !yourls_insert_sample_links() )
          $error_msg[] = yourls__( 'Could not insert sample short URLs' );

       // Check results of operations
       if ( sizeof( $create_tables ) == $create_table_count ) {
          $success_msg[] = yourls__( 'YOURLS tables successfully created.' );
       } else {
          $error_msg[] = yourls__( 'Error creating YOURLS tables.' );
       }

       return array( 'success' => $success_msg, 'error' => $error_msg );
    }

}


function yourls_db_connect() {
    global $ydb;

    if ( !defined( 'YOURLS_DB_USER' )
         or !defined( 'YOURLS_DB_PASS' )
         or !defined( 'YOURLS_DB_NAME' )
         or !defined( 'YOURLS_DB_HOST' )
    ) {
        yourls_die( yourls__( 'Incorrect DB config, please refer to documentation' ), yourls__( 'Fatal error' ), 503 );
    }

    $dbhost = YOURLS_DB_HOST;
    $user = YOURLS_DB_USER;
    $pass = YOURLS_DB_PASS;
    $dbname = YOURLS_DB_NAME;

    // This action is deprecated
    yourls_do_action( 'set_DB_driver', 'deprecated' );

    // Get custom port if any
    if ( false !== strpos( $dbhost, ':' ) ) {
        list( $dbhost, $dbport ) = explode( ':', $dbhost );
        $dbhost = sprintf( '%1$s;port=%2$d', $dbhost, $dbport );
    }

    $charset = yourls_apply_filter( 'db_connect_charset', 'utf8mb4' );

    /**
     * Data Source Name (dsn) used to connect the DB
     *
     * DSN with PDO is something like:
     * 'mysql:host=123.4.5.6;dbname=test_db;port=3306'
     * 'sqlite:/opt/databases/mydb.sq3'
     * 'pgsql:host=192.168.13.37;port=5432;dbname=omgwtf'
     */
    $dsn = sprintf( 'mysql:host=%s;dbname=%s;charset=%s', $dbhost, $dbname, $charset );
    $dsn = yourls_apply_filter( 'db_connect_custom_dsn', $dsn );

    /**
     * PDO driver options and attributes
     *
     * The PDO constructor is something like:
     *   new PDO( string $dsn, string $username, string $password [, array $options ] )
     * The driver options are passed to the PDO constructor, eg array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
     * The attribute options are then set in a foreach($attr as $k=>$v){$db->setAttribute($k, $v)} loop
     */
    $driver_options = yourls_apply_filter( 'db_connect_driver_option', [] ); // driver options as key-value pairs
    $attributes = yourls_apply_filter( 'db_connect_attributes', [] ); // attributes as key-value pairs

    $ydb = new DB_Mysql( $dsn, $user, $pass, $driver_options, $attributes );
    $ydb->init();

    // Past this point, we're connected
    yourls_debug_log( sprintf( 'Connected to database %s on %s ', $dbname, $dbhost ) );

    yourls_debug_mode( YOURLS_DEBUG );

    return $ydb;
}

/**
 * Helper function : return instance of the DB
 *
 * Instead of:
 *     global $ydb;
 *     $ydb->do_stuff()
 * Prefer :
 *     yourls_get_db()->do_stuff()
 *
 * @since  1.7.10
 * @return \YOURLS\Database\YDB
 */
function yourls_get_db() {
    // Allow plugins to short-circuit the whole function
    $pre = yourls_apply_filter( 'shunt_get_db', false );
    if ( false !== $pre ) {
        return $pre;
    }

    global $ydb;
    $ydb = ( isset( $ydb ) ) ? $ydb : yourls_db_connect();
    return yourls_apply_filter('get_db', $ydb);
}

/**
 * Helper function : set instance of DB, or unset it
 *
 * Instead of:
 *     global $ydb;
 *     $ydb = stuff
 * Prefer :
 *     yourls_set_db( stuff )
 * (This is mostly used in the test suite)
 *
 * @since 1.7.10
 * @param  mixed $db    Either a \YOURLS\Database\YDB instance, or anything. If null, the function will unset $ydb
 */
function yourls_set_db($db) {
    global $ydb;

    if (is_null($db)) {
        unset($ydb);
    } else {
        $ydb = $db;
    }
}
