<?php

/**
 * Upgrade YOURLS and DB schema
 *
 * Note to devs : prefer update function names using the SQL version, eg yourls_update_to_506(),
 * rather than using the YOURLS version number, eg yourls_update_to_18(). This is to allow having
 * multiple SQL update during the dev cycle of the same Y0URLS version
 *
 */
function yourls_upgrade( $step, $oldver, $newver, $oldsql, $newsql ) {

    /**
     *  Sanitize input. Two notes :
     *  - they should already be sanitized in the caller, eg admin/upgrade.php
     *    (but hey, let's make sure)
     *  - some vars may not be used at the moment
     *    (and this is ok, they are here in case a future upgrade procedure needs them)
     */
    $step   = intval($step);
    $oldsql = intval($oldsql);
    $newsql = intval($newsql);
    $oldver = yourls_sanitize_version($oldver);
    $newver = yourls_sanitize_version($newver);

    yourls_maintenance_mode(true);

    // special case for 1.3: the upgrade is a multi step procedure
	if( $oldsql == 100 ) {
		yourls_upgrade_to_14( $step );
	}

	// other upgrades which are done in a single pass
	switch( $step ) {

	case 1:
	case 2:
		if( $oldsql < 210 )
			yourls_upgrade_to_141();

		if( $oldsql < 220 )
			yourls_upgrade_to_143();

		if( $oldsql < 250 )
			yourls_upgrade_to_15();

		if( $oldsql < 482 )
			yourls_upgrade_482(); // that was somewhere 1.5 and 1.5.1 ...

		if( $oldsql < 506 ) {
            /**
             * 505 was the botched update with the wrong collation, see #2766
             * 506 is the updated collation.
             * We want :
             *      people on 505 to update to 506
             *      people before 505 to update to the FIXED complete upgrade
             */
			if( $oldsql == 505 ) {
                yourls_upgrade_505_to_506();
            } else {
                yourls_upgrade_to_506();
            }
        }

		yourls_redirect_javascript( yourls_admin_url( "upgrade.php?step=3" ) );

		break;

	case 3:
		// Update options to reflect latest version
		yourls_update_option( 'version', YOURLS_VERSION );
		yourls_update_option( 'db_version', YOURLS_DB_VERSION );
        yourls_maintenance_mode(false);
		break;
	}
}

/************************** 1.6 -> 1.8 **************************/

/**
 * Update to 506, just the fix for people who had updated to master on 1.7.10
 *
 */
function yourls_upgrade_505_to_506() {
    echo "<p>Updating DB. Please wait...</p>";
	// Fix collation which was wrongly set at first to utf8mb4_unicode_ci
	$query = sprintf('ALTER TABLE `%s` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;', YOURLS_DB_TABLE_URL);

    try {
        yourls_get_db()->perform($query);
    } catch (\Exception $e) {
        echo "<p class='error'>Unable to update the DB.</p>";
        echo "<p>Could not change collation. You will have to fix things manually :(. The error was
        <pre>";
        echo $e->getMessage();
        echo "/n</pre>";
        die();
    }

    echo "<p class='success'>OK!</p>";
}

/**
 * Update to 506
 *
 */
function yourls_upgrade_to_506() {
    $ydb = yourls_get_db();
    $error_msg = [];

    echo "<p>Updating DB. Please wait...</p>";

    $queries = array(
        'database charset'     => sprintf('ALTER DATABASE `%s` CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;', YOURLS_DB_NAME),
        'options charset'      => sprintf('ALTER TABLE `%s` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;', YOURLS_DB_TABLE_OPTIONS),
        'short URL varchar'    => sprintf("ALTER TABLE `%s` CHANGE `keyword` `keyword` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '';", YOURLS_DB_TABLE_URL),
        'short URL type url'   => sprintf("ALTER TABLE `%s` CHANGE `url` `url` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL;", YOURLS_DB_TABLE_URL),
        'short URL type title' => sprintf("ALTER TABLE `%s` CHANGE `title` `title` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci", YOURLS_DB_TABLE_URL),
        'short URL charset'    => sprintf('ALTER TABLE `%s` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;', YOURLS_DB_TABLE_URL),
    );

    foreach($queries as $what => $query) {
        try {
            $ydb->perform($query);
        } catch (\Exception $e) {
            $error_msg[] = $e->getMessage();
        }
    }

    if( $error_msg ) {
        echo "<p class='error'>Unable to update the DB.</p>";
        echo "<p>You will have to manually fix things, sorry for the inconvenience :(</p>";
        echo "<p>The errors were:
        <pre>";
        foreach( $error_msg as $error ) {
            echo "$error\n";
        }
        echo "</pre>";
        die();
    }

    echo "<p class='success'>OK!</p>";
}

