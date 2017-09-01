<?php
// TODO: make things cleaner. This file is an awful HTML/PHP soup.
define( 'YOURLS_INFOS', true );
require_once( dirname( __FILE__ ).'/includes/load-yourls.php' );
require_once( YOURLS_INC.'/functions-infos.php' );
yourls_maybe_require_auth();

// Variables should be defined in yourls-loader.php, if not try GET request (old behavior of yourls-infos.php)
if( !isset( $keyword ) && isset( $_GET['id'] ) )
	$keyword = $_GET['id'];
if( !isset( $aggregate ) && isset( $_GET['all'] ) && $_GET['all'] == 1 && yourls_allow_duplicate_longurls() )
	$aggregate = true;

if ( !isset( $keyword ) ) {
	yourls_do_action( 'infos_no_keyword' );
	yourls_redirect( YOURLS_SITE, 302 );
}

// Get basic infos for this shortened URL
$keyword = yourls_sanitize_string( $keyword );
$longurl = yourls_get_keyword_longurl( $keyword );
$clicks = yourls_get_keyword_clicks( $keyword );
$timestamp = yourls_get_keyword_timestamp( $keyword );
$title = yourls_get_keyword_title( $keyword );

// Update title if it hasn't been stored yet
if( $title == '' ) {
	$title = yourls_get_remote_title( $longurl );
	yourls_edit_link_title( $keyword, $title );
}

if ( $longurl === false ) {
	yourls_do_action( 'infos_keyword_not_found' );
	yourls_redirect( YOURLS_SITE, 302 );
}

yourls_do_action( 'pre_yourls_infos', $keyword );


