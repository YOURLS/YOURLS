<?php

class ezSQL_pdo_YOURLS extends ezSQL_pdo {

	/**
	* Constructor - Overwrite original to use MySQL and handle custom port
	* 
	* @since 1.7
	*/
	function __construct( $dbuser='', $dbpassword='', $dbname='', $dbhost='localhost', $encoding='' ) {
        $this->show_errors = defined( 'YOURLS_DEBUG' ) && YOURLS_DEBUG; // comply to YOURLS debug mode
		$this->dbuser = $dbuser;
		$this->dbpassword = $dbpassword;
		$this->dbname = $dbname;
		// Get custom port if any
		if ( false !== strpos( $dbhost, ':' ) ) {
			list( $dbhost, $dbport ) = explode( ':', $dbhost );
			$dbhost = sprintf( '%1$s;port=%2$d', $dbhost, $dbport );
		}
		$this->dbhost = $dbhost;
		$this->encoding = $encoding;
		$dsn = 'mysql:host=' . $dbhost . ';dbname=' . $dbname ;
		$this->dsn = $dsn;
		
		// Turn on track errors 
		ini_set('track_errors',1);
		
		$this->connect( $dsn, $dbuser, $dbpassword );
		
	}

	/**
	 * Return MySQL server version
	 *
	 * @since 1.7
	 */
	function mysql_version() {
		return ( $this->dbh->getAttribute(PDO::ATTR_SERVER_VERSION) );
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

	/**
	* Disconnect
	* 
	* Actually not needed for PDO it seems, the function is there only for consistency with
	* other classes
	*
	* @since 1.7
	*/
	function disconnect() {
		// bleh
	}	
	

}

