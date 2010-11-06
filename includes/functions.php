<?php
/*
 * YOURLS
 * Function library
 */

// Determine the allowed character set in short URLs
function yourls_get_shorturl_charset() {
	static $charset = null;
	if( $charset !== null )
		return $charset;
		
	if( !defined('YOURLS_URL_CONVERT') ) {
		$charset = '0123456789abcdefghijklmnopqrstuvwxyz';
	} else {
		switch( YOURLS_URL_CONVERT ) {
			case 36:
				$charset = '0123456789abcdefghijklmnopqrstuvwxyz';
				break;
			case 62:
			case 64: // just because some people get this wrong in their config.php
				$charset = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				break;
		}
	}
	
	$charset = yourls_apply_filter( 'get_shorturl_charset', $charset );
	return $charset;
}
 
// function to convert an integer (1337) to a string (3jk).
function yourls_int2string( $num, $chars = null ) {
	if( $chars == null )
		$chars = yourls_get_shorturl_charset();
	$string = '';
	$len = strlen( $chars );
	while( $num >= $len ) {
		$mod = bcmod( $num, $len );
		$num = bcdiv( $num, $len );
		$string = $chars[$mod] . $string;
	}
	$string = $chars[$num] . $string;
	
	return yourls_apply_filter( 'int2string', $string, $num, $chars );
}

// function to convert a string (3jk) to an integer (1337)
function yourls_string2int( $string, $chars = null ) {
	if( $chars == null )
		$chars = yourls_get_shorturl_charset();
	$integer = 0;
	$string = strrev( $string  );
	$baselen = strlen( $chars );
	$inputlen = strlen( $string );
	for ($i = 0; $i < $inputlen; $i++) {
		$index = strpos( $chars, $string[$i] );
		$integer = bcadd( $integer, bcmul( $index, bcpow( $baselen, $i ) ) );
	}
	return yourls_apply_filter( 'string2int', $integer, $string, $chars );
	
}

// Make sure a link keyword (ie "1fv" as in "site.com/1fv") is valid.
function yourls_sanitize_string( $string ) {
	// make a regexp pattern with the shorturl charset, and remove everything but this
	$pattern = yourls_make_regexp_pattern( yourls_get_shorturl_charset() );
	$valid = substr(preg_replace('/[^'.$pattern.']/', '', $string ), 0, 199);
	
	return yourls_apply_filter( 'sanitize_string', $valid, $string );
}

// Make an optimized regexp pattern from a string of characters
function yourls_make_regexp_pattern( $string ) {
	$pattern = preg_quote( $string, '-' ); // add - as an escaped characters -- this is fixed in PHP 5.3
	// TODO: replace char sequences by smart sequences such as 0-9, a-z, A-Z ... ?
	return $pattern;
}

// Alias function. I was always getting it wrong.
function yourls_sanitize_keyword( $keyword ) {
	return yourls_sanitize_string( $keyword );
}

// Sanitize a page title. No HTML per W3C http://www.w3.org/TR/html401/struct/global.html#h-7.4.2
function yourls_sanitize_title( $title ) {
	// TODO: make stronger Implement KSES?
	$title = strip_tags( $title );
	// Remove extra white space
	$title = preg_replace( "/\s+/", ' ', trim( $title ) );
	return $title;
}

// Is an URL a short URL?
function yourls_is_shorturl( $shorturl ) {
	// TODO: make sure this function evolves with the feature set.
	
	$is_short = false;
	$keyword = preg_replace( '!^'.YOURLS_SITE.'/!', '', $shorturl ); // accept either 'http://ozh.in/abc' or 'abc'
	if( $keyword && $keyword == yourls_sanitize_string( $keyword ) && yourls_keyword_is_taken( $keyword ) ) {
		$is_short = true;
	}
	
	return yourls_apply_filter( 'is_shorturl', $is_short, $shorturl );
}

// A few sanity checks on the URL
function yourls_sanitize_url($url) {
	// make sure there's only one 'http://' at the beginning (prevents pasting a URL right after the default 'http://')
	$url = str_replace('http://http://', 'http://', $url);

	// make sure there's a protocol, add http:// if not
	if ( !preg_match('!^([a-zA-Z]+://)!', $url ) )
		$url = 'http://'.$url;
	
	$url = yourls_clean_url($url);
	
	return substr( $url, 0, 1999 );
}

// Function to filter all invalid characters from a URL. Stolen from WP's clean_url()
function yourls_clean_url( $url ) {
	$url = preg_replace('|[^a-z0-9-~+_.?\[\]\^#=!&;,/:%@$\|*\'"()\\x80-\\xff]|i', '', $url );
	$strip = array('%0d', '%0a', '%0D', '%0A');
	$url = yourls_deep_replace($strip, $url);
	$url = str_replace(';//', '://', $url);
	$url = str_replace('&amp;', '&', $url); // Revert & not to break query strings
	
	return $url;
}

// Perform a replacement while a string is found, eg $subject = '%0%0%0DDD', $search ='%0D' -> $result =''
// Stolen from WP's _deep_replace
function yourls_deep_replace($search, $subject){
	$found = true;
	while($found) {
		$found = false;
		foreach( (array) $search as $val ) {
			while(strpos($subject, $val) !== false) {
				$found = true;
				$subject = str_replace($val, '', $subject);
			}
		}
	}
	
	return $subject;
}

// Make sure an integer is a valid integer (PHP's intval() limits to too small numbers)
// TODO FIXME FFS: unused ?
function yourls_sanitize_int($in) {
	return ( substr(preg_replace('/[^0-9]/', '', strval($in) ), 0, 20) );
}

// Make sure a integer is safe
// Note: this is not checking for integers, since integers on 32bits system are way too limited
// TODO: find a way to validate as integer
function yourls_intval($in) {
	return yourls_escape($in);
}

// Escape a string
function yourls_escape( $in ) {
	return mysql_real_escape_string($in);
}

// Check to see if a given keyword is reserved (ie reserved URL or an existing page)
// Returns bool
function yourls_keyword_is_reserved( $keyword ) {
	global $yourls_reserved_URL;
	$keyword = yourls_sanitize_keyword( $keyword );
	$reserved = false;
	
	if ( in_array( $keyword, $yourls_reserved_URL)
		or file_exists( YOURLS_ABSPATH ."/pages/$keyword.php" )
		or is_dir( YOURLS_ABSPATH ."/$keyword" )
	)
		$reserved = true;
	
	return yourls_apply_filter( 'keyword_is_reserved', $reserved, $keyword );
}

// Function: Get IP Address. Returns a DB safe string.
function yourls_get_IP() {
	if( !empty( $_SERVER['REMOTE_ADDR'] ) ) {
		$ip = $_SERVER['REMOTE_ADDR'];
	} else {
		if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else if(!empty($_SERVER['HTTP_VIA '])) {
			$ip = $_SERVER['HTTP_VIA '];
		}
	}

	return yourls_apply_filter( 'get_IP', yourls_sanitize_ip( $ip ) );
}

// Sanitize an IP address
function yourls_sanitize_ip( $ip ) {
	return preg_replace( '/[^0-9a-fA-F:., ]/', '', $ip );
}

// Make sure a date is m(m)/d(d)/yyyy, return false otherwise
function yourls_sanitize_date( $date ) {
	if( !preg_match( '!^\d{1,2}/\d{1,2}/\d{4}$!' , $date ) ) {
		return false;
	}
	return $date;
}

// Sanitize a date for SQL search. Return false if malformed input.
function yourls_sanitize_date_for_sql( $date ) {
	if( !yourls_sanitize_date( $date ) )
		return false;
	return date('Y-m-d', strtotime( $date ) );
}

