<?php

// Check if mod_rewrite is enabled. Note: unused, not reliable enough.
function yourls_check_mod_rewrite() {
	return yourls_apache_mod_loaded('mod_rewrite');
}

// Check if extension cURL is enabled
function yourls_check_curl() {
	return function_exists('curl_init');
}

// Check if server has MySQL 4.1+
function yourls_check_database_version() {
	global $ydb;
	return ( version_compare( '4.1', $ydb->mysql_version() ) <= 0 );
}

// Check if PHP > 4.3
function yourls_check_php_version() {
	return ( version_compare( '4.3', phpversion() ) <= 0 );
}

// Check if server is an Apache
function yourls_is_apache() {
	return (
	   strpos($_SERVER['SERVER_SOFTWARE'], 'Apache') !== false
	|| strpos($_SERVER['SERVER_SOFTWARE'], 'LiteSpeed') !== false
	);
}

// Check if module exists in Apache config. Input string eg 'mod_rewrite', return true or $default. Stolen from WordPress
function yourls_apache_mod_loaded($mod, $default = false) {
	if ( !yourls_is_apache() )
		return false;

	if ( function_exists('apache_get_modules') ) {
		$mods = apache_get_modules();
		if ( in_array($mod, $mods) )
			return true;
	} elseif ( function_exists('phpinfo') ) {
			ob_start();
			phpinfo(8);
			$phpinfo = ob_get_clean();
			if ( false !== strpos($phpinfo, $mod) )
				return true;
	}
	return $default;
}

// Create .htaccess. Returns boolean
function yourls_create_htaccess() {
	$host = parse_url( YOURLS_SITE );
	$path = ( isset( $host['path'] ) ? $host['path'] : '' );

	$content = array(
		'<IfModule mod_rewrite.c>',
		'RewriteEngine On',
		'RewriteBase '.$path.'/',
		'RewriteCond %{REQUEST_FILENAME} !-f',
		'RewriteCond %{REQUEST_FILENAME} !-d',
		'RewriteRule ^(.*)$ '.$path.'/yourls-loader.php [L]',
		'</IfModule>',
	);
	
	$filename = YOURLS_ABSPATH.'/.htaccess';
	
	return ( yourls_insert_with_markers( $filename, 'YOURLS', $content ) );
}

// Inserts $insertion (text in an array of lines) into $filename (.htaccess) between BEGIN/END $marker block. Returns bool. Stolen from WP
function yourls_insert_with_markers( $filename, $marker, $insertion ) {
	if (!file_exists( $filename ) || is_writeable( $filename ) ) {
		if (!file_exists( $filename ) ) {
			$markerdata = '';
		} else {
			$markerdata = explode( "\n", implode( '', file( $filename ) ) );
		}

		if ( !$f = @fopen( $filename, 'w' ) )
			return false;

		$foundit = false;
		if ( $markerdata ) {
			$state = true;
			foreach ( $markerdata as $n => $markerline ) {
				if (strpos($markerline, '# BEGIN ' . $marker) !== false)
					$state = false;
				if ( $state ) {
					if ( $n + 1 < count( $markerdata ) )
						fwrite( $f, "{$markerline}\n" );
					else
						fwrite( $f, "{$markerline}" );
				}
				if (strpos($markerline, '# END ' . $marker) !== false) {
					fwrite( $f, "# BEGIN {$marker}\n" );
					if ( is_array( $insertion ))
						foreach ( $insertion as $insertline )
							fwrite( $f, "{$insertline}\n" );
					fwrite( $f, "# END {$marker}\n" );
					$state = true;
					$foundit = true;
				}
			}
		}
		if (!$foundit) {
			fwrite( $f, "\n\n# BEGIN {$marker}\n" );
			foreach ( $insertion as $insertline )
				fwrite( $f, "{$insertline}\n" );
			fwrite( $f, "# END {$marker}\n\n" );
		}
		fclose( $f );
		return true;
	} else {
		return false;
	}
}

// Create MySQL tables. Return array( 'success' => array of success strings, 'errors' => array of error strings )
function yourls_create_sql_tables() {
	global $ydb;
	
	$error_msg = array();
	$success_msg = array();

	// Create Table Query
	$create_tables = array();
	$create_tables[YOURLS_DB_TABLE_URL] =
		'CREATE TABLE IF NOT EXISTS `'.YOURLS_DB_TABLE_URL.'` ('.
		'`keyword` varchar(200) BINARY NOT NULL,'.
		'`url` text BINARY NOT NULL,'.
		'`title` text CHARACTER SET utf8,'.
		'`timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,'.
		'`ip` VARCHAR(41) NOT NULL,'.
		'`clicks` INT(10) UNSIGNED NOT NULL,'.
		' PRIMARY KEY  (`keyword`),'.
		' KEY `timestamp` (`timestamp`),'.
		' KEY `ip` (`ip`)'.
		');';

	$create_tables[YOURLS_DB_TABLE_OPTIONS] = 
		'CREATE TABLE IF NOT EXISTS `'.YOURLS_DB_TABLE_OPTIONS.'` ('.
		'`option_id` bigint(20) unsigned NOT NULL auto_increment,'.
		'`option_name` varchar(64) NOT NULL default "",'.
		'`option_value` longtext NOT NULL,'.
		'PRIMARY KEY  (`option_id`,`option_name`),'.
		'KEY `option_name` (`option_name`)'.
		') AUTO_INCREMENT=1 ;';
		
	$create_tables[YOURLS_DB_TABLE_LOG] = 
		'CREATE TABLE IF NOT EXISTS `'.YOURLS_DB_TABLE_LOG.'` ('.
		'`click_id` int(11) NOT NULL auto_increment,'.
		'`click_time` datetime NOT NULL,'.
		'`shorturl` varchar(200) BINARY NOT NULL,'.
		'`referrer` varchar(200) NOT NULL,'.
		'`user_agent` varchar(255) NOT NULL,'.
		'`ip_address` varchar(41) NOT NULL,'.
		'`country_code` char(2) NOT NULL,'.
		'PRIMARY KEY  (`click_id`),'.
		'KEY `shorturl` (`shorturl`)'.
		') AUTO_INCREMENT=1 ;';


	$create_table_count = 0;
	
	$ydb->show_errors = true;
	
	// Create tables
	foreach ( $create_tables as $table_name => $table_query ) {
		$ydb->query($table_query);
		$create_success = $ydb->query("SHOW TABLES LIKE '$table_name'");
		if($create_success) {
			$create_table_count++;
			$success_msg[] = "Table '$table_name' created."; 
		} else {
			$error_msg[] = "Error creating table '$table_name'."; 
		}
	}
		
	// Insert data into tables
	yourls_update_option( 'version', YOURLS_VERSION );
	yourls_update_option( 'db_version', YOURLS_DB_VERSION );
	yourls_update_option( 'next_id', 1 );
	
	// Insert sample links
	yourls_insert_link_in_db( 'http://planetozh.com/blog/', 'ozhblog', 'planetOzh: Ozh\' blog' );
	yourls_insert_link_in_db( 'http://ozh.org/', 'ozh', 'ozh.org' );
	yourls_insert_link_in_db( 'http://yourls.org/', 'yourls', 'YOURLS: Your Own URL Shortener' );
		
	// Check results of operations
	if ( sizeof($create_tables) == $create_table_count ) {
		$success_msg[] = 'YOURLS tables successfully created.';
	} else {
		$error_msg[] = "Error creating YOURLS tables."; 
	}

	return array( 'success' => $success_msg, 'error' => $error_msg );
}
?>
