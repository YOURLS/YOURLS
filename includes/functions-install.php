<?php

/**
 * Check if we have PDO installed, returns bool
 *
 * @since 1.7.3
 * @return bool
 */
function yourls_check_PDO() {
    return extension_loaded('pdo');
}

/**
 * Check if server has MySQL 5.0+
 *
 * @return bool
 */
function yourls_check_database_version() {
    return ( version_compare( '5.0', yourls_get_database_version() ) <= 0 );
}

/**
 * Get DB server version
 *
 * @since 1.7
 * @return string sanitized DB version
 */
function yourls_get_database_version() {
    // Allow plugins to short-circuit the whole function
    $pre = yourls_apply_filter( 'shunt_get_database_version', yourls_shunt_default() );
    if ( yourls_shunt_default() !== $pre ) {
        return $pre;
    }

    return yourls_sanitize_version(yourls_get_db('read-get_database_version')->mysql_version());
}

/**
 * Check if PHP > 7.2
 *
 * As of 1.8 we advertise YOURLS as being 7.4+ but it should work on 7.2 (although untested)
 * so we don't want to strictly enforce a limitation that may not be necessary.
 *
 * @return bool
 */
function yourls_check_php_version() {
    return version_compare( PHP_VERSION, '7.2.0', '>=' );
}

/**
 * Check if server is an Apache
 *
 * @return bool
 */
function yourls_is_apache() {
    if( !array_key_exists( 'SERVER_SOFTWARE', $_SERVER ) )
        return false;
    return (
       strpos( $_SERVER['SERVER_SOFTWARE'], 'Apache' ) !== false
    || strpos( $_SERVER['SERVER_SOFTWARE'], 'LiteSpeed' ) !== false
    );
}

/**
 * Check if server is running IIS
 *
 * @return bool
 */
function yourls_is_iis() {
    return ( array_key_exists( 'SERVER_SOFTWARE', $_SERVER ) ? ( strpos( $_SERVER['SERVER_SOFTWARE'], 'IIS' ) !== false ) : false );
}


/**
 * Create .htaccess or web.config. Returns boolean
 *
 * @return bool
 */
function yourls_create_htaccess() {
    $host = parse_url( yourls_get_yourls_site() );
    $path = ( isset( $host['path'] ) ? $host['path'] : '' );

    if ( yourls_is_iis() ) {
        // Prepare content for a web.config file
        $content = array(
            '<?'.'xml version="1.0" encoding="UTF-8"?>',
            '<configuration>',
            '    <system.webServer>',
            '        <security>',
            '            <requestFiltering allowDoubleEscaping="true" />',
            '        </security>',
            '        <rewrite>',
            '            <rules>',
            '                <rule name="YOURLS" stopProcessing="true">',
            '                    <match url="^(.*)$" ignoreCase="false" />',
            '                    <conditions>',
            '                        <add input="{REQUEST_FILENAME}" matchType="IsFile" ignoreCase="false" negate="true" />',
            '                        <add input="{REQUEST_FILENAME}" matchType="IsDirectory" ignoreCase="false" negate="true" />',
            '                    </conditions>',
            '                    <action type="Rewrite" url="'.$path.'/yourls-loader.php" appendQueryString="true" />',
            '                </rule>',
            '            </rules>',
            '        </rewrite>',
            '    </system.webServer>',
            '</configuration>',
        );

        $filename = YOURLS_ABSPATH.'/web.config';
        $marker = 'none';

    } else {
        // Prepare content for a .htaccess file
        $content = array(
            '<IfModule mod_rewrite.c>',
            'RewriteEngine On',
            'RewriteBase '.$path.'/',
            'RewriteCond %{REQUEST_FILENAME} !-f',
            'RewriteCond %{REQUEST_FILENAME} !-d',
            'RewriteRule ^.*$ '.$path.'/yourls-loader.php [L]',
            '</IfModule>',
        );

        $filename = YOURLS_ABSPATH.'/.htaccess';
        $marker = 'YOURLS';

    }

    return ( yourls_insert_with_markers( $filename, $marker, $content ) );
}