// Add the "Edit" row
function yourls_table_edit_row( $keyword ) {
	global $ydb;
	
	$table = YOURLS_DB_TABLE_URL;
	$keyword = yourls_sanitize_string( $keyword );
	$id = yourls_string2int( $keyword ); // used as HTML #id
	$url = yourls_get_keyword_longurl( $keyword );
	$title = htmlspecialchars( yourls_get_keyword_title( $keyword ) );
	$safe_url = stripslashes( $url );
	$safe_title = stripslashes( $title );
	$www = YOURLS_SITE;
	
	$save_link = yourls_nonce_url( 'save-link_'.$id,
		yourls_add_query_arg( array( 'id' => $id, 'action' => 'edit_save', 'keyword' => $keyword ), yourls_admin_url( 'admin-ajax.php' ) ) 
	);
	
	$nonce = yourls_create_nonce( 'edit-save_'.$id );
	
	if( $url ) {
		$return = <<<RETURN
<tr id="edit-$id" class="edit-row"><td colspan="5"><strong>Original URL</strong>:<input type="text" id="edit-url-$id" name="edit-url-$id" value="$safe_url" class="text" size="70" /> <strong>Short URL</strong>: $www/<input type="text" id="edit-keyword-$id" name="edit-keyword-$id" value="$keyword" class="text" size="10" /><br/><strong>Title</strong>: <input type="text" id="edit-title-$id" name="edit-title-$id" value="$title" class="text" size="60" /></td><td colspan="1"><input type="button" id="edit-submit-$id" name="edit-submit-$id" value="Save" title="Save new values" class="button" onclick="edit_save('$id');" />&nbsp;<input type="button" id="edit-close-$id" name="edit-close-$id" value="X" title="Cancel editing" class="button" onclick="hide_edit('$id');" /><input type="hidden" id="old_keyword_$id" value="$keyword"/><input type="hidden" id="nonce_$id" value="$nonce"/></td></tr>
RETURN;
	} else {
		$return = '<tr><td colspan="6">Error, URL not found</td></tr>';
	}
	
	$return = yourls_apply_filter( 'table_edit_row', $return, $keyword, $url, $title );

	return $return;
}

// Add a link row
function yourls_table_add_row( $keyword, $url, $title = '', $ip, $clicks, $timestamp ) {
	$keyword  = yourls_sanitize_string( $keyword );
	$display_keyword = htmlentities( $keyword );

	$url = yourls_sanitize_url( $url );
	$display_url = htmlentities( yourls_trim_long_string( $url ) );
	$title_url = htmlspecialchars( $url );
	
	$title = yourls_sanitize_title( $title ) ;
	$display_title   = yourls_trim_long_string( $title );
	$title = htmlspecialchars( $title );

	$id      = yourls_string2int( $keyword ); // used as HTML #id
	$date    = date( 'M d, Y H:i', $timestamp+( YOURLS_HOURS_OFFSET * 3600) );
	$clicks  = number_format($clicks, 0, '', '');

	$shorturl = YOURLS_SITE.'/'.$keyword;
	$statlink = $shorturl.'+';
	
	if( $title ) {
		$display_link = "<a href=\"$url\" title=\"$title\">$display_title</a><br/><small><a href=\"$url\" title=\"$title_url\">$display_url</a></small>";
	} else {
		$display_link = "<a href=\"$url\" title=\"$title_url\">$display_url</a>";
	}
	
	$delete_link = yourls_nonce_url( 'delete-link_'.$id,
		yourls_add_query_arg( array( 'id' => $id, 'action' => 'delete', 'keyword' => $keyword ), yourls_admin_url( 'admin-ajax.php' ) ) 
	);
	
	$edit_link = yourls_nonce_url( 'edit-link_'.$id,
		yourls_add_query_arg( array( 'id' => $id, 'action' => 'edit', 'keyword' => $keyword ), yourls_admin_url( 'admin-ajax.php' ) ) 
	);
	
	
	
	$actions = <<<ACTION
<a href="$statlink" id="statlink-$id" title="Stats" class="button button_stats">Stats</a><a href="" id="share-button-$id" name="share-button" title="Share" class="button button_share" onclick="toggle_share('$id');return false;">Share</a><a href="$edit_link" id="edit-button-$id" name="edit-button" title="Edit" class="button button_edit" onclick="edit('$id');return false;">Edit</a><a href="$delete_link" id="delete-button-$id" name="delete-button" title="Delete" class="button button_delete" onclick="remove('$id');return false;">Delete</a>
ACTION;
	$actions = yourls_apply_filter( 'action_links', $actions, $keyword, $url, $ip, $clicks, $timestamp );
	
	$row = <<<ROW
<tr id="id-$id"><td id="keyword-$id" class="keyword"><a href="$shorturl">$display_keyword</a></td><td id="url-$id" class="url">$display_link</td><td id="timestamp-$id" class="timestamp">$date</td><td id="ip-$id" class="ip">$ip</td><td id="clicks-$id" class="clicks">$clicks</td><td class="actions" id="actions-$id">$actions<input type="hidden" id="keyword_$id" value="$keyword"/></td></tr>
ROW;
	$row = yourls_apply_filter( 'table_add_row', $row, $keyword, $url, $title, $ip, $clicks, $timestamp );
	
	return $row;
}

// Get next id a new link will have if no custom keyword provided
function yourls_get_next_decimal() {
	return yourls_apply_filter( 'get_next_decimal', (int)yourls_get_option( 'next_id' ) );
}

// Update id for next link with no custom keyword
function yourls_update_next_decimal( $int = '' ) {
	$int = ( $int == '' ) ? yourls_get_next_decimal() + 1 : (int)$int ;
	$update = yourls_update_option( 'next_id', $int );
	yourls_do_action( 'update_next_decimal', $int, $update );
	return $update;
}

// Delete a link in the DB
function yourls_delete_link_by_keyword( $keyword ) {
	global $ydb;

	$table = YOURLS_DB_TABLE_URL;
	$keyword = yourls_sanitize_string( $keyword );
	$delete = $ydb->query("DELETE FROM `$table` WHERE `keyword` = '$keyword';");
	yourls_do_action( 'delete_link', $keyword, $delete );
	return $delete;
}

// SQL query to insert a new link in the DB. Returns boolean for success or failure of the inserting
function yourls_insert_link_in_db( $url, $keyword, $title = '' ) {
	global $ydb;
	
	$url     = addslashes( yourls_sanitize_url( $url ) );
	$keyword = addslashes( yourls_sanitize_keyword( $keyword ) );
	$title   = addslashes( yourls_sanitize_title( $title ) );

	$table = YOURLS_DB_TABLE_URL;
	$timestamp = date('Y-m-d H:i:s');
	$ip = yourls_get_IP();
	$insert = $ydb->query("INSERT INTO `$table` VALUES('$keyword', '$url', '$title', '$timestamp', '$ip', 0);");
	
	yourls_do_action( 'insert_link', (bool)$insert, $url, $keyword, $title, $timestamp, $ip );
	
	return (bool)$insert;
}

