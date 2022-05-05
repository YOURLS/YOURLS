<?php

/**
 * Connect to DB
 *
 * @since 1.0
 * @return \YOURLS\Database\YDB
 */
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

    $ydb = new \YOURLS\Database\YDB( $dsn, $user, $pass, $driver_options, $attributes );
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