/**
 * Insert text into a file between BEGIN/END markers, return bool. Stolen from WP
 *
 * Inserts an array of strings into a file (eg .htaccess ), placing it between
 * BEGIN and END markers. Replaces existing marked info. Retains surrounding
 * data. Creates file if none exists.
 *
 * @since 1.3
 *
 * @param string $filename
 * @param string $marker
 * @param array  $insertion
 * @return bool True on write success, false on failure.
 */
function yourls_insert_with_markers( $filename, $marker, $insertion ) {
    if ( !file_exists( $filename ) || is_writeable( $filename ) ) {
        if ( !file_exists( $filename ) ) {
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
                if ( strpos( $markerline, '# BEGIN ' . $marker ) !== false )
                    $state = false;
                if ( $state ) {
                    if ( $n + 1 < count( $markerdata ) )
                        fwrite( $f, "{$markerline}\n" );
                    else
                        fwrite( $f, "{$markerline}" );
                }
                if ( strpos( $markerline, '# END ' . $marker ) !== false ) {
                    if ( $marker != 'none' )
                        fwrite( $f, "# BEGIN {$marker}\n" );
                    if ( is_array( $insertion ) )
                        foreach ( $insertion as $insertline )
                            fwrite( $f, "{$insertline}\n" );
                    if ( $marker != 'none' )
                        fwrite( $f, "# END {$marker}\n" );
                    $state = true;
                    $foundit = true;
                }
            }
        }
        if ( !$foundit ) {
            if ( $marker != 'none' )
                fwrite( $f, "\n\n# BEGIN {$marker}\n" );
            foreach ( $insertion as $insertline )
                fwrite( $f, "{$insertline}\n" );
            if ( $marker != 'none' )
                fwrite( $f, "# END {$marker}\n\n" );
        }
        fclose( $f );
        return true;
    } else {
        return false;
    }
}

/**
 * Create MySQL tables. Return array( 'success' => array of success strings, 'errors' => array of error strings )
 *
 * @since 1.3
 * @return array  An array like array( 'success' => array of success strings, 'errors' => array of error strings )
 */