// Add a new link in the DB, either with custom keyword, or find one
function yourls_add_new_link( $url, $keyword = '', $title = '' ) {
	global $ydb;

	if ( !$url || $url == 'http://' || $url == 'https://' ) {
		$return['status'] = 'fail';
		$return['code'] = 'error:nourl';
		$return['message'] = 'Missing URL input';
		$return['errorCode'] = '400';
		yourls_do_action( 'add_new_link_fail_nourl' );
		return $return;
	}
	
	// Prevent DB flood
	$ip = yourls_get_IP();
	yourls_check_IP_flood( $ip );
	
	// Prevent internal redirection loops: cannot shorten a shortened URL
	$url = yourls_escape( yourls_sanitize_url($url) );
	if( preg_match( '!^'.YOURLS_SITE.'/!', $url ) ) {
		if( yourls_is_shorturl( $url ) ) {
			$return['status'] = 'fail';
			$return['code'] = 'error:noloop';
			$return['message'] = 'URL is a short URL';
			$return['errorCode'] = '400';
			yourls_do_action( 'add_new_link_fail_noloop' );
			return $return;
		}
	}

	yourls_do_action( 'pre_add_new_link', $url, $keyword );
	
	$table = YOURLS_DB_TABLE_URL;
	$strip_url = stripslashes($url);
	$url_exists = $ydb->get_row("SELECT * FROM `$table` WHERE `url` = '".$strip_url."';");
	$return = array();

	// New URL : store it -- or: URL exists, but duplicates allowed
	if( !$url_exists || yourls_allow_duplicate_longurls() ) {
	
		if( isset( $title ) && !empty( $title ) ) {
			$title = yourls_sanitize_title( $title );
		} else {
			$title = yourls_get_remote_title( $url );
		}
		$title = yourls_apply_filter( 'add_new_title', $title );

		// Custom keyword provided
		if ( $keyword ) {
			$keyword = yourls_escape( yourls_sanitize_string($keyword) );
			$keyword = yourls_apply_filter( 'custom_keyword', $keyword );
			if ( !yourls_keyword_is_free($keyword) ) {
				// This shorturl either reserved or taken already
				$return['status'] = 'fail';
				$return['code'] = 'error:keyword';
				$return['message'] = 'Short URL '.$keyword.' already exists in database or is reserved';
			} else {
				// all clear, store !
				yourls_insert_link_in_db( $url, $keyword, $title );
				$return['url'] = array('keyword' => $keyword, 'url' => $strip_url, 'title' => $title, 'date' => date('Y-m-d H:i:s'), 'ip' => $ip );
				$return['status'] = 'success';
				$return['message'] = yourls_trim_long_string( $strip_url ).' added to database';
				$return['title'] = $title;
				$return['html'] = yourls_table_add_row( $keyword, $url, $title, $ip, 0, time() );
				$return['shorturl'] = YOURLS_SITE .'/'. $keyword;
			}

		// Create random keyword	
		} else {
			$timestamp = date('Y-m-d H:i:s');
			$id = yourls_get_next_decimal();
			$ok = false;
			do {
				$keyword = yourls_int2string( $id );
				$keyword = yourls_apply_filter( 'random_keyword', $keyword );
				$free = yourls_keyword_is_free($keyword);
				$add_url = @yourls_insert_link_in_db( $url, $keyword, $title );
				$ok = ($free && $add_url);
				if ( $ok === false && $add_url === 1 ) {
					// we stored something, but shouldn't have (ie reserved id)
					$delete = yourls_delete_link_by_keyword( $keyword );
					$return['extra_info'] .= '(deleted '.$keyword.')';
				} else {
					// everything ok, populate needed vars
					$return['url'] = array('keyword' => $keyword, 'url' => $strip_url, 'title' => $title, 'date' => $timestamp, 'ip' => $ip );
					$return['status'] = 'success';
					$return['message'] = yourls_trim_long_string( $strip_url ).' added to database';
					$return['title'] = $title;
					$return['html'] = yourls_table_add_row( $keyword, $url, $title, $ip, 0, time() );
					$return['shorturl'] = YOURLS_SITE .'/'. $keyword;
				}
				$id++;
			} while (!$ok);
			@yourls_update_next_decimal($id);
		}

	// URL was already stored
	} else {
		$return['status'] = 'fail';
		$return['code'] = 'error:url';
		$return['url'] = array( 'keyword' => $keyword, 'url' => $strip_url, 'title' => $url_exists->title, 'date' => $url_exists->timestamp, 'ip' => $url_exists->ip, 'clicks' => $url_exists->clicks );
		$return['message'] = yourls_trim_long_string( $strip_url ).' already exists in database';
		$return['title'] = $url_exists->title; 
		$return['shorturl'] = YOURLS_SITE .'/'. $url_exists->keyword;
	}
	
	yourls_do_action( 'post_add_new_link', $url, $keyword );

	$return['statusCode'] = 200; // regardless of result, this is still a valid request
	return $return;
}


// Edit a link
function yourls_edit_link( $url, $keyword, $newkeyword='', $title='' ) {
	global $ydb;

	$table = YOURLS_DB_TABLE_URL;
	$url = yourls_escape(yourls_sanitize_url($url));
	$keyword = yourls_escape(yourls_sanitize_string( $keyword ));
	$title = yourls_escape(yourls_sanitize_title( $title ));
	$newkeyword = yourls_escape(yourls_sanitize_string( $newkeyword ));
	$strip_url = stripslashes($url);
	$strip_title = stripslashes($title);
	$old_url = $ydb->get_var("SELECT `url` FROM `$table` WHERE `keyword` = '$keyword';");
	$old_id = $id = yourls_string2int( $keyword );
	$new_id = ( $newkeyword == '' ? $old_id : yourls_string2int( $newkeyword ) );
	
	// Check if new URL is not here already
	if ( $old_url != $url && !yourls_allow_duplicate_longurls() ) {
		$new_url_already_there = intval($ydb->get_var("SELECT COUNT(keyword) FROM `$table` WHERE `url` = '$strip_url';"));
	} else {
		$new_url_already_there = false;
	}
	
	// Check if the new keyword is not here already
	if ( $newkeyword != $keyword ) {
		$keyword_is_ok = yourls_keyword_is_free( $newkeyword );
	} else {
		$keyword_is_ok = true;
	}
	
	yourls_do_action( 'pre_edit_link', $url, $keyword, $newkeyword, $new_url_already_there, $keyword_is_ok );
	
	// All clear, update
	if ( ( !$new_url_already_there || yourls_allow_duplicate_longurls() ) && $keyword_is_ok ) {
			$update_url = $ydb->query("UPDATE `$table` SET `url` = '$url', `keyword` = '$newkeyword', `title` = '$title' WHERE `keyword` = '$keyword';");
		if( $update_url ) {
			$return['url'] = array( 'keyword' => $newkeyword, 'shorturl' => YOURLS_SITE.'/'.$newkeyword, 'url' => $strip_url, 'display_url' => yourls_trim_long_string( $strip_url ), 'new_id' => $new_id, 'title' => $strip_title, 'display_title' => yourls_trim_long_string( $strip_title ) );
			$return['status'] = 'success';
			$return['message'] = 'Link updated in database';
		} else {
			$return['status'] = 'fail';
			$return['message'] = 'Error updating '. yourls_trim_long_string( $strip_url ).' (Short URL: '.$keyword.') to database';
		}
	
	// Nope
	} else {
		$return['status'] = 'fail';
		$return['message'] = 'URL or keyword already exists in database';
	}
	
	return yourls_apply_filter( 'edit_link', $return, $url, $keyword, $newkeyword, $title, $new_url_already_there, $keyword_is_ok );
}

// Update a title link (no checks for duplicates etc..)
function yourls_edit_link_title( $keyword, $title ) {
	global $ydb;
	
	$keyword = yourls_escape( yourls_sanitize_keyword( $keyword ) );
	$title = yourls_escape( yourls_sanitize_title( $title ) );
	
	$table = YOURLS_DB_TABLE_URL;
	$update = $ydb->query("UPDATE `$table` SET `title` = '$title' WHERE `keyword` = '$keyword';");

	return $update;
}


// Check if keyword id is free (ie not already taken, and not reserved). Return bool.
function yourls_keyword_is_free( $keyword ) {
	$free = true;
	if ( yourls_keyword_is_reserved( $keyword ) or yourls_keyword_is_taken( $keyword ) )
		$free = false;
		
	return yourls_apply_filter( 'keyword_is_free', $free, $keyword );
}

// Check if a keyword is taken (ie there is already a short URL with this id). Return bool.		
function yourls_keyword_is_taken( $keyword ) {
	global $ydb;
	$keyword = yourls_sanitize_keyword( $keyword );
	$taken = false;
	$table = YOURLS_DB_TABLE_URL;
	$already_exists = $ydb->get_var("SELECT COUNT(`keyword`) FROM `$table` WHERE `keyword` = '$keyword';");
	if ( $already_exists )
		$taken = true;

	return yourls_apply_filter( 'keyword_is_taken', $taken, $keyword );
}


// Display a page
function yourls_page( $page ) {
	$include = YOURLS_ABSPATH . "/pages/$page.php";
	if (!file_exists($include)) {
		yourls_die("Page '$page' not found", 'Not found', 404);
	}
	yourls_do_action( 'pre_page', $page );
	include($include);
	yourls_do_action( 'post_page', $page );
	die();	
}

// Connect to DB
function yourls_db_connect() {
	global $ydb;

	if (!defined('YOURLS_DB_USER')
		or !defined('YOURLS_DB_PASS')
		or !defined('YOURLS_DB_NAME')
		or !defined('YOURLS_DB_HOST')
		or !class_exists('ezSQL_mysql')
	) yourls_die ('DB config missing, or could not find DB class', 'Fatal error', 503);
	
	// Are we standalone or in the WordPress environment?
	if ( class_exists('wpdb') ) {
		$ydb =  new wpdb(YOURLS_DB_USER, YOURLS_DB_PASS, YOURLS_DB_NAME, YOURLS_DB_HOST);
	} else {
		$ydb =  new ezSQL_mysql(YOURLS_DB_USER, YOURLS_DB_PASS, YOURLS_DB_NAME, YOURLS_DB_HOST);
	}
	if ( $ydb->last_error )
		yourls_die( $ydb->last_error, 'Fatal error', 503 );
	
	if ( defined('YOURLS_DEBUG') && YOURLS_DEBUG === true )
		$ydb->show_errors = true;
	
	return $ydb;
}

