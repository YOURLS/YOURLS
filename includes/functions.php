<?php
/*
 * YOURLS
 * Function library
 */

if (defined('YOURLS_DEBUG') && YOURLS_DEBUG == true) {
	error_reporting(E_ALL);
} else {
	error_reporting(E_ERROR | E_PARSE);
}

// function to convert an integer (1337) to a string (3jk). Input integer processed as a string to beat PHP's int max value
function yourls_int2string( $id ) {
	$str = yourls_base2base(trim(strval($id)), 10, YOURLS_URL_CONVERT);
	if (YOURLS_URL_CONVERT <= 37)
		$str = strtolower($str);
	return $str;
}

// function to convert a string (3jk) to an integer (1337)
function yourls_string2int( $str ) {
	if (YOURLS_URL_CONVERT <= 37)
		$str = strtolower($str);
	return yourls_base2base(trim($str), YOURLS_URL_CONVERT, 10);
}

// Make sure a link keyword (ie "1fv" as in "site.com/1fv") is valid.
function yourls_sanitize_string($in) {
	if (YOURLS_URL_CONVERT <= 37)
		$in = strtolower($in);
	return substr(preg_replace('/[^a-zA-Z0-9]/', '', $in), 0, 199);
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
	$url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'"()\\x80-\\xff]|i', '', $url );
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
	return mysql_real_escape_string($in);
}

// Escape a string
function yourls_escape( $in ) {
	return mysql_real_escape_string($in);
}

// Check to see if a given keyword is reserved (ie reserved URL or an existing page)
// Returns bool
function yourls_keyword_is_reserved( $keyword ) {
	global $yourls_reserved_URL;
	
	if ( in_array( $keyword, $yourls_reserved_URL)
		or file_exists(dirname(dirname(__FILE__))."/pages/$keyword.php")
		or is_dir(dirname(dirname(__FILE__))."/$keyword")
	)
		return true;
	
	return false;
}

// Function: Get IP Address. Returns a DB safe string.
function yourls_get_IP() {
	if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip_address = $_SERVER['HTTP_CLIENT_IP'];
	} else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else if(!empty($_SERVER['REMOTE_ADDR'])) {
		$ip_address = $_SERVER['REMOTE_ADDR'];
	} else {
		$ip_address = '';
	}
	if(strpos($ip_address, ',') !== false) {
		$ip_address = explode(',', $ip_address);
		$ip_address = $ip_address[0];
	}
	
	$ip_address = yourls_sanitize_ip( $ip_address );

	return $ip_address;
}

// Sanitize an IP address
function yourls_sanitize_ip( $ip ) {
	return preg_replace( '/[^0-9a-fA-F:., ]/', '', $ip );
}

// Add the "Edit" row
function yourls_table_edit_row( $keyword ) {
	global $ydb;
	
	$table = YOURLS_DB_TABLE_URL;
	$keyword = yourls_sanitize_string( $keyword );
	$id = yourls_string2int( $keyword ); // used as HTML #id
	$url = $ydb->get_row("SELECT `url` FROM `$table` WHERE `keyword` = '$keyword';");
	$safe_url = stripslashes( $url->url );
	$www = YOURLS_SITE;
	
	if( $url ) {
		$return = <<<RETURN
<tr id="edit-$id" class="edit-row"><td colspan="5"><strong>Original URL</strong>:<input type="text" id="edit-url-$id" name="edit-url-$id" value="$safe_url" class="text" size="70" /> <strong>Short URL</strong>: $www/<input type="text" id="edit-keyword-$id" name="edit-keyword-$id" value="$keyword" class="text" size="10" /></td><td colspan="1"><input type="button" id="edit-submit-$id" name="edit-submit-$id" value="Save" title="Save new values" class="button" onclick="edit_save('$id');" />&nbsp;<input type="button" id="edit-close-$id" name="edit-close-$id" value="X" title="Cancel editing" class="button" onclick="hide_edit('$id');" /><input type="hidden" id="old_keyword_$id" value="$keyword"/></td></tr>
RETURN;
	} else {
		$return = '<tr><td colspan="6">Error, URL not found</td></tr>';
	}
	
	return $return;
}

