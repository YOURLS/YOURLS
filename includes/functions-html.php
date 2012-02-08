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

	yourls_do_action( 'pre_html_head', $context, $title );
	
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
		yourls_do_action( 'admin_headers', $context, $title );
	}
	
	// Store page context in global object
	global $ydb;
	$ydb->context = $context;
	
	// Body class
	$bodyclass = yourls_apply_filter( 'bodyclass', '' );
	$bodyclass .= ( yourls_is_mobile_device() ? 'mobile' : 'desktop' );
	
	// Page title
	$_title = 'YOURLS &mdash; Your Own URL Shortener | ' . yourls_link();
	$title = $title ? $title . " &laquo; " . $_title : $_title;
	$title = yourls_apply_filter( 'html_title', $title, $context );
	
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
	<script src="<?php yourls_site_url(); ?>/js/jquery-1.6.1.min.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
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
		<script src="<?php yourls_site_url(); ?>/js/jquery.zclip.min.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
	<?php } ?>
	<?php if ($cal) { ?>
		<link rel="stylesheet" href="<?php yourls_site_url(); ?>/css/cal.css?v=<?php echo YOURLS_VERSION; ?>" type="text/css" media="screen" />
		<script src="<?php yourls_site_url(); ?>/js/jquery.cal.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
	<?php } ?>
	<script type="text/javascript">
	//<![CDATA[
		var ajaxurl  = '<?php echo yourls_admin_url( 'admin-ajax.php' ); ?>';
		var zclipurl = '<?php yourls_site_url(); ?>/js/ZeroClipboard.swf';
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
	<?php yourls_do_action( 'html_footer', $ydb->context ); ?>
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
			<th colspan="6">
			<div id="filter_form">
				<form action="" method="get">
					<div id="filter_options">
						Search&nbsp;for&nbsp;
						<input type="text" name="s_search" class="text" size="15" value="<?php echo $search_text; ?>" />
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
						
						<div id="filter_buttons">
							<input type="submit" id="submit-sort" value="Search" class="button primary" />
							&nbsp;
							<input type="button" id="submit-clear-filter" value="Clear" class="button" onclick="window.parent.location.href = 'index.php'" />
						</div>
				
					</div>
				</form>
			</div>
			<div id="pagination">
				<span class="navigation">
				<?php if( $total_pages > 1 ) { ?>
					<span class="nav_total"><?php echo $total_pages .' '. yourls_plural( 'page', $total_pages ); ?></span>
					<?php
					$base_page = yourls_admin_url( 'index.php' );
					// Pagination offsets: min( max ( zomg! ) );
					$p_start = max(  min( $total_pages - 4, $page - 2 ), 1 );
					$p_end = min( max( 5, $page + 2 ), $total_pages );
					if( $p_start >= 2 ) {
						$link = yourls_add_query_arg( array_merge( $params, array( 'page' => 1 ) ), $base_page );
						echo '<span class="nav_link nav_first"><a href="' . $link . '" title="Go to First Page">&laquo; First</a></span>';
						echo '<span class="nav_link nav_prev"></span>';
					}
					for( $i = $p_start ; $i <= $p_end; $i++ ) {
						if( $i == $page ) {
							echo "<span class='nav_link nav_current'>$i</span>";
						} else {
							$link = yourls_add_query_arg( array_merge( $params, array( 'page' => $i ) ), $base_page );
							echo '<span class="nav_link nav_goto"><a href="' . $link . '" title="Page '.$i.'">'.$i.'</a></span>';
						}
					}
					if( ( $p_end ) < $total_pages ) {
						$link = yourls_add_query_arg( array_merge( $params, array( 'page' => $total_pages ) ), $base_page );
						echo '<span class="nav_link nav_next"></span>';
						echo '<span class="nav_link nav_last"><a href="' . $link . '" title="Go to Last Page">Last &raquo;</a></span>';
					}
					?>
				<?php } ?>
				</span>
			</div>
			</th>
		</tr>
		<?php yourls_do_action( 'html_tfooter' ); ?>
	</tfoot>
	<?php
}

