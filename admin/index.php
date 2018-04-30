<?php
define( 'YOURLS_ADMIN', true );
require_once( dirname( __DIR__ ).'/includes/load-yourls.php' );
yourls_maybe_require_auth();

// Variables
$table_url = YOURLS_DB_TABLE_URL;
$search_sentence = $search_text = $url = $keyword = '';
/* $where will collect additional SQL arguments:
 * $where['sql'] will concatenate SQL clauses: $where['sql'] .= ' AND something = :value ';
 * $where['binds'] will hold the (name => value) placeholder pairs: $where['binds']['value'] = $value;
 */
$where = array('sql' => '', 'binds' => array());
$date_filter = $date_first  = $date_second = '';
$base_page   = yourls_admin_url( 'index.php' );

// Default SQL behavior
$search_in_text  = yourls__( 'URL' );
$search_in       = 'all';
$sort_by_text    = yourls__( 'Short URL' );
$sort_by         = 'timestamp';
$sort_order      = 'desc';
$page            = ( isset( $_GET['page'] ) ? intval($_GET['page']) : 1 );
$search          = yourls_get_search_text();
$perpage         = ( isset( $_GET['perpage'] ) && intval( $_GET['perpage'] ) ? intval($_GET['perpage']) : yourls_apply_filter( 'admin_view_per_page', 15 ) );
$click_limit     = ( isset( $_GET['click_limit'] ) && $_GET['click_limit'] !== '' ) ? intval( $_GET['click_limit'] ) : '' ;
if ( $click_limit !== '' ) {
	$click_filter   = ( isset( $_GET['click_filter'] ) && $_GET['click_filter'] == 'more' ? 'more' : 'less' ) ;
	$click_moreless = ( $click_filter == 'more' ? '>' : '<' );
	$where['sql']   = " AND clicks $click_moreless :click_limit";
    $where['binds']['click_limit'] = $click_limit;
} else {
	$click_filter   = '';
}

// Searching
if( !empty( $search ) && !empty( $_GET['search_in'] ) ) {
	switch( $_GET['search_in'] ) {
		case 'all':
			$search_in_text = yourls__( 'All fields' );
			$search_in      = 'all';
			break;
		case 'keyword':
			$search_in_text = yourls__( 'Short URL' );
			$search_in      = 'keyword';
			break;
		case 'url':
			$search_in_text = yourls__( 'URL' );
			$search_in      = 'url';
			break;
		case 'title':
			$search_in_text = yourls__( 'Title' );
			$search_in      = 'title';
			break;
		case 'ip':
			$search_in_text = yourls__( 'IP Address' );
			$search_in      = 'ip';
			break;
	}
	$search_sentence = yourls_s( 'Searching for <strong>%1$s</strong> in <strong>%2$s</strong>.', yourls_esc_html( $search ), yourls_esc_html( $search_in_text ) );
	$search_text     = $search;
	$search          = str_replace( '*', '%', '*' . $search . '*' );
    if( $search_in == 'all' ) {
        $where['sql'] .= ' AND CONCAT_WS("",`keyword`,`url`,`title`,`ip`) LIKE (:search)';
        $where['binds']['search'] = $search;
        // Search across all fields. The resulting SQL will be something like:
        // SELECT * FROM `yourls_url` WHERE CONCAT_WS('',`keyword`,`url`,`title`,`ip`) LIKE ("%ozh%")
        // CONCAT_WS because CONCAT('foo', 'bar', NULL) = NULL. NULL wins. Not sure if values can be NULL now or in the future, so better safe.
        // TODO: pay attention to this bit when the DB schema changes
    } else {
        $where['sql'] .= " AND `$search_in` LIKE (:search)";
        $where['binds']['search'] = $search;
    }
}

