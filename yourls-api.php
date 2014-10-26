<?php
/*
 * YOURLS API
 *
 * Note about translation : this file should NOT be translation ready
 * API messages and returns are supposed to be programmatically tested, so default English is expected
 *
 */

define( 'YOURLS_API', true );
require_once( dirname( __FILE__ ) . '/includes/load-yourls.php' );
yourls_maybe_require_auth();

$action = ( isset( $_REQUEST['action'] ) ? $_REQUEST['action'] : null );

yourls_do_action( 'api', $action );

// Define standard API actions
$api_actions = array(
	'shorturl'  => 'yourls_api_action_shorturl',
	'stats'     => 'yourls_api_action_stats',
	'db-stats'  => 'yourls_api_action_db_stats',
	'url-stats' => 'yourls_api_action_url_stats',
	'expand'    => 'yourls_api_action_expand',
	'version'   => 'yourls_api_action_version',
);
$api_actions = yourls_apply_filter( 'api_actions', $api_actions );

// Register API actions
foreach( (array) $api_actions as $_action => $_callback ) {
	yourls_add_filter( 'api_action_' . $_action, $_callback, 99 );		
}

// Try requested API method. Properly registered actions should return an array.
$return = yourls_apply_filter( 'api_action_' . $action, false );
if ( false === $return ) {
	$return = array(
		'errorCode' => 400,
		'message'   => 'Unknown or missing "action" parameter',
		'simple'    => 'Unknown or missing "action" parameter',
	);
}

if( isset( $_REQUEST['callback'] ) )
	$return['callback'] = $_REQUEST['callback'];

$format = ( isset( $_REQUEST['format'] ) ? $_REQUEST['format'] : 'xml' );

yourls_api_output( $format, $return );

die();