// Display the Quick Share box
function yourls_share_box( $longurl, $shorturl, $title='', $text='', $shortlink_title = '<h2>Your short link</h2>', $share_title = '<h2>Quick Share</h2>', $hidden = false ) {
	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_share_box', false );
	if ( false !== $pre )
		return $pre;
		
	$text = ( $text ? '"'.$text.'" ' : '' );
	$title = ( $title ? "$title " : '' );
	$share = htmlspecialchars_decode( $title.$text.$shorturl );
	$count = 140 - strlen( $share );
	$hidden = ( $hidden ? 'style="display:none;"' : '' );
	
	// Allow plugins to filter all data
	$data = compact( 'longurl', 'shorturl', 'title', 'text', 'shortlink_title', 'share_title', 'share', 'count', 'hidden' );
	$data = yourls_apply_filter( 'share_box_data', $data );
	extract( $data );
	
	$_share = rawurlencode( $share );
	$_url = rawurlencode( $shorturl );
	?>
	
	<div id="shareboxes" <?php echo $hidden; ?>>

		<?php yourls_do_action( 'shareboxes_before', $longurl, $shorturl, $title, $text ); ?>

		<div id="copybox" class="share">
		<?php echo $shortlink_title; ?>
			<p><input id="copylink" class="text" size="32" value="<?php echo $shorturl; ?>" /></p>
			<p><small>Long link: <a id="origlink" href="<?php echo $longurl; ?>"><?php echo $longurl; ?></a></small>
			<?php if( yourls_do_log_redirect() ) { ?>
			<br/><small>Stats: <a id="statlink" href="<?php echo $shorturl; ?>+"><?php echo $shorturl; ?>+</a></small>
			<input type="hidden" id="titlelink" value="<?php echo $title; ?>" />
			<?php } ?>
			</p>
		</div>

		<?php yourls_do_action( 'shareboxes_middle', $longurl, $shorturl, $title, $text ); ?>

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
				yourls_do_action( 'share_links', $longurl, $shorturl, $title, $text );
				// Note: on the main admin page, there are no parameters passed to the sharebox when it's drawn.
				?>
			</p>
		</div>
		
		<?php yourls_do_action( 'shareboxes_after', $longurl, $shorturl, $title, $text ); ?>
	
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

// Add the "Edit" row
function yourls_table_edit_row( $keyword ) {
	global $ydb;
	
	$table = YOURLS_DB_TABLE_URL;
	$keyword = yourls_sanitize_string( $keyword );
	$id = yourls_string2htmlid( $keyword ); // used as HTML #id
	$url = yourls_get_keyword_longurl( $keyword );
	$title = htmlspecialchars( yourls_get_keyword_title( $keyword ) );
	$safe_url = stripslashes( $url );
	$safe_title = stripslashes( $title );
	$www = yourls_link();
	
	$save_link = yourls_nonce_url( 'save-link_'.$id,
		yourls_add_query_arg( array( 'id' => $id, 'action' => 'edit_save', 'keyword' => $keyword ), yourls_admin_url( 'admin-ajax.php' ) ) 
	);
	
	$nonce = yourls_create_nonce( 'edit-save_'.$id );
	
	if( $url ) {
		$return = <<<RETURN
<tr id="edit-$id" class="edit-row"><td colspan="5"><strong>Original URL</strong>:<input type="text" id="edit-url-$id" name="edit-url-$id" value="$safe_url" class="text" size="70" /> <strong>Short URL</strong>: $www<input type="text" id="edit-keyword-$id" name="edit-keyword-$id" value="$keyword" class="text" size="10" /><br/><strong>Title</strong>: <input type="text" id="edit-title-$id" name="edit-title-$id" value="$safe_title" class="text" size="60" /></td><td colspan="1"><input type="button" id="edit-submit-$id" name="edit-submit-$id" value="Save" title="Save new values" class="button" onclick="edit_save('$id');" />&nbsp;<input type="button" id="edit-close-$id" name="edit-close-$id" value="X" title="Cancel editing" class="button" onclick="hide_edit('$id');" /><input type="hidden" id="old_keyword_$id" value="$keyword"/><input type="hidden" id="nonce_$id" value="$nonce"/></td></tr>
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

	$id      = yourls_string2htmlid( $keyword ); // used as HTML #id
	$date    = date( 'M d, Y H:i', $timestamp+( YOURLS_HOURS_OFFSET * 3600 ) );
	$clicks  = number_format( $clicks, 0, '', '' );

	$shorturl = yourls_link( $keyword );
	$statlink = yourls_statlink( $keyword );
	if( yourls_is_ssl() )
		$statlink = str_replace( 'http://', 'https://', $statlink );
	
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
	
	// Action button links
	$actions = array(
		'stats' => array(
			'href'    => $statlink,
			'id'      => "statlink-$id",
			'title'   => 'Stats',
			'anchor'  => 'Stats',
		),
		'share' => array(
			'href'    => '',
			'id'      => "share-button-$id",
			'title'   => 'Share',
			'anchor'  => 'Share',
			'onclick' => "toggle_share('$id');return false;",
		),
		'edit' => array(
			'href'    => $edit_link,
			'id'      => "edit-button-$id",
			'title'   => 'Edit',
			'anchor'  => 'Edit',
			'onclick' => "edit('$id');return false;",
		),
		'delete' => array(
			'href'    => $delete_link,
			'id'      => "delete-button-$id",
			'title'   => 'Delete',
			'anchor'  => 'Delete',
			'onclick' => "remove('$id');return false;",
		)
	);
	$actions = yourls_apply_filter( 'table_add_row_action_array', $actions );
	$action_links = '';
	foreach( $actions as $key => $action ) {
		$onclick = isset( $action['onclick'] ) ? 'onclick="' . $action['onclick'] . '"' : '' ;
		$action_links .= sprintf( '<a href="%s" id="%s" title="%s" class="%s" %s>%s</a>',
			$action['href'], $action['id'], $action['title'], 'button button_'.$key, $onclick, $action['anchor']
		);
	}
	$action_links = yourls_apply_filter( 'action_links', $action_links, $keyword, $url, $ip, $clicks, $timestamp );
	
	$row = <<<ROW
<tr id="id-$id"><td id="keyword-$id" class="keyword"><a href="$shorturl">$display_keyword</a></td><td id="url-$id" class="url">$display_link</td><td id="timestamp-$id" class="timestamp">$date</td><td id="ip-$id" class="ip">$ip</td><td id="clicks-$id" class="clicks">$clicks</td><td class="actions" id="actions-$id">$action_links<input type="hidden" id="keyword_$id" value="$keyword"/></td></tr>
ROW;
	$row = yourls_apply_filter( 'table_add_row', $row, $keyword, $url, $title, $ip, $clicks, $timestamp );
	
	return $row;
}

// Echo the main table head
function yourls_table_head() {
	$start = '<table id="main_table" class="tblSorter" cellpadding="0" cellspacing="1"><thead><tr>'."\n";
	echo yourls_apply_filter( 'table_head_start', $start );
	
	$cells = yourls_apply_filter( 'table_head_cells', array(
		'shorturl' => 'Short URL&nbsp;',
		'longurl'  => 'Original URL',
		'date'     => 'Date',
		'ip'       => 'IP',
		'clicks'   => 'Clicks&nbsp;&nbsp;',
		'actions'  => 'Actions'
	) );
	foreach( $cells as $k => $v ) {
		echo "<th id='main_table_head_$k'>$v</th>\n";
	}
	
	$end = "</tr></thead>\n";
	echo yourls_apply_filter( 'table_head_end', $end );
}

// Echo the tbody start tag
function yourls_table_tbody_start() {
	echo yourls_apply_filter( 'table_tbody_start', '<tbody>' );
}

// Echo the tbody end tag
function yourls_table_tbody_end() {
	echo yourls_apply_filter( 'table_tbody_end', '</tbody>' );
}

// Echo the table start tag
function yourls_table_end() {
	echo yourls_apply_filter( 'table_end', '</table>' );
}

// Echo HTML tag for a link
function yourls_html_link( $href, $title = '', $element = '' ) {
	if( !$title )
		$title = $href;
	if( $element )
		$element = "id='$element'";
	echo yourls_apply_filter( 'html_link', "<a href='$href' $element>$title</a>" );
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

	// Build menu links
	if( defined( 'YOURLS_USER' ) ) {
		$logout_link = yourls_apply_filter( 'logout_link', 'Hello <strong>' . YOURLS_USER . '</strong> (<a href="?action=logout" title="Logout">Logout</a>)' );
	} else {
		$logout_link = yourls_apply_filter( 'logout_link', '' );
	}
	$help_link   = yourls_apply_filter( 'help_link',   '<a href="' . yourls_site_url( false ) .'/readme.html">Help</a>' );
	
	$admin_links    = array();
	$admin_sublinks = array();
	
	$admin_links['admin'] = array(
		'url'   => yourls_admin_url('index.php'),
		'title' => 'Go to the admin interface',
		'anchor' => 'Admin interface'
	);
	
	if( yourls_is_admin() ) {
		$admin_links['tools'] = array(
			'url'    => yourls_admin_url('tools.php'),
			'anchor' => 'Tools',
		);
		$admin_links['plugins'] = array(
			'url'    => yourls_admin_url('plugins.php'),
			'anchor' => 'Manage Plugins',
		);
		$admin_sublinks['plugins'] = yourls_list_plugin_admin_pages();
	}
	
	$admin_links    = yourls_apply_filter( 'admin_links',    $admin_links );
	$admin_sublinks = yourls_apply_filter( 'admin_sublinks', $admin_sublinks );
	
	// Now output menu
	echo '<ul id="admin_menu">'."\n";
	if ( yourls_is_private() && isset( $logout_link ) )
		echo '<li id="admin_menu_logout_link">' . $logout_link .'</li>';

	foreach( (array)$admin_links as $link => $ar ) {
		if( isset( $ar['url'] ) ) {
			$anchor = isset( $ar['anchor'] ) ? $ar['anchor'] : $link;
			$title  = isset( $ar['title'] ) ? 'title="' . $ar['title'] . '"' : '';
			printf( '<li id="admin_menu_%s_link" class="admin_menu_toplevel"><a href="%s" %s>%s</a>', $link, $ar['url'], $title, $anchor );
		}
		// Output submenu if any. TODO: clean up, too many code duplicated here
		if( isset( $admin_sublinks[$link] ) ) {
			echo "<ul>\n";
			foreach( $admin_sublinks[$link] as $link => $ar ) {
				if( isset( $ar['url'] ) ) {
					$anchor = isset( $ar['anchor'] ) ? $ar['anchor'] : $link;
					$title  = isset( $ar['title'] ) ? 'title="' . $ar['title'] . '"' : '';
					printf( '<li id="admin_menu_%s_link" class="admin_menu_sublevel admin_menu_sublevel_%s"><a href="%s" %s>%s</a>', $link, $link, $ar['url'], $title, $anchor );
				}
			}
			echo "</ul>\n";
		}
	}
	
	if ( isset( $help_link ) )
		echo '<li id="admin_menu_help_link">' . $help_link .'</li>';
		
	yourls_do_action( 'admin_menu' );
	echo "</ul>\n";
	yourls_do_action( 'admin_notices' );
	yourls_do_action( 'admin_notice' ); // because I never remember if it's 'notices' or 'notice'
	/*
	To display a notice:
	$message = "<div>OMG, dude, I mean!</div>" );
	yourls_add_action( 'admin_notices', create_function( '', "echo '$message';" ) );
	*/
}

// Wrapper to admin notices
function yourls_add_notice( $message ) {
	$message = yourls_notice_box( $message );
	yourls_add_action( 'admin_notices', create_function( '', "echo '$message';" ) );
}

// Return a formatted notice
function yourls_notice_box( $message ) {
	return <<<HTML
	<div class="notice">
	<p>$message</p>
	</div>
HTML;
}

// Display a page
function yourls_page( $page ) {
	$include = YOURLS_ABSPATH . "/pages/$page.php";
	if( !file_exists($include) ) {
		yourls_die( "Page '$page' not found", 'Not found', 404 );
	}
	yourls_do_action( 'pre_page', $page );
	include($include);
	yourls_do_action( 'post_page', $page );
	die();	
}

