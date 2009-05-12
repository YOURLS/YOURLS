<?php
### Require Files
require_once( dirname(dirname(__FILE__)).'/includes/config.php' );
if (defined('YOURLS_PRIVATE') && YOURLS_PRIVATE == true)
	require_once( dirname(dirname(__FILE__)).'/includes/auth.php' );

### Connect To Database
$db = yourls_db_connect();

### Variables
$where = '';
$search_display = '';
$search_text = '';
$search_url = '';
$search_in_text = 'URL';
$search_in_sql = 'url';
$sort_by_text = 'ID';
$sort_by_sql = 'id';
$sort_order_text = 'Descending Order';
$sort_order_sql = 'desc';
$page = intval($_GET['page']);
$search = mysql_real_escape_string(trim($_GET['s_search']));
$perpage = ( intval($_GET['perpage']) ? intval($_GET['perpage']) : 20 );
$link_limit = ( intval($_GET['link_limit']) ? intval($_GET['link_limit']) : '' );
if ( $link_limit != '' ) {
	$link_filter = ( $_GET['link_filter'] == 'more' ? 'more' : 'less' ) ;
	$link_moreless = ( $link_filter == 'more' ? '>=' : '<=' );
	$where = " AND clicks $link_moreless $link_limit";
} else {
	$link_filter = '';
}
$base_page = 'admin/index.php';