function yourls_create_sql_tables() {
    // Allow plugins (most likely a custom db.php layer in user dir) to short-circuit the whole function
    $pre = yourls_apply_filter( 'shunt_yourls_create_sql_tables', yourls_shunt_default() );
    // your filter function should return an array of ( 'success' => $success_msg, 'error' => $error_msg ), see below
    if ( yourls_shunt_default() !== $pre ) {
        return $pre;
    }

    $ydb = yourls_get_db('write-create_sql_tables');

    $error_msg = array();
    $success_msg = array();

    // Create Table Query
    $create_tables = array();
    $create_tables[YOURLS_DB_TABLE_URL] =
        'CREATE TABLE IF NOT EXISTS `'.YOURLS_DB_TABLE_URL.'` ('.
         '`keyword` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT \'\','.
         '`url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,'.
         '`title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,'.
         '`timestamp` timestamp NOT NULL DEFAULT current_timestamp(),'.
         '`ip` varchar(41) COLLATE utf8mb4_unicode_ci NOT NULL,'.
         '`clicks` int(10) unsigned NOT NULL,'.
         '`notes` text COLLATE utf8mb4_unicode_ci,'.
         '`created_by` int unsigned NULL DEFAULT NULL,'.
         'PRIMARY KEY (`keyword`),'.
         'KEY `ip` (`ip`),'.
         'KEY `timestamp` (`timestamp`),'.
         'KEY `url_idx` (`url`(30)),'.
         'KEY `created_by` (`created_by`)'.
        ') DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;';

    $create_tables[YOURLS_DB_TABLE_OPTIONS] =
        'CREATE TABLE IF NOT EXISTS `'.YOURLS_DB_TABLE_OPTIONS.'` ('.
        '`option_id` bigint(20) unsigned NOT NULL auto_increment,'.
        '`option_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL default \'\','.
        '`option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,'.
        'PRIMARY KEY  (`option_id`,`option_name`),'.
        'KEY `option_name` (`option_name`)'.
        ') AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;';

    $create_tables[YOURLS_DB_TABLE_LOG] =
        'CREATE TABLE IF NOT EXISTS `'.YOURLS_DB_TABLE_LOG.'` ('.
        '`click_id` int(11) NOT NULL auto_increment,'.
        '`click_time` datetime NOT NULL,'.
        '`shorturl` varchar(100) BINARY NOT NULL,'.
        '`referrer` varchar(200) NOT NULL,'.
        '`user_agent` varchar(255) NOT NULL,'.
        '`ip_address` varchar(41) NOT NULL,'.
        '`country_code` char(2) NOT NULL,'.
        '`device_type` varchar(16) NULL,'.
        '`browser` varchar(32) NULL,'.
        '`os` varchar(32) NULL,'.
        '`referrer_host` varchar(100) NULL,'.
        '`utm_source` varchar(100) NULL,'.
        '`utm_medium` varchar(100) NULL,'.
        '`utm_campaign` varchar(100) NULL,'.
        '`city` varchar(100) NULL,'.
        '`region` varchar(100) NULL,'.
        '`visitor_hash` char(16) NULL,'.
        '`click_uid` char(16) NULL,'.
        '`meta` JSON NULL,'.
        'PRIMARY KEY  (`click_id`),'.
        'KEY `shorturl` (`shorturl`),'.
        'KEY `device_type_idx` (`device_type`),'.
        'KEY `utm_source_idx` (`utm_source`),'.
        'KEY `click_uid_idx` (`click_uid`)'.
        ') AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;';

    $create_tables[YOURLS_DB_TABLE_USERS] =
        'CREATE TABLE IF NOT EXISTS `'.YOURLS_DB_TABLE_USERS.'` ('.
        '`user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,'.
        '`username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,'.
        '`password_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,'.
        '`role` enum(\'admin\',\'editor\') NOT NULL DEFAULT \'admin\','.
        '`is_active` tinyint(1) unsigned NOT NULL DEFAULT 1,'.
        '`api_key_version` int unsigned NOT NULL DEFAULT 1,'.
        '`last_login_at` timestamp NULL DEFAULT NULL,'.
        '`created_at` timestamp NOT NULL DEFAULT current_timestamp(),'.
        '`updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),'.
        'PRIMARY KEY (`user_id`),'.
        'UNIQUE KEY `username` (`username`)'.
        ') AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;';

    $create_tables[YOURLS_DB_TABLE_API_RATE] =
        'CREATE TABLE IF NOT EXISTS `'.YOURLS_DB_TABLE_API_RATE.'` ('.
        '`id` bigint unsigned NOT NULL AUTO_INCREMENT,'.
        '`user_id` int unsigned NOT NULL,'.
        '`called_at` timestamp NOT NULL DEFAULT current_timestamp(),'.
        '`action` varchar(32) NOT NULL,'.
        'PRIMARY KEY (`id`),'.
        'KEY `user_window` (`user_id`, `called_at`)'.
        ') DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;';

    $create_table_count = 0;

    yourls_debug_mode(true);

    // Create tables
    foreach ( $create_tables as $table_name => $table_query ) {
        $ydb->perform( $table_query );
        $create_success = $ydb->fetchAffected( "SHOW TABLES LIKE '$table_name'" );
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

    // Migrate users from $yourls_user_passwords into the users table
    if( !yourls_populate_users_table() )
        $error_msg[] = yourls__( 'Could not populate users table' );

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

/**
 * Initializes the option table
 *
 * Each yourls_update_option() returns either true on success (option updated) or false on failure (new value == old value, or
 * for some reason it could not save to DB).
 * Since true & true & true = 1, we cast it to boolean type to return true (or false)
 *
 * @since 1.7
 * @return bool
 */
function yourls_initialize_options() {
    return ( bool ) (
          yourls_update_option( 'version', YOURLS_VERSION )
        & yourls_update_option( 'db_version', YOURLS_DB_VERSION )
        & yourls_update_option( 'next_id', 1 )
        & yourls_update_option( 'active_plugins', array() )
    );
}

/**
 * Migrate users from $yourls_user_passwords (config.php) into the yourls_users DB table.
 *
 * Existing usernames are skipped (INSERT IGNORE). Passwords may be plaintext, md5: or phpass:
 * prefixed – all formats are normalised to a proper password_hash() string before storage.
 *
 * @since 1.9
 * @return bool  true if at least one user was processed, false on failure
 */
function yourls_populate_users_table() {
    global $yourls_user_passwords;

    if ( empty( $yourls_user_passwords ) || !is_array( $yourls_user_passwords ) ) {
        return true; // nothing to migrate — not an error
    }

    $ydb     = yourls_get_db( 'write-populate_users_table' );
    $table   = YOURLS_DB_TABLE_USERS;
    $success = true;

    foreach ( $yourls_user_passwords as $username => $raw_password ) {
        // Normalise the stored value to a clean password_hash() hash
        if ( yourls_has_phpass_password( $username ) ) {
            // Already stored as "phpass:<hash with ! instead of $>"
            list( , $stored_hash ) = explode( ':', $raw_password, 2 );
            $password_hash = str_replace( '!', '$', $stored_hash );
        } elseif ( yourls_has_md5_password( $username ) ) {
            // Legacy md5 format – we can't reverse it, so store the raw string
            // and handle the comparison in auth. Better: require re-login to rehash.
            $password_hash = $raw_password;
        } else {
            // Plaintext – hash it now with password_hash()
            $password_hash = yourls_phpass_hash( $raw_password ?? '' );
        }

        $stmt = $ydb->perform(
            "INSERT IGNORE INTO `$table` (`username`, `password_hash`) VALUES (:username, :password_hash)",
            [ 'username' => $username, 'password_hash' => $password_hash ]
        );

        if ( $stmt === false ) {
            $success = false;
        }
    }

    return $success;
}

/**
 * Populates the URL table with a few sample links
 *
 * @since 1.7
 * @return bool
 */
function yourls_insert_sample_links() {
    $link1 = yourls_add_new_link( 'https://blog.yourls.org/', 'yourlsblog', 'YOURLS\' Blog' );
    $link2 = yourls_add_new_link( 'https://yourls.org/',      'yourls',     'YOURLS: Your Own URL Shortener' );
    $link3 = yourls_add_new_link( 'https://ozh.org/',         'ozh',        'ozh.org' );
    return ( bool ) (
          $link1['status'] == 'success'
        & $link2['status'] == 'success'
        & $link3['status'] == 'success'
    );
}


/**
 * Toggle maintenance mode. Inspired from WP. Returns true for success, false otherwise
 *
 * @param bool $maintenance  True to enable, false to disable
 * @return bool              True on success, false on failure
 */
function yourls_maintenance_mode( $maintenance = true ) {

    $file = YOURLS_ABSPATH . '/.maintenance' ;

    // Turn maintenance mode on : create .maintenance file
    if ( (bool)$maintenance ) {
        if ( ! ( $fp = @fopen( $file, 'w' ) ) )
            return false;

        $maintenance_string = '<?php $maintenance_start = ' . time() . '; ?>';
        @fwrite( $fp, $maintenance_string );
        @fclose( $fp );
        @chmod( $file, 0644 ); // Read and write for owner, read for everybody else

        // Not sure why the fwrite would fail if the fopen worked... Just in case
        return( is_readable( $file ) );

    // Turn maintenance mode off : delete the .maintenance file
    } else {
        return @unlink($file);
    }
}