/************************** 1.5 -> 1.6 **************************/

/**
 * Upgrade r482
 *
 */
function yourls_upgrade_482() {
	// Change URL title charset to UTF8
	$table_url = YOURLS_DB_TABLE_URL;
	$sql = "ALTER TABLE `$table_url` CHANGE `title` `title` TEXT CHARACTER SET utf8;";
	yourls_get_db()->perform( $sql );
	echo "<p>Updating table structure. Please wait...</p>";
}

/************************** 1.4.3 -> 1.5 **************************/

/**
 * Main func for upgrade from 1.4.3 to 1.5
 *
 */
function yourls_upgrade_to_15( ) {
	// Create empty 'active_plugins' entry in the option if needed
	if( yourls_get_option( 'active_plugins' ) === false )
		yourls_add_option( 'active_plugins', array() );
	echo "<p>Enabling the plugin API. Please wait...</p>";

	// Alter URL table to store titles
	$table_url = YOURLS_DB_TABLE_URL;
	$sql = "ALTER TABLE `$table_url` ADD `title` TEXT AFTER `url`;";
	yourls_get_db()->perform( $sql );
	echo "<p>Updating table structure. Please wait...</p>";

	// Update .htaccess
	yourls_create_htaccess();
	echo "<p>Updating .htaccess file. Please wait...</p>";
}

/************************** 1.4.1 -> 1.4.3 **************************/

/**
 * Main func for upgrade from 1.4.1 to 1.4.3
 *
 */
function yourls_upgrade_to_143( ) {
	// Check if we have 'keyword' (borked install) or 'shorturl' (ok install)
	$ydb = yourls_get_db();
	$table_log = YOURLS_DB_TABLE_LOG;
	$sql = "SHOW COLUMNS FROM `$table_log`";
	$cols = $ydb->fetchObjects( $sql );
	if ( $cols[2]->Field == 'keyword' ) {
		$sql = "ALTER TABLE `$table_log` CHANGE `keyword` `shorturl` VARCHAR( 200 ) BINARY;";
		$ydb->query( $sql );
	}
	echo "<p>Structure of existing tables updated. Please wait...</p>";
}

/************************** 1.4 -> 1.4.1 **************************/

/**
 * Main func for upgrade from 1.4 to 1.4.1
 *
 */
function yourls_upgrade_to_141( ) {
	// Kill old cookies from 1.3 and prior
	setcookie('yourls_username', '', time() - 3600 );
	setcookie('yourls_password', '', time() - 3600 );
	// alter table URL
	yourls_alter_url_table_to_141();
	// recreate the htaccess file if needed
	yourls_create_htaccess();
}

/**
 * Alter table URL to 1.4.1
 *
 */
function yourls_alter_url_table_to_141() {
	$table_url = YOURLS_DB_TABLE_URL;
	$alter = "ALTER TABLE `$table_url` CHANGE `keyword` `keyword` VARCHAR( 200 ) BINARY, CHANGE `url` `url` TEXT BINARY ";
	yourls_get_db()->perform( $alter );
	echo "<p>Structure of existing tables updated. Please wait...</p>";
}


/************************** 1.3 -> 1.4 **************************/

/**
 * Main func for upgrade from 1.3-RC1 to 1.4
 *
 */
