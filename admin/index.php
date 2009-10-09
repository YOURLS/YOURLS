<?php
// Require Files
require_once( dirname(dirname(__FILE__)).'/includes/load-yourls.php' );
yourls_maybe_require_auth();

// Variables
$table_url = YOURLS_DB_TABLE_URL;
// Default SQL behavior
$where = $search_display = $search_text = $search_url = $url = $keyword = '';
$search_in_text = 'URL';
$search_in_sql = 'url';
$sort_by_text = 'Short URL';
$sort_by_sql = 'timestamp';
$sort_order_text = 'Descending Order';
$sort_order_sql = 'desc';
$page = ( isset( $_GET['page'] ) ? intval($_GET['page']) : 1 );
$search = ( isset( $_GET['s_search'] ) ? mysql_real_escape_string(trim($_GET['s_search'])) : '' );
$perpage = ( isset( $_GET['perpage'] ) && intval( $_GET['perpage'] ) ? intval($_GET['perpage']) : 15 );
$link_limit = ( isset( $_GET['link_limit'] ) ? intval($_GET['link_limit']) : '' );
if ( $link_limit !== '' ) {
	$link_filter = ( isset( $_GET['link_filter'] ) && $_GET['link_filter'] == 'more' ? 'more' : 'less' ) ;
	$link_moreless = ( $link_filter == 'more' ? '>' : '<' );
	$where = " AND clicks $link_moreless $link_limit";
} else {
	$link_filter = '';
}
$base_page = YOURLS_SITE . '/admin/index.php';

// Searching
if(!empty($search) && !empty($_GET['s_in'])) {
	switch($_GET['s_in']) {
		case 'keyword':
			$search_in_text = 'Short URL';
			$search_in_sql = 'keyword';
			break;
		case 'url':
			$search_in_text = 'URL';
			$search_in_sql = 'url';
			break;
		case 'ip':
			$search_in_text = 'IP Address';
			$search_in_sql = 'ip';
			break;
	}
	$search_text = stripslashes($search);
	$search_display = "Searching for <strong>$search_text</strong> in <strong>$search_in_text</strong>. ";
	$search_url = "&amp;s_search=$search_text &amp;s_in=$search_in_sql";
	$search = str_replace('*', '%', '*'.$search.'*');
	$where .= " AND $search_in_sql LIKE ('$search')";
}

// Sorting
if(!empty($_GET['s_by']) || !empty($_GET['s_order'])) {
	switch($_GET['s_by']) {
		case 'keyword':
			$sort_by_text = 'Short URL';
			$sort_by_sql = 'keyword';
			break;
		case 'url':
			$sort_by_text = 'URL';
			$sort_by_sql = 'url';
			break;
		case 'timestamp':
			$sort_by_text = 'Date';
			$sort_by_sql = 'timestamp';
			break;
		case 'ip':
			$sort_by_text = 'IP Address';
			$sort_by_sql = 'ip';
			break;
		case 'clicks':
			$sort_by_text = 'Clicks';
			$sort_by_sql = 'clicks';
			break;
	}
	switch($_GET['s_order']) {
		case 'asc':
			$sort_order_text = 'Ascending Order';
			$sort_order_sql = 'asc';
			break;
		case 'desc':
			$sort_order_text = 'Descending Order';
			$sort_order_sql = 'desc';
			break;
	}
}

// Get URLs Count for current filter, total links in DB & total clicks
list( $total_urls, $total_clicks ) = array_values( yourls_get_db_stats() );
if ( $where ) {
	list( $total_items, $total_items_clicks ) = array_values( yourls_get_db_stats( $where ) );
} else {
	$total_items = $total_urls;
	$total_items_clicks = false;
}

