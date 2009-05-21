<?php
define('YOURLS_API', true);
require_once( dirname(__FILE__).'/includes/config.php' );
if ( defined('YOURLS_PRIVATE') && YOURLS_PRIVATE == true )
	require_once( dirname(__FILE__).'/includes/auth.php' );


$db = yourls_db_connect();
$return = yourls_add_new_link( $_REQUEST['url'], $_REQUEST['keyword'], $db );

yourls_api_output( $_REQUEST['format'], $return );

die();