if( yourls_do_log_redirect() ) {

	$table = YOURLS_DB_TABLE_LOG;
	$referrers = array();
	$direct = $notdirect = 0;
	$countries = array();
	$dates = array();
	$list_of_days = array();
	$list_of_months = array();
	$list_of_years = array();
	$last_24h = array();

	if( yourls_allow_duplicate_longurls() )
		$keyword_list = yourls_get_longurl_keywords( $longurl );
	// Define keyword query range : either a single keyword or a list of keywords
	if( $aggregate ) {
		$keyword_range = 'IN ( :list )';
        $keyword_binds = array('list' => $keyword_list);
	} else {
		$keyword_range = '= :keyword';
        $keyword_binds = array('keyword' => $keyword);
	}


	// *** Referrers ***
    $sql = "SELECT `referrer`, COUNT(*) AS `count` FROM `$table` WHERE `shorturl` $keyword_range GROUP BY `referrer`;";
    $sql = yourls_apply_filter('stat_query_referrer', $sql);
	$rows = $ydb->fetchObjects($sql, $keyword_binds);

	// Loop through all results and build list of referrers, countries and hits per day
	foreach( (array)$rows as $row ) {
		if ( $row->referrer == 'direct' ) {
			$direct = $row->count;
			continue;
		}

		$host = yourls_get_domain( $row->referrer );
		if( !array_key_exists( $host, $referrers ) )
			$referrers[$host] = array( );
		if( !array_key_exists( $row->referrer, $referrers[$host] ) ) {
			$referrers[$host][$row->referrer] = $row->count;
			$notdirect += $row->count;
		} else {
			$referrers[$host][$row->referrer] += $row->count;
			$notdirect += $row->count;
		}
	}

	// Sort referrers. $referrer_sort is a array of most frequent domains
	arsort( $referrers );
	$referrer_sort = array();
	$number_of_sites = count( array_keys( $referrers ) );
	foreach( $referrers as $site => $urls ) {
		if( count($urls) > 1 || $number_of_sites == 1 )
			$referrer_sort[$site] = array_sum( $urls );
	}
	arsort($referrer_sort);


	// *** Countries ***
	$sql = "SELECT `country_code`, COUNT(*) AS `count` FROM `$table` WHERE `shorturl` $keyword_range GROUP BY `country_code`;";
    $sql = yourls_apply_filter('stat_query_country', $sql);
	$rows = $ydb->fetchObjects($sql, $keyword_binds);

	// Loop through all results and build list of countries and hits
	foreach( (array)$rows as $row ) {
		if ("$row->country_code")
			$countries["$row->country_code"] = $row->count;
	}

	// Sort countries, most frequent first
	if ( $countries )
		arsort( $countries );


	// *** Dates : array of $dates[$year][$month][$day] = number of clicks ***
	$sql = "SELECT
		DATE_FORMAT(`click_time`, '%Y') AS `year`,
		DATE_FORMAT(`click_time`, '%m') AS `month`,
		DATE_FORMAT(`click_time`, '%d') AS `day`,
		COUNT(*) AS `count`
	FROM `$table`
	WHERE `shorturl` $keyword_range
	GROUP BY `year`, `month`, `day`;";
    $sql = yourls_apply_filter('stat_query_dates', $sql);
	$rows = $ydb->fetchObjects($sql, $keyword_binds);

	// Loop through all results and fill blanks
	foreach( (array)$rows as $row ) {
		if( !array_key_exists($row->year, $dates ) )
			$dates[$row->year] = array();
		if( !array_key_exists( $row->month, $dates[$row->year] ) )
			$dates[$row->year][$row->month] = array();
		if( !array_key_exists( $row->day, $dates[$row->year][$row->month] ) )
			$dates[$row->year][$row->month][$row->day] = $row->count;
		else
			$dates[$row->year][$row->month][$row->day] += $row->count;
	}

	// Sort dates, chronologically from [2007][12][24] to [2009][02][19]
	ksort( $dates );
	foreach( $dates as $year=>$months ) {
		ksort( $dates[$year] );
		foreach( $months as $month=>$day ) {
			ksort( $dates[$year][$month] );
		}
	}

	// Get $list_of_days, $list_of_months, $list_of_years
	reset( $dates );
	if( $dates ) {
        $_lists = yourls_build_list_of_days( $dates );
        $list_of_days   = $_lists['list_of_days'];
        $list_of_months = $_lists['list_of_months'];
        $list_of_years  = $_lists['list_of_years'];
        unset($_lists);
	}

	// *** Last 24 hours : array of $last_24h[ $hour ] = number of click ***
	$sql = "SELECT
		DATE_FORMAT(DATE_ADD(`click_time`, INTERVAL " . YOURLS_HOURS_OFFSET . " HOUR), '%H %p') AS `time`,
		COUNT(*) AS `count`
	FROM `$table`
	WHERE `shorturl` $keyword_range AND DATE_ADD(`click_time`, INTERVAL " . YOURLS_HOURS_OFFSET . " HOUR) > (DATE_ADD(CURRENT_TIMESTAMP, INTERVAL " . YOURLS_HOURS_OFFSET . " HOUR) - INTERVAL 1 DAY)
	GROUP BY `time`;";
    $sql = yourls_apply_filter('stat_query_last24h', $sql);
	$rows = $ydb->fetchObjects($sql, $keyword_binds);

	$_last_24h = array();
	foreach( (array)$rows as $row ) {
		if ( isset( $row->time ) )
			$_last_24h[ "$row->time" ] = $row->count;
	}

	$now = intval( date('U') );
	for ($i = 23; $i >= 0; $i--) {
		$h = date('H A', ($now - ($i * 60 * 60) + (YOURLS_HOURS_OFFSET * 60 * 60)) );
		// If the $last_24h doesn't have all the hours, insert missing hours with value 0
		$last_24h[ $h ] = array_key_exists( $h, $_last_24h ) ? $_last_24h[ $h ] : 0 ;
	}
	unset( $_last_24h );

	// *** Queries all done, phew ***

	// Filter all this junk if applicable. Be warned, some are possibly huge datasets.
	$referrers      = yourls_apply_filter( 'pre_yourls_info_referrers', $referrers );
	$referrer_sort  = yourls_apply_filter( 'pre_yourls_info_referrer_sort', $referrer_sort );
	$direct         = yourls_apply_filter( 'pre_yourls_info_direct', $direct );
	$notdirect      = yourls_apply_filter( 'pre_yourls_info_notdirect', $notdirect );
	$dates          = yourls_apply_filter( 'pre_yourls_info_dates', $dates );
	$list_of_days   = yourls_apply_filter( 'pre_yourls_info_list_of_days', $list_of_days );
	$list_of_months = yourls_apply_filter( 'pre_yourls_info_list_of_months', $list_of_months );
	$list_of_years  = yourls_apply_filter( 'pre_yourls_info_list_of_years', $list_of_years );
	$last_24h       = yourls_apply_filter( 'pre_yourls_info_last_24h', $last_24h );
	$countries      = yourls_apply_filter( 'pre_yourls_info_countries', $countries );

	// I can haz debug data
	/**
	echo "<pre>";
	echo "referrers: "; print_r( $referrers );
	echo "referrer sort: "; print_r( $referrer_sort );
	echo "direct: $direct\n";
	echo "notdirect: $notdirect\n";
	echo "dates: "; print_r( $dates );
	echo "list of days: "; print_r( $list_of_days );
	echo "list_of_months: "; print_r( $list_of_months );
	echo "list_of_years: "; print_r( $list_of_years );
	echo "last_24h: "; print_r( $last_24h );
	echo "countries: "; print_r( $countries );
	die();
	**/

}

