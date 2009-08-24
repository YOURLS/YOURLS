<?php
/*
 * YOURLS
 * Function library
 */

if (defined('YOURLS_DEBUG') && YOURLS_DEBUG == true) {
	error_reporting(E_ALL);
} else {
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING);
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

// Make sure a link id (site.com/1fv) is valid.
function yourls_sanitize_string($in) {
	if (YOURLS_URL_CONVERT <= 37)
		$in = strtolower($in);
	return substr(preg_replace('/[^a-zA-Z0-9]/', '', $in), 0, 12);
}

// A few sanity checks on the URL
function yourls_sanitize_url($url) {
	// make sure there's only one 'http://' at the beginning (prevents pasting a URL right after the default 'http://')
	$url = str_replace('http://http://', 'http://', $url);

	// make sure there's a protocol, add http:// if not
	if ( !preg_match('!^([a-zA-Z]+://)!', $url ) )
		$url = 'http://'.$url;
		
	return yourls_clean_url($url);
}

// Function to filter all invalid characters from a URL. Stolen from WP's clean_url()
function yourls_clean_url( $url ) {
	$url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
	$strip = array('%0d', '%0a', '%0D', '%0A');
	$url = yourls_deep_replace($strip, $url);
	$url = str_replace(';//', '://', $url);
	
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


// Make sure an id link is a valid integer (PHP's intval() limits to too small numbers)
function yourls_sanitize_int($in) {
	return ( substr(preg_replace('/[^0-9]/', '', strval($in) ), 0, 20) );
}

// Make sure a integer is safe
// Note: this is not checking for integers, since integers on 32bits system are way too limited
// TODO: find a way to validate as integer
function yourls_intval($in) {
	return mysql_real_escape_string($in);
}


// Check to see if a given integer id is reserved (ie reserved URL or an existing page)
// Returns bool
function yourls_is_reserved_id($id) {
	global $yourls_reserved_URL;
	$keyword = yourls_int2string( yourls_intval($id) );
	if ( in_array( $keyword, $yourls_reserved_URL)
		or file_exists(dirname(dirname(__FILE__))."/pages/$keyword.php")
		or is_dir(dirname(dirname(__FILE__))."$keyword")
	)
		return true;
	
	return false;
}

// Function: Get IP Address
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
	return $ip_address;
}

// Add the "Edit" row
function yourls_table_edit_row($id, $db) {
	$id = yourls_intval($id);
	$table = YOURLS_DB_TABLE_URL;
	$url = $db->get_row("SELECT `url` FROM `$table` WHERE `id` = '$id';");
	$safe_url = stripslashes($url->url);
	$keyword = yourls_int2string($id);
	if($url) {
	$return = <<<RETURN
<tr id="edit-$id" class="edit-row"><td colspan="6">Edit: <strong>original URL</strong>:<input type="text" id="edit-url-$id" name="edit-url-$id" value="$safe_url" class="text" size="100" /><strong>short URL</strong>:<input type="text" id="edit-id-$id" name="edit-id-$id" value="$keyword" class="text" size="10" /></td><td colspan="1"><input type="button" id="edit-submit-$id" name="edit-submit-$id" value="Save" title="Save new values" class="button" onclick="edit_save('$id');" />&nbsp;<input type="button" id="edit-close-$id" name="edit-close-$id" value="X" title="Cancel editing" class="button" onclick="hide_edit('$id');" /></td></tr>
RETURN;
	} else {
		$return = '<tr><td colspan="7">Invalid URL ID</td></tr>';
	}
	
	return $return;
}

// Add a link row
function yourls_table_add_row( $id, $keyword, $url, $ip, $clicks, $timestamp ) {
	$date = date( 'M d, Y H:i', $timestamp+( YOURLS_HOURS_OFFSET * 3600) );
	$clicks = number_format($clicks);
	$www = YOURLS_SITE;
	
	return <<<ROW
<tr id="id-$id"><td id="keyword-$id">$keyword</td><td id="url-$id"><a href="$url" title="$url">$url</a></td><td id="shorturl-$id"><a href="$www/$keyword" title="$www/$keyword">$www/$keyword</a></td><td id="timestamp-$id">$date</td><td>$ip</td>		<td>$clicks</td><td class="actions"><input type="button" id="edit-button-$id" name="edit-button" value="Edit" class="button" onclick="edit('$id');" />&nbsp;<input type="button" id="delete-button-$id" name="delete-button" value="Del" class="button" onclick="remove('$id');" /></td></tr>
ROW;
}