function yourls_upgrade_to_14( $step ) {

	switch( $step ) {
	case 1:
		// create table log & table options
		// update table url structure
		// update .htaccess
		yourls_create_tables_for_14(); // no value returned, assuming it went OK
		yourls_alter_url_table_to_14(); // no value returned, assuming it went OK
		$clean = yourls_clean_htaccess_for_14(); // returns bool
		$create = yourls_create_htaccess(); // returns bool
		if ( !$create )
			echo "<p class='warning'>Please create your <tt>.htaccess</tt> file (I could not do it for you). Please refer to <a href='http://yourls.org/htaccess'>http://yourls.org/htaccess</a>.";
		yourls_redirect_javascript( yourls_admin_url( "upgrade.php?step=2&oldver=1.3&newver=1.4&oldsql=100&newsql=200" ), $create );
		break;

	case 2:
		// convert each link in table url
		yourls_update_table_to_14();
		break;

	case 3:
		// update table url structure part 2: recreate indexes
		yourls_alter_url_table_to_14_part_two();
		// update version & db_version & next_id in the option table
		// attempt to drop YOURLS_DB_TABLE_NEXTDEC
		yourls_update_options_to_14();
		// Now upgrade to 1.4.1
		yourls_redirect_javascript( yourls_admin_url( "upgrade.php?step=1&oldver=1.4&newver=1.4.1&oldsql=200&newsql=210" ) );
		break;
	}
}

/**
 * Update options to reflect new version
 *
 */
function yourls_update_options_to_14() {
	yourls_update_option( 'version', '1.4' );
	yourls_update_option( 'db_version', '200' );

	if( defined('YOURLS_DB_TABLE_NEXTDEC') ) {
		$table = YOURLS_DB_TABLE_NEXTDEC;
		$next_id = yourls_get_db()->fetchValue("SELECT `next_id` FROM `$table`");
		yourls_update_option( 'next_id', $next_id );
		yourls_get_db()->perform( "DROP TABLE `$table`" );
	} else {
		yourls_update_option( 'next_id', 1 ); // In case someone mistakenly deleted the next_id constant or table too early
	}
}

/**
 * Create new tables for YOURLS 1.4: options & log
 *
 */
function yourls_create_tables_for_14() {
	$ydb = yourls_get_db();

	$queries = array();

	$queries[YOURLS_DB_TABLE_OPTIONS] =
		'CREATE TABLE IF NOT EXISTS `'.YOURLS_DB_TABLE_OPTIONS.'` ('.
		'`option_id` int(11) unsigned NOT NULL auto_increment,'.
		'`option_name` varchar(64) NOT NULL default "",'.
		'`option_value` longtext NOT NULL,'.
		'PRIMARY KEY (`option_id`,`option_name`),'.
		'KEY `option_name` (`option_name`)'.
		');';

	$queries[YOURLS_DB_TABLE_LOG] =
		'CREATE TABLE IF NOT EXISTS `'.YOURLS_DB_TABLE_LOG.'` ('.
		'`click_id` int(11) NOT NULL auto_increment,'.
		'`click_time` datetime NOT NULL,'.
		'`shorturl` varchar(200) NOT NULL,'.
		'`referrer` varchar(200) NOT NULL,'.
		'`user_agent` varchar(255) NOT NULL,'.
		'`ip_address` varchar(41) NOT NULL,'.
		'`country_code` char(2) NOT NULL,'.
		'PRIMARY KEY (`click_id`),'.
		'KEY `shorturl` (`shorturl`)'.
		');';

	foreach( $queries as $query ) {
		$ydb->perform( $query ); // There's no result to be returned to check if table was created (except making another query to check table existence, which we'll avoid)
	}

	echo "<p>New tables created. Please wait...</p>";

}

/**
 * Alter table structure, part 1 (change schema, drop index)
 *
 */
function yourls_alter_url_table_to_14() {
	$ydb = yourls_get_db();
	$table = YOURLS_DB_TABLE_URL;

	$alters = array();
	$results = array();
	$alters[] = "ALTER TABLE `$table` CHANGE `id` `keyword` VARCHAR( 200 ) NOT NULL";
	$alters[] = "ALTER TABLE `$table` CHANGE `url` `url` TEXT NOT NULL";
	$alters[] = "ALTER TABLE `$table` DROP PRIMARY KEY";

	foreach ( $alters as $query ) {
		$ydb->perform( $query );
	}

	echo "<p>Structure of existing tables updated. Please wait...</p>";
}