// Return XML output.
function yourls_xml_encode($array) {
	require_once(YOURLS_INC.'/functions-xml.php');
	$converter= new yourls_array2xml;
	return $converter->array2xml($array);
}

// Return array of all informations associated with keyword. Returns false if keyword not found. Set optional $use_cache to false to force fetching from DB
function yourls_get_keyword_infos( $keyword, $use_cache = true ) {
	global $ydb;
	$keyword = yourls_sanitize_string( $keyword );

	yourls_do_action( 'pre_get_keyword', $keyword, $use_cache );

	if( isset( $ydb->infos[$keyword] ) && $use_cache == true ) {
		return yourls_apply_filter( 'get_keyword_infos', $ydb->infos[$keyword], $keyword );
	}
	
	yourls_do_action( 'get_keyword_not_cached', $keyword );
	
	$table = YOURLS_DB_TABLE_URL;
	$infos = $ydb->get_row("SELECT * FROM `$table` WHERE `keyword` = '$keyword'");
	
	if( $infos ) {
		$infos = (array)$infos;
		$ydb->infos[$keyword] = $infos;
	} else {
		$ydb->infos[$keyword] = false;
	}
		
	return yourls_apply_filter( 'get_keyword_infos', $ydb->infos[$keyword], $keyword );
}

// Return (string) selected information associated with a keyword. Optional $notfound = string default message if nothing found
function yourls_get_keyword_info( $keyword, $field, $notfound = false ) {
	$keyword = yourls_sanitize_string( $keyword );
	$infos = yourls_get_keyword_infos( $keyword );
	
	$return = $notfound;
	if ( isset($infos[$field]) && $infos[$field] !== false )
		$return = $infos[$field];

	return yourls_apply_filter( 'get_keyword_info', $return, $keyword, $field, $notfound );	
}

// Return title associated with keyword. Optional $notfound = string default message if nothing found
function yourls_get_keyword_title( $keyword, $notfound = false ) {
	return yourls_get_keyword_info( $keyword, 'title', $notfound );
}

// Return long URL associated with keyword. Optional $notfound = string default message if nothing found
function yourls_get_keyword_longurl( $keyword, $notfound = false ) {
	return yourls_get_keyword_info( $keyword, 'url', $notfound );
}

// Return number of clicks on a keyword. Optional $notfound = string default message if nothing found
function yourls_get_keyword_clicks( $keyword, $notfound = false ) {
	return yourls_get_keyword_info( $keyword, 'clicks', $notfound );
}

// Return IP that added a keyword. Optional $notfound = string default message if nothing found
function yourls_get_keyword_IP( $keyword, $notfound = false ) {
	return yourls_get_keyword_info( $keyword, 'ip', $notfound );
}

// Return timestamp associated with a keyword. Optional $notfound = string default message if nothing found
function yourls_get_keyword_timestamp( $keyword, $notfound = false ) {
	return yourls_get_keyword_info( $keyword, 'timestamp', $notfound );
}

// Update click count on a short URL. Return 0/1 for error/success.
function yourls_update_clicks( $keyword ) {
	global $ydb;
	$keyword = yourls_sanitize_string( $keyword );
	$table = YOURLS_DB_TABLE_URL;
	$update = $ydb->query("UPDATE `$table` SET `clicks` = clicks + 1 WHERE `keyword` = '$keyword'");
	yourls_do_action( 'update_clicks', $keyword, $update );
	return $update;
}

// Return array of stats. (string)$filter is 'bottom', 'last', 'rand' or 'top'. (int)$limit is the number of links to return
function yourls_get_stats( $filter = 'top', $limit = 10 ) {
	global $ydb;

	switch( $filter ) {
		case 'bottom':
			$sort_by = 'clicks';
			$sort_order = 'asc';
			break;
		case 'last':
			$sort_by = 'timestamp';
			$sort_order = 'desc';
			break;
		case 'rand':
		case 'random':
			$sort_by = 'RAND()';
			$sort_order = '';
			break;
		case 'top':
		default:
			$sort_by = 'clicks';
			$sort_order = 'desc';
			break;
	}
	
	// Fetch links
	$limit = intval( $limit );
	if ( $limit > 0 ) {

		$table_url = YOURLS_DB_TABLE_URL;
		$results = $ydb->get_results("SELECT * FROM `$table_url` WHERE 1=1 ORDER BY `$sort_by` $sort_order LIMIT 0, $limit;");
		
		$return = array();
		$i = 1;
		
		foreach ( (array)$results as $res) {
			$return['links']['link_'.$i++] = array(
				'shorturl' => YOURLS_SITE .'/'. $res->keyword,
				'url'      => $res->url,
				'title'    => $res->title,
				'timestamp'=> $res->timestamp,
				'ip'       => $res->ip,
				'clicks'   => $res->clicks,
			);
		}
	}

	$return['stats'] = yourls_get_db_stats();
	
	$return['statusCode'] = 200;

	return yourls_apply_filter( 'get_stats', $return, $filter, $limit );
}

// Return array of stats. (string)$filter is 'bottom', 'last', 'rand' or 'top'. (int)$limit is the number of links to return
function yourls_get_link_stats( $shorturl ) {
	global $ydb;

	$table_url = YOURLS_DB_TABLE_URL;
	$res = $ydb->get_row("SELECT * FROM `$table_url` WHERE keyword = '$shorturl';");
	$return = array();

	if( !$res ) {
		// non existent link
		$return = array(
			'statusCode' => 404,
			'message'    => 'Error: short URL not found',
		);
	} else {
		$return = array(
			'statusCode' => 200,
			'message'    => 'success',
			'link'       => array(
		        'shorturl' => YOURLS_SITE .'/'. $res->keyword,
		        'url'      => $res->url,
		        'title'    => $res->title,
		        'timestamp'=> $res->timestamp,
		        'ip'       => $res->ip,
		        'clicks'   => $res->clicks,
			)
		);
	}

	return yourls_apply_filter( 'get_link_stats', $return, $shorturl );
}

// Return array for API stat requests
function yourls_api_stats( $filter = 'top', $limit = 10 ) {
	$return = yourls_get_stats( $filter, $limit );
	$return['simple']  = 'Need either XML or JSON format for stats';
	$return['message'] = 'success';
	return yourls_apply_filter( 'api_stats', $return, $filter, $limit );
}

// Return array for API stat requests
function yourls_api_url_stats($shorturl) {
	$keyword = str_replace( YOURLS_SITE . '/' , '', $shorturl ); // accept either 'http://ozh.in/abc' or 'abc'
	$keyword = yourls_sanitize_string( $keyword );

	$return = yourls_get_link_stats( $keyword );
	$return['simple']  = 'Need either XML or JSON format for stats';
	return yourls_apply_filter( 'api_url_stats', $return, $shorturl );
}

// Expand short url to long url
function yourls_api_expand( $shorturl ) {
	$keyword = str_replace( YOURLS_SITE . '/' , '', $shorturl ); // accept either 'http://ozh.in/abc' or 'abc'
	$keyword = yourls_sanitize_string( $keyword );
	
	$longurl = yourls_get_keyword_longurl( $keyword );
	
	if( $longurl ) {
		$return = array(
			'keyword'  => $keyword,
			'shorturl' => YOURLS_SITE . "/$keyword",
			'longurl'  => $longurl,
			'simple'   => $longurl,
			'message'  => 'success',
			'statusCode' => 200,
		);
	} else {
		$return = array(
			'keyword'  => $keyword,
			'simple'   => 'not found',
			'message'  => 'Error: short URL not found',
			'errorCode' => 404,
		);
	}
	
	return yourls_apply_filter( 'api_expand', $return, $shorturl );
}


// Get total number of URLs and sum of clicks. Input: optional "AND WHERE" clause. Returns array
function yourls_get_db_stats( $where = '' ) {
	global $ydb;
	$table_url = YOURLS_DB_TABLE_URL;

	$totals = $ydb->get_row("SELECT COUNT(keyword) as count, SUM(clicks) as sum FROM `$table_url` WHERE 1=1 $where");
	$return = array( 'total_links' => $totals->count, 'total_clicks' => $totals->sum );
	
	return yourls_apply_filter( 'get_db_stats', $return, $where );
}