// Time span
if( !empty( $_GET['date_filter'] ) ) {
	switch( $_GET['date_filter'] ) {
		case 'before':
			$date_filter = 'before';
			if( isset( $_GET['date_first'] ) && yourls_sanitize_date( $_GET['date_first'] ) ) {
				$date_first     = yourls_sanitize_date( $_GET['date_first'] );
				$date_first_sql = yourls_sanitize_date_for_sql( $_GET['date_first'] );
				$where['sql'] .= ' AND `timestamp` < :date_first_sql';
                $where['binds']['date_first_sql'] = $date_first_sql;
			}
			break;
		case 'after':
			$date_filter = 'after';
			if( isset( $_GET['date_first'] ) && yourls_sanitize_date( $_GET['date_first'] ) ) {
				$date_first_sql = yourls_sanitize_date_for_sql( $_GET['date_first'] );
				$date_first     = yourls_sanitize_date( $_GET['date_first'] );
				$where['sql'] .= ' AND `timestamp` > :date_first_sql';
                $where['binds']['date_first_sql'] = $date_first_sql;
			}
			break;
		case 'between':
			$date_filter = 'between';
			if( isset( $_GET['date_first'] ) && isset( $_GET['date_second'] ) && yourls_sanitize_date( $_GET['date_first'] ) && yourls_sanitize_date( $_GET['date_second'] ) ) {
				$date_first_sql  = yourls_sanitize_date_for_sql( $_GET['date_first'] );
				$date_second_sql = yourls_sanitize_date_for_sql( $_GET['date_second'] );
				$date_first      = yourls_sanitize_date( $_GET['date_first'] );
				$date_second     = yourls_sanitize_date( $_GET['date_second'] );
				$where['sql'] .= ' AND `timestamp` BETWEEN :date_first_sql AND :date_second_sql';
                $where['binds']['date_first_sql']  = $date_first_sql;
                $where['binds']['date_second_sql'] = $date_second_sql;
			}
			break;
	}
}

// Sorting
if( !empty( $_GET['sort_by'] ) || !empty( $_GET['sort_order'] ) ) {
	switch( $_GET['sort_by'] ) {
		case 'keyword':
			$sort_by_text = yourls__( 'Short URL' );
			$sort_by      = 'keyword';
			break;
		case 'url':
			$sort_by_text = yourls__( 'URL' );
			$sort_by      = 'url';
			break;
		case 'title':
			$sort_by_text = yourls__( 'Title' );
			$sort_by      = 'title';
			break;
		case 'timestamp':
			$sort_by_text = yourls__( 'Date' );
			$sort_by      = 'timestamp';
			break;
		case 'ip':
			$sort_by_text = yourls__( 'IP Address' );
			$sort_by      = 'ip';
			break;
		case 'clicks':
			$sort_by_text = yourls__( 'Clicks' );
			$sort_by      = 'clicks';
			break;
	}
	switch( $_GET['sort_order'] ) {
		case 'asc':
			$sort_order      = 'asc';
			break;
		case 'desc':
			$sort_order      = 'desc';
			break;
	}
}

// Get URLs Count for current filter, total links in DB & total clicks
list( $total_urls, $total_clicks ) = array_values( yourls_get_db_stats() );
if ( !empty($where['sql']) ) {
	list( $total_items, $total_items_clicks ) = array_values( yourls_get_db_stats( $where ) );
} else {
	$total_items        = $total_urls;
	$total_items_clicks = false;
}

