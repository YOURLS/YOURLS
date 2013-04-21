<?php

class ezSQL_pdo_YOURLS extends ezSQL_pdo {

	/**
	* Constructor - Overwrite original to use MySQL instead of SQLite
	* 
	* @since 1.7
	*/
	function ezSQL_pdo_YOURLS( $dbuser='', $dbpassword='', $dbname='', $dbhost='localhost', $encoding='' ) {
		$this->dbuser = $dbuser;
		$this->dbpassword = $dbpassword;
		$this->dbname = $dbname;
		$this->dbhost = $dbhost;
		$this->encoding = $encoding;
		$dsn = 'mysql:host=' . $dbhost . ';dbname=' . $dbname ;
		$this->dsn = $dsn;
		
		// Turn on track errors 
		ini_set('track_errors',1);
		
		$this->connect( $dsn, $dbuser, $dbpassword );
		
	}
	

	/**
	* Connect to MySQL server. Override original function to allow empty passwords
	* 
	* @since 1.7
	*/
	function connect( $dsn='', $user='', $password='', $ssl=array() ) {
	
		global $ezsql_pdo_str; $return_val = false;
		
		// Must have a server/db and a user
		if ( ! $dsn || ! $user )
		{
			$this->register_error( $ezsql_pdo_str[1].' in '.__FILE__.' on line '.__LINE__ );
			$this->show_errors ? trigger_error($ezsql_pdo_str[1],E_USER_WARNING) : null;
		}
		
		// Establish PDO connection
		try 
		{
			if(!empty($ssl))
			{
				$this->dbh = new PDO($dsn, $user, $password, $ssl);
			}
			else
			{
				$this->dbh = new PDO($dsn, $user, $password);
			}
			
			$return_val = true;
		} 
		catch (PDOException $e) 
		{
			$this->register_error($e->getMessage());
			$this->show_errors ? trigger_error($e->getMessage(),E_USER_WARNING) : null;
		}

		return $return_val;			
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