// Add a link row
function yourls_table_add_row( $keyword, $url, $ip, $clicks, $timestamp ) {
	$keyword = yourls_sanitize_string( $keyword );
	$id = yourls_string2int( $keyword ); // used as HTML #id
	$date = date( 'M d, Y H:i', $timestamp+( YOURLS_HOURS_OFFSET * 3600) );
	$clicks = number_format($clicks, 0, '', '');
	$shorturl = YOURLS_SITE.'/'.$keyword;
	$display_url = htmlentities( yourls_trim_long_string( $url ) );
	$statlink = $shorturl.'+';
	$url = htmlentities( $url );
	
	return <<<ROW
<tr id="id-$id"><td id="keyword-$id"><a href="$shorturl">$keyword</a></td><td id="url-$id"><a href="$url" title="$url">$display_url</a></td><td id="timestamp-$id">$date</td><td id="ip-$id">$ip</td><td id="clicks-$id">$clicks</td><td class="actions" id="actions-$id"><a href="$statlink" id="statlink-$id" class="button button_stats">&nbsp;&nbsp;&nbsp;</a>&nbsp;<input type="button" id="edit-button-$id" name="edit-button" value="" title="Edit" class="button button_edit" onclick="edit('$id');" />&nbsp;<input type="button" id="delete-button-$id" name="delete-button" value="" title="Delete" class="button button_delete" onclick="remove('$id');" /><input type="hidden" id="keyword_$id" value="$keyword"/></td></tr>
ROW;
}

// Get next id a new link will have if no custom keyword provided
function yourls_get_next_decimal() {
	return (int)yourls_get_option( 'next_id' );
}

// Update id for next link with no custom keyword
function yourls_update_next_decimal( $int = '' ) {
	$int = ( $int == '' ) ? yourls_get_next_decimal() + 1 : (int)$int ;
	return yourls_update_option( 'next_id', $int );
}

// Delete a link in the DB
function yourls_delete_link_by_keyword( $keyword ) {
	global $ydb;

	$table = YOURLS_DB_TABLE_URL;
	$keyword = yourls_sanitize_string( $keyword );
	return $ydb->query("DELETE FROM `$table` WHERE `keyword` = '$keyword';");
}

// SQL query to insert a new link in the DB. Needs sanitized data. Returns boolean for success or failure of the inserting
function yourls_insert_link_in_db($url, $keyword) {
	global $ydb;

	$table = YOURLS_DB_TABLE_URL;
	$timestamp = date('Y-m-d H:i:s');
	$ip = yourls_get_IP();
	$insert = $ydb->query("INSERT INTO `$table` VALUES('$keyword', '$url', '$timestamp', '$ip', 0);");
	
	return (bool)$insert;
}

// Add a new link in the DB, either with custom keyword, or find one
function yourls_add_new_link( $url, $keyword = '' ) {
	global $ydb;

	if ( !$url || $url == 'http://' || $url == 'https://' ) {
		$return['status'] = 'fail';
		$return['code'] = 'error:nourl';
		$return['message'] = 'Missing URL input';
		$return['errorCode'] = '400';
		return $return;
	}

	// Prevent DB flood
	$ip = yourls_get_IP();
	yourls_check_IP_flood( $ip );

	$table = YOURLS_DB_TABLE_URL;
	$url = mysql_real_escape_string( yourls_sanitize_url($url) );
	$strip_url = stripslashes($url);
	$url_exists = $ydb->get_row("SELECT keyword,url FROM `$table` WHERE `url` = '".$strip_url."';");
	$return = array();

	// New URL : store it -- or: URL exists, but duplicates allowed
	if( !$url_exists || yourls_allow_duplicate_longurls() ) {

		// Custom keyword provided
		if ( $keyword ) {
			$keyword = mysql_real_escape_string(yourls_sanitize_string($keyword));
			if ( !yourls_keyword_is_free($keyword) ) {
				// This shorturl either reserved or taken already
				$return['status'] = 'fail';
				$return['code'] = 'error:keyword';
				$return['message'] = 'Short URL '.$keyword.' already exists in database or is reserved';
			} else {
				// all clear, store !
				yourls_insert_link_in_db($url, $keyword);
				$return['url'] = array('keyword' => $keyword, 'url' => $strip_url, 'date' => date('Y-m-d H:i:s'), 'ip' => $ip );
				$return['status'] = 'success';
				$return['message'] = $strip_url.' added to database';
				$return['html'] = yourls_table_add_row( $keyword, $url, $ip, 0, time() );
				$return['shorturl'] = YOURLS_SITE .'/'. $keyword;
			}

		// Create random keyword	
		} else {
			$timestamp = date('Y-m-d H:i:s');
			$id = yourls_get_next_decimal();
			$ok = false;
			do {
				$keyword = yourls_int2string( $id );
				$free = yourls_keyword_is_free($keyword);
				$add_url = @yourls_insert_link_in_db($url, $keyword);
				$ok = ($free && $add_url);
				if ( $ok === false && $add_url === 1 ) {
					// we stored something, but shouldn't have (ie reserved id)
					$delete = yourls_delete_link_by_keyword( $keyword );
					$return['extra_info'] .= '(deleted '.$keyword.')';
				} else {
					// everything ok, populate needed vars
					$return['url'] = array('keyword' => $keyword, 'url' => $strip_url, 'date' => $timestamp, 'ip' => $ip );
					$return['status'] = 'success';
					$return['message'] = $strip_url.' added to database';
					$return['html'] = yourls_table_add_row( $keyword, $url, $ip, 0, time() );
					$return['shorturl'] = YOURLS_SITE .'/'. $keyword;
				}
				$id++;
			} while (!$ok);
			@yourls_update_next_decimal($id);
		}
	} else {
		// URL was already stored
		$return['status'] = 'fail';
		$return['code'] = 'error:url';
		$return['message'] = $strip_url.' already exists in database';
		$return['shorturl'] = YOURLS_SITE .'/'. $url_exists->keyword;
	}

	$return['statusCode'] = 200; // regardless of result, this is still a valid request
	return $return;
}