// This is a bookmarklet
if ( isset( $_GET['u'] ) ) {
	$is_bookmark = true;

	$url = $_GET['u'];
	$keyword = ( isset( $_GET['k'] ) ? $_GET['k'] : '' );
	$return = yourls_add_new_link( $url, $keyword );
	
	// If fails because keyword already exist, retry with no keyword
	if ( isset( $return['status'] ) && $return['status'] == 'fail' && isset( $return['code'] ) && $return['code'] == 'error:keyword' ) {
		$msg = $return['message'];
		$return = yourls_add_new_link( $url, '', $ydb );
		$return['message'] .= ' ('.$msg.')';
	}
	
	$s_url = stripslashes( $url );
	$where = " AND url LIKE '$s_url' ";
	
	$page = $total_pages = $perpage = 1;
	$offset = 0;
	
	$text = ( isset( $_GET['s'] ) ? stripslashes( $_GET['s'] ) : '' );
	$title = ( isset( $_GET['t'] ) ? stripslashes( $_GET['t'] ) : '' );

// This is not a bookmarklet
} else {
	$is_bookmark = false;
	
	// Checking $page, $offset, $perpage
	if(empty($page) || $page == 0) { $page = 1; }
	if(empty($offset)) { $offset = 0; }
	if(empty($perpage) || $perpage == 0) { $perpage = 50; }

	// Determine $offset
	$offset = ($page-1) * $perpage;

	// Determine Max Number Of Items To Display On Page
	if(($offset + $perpage) > $total_items) { 
		$max_on_page = $total_items; 
	} else { 
		$max_on_page = ($offset + $perpage); 
	}

	// Determine Number Of Items To Display On Page
	if (($offset + 1) > ($total_items)) { 
		$display_on_page = $total_items; 
	} else { 
		$display_on_page = ($offset + 1); 
	}

	// Determing Total Amount Of Pages
	$total_pages = ceil($total_items / $perpage);

}


// Begin output of the page
$context = ( $is_bookmark ? 'bookmark' : 'index' );
yourls_html_head( $context );
?>
	<h1>
		<a href="<?php echo $base_page; ?>" title="YOURLS"><span>YOURLS</span>: <span>Y</span>our <span>O</span>wn <span>URL</span> <span>S</span>hortener<br/>
		<img src="<?php echo YOURLS_SITE; ?>/images/yourls-logo.png" alt="YOURLS" title="YOURLS" style="border: 0px;" /></a>
	</h1>
	<p>
	<?php if ( yourls_is_private() ) { ?>
		Your are logged in as: <strong><?php echo YOURLS_USER; ?></strong>. <a href="?mode=logout" title="Logout">Logout</a>.
	<?php } ?>
	Check the <a href="tools.php">Tools</a>.</p>
	<?php if ( !$is_bookmark ) {
	?>
	<p><?php echo $search_display; ?></p>
	<p>Display <strong><?php echo $display_on_page; ?></strong> to <strong class='increment'><?php echo $max_on_page; ?></strong> of <strong class='increment'><?php echo $total_items; ?></strong> URLs<?php if( $total_items_clicks !== false ) echo ", counting <strong>$total_items_clicks</strong> " . yourls_plural('click', $total_items_clicks) ?>.</p>
	<?php } ?>
	<p>Overall, tracking <strong class='increment'><?php echo number_format($total_urls); ?></strong> links, <strong><?php echo number_format($total_clicks); ?></strong> clicks, and counting!</p>

	<?php yourls_html_addnew(); ?>
	
	<?php if ( $is_bookmark ) {
		echo '<h2 class="bookmark_result">' . $return['message'] . '</h2>';
	
	} ?>
	
	<table id="tblUrl" class="tblSorter" cellpadding="0" cellspacing="1">
		<thead>
			<tr>
				<th>Short URL&nbsp;</th>
				<th>Original URL</th>
				<th>Date</th>
				<th>IP</th>
				<th>Clicks&nbsp;&nbsp;</th>
				<th>Actions</th>
			</tr>
		</thead>

		<?php
		if ( !$is_bookmark ) {
			$params = array(
				'search_text'    => $search_text,
				'search_in_sql'  => $search_in_sql,
				'sort_by_sql'    => $sort_by_sql,
				'sort_order_sql' => $sort_order_sql,
				'page'           => $page,
				'perpage'        => $perpage,
				'link_filter'    => $link_filter,
				'link_limit'     => $link_limit,
				'total_pages'    => $total_pages,
				'base_page'      => $base_page,
				'search_url'     => $search_url,
			);
			yourls_html_tfooter( $params );
		}
		?>

		<tbody>
			<?php
			// Main Query
			$url_results = $ydb->get_results("SELECT * FROM `$table_url` WHERE 1=1 $where ORDER BY $sort_by_sql $sort_order_sql LIMIT $offset, $perpage;");
			if( $url_results ) {
				foreach( $url_results as $url_result ) {
					$keyword = yourls_sanitize_string($url_result->keyword);
					$timestamp = strtotime($url_result->timestamp);
					$url = stripslashes($url_result->url);
					$ip = $url_result->ip;
					$clicks = $url_result->clicks;

					echo yourls_table_add_row( $keyword, $url, $ip, $clicks, $timestamp );
				}
			} else {
				echo '<tr class="nourl_found"><td colspan="6">No URL Found</td></tr>';
			}
			?>
		</tbody>
	</table>
	
	<?php if ( $is_bookmark )
		yourls_share_box( $url, $return['shorturl'], $title, $text );
	?>
	
<?php yourls_html_footer( ); ?>