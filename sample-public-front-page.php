<html>
<head>
<title>YOURLS Public Interface Sample</title>
<style>
body {background:#BFE0FE; color:#666; font:16px/30px verdana,arial,sans-serif;}
h1 {text-align:center}
h2 {border-bottom:1px solid white}
#credits, #credit a {font-size:80%; color:#aaa}
</style>
<!-- customize more: CSS, etc -->
</head>

<body>
<h1>YOURLS: Your Own URL Shortener</h1>

<?php
require_once( dirname(__FILE__).'/includes/load-yourls.php' );

// Part to be executed if FORM has been submitted
if ( isset($_REQUEST['url']) ) {

	$url = $_REQUEST['url'];
	$keyword = isset( $_REQUEST['keyword'] ) ? $_REQUEST['keyword'] : '' ;

	$return = yourls_add_new_link( $url, $keyword );
	
	$shorturl = $return['shorturl'];
	$message = $return['message'];
	
	echo <<<RESULT
	<h2>URL has been shortened</h2>
	<p>Original URL: <code><a href="$url">$url</a></code></p>
	<p>Short URL: <code><a href="$shorturl">$shorturl</a></code></p>
	<p>$message</p>
RESULT;

/*
If you want to add the Quick Share box like on the private bookmarklet, simply use this PHP function:
<?php yourls_share_box( $url, $shorturl ); ?>
For all the special stuff to work you need to include js/share.js in the <head> of your page
*/


// Part to be executed when no form has been submitted
} else {

	echo <<<HTML
	<h2>Enter a new URL to shorten</h2>
	<form method="post" action="">
	<p><label>URL: <input type="text" name="url" value="http://" size="50" /></label></p>
	<p><label>Optional custom keyword: <input type="text" name="keyword" size="5" /></label></p>
	<p><input type="submit" value="Shorten" /></p>
	</form>	
HTML;

}

?>

<!-- Example bookmarklet. Be sure to rename the link target from "sample-public-front-page.php" to whatever you'll use (probably index.php) -->
<p><a href="javascript:void(location.href='<?php echo YOURLS_SITE; ?>/sample-public-front-page.php?format=simple&action=shorturl&url='+escape(location.href))">bookmarklet</a>

<div id="footer"><p>Powered by <a href="http://yourls.org/" title="YOURLS">YOURLS</a> v<?php echo YOURLS_VERSION; ?></p></div>
</body>
</html>