<?php
/*
Plugin Name: Sample Toolbar
Plugin URI: http://yourls.org/
Description: Add a "toolbar" wrapping redirected short URLs.
Version: 0.1
Author: Ozh
Author URI: http://ozh.org/
Disclaimer: Toolbars ruin the user experience. Be warned.
*/

global $ozh_toolbar;
$ozh_toolbar['do'] = false;
$ozh_toolbar['keyword'] = '';

yourls_add_action( 'redirect_shorturl', 'ozh_toolbar_add' );
function ozh_toolbar_add( $args ) {
	global $ozh_toolbar;
	$ozh_toolbar['do'] = true;
	$ozh_toolbar['keyword'] = $args[1];
}

yourls_add_action( 'pre_redirect', 'ozh_toolbar_do' );
function ozh_toolbar_do( $args ) {
	global $ozh_toolbar;
	
	if( !$ozh_toolbar['do'] )
		return;
		
	$url = $args[0];
	
	$pagetitle = yourls_get_keyword_title( $ozh_toolbar['keyword'] );
	
	echo <<<PAGE
<html>
<head>
	<title>$pagetitle (YOURLS toolbar)</title>
	<style>
	body {
		margin:0;
		padding:0;
		overflow:hidden;
	}
	#yourlsFrame {
		position: absolute;
		background: transparent;
		width: 100%;
		height:100%;
		top: 0;
		padding: 32px 0;
		z-index: 1;
	}
	#yourlsBar {
		font-family: Verdana, Arial;
		font-size: 12px;
		position:absolute;
		top:0;
		height:32px;
		width:100%;
		background:#e3f3ff;
		color:#888;
		-moz-box-shadow: 0 1px 5px rgba(0,0,0,0.5);
		-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
		z-index: 900000;
	}
	#yourlsBar p {
		padding:5px 10px;
		margin:2px;
	}
	#selfclose {
		display:block;
		float:right;
		zmargin-right:70px;
	}
	div.topsy_widget_data { display:inline; float:left; }
	</style>
	<script type="text/javascript" src="http://cdn.topsy.com/topsy.js?init=topsyWidgetCreator"></script>
</head>
<body>
<div id="yourlsBar">
	<p>
		Toolbar by <a href="http://yourls.org/">YOURLS</a>
		<div class="topsy_widget_data"><!--
		    {
		        "url": "http://labs.topsy.com/widgets/retweet-button/",
		        "title": "Topsy Retweet Button for Web Sites"
		    }
		--></div>
		<span id="selfclose">(<a href="$url">close</a>)</span>
	</p>
</div>
<iframe id="yourlsFrame" frameborder="0" noresize="noresize" src="$url" name="yourlsFrame"></iframe>
</body>
</html>
PAGE;
	
	die();
}