yourls_html_head( 'infos', yourls_s( 'Statistics for %s', YOURLS_SITE.'/'.$keyword ) );
yourls_html_logo();
yourls_html_menu();
?>

<h2 id="informations"><?php echo yourls_esc_html( $title ); ?></h2>

<h3><span class="label"><?php yourls_e( 'Short URL'); ?>:</span> <img src="<?php yourls_favicon() ?>"/>
<?php if( $aggregate ) {
	$i = 0;
	foreach( $keyword_list as $k ) {
		$i++;
		if ( $i == 1 ) {
			yourls_html_link( yourls_link($k) );
		} else {
			yourls_html_link( yourls_link($k), "/$k" );
		}
		if ( $i < count( $keyword_list ) )
			echo ' + ';
	}
} else {
	yourls_html_link( yourls_link($keyword) );
	if( isset( $keyword_list ) && count( $keyword_list ) > 1 )
		echo ' <a href="'. yourls_link($keyword).'+all" title="' . yourls_esc_attr__( 'Aggregate stats for duplicate short URLs' ) . '"><img src="' . yourls_match_current_protocol( YOURLS_SITE ) . '/images/chart_bar_add.png" border="0" /></a>';
} ?></h3>
<h3 id="longurl"><span class="label"><?php yourls_e( 'Long URL'); ?>:</span> <img class="fix_images" src="<?php echo yourls_get_favicon_url( $longurl );?>" /> <?php yourls_html_link( $longurl, yourls_trim_long_string( $longurl ), 'longurl' ); ?></h3>

<div id="tabs">
	<div class="wrap_unfloat">
	<ul id="headers" class="toggle_display stat_tab">
		<?php if( yourls_do_log_redirect() ) { ?>
		<li class="selected"><a href="#stat_tab_stats"><h2><?php yourls_e( 'Traffic statistics'); ?></h2></a></li>
		<li><a href="#stat_tab_location"><h2><?php yourls_e( 'Traffic location'); ?></h2></a></li>
		<li><a href="#stat_tab_sources"><h2><?php yourls_e( 'Traffic sources'); ?></h2></a></li>
		<?php } ?>
		<li><a href="#stat_tab_share"><h2><?php yourls_e( 'Share'); ?></h2></a></li>
	</ul>
	</div>