// Return API result. Dies after this
function yourls_api_output( $mode, $return ) {
	if( isset( $return['simple'] ) ) {
		$simple = $return['simple'];
		unset( $return['simple'] );
	}
	
	yourls_do_action( 'pre_api_output', $mode, $return );
	
	switch ( $mode ) {
		case 'json':
			header('Content-type: application/json');
			echo json_encode($return);
			break;
		
		case 'xml':
			header('Content-type: application/xml');
			echo yourls_xml_encode($return);
			break;
			
		case 'simple':
		default:
			if( isset( $simple ) )
				echo $simple;
			break;
	}

	yourls_do_action( 'api_output', $mode, $return );
	
	die();
}

// Get number of SQL queries performed
function yourls_get_num_queries() {
	global $ydb;

	return yourls_apply_filter( 'get_num_queries', $ydb->num_queries );
}

// Returns a sanitized a user agent string. Given what I found on http://www.user-agents.org/ it should be OK.
function yourls_get_user_agent() {
	if ( !isset( $_SERVER['HTTP_USER_AGENT'] ) )
		return '-';
	
	$ua = strip_tags( html_entity_decode( $_SERVER['HTTP_USER_AGENT'] ));
	$ua = preg_replace('![^0-9a-zA-Z\':., /{}\(\)\[\]\+@&\!\?;_\-=~\*\#]!', '', $ua );
		
	return yourls_apply_filter( 'get_user_agent', substr( $ua, 0, 254 ) );
}

// Redirect to another page
function yourls_redirect( $location, $code = 301 ) {
	yourls_do_action( 'pre_redirect', $location, $code );
	// Redirect, either properly if possible, or via Javascript otherwise
	if( !headers_sent() ) {
		yourls_status_header( $code );
		header("Location: $location");
	} else {
		yourls_redirect_javascript( $location );
	}
	die();
}

