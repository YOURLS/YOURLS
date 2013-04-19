<?php

class ezSQL_pdo_YOURLS extends ezSQL_pdo {

	/**
	*  Constructor - Overwrite original to use MySQL
	*/
	function ezSQL_pdo_YOURLS( $dbuser='', $dbpassword='', $dbname='', $dbhost='localhost', $encoding='' ) {
		$this->ezSQL_pdo( $dbuser='', $dbpassword='', $dbname='', $dbhost='localhost', $encoding='' );
	}
	
	function ezSQL_pdo( $dbuser='', $dbpassword='', $dbname='', $dbhost='localhost', $encoding='' ) {
		echo "ahah";
		$this->dbuser = $dbuser;
		$this->dbpassword = $dbpassword;
		$this->dbname = $dbname;
		$this->dbhost = $dbhost;
		$this->encoding = $encoding;
		$dsn = 'mysql:host=' . $dbhost . ';dbname=' . $dbname ;
		$this->dsn = $dsn;

		// Turn on track errors 
		ini_set('track_errors',1);
		
		$this->connect( $dsn, $user, $password );
		
	}

}