<?php
/**
 * Display HTML head and <body> tag
 *
 * @param string $context Context of the page (stats, index, infos, ...)
 * @param string $title HTML title of the page
 */
function yourls_html_head( $context = 'index', $title = '' ) {

	yourls_do_action( 'pre_html_head', $context, $title );
	
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
	$_title = 'YOURLS &middot; Your Own URL Shortener | ' . yourls_link();
	$title = $title ? $title . " &mdash; " . $_title : $_title;
	$title = yourls_apply_filter( 'html_title', $title, $context );
	
	?>
<!DOCTYPE html>
<html <?php yourls_html_language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<title><?php echo $title ?></title>
	<meta name="description" content="YOURLS &middot; Your Own URL Shortener' | <?php yourls_site_url(); ?>">
	<meta name="author" content="Ozh RICHARD & Lester CHAN for yourls.org">
	<meta name="generator" content="YOURLS <?php echo YOURLS_VERSION ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="canonical" href="<?php yourls_site_url(); ?>/">
	<link rel="shortcut icon" href="<?php yourls_favicon(); ?>">
	<link rel="stylesheet" href="<?php yourls_site_url(); ?>/assets/css/style.min.css?v=<?php echo YOURLS_VERSION; ?>" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php yourls_site_url(); ?>/assets/css/fonts-yourls-temp.css?v=<?php echo YOURLS_VERSION; ?>" type="text/css" media="screen">
	<script src="<?php yourls_site_url(); ?>/assets/js/jquery.min.js?v=<?php echo YOURLS_VERSION; ?>" type="text/javascript"></script>
	<?php if ( $context == 'infos' ) { 	// Load charts component as needed ?>
			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script type="text/javascript">
					 google.load('visualization', '1.0', {'packages':['corechart', 'geochart']});
			</script>
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
	<div class="wrap">
	<?php
}

/**
 * Display <h1> header and logo
 *
 * @param bool $linked true if a link is wanted
 */
function yourls_html_logo( $linked = true ) {
	yourls_do_action( 'pre_html_logo' );
	$logo = '<img class="logo" src="' . yourls_site_url( false ) . '/assets/img/yourls-logo.png" alt="YOURLS" title="YOURLS"/>';
	if ( $linked )
	$logo = '<a href="' . yourls_admin_url( 'index.php' ) . '" title="YOURLS">' . $logo . '</a>';
	?>
	<div style="text-align: center;">
		<?php echo $logo; ?>
	</div>
	<?php
	yourls_do_action( 'html_logo' );
}


function yourls_html_title( $title, $rang, $subtitle = null ) {
	$result = "<h$rang>$title";
	if ( $subtitle )
		$result .= " <small>&mdash; $subtitle</small>";
	$result .= "</h$rang>";
	echo $result;
}

/**
 * Display the admin menu
 *
 * @param string $current_page Which page is loaded?
 */
function yourls_html_menu( $current_page = null ) {

	// Build menu links
	if( defined( 'YOURLS_USER' ) ) {
		$logout_link = yourls_apply_filter( 'logout_link', '<li class="nav-header">' . sprintf( yourls__( 'Hello <strong>%s</strong>' ), YOURLS_USER ) . '</li><li><a href="?action=logout" title="' . yourls_esc_attr__( 'Logout' ) . '"><i class="glyphicon glyphicon-remove-circle"></i> ' . yourls__( 'Logout' ) . '</a>' );
	} else {
		$logout_link = yourls_apply_filter( 'logout_link', '' );
	}
	$help_link   = yourls_apply_filter( 'help_link', '<a href="' . yourls_site_url( false ) .'/readme.html"><i class="glyphicon glyphicon-question-sign"></i> ' . yourls__( 'Help' ) . '</a>' );
	
	$admin_links    = array();
	$admin_sublinks = array();
	
	$admin_links['admin'] = array(
		'url'    => yourls_admin_url( 'index.php' ),
		'title'  => yourls__( 'Go to the admin interface' ),
		'anchor' => yourls__( 'Interface' ),
		'icon'   => 'home'
	);
	
	if( yourls_is_admin() ) {
		$admin_links['tools'] = array(
			'url'    => yourls_admin_url( 'tools.php' ),
			'anchor' => yourls__( 'Tools' ),
			'icon'   => 'wrench'
		);
		$admin_links['plugins'] = array(
			'url'    => yourls_admin_url( 'plugins.php' ),
			'anchor' => yourls__( 'Plugins' ),
			'icon'   => 'cog'
		);
		$admin_links['themes'] = array(
			'url'    => yourls_admin_url( 'themes.php' ),
			'anchor' => yourls__( 'Themes' ),
			'icon'   => 'picture'
		);
		$admin_sublinks['plugins'] = yourls_list_plugin_admin_pages();
	}
	
	$admin_links    = yourls_apply_filter( 'admin_links',    $admin_links );
	$admin_sublinks = yourls_apply_filter( 'admin_sublinks', $admin_sublinks );
	
	// Now output menu
	echo '<ul class="nav nav-list">';
	yourls_add_html_status();
	if ( yourls_is_private() && !empty( $logout_link ) )
		echo $logout_link;

	echo '<li class="nav-header">' . yourls__( 'Administration' ) . '</li>';

	foreach( (array)$admin_links as $link => $ar ) {
		if( isset( $ar['url'] ) ) {
			$anchor = isset( $ar['anchor'] ) ? $ar['anchor'] : $link;
			$title  = isset( $ar['title'] ) ? 'title="' . $ar['title'] . '"' : '';
			$class_active  = $current_page == $link ? ' active' : '';
			printf( '<li id="admin_menu_%s_link" class="admin_menu_toplevel%s"><a href="%s" %s><i class="glyphicon glyphicon-%s"></i> %s</a></li>', $link, $class_active, $ar['url'], $title, $ar['icon'], $anchor );
		}
		// Output submenu if any. TODO: clean up, too many code duplicated here
		if( isset( $admin_sublinks[$link] ) ) {
			echo '<ul class="nav">';
			foreach( $admin_sublinks[$link] as $link => $ar ) {
				if( isset( $ar['url'] ) ) {
					$anchor = isset( $ar['anchor'] ) ? $ar['anchor'] : $link;
					$title  = isset( $ar['title'] ) ? 'title="' . $ar['title'] . '"' : '';
					printf( '<li id="admin_menu_%s_link" class="admin_menu_sublevel admin_menu_sublevel_%s"><a href="%s" %s>%s</a></li>', $link, $link, $ar['url'], $title, $anchor );
				}
			}
			echo '</ul>';
		}
	}
	
	if ( isset( $help_link ) )
		echo '<li id="admin_menu_help_link">' . $help_link .'</li>';
	
	yourls_do_action( 'admin_menu' );
	echo "</ul><hr />\n";
	yourls_do_action( 'admin_notices' );
	yourls_do_action( 'admin_notice' ); // because I never remember if it's 'notices' or 'notice'
}

function yourls_add_html_status() {
	list( $total_urls, $total_clicks ) = array_values( yourls_get_db_stats() );
	$html = '<div class="form-actions" style="text-align:center"><div class="col col-lg-6">';
	$html .= '<strong class="status-number">' . yourls_number_format_i18n( $total_urls ) . '</strong><p>' . yourls__( 'Links' );
	$html .= '</p></div><div class="col col-lg-6">';
	$html .= '<strong class="status-number">' . yourls_number_format_i18n( $total_clicks ) . '</strong><p>' . yourls__( 'Clicks' ) . '</p></div></div>';
	echo yourls_apply_filters( 'add_html_status', $html );
}

/**
 * Wrapper function to display admin notices
 *
 * @param string $message The message showed
 * @param string $style notice / error / info / warning / success
 */
function yourls_add_notice( $message, $style = 'notice' ) {
	// Escape single quotes in $message to avoid breaking the anonymous function 
	$message = yourls_notice_box( strtr( $message, array( "'" => "\'" ) ), $style ); 
	yourls_add_action( 'admin_notices', create_function( '', "echo '$message';" ) );
}

/**
 * Return a formatted notice
 * 
 * @param string $message The message showed
 * @param string $style notice / error / info / warning / success
 */
function yourls_notice_box( $message, $style = 'notice' ) {
	return <<<HTML
	<div class="alert alert-$style">$message</div>
HTML;
}

/**
 * Wrapper function to display label
 *
 * 
 * @param string $message The message showed
 * @param string $style notice / error / info / warning / success
 */
function yourls_add_label( $message, $style = 'normal' ) {
	echo '<span class="label label-' . $style . '">' . $message . '</span>';
}

/**
 * Display a page
 *
 */
function yourls_page( $page ) {
	$include = YOURLS_ABSPATH . "/pages/$page.php";
	if( !file_exists( $include ) ) {
		yourls_die( "Page '$page' not found", 'Not found', 404 );
	}
	yourls_do_action( 'pre_page', $page );
	include( $include );
	yourls_do_action( 'post_page', $page );
	die();	
}

/**
 * Display the language attributes for the HTML tag.
 *
 * Builds up a set of html attributes containing the text direction and language
 * information for the page. Stolen from WP.
 *
 * @since 1.6
 */
function yourls_html_language_attributes() {
	$attributes = array();
	$output = '';
	
	$attributes[] = ( yourls_is_rtl() ? 'dir="rtl"' : 'dir="ltr"' );
	
	$doctype = yourls_apply_filters( 'html_language_attributes_doctype', 'html' );
	// Experimental: get HTML lang from locale. Should work. Convert fr_FR -> fr-FR
	if ( $lang = str_replace( '_', '-', yourls_get_locale() ) ) {
		if( $doctype == 'xhtml' ) {
			$attributes[] = "xml:lang=\"$lang\"";
		} else {
			$attributes[] = "lang=\"$lang\"";
		}
	}

	$output = implode( ' ', $attributes );
	$output = yourls_apply_filters( 'html_language_attributes', $output );
	echo $output;
}

/**
 * Display HTML footer (including closing body & html tags)
 *
 */
function yourls_html_footer() {
	echo '<div class="footer"><p style="text-align:center;">';
	$footer  = yourls_s( 'Powered by %s', '<a href="http://yourls.org/" title="YOURLS">YOURLS</a> v' . YOURLS_VERSION );
	echo yourls_apply_filters( 'html_footer_text', $footer );
	echo '</p></div>';
}

/**
 * Display HTML debug infos
 *
 */
function yourls_html_debug() {
	global $ydb;
	echo '<pre class="debug-info">';
	echo sprintf( yourls_n( '1 query', '%s queries', $ydb->num_queries ), $ydb->num_queries ) . "\n";
	echo join( "\n", $ydb->debug_log );
	echo '</pre>';
	yourls_do_action( 'html_debug', $ydb->context );
}

/**
 * Display "Add new URL" box
 *
 * @param string $url URL to prefill the input with
 * @param string $keyword Keyword to prefill the input with
 */
function yourls_html_addnew( $url = '', $keyword = '' ) {
	?>
	<div id="new_url">
		<div>
			<form id="new_url_form" class="form-actions" action="" method="get">
				<div class="col col-lg-6">
					<label><?php yourls_e( 'Enter the URL' ); ?></label>
					<input type="text" id="add-url" name="url" placeholder="http://&hellip;" size="80">
				</div>
				<div class="col col-lg-3">
					<label><?php yourls_e( 'Short URL' ); ?> <span class="label label-info"><?php yourls_e( 'Optional' ); ?></span></label>
					<input type="text" id="add-keyword" placeholder="<?php yourls_e( 'keyword' ); ?>" name="keyword" value="<?php echo $keyword; ?>" class="text" size="8">
				<?php yourls_nonce_field( 'add_url', 'nonce-add' ); ?>
				</div>
				<div class="col col-lg-2">
					<button type="submit" id="add-button" name="add-button" class="btn btn-primary" onclick="add_link();"><?php yourls_e( 'Shorten The URL' ); ?></button>
				</div>
			</form>
			<div id="feedback" style="display:none;"></div>
		</div>
		<?php yourls_do_action( 'html_addnew' ); ?>
	</div>
	<?php 
}

/**
 * Display main search form
 *
 * The $param array is defined in /admin/index.php
 *
 * @param array $params Array of all required parameters
 * @return string Result
 */
function yourls_html_search( $params = array() ) {
	extract( $params ); // extract $search_text, $search_in ...
	?>
			<div class="filter-form">
				<form action="" method="get" class="form-actions form-horizontal">
						<?php
						
						// First search control: text to search
						$_input = '<input type="text" name="search" class="text col-lg-7" value="' . yourls_esc_attr( $search_text ) . '" />';
						$_options = array(
							'keyword' => yourls__( 'Short URL' ),
							'url'     => yourls__( 'URL' ),
							'title'   => yourls__( 'Title' ),
							'ip'      => yourls__( 'IP' ),
						);							
						$_select_search = yourls_html_select( 'search_in', $_options, $search_in );
						$_button = '<span class="input-group-btn"><button type="submit" id="submit-sort" class="btn btn-primary">' . yourls__( 'Search' ) . '</button></span>';
						
						// Second search control: order by
						$_options = array(
							'keyword'      => yourls__( 'Short URL' ),
							'url'          => yourls__( 'URL' ),
							'timestamp'    => yourls__( 'Date' ),
							'ip'           => yourls__( 'IP' ),
							'clicks'       => yourls__( 'Clicks' ),
						);
						$_select_order = yourls_html_select( 'sort_by', $_options, $sort_by );
						$sort_order = isset( $sort_order ) ? $sort_order : 'desc' ;
						$_options = array(
							'asc'  => yourls__( 'Ascending' ),
							'desc' => yourls__( 'Descending' ),
						);
						$_select2_order = yourls_html_select( 'sort_order', $_options, $sort_order );

						// Fourth search control: Show links with more than XX clicks
						$_options = array(
							'more' => yourls__( 'more' ),
							'less' => yourls__( 'less' ),
						);
						$_select_clicks = yourls_html_select( 'click_filter', $_options, $click_filter );
						$_input_clicks  = '<input type="text" name="click_limit" class="text col-lg-7" value="' . $click_limit . '" /> ';

						// Fifth search control: Show links created before/after/between ...
						$_options = array(
							'before'  => yourls__( 'before' ),
							'after'   => yourls__( 'after' ),
							'between' => yourls__( 'between' ),
						);
						$_select_creation = yourls_html_select( 'date_filter', $_options, $date_filter );
						$_input_creation  = '<input type="text" name="date_first" id="date_first" class="text col-lg-7" value="' . $date_first . '" />';
						$_input2_creation = '<input type="text" name="date_second" id="date_second" class="text col-lg-7" value="' . $date_second . '"' . ( $date_filter === 'between' ? ' style="display:inline"' : '' ) . '/>';
						
						$advanced_search = array(
							yourls__( 'Search' )        => array( $_input, $_select_search, $_button ),
							yourls__( 'Order by' )      => array( $_select_order, $_select2_order ),
							yourls__( 'Links with' )    => array( $_select_clicks, $_input_clicks ),
							yourls__( 'Links created' ) => array( $_select_creation, $_input_creation, $_input2_creation )
						);
						foreach( $advanced_search as $title => $options ) {
							?>
							<div class="control-group">
								<label class="control-label"><?php echo $title; ?></label>
								<div class="controls input-group col-lg-9">
									<?php
									foreach( $options as $option )
										echo $option
									?>
								</div>
							</div>
							<?php
						}
						?>

						<div class="pull-right">
							<button type="button" id="submit-clear-filter" class="btn btn-small" onclick="window.parent.location.href = 'index.php'"><?php yourls_e( 'Clear' ); ?></button>
							<button type="submit" id="submit-sort" class="btn btn-small btn-primary"><?php yourls_e( 'Search' ); ?></button>
						</div>
				
				</form>
			</div>
			
			<?php
			// Remove empty keys from the $params array so it doesn't clutter the pagination links
			$params = array_filter( $params, 'yourls_return_if_not_empty_string' ); // remove empty keys

			if( isset( $search_text ) ) {
				$params['search'] = $search_text;
				unset( $params['search_text'] );
			}
			yourls_do_action( 'html_search' );
}

/**
 * Wrapper function to display the global pagination on interface
 * 
 * @param array $params
 */
function yourls_html_pagination( $params = array() ) {
	extract( $params ); // extract $page, ...
	if( $total_pages > 1 ) { 
			?>
		<div>
			<ul class="pagination">
					<?php
					// Pagination offsets: min( max ( zomg! ) );
				$p_start = max( min( $total_pages - 4, $page - 2 ), 1 );
					$p_end = min( max( 5, $page + 2 ), $total_pages );
					if( $p_start >= 2 ) {
					$link = yourls_add_query_arg( array( 'page' => 1 ) );
					echo '<li><a href="' . $link . '" title="' . yourls_esc_attr__( 'Go to First Page' ) . '">&laquo;</a></li>';
					echo '<li><a href="'.yourls_add_query_arg( array( 'page' => $page - 1 ) ).'">&lsaquo;</a></li>';
					}
					for( $i = $p_start ; $i <= $p_end; $i++ ) {
						if( $i == $page ) {
						echo '<li class="active"><a href="#">' . $i . '</a></li>';
						} else {
						$link = yourls_add_query_arg( array( 'page' => $i ) );
						echo '<li><a href="' . $link . '" title="' . sprintf( yourls_esc_attr( 'Page %s' ), $i ) .'">'.$i.'</a></li>';
						}
					}
					if( ( $p_end ) < $total_pages ) {
					$link = yourls_add_query_arg( array( 'page' => $total_pages ) );
					echo '<li><a href="'.yourls_add_query_arg( array( 'page' => $page + 1 ) ).'">&rsaquo;</a></li>';
					echo '<li><a href="' . $link . '" title="' . yourls_esc_attr__( 'Go to First Page' ) . '">&raquo;</a></li>';
					}
					?>
			</ul>
			</div>
		<?php }
		yourls_do_action( 'html_pagination' );
}

/**
 * Return a select box
 *
 * @since 1.6
 *
 * @param string $name HTML 'name' (also use as the HTML 'id')
 * @param array $options array of 'value' => 'Text displayed'
 * @param string $selected optional 'value' from the $options array that will be highlighted
 * @param boolean $display false (default) to return, true to echo
 * @return string HTML content of the select element
 */
function yourls_html_select( $name, $options, $selected = '', $display = false ) {
	$html = "<select name='$name' id='$name' class='input-group-addon col-lg-5'>\n";
	foreach( $options as $value => $text ) {
		$html .= "<option value='$value' ";
		$html .= $selected == $value ? ' selected="selected"' : '';
		$html .= ">$text</option>\n";
	}
	$html .= "</select>\n";
	$html  = yourls_apply_filters( 'html_select', $html, $name, $options, $selected, $display );
	if( $display )
		echo $html;
	return $html;
}

/**
 * Display the Quick Share box
 *
 */
function yourls_share_box( $longurl, $shorturl, $title = '', $text='', $shortlink_title = '', $share_title = '', $hidden = false ) {
	if ( $shortlink_title == '' )
		$shortlink_title = '<h2>' . yourls__( 'Your short link' ) . '</h2>';
	if ( $share_title == '' )
		$share_title = '<h2>' . yourls__( 'Quick Share' ) . '</h2>';
	
	// Allow plugins to short-circuit the whole function
	$pre = yourls_apply_filter( 'shunt_share_box', false );
	if ( false !== $pre )
		return $pre;
		
	$text   = ( $text ? '"'.$text.'" ' : '' );
	$title  = ( $title ? "$title " : '' );
	$share  = yourls_esc_textarea( $title.$text.$shorturl );
	$count  = 140 - strlen( $share );
	$hidden = ( $hidden ? 'style="display:none;"' : '' );
	
	// Allow plugins to filter all data
	$data = compact( 'longurl', 'shorturl', 'title', 'text', 'shortlink_title', 'share_title', 'share', 'count', 'hidden' );
	$data = yourls_apply_filter( 'share_box_data', $data );
	extract( $data );
	
	$_share = rawurlencode( $share );
	$_url   = rawurlencode( $shorturl );
	?>
	
	<div id="shareboxes" <?php echo $hidden; ?>>

		<?php yourls_do_action( 'shareboxes_before', $longurl, $shorturl, $title, $text ); ?>

		<div id="copybox" class="share">
		<?php echo $shortlink_title; ?>
			<p><input id="copylink" class="text" size="32" value="<?php echo yourls_esc_url( $shorturl ); ?>" /></p>
			<p><small><?php yourls_e( 'Long link' ); ?>: <a id="origlink" href="<?php echo yourls_esc_url( $longurl ); ?>"><?php echo yourls_esc_url( $longurl ); ?></a></small>
			<?php if( yourls_do_log_redirect() ) { ?>
			<br/><small><?php yourls_e( 'Stats' ); ?>: <a id="statlink" href="<?php echo yourls_esc_url( $shorturl ); ?>+"><?php echo yourls_esc_url( $shorturl ); ?>+</a></small>
			<input type="hidden" id="titlelink" value="<?php echo yourls_esc_attr( $title ); ?>" />
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
			<p id="share_links"><?php yourls_e( 'Share with' ); ?> 
				<a id="share_tw" href="http://twitter.com/home?status=<?php echo $_share; ?>" title="<?php yourls_e( 'Tweet this!' ); ?>" onclick="share('tw');return false">Twitter</a>
				<a id="share_fb" href="http://www.facebook.com/share.php?u=<?php echo $_url; ?>" title="<?php yourls_e( 'Share on Facebook' ); ?>" onclick="share('fb');return false;">Facebook</a>
				<a id="share_ff" href="http://friendfeed.com/share/bookmarklet/frame#title=<?php echo $_share; ?>" title="<?php yourls_e( 'Share on Friendfeed' ); ?>" onclick="share('ff');return false;">FriendFeed</a>
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

/**
 * Die die die
 *
 */
function yourls_die( $message = '', $title = '', $header_code = 200 ) {
	yourls_status_header( $header_code );
	
	if( !yourls_did_action( 'html_head' ) ) {
		yourls_html_head();
		yourls_html_logo();
	}
	echo yourls_apply_filter( 'die_title', "<h2>$title</h2>" );
	echo yourls_apply_filter( 'die_message', "<p>$message</p>" );
	yourls_do_action( 'yourls_die' );
	if( !yourls_did_action( 'html_head' ) ) {
		yourls_html_footer();
	}
	die();
}

/**
 * Return an "Edit" row for the main table
 *
 * @param string $keyword Keyword to edit
 * @return string HTML of the edit row
 */
function yourls_table_edit_row( $keyword ) {
	$keyword = yourls_sanitize_string( $keyword );
	$id = yourls_string2htmlid( $keyword ); // used as HTML #id
	$url = yourls_get_keyword_longurl( $keyword );
	
	$title = htmlspecialchars( yourls_get_keyword_title( $keyword ) );
	$safe_url = yourls_esc_attr( $url );
	$safe_title = yourls_esc_attr( $title );
	$www = yourls_link();
	
	$nonce = yourls_create_nonce( 'edit-save_'.$id );
	
	if( $url ) {
		$return = <<<RETURN
<tr id="edit-$id" class="edit-row"><td class="edit-row"><strong>%s</strong>:<input type="text" id="edit-url-$id" name="edit-url-$id" value="$safe_url" class="text" size="70" /><br/><strong>%s</strong>: $www<input type="text" id="edit-keyword-$id" name="edit-keyword-$id" value="$keyword" class="text" size="10" /><br/><strong>%s</strong>: <input type="text" id="edit-title-$id" name="edit-title-$id" value="$safe_title" class="text" size="60" /></td><td colspan="1"><input type="button" id="edit-submit-$id" name="edit-submit-$id" value="%s" title="%s" class="button" onclick="edit_link_save('$id');" />&nbsp;<input type="button" id="edit-close-$id" name="edit-close-$id" value="%s" title="%s" class="button" onclick="edit_link_hide('$id');" /><input type="hidden" id="old_keyword_$id" value="$keyword"/><input type="hidden" id="nonce_$id" value="$nonce"/></td></tr>
RETURN;
		$return = sprintf( urldecode( $return ), yourls__( 'Long URL' ), yourls__( 'Short URL' ), yourls__( 'Title' ), yourls__( 'Save' ), yourls__( 'Save new values' ), yourls__( 'Cancel' ), yourls__( 'Cancel editing' ) );
	} else {
		$return = '<tr class="edit-row notfound"><td class="edit-row notfound">' . yourls__( 'Error, URL not found' ) . '</td></tr>';
	}
	
	$return = yourls_apply_filter( 'table_edit_row', $return, $keyword, $url, $title );

	return $return;
}

/**
 * Return an "Add" row for the main table
 *
 * @return string HTML of the edit row
 */
function yourls_table_add_row( $keyword, $url, $title = '', $ip, $clicks, $timestamp ) {
	$keyword  = yourls_sanitize_string( $keyword );
	$id       = yourls_string2htmlid( $keyword ); // used as HTML #id
	$shorturl = yourls_link( $keyword );

	$statlink = yourls_statlink( $keyword );
		
	$delete_link = yourls_nonce_url( 'delete-link_'.$id,
		yourls_add_query_arg( array( 'id' => $id, 'action' => 'delete', 'keyword' => $keyword ), yourls_admin_url( 'admin-ajax.php' ) ) 
	);
	
	$edit_link = yourls_nonce_url( 'edit-link_'.$id,
		yourls_add_query_arg( array( 'id' => $id, 'action' => 'edit', 'keyword' => $keyword ), yourls_admin_url( 'admin-ajax.php' ) ) 
	);
	
	// Action link buttons: the array
	$actions = array(
		'stats' => array(
			'href'    => $statlink,
			'id'      => "statlink-$id",
			'title'   => yourls_esc_attr__( 'Stats' ),
			'icon'    => "zoom-in",
			'anchor'  => yourls__( 'Stats' ),
		),
		'share' => array(
			'href'    => '',
			'id'      => "share-button-$id",
			'title'   => yourls_esc_attr__( 'Share' ),
			'anchor'  => yourls__( 'Share' ),
			'icon'    => "share-alt",
			'onclick' => "toggle_share('$id');return false;",
		),
		'edit' => array(
			'href'    => $edit_link,
			'id'      => "edit-button-$id",
			'title'   => yourls_esc_attr__( 'Edit' ),
			'anchor'  => yourls__( 'Edit' ),
			'icon'    => "edit",
			'onclick' => "edit_link_display('$id');return false;",
		),
		'delete' => array(
			'href'    => $delete_link,
			'id'      => "delete-button-$id",
			'title'   => yourls_esc_attr__( 'Delete' ),
			'anchor'  => yourls__( 'Delete' ),
			'icon'    => "trash",
			'onclick' => "remove_link('$id');return false;",
		)
	);
	$actions = yourls_apply_filter( 'table_add_row_action_array', $actions );
	
	// Action link buttons: the HTML
	$action_links = '<div class="btn-group">';
	foreach( $actions as $key => $action ) {
		$onclick = isset( $action['onclick'] ) ? 'onclick="' . $action['onclick'] . '"' : '' ;
		$action_links .= sprintf( '<a href="%s" id="%s" title="%s" class="%s" %s><i class="glyphicon glyphicon-%s"></i></a>',
			$action['href'], $action['id'], $action['title'], 'btn btn-inverse btn-'.$key, $onclick, $action['icon']
		);
	}
	$action_links .= '</div>';
	$action_links = yourls_apply_filter( 'action_links', $action_links, $keyword, $url, $ip, $clicks, $timestamp );

	if( ! $title )
		$title = $url;

	$protocol_warning = '';
	if( ! in_array( yourls_get_protocol( $url ) , array( 'http://', 'https://' ) ) )
		$protocol_warning = yourls_apply_filters( 'add_row_protocol_warning', '<span class="warning" title="' . yourls__( 'Not a common link' ) . '">&#9733;</span>' );

	// Row cells: the array
	$cells = array(
		'keyword' => array(
			'template'      => '<a href="%shorturl%">%keyword_html%</a>',
			'shorturl'      => yourls_esc_url( $shorturl ),
			'keyword_html'  => yourls_esc_html( $keyword ),
		),
		'url' => array(
			'template'      => '<a href="%long_url%" title="%title_attr%">%title_html%</a><br/><small>%warning%<a href="%long_url%">%long_url_html%</a></small>',
			'long_url'      => yourls_esc_url( $url ),
			'title_attr'    => yourls_esc_attr( $title ),
			'title_html'    => yourls_esc_html( yourls_trim_long_string( $title ) ),
			'long_url_html' => yourls_esc_html( yourls_trim_long_string( $url ) ),
			'warning'       => $protocol_warning,
		),
		'timestamp' => array(
			'template' => '%date%',
			'date'     => date( 'M d, Y H:i', $timestamp +( YOURLS_HOURS_OFFSET * 3600 ) ),
		),
		'ip' => array(
			'template' => '%ip%',
			'ip'       => $ip,
		),
		'clicks' => array(
			'template' => '%clicks%',
			'clicks'   => yourls_number_format_i18n( $clicks, 0, '', '' ),
		),
		'actions' => array(
			'template' => '%actions% <input type="hidden" id="keyword_%id%" value="%keyword%"/>',
			'actions'  => $action_links,
			'id'       => $id,
			'keyword'  => $keyword,
		),
	);
	$cells = yourls_apply_filter( 'table_add_row_cell_array', $cells, $keyword, $url, $title, $ip, $clicks, $timestamp );
	
	// Row cells: the HTML. Replace every %stuff% in 'template' with 'stuff' value.
	$row = "<tr id=\"id-$id\">";
	foreach( $cells as $cell_id => $elements ) {
		$row .= sprintf( '<td class="%s" id="%s">', $cell_id, $cell_id . '-' . $id );
		$row .= preg_replace( '/%([^%]+)?%/e', '$elements["$1"]', $elements['template'] );
		$row .= '</td>';
	}
	$row .= "</tr>";
	$row  = yourls_apply_filter( 'table_add_row', $row, $keyword, $url, $title, $ip, $clicks, $timestamp );
	
	return $row;
}

/**
 * Echo the main table head
 *
 */
function yourls_table_head() {
	$start = '<table class="table table-striped table-hover"><thead><tr>'."\n";
	echo yourls_apply_filter( 'table_head_start', $start );
	
	$cells = yourls_apply_filter( 'table_head_cells', array(
		'shorturl' => yourls__( 'Short URL' ),
		'longurl'  => yourls__( 'Original URL' ),
		'date'     => yourls__( 'Date' ),
		'ip'       => yourls__( 'IP' ),
		'clicks'   => yourls__( 'Clicks' ),
		'actions'  => yourls__( 'Actions' )
	) );
	foreach( $cells as $k => $v ) {
		echo "<th id='main_table_head_$k'>$v</th>\n";
	}
	
	$end = "</tr></thead>\n";
	echo yourls_apply_filter( 'table_head_end', $end );
}

/**
 * Echo the tbody start tag
 *
 */
function yourls_table_tbody_start() {
	echo yourls_apply_filter( 'table_tbody_start', '<tbody>' );
}

/**
 * Echo the tbody end tag
 *
 */
function yourls_table_tbody_end() {
	echo yourls_apply_filter( 'table_tbody_end', '</tbody>' );
}

/**
 * Echo the table start tag
 *
 */
function yourls_table_end() {
	echo yourls_apply_filter( 'table_end', '</table>' );
}

/**
 * Echo the content start tag
 *
 */
function yourls_wrapper_start() {
	echo yourls_apply_filter( 'wrapper_start', '<div class="col col-lg-6 col-push-4">' );
}

/**
 * Echo the content end tag
 *
 */
function yourls_wrapper_end() {
	if( defined( 'YOURLS_DEBUG' ) && YOURLS_DEBUG == true )
		yourls_html_debug();
	echo yourls_apply_filter( 'wrapper_end', '</div>' );
}

/**
 * Echo the sidebar start tag
 *
 */
function yourls_sidebar_start() {
	echo yourls_apply_filter( 'sidebar_start', '<div class="menu col col-lg-2 col-offset-2 affix">' );
}

/**
 * Echo the sidebar end tag
 *
 */
function yourls_sidebar_end() {
	echo yourls_apply_filter( 'sidebar_end', '</div>' );
}

/**
 * Echo HTML tag for a link
 *
 */
function yourls_html_link( $href, $title = '', $element = '' ) {
	if( !$title )
		$title = $href;
	if( $element )
		$element = sprintf( 'id="%s"', yourls_esc_attr( $element ) );
	$link = sprintf( '<a href="%s" %s>%s</a>', yourls_esc_url( $href ), $element, yourls_esc_html( $title ) );
	echo yourls_apply_filter( 'html_link', $link );
}

/**
 * Display the login screen. Nothing past this point.
 *
 */
function yourls_login_screen( $error_msg = '' ) {
	yourls_html_head( 'login' );
	
	$action = ( isset( $_GET['action'] ) && $_GET['action'] == 'logout' ? '?' : '' );

	yourls_sidebar_start();
	yourls_html_logo();
	yourls_sidebar_end();
	yourls_wrapper_start();
	?>
	<div id="login">
		<form method="post" class="form-horizontal" action="<?php echo $action; ?>"> <?php // reset any QUERY parameters ?>
			<?php
				if( !empty( $error_msg ) ) {
					yourls_add_notice( $error_msg );
				}
			?>
			<div class="control-group">
				<label class="control-label" for="username"><?php yourls_e( 'Username' ); ?></label>
				<div class="controls">
					<input type="text" id="username" name="username" class="text">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="password"><?php yourls_e( 'Password' ); ?></label>
				<div class="controls">
					<input type="password" id="password" name="password" class="text">
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-primary" name="submit"><?php yourls_e( 'Login' ); ?></button>
				</div>
			</div>
		</form>
		<script type="text/javascript">$('#username').focus();</script>
	</div>
	<?php
	yourls_wrapper_end();
	die();	
}

/**
 * Output translated strings used by the Javascript calendar
 *
 * @since 1.6
 */
function yourls_l10n_calendar_strings() {
	echo "\n<script>\n";
	echo "var l10n_cal_month = " . json_encode( array_values( yourls_l10n_months() ) ) . ";\n";
	echo "var l10n_cal_days = " . json_encode( array_values( yourls_l10n_weekday_initial() ) ) . ";\n";
	echo "var l10n_cal_today = \"" . yourls_esc_js( yourls__( 'Today' ) ) . "\";\n";
	echo "var l10n_cal_close = \"" . yourls_esc_js( yourls__( 'Close' ) ) . "\";\n";
	echo "</script>\n";
	
	// Dummy returns, to initialize l10n strings used in the calendar
	yourls__( 'Today' );
	yourls__( 'Close' );
}

/**
 * Display custom message based on query string parameter 'login_msg'
 *
 * @since 1.7
 */
function yourls_display_login_message() {
	if( !isset( $_GET['login_msg'] ) )
		return;
	
	switch( $_GET['login_msg'] ) {
		case 'pwdclear':
			$message  = '';
			$message .= yourls__( '<strong>Notice</strong>: your password is stored as clear text in your <tt>config.php</tt>' );
			$message .= '<p>' . yourls__( 'Did you know you can easily improve the security of your YOURLS install by <strong>encrypting</strong> your password?' );
			$message .= '<br />' . yourls__( 'See <a href="http://yourls.org/userpassword">UsernamePassword</a> for details' ) . '</p>';
			yourls_add_notice( $message, 'notice' );
			break;
	}
}

/**
 * Close html page
 */
function yourls_html_ending() {
	echo '</body></html>';
}
