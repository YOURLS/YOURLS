<?php

// Display <h1> header and logo
function yourls_html_logo() {
	yourls_do_action( 'pre_html_logo' );
	?>
	<h1>
		<a href="<?php echo yourls_admin_url('index.php') ?>" title="YOURLS"><span>YOURLS</span>: <span>Y</span>our <span>O</span>wn <span>URL</span> <span>S</span>hortener<br/>
		<img src="<?php yourls_site_url(); ?>/images/yourls-logo.png" alt="YOURLS" title="YOURLS" border="0" style="border: 0px;" /></a>
	</h1>
	<?php
	yourls_do_action( 'html_logo' );
}

// Display HTML head and <body> tag
function yourls_html_head( $context = 'index', $title = '' ) {
	// All components to false, except when specified true
	$share = $insert = $tablesorter = $tabs = $cal = false;
	
	// Load components as needed
	switch ( $context ) {
		case 'infos':
			$share = $tabs = true;
			break;
			
		case 'bookmark':
			$share = $insert = $tablesorter = true;
			break;
			
		case 'index':
			$insert = $tablesorter = $cal = $share = true;
			break;
			
		case 'plugins':
		case 'tools':
			$tablesorter = true;
			break;
		
		case 'install':
		case 'login':
		case 'new':
		case 'upgrade':
			break;
	}
	
	// Force no cache for all admin pages
	if( yourls_is_admin() && !headers_sent() ) {
		header( 'Expires: Thu, 23 Mar 1972 07:00:00 GMT' );
		header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
		header( 'Cache-Control: no-cache, must-revalidate, max-age=0' );
		header( 'Pragma: no-cache' );
		yourls_do_action( 'admin_headers' );
	}
	
	// Body class
	$bodyclass = '';
	$bodyclass .= ( yourls_is_mobile_device() ? 'mobile' : 'desktop' );
	
	// Page title
	$_title = 'YOURLS &mdash; Your Own URL Shortener | ' . YOURLS_SITE;
	$title = $title ? $title . " &laquo; " . $_title : $_title;
	$title = yourls_apply_filter( 'html_title', $title );
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php echo $title ?></title>
	<link rel="icon" type="image/gif" href="<?php yourls_site_url(); ?>/images/favicon.gif" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="chrome=1" />
	<meta name="author" content="Ozh RICHARD & Lester CHAN for http://yourls.org/" />
	<meta name="generator" content="YOURLS <?php echo YOURLS_VERSION ?>" />
	<meta name="description" content="Insert URL &laquo; YOURLS &raquo; Your Own URL Shortener' | <?php yourls_site_url(); ?>" />
	<script src="<?php yourls_site_url(); ?>/js/jquery-1.4.3.min.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
	<script src="<?php yourls_site_url(); ?>/js/common.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
	<script src="<?php yourls_site_url(); ?>/js/jquery.notifybar.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
	<link rel="stylesheet" href="<?php yourls_site_url(); ?>/css/style.css?v=<?php echo YOURLS_VERSION; ?>" type="text/css" media="screen" />
	<?php if ($tabs) { ?>
		<link rel="stylesheet" href="<?php yourls_site_url(); ?>/css/infos.css?v=<?php echo YOURLS_VERSION; ?>" type="text/css" media="screen" />
		<script src="<?php yourls_site_url(); ?>/js/infos.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
	<?php } ?>
	<?php if ($tablesorter) { ?>
		<link rel="stylesheet" href="<?php yourls_site_url(); ?>/css/tablesorter.css?v=<?php echo YOURLS_VERSION; ?>" type="text/css" media="screen" />
		<script src="<?php yourls_site_url(); ?>/js/jquery.tablesorter.min.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
	<?php } ?>
	<?php if ($insert) { ?>
		<script src="<?php yourls_site_url(); ?>/js/insert.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
	<?php } ?>
	<?php if ($share) { ?>
		<link rel="stylesheet" href="<?php yourls_site_url(); ?>/css/share.css?v=<?php echo YOURLS_VERSION; ?>" type="text/css" media="screen" />
		<script src="<?php yourls_site_url(); ?>/js/share.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
		<script src="<?php yourls_site_url(); ?>/js/ZeroClipboard.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
		<script type="text/javascript">ZeroClipboard.setMoviePath( '<?php yourls_site_url(); ?>/js/ZeroClipboard.swf' );</script>
	<?php } ?>
	<?php if ($cal) { ?>
		<link rel="stylesheet" href="<?php yourls_site_url(); ?>/css/cal.css?v=<?php echo YOURLS_VERSION; ?>" type="text/css" media="screen" />
		<script src="<?php yourls_site_url(); ?>/js/jquery.cal.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
	<?php } ?>
	<script type="text/javascript">
	//<![CDATA[
		var ajaxurl = '<?php echo yourls_admin_url( 'admin-ajax.php' ); ?>';
	//]]>
	</script>
	<?php yourls_do_action( 'html_head', $context ); ?>
</head>
<body class="<?php echo $context; ?> <?php echo $bodyclass; ?>">
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
	<?php yourls_do_action( 'html_footer' ); ?>
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
				Optional: <strong>Custom short URL</strong>:<input type="text" id="add-keyword" name="keyword" value="<?php echo $keyword; ?>" class="text" size="8" />
				<?php yourls_nonce_field( 'add_url', 'nonce-add' ); ?>
				<input type="button" id="add-button" name="add-button" value="Shorten The URL" class="button" onclick="add();" /></div>
			</form>
			<div id="feedback" style="display:none"></div>
		</div>
		<?php yourls_do_action( 'html_addnew' ); ?>
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
						Search&nbsp;for&nbsp;
						<input type="text" name="s_search" class="text" size="20" value="<?php echo $search_text; ?>" />
						&nbsp;in&nbsp;
						<select name="s_in" size="1">
							<option value="keyword"<?php if($search_in_sql == 'keyword') { echo ' selected="selected"'; } ?>>Short URL</option>
							<option value="url"<?php if($search_in_sql == 'url') { echo ' selected="selected"'; } ?>>URL</option>
							<option value="title"<?php if($search_in_sql == 'title') { echo ' selected="selected"'; } ?>>Title</option>
							<option value="ip"<?php if($search_in_sql == 'ip') { echo ' selected="selected"'; } ?>>IP</option>
						</select>
						&ndash;&nbsp;Order&nbsp;by&nbsp;
						<select name="s_by" size="1">
							<option value="id"<?php if($sort_by_sql == 'keyword') { echo ' selected="selected"'; } ?>>Short URL</option>
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
						<input type="text" name="link_limit" class="text" size="4" value="<?php echo $link_limit; ?>" />clicks<br/>
						
						Show links created
						<select name="date_filter" id="date_filter" size="1">
							<option value="before"<?php if($date_filter === 'before') { echo ' selected="selected"'; } ?>>before</option>
							<option value="after"<?php if($date_filter === 'after') { echo ' selected="selected"'; } ?>>after</option>
							<option value="between"<?php if($date_filter === 'between') { echo ' selected="selected"'; } ?>> between</option>
						</select>
						<input type="text" name="date_first" id="date_first" class="text" size="12" value="<?php echo $date_first; ?>" />
						<span id="date_and" <?php if($date_filter === 'between') { echo ' style="display:inline"'; } ?>> and </span>
						<input type="text" name="date_second" id="date_second" class="text" size="12" value="<?php echo $date_second; ?>" <?php if($date_filter === 'between') { echo ' style="display:inline"'; } ?>/>
						
						<div style="float:right;">
							<input type="submit" id="submit-sort" value="Filter" class="button primary" />
							&nbsp;
							<input type="button" id="submit-clear-filter" value="Clear Filter" class="button" onclick="window.parent.location.href = 'index.php'" />
						</div>

						
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
		<?php yourls_do_action( 'html_tfooter' ); ?>
	</tfoot>
	<?php
}