// Set HTTP status header
function yourls_status_header( $code = 200 ) {
	if( headers_sent() )
		return;
		
	$protocol = $_SERVER["SERVER_PROTOCOL"];
	if ( 'HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol )
		$protocol = 'HTTP/1.0';

	$code = intval( $code );
	$desc = yourls_get_HTTP_status($code);

	@header ("$protocol $code $desc"); // This causes problems on IIS and some FastCGI setups
	yourls_do_action( 'status_header', $code );
}

// Redirect to another page using Javascript. Set optional (bool)$dontwait to false to force manual redirection (make sure a message has been read by user)
function yourls_redirect_javascript( $location, $dontwait = true ) {
	if( $dontwait ) {
	echo <<<REDIR
	<script type="text/javascript">
	window.location="$location";
	</script>
	<small>(if you are not redirected after 10 seconds, please <a href="$location">click here</a>)</small>
REDIR;
	} else {
	echo <<<MANUAL
	<p>Please <a href="$location">click here</a></p>
MANUAL;
	}
	yourls_do_action( 'redirect_javascript', $location );
}

// Return a HTTP status code
function yourls_get_HTTP_status( $code ) {
	$code = intval( $code );
	$headers_desc = array(
		100 => 'Continue',
		101 => 'Switching Protocols',
		102 => 'Processing',

		200 => 'OK',
		201 => 'Created',
		202 => 'Accepted',
		203 => 'Non-Authoritative Information',
		204 => 'No Content',
		205 => 'Reset Content',
		206 => 'Partial Content',
		207 => 'Multi-Status',
		226 => 'IM Used',

		300 => 'Multiple Choices',
		301 => 'Moved Permanently',
		302 => 'Found',
		303 => 'See Other',
		304 => 'Not Modified',
		305 => 'Use Proxy',
		306 => 'Reserved',
		307 => 'Temporary Redirect',

		400 => 'Bad Request',
		401 => 'Unauthorized',
		402 => 'Payment Required',
		403 => 'Forbidden',
		404 => 'Not Found',
		405 => 'Method Not Allowed',
		406 => 'Not Acceptable',
		407 => 'Proxy Authentication Required',
		408 => 'Request Timeout',
		409 => 'Conflict',
		410 => 'Gone',
		411 => 'Length Required',
		412 => 'Precondition Failed',
		413 => 'Request Entity Too Large',
		414 => 'Request-URI Too Long',
		415 => 'Unsupported Media Type',
		416 => 'Requested Range Not Satisfiable',
		417 => 'Expectation Failed',
		422 => 'Unprocessable Entity',
		423 => 'Locked',
		424 => 'Failed Dependency',
		426 => 'Upgrade Required',

		500 => 'Internal Server Error',
		501 => 'Not Implemented',
		502 => 'Bad Gateway',
		503 => 'Service Unavailable',
		504 => 'Gateway Timeout',
		505 => 'HTTP Version Not Supported',
		506 => 'Variant Also Negotiates',
		507 => 'Insufficient Storage',
		510 => 'Not Extended'
	);

	if ( isset( $headers_desc[$code] ) )
		return $headers_desc[$code];
	else
		return '';
}


// Log a redirect (for stats)
function yourls_log_redirect( $keyword ) {
	if ( !yourls_do_log_redirect() )
		return true;

	global $ydb;
	$table = YOURLS_DB_TABLE_LOG;
	
	$keyword = yourls_sanitize_string( $keyword );
	$referrer = ( isset( $_SERVER['HTTP_REFERER'] ) ? yourls_sanitize_url( $_SERVER['HTTP_REFERER'] ) : 'direct' );
	$ua = yourls_get_user_agent();
	$ip = yourls_get_IP();
	$location = yourls_geo_ip_to_countrycode( $ip );
	
	return $ydb->query( "INSERT INTO `$table` VALUES ('', NOW(), '$keyword', '$referrer', '$ua', '$ip', '$location')" );
}

// Check if we want to not log redirects (for stats)
function yourls_do_log_redirect() {
	return ( !defined('YOURLS_NOSTATS') || YOURLS_NOSTATS != true );
}

// Converts an IP to a 2 letter country code, using GeoIP database if available in includes/geo/
function yourls_geo_ip_to_countrycode( $ip = '', $default = '' ) {
	// allow a plugin to shortcircuit the Geo IP API
	$location = yourls_apply_filter( 'pre_geo_ip_to_countrycode', false, $ip, $default ); // at this point $ip can be '', check if your plugin hooks in here
	if ( false !== $location )
		return $location;

	if ( !file_exists( YOURLS_INC.'/geo/GeoIP.dat') || !file_exists( YOURLS_INC.'/geo/geoip.inc') )
		return $default;

	if ( $ip == '' )
		$ip = yourls_get_IP();
	
	require_once( YOURLS_INC.'/geo/geoip.inc') ;
	$gi = geoip_open( YOURLS_INC.'/geo/GeoIP.dat', GEOIP_STANDARD);
	$location = geoip_country_code_by_addr($gi, $ip);
	geoip_close($gi);

	return yourls_apply_filter( 'geo_ip_to_countrycode', $location, $ip, $default );
}

// Converts a 2 letter country code to long name (ie AU -> Australia)
function yourls_geo_countrycode_to_countryname( $code ) {
	// Load the Geo class if not already done
	if( !class_exists('GeoIP') ) {
		$temp = yourls_geo_ip_to_countrycode('127.0.0.1');
	}
	
	if( class_exists('GeoIP') ) {
		$geo = new GeoIP;
		$id = $geo->GEOIP_COUNTRY_CODE_TO_NUMBER[$code];
		$long = $geo->GEOIP_COUNTRY_NAMES[$id];
		return $long;
	} else {
		return false;
	}
}

// Return flag URL from 2 letter country code
function yourls_geo_get_flag( $code ) {
	// Load the Geo class if not already done
	if( !class_exists('GeoIP') ) {
		$temp = yourls_geo_ip_to_countrycode('127.0.0.1');
	}
	
	if( class_exists('GeoIP') ) {
		return YOURLS_SITE.'/includes/geo/flags/flag_'.(strtolower($code)).'.gif';
	} else {
		return false;
	}
}


// Check if an upgrade is needed
function yourls_upgrade_is_needed() {
	// check YOURLS_DB_VERSION exist && match values stored in YOURLS_DB_TABLE_OPTIONS
	list( $currentver, $currentsql ) = yourls_get_current_version_from_sql();
	if( $currentsql < YOURLS_DB_VERSION )
		return true;
		
	return false;
}

// Get current version & db version as stored in the options DB. Prior to 1.4 there's no option table.
function yourls_get_current_version_from_sql() {
	$currentver = yourls_get_option( 'version' );
	$currentsql = yourls_get_option( 'db_version' );

	// Values if version is 1.3
	if( !$currentver )
		$currentver = '1.3';
	if( !$currentsql )
		$currentsql = '100';
		
	return array( $currentver, $currentsql);
}

// Read an option from DB (or from cache if available). Return value or $default if not found
function yourls_get_option( $option_name, $default = false ) {
	global $ydb;
	
	// Allow plugins to short-circuit options
	$pre = yourls_apply_filter( 'pre_option_'.$option_name, false );
	if ( false !== $pre )
		return $pre;

	if ( !isset( $ydb->option[$option_name] ) ) {
		$table = YOURLS_DB_TABLE_OPTIONS;
		$option_name = yourls_escape( $option_name );
		$row = $ydb->get_row( "SELECT `option_value` FROM `$table` WHERE `option_name` = '$option_name' LIMIT 1" );
		if ( is_object( $row) ) { // Has to be get_row instead of get_var because of funkiness with 0, false, null values
			$value = $row->option_value;
		} else { // option does not exist, so we must cache its non-existence
			$value = $default;
		}
		$ydb->option[$option_name] = yourls_maybe_unserialize( $value );
	}

	return yourls_apply_filter( 'get_option_'.$option_name, $ydb->option[$option_name] );
}

// Read all options from DB at once
function yourls_get_all_options() {
	global $ydb;
	$table = YOURLS_DB_TABLE_OPTIONS;
	
	$allopt = $ydb->get_results("SELECT `option_name`, `option_value` FROM `$table` WHERE 1=1");
	
	foreach( (array)$allopt as $option ) {
		$ydb->option[$option->option_name] = yourls_maybe_unserialize( $option->option_value );
	}
}

// Update (add if doesn't exist) an option to DB
function yourls_update_option( $option_name, $newvalue ) {
	global $ydb;
	$table = YOURLS_DB_TABLE_OPTIONS;

	$safe_option_name = yourls_escape( $option_name );

	$oldvalue = yourls_get_option( $safe_option_name );

	// If the new and old values are the same, no need to update.
	if ( $newvalue === $oldvalue )
		return false;

	if ( false === $oldvalue ) {
		yourls_add_option( $option_name, $newvalue );
		return true;
	}

	$_newvalue = yourls_escape( yourls_maybe_serialize( $newvalue ) );
	
	yourls_do_action( 'update_option', $option_name, $oldvalue, $newvalue );

	$ydb->query( "UPDATE `$table` SET `option_value` = '$_newvalue' WHERE `option_name` = '$option_name'");

	if ( $ydb->rows_affected == 1 ) {
		$ydb->option[$option_name] = $newvalue;
		return true;
	}
	return false;
}

// Add an option to the DB
function yourls_add_option( $name, $value = '' ) {
	global $ydb;
	$table = YOURLS_DB_TABLE_OPTIONS;
	$safe_name = yourls_escape( $name );

	// Make sure the option doesn't already exist
	if ( false !== yourls_get_option( $safe_name ) )
		return;

	$_value = yourls_escape( yourls_maybe_serialize( $value ) );

	yourls_do_action( 'add_option', $safe_name, $_value );

	$ydb->query( "INSERT INTO `$table` (`option_name`, `option_value`) VALUES ('$name', '$_value')" );
	$ydb->option[$name] = $value;
	return;
}


// Delete an option from the DB
function yourls_delete_option( $name ) {
	global $ydb;
	$table = YOURLS_DB_TABLE_OPTIONS;
	$name = yourls_escape( $name );

	// Get the ID, if no ID then return
	$option = $ydb->get_row( "SELECT option_id FROM `$table` WHERE `option_name` = '$name'" );
	if ( is_null($option) || !$option->option_id )
		return false;
		
	yourls_do_action( 'delete_option', $option_name );
		
	$ydb->query( "DELETE FROM `$table` WHERE `option_name` = '$name'" );
	return true;
}



// Serialize data if needed. Stolen from WordPress
function yourls_maybe_serialize( $data ) {
	if ( is_array( $data ) || is_object( $data ) )
		return serialize( $data );

	if ( yourls_is_serialized( $data ) )
		return serialize( $data );

	return $data;
}

// Check value to find if it was serialized. Stolen from WordPress
function yourls_is_serialized( $data ) {
	// if it isn't a string, it isn't serialized
	if ( !is_string( $data ) )
		return false;
	$data = trim( $data );
	if ( 'N;' == $data )
		return true;
	if ( !preg_match( '/^([adObis]):/', $data, $badions ) )
		return false;
	switch ( $badions[1] ) {
		case 'a' :
		case 'O' :
		case 's' :
			if ( preg_match( "/^{$badions[1]}:[0-9]+:.*[;}]\$/s", $data ) )
				return true;
			break;
		case 'b' :
		case 'i' :
		case 'd' :
			if ( preg_match( "/^{$badions[1]}:[0-9.E-]+;\$/", $data ) )
				return true;
			break;
	}
	return false;
}

// Unserialize value only if it was serialized. Stolen from WP
function yourls_maybe_unserialize( $original ) {
	if ( yourls_is_serialized( $original ) ) // don't attempt to unserialize data that wasn't serialized going in
		return @unserialize( $original );
	return $original;
}

// Determine if the current page is private
function yourls_is_private() {
	$private = false;

	if ( defined('YOURLS_PRIVATE') && YOURLS_PRIVATE == true ) {

		// Allow overruling for particular pages:
		
		// API
		if( yourls_is_API() ) {
			if( !defined('YOURLS_PRIVATE_API') || YOURLS_PRIVATE_API != false )
				$private = true;		

		// Infos
		} elseif( yourls_is_infos() ) {
			if( !defined('YOURLS_PRIVATE_INFOS') || YOURLS_PRIVATE_INFOS !== false )
				$private = true;
		
		// Others
		} else {
			$private = true;
		}
		
	}
			
	return yourls_apply_filter( 'is_private', $private );
}

// Show login form if required
function yourls_maybe_require_auth() {
	if( yourls_is_private() )
		require_once( YOURLS_INC.'/auth.php' );
}

// Return word or words if more than one
function yourls_plural( $word, $count=1 ) {
	return $word . ($count > 1 ? 's' : '');
}

// Return trimmed string
function yourls_trim_long_string( $string, $length = 60, $append = '[...]' ) {
	$newstring = $string;
	if( function_exists('mb_substr') ) {
		if ( mb_strlen( $newstring ) > $length ) {
			$newstring = mb_substr( $newstring, 0, $length - mb_strlen( $append ), 'UTF-8' ) . $append;	
		}
	} else {
		if ( strlen( $newstring ) > $length ) {
			$newstring = substr( $newstring, 0, $length - strlen( $append ) ) . $append;	
		}
	}
	return yourls_apply_filter( 'trim_long_string', $newstring, $string, $length, $append );
}

// Allow several short URLs for the same long URL ?
function yourls_allow_duplicate_longurls() {
	// special treatment if API to check for WordPress plugin requests
	if( yourls_is_API() ) {
		if ( isset($_REQUEST['source']) && $_REQUEST['source'] == 'plugin' ) 
			return false;
	}
	return ( defined( 'YOURLS_UNIQUE_URLS' ) && YOURLS_UNIQUE_URLS == false );
}

// Return list of all shorturls associated to the same long URL. Returns NULL or array of keywords.
function yourls_get_duplicate_keywords( $longurl ) {
	if( !yourls_allow_duplicate_longurls() )
		return NULL;
	
	global $ydb;
	$longurl = yourls_escape( yourls_sanitize_url($longurl) );
	$table = YOURLS_DB_TABLE_URL;
	
	$return = $ydb->get_col( "SELECT `keyword` FROM `$table` WHERE `url` = '$longurl'" );
	return yourls_apply_filter( 'get_duplicate_keywords', $return, $longurl );
}

// Check if an IP shortens URL too fast to prevent DB flood. Return true, or die.
function yourls_check_IP_flood( $ip = '' ) {

	yourls_do_action( 'pre_check_ip_flood', $ip ); // at this point $ip can be '', check it if your plugin hooks in here

	if(
		( defined('YOURLS_FLOOD_DELAY_SECONDS') && YOURLS_FLOOD_DELAY_SECONDS === 0 ) ||
		!defined('YOURLS_FLOOD_DELAY_SECONDS')
	)
		return true;

	$ip = ( $ip ? yourls_sanitize_ip( $ip ) : yourls_get_IP() );

	// Don't throttle whitelist IPs
	if( defined('YOURLS_FLOOD_IP_WHITELIST' && YOURLS_FLOOD_IP_WHITELIST ) ) {
		$whitelist_ips = explode( ',', YOURLS_FLOOD_IP_WHITELIST );
		foreach( (array)$whitelist_ips as $whitelist_ip ) {
			$whitelist_ip = trim( $whitelist_ip );
			if ( $whitelist_ip == $ip )
				return true;
		}
	}
	
	// Don't throttle logged in users
	if( yourls_is_private() ) {
		 if( yourls_is_valid_user() === true )
			return true;
	}
	
	yourls_do_action( 'check_ip_flood', $ip );
	
	global $ydb;
	$table = YOURLS_DB_TABLE_URL;
	
	$lasttime = $ydb->get_var( "SELECT `timestamp` FROM $table WHERE `ip` = '$ip' ORDER BY `timestamp` DESC LIMIT 1" );
	if( $lasttime ) {
		$now = date( 'U' );
		$then = date( 'U', strtotime( $lasttime ) );
		if( ( $now - $then ) <= YOURLS_FLOOD_DELAY_SECONDS ) {
			// Flood!
			yourls_do_action( 'ip_flood', $ip, $now - $then );
			yourls_die( 'Too many URLs added too fast. Slow down please.', 'Forbidden', 403 );
		}
	}
	
	return true;
}

// Check if YOURLS is installed
function yourls_is_installed() {
	static $is_installed = false;
	if ( $is_installed === false ) {
		$check_14 = $check_13 = false;
		global $ydb;
		if( defined('YOURLS_DB_TABLE_NEXTDEC') )
			$check_13 = $ydb->get_var('SELECT `next_id` FROM '.YOURLS_DB_TABLE_NEXTDEC);
		$check_14 = yourls_get_option( 'version' );
		$is_installed = $check_13 || $check_14;
	}
	return yourls_apply_filter( 'is_installed', $is_installed );
}

// Generate random string of (int)$length length and type $type (see function for details)
function yourls_rnd_string ( $length = 5, $type = 0, $charlist = '' ) {
	$str = '';
	$length = intval( $length );

	// define possible characters
	switch ( $type ) {

		// custom char list, or comply to charset as defined in config
		case '0':
			$possible = $charlist ? $charlist : yourls_get_shorturl_charset() ;
			break;
	
		// no vowels to make no offending word, no 0/1/o/l to avoid confusion between letters & digits. Perfect for passwords.
		case '1':
			$possible = "23456789bcdfghjkmnpqrstvwxyz";
			break;
		
		// Same, with lower + upper
		case '2':
			$possible = "23456789bcdfghjkmnpqrstvwxyzBCDFGHJKMNPQRSTVWXYZ";
			break;
		
		// all letters, lowercase
		case '3':
			$possible = "abcdefghijklmnopqrstuvwxyz";
			break;
		
		// all letters, lowercase + uppercase
		case '4':
			$possible = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			break;
		
		// all digits & letters lowercase 
		case '5':
			$possible = "0123456789abcdefghijklmnopqrstuvwxyz";
			break;
		
		// all digits & letters lowercase + uppercase
		case '6':
			$possible = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			break;
		
	}

	$i = 0;
	while ($i < $length) {
		$str .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
		$i++;
	}
	
	return yourls_apply_filter( 'rnd_string', $str, $length, $type, $charlist );
}

// Return salted string
function yourls_salt( $string ) {
	$salt = defined('YOURLS_COOKIEKEY') ? YOURLS_COOKIEKEY : md5(__FILE__) ;
	return yourls_apply_filter( 'yourls_salt', md5 ($string . $salt), $string );
}

// Add a query var to a URL and return URL. Completely stolen from WP.
// Works with one of these parameter patterns:
//     array( 'var' => 'value' )
//     array( 'var' => 'value' ), $url
//     'var', 'value'
//     'var', 'value', $url
// If $url ommited, uses $_SERVER['REQUEST_URI']
function yourls_add_query_arg() {
	$ret = '';
	if ( is_array( func_get_arg(0) ) ) {
		if ( @func_num_args() < 2 || false === @func_get_arg( 1 ) )
			$uri = $_SERVER['REQUEST_URI'];
		else
			$uri = @func_get_arg( 1 );
	} else {
		if ( @func_num_args() < 3 || false === @func_get_arg( 2 ) )
			$uri = $_SERVER['REQUEST_URI'];
		else
			$uri = @func_get_arg( 2 );
	}
	
	$uri = str_replace( '&amp;', '&', $uri );

	
	if ( $frag = strstr( $uri, '#' ) )
		$uri = substr( $uri, 0, -strlen( $frag ) );
	else
		$frag = '';

	if ( preg_match( '|^https?://|i', $uri, $matches ) ) {
		$protocol = $matches[0];
		$uri = substr( $uri, strlen( $protocol ) );
	} else {
		$protocol = '';
	}

	if ( strpos( $uri, '?' ) !== false ) {
		$parts = explode( '?', $uri, 2 );
		if ( 1 == count( $parts ) ) {
			$base = '?';
			$query = $parts[0];
		} else {
			$base = $parts[0] . '?';
			$query = $parts[1];
		}
	} elseif ( !empty( $protocol ) || strpos( $uri, '=' ) === false ) {
		$base = $uri . '?';
		$query = '';
	} else {
		$base = '';
		$query = $uri;
	}

	parse_str( $query, $qs );
	$qs = yourls_urlencode_deep( $qs ); // this re-URL-encodes things that were already in the query string
	if ( is_array( func_get_arg( 0 ) ) ) {
		$kayvees = func_get_arg( 0 );
		$qs = array_merge( $qs, $kayvees );
	} else {
		$qs[func_get_arg( 0 )] = func_get_arg( 1 );
	}

	foreach ( (array) $qs as $k => $v ) {
		if ( $v === false )
			unset( $qs[$k] );
	}

	$ret = http_build_query( $qs );
	$ret = trim( $ret, '?' );
	$ret = preg_replace( '#=(&|$)#', '$1', $ret );
	$ret = $protocol . $base . $ret . $frag;
	$ret = rtrim( $ret, '?' );
	return $ret;
}

// Navigates through an array and encodes the values to be used in a URL. Stolen from WP, used in yourls_add_query_arg()
function yourls_urlencode_deep($value) {
	$value = is_array($value) ? array_map('yourls_urlencode_deep', $value) : urlencode($value);
	return $value;
}

// Remove arg from query. Opposite of yourls_add_query_arg. Stolen from WP.
function yourls_remove_query_arg( $key, $query = false ) {
	if ( is_array( $key ) ) { // removing multiple keys
		foreach ( $key as $k )
			$query = add_query_arg( $k, false, $query );
		return $query;
	}
	return add_query_arg( $key, false, $query );
}

// Return a time-dependent string for nonce creation
function yourls_tick() {
	return ceil( time() / YOURLS_NONCE_LIFE );
}

// Create a time limited, action limited and user limited token
function yourls_create_nonce( $action, $user = false ) {
	if( false == $user )
		$user = defined('YOURLS_USER') ? YOURLS_USER : '-1';
	$tick = yourls_tick();
	return substr( yourls_salt($tick . $action . $user), 0, 10 );
}

// Create a nonce field for inclusion into a form
function yourls_nonce_field( $action, $name = 'nonce', $user = false, $echo = true ) {
	$field = '<input type="hidden" id="'.$name.'" name="'.$name.'" value="'.yourls_create_nonce( $action, $user ).'" />';
	if( $echo )
		echo $field."\n";
	return $field;
}

// Add a nonce to a URL. If URL omitted, adds nonce to current URL
function yourls_nonce_url( $action, $url = false, $name = 'nonce', $user = false ) {
	$nonce = yourls_create_nonce( $action, $user );
	return yourls_add_query_arg( $name, $nonce, $url );
}

// Check validity of a nonce (ie time span, user and action match).
// Returns true if valid, dies otherwise (yourls_die() or die($return) if defined)
function yourls_verify_nonce( $action, $nonce, $user = false, $return = '' ) {
	// get user
	if( false == $user )
		$user = defined('YOURLS_USER') ? YOURLS_USER : '-1';
		
	// what nonce should be
	$valid = yourls_create_nonce( $action, $user );
	
	if( $nonce == $valid ) {
		return true;
	} else {
		if( $return )
			die( $return );
		yourls_die( 'Unauthorized action or expired link', 'Error', 403 );
	}
}

// Sanitize a version number (1.4.1-whatever -> 1.4.1)
function yourls_sanitize_version( $ver ) {
	return preg_replace( '/[^0-9.]/', '', $ver );
}

// Converts keyword into short link
function yourls_link( $keyword = '' ) {
	return YOURLS_SITE . '/' . yourls_sanitize_keyword( $keyword );
}

// Check if we're in API mode. Returns bool
function yourls_is_API() {
	if ( defined('YOURLS_API') && YOURLS_API == true )
		return true;
	return false;
}

// Check if we're in Ajax mode. Returns bool
function yourls_is_Ajax() {
	if ( defined('YOURLS_AJAX') && YOURLS_AJAX == true )
		return true;
	return false;
}

// Check if we're in GO mode (yourls-go.php). Returns bool
function yourls_is_GO() {
	if ( defined('YOURLS_GO') && YOURLS_GO == true )
		return true;
	return false;
}

// Check if we're displaying stats infos (yourls-infos.php). Returns bool
function yourls_is_infos() {
	if ( defined('YOURLS_INFOS') && YOURLS_INFOS == true )
		return true;
	return false;
}

// Check if we'll need interface display function (ie not API or redirection)
function yourls_has_interface() {
	if( yourls_is_API() or yourls_is_GO() )
		return false;
	return true;
}

// Check if we're in the admin area. Returns bool
function yourls_is_admin() {
	if ( defined('YOURLS_ADMIN') && YOURLS_ADMIN == true )
		return true;
	return false;
}

// Check if the server seems to be running on Windows. Not exactly sure how reliable this is.
function yourls_is_windows() {
	return defined( 'DIRECTORY_SEPARATOR' ) && DIRECTORY_SEPARATOR == '\\';
}

// Check if SSL is required. Returns bool.
function yourls_needs_ssl() {
	if ( defined('YOURLS_ADMIN_SSL') && YOURLS_ADMIN_SSL == true )
		return true;
	return false;
}

// Return admin link, with SSL preference if applicable.
function yourls_admin_url( $page = '' ) {
	$admin = YOURLS_SITE . '/admin/' . $page;
	if( yourls_is_ssl() or yourls_needs_ssl() )
		$admin = str_replace('http://', 'https://', $admin);
	return yourls_apply_filter( 'admin_url', $admin, $page );
}

// Return YOURLS_SITE, with SSL preference
function yourls_site_url( $echo = true ) {
	$site = YOURLS_SITE;
	// Do not enforce (checking yourls_need_ssl() ) but check current usage so it won't force SSL on non-admin pages
	if( yourls_is_ssl() )
		$site = str_replace( 'http://', 'https://', $site );
	$site = yourls_apply_filter( 'site_url', $site );
	if( $echo )
		echo $site;
	return $site;
}

// Check if SSL is used, returns bool. Stolen from WP.
function yourls_is_ssl() {
	$is_ssl = false;
	if ( isset($_SERVER['HTTPS']) ) {
		if ( 'on' == strtolower($_SERVER['HTTPS']) )
			$is_ssl = true;
		if ( '1' == $_SERVER['HTTPS'] )
			$is_ssl = true;
	} elseif ( isset($_SERVER['SERVER_PORT']) && ( '443' == $_SERVER['SERVER_PORT'] ) ) {
		$is_ssl = true;
	}
	return yourls_apply_filter( 'is_ssl', $is_ssl );
}


// Get a remote page <title>, return a string (either title or url)
function yourls_get_remote_title( $url ) {
	require_once( YOURLS_INC.'/functions-http.php' );

	$url = yourls_sanitize_url( $url );

	$title = $charset = false;
	
	$content = yourls_get_remote_content( $url );
	
	// If false, return url as title.
	// Todo: improve this with temporary title when shorturl_meta available?
	if( false === $content )
		return $url;

	if( $content !== false ) {
		// look for <title>
		if ( preg_match('/<title>(.*?)<\/title>/is', $content, $found ) ) {
			$title = $found[1];
			unset( $found );
		}

		// look for charset
		// <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		if ( preg_match('/<meta[^>]*?charset=([^>]*?)\/?>/is', $content, $found ) ) {
			$charset = trim($found[1], '"\' ');
			unset( $found );
		}
	}
	
	// if title not found, guess if returned content was actually an error message
	if( $title == false && strpos( $content, 'Error' ) === 0 ) {
		$title = $content;
	}
	
	if( $title == false )
		$title = $url;
	
	/*
	if( !yourls_seems_utf8( $title ) )
		$title = utf8_encode( $title );
	*/
	
	// Charset conversion. We use @ to remove warnings (mb_ functions are easily bitching about illegal chars)
	if( function_exists( 'mb_convert_encoding' ) ) {
		if( $charset ) {
			$title = @mb_convert_encoding( $title, 'UTF-8', $charset );
		} else {
			$title = @mb_convert_encoding( $title, 'UTF-8' );
		}
	}
	
	// Remove HTML entities
	$title = html_entity_decode( $title, ENT_QUOTES, 'UTF-8' );
	
	// Strip out evil things
	$title = yourls_sanitize_title( $title );
	
	return yourls_apply_filter( 'get_remote_title', $title, $url );
}