// This is a bookmarklet
if ( isset( $_GET['u'] ) or isset( $_GET['up'] ) ) {
	$is_bookmark = true;
	yourls_do_action( 'bookmarklet' );

	// No sanitization needed here: everything happens in yourls_add_new_link()
	if( isset( $_GET['u'] ) ) {
		// Old school bookmarklet: ?u=<url>
		$url = rawurldecode( $_GET['u'] );
	} else {
		// New style bookmarklet: ?up=<url protocol>&us=<url slashes>&ur=<url rest>
		$url = rawurldecode( $_GET['up'] . $_GET['us'] . $_GET['ur'] );
	}
	$keyword = ( isset( $_GET['k'] ) ? ( $_GET['k'] ) : '' );
	$title   = ( isset( $_GET['t'] ) ? ( $_GET['t'] ) : '' );
	$return  = yourls_add_new_link( $url, $keyword, $title );

	// If fails because keyword already exist, retry with no keyword
	if ( isset( $return['status'] ) && $return['status'] == 'fail' && isset( $return['code'] ) && $return['code'] == 'error:keyword' ) {
		$msg = $return['message'];
		$return = yourls_add_new_link( $url, '', $ydb );
		$return['message'] .= ' ('.$msg.')';
	}

	// Stop here if bookmarklet with a JSON callback function
	if( isset( $_GET['jsonp'] ) && $_GET['jsonp'] == 'yourls' ) {
		$short   = $return['shorturl'] ? $return['shorturl'] : '';
		$message = $return['message'];
		yourls_content_type_header( 'application/javascript' );
		echo yourls_apply_filter( 'bookmarklet_jsonp', "yourls_callback({'short_url':'$short','message':'$message'});" );

		die();
	}

	// Now use the URL that has been sanitized and returned by yourls_add_new_link()
	$url = $return['url']['url'];
	$where['sql'] .= ' AND `url` LIKE :url ';
    $where['binds']['url'] = $url;

	$page   = $total_pages = $perpage = 1;
	$offset = 0;

	$text   = ( isset( $_GET['s'] ) ? stripslashes( $_GET['s'] ) : '' );

	// Sharing with social bookmarklets
	if( !empty($_GET['share']) ) {
		yourls_do_action( 'pre_share_redirect' );
		switch ( $_GET['share'] ) {
			case 'twitter':
				// share with Twitter
				$destination = sprintf( "https://twitter.com/intent/tweet?url=%s&text=%s", urlencode( $return['shorturl'] ), urlencode( $title ) );
				yourls_redirect( $destination, 303 );

				// Deal with the case when redirection failed:
				$return['status']    = 'error';
				$return['errorCode'] = 400;
				$return['message']   = yourls_s( 'Short URL created, but could not redirect to %s !', 'Twitter' );
				break;

			case 'facebook':
				// share with Facebook
				$destination = sprintf( "https://www.facebook.com/sharer/sharer.php?u=%s&t=%s", urlencode( $return['shorturl'] ), urlencode( $title ) );
				yourls_redirect( $destination, 303 );

				// Deal with the case when redirection failed:
				$return['status']    = 'error';
				$return['errorCode'] = 400;
				$return['message']   = yourls_s( 'Short URL created, but could not redirect to %s !', 'Facebook' );
				break;

			case 'tumblr':
				// share with Tumblr
				$destination = sprintf( "https://www.tumblr.com/share?v=3&u=%s&t=%s&s=%s", urlencode( $return['shorturl'] ), urlencode( $title ), urlencode( $text ) );
				yourls_redirect( $destination, 303 );

				// Deal with the case when redirection failed:
				$return['status']    = 'error';
				$return['errorCode'] = 400;
				$return['message']   = yourls_s( 'Short URL created, but could not redirect to %s !', 'Tumblr' );
				break;

			default:
				// Is there a custom registered social bookmark?
				yourls_do_action( 'share_redirect_' . $_GET['share'], $return );

				// Still here? That was an unknown 'share' method, then.
				$return['status']    = 'error';
				$return['errorCode'] = 400;
				$return['message']   = yourls__( 'Unknown "Share" bookmarklet' );
				break;
		}
	}

// This is not a bookmarklet
} else {
	$is_bookmark = false;

	// Checking $page, $offset, $perpage
	if( empty($page) || $page == 0 ) {
		$page = 1;
	}
	if( empty($offset) ) {
		$offset = 0;
	}
	if( empty($perpage) || $perpage == 0) {
		$perpage = 50;
	}

	// Determine $offset
	$offset = ( $page-1 ) * $perpage;

	// Determine Max Number Of Items To Display On Page
	if( ( $offset + $perpage ) > $total_items ) {
		$max_on_page = $total_items;
	} else {
		$max_on_page = ( $offset + $perpage );
	}

	// Determine Number Of Items To Display On Page
	if ( ( $offset + 1 ) > $total_items ) {
		$display_on_page = $total_items;
	} else {
		$display_on_page = ( $offset + 1 );
	}

	// Determing Total Amount Of Pages
	$total_pages = ceil( $total_items / $perpage );
}