### Searching
if(!empty($search) && !empty($_GET['s_in'])) {
	switch($_GET['s_in']) {
		case 'id':
			$search_in_text = 'ID';
			$search_in_sql = 'id';
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

### Sorting
if(!empty($_GET['s_by']) || !empty($_GET['s_order'])) {
	switch($_GET['s_by']) {
		case 'id':
			$sort_by_text = 'ID';
			$sort_by_sql = 'id';
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

## Get URLs Count for current filter, total links in DB & total clicks
$total_items = $db->get_var("SELECT COUNT(id) FROM url WHERE 1=1 $where");
$totals = $db->get_row("SELECT COUNT(id) as c, SUM(clicks) as s FROM url WHERE 1=1");

### Checking $page, $offset, $perpage
if(empty($page) || $page == 0) { $page = 1; }
if(empty($offset)) { $offset = 0; }
if(empty($perpage) || $perpage == 0) { $perpage = 50; }

### Determine $offset
$offset = ($page-1) * $perpage;

### Determine Max Number Of Items To Display On Page
if(($offset + $perpage) > $total_items) { 
	$max_on_page = $total_items; 
} else { 
	$max_on_page = ($offset + $perpage); 
}

### Determine Number Of Items To Display On Page
if (($offset + 1) > ($total_items)) { 
	$display_on_page = $total_items; 
} else { 
	$display_on_page = ($offset + 1); 
}

### Determing Total Amount Of Pages
$total_pages = ceil($total_items / $perpage);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Insert URL &laquo; YOURLS &raquo; Your Own URL Shortener | <?php echo YOURLS_SITE; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="copyright" content="Copyright &copy; 2002-<?php echo date('Y'); ?> Lester 'GaMerZ' Chan" />
	<meta name="author" content="Lester 'GaMerZ' Chan" />
	<meta name="description" content="Insert URL &laquo; YOURLS &raquo; Your Own URL Shortener' | <?php echo YOURLS_SITE; ?>" />
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/tablesorter.css" type="text/css" media="screen" />
	<script src="../js/jquery-1.3.1.min.js" type="text/javascript"></script>
	<script src="../js/insert.js" type="text/javascript"></script>
	<script src="../js/jquery.tablesorter.min.js" type="text/javascript"></script>
</head>
<body>
	<h1><a href="<?php echo $base_page; ?>"><span>YOURLS</span>: <span>Y</span>our <span>O</span>wn <span>URL</span> <span>S</span>hortener</a></h1>
	<p>Your are logged in as: <strong><?php echo $data['username']; ?></strong>. <a href='#' onclick="alert('Not implement yet, that is kind of lame :P\nFor now, just close (quit) your browser.')">Logout</a></p>
	<p>Display <strong><?php echo $display_on_page; ?></strong> to <strong class='increment'><?php echo $max_on_page; ?></strong> of <strong class='increment'><?php echo $total_items; ?></strong> URLs.
	   <?php echo $search_display; ?>
	   Overall, tracking <strong class='increment'><?php echo number_format($totals->c); ?></strong> links, <strong><?php echo number_format($totals->s); ?></strong> clicks, and counting!
	</p>

	<div id="new_url">
		<div>
			<form id="new_url_form" action="" method="get">
				<strong>Enter the URL</strong>:<input type="text" id="add-url" name="url" value="http://" class="text" size="90" />
				Optional: <strong>Custom short URL</strong>:<input type="text" id="add-keyword" name="keyword" value="" maxlength="12" class="text" size="8" />
				<input type="button" id="add-button" name="add-button" value="Shorten The URL" class="button" onclick="add();" />
			</form>
			<div id="feedback" style="display:none"></div>
		</div>
	</div>
	
	<table id="tblUrl" class="tblSorter" cellpadding="0" cellspacing="1">
		<thead>
			<tr>
				<th>Link&nbsp;ID&nbsp;&nbsp;</th>
				<th>Original URL</th>
				<th>Short URL</th>
				<th>Date</th>
				<th>IP</th>
				<th>Clicks&nbsp;&nbsp;</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th colspan="4" style="text-align: left;">
					<form action="" method="get">
						<div>
							<div style="float:right;">
								<input type="submit" id="submit-sort" value="Filter" class="button primary" />
								&nbsp;
								<input type="button" id="submit-clear-filter" value="Clear Filter" class="button" onclick="window.parent.location.href = 'admin.php'" />
							</div>

							Search&nbsp;for&nbsp;
							<input type="text" name="s_search" class="text" size="20" value="<?php echo $search_text; ?>" />
							&nbsp;in&nbsp;
							<select name="s_in" size="1">
								<!-- <option value="id"<?php if($search_in_sql == 'id') { echo ' selected="selected"'; } ?>>ID</option> -->
								<option value="url"<?php if($search_in_sql == 'url') { echo ' selected="selected"'; } ?>>URL</option>
								<option value="ip"<?php if($search_in_sql == 'ip') { echo ' selected="selected"'; } ?>>IP</option>
							</select>
							&ndash;&nbsp;Order&nbsp;by&nbsp;
							<select name="s_by" size="1">
								<option value="id"<?php if($sort_by_sql == 'id') { echo ' selected="selected"'; } ?>>ID</option>
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
							<input type="text" name="link_limit" class="text" size="4" value="<?php echo $link_limit; ?>" />clicks

							
						</div>
					</form>
				</th>
				<th colspan="3" style="text-align: right;">
					Pages (<?php echo $total_pages; ?>):
					<?php
						if ($page >= 4) {
							echo '<b><a href="'.$base_page.'?s_by='.$sort_by_sql.'&amp;s_order='.$sort_order_sql.$search_url.'&amp;page=1'.'" title="Go to First Page">&laquo; First</a></b> ... ';
						}
						if($page > 1) {
							echo ' <b><a href="'.$base_page.'?s_by='.$sort_by_sql.'&amp;s_order='.$sort_order_sql.$search_url.'&amp;page='.($page-1).'" title="&laquo; Go to Page '.($page-1).'">&laquo;</a></b> ';
						}
						for($i = $page - 2 ; $i  <= $page +2; $i++) {
							if ($i >= 1 && $i <= $total_pages) {
								if($i == $page) {
									echo "<strong>[$i]</strong> ";
								} else {
									echo '<a href="'.$base_page.'?s_by='.$sort_by_sql.'&amp;s_order='.$sort_order_sql.$search_url.'&amp;page='.($i).'" title="Page '.$i.'">'.$i.'</a> ';
								}
							}
						}
						if($page < $total_pages) {
							echo ' <b><a href="'.$base_page.'?s_by='.$sort_by_sql.'&amp;s_order='.$sort_order_sql.$search_url.'&amp;page='.($page+1).'" title="Go to Page '.($page+1).' &raquo;">&raquo;</a></b> ';
						}
						if (($page+2) < $total_pages) {
							echo ' ... <b><a href="'.$base_page.'s_by='.$sort_by_sql.'&amp;s_order='.$sort_order_sql.$search_url.'&amp;?page='.($total_pages).'" title="Go to Last Page">Last &raquo;</a></b>';
						}
					?>
				</th>
			</tr>
		</tfoot>
		<tbody>
			<?php
			### Main Query
			$url_results = $db->get_results("SELECT * FROM url WHERE 1=1 $where ORDER BY $sort_by_sql $sort_order_sql LIMIT $offset, $perpage;");
			if($url_results) {
				foreach( $url_results as $url_result ) {
					$base36 = yourls_int2string($url_result->id);
					$timestamp = strtotime($url_result->timestamp);
					$id = ($url_result->id);
					$url = stripslashes($url_result->url);
					$ip = $url_result->ip;
					$clicks = $url_result->clicks;

					echo yourls_table_add_row($id, $base36, $url, $ip, $clicks, $timestamp );
				}
			} else {
				echo '<tr class="nourl_found"><td colspan="7">No URL Found</td></tr>';
			}
			?>
		</tbody>
	</table>


</body>
</html>