/**
 * Alter table structure, part 2 (recreate indexes after the table is up to date)
 *
 */
function yourls_alter_url_table_to_14_part_two() {
	$ydb = yourls_get_db();
	$table = YOURLS_DB_TABLE_URL;

	$alters = array();
	$alters[] = "ALTER TABLE `$table` ADD PRIMARY KEY ( `keyword` )";
	$alters[] = "ALTER TABLE `$table` ADD INDEX ( `ip` )";
	$alters[] = "ALTER TABLE `$table` ADD INDEX ( `timestamp` )";

	foreach ( $alters as $query ) {
		$ydb->perform( $query );
	}

	echo "<p>New table index created</p>";
}

/**
 * Convert each link from 1.3 (id) to 1.4 (keyword) structure
 *
 */
function yourls_update_table_to_14() {
	$ydb = yourls_get_db();
	$table = YOURLS_DB_TABLE_URL;

	// Modify each link to reflect new structure
	$chunk = 45;
	$from = isset($_GET['from']) ? intval( $_GET['from'] ) : 0 ;
	$total = yourls_get_db_stats();
	$total = $total['total_links'];

	$sql = "SELECT `keyword`,`url` FROM `$table` WHERE 1=1 ORDER BY `url` ASC LIMIT $from, $chunk ;";

	$rows = $ydb->fetchObjects($sql);

	$count = 0;
	$queries = 0;
	foreach( $rows as $row ) {
		$keyword = $row->keyword;
		$url = $row->url;
		$newkeyword = yourls_int2string( $keyword );
		if( true === $ydb->perform("UPDATE `$table` SET `keyword` = '$newkeyword' WHERE `url` = '$url';") ) {
			$queries++;
		} else {
			echo "<p>Huho... Could not update rown with url='$url', from keyword '$keyword' to keyword '$newkeyword'</p>"; // Find what went wrong :/
		}
		$count++;
	}

	// All done for this chunk of queries, did it all go as expected?
	$success = true;
	if( $count != $queries ) {
		$success = false;
		$num = $count - $queries;
		echo "<p>$num error(s) occured while updating the URL table :(</p>";
	}

	if ( $count == $chunk ) {
		// there are probably other rows to convert
		$from = $from + $chunk;
		$remain = $total - $from;
		echo "<p>Converted $chunk database rows ($remain remaining). Continuing... Please do not close this window until it's finished!</p>";
		yourls_redirect_javascript( yourls_admin_url( "upgrade.php?step=2&oldver=1.3&newver=1.4&oldsql=100&newsql=200&from=$from" ), $success );
	} else {
		// All done
		echo '<p>All rows converted! Please wait...</p>';
		yourls_redirect_javascript( yourls_admin_url( "upgrade.php?step=3&oldver=1.3&newver=1.4&oldsql=100&newsql=200" ), $success );
	}

}

/**
 * Clean .htaccess as it existed before 1.4. Returns boolean
 *
 */
function yourls_clean_htaccess_for_14() {
	$filename = YOURLS_ABSPATH.'/.htaccess';

	$result = false;
	if( is_writeable( $filename ) ) {
		$contents = implode( '', file( $filename ) );
		// remove "ShortURL" block
		$contents = preg_replace( '/# BEGIN ShortURL.*# END ShortURL/s', '', $contents );
		// comment out deprecated RewriteRule
		$find = 'RewriteRule .* - [E=REMOTE_USER:%{HTTP:Authorization},L]';
		$replace = "# You can safely remove this 5 lines block -- it's no longer used in YOURLS\n".
				"# $find";
		$contents = str_replace( $find, $replace, $contents );

		// Write cleaned file
		$f = fopen( $filename, 'w' );
		fwrite( $f, $contents );
		fclose( $f );

		$result = true;
	}

	return $result;
}