// Begin output of the page
$context = ( $is_bookmark ? 'bookmark' : 'index' );
yourls_html_head( $context );
yourls_html_logo();
yourls_html_menu() ;

yourls_do_action( 'admin_page_before_content' );

if ( !$is_bookmark ) { ?>
	<p><?php echo $search_sentence; ?></p>
	<p><?php
		printf( yourls__( 'Display <strong>%1$s</strong> to <strong class="increment">%2$s</strong> of <strong class="increment">%3$s</strong> URLs' ), $display_on_page, $max_on_page, $total_items );
		if( $total_items_clicks !== false )
			echo ", " . sprintf( yourls_n( 'counting <strong>1</strong> click', 'counting <strong>%s</strong> clicks', $total_items_clicks ), yourls_number_format_i18n( $total_items_clicks ) );
	?>.</p>
<?php } ?>
<p id="overall_tracking"><?php printf( yourls__( 'Overall, tracking <strong class="increment">%1$s</strong> links, <strong>%2$s</strong> clicks, and counting!' ), yourls_number_format_i18n( $total_urls ), yourls_number_format_i18n( $total_clicks ) ); ?></p>
<?php

yourls_do_action( 'admin_page_before_form' );

yourls_html_addnew();

// If bookmarklet, add message. Otherwise, hide hidden share box.
if ( !$is_bookmark ) {
	yourls_share_box( '', '', '', '', '', '', true );
} else {
	echo '<script type="text/javascript">$(document).ready(function(){
		feedback( "' . $return['message'] . '", "'. $return['status'] .'");
		init_clipboard();
	});</script>';
}

yourls_do_action( 'admin_page_before_table' );

yourls_table_head();

if ( !$is_bookmark ) {
	$params = array(
		'search'       => $search,
		'search_text'  => $search_text,
		'search_in'    => $search_in,
		'sort_by'      => $sort_by,
		'sort_order'   => $sort_order,
		'page'         => $page,
		'perpage'      => $perpage,
		'click_filter' => $click_filter,
		'click_limit'  => $click_limit,
		'total_pages'  => $total_pages,
		'date_filter'  => $date_filter,
		'date_first'   => $date_first,
		'date_second'  => $date_second,
	);
	yourls_html_tfooter( $params );
}

yourls_table_tbody_start();

// Main Query
$where = yourls_apply_filter( 'admin_list_where', $where );
$url_results = $ydb->fetchObjects( "SELECT * FROM `$table_url` WHERE 1=1 ${where['sql']} ORDER BY `$sort_by` $sort_order LIMIT $offset, $perpage;", $where['binds'] );
$found_rows = false;
if( $url_results ) {
	$found_rows = true;
	foreach( $url_results as $url_result ) {
		$keyword = yourls_sanitize_string( $url_result->keyword );
		$timestamp = strtotime( $url_result->timestamp );
		$url = stripslashes( $url_result->url );
		$ip = $url_result->ip;
		$title = $url_result->title ? $url_result->title : '';
		$clicks = $url_result->clicks;

		echo yourls_table_add_row( $keyword, $url, $title, $ip, $clicks, $timestamp );
	}
}

$display = $found_rows ? 'display:none' : '';
echo '<tr id="nourl_found" style="'.$display.'"><td colspan="6">' . yourls__('No URL') . '</td></tr>';

yourls_table_tbody_end();

yourls_table_end();

yourls_do_action( 'admin_page_after_table' );

if ( $is_bookmark )
	yourls_share_box( $url, $return['shorturl'], $title, $text );
?>

<?php yourls_html_footer( ); ?>
