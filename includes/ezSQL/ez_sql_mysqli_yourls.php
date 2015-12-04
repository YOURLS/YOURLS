<?php

class ezSQL_mysqli_YOURLS extends ezSQL_mysqli {

	/**
	 * Return MySQL server version
	 *
	 * @since 1.7
	 */
	function mysql_version() {
		return  mysqli_get_server_info( $this->dbh ) ;
	}
    
    /**
     * Comply to YOURLS debug mode
     *
     * @since 1.7.1
     */
    function __construct( $user, $pass, $name, $host ) {
        $this->show_errors = defined( 'YOURLS_DEBUG' ) && YOURLS_DEBUG;
        parent::__construct( $user, $pass, $name, $host );
    }
	
	/**
	 * Perform mySQL query
	 *
	 * Added to the original function: logging of all queries
	 *
	 * @since 1.7
	 */
	function query( $query ) {
	
		// Keep history of all queries
		$this->debug_log[] = $query;

		// Original function
		return parent::query( $query );
	}
	
}