// Get next id a new link will have if no custom keyword provided
function yourls_get_next_decimal($db) {
	$table = YOURLS_DB_TABLE_NEXTDEC;
	return $db->get_var("SELECT `next_id` FROM `$table`");
}

// Update id for next link with no custom keyword
function yourls_update_next_decimal($int = '', $db) {
	$int = ( $int == '' ) ? 'next+1' : (int)$int ;
	$table = YOURLS_DB_TABLE_NEXTDEC;
	return $db->query("UPDATE `$table` set next_id=$int");
}

// Delete a link in the DB
function yourls_delete_link_by_id($id, $db) {
	$table = YOURLS_DB_TABLE_URL;
	$id = yourls_intval($id);
	return $db->query("DELETE FROM `$table` WHERE `id` = $id;");
}

// SQL query to insert a new link in the DB. Needs sanitized data. Returns boolean for success or failure of the inserting
function yourls_insert_link_in_db($url, $id, $db) {
	$table = YOURLS_DB_TABLE_URL;
	$timestamp = date('Y-m-d H:i:s');
	$ip = yourls_get_IP();
	return $db->query("INSERT INTO `$table` VALUES($id, '$url', '$timestamp', '$ip', 0);");
}

// Add a new link in the DB, either with custom keyword, or find one
function yourls_add_new_link($url, $keyword = '', $db) {
	if ( !$url || $url == 'http://' || $url == 'https://' ) {
		$return['status'] = 'fail';
		$return['code'] = 'error:nourl';
		$return['message'] = 'Missing URL input';
		return $return;
	}

	$table = YOURLS_DB_TABLE_URL;
	$url = mysql_real_escape_string(yourls_sanitize_url($url));
	$strip_url = stripslashes($url);
	$url_exists = $db->get_row("SELECT id,url FROM `$table` WHERE `url` = '".$strip_url."';");
	$ip = yourls_get_IP();
	$return = array();

	// New URL : store it
	if( !$url_exists ) {

		// Custom keyword provided
		if ($keyword) {
			$keyword = mysql_real_escape_string(yourls_sanitize_string($keyword));
			if (!yourls_keyword_is_free($keyword, $db)) {
				// This id either reserved or taken already
				$return['status'] = 'fail';
				$return['code'] = 'error:keyword';
				$return['message'] = 'URL id '.$keyword.' already exists in database or is reserved';
			} else {
				// all clear, store !
				$id = yourls_string2int($keyword);
				yourls_insert_link_in_db($url, $id, $db);
				$return['url'] = array('id' => $id, 'keyword' => $keyword, 'url' => $strip_url, 'date' => date('Y-m-d H:i:s'), 'ip' => yourls_get_IP() );
				$return['status'] = 'success';
				$return['message'] = $strip_url.' added to database';
				$return['html'] = yourls_table_add_row( $id, $keyword, $url, yourls_get_IP(), 0, time() );
				$return['shorturl'] = YOURLS_SITE .'/'. $keyword;
			}

		// Create random keyword	
		} else {
			$timestamp = date('Y-m-d H:i:s');
			$id = yourls_get_next_decimal($db);
			do {
				$add_url = @yourls_insert_link_in_db($url, $id, $db);
				$free = !yourls_is_reserved_id( $id );
				$ok = ($free && $add_url);
				if ( $ok === false && $add_url === 1 ) {
					// we stored something, but shouldn't have (ie reserved id)
					$delete = yourls_delete_link_by_id( $id, $db );
					$return['extra_info'] .= '(deleted '.$id.')';
				} else {
					// everything ok, populate needed vars
					$keyword = yourls_int2string($id);
					$return['url'] = array('id' => $id, 'keyword' => $keyword, 'url' => $strip_url, 'date' => $timestamp, 'ip' => $ip);
					$return['status'] = 'success';
					$return['message'] = $strip_url.' added to database';
					$return['html'] = yourls_table_add_row( $id, $keyword, $url, $ip, 0, time() );
					$return['shorturl'] = YOURLS_SITE .'/'. $keyword;
				}
				$id++;
			} while (!$ok);
			@yourls_update_next_decimal($id, $db);
		}
	} else {
		// URL was already stored
		$return['status'] = 'fail';
		$return['code'] = 'error:url';
		$return['message'] = $strip_url.' already exists in database';
		$return['shorturl'] = YOURLS_SITE .'/'. yourls_int2string( $url_exists->id );
	}

	return $return;
}