// Display the Quick Share box
function yourls_share_box( $longurl, $shorturl, $title='', $text='', $shortlink_title = '<h2>Your short link</h2>', $share_title = '<h2>Quick Share</h2>', $hidden = false ) {
	$text = ( $text ? '"'.$text.'" ' : '' );
	$title = ( $title ? "$title " : '' );
	$share = htmlspecialchars_decode( $title.$text.$shorturl );
	$_share = rawurlencode( $share );
	$_url = rawurlencode( $shorturl );
	$count = 140 - strlen( $share );
	
	$hidden = ( $hidden ? 'style="display:none;"' : '' );
	?>
	
	<div id="shareboxes" <?php echo $hidden; ?>>

		<?php yourls_do_action( 'shareboxes_before' ); ?>

		<div id="copybox" class="share">
		<?php echo $shortlink_title; ?>
			<p><input id="copylink" class="text" size="40" value="<?php echo $shorturl; ?>" /></p>
			<p><small>Long link: <a id="origlink" href="<?php echo $longurl; ?>"><?php echo $longurl; ?></a></small>
			<?php if( yourls_do_log_redirect() ) { ?>
			<br/><small>Stats: <a id="statlink" href="<?php echo $shorturl; ?>+"><?php echo $shorturl; ?>+</a></small>
			<input type="hidden" id="titlelink" value="<?php echo $title; ?>" />
			<?php } ?>
			</p>
		</div>

		<?php yourls_do_action( 'shareboxes_middle' ); ?>

		<div id="sharebox" class="share">
			<?php echo $share_title; ?>
			<div id="tweet">
				<span id="charcount" class="hide-if-no-js"><?php echo $count; ?></span>
				<textarea id="tweet_body"><?php echo $share; ?></textarea>
			</div>
			<p id="share_links">Share with 
				<a id="share_tw" href="http://twitter.com/home?status=<?php echo $_share; ?>" title="Tweet this!" onclick="share('tw');return false">Twitter</a>
				<a id="share_fb" href="http://www.facebook.com/share.php?u=<?php echo $_url; ?>" title="Share on Facebook" onclick="share('fb');return false;">Facebook</a>
				<a id="share_ff" href="http://friendfeed.com/share/bookmarklet/frame#title=<?php echo $_share; ?>" title="Share on Friendfeed" onclick="javascript:share('ff');return false;">FriendFeed</a>
				<?php
				yourls_do_action( 'share_links' , $longurl, $shorturl, $title, $text );
				?>
			</p>
		</div>
		
		<?php yourls_do_action( 'shareboxes_after' ); ?>
	
	</div>
	
	<?php
}