<?php if( yourls_do_log_redirect() ) { ?>
	<div id="stat_tab_stats" class="tab">
		<h2><?php yourls_e( 'Traffic statistics'); ?></h2>

		<?php yourls_do_action( 'pre_yourls_info_stats', $keyword ); ?>

		<?php if ( $list_of_days ) { ?>

			<?php
			$graphs = array(
				'24' => yourls__( 'Last 24 hours' ),
				'7'  => yourls__( 'Last 7 days' ),
				'30' => yourls__( 'Last 30 days' ),
				'all'=> yourls__( 'All time' ),
			);

			// Which graph to generate ?
			$do_all = $do_30 = $do_7 = $do_24 = false;
			$hits_all = array_sum( $list_of_days );
			$hits_30  = array_sum( array_slice( $list_of_days, -30 ) );
			$hits_7   = array_sum( array_slice( $list_of_days, -7 ) );
			$hits_24  = array_sum( $last_24h );
			if( $hits_all > 0 )
				$do_all = true; // graph for all days range
			if( $hits_30 > 0 && count( array_slice( $list_of_days, -30 ) ) == 30 )
				$do_30 = true; // graph for last 30 days
			if( $hits_7 > 0 && count( array_slice( $list_of_days, -7 ) ) == 7 )
				$do_7 = true; // graph for last 7 days
			if( $hits_24 > 0 )
				$do_24 = true; // graph for last 24 hours

			// Which graph to display ?
			$display_all = $display_30 = $display_7 = $display_24 = false;
			if( $do_24 ) {
				$display_24 = true;
			} elseif ( $do_7 ) {
				$display_7 = true;
			} elseif ( $do_30 ) {
				$display_30 = true;
			} elseif ( $do_all ) {
				$display_all = true;
			}
			?>

			<table border="0" cellspacing="2">
			<tr>
				<td valign="top">
				<ul id="stats_lines" class="toggle_display stat_line">
				<?php
				if( $do_24 == true )
					echo '<li><a href="#stat_line_24">' . yourls__( 'Last 24 hours' ) . '</a>';
				if( $do_7 == true )
					echo '<li><a href="#stat_line_7">' . yourls__( 'Last 7 days' ) . '</a>';
				if( $do_30 == true )
					echo '<li><a href="#stat_line_30">' . yourls__( 'Last 30 days' ) . '</a>';
				if( $do_all == true )
					echo '<li><a href="#stat_line_all">' . yourls__( 'All time' ) . '</a>';
				?>
				</ul>
				<?php
				// Generate, and display if applicable, each needed graph
				foreach( $graphs as $graph => $graphtitle ) {
					if( ${'do_'.$graph} == true ) {
						$display = ( ${'display_'.$graph} === true ? 'display:block' : 'display:none' );
						echo "<div id='stat_line_$graph' class='stats_line line' style='$display'>";
						echo '<h3>' . yourls_s( 'Number of hits : %s' , $graphtitle ) . '</h3>';
						switch( $graph ) {
							case '24':
								yourls_stats_line( $last_24h, "stat_line_$graph" );
								break;

							case '7':
							case '30':
								$slice = array_slice( $list_of_days, intval( $graph ) * -1 );
								yourls_stats_line( $slice, "stat_line_$graph" );
								unset( $slice );
								break;

							case 'all':
								yourls_stats_line( $list_of_days, "stat_line_$graph" );
								break;
						}
						echo "</div>\n";
					}
				} ?>

				</td>
				<td valign="top">
				<h3><?php yourls_e( 'Historical click count' ); ?></h3>
				<?php
				$ago = round( (date('U') - strtotime($timestamp)) / (24* 60 * 60 ) );
				if( $ago <= 1 ) {
					$daysago = '';
				} else {
					$daysago = ' (' . sprintf( yourls_n( 'about 1 day ago', 'about %s days ago', $ago ), $ago ) . ')';
				}
				?>
				<p><?php echo /* //translators: eg Short URL created on March 23rd 1972 */ yourls_s( 'Short URL created on %s', yourls_date_i18n( "F j, Y @ g:i a", ( strtotime( $timestamp ) + YOURLS_HOURS_OFFSET * 3600 ) ) ) . $daysago; ?></p>
				<div class="wrap_unfloat">
					<ul class="no_bullet toggle_display stat_line" id="historical_clicks">
					<?php
					foreach( $graphs as $graph => $graphtitle ) {
						if ( ${'do_'.$graph} ) {
							$link = "<a href='#stat_line_$graph'>$graphtitle</a>";
						} else {
							$link = $graphtitle;
						}
						$stat = '';
						if( ${'do_'.$graph} ) {
							switch( $graph ) {
								case '7':
								case '30':
									$stat = yourls_s( '%s per day', round( ( ${'hits_'.$graph} / intval( $graph ) ) * 100 ) / 100 );
									break;
								case '24':
									$stat = yourls_s( '%s per hour', round( ( ${'hits_'.$graph} / 24 ) * 100 ) / 100 );
									break;
								case 'all':
									if( $ago > 0 )
										$stat = yourls_s( '%s per day', round( ( ${'hits_'.$graph} / $ago ) * 100 ) / 100 );
							}
						}
						$hits = sprintf( yourls_n( '%s hit', '%s hits', ${'hits_'.$graph} ), ${'hits_'.$graph} );
						echo "<li><span class='historical_link'>$link</span> <span class='historical_count'>$hits</span> $stat</li>\n";
					}
					?>
					</ul>
				</div>

				<h3><?php yourls_e( 'Best day' ); ?></h3>
				<?php
				$best = yourls_stats_get_best_day( $list_of_days );
				$best_time['day']   = date( "d", strtotime( $best['day'] ) );
				$best_time['month'] = date( "m", strtotime( $best['day'] ) );
				$best_time['year']  = date( "Y", strtotime( $best['day'] ) );
				?>
				<p><?php echo sprintf( /* //translators: eg. 43 hits on January 1, 1970 */ yourls_n( '<strong>%1$s</strong> hit on %2$s', '<strong>%1$s</strong> hits on %2$s', $best['max'] ), $best['max'],  yourls_date_i18n( "F j, Y", strtotime( $best['day'] ) ) ); ?>.
				<a href="" class='details hide-if-no-js' id="more_clicks"><?php yourls_e( 'Click for more details' ); ?></a></p>
				<ul id="details_clicks" style="display:none">
					<?php
					foreach( $dates as $year=>$months ) {
						$css_year = ( $year == $best_time['year'] ? 'best_year' : '' );
						if( count( $list_of_years ) > 1 ) {
							$li = "<a href='' class='details' id='more_year$year'>" . yourls_s( 'Year %s', $year ) . '</a>';
							$display = 'none';
						} else {
							$li = yourls_s( 'Year %s', $year );
							$display = 'block';
						}
						echo "<li><span class='$css_year'>$li</span>";
						echo "<ul style='display:$display' id='details_year$year'>";
						foreach( $months as $month=>$days ) {
							$css_month = ( ( $month == $best_time['month'] && ( $css_year == 'best_year' ) ) ? 'best_month' : '' );
							$monthname = yourls_date_i18n( "F", mktime( 0, 0, 0, $month, 1 ) );
							if( count( $list_of_months ) > 1 ) {
								$li = "<a href='' class='details' id='more_month$year$month'>$monthname</a>";
								$display = 'none';
							} else {
								$li = "$monthname";
								$display = 'block';
							}
							echo "<li><span class='$css_month'>$li</span>";
							echo "<ul style='display:$display' id='details_month$year$month'>";
								foreach( $days as $day=>$hits ) {
									$class = ( $hits == $best['max'] ? 'class="bestday"' : '' );
									echo "<li $class>$day: " . sprintf( yourls_n( '1 hit', '%s hits', $hits ), $hits ) ."</li>\n";
								}
							echo "</ul>\n";
						}
						echo "</ul>\n";
					}
					?>
				</ul>

				</td>

			</tr>
			</table>

		<?php yourls_do_action( 'post_yourls_info_stats', $keyword ); ?>

		<?php } else {
			echo '<p>' . yourls__( 'No traffic yet. Get some clicks first!' ) . '</p>';
		} ?>
	</div>


	<div id="stat_tab_location" class="tab">
		<h2><?php yourls_e( 'Traffic location' ); ?></h2>

		<?php yourls_do_action( 'pre_yourls_info_location', $keyword ); ?>

		<?php if ( $countries ) { ?>

			<table border="0" cellspacing="2">
			<tr>
				<td valign="top">
					<h3><?php yourls_e( 'Top 5 countries' ); ?></h3>
					<?php yourls_stats_pie( $countries, 5, '340x220', 'stat_tab_location_pie' ); ?>
					<p><a href="" class='details hide-if-no-js' id="more_countries"><?php yourls_e( 'Click for more details' ); ?></a></p>
					<ul id="details_countries" style="display:none" class="no_bullet">
					<?php
					foreach( $countries as $code=>$count ) {
						echo "<li><img src='".yourls_geo_get_flag( $code )."' /> $code (".yourls_geo_countrycode_to_countryname( $code ) . ') : ' . sprintf( yourls_n( '1 hit', '%s hits', $count ), $count ) . "</li>\n";
					}
					?>
					</ul>

				</td>
				<td valign="top">
					<h3><?php yourls_e( 'Overall traffic' ); ?></h3>
					<?php yourls_stats_countries_map( $countries, 'stat_tab_location_map' ); ?>
				</td>
			</tr>
			</table>

		<?php yourls_do_action( 'post_yourls_info_location', $keyword ); ?>

		<?php } else {
			echo '<p>' . yourls__( 'No country data.' ) . '</p>';
		} ?>
	</div>


	<div id="stat_tab_sources" class="tab">
		<h2><?php yourls_e( 'Traffic sources' ); ?></h2>

		<?php yourls_do_action( 'pre_yourls_info_sources', $keyword ); ?>

		<?php if ( $referrers ) { ?>

			<table border="0" cellspacing="2">
			<tr>
				<td valign="top">
					<h3><?php yourls_e( 'Referrer shares' ); ?></h3>
					<?php
					if ( $number_of_sites > 1 )
						$referrer_sort[ yourls__( 'Others' ) ] = count( $referrers );
					yourls_stats_pie( $referrer_sort, 5, '440x220', 'stat_tab_source_ref' );
					unset( $referrer_sort[yourls__('Others')] );
					?>
					<h3><?php yourls_e( 'Referrers' ); ?></h3>
					<ul class="no_bullet">
						<?php
						$i = 0;
						foreach( $referrer_sort as $site => $count ) {
							$i++;
							$favicon = yourls_get_favicon_url( $site );
							echo "<li class='sites_list'><img src='$favicon' class='fix_images'/> $site: <strong>$count</strong> <a href='' class='details hide-if-no-js' id='more_url$i'>" . yourls__( '(details)' ) . "</a></li>\n";
							echo "<ul id='details_url$i' style='display:none'>";
							foreach( $referrers[$site] as $url => $count ) {
								echo "<li>"; yourls_html_link($url); echo ": <strong>$count</strong></li>\n";
							}
							echo "</ul>\n";
							unset( $referrers[$site] );
						}
						// Any referrer left? Group in "various"
						if ( $referrers ) {
							echo "<li id='sites_various'>" . yourls__( 'Various:' ) . " <strong>". count( $referrers ). "</strong> <a href='' class='details hide-if-no-js' id='more_various'>" . yourls__( '(details)' ) . "</a></li>\n";
							echo "<ul id='details_various' style='display:none'>";
							foreach( $referrers as $url ) {
								echo "<li>"; yourls_html_link(key($url)); echo ": 1</li>\n";
							}
							echo "</ul>\n";
						}
						?>

					</ul>

				</td>

				<td valign="top">
					<h3><?php yourls_e( 'Direct vs Referrer Traffic' ); ?></h3>
					<?php
					yourls_stats_pie( array( yourls__( 'Direct' ) => $direct, yourls__( 'Referrers' ) => $notdirect ), 5, '440x220', 'stat_tab_source_direct' );
					?>
					<p><?php yourls_e( 'Direct traffic:' ); echo ' ' . sprintf( yourls_n( '<strong>%s</strong> hit', '<strong>%s</strong> hits', $direct ), $direct ); ?> </p>
					<p><?php yourls_e( 'Referrer traffic:' ); echo ' ' . sprintf( yourls_n( '<strong>%s</strong> hit', '<strong>%s</strong> hits', $notdirect ), $notdirect ); ?> </p>

				</td>
			</tr>
			</table>

		<?php yourls_do_action( 'post_yourls_info_sources', $keyword ); ?>

		<?php } else {
			echo '<p>' . yourls__( 'No referrer data.' ) . '</p>';
		} ?>

	</div>

<?php } // endif do log redirect ?>


	<div id="stat_tab_share" class="tab">
		<h2><?php yourls_e( 'Share' ); ?></h2>

		<?php yourls_share_box( $longurl, yourls_link($keyword), $title, '', '<h3>' . yourls__( 'Short link' ) . '</h3>', '<h3>' . yourls__( 'Quick Share' ) . '</h3>'); ?>

	</div>

</div>


<?php yourls_html_footer(); ?>