// Edit a link
function yourls_edit_link($url, $keyword, $newkeyword='') {
	global $ydb;

	$table = YOURLS_DB_TABLE_URL;
	$url = mysql_real_escape_string(yourls_sanitize_url($url));
	$keyword = yourls_sanitize_string( $keyword );
	$newkeyword = yourls_sanitize_string( $newkeyword );
	$strip_url = stripslashes($url);
	$old_url = $ydb->get_var("SELECT `url` FROM `$table` WHERE `keyword` = '$keyword';");
	$old_id = $id = yourls_string2int( $keyword );
	$new_id = ( $newkeyword == '' ? $old_id : yourls_string2int( $newkeyword ) );
	
	// Check if new URL is not here already
	if ($old_url != $url) {
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
	
	// All clear, update
	if ( ( !$new_url_already_there || yourls_allow_duplicate_longurls() ) && $keyword_is_ok ) {
		//$timestamp4screen = date( 'Y M d H:i', time()+( YOURLS_HOURS_OFFSET * 3600) );
		//$timestamp4db = date('Y-m-d H:i:s', time()+( YOURLS_HOURS_OFFSET * 3600) );
		$update_url = $ydb->query("UPDATE `$table` SET `url` = '$url', `keyword` = '$newkeyword' WHERE `keyword` = '$keyword';");
		if( $update_url ) {
			$return['url'] = array( 'keyword' => $newkeyword, 'shorturl' => YOURLS_SITE.'/'.$newkeyword, 'url' => $strip_url, 'display_url' => yourls_trim_long_string( $strip_url ), 'new_id' => $new_id );
			$return['status'] = 'success';
			$return['message'] = 'Link updated in database';
		} else {
			$return['status'] = 'fail';
			$return['message'] = 'Error updating '.$strip_url.' (Short URL: '.$keyword.') to database';
		}
	
	// Nope
	} else {
		$return['status'] = 'fail';
		$return['message'] = 'URL or keyword already exists in database';
	}
	
	return $return;
}


// Check if keyword id is free (ie not already taken, and not reserved)
function yourls_keyword_is_free( $keyword ) {
	global $ydb;

	$table = YOURLS_DB_TABLE_URL;
	if ( yourls_keyword_is_reserved($keyword) )
		return false;
		
	$already_exists = $ydb->get_var("SELECT COUNT(`keyword`) FROM `$table` WHERE `keyword` = '$keyword';");
	if ( $already_exists )
		return false;

	return true;
}


// Display a page
function yourls_page( $page ) {
	$include = dirname(dirname(__FILE__))."/pages/$page.php";
	if (!file_exists($include)) {
		yourls_die("Page '$page' not found", 'Not found', 404);
	}
	include($include);
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
	) yourls_die ('DB config missigin, or could not find DB class', 'Fatal error', 503);
	
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

// Return JSON output. Compatible with PHP prior to 5.2
function yourls_json_encode($array) {
	if (function_exists('json_encode')) {
		return json_encode($array);
	} else {
		require_once(dirname(__FILE__).'/functions-json.php');
		return yourls_array_to_json($array);
	}
}

// Return XML output.
function yourls_xml_encode($array) {
	require_once(dirname(__FILE__).'/functions-xml.php');
	$converter= new yourls_array2xml;
	return $converter->array2xml($array);
}

// Return array of all informations associated with keyword. Returns false if keyword not found. Set optional $use_cache to false to force fetching from DB
function yourls_get_keyword_infos( $keyword, $use_cache = true ) {
	global $ydb;
	$keyword = yourls_sanitize_string( $keyword );

	if( isset( $ydb->infos[$keyword] ) && $use_cache == true ) {
		return $ydb->infos[$keyword];
	}
	
	$table = YOURLS_DB_TABLE_URL;
	$infos = $ydb->get_row("SELECT * FROM `$table` WHERE `keyword` = '$keyword'");
	
	if( $infos ) {
		$infos = (array)$infos;
		$ydb->infos[$keyword] = $infos;
	} else {
		$ydb->infos[$keyword] = false;
	}
		
	return $ydb->infos[$keyword];
}

// Return (string) selected information associated with a keyword. Optional $notfound = string default message if nothing found
function yourls_get_keyword_info( $keyword, $field, $notfound = false ) {
	global $ydb;
	
	$keyword = yourls_sanitize_string( $keyword );
	$infos = yourls_get_keyword_infos( $keyword );
	
	if ( isset($infos[$field]) && $infos[$field] !== false )
		return $infos[$field];

	return $notfound;	
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

// Update click count on a short URL
function yourls_update_clicks( $keyword ) {
	global $ydb;
	$keyword = yourls_sanitize_string( $keyword );
	$table = YOURLS_DB_TABLE_URL;
	return $ydb->query("UPDATE `$table` SET `clicks` = clicks + 1 WHERE `keyword` = '$keyword'");
}

// Return array of stats. (string)$filter is 'bottom', 'last', 'rand' or 'top'. (int)$limit is the number of links to return
function yourls_get_links_stats( $filter = 'top', $limit = 10 ) {
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
	
	$limit = intval( $limit );
	if ( $limit == 0 )
		$limit = 1;
	$table_url = YOURLS_DB_TABLE_URL;
	$results = $ydb->get_results("SELECT * FROM `$table_url` WHERE 1=1 ORDER BY `$sort_by` $sort_order LIMIT 0, $limit;");
	
	$return = array();
	$i = 1;
	
	foreach ($results as $res) {
		$return['links']['link_'.$i++] = array(
			'shorturl' => YOURLS_SITE .'/'. $res->keyword,
			'url' => $res->url,
			'timestamp' => $res->timestamp,
			'ip' => $res->ip,
			'clicks' => $res->clicks,
		);
	}

	$return['stats'] = yourls_get_db_stats();
	
	$return['statusCode'] = 200;

	return $return;
}


// Return array for API stat requests
function yourls_api_stats( $filter = 'top', $limit = 10 ) {
	$return = yourls_get_links_stats( $filter, $limit );
	$return['simple']  = 'Need either XML or JSON format for stats';
	$return['message'] = 'success';
	return $return;
}

// Expand short url to long url
function yourls_api_expand( $shorturl ) {
	$keyword = str_replace( YOURLS_SITE . '/' , '', $shorturl ); // accept either 'http://ozh.in/abc' or 'abc'
	$keyword = yourls_sanitize_string( $keyword );
	
	$longurl = yourls_get_keyword_longurl( $keyword );
	
	if( $longurl ) {
		return array(
			'keyword'  => $keyword,
			'shorturl' => YOURLS_SITE . "/$keyword",
			'longurl'  => $longurl,
			'simple'   => $longurl,
			'message'  => 'success',
			'statusCode' => 200,
		);
	} else {
		return array(
			'keyword'  => $keyword,
			'simple'   => 'not found',
			'message'  => 'Error: short URL not found',
			'errorCode' => 404,
		);
	}
}


// Get total number of URLs and sum of clicks. Input: optional "AND WHERE" clause. Returns array
function yourls_get_db_stats( $where = '' ) {
	global $ydb;
	$table_url = YOURLS_DB_TABLE_URL;

	$totals = $ydb->get_row("SELECT COUNT(keyword) as count, SUM(clicks) as sum FROM `$table_url` WHERE 1=1 $where");
	return array( 'total_links' => $totals->count, 'total_clicks' => $totals->sum );
}

// Return API result. Dies after this
function yourls_api_output( $mode, $return ) {
	if( isset( $return['simple'] ) ) {
		$simple = $return['simple'];
		unset( $return['simple'] );
	}
	switch ( $mode ) {
		case 'json':
			header('Content-type: application/json');
			echo yourls_json_encode($return);
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
	die();
}

// Display HTML head and <body> tag
function yourls_html_head( $context = 'index' ) {
	// All components to false, except when specified true
	$share = $insert = $tablesorter = $tabs = false;
	// Load components as needed
	switch ( $context ) {
		case 'infos':
			$share = $tabs = true;
			break;
			
		case 'bookmark':
			$share = $insert = $tablesorter = true;
			break;
			
		case 'index':
			$insert = $tablesorter = true;
			break;
		
		case 'install':
		case 'login':
		case 'new':
		case 'tools':
		case 'upgrade':
			break;
	}
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>YOURLS &raquo; Your Own URL Shortener | <?php echo YOURLS_SITE; ?></title>
	<link rel="icon" type="image/gif" href="<?php echo YOURLS_SITE; ?>/images/favicon.gif" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="chrome=1" />
	<meta name="copyright" content="Copyright &copy; 2008-<?php echo date('Y'); ?> YOURS" />
	<meta name="author" content="Ozh Richard, Lester Chan" />
	<meta name="description" content="Insert URL &laquo; YOURLS &raquo; Your Own URL Shortener' | <?php echo YOURLS_SITE; ?>" />
	<script src="<?php echo YOURLS_SITE; ?>/js/jquery-1.3.2.min.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
	<link rel="stylesheet" href="<?php echo YOURLS_SITE; ?>/css/style.css?v=<?php echo YOURLS_VERSION; ?>" type="text/css" media="screen" />
	<?php if ($tabs) { ?>
		<link rel="stylesheet" href="<?php echo YOURLS_SITE; ?>/css/infos.css?v=<?php echo YOURLS_VERSION; ?>" type="text/css" media="screen" />
		<script src="<?php echo YOURLS_SITE; ?>/js/infos.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
	<?php } ?>
	<?php if ($tablesorter) { ?>
		<link rel="stylesheet" href="<?php echo YOURLS_SITE; ?>/css/tablesorter.css?v=<?php echo YOURLS_VERSION; ?>" type="text/css" media="screen" />
		<script src="<?php echo YOURLS_SITE; ?>/js/jquery.tablesorter.min.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
	<?php } ?>
	<?php if ($insert) { ?>
		<script src="<?php echo YOURLS_SITE; ?>/js/insert.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
	<?php } ?>
	<?php if ($share) { ?>
		<link rel="stylesheet" href="<?php echo YOURLS_SITE; ?>/css/share.css?v=<?php echo YOURLS_VERSION; ?>" type="text/css" media="screen" />
		<script src="<?php echo YOURLS_SITE; ?>/js/share.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
	<?php } ?>
</head>
<body class="<?php echo $context; ?>">
<div id="wrap">
	<?php
}

// Display HTML footer (including closing body & html tags)
function yourls_html_footer() {
	global $ydb;
	
	$num_queries = $ydb->num_queries > 1 ? $ydb->num_queries.' queries' : $ydb->num_queries.' query';
	?>
	</div> <?php // wrap ?>
	<div id="footer"><p>Powered by <a href="http://yourls.org/" title="YOURLS">YOURLS</a> v<?php echo YOURLS_VERSION; echo ' &ndash; '.$num_queries; ?></p></div>
	<?php if( defined('YOURLS_DEBUG') && YOURLS_DEBUG == true ) {
		echo '<p>'. $ydb->all_queries .'<p>';
	} ?>
	</body>
	</html>
	<?php
}

// Display "Add new URL" box
function yourls_html_addnew( $url = '', $keyword = '' ) {
	$url = $url ? $url : 'http://';
	?>
	<div id="new_url">
		<div>
			<form id="new_url_form" action="" method="get">
				<div><strong>Enter the URL</strong>:<input type="text" id="add-url" name="url" value="<?php echo $url; ?>" class="text" size="80" />
				Optional: <strong>Custom short URL</strong>:<input type="text" id="add-keyword" name="keyword" value="<?php echo $keyword; ?>" maxlength="12" class="text" size="8" />
				<input type="button" id="add-button" name="add-button" value="Shorten The URL" class="button" onclick="add();" /></div>
			</form>
			<div id="feedback" style="display:none"></div>
		</div>
	</div>
	<?php
}

// Display main table's footer
function yourls_html_tfooter( $params = array() ) {
	extract( $params ); // extract $search_text, $page, $search_in_sql ...

	?>
	<tfoot>
		<tr>
			<th colspan="4" style="text-align: left;">
				<form action="" method="get">
					<div>
						<div style="float:right;">
							<input type="submit" id="submit-sort" value="Filter" class="button primary" />
							&nbsp;
							<input type="button" id="submit-clear-filter" value="Clear Filter" class="button" onclick="window.parent.location.href = 'index.php'" />
						</div>

						Search&nbsp;for&nbsp;
						<input type="text" name="s_search" class="text" size="20" value="<?php echo $search_text; ?>" />
						&nbsp;in&nbsp;
						<select name="s_in" size="1">
							<!-- <option value="id"<?php if($search_in_sql == 'id') { echo ' selected="selected"'; } ?>>ID</option> -->
							<option value="url"<?php if($search_in_sql == 'url') { echo ' selected="selected"'; } ?>>URL</option>
							<option value="ip"<?php if($search_in_sql == 'ip') { echo ' selected="selected"'; } ?>>IP</option>
						</select>
						&ndash;&nbsp;Order&nbsp;by&nbsp;
						<select name="s_by" size="1">
							<option value="id"<?php if($sort_by_sql == 'id') { echo ' selected="selected"'; } ?>>ID</option>
							<option value="url"<?php if($sort_by_sql == 'url') { echo ' selected="selected"'; } ?>>URL</option>
							<option value="timestamp"<?php if($sort_by_sql == 'timestamp') { echo ' selected="selected"'; } ?>>Date</option>
							<option value="ip"<?php if($sort_by_sql == 'ip') { echo ' selected="selected"'; } ?>>IP</option>
							<option value="clicks"<?php if($sort_by_sql == 'clicks') { echo ' selected="selected"'; } ?>>Clicks</option>
						</select>
						<select name="s_order" size="1">
							<option value="asc"<?php if($sort_order_sql == 'asc') { echo ' selected="selected"'; } ?>>Ascending</option>
							<option value="desc"<?php if($sort_order_sql == 'desc') { echo ' selected="selected"'; } ?>>Descending</option>
						</select>
						&ndash;&nbsp;Show&nbsp;
						<input type="text" name="perpage" class="text" size="2" value="<?php echo $perpage; ?>" />&nbsp;rows<br/>
						
						Show links with
						<select name="link_filter" size="1">
							<option value="more"<?php if($link_filter === 'more') { echo ' selected="selected"'; } ?>>more</option>
							<option value="less"<?php if($link_filter === 'less') { echo ' selected="selected"'; } ?>>less</option>
						</select>
						than
						<input type="text" name="link_limit" class="text" size="4" value="<?php echo $link_limit; ?>" />clicks

						
					</div>
				</form>
			</th>
			<th colspan="3" style="text-align: right;">
				Pages (<?php echo $total_pages; ?>):
				<?php
					if ($page >= 4) {
						echo '<b><a href="'.$base_page.'?s_by='.$sort_by_sql.'&amp;s_order='.$sort_order_sql.$search_url.'&amp;perpage='.$perpage.'&amp;page=1'.'" title="Go to First Page">&laquo; First</a></b> ... ';
					}
					if($page > 1) {
						echo ' <b><a href="'.$base_page.'?s_by='.$sort_by_sql.'&amp;s_order='.$sort_order_sql.$search_url.'&amp;perpage='.$perpage.'&amp;page='.($page-1).'" title="&laquo; Go to Page '.($page-1).'">&laquo;</a></b> ';
					}
					for($i = $page - 2 ; $i  <= $page +2; $i++) {
						if ($i >= 1 && $i <= $total_pages) {
							if($i == $page) {
								echo "<strong>[$i]</strong> ";
							} else {
								echo '<a href="'.$base_page.'?s_by='.$sort_by_sql.'&amp;s_order='.$sort_order_sql.$search_url.'&amp;perpage='.$perpage.'&amp;page='.($i).'" title="Page '.$i.'">'.$i.'</a> ';
							}
						}
					}
					if($page < $total_pages) {
						echo ' <b><a href="'.$base_page.'?s_by='.$sort_by_sql.'&amp;s_order='.$sort_order_sql.$search_url.'&amp;perpage='.$perpage.'&amp;page='.($page+1).'" title="Go to Page '.($page+1).' &raquo;">&raquo;</a></b> ';
					}
					if (($page+2) < $total_pages) {
						echo ' ... <b><a href="'.$base_page.'?s_by='.$sort_by_sql.'&amp;s_order='.$sort_order_sql.$search_url.'&amp;perpage='.$perpage.'&amp;page='.($total_pages).'" title="Go to Last Page">Last &raquo;</a></b>';
					}
				?>
			</th>
		</tr>
	</tfoot>
	<?php
}

// Display the Quick Share box of the tools.php page
function yourls_share_box( $longurl, $shorturl, $title='', $text='', $shortlink_title = '<h2>Your short link</h2>', $share_title = '<h2>Quick Share</h2>' ) {
	$text = ( $text ? '"'.$text.'" ' : '' );
	$title = ( $title ? "$title " : '' );
	$share = htmlspecialchars_decode( $title.$text.$shorturl );
	$_share = rawurlencode( $share );
	$_url = rawurlencode( $shorturl );
	$count = 140 - strlen( $share );
	?>
	
	<div id="shareboxes">

		<div id="copybox" class="share">
		<?php echo $shortlink_title; ?>
			<p><input id="copylink" class="text" size="40" value="<?php echo $shorturl; ?>" /></p>
			<p><small>Original link: <a href="<?php echo $longurl; ?>"><?php echo $longurl; ?></a></small></p>
		</div>

		<div id="sharebox" class="share">
			<?php echo $share_title; ?>
			<div id="tweet">
				<span id="charcount"><?php echo $count; ?></span>
				<textarea id="tweet_body"><?php echo $share; ?></textarea>
			</div>
			<p id="share_links">Share with 
				<a id="share_tw" href="http://twitter.com/home?status=<?php echo $_share; ?>" title="Tweet this!" onclick="share('tw');return false">Twitter</a>
				<a id="share_fb" href="http://www.facebook.com/share.php?u=<?php echo $_url; ?>" title="Share on Facebook" onclick="share('fb');return false;">Facebook</a>
				<a id="share_ff" href="http://friendfeed.com/share/bookmarklet/frame#title=<?php echo $_share; ?>" title="Share on Friendfeed" onclick="javascript:share('ff');return false;">FriendFeed</a>
			</p>
			</div>
		</div>
	
	</div>
	
	<?php
}

// Get number of SQL queries performed
function yourls_get_num_queries() {
	global $ydb;

	return $ydb->num_queries;
}

// Compat http_build_query for PHP4
if (!function_exists('http_build_query')) {
	function http_build_query($data, $prefix=null, $sep=null) {
		return yourls_http_build_query($data, $prefix, $sep);
	}
}

// from php.net (modified by Mark Jaquith to behave like the native PHP5 function)
function yourls_http_build_query($data, $prefix=null, $sep=null, $key='', $urlencode=true) {
	$ret = array();

	foreach ( (array) $data as $k => $v ) {
		if ( $urlencode)
			$k = urlencode($k);
		if ( is_int($k) && $prefix != null )
			$k = $prefix.$k;
		if ( !empty($key) )
			$k = $key . '%5B' . $k . '%5D';
		if ( $v === NULL )
			continue;
		elseif ( $v === FALSE )
			$v = '0';

		if ( is_array($v) || is_object($v) )
			array_push($ret,yourls_http_build_query($v, '', $sep, $k, $urlencode));
		elseif ( $urlencode )
			array_push($ret, $k.'='.urlencode($v));
		else
			array_push($ret, $k.'='.$v);
	}

	if ( NULL === $sep )
		$sep = ini_get('arg_separator.output');

	return implode($sep, $ret);
}

// Returns a sanitized a user agent string. Given what I found on http://www.user-agents.org/ it should be OK.
function yourls_get_user_agent() {
	if ( !isset( $_SERVER['HTTP_USER_AGENT'] ) )
		return '-';
	
	$ua = strip_tags( html_entity_decode( $_SERVER['HTTP_USER_AGENT'] ));
	$ua = preg_replace('![^0-9a-zA-Z\':., /{}\(\)\[\]\+@&\!\?;_\-=~\*\#]!', '', $ua );
		
	return substr( $ua, 0, 254 );
}

// Redirect to another page
function yourls_redirect( $location, $code = 301 ) {
	// Anti fool check: cannot redirect to the URL we currently are on
	if( preg_replace('!^[^:]+://!', '', $location) != $_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI'] ) {
		yourls_status_header( $code );
		header("Location: $location");
		die();
	}
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
	if ( !file_exists( dirname(__FILE__).'/geo/GeoIP.dat') || !file_exists( dirname(__FILE__).'/geo/geoip.inc') )
		return $default;

	if ( $ip == '' )
		$ip = yourls_get_IP();
		
	require_once( dirname(__FILE__).'/geo/geoip.inc') ;
	$gi = geoip_open( dirname(__FILE__).'/geo/GeoIP.dat', GEOIP_STANDARD);
	$location = geoip_country_code_by_addr($gi, $ip);
	geoip_close($gi);

	return $location;
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

	return $ydb->option[$option_name];
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

	// Make sure the option doesn't already exist. We can check the 'notoptions' cache before we ask for a db query
	if ( false !== yourls_get_option( $safe_name ) )
		return;

	$_value = yourls_escape( yourls_maybe_serialize( $value ) );

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
	if (defined('YOURLS_PRIVATE') && YOURLS_PRIVATE == true) {

		// Allow overruling of particular pages
		$current = basename( $_SERVER["SCRIPT_NAME"] );

		switch( $current ) {
		
		case 'yourls-api.php':
			if( !defined('YOURLS_PRIVATE_API') || YOURLS_PRIVATE_API != false )
				return true;
			break;
				
		case 'yourls-infos.php':
			if( !defined('YOURLS_PRIVATE_INFOS') || YOURLS_PRIVATE_INFOS !== false )
				return true;
			break;
		
		default:
			return true;
			break;
		}
	}
	
	return false;
}

// Show login form if required
function yourls_maybe_require_auth() {
	if( yourls_is_private() )
		require_once( dirname(__FILE__).'/auth.php' );
}

// Echo HTML tag for a link
function yourls_html_link( $href, $title = '', $element = '' ) {
	if( !$title )
		$title = $href;
	if( $element )
		$element = "id='$element'";
	echo "<a href='$href' $element>$title</a>";
}

// Return word or words if more than one
function yourls_plural( $word, $count=1 ) {
	return $word . ($count > 1 ? 's' : '');
}

// Return trimmed string
function yourls_trim_long_string( $string, $length = 60, $append = '[...]' ) {
	if ( strlen( $string ) > $length ) {
		$string = substr( $string, 0, $length - strlen( $append ) ) . $append;	
	}
	return $string;
}

// Allow several short URLs for the same long URL ?
function yourls_allow_duplicate_longurls() {
	return ( defined( 'YOURLS_UNIQUE_URLS' ) && YOURLS_UNIQUE_URLS == false );
}

// Return list of all shorturls associated to the same long URL. Returns NULL or array of keywords.
function yourls_get_duplicate_keywords( $longurl ) {
	if( !yourls_allow_duplicate_longurls() )
		return NULL;
	
	global $ydb;
	$longurl = mysql_real_escape_string( yourls_sanitize_url($longurl) );
	$table = YOURLS_DB_TABLE_URL;
	
	return $ydb->get_col( "SELECT `keyword` FROM `$table` WHERE `url` = '$longurl'" );
}

// Check if an IP shortens URL too fast to prevent DB flood. Return true, or die.
function yourls_check_IP_flood( $ip = '' ) {
	if(
		( defined('YOURLS_FLOOD_DELAY_SECONDS') && YOURLS_FLOOD_DELAY_SECONDS === 0 ) ||
		!defined('YOURLS_FLOOD_DELAY_SECONDS')
	)
		return true;

	$ip = ( $ip ? yourls_sanitize_ip( $ip ) : yourls_get_IP() );

	// Don't throttle whitelist IPs
	if( defined('YOURLS_FLOOD_IP_WHITELIST' && YOURLS_FLOOD_IP_WHITELIST ) ) {
		$whitelist_ips = explode( ',', YOURLS_FLOOD_IP_WHITELIST );
		foreach( $whitelist_ips as $whitelist_ip ) {
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

	global $ydb;
	$table = YOURLS_DB_TABLE_URL;
	
	$lasttime = $ydb->get_var( "SELECT `timestamp` FROM $table WHERE `ip` = '$ip' ORDER BY `timestamp` DESC LIMIT 1" );
	if( $lasttime ) {
		$now = date( 'U' );
		$then = date( 'U', strtotime( $lasttime ) );
		if( ( $now - $then ) <= YOURLS_FLOOD_DELAY_SECONDS ) {
			// Flood!
			yourls_die( 'Too many URLs added too fast. Slow down please.', 'Forbidden', 403 );
		}
	}
	
	return true;
}

// Die die die
function yourls_die( $message = '', $title = '', $header_code = 200 ) {
	yourls_status_header( $header_code );
	
	yourls_html_head();
	?>
	<h1>
		<a href="<?php echo $base_page; ?>" title="YOURLS"><span>YOURLS</span>: <span>Y</span>our <span>O</span>wn <span>URL</span> <span>S</span>hortener<br/>
		<img src="<?php echo YOURLS_SITE; ?>/images/yourls-logo.png" alt="YOURLS" title="YOURLS" style="border: 0px;" /></a>
	</h1>
	<?php
	echo "<h2>$title</h2>";
	echo "<p>$message</p>";
	yourls_html_footer();
	die();
}

// Check if YOURLS is installed
function yourls_is_installed() {
	static $is_installed = false;
	if ( $is_installed === false ) {
		$check_14 = $check_13 = false;
		global $ydb;
		if( defined('YOURLS_DB_TABLE_NEXTDEC') )
			$check_13 = $ydb->get_var('SELECT next_id FROM '.YOURLS_DB_TABLE_NEXTDEC);
		$check_14 = yourls_get_option( 'version' );
		$is_installed = $check_13 || $check_14;
	}
	return $is_installed;
}