// Sanitize a filename (no Win32 stuff)
function yourls_sanitize_filename( $file ) {
	$file = str_replace( '\\', '/', $file ); // sanitize for Win32 installs
	$file = preg_replace( '|/+|' ,'/', $file ); // remove any duplicate slash
	return $file;
}

// Check for maintenance mode that will shortcut everything
function yourls_check_maintenance_mode() {
	
	// TODO: all cases that always display the sites (is_admin but not is_ajax?)
	if( 1 )
		return;

	// first case: /user/maintenance.php file
	if( file_exists( YOURLS_USERDIR.'/maintenance.php' ) ) {
		include( YOURLS_USERDIR.'/maintenance.php' );
		die();	
	}
	
	// second case: option in DB
	if( yourls_get_option( 'maintenance_mode' ) !== false ) {
		require_once( YOURLS_INC.'/functions-html.php' );
		$title = 'Service temporarily unavailable';
		$message = 'Our service is currently undergoing scheduled maintenance.</p>
		<p>Things should not last very long, thank you for your patience and please excuse the inconvenience';
		yourls_die( $message, $title , 503 );
	}
	
}

// Toggle maintenance mode
function yourls_maintenance_mode( $maintenance = true ) {
	yourls_update_option( 'maintenance_mode', (bool)$maintenance );
}

