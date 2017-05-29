<?php
/*
Plugin Name: YOURLS Toolbar
Plugin URI: http://yourls.org/
Description: Add a social toolbar to your redirected short URLs. Fork this plugin if you want to make your own toolbar.
Version: 1.0
Author: Ozh
Author URI: http://ozh.org/
Disclaimer: Toolbars ruin the user experience. Be warned.
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

global $ozh_toolbar;
$ozh_toolbar['do'] = false;
$ozh_toolbar['keyword'] = '';

// When a redirection to a shorturl is about to happen, register variables
yourls_add_action( 'redirect_shorturl', 'ozh_toolbar_add' );
function ozh_toolbar_add( $args ) {
	global $ozh_toolbar;
	$ozh_toolbar['do'] = true;
	$ozh_toolbar['keyword'] = $args[1];
}

// On redirection, check if this is a toolbar and draw it if needed
yourls_add_action( 'pre_redirect', 'ozh_toolbar_do' );
function ozh_toolbar_do( $args ) {
	global $ozh_toolbar;
	
	// Does this redirection need a toolbar?
	if( !$ozh_toolbar['do'] )
		return;

	// Do we have a cookie stating the user doesn't want a toolbar?
	if( isset( $_COOKIE['yourls_no_toolbar'] ) && $_COOKIE['yourls_no_toolbar'] == 1 )
		return;
	
	// Get URL and page title
	$url = $args[0];
	$pagetitle = yourls_get_keyword_title( $ozh_toolbar['keyword'] );

	// Update title if it hasn't been stored yet
	if( $pagetitle == '' ) {
		$pagetitle = yourls_get_remote_title( $url );
		yourls_edit_link_title( $ozh_toolbar['keyword'], $pagetitle );
	}
	$_pagetitle = htmlentities( yourls_get_remote_title( $url ) );
	
	$www = YOURLS_SITE;
	$ver = YOURLS_VERSION;
	$md5 = md5( $url );
	$sql = yourls_get_num_queries();

	// When was the link created (in days)
	$diff = abs( time() - strtotime( yourls_get_keyword_timestamp( $ozh_toolbar['keyword'] ) ) );
	$days = floor( $diff / (60*60*24) );
	if( $days == 0 ) {
		$created = 'today';
	} else {
		$created = $days . ' ' . yourls_n( 'day', 'days', $days ) . ' ago';
	}
	
	// How many hits on the page
	$hits = 1 + yourls_get_keyword_clicks( $ozh_toolbar['keyword'] );
	$hits = $hits . ' ' . yourls_n( 'view', 'views', $hits );
	
	// Plugin URL (no URL is hardcoded)
	$pluginurl = YOURLS_PLUGINURL . '/'.yourls_plugin_basename( __DIR__ );

	// All set. Draw the toolbar itself.
	echo <<<PAGE
<html>
<head>
	<title>$pagetitle &mdash; YOURLS</title>
	<link rel="icon" type="image/gif" href="$www/images/favicon.gif" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE-9"/>
	<meta name="generator" content="YOURLS v$ver" />
	<meta name="ROBOTS" content="NOINDEX, FOLLOW" />
	<link rel="stylesheet" href="$pluginurl/css/toolbar.css" type="text/css" media="all" />
</head>
<body>
<div id="yourls-bar">
	<div id="yourls-about">
		Short link powered by <a href="http://yourls.org/">YOURLS</a> and created $created. $hits.
		<!-- $sql queries -->
	</div>
	
	<div id="yourls-delicious">
	<img src="http://static.delicious.com/img/delicious.small.gif" height="10" width="10" alt="Delicious" />
	<a id="yourls-delicious-link" title="Bookmark on delicious" href="http://delicious.com/save" onclick="window.open('http://delicious.com/save?v=5&noui&jump=close&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title), 'delicious','toolbar=no,width=550,height=550'); return false;"> Bookmark on Delicious</a>
	</div>

	<script type="text/javascript" id="topsy_global_settings">
	var topsy_theme = "light-blue";
	var topsy_nick = " ";
	var topsy_style = "small";
	var topsy_order = "count,retweet,badge";
	</script>
	<div id="yourls-topsy" class="topsy_widget_data">
		<!--{
		        "url": "$www/{$ozh_toolbar['keyword']}",
		        "title": "$_pagetitle",
		}-->
	</div>
	
	<div id="yourls-selfclose">
		<a id="yourls-once" href="$url" title="Close this toolbar">close</a>
		<a id="yourls-always" href="$url" title="Never show me this toolbar again">close</a>
		
	</div>
</div>

<iframe id="yourls-frame" frameborder="0" noresize="noresize" src="$url" name="yourlsFrame"></iframe>
<script type="text/javascript" src="$pluginurl/js/toolbar.js"></script>
<script type="text/javascript" src="http://cdn.topsy.com/topsy.js?init=topsyWidgetCreator"></script>
<script type="text/javascript" src="http://feeds.delicious.com/v2/json/urlinfo/$md5?callback=yourls_get_books"></script>
</body>
</html>
PAGE;
	
	// Don't forget to die, to interrupt the flow of normal events (ie redirecting to long URL)
	die();
}