// Edit a link
function yourls_edit_link($url, $id, $keyword='', $db) {
	$table = YOURLS_DB_TABLE_URL;
	$url = mysql_real_escape_string(yourls_sanitize_url($url));
	$id = yourls_intval($id);
	$strip_url = stripslashes($url);
	$old_url = $db->get_var("SELECT `url` FROM `$table` WHERE `id` = '".$id."';");
	
	
	// Check if new URL is not here already
	if ($old_url != $url) {
		$url_exists = intval($db->get_var("SELECT id FROM `$table` WHERE `url` = '".$strip_url."';"));
	} else {
		$url_exists = false;
	}
	
	// Check if the new keyword is not here already
	$newid = ( $keyword ? yourls_string2int($keyword) : $id );
	if ($newid != $id) {
		$id_exists = intval($db->get_var("SELECT id FROM `$table` WHERE `id` = '".$newid."';"));
		$id_free = yourls_keyword_is_free($keyword, $db);
		$id_is_ok = ($id_exists == 0) && $id_free;
	} else {
		$id_is_ok = true;
	}
	
	// All clear, update
	if($url_exists == 0 && $id_is_ok ) {
		$timestamp4screen = date( 'Y M d H:i', time()+( yourls_HOURS_OFFSET * 3600) );
		$timestamp4db = date('Y-m-d H:i:s', time()+( yourls_HOURS_OFFSET * 3600) );
		$update_url = $db->query("UPDATE `$table` SET `url` = '$url', `timestamp` = '$timestamp4db', `id` = '$newid' WHERE `id` = $id;");
		if($update_url) {
			$return['url'] = array('id' => $newid, 'keyword' => $keyword, 'shorturl' => YOURLS_SITE.'/'.$keyword, 'url' => $strip_url, 'date' => $timestamp4screen);
			$return['status'] = 'success';
			$return['message'] = 'Link updated in database';
		} else {
			$return['status'] = 'fail';
			$return['message'] = 'Error updating '.$strip_url.' (ID: '.$id.') to database';
		}
	
	// Nope
	} else {
		$return['status'] = 'fail';
		$return['message'] = 'URL or keyword already exists in database';
	}
	
	return $return;
}


// Check if keyword id is free (ie not already taken, and not reserved)
function yourls_keyword_is_free($str, $db) {
	$table = YOURLS_DB_TABLE_URL;
	$id = yourls_string2int($str);
	if ( yourls_is_reserved_id($id) )
		return false;
		
	$already_exists = intval($db->get_var("SELECT `id` FROM `$table` WHERE `id` = '".$id."';"));
	if ( $already_exists )
		return false;

	return true;
}


// Display a page
function yourls_page($page) {
	$include = dirname(dirname(__FILE__))."/pages/$page.php";
	if (!file_exists($include)) {
		die("Page '$page' not found");
	}
	include($include);
	die();	
}

// Connect to DB
function yourls_db_connect() {
	if (!defined('YOURLS_DB_USER')
		or !defined('YOURLS_DB_PASS')
		or !defined('YOURLS_DB_NAME')
		or !defined('YOURLS_DB_HOST')
		or !class_exists('ezSQL_mysql')
	) die ('DB config/class missing');
	
	$db =  new ezSQL_mysql(YOURLS_DB_USER, YOURLS_DB_PASS, YOURLS_DB_NAME, YOURLS_DB_HOST);
	if ( $db->last_error )
		die( $db->last_error );
	
	return $db;
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

// Return array for API stat requests
function yourls_api_stats( $filter, $limit, $db ) {
	switch( $filter ) {
		case 'bottom':
			$sort_by = 'clicks';
			$sort_order = 'asc';
			break;
		case 'last':
			$sort_by = 'timestamp';
			$sort_order = 'desc';
			break;
		case 'top':
		default:
			$sort_by = 'clicks';
			$sort_order = 'desc';
			break;
	}
	
	$limit = intval( $limit );
	$table_url = YOURLS_DB_TABLE_URL;
	$results = $db->get_results("SELECT * FROM $table_url WHERE 1=1 ORDER BY $sort_by $sort_order LIMIT 0, $limit;");

	$return = array();
	$i = 1;

	foreach ($results as $res) {
		$return['links']['link_'.$i++] = array(
			'shorturl' => YOURLS_SITE .'/'. yourls_int2string($res->id),
			'url' => $res->url,
			'timestamp' => $res->timestamp,
			'ip' => $res->ip,
			'clicks' => $res->clicks
		);
	}

	$totals = $db->get_row("SELECT COUNT(id) as c, SUM(clicks) as s FROM $table_url WHERE 1=1");
	$return['stats'] = array( 'total_links' => $totals->c, 'total_clicks' => $totals->s );

	return $return;
}

// Return API result. Dies after this
function yourls_api_output( $mode, $return ) {
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
			echo $return['shorturl'];
			break;
	}
	die();
}