// Die die die
function yourls_die( $message = '', $title = '', $header_code = 200 ) {
	yourls_status_header( $header_code );
	
	yourls_html_head();
	yourls_html_logo();
	echo yourls_apply_filter( 'die_title', "<h2>$title</h2>" );
	echo yourls_apply_filter( 'die_message', "<p>$message</p>" );
	yourls_do_action( 'yourls_die' );
	yourls_html_footer();
	die();
}

// Echo HTML tag for a link
function yourls_html_link( $href, $title = '', $element = '' ) {
	if( !$title )
		$title = $href;
	if( $element )
		$element = "id='$element'";
	echo "<a href='$href' $element>$title</a>";
}

// Display the login screen. Nothing past this point.
function yourls_login_screen( $error_msg = '' ) {
	yourls_html_head( 'login' );
	
	$action = ( isset($_GET['action']) && $_GET['action'] == 'logout' ? '?' : '' );

	yourls_html_logo();
	?>
	<div id="login">
		<form method="post" action="<?php echo $action; ?>"> <?php // reset any QUERY parameters ?>
			<?php
				if(!empty($error_msg)) {
					echo '<p class="error">'.$error_msg.'</p>';
				}
			?>
			<p>
				<label for="username">Username</label><br />
				<input type="text" id="username" name="username" size="30" class="text" />
			</p>
			<p>
				<label for="password">Password</label><br />
				<input type="password" id="password" name="password" size="30" class="text" />
			</p>
			<p style="text-align: right;">
				<input type="submit" id="submit" name="submit" value="Login" class="button" />
			</p>
		</form>
		<script type="text/javascript">$('#username').focus();</script>
	</div>
	<?php
	yourls_html_footer();
	die();
}

// Display the admin menu
function yourls_html_menu() {
	?>
	<ul id="admin_menu">
	<?php if ( yourls_is_private() ) { ?>
		<li>Hello <strong><?php echo YOURLS_USER; ?></strong> (<a href="?action=logout" title="Logout">Logout</a>)</li>
	<?php } ?>
		<li><a href="<?php echo yourls_admin_url('index.php') ?>">Admin Interface</a></li>
	<?php if( yourls_is_admin() ) { ?>
		<li><a href="<?php echo yourls_admin_url('tools.php'); ?>">Tools</a></li>
		<li><a href="<?php echo yourls_admin_url('plugins.php'); ?>">Plugins</a></li>
		<?php yourls_list_plugin_admin_pages(); ?>	
		<li><a href="<?php yourls_site_url(); ?>/readme.html">Help</a></li>
		<?php yourls_do_action( 'admin_menu' ); ?>
	<?php } ?>
	</ul>
	<?php
	yourls_do_action( 'admin_notices' );
	yourls_do_action( 'admin_notice' ); // because I never remember if it's 'notices' or 'notice'
	/*
	To display a notice:
	$message = "<div>OMG, dude, I mean!</div>" );
	yourls_add_action('admin_notices', create_function( '', "echo '$message';" ) );
	*/
}

// Wrapper to admin notices
function yourls_add_notice( $message ) {
	$message = yourls_notice_box( $message );
	yourls_add_action('admin_notices', create_function( '', "echo '$message';" ) );
}


// Return a formatted notice
function yourls_notice_box( $message ) {
	return <<<HTML
	<div class="notice">
	<p>$message</p>
	</div>
HTML;
}
