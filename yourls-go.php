<?php
// Require Files
require_once( dirname(__FILE__).'/includes/config.php' );

// Connect To Database
$db = yourls_db_connect();

// Variables
$id = ( isset( $_GET['id'] ) ? $_GET['id'] : '' );
$keyword = yourls_sanitize_string( $id );

// First possible exit:
if ( !$keyword ) {
	header ('Location: '. YOURLS_SITE);
	exit();
}

$id = yourls_sanitize_int( yourls_string2int($keyword) );

// Get URL From Database
$table = YOURLS_DB_TABLE_URL;
$url = stripslashes($db->get_var("SELECT `url` FROM `$table` WHERE id = $id"));

$protocol = $_SERVER["SERVER_PROTOCOL"];
if ( 'HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol )
	$protocol = 'HTTP/1.0';

// URL found
if(!empty($url)) {
	$update_clicks = $db->query("UPDATE `$table` SET `clicks` = clicks + 1 WHERE `id` = $id");
	header ($protocol.' 301 Moved Permanently');
	header ('Location: '. $url);

// URL not found. Either reserved, or page, or doesn't exist
} else {

	// Do we have a page?
	if (file_exists(dirname(__FILE__)."/pages/$keyword.php")) {
		yourls_page($keyword);

	// Either reserved id, or no such id
	} else {
		header ($protocol.' 307 Temporary Redirect'); // no 404 to tell browser this might change, and also to not pollute logs
		header ('Location: '. YOURLS_SITE);
	}
}
exit();
?>