// Display HTML head and <body> tag
function yourls_html_head( $context = 'index' ) {
	// Load components as needed
	switch ( $context ) {
		case 'bookmark':
			$share = true;
			$insert = true;
			$tablesorter = true;
			break;
			
		case 'index':
			$share = false;
			$insert = true;
			$tablesorter = true;
			break;
		
		case 'install':
		case 'login':
		case 'new':
		case 'tools':
			$share = false;
			$insert = false;
			$tablesorter = false;
			break;
	}
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>YOURLS &raquo; Your Own URL Shortener | <?php echo YOURLS_SITE; ?></title>
	<link rel="icon" type="image/gif" href="<?php echo YOURLS_SITE; ?>/images/favicon.gif" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="copyright" content="Copyright &copy; 2008-<?php echo date('Y'); ?> YOURS" />
	<meta name="author" content="Ozh Richard, Lester Chan" />
	<meta name="description" content="Insert URL &laquo; YOURLS &raquo; Your Own URL Shortener' | <?php echo YOURLS_SITE; ?>" />
	<script src="<?php echo YOURLS_SITE; ?>/js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="<?php echo YOURLS_SITE; ?>/css/style.css" type="text/css" media="screen" />
	<?php if ($tablesorter) { ?>
		<link rel="stylesheet" href="<?php echo YOURLS_SITE; ?>/css/tablesorter.css" type="text/css" media="screen" />
		<script src="<?php echo YOURLS_SITE; ?>/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<?php } ?>
	<?php if ($insert) { ?>
		<script src="<?php echo YOURLS_SITE; ?>/js/insert.js" type="text/javascript"></script>
	<?php } ?>
	<?php if ($share) { ?>
		<script src="<?php echo YOURLS_SITE; ?>/js/share.js" type="text/javascript"></script>
	<?php } ?>
</head>
<body class="<?php echo $context; ?>">
	<?php
}

// Display HTML footer (including closing body & html tags)
function yourls_html_footer() {
	?>
	<div id="footer"><p>Powered by <a href="http://yourls.org/" title="YOURLS">YOURLS</a> v<?php echo YOURLS_VERSION; ?></p></div>	
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
				<strong>Enter the URL</strong>:<input type="text" id="add-url" name="url" value="<?php echo $url; ?>" class="text" size="90" />
				Optional: <strong>Custom short URL</strong>:<input type="text" id="add-keyword" name="keyword" value="<?php echo $keyword; ?>" maxlength="12" class="text" size="8" />
				<input type="button" id="add-button" name="add-button" value="Shorten The URL" class="button" onclick="add();" />
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

function yourls_share_box( $longurl, $shorturl, $title='', $text='' ) {
	$text = ( $text ? '"'.$text.'" ' : '' );
	$title = ( $title ? "$title " : '' );
	$share = $title.$text.$shorturl ;
	$_share = rawurlencode( $share );
	$_url = rawurlencode( $shorturl );
	$count = 140 - strlen( $share );
	?>
	
	<div id="shareboxes">

		<div id="copybox" class="share">
		<h2>Your short link</h2>
			<p><input id="copylink" class="text" size="40" value="<?php echo $shorturl; ?>" /></p>
			<p><small>Original link: <a href="<?php echo $longurl; ?>"><?php echo $longurl; ?></a></small></p>
		</div>

		<div id="sharebox" class="share">
			<h2>Quick Share</h2>
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
