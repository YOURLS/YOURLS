<?php

/**
 * Pick the right DB class and return an instance
 *
 * @since 1.7
 * @param string $extension Optional: user defined choice
 * @return class $ydb DB class instance
 */
function yourls_set_DB_driver( ) {

	// Auto-pick the driver. Priority: user defined, then PDO, then mysqli, then mysql
	if ( defined( 'YOURLS_DB_DRIVER' ) ) {
		$driver = strtolower( YOURLS_DB_DRIVER ); // accept 'MySQL', 'mySQL', etc
	} elseif ( extension_loaded( 'pdo_mysql' ) ) {
		$driver = 'pdo';
	} elseif ( extension_loaded( 'mysqli' ) ) {
		$driver = 'mysqli';
	} elseif ( extension_loaded( 'mysql' ) ) {
		$driver = 'mysql';
	} else {
		$driver = '';
	}
	
	// Set the new driver
	if ( in_array( $driver, array( 'mysql', 'mysqli', 'pdo' ) ) ) {
		require_once( YOURLS_INC . '/ezSQL/ez_sql_core.php' );
		require_once( YOURLS_INC . '/ezSQL/ez_sql_core_yourls.php' );
		require_once( YOURLS_INC . '/ezSQL/ez_sql_' . $driver . '.php' );
		require_once( YOURLS_INC . '/ezSQL/ez_sql_' . $driver . '_yourls.php' );
	}
	$class = 'ezSQL_' . $driver . '_yourls';

	global $ydb;

	if ( !class_exists( $class, false ) ) {
		$ydb = new stdClass();
		yourls_die(
			yourls__( 'YOURLS requires the mysql, mysqli or pdo_mysql PHP extension. No extension found. Check your server config, or contact your host.' ),
			yourls__( 'Fatal error' ),
			503
		);
	}
	
	yourls_do_action( 'set_DB_driver', $driver );
		
	$ydb = new $class( YOURLS_DB_USER, YOURLS_DB_PASS, YOURLS_DB_NAME, YOURLS_DB_HOST );

	yourls_debug_log( "DB driver: $driver" );
}

/**
 * Connect to DB
 *
 * @since 1.0
 */
function yourls_db_connect() {
	global $ydb;

	if (   !defined( 'YOURLS_DB_USER' )
		or !defined( 'YOURLS_DB_PASS' )
		or !defined( 'YOURLS_DB_NAME' )
		or !defined( 'YOURLS_DB_HOST' )
	) yourls_die ( yourls__( 'Incorrect DB config, or could not connect to DB' ), yourls__( 'Fatal error' ), 503 );	

	// Are we standalone or in the WordPress environment?
	if ( class_exists( 'wpdb', false ) ) {
		/* TODO: should we deprecate this? Follow WP dev in that area */
		$ydb =  new wpdb( YOURLS_DB_USER, YOURLS_DB_PASS, YOURLS_DB_NAME, YOURLS_DB_HOST );
	} else {
		yourls_set_DB_driver();
	}
	
	// Check if connection attempt raised an error. It seems that only PDO does, though.
	if ( $ydb->last_error )
		yourls_die( $ydb->last_error, yourls__( 'Fatal error' ), 503 );

	
	return $ydb;
}