// Check if a string seems to be UTF-8. Stolen from WP.
function yourls_seems_utf8($str) {
	$length = strlen($str);
	for ($i=0; $i < $length; $i++) {
		$c = ord($str[$i]);
		if ($c < 0x80) $n = 0; # 0bbbbbbb
		elseif (($c & 0xE0) == 0xC0) $n=1; # 110bbbbb
		elseif (($c & 0xF0) == 0xE0) $n=2; # 1110bbbb
		elseif (($c & 0xF8) == 0xF0) $n=3; # 11110bbb
		elseif (($c & 0xFC) == 0xF8) $n=4; # 111110bb
		elseif (($c & 0xFE) == 0xFC) $n=5; # 1111110b
		else return false; # Does not match any model
		for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
			if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80))
				return false;
		}
	}
	return true;
}

// Quick UA check for mobile devices. Return boolean.
function yourls_is_mobile_device() {
	// Strings searched
	$mobiles = array(
		'android', 'blackberry', 'blazer',
		'compal', 'elaine', 'fennec', 'hiptop',
		'iemobile', 'iphone', 'ipod', 'ipad',
		'iris', 'kindle', 'opera mobi', 'opera mini',
		'palm', 'phone', 'pocket', 'psp', 'symbian',
		'treo', 'wap', 'windows ce', 'windows phone'
	);
	
	// Current user-agent
	$current = strtolower( $_SERVER['HTTP_USER_AGENT'] );
	
	// Check
	return str_replace( $mobiles, '', $current ) != $current;
}