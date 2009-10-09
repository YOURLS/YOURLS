<?php
// TODO: make things cleaner. This file is an awful HTML/PHP soup.

// Require Files
require_once( dirname(__FILE__).'/includes/load-yourls.php' );
require_once( dirname(__FILE__).'/includes/functions-infos.php' );
yourls_maybe_require_auth();

if ( !isset( $_GET['id'] ) )
	yourls_redirect( YOURLS_SITE, 307 );
	
$aggregate = false;
if ( isset( $_GET['all'] ) && $_GET['all'] == 1 && yourls_allow_duplicate_longurls() )
	$aggregate = true;

// Get basic infos for this shortened URL
$keyword = yourls_sanitize_string( $_GET['id'] );
$longurl = yourls_get_keyword_longurl( $keyword );
$clicks = yourls_get_keyword_clicks( $keyword );
$timestamp = yourls_get_keyword_timestamp( $keyword );

if ( $longurl === false )
	yourls_redirect( YOURLS_SITE, 307 );

if( yourls_do_log_redirect() ) {

	// Duplicate keywords, if applicable
	$keyword_list = yourls_get_duplicate_keywords( $longurl );
		
	// Fetch all information from the table log
	$table = YOURLS_DB_TABLE_LOG;

	if( $aggregate ) {
		$keywords = join( "', '", $keyword_list );
		// Fetch information for all keywords pointing to $longurl
		$hits = $ydb->get_results( "SELECT `shorturl`, `click_time`, `referrer`, `user_agent`, `country_code` FROM `$table` WHERE `shorturl` IN ( '$keywords' );" );
	} else {
		// Fetch information for current keyword only
		$hits = $ydb->get_results( "SELECT `click_time`, `referrer`, `user_agent`, `country_code` FROM `$table` WHERE `shorturl` = '$keyword';" );
	}

	$referrers = array();
	$direct = $notdirect = 0;
	$countries = array();
	$dates = array();
	$list_of_days = array();
	$list_of_months = array();
	$list_of_years = array();
	$last_24h = array();

	// Loop through all results and build list of referrers, countries and hits per day
	foreach( (array)$hits as $hit ) {
		extract( (array)$hit );

		if ( isset( $country_code ) && $country_code ) {
			if( !array_key_exists( $country_code, $countries ) )
				$countries[$country_code] = 0;
			$countries[$country_code]++;
		}
		
		if( isset( $referrer ) ) {
			if ( $referrer == 'direct' ) {
				$direct++;
			} else {
				$notdirect++;
				$host = yourls_get_domain( $referrer );
				if( !array_key_exists( $host, $referrers ) )
					$referrers[$host] = array( );
				if( !array_key_exists( $referrer, $referrers[$host] ) )
					$referrers[$host][$referrer] = 0;
				$referrers[$host][$referrer]++;
			}
		}
		
		if( isset( $click_time ) ) {
			$now = intval( date('U') );

			preg_match('/(\d+)-(\d+)-(\d+)\s(\d+):(\d+):(\d+)/', $click_time, $matches);
			list( $temp, $year, $month, $day, $hour, $min, $sec ) = $matches;
			unset( $matches );
			
			// Build array of $dates[$year][$month][$day] = number of clicks
			if( !array_key_exists( $year, $dates ) )
				$dates[$year] = array();
			if( !array_key_exists( $month, $dates[$year] ) )
				$dates[$year][$month] = array();
			if( !array_key_exists( $day, $dates[$year][$month] ) )
				$dates[$year][$month][$day] = 0;
			$dates[$year][$month][$day]++;
			
			// Build array of last 24 hours $last_24h[$hour] = number of click
			$then = strtotime( $click_time);
			if( ( $now >= $then ) && ( ( $now - $then ) < ( 24 * 60 * 60 ) ) ) {
				$year = sprintf( "%02d", substr( $year, -1, 2 ) ); // 2009 -> 09
				$diff = $now - strtotime( $click_time);
				if( !array_key_exists( "$year-$month-$day-$hour", $last_24h ) )
					$last_24h["$year-$month-$day-$hour"] = 0;
				$last_24h["$year-$month-$day-$hour"]++;
			}
		}
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
	if( $dates ) {
		extract( yourls_build_list_of_days( $dates ) );

		// If the $last_24h doesn't have all the hours, insert missing hours with value 0
		for ($i = 23; $i >= 0; $i--) {
			$h = date('y-m-d-H', $now - ($i * 60 * 60) );
			if( !array_key_exists( $h, $last_24h ) ) {
				$last_24h[$h] = 0;
			}
		}
		ksort( $last_24h );
	}

	// Sort countries, most frequent first
	if ( $countries )
		arsort( $countries );

	// Sort referrers. $referrer_sort is a array of most frequent domains
	arsort( $referrers );
	$referrer_sort = array();
	$number_of_sites = count( array_keys( $referrers ) );
	foreach( $referrers as $site => $urls ) {
		if( count($urls) > 1 || $number_of_sites == 1 )
			$referrer_sort[$site] = array_sum( $urls );
	}
	arsort($referrer_sort);


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
	//echo "countries: "; print_r( $countries );

	die();
	/**/

}

yourls_html_head( 'infos' );
?>

<h1>
	<a href="<?php echo YOURLS_SITE; ?>/admin/index.php" title="YOURLS"><span>YOURLS</span>: <span>Y</span>our <span>O</span>wn <span>URL</span> <span>S</span>hortener<br/>
	<img src="<?php echo YOURLS_SITE; ?>/images/yourls-logo.png" alt="YOURLS" title="YOURLS" style="border: 0px;" /></a>
</h1>
<?php if ( yourls_is_private() ) { ?>
<p>Your are logged in as: <strong><?php echo YOURLS_USER; ?></strong>.</p>
<?php } ?>

<h2 id="informations">Informations</h2>

<h3>Short URL: <img src="<?php echo YOURLS_SITE; ?>/images/favicon.gif"/>
<?php if( $aggregate ) {
	$i = 0;
	foreach( $keyword_list as $k ) {
		$i++;
		if ( $i == 1 ) {
			yourls_html_link( YOURLS_SITE."/$k" );
		} else {
			yourls_html_link( YOURLS_SITE."/$k", "/$k" );
		}
		if ( $i < count( $keyword_list ) )
			echo ' + ';
	}
} else {
	yourls_html_link( YOURLS_SITE."/$keyword" );
	if( count( $keyword_list ) > 1 )
		echo ' <a href="'. YOURLS_SITE .'/'.$keyword.'+all" title="Aggregate stats for duplicate short URLs"><img src="' . YOURLS_SITE . '/images/chart_bar_add.png" border="0" /></a>';
} ?></h3>
<h3 id="longurl">Long URL: <img class="fix_images" src="<?php echo yourls_get_domain( $longurl, true );?>/favicon.ico"/> <?php yourls_html_link( $longurl, '', 'longurl' ); ?></h3>

<div id="tabs">
	<div class="wrap_unfloat">
	<ul id="headers" class="toggle_display stat_tab">
		<?php if( yourls_do_log_redirect() ) { ?>
		<li class="selected"><a href="#stat_tab_stats"><h2>Traffic statistics</h2></a></li>
		<li><a href="#stat_tab_location"><h2>Traffic location</h2></a></li>
		<li><a href="#stat_tab_sources"><h2>Traffic sources</h2></a></li>
		<?php } ?>
		<li><a href="#stat_tab_share"><h2>Share</h2></a></li>
	</ul>
	</div>

			
<?php if( yourls_do_log_redirect() ) { ?>
	<div id="stat_tab_stats" class="tab">
		<h2>Traffic statistics</h2>
		
		<?php if ( $list_of_days ) { ?>
		
			<?php
			$graphs = array(
				'24' => 'Last 24 hours',
				'7'  => 'Last 7 days',
				'30' => 'Last 30 days',
				'all'=> 'All time'
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
					echo "<li><a href='#stat_line_24'>Last 24 hours</a>";
				if( $do_7 == true )
					echo "<li><a href='#stat_line_7'>Last 7 days</a>";
				if( $do_30 == true )
					echo "<li><a href='#stat_line_30'>Last 30 days</a>";
				if( $do_all == true )
					echo "<li><a href='#stat_line_all'>All time</a>";
				?>				
				</ul>
				<?php
				// Generate, and display if applicable, each needed graph
				foreach( $graphs as $graph => $title ) {
					if( ${'do_'.$graph} == true ) {
						$display = ( ${'display_'.$graph} === true ? 'display:block' : 'display:none' );
						echo "<div id='stat_line_$graph' class='stats_line line' style='$display'>";
						$labels_1 = $labels_2 = array();
						switch( $graph ) {
							case '24':
								// each key of $last_24h is of type "yy-mm-dd-hh"
								$first_key = current( array_keys( $last_24h ) );
								$last_key = end( array_keys( $last_24h ) );
								// Get "dd/mm" of first and last key
								$first_label = preg_replace( '/\d\d-(\d\d)-(\d\d)-\d\d/', '$2/$1', $first_key );
								$last_label = preg_replace( '/\d\d-(\d\d)-(\d\d)-\d\d/', '$2/$1', $last_key );
								$labels_2 = array( $first_label, $last_label);
								// Get hh of each key
								foreach( $last_24h as $k=>$v ) {
									$labels_1[] = end( explode( '-', $k ) ); // 'hh'
								}
								
								echo "<h3>Number of hits : $title</h3>";
								yourls_stats_line( $last_24h, $labels_1, $labels_2 );
								break;

							case '7':
							case '30':
								// each key of $list_of_days is of type "yyyy-mm-dd"
								$slice = array_slice( $list_of_days, intval( $graph ) * -1 );
								foreach( $slice as $k=>$v ) {
									// get "dd"
									$labels_1[] = preg_replace( '/\d\d\d\d-\d\d-(\d\d)/', '$1', $k );
								}
								$first_key = current( array_keys( $slice ) );
								$last_key = end( array_keys( $slice ) );
								// Get "dd/mm" of first and last key
								$first_label = preg_replace( '/\d\d\d\d-(\d\d)-(\d\d)/', '$2/$1', $first_key );
								$last_label = preg_replace( '/\d\d\d\d-(\d\d)-(\d\d)/', '$2/$1', $last_key );
								$labels_2 = array( $first_label, $last_label);
								
								echo "<h3>Number of hits : $title</h3>";
								yourls_stats_line( $slice, $labels_1, $labels_2 );
								unset( $slice );
								break;

							case 'all':
								// get "yy-mm"
								foreach( $list_of_days as $k=>$v ) {
									$labels_1[] = preg_replace( '/\d\d(\d\d)-(\d\d)-\d\d/', '$1-$2', $k );
								}
								// take out duplicates
								$labels_1 = array_unique( $labels_1 );
								// now get "mm" only so we have all different month
								foreach( $labels_1 as $k=>$v ) {
									$labels_1[$k] = preg_replace( '/\d\d-(\d\d)/', '$1', $v );
								}
								
								echo "<h3>Number of hits : $title</h3>";
								$labels_1 = yourls_array_granularity( $labels_1, 30, false );
								$labels_2 = yourls_array_granularity( $list_of_years, 30, false );
								yourls_stats_line( $list_of_days, $labels_1, $labels_2 );
								break;
						}
						echo "</div>\n";
					}			
				} ?>
				
				</td>
				<td valign="top">
				<h3>Historical click count</h3>
				<?php
				$ago = round( (date('U') - strtotime($timestamp)) / (24* 60 * 60 ) );
				if( $ago <= 1 ) {
					$daysago = '';
				} else {
					$daysago = '(about '.$ago .' '.yourls_plural( ' day', $ago ).' ago)';
				}
				?>
				<p>Short URL created on <?php echo date("F j, Y @ g:i a", strtotime($timestamp)); ?> <?php echo $daysago; ?></p>
				<div class="wrap_unfloat">
					<ul class="no_bullet toggle_display stat_line" id="historical_clicks">
					<?php
					foreach( $graphs as $graph => $title ) {
						if ( ${'do_'.$graph} ) {
							$link = "<a href='#stat_line_$graph'>$title</a>";
						} else {
							$link = $title;
						}
						$stat = '';
						if( ${'do_'.$graph} ) {
							switch( $graph ) {
								case '7':
								case '30':
									$stat = round( ( ${'hits_'.$graph} / intval( $graph ) ) * 100 ) / 100 . ' per day';
									break;
								case '24':
									$stat = round( ( ${'hits_'.$graph} / 24 ) * 100 ) / 100 . ' per hour';
									break;
								case 'all':
									if( $ago > 0 )
										$stat = round( ( ${'hits_'.$graph} / $ago ) * 100 ) / 100 . ' per day';
							}
						}
						$hits = yourls_plural( 'hit', ${'hits_'.$graph} );
						echo "<li><span class='historical_link'>$link</span> <span class='historical_count'>${'hits_'.$graph} $hits</span> $stat</li>\n";
					}
					?>
					</ul>
				</div>
		
				<h3>Best day</h3>
				<?php $best = yourls_stats_get_best_day( $list_of_days ); ?>
				<p><strong><?php echo $best['max'];?></strong> <?php echo yourls_plural( 'hit', $best['max'] ); ?> on <?php echo date("F j, Y", strtotime($best['day'])); ?>. 
				<a href="" class='details' id="more_clicks">Click for more details</a></p>
				<ul id="details_clicks" style="display:none">
					<?php
					foreach( $dates as $year=>$months ) {
						if( count( $list_of_years ) > 1 ) {
							$li = "<a href='' class='details' id='more_year$year'>Year $year</a>";
							$display = 'none';
						} else {
							$li = "Year $year";
							$display = 'block';
						}
						echo "<li>$li";
						echo "<ul style='display:$display' id='details_year$year'>";
						foreach( $months as $month=>$days ) {
							$monthname = date("F", mktime(0, 0, 0, $month,1));
							if( count( $list_of_months ) > 1 ) {
								$li = "<a href='' class='details' id='more_month$year$month'>$monthname</a>";
								$display = 'none';
							} else {
								$li = "$monthname";
								$display = 'block';
							}
							echo "<li>$li";
							echo "<ul style='display:$display' id='details_month$year$month'>";
								foreach( $days as $day=>$hits ) {
									$class = ( $hits == $best['max'] ? 'class="bestday"' : '' );
									echo "<li $class>$day: $hits". yourls_plural( ' hit', $hits) ."</li>\n";
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


		
		<?php } else {
			echo "<p>No traffic yet. Get some clicks first!</p>";
		} ?>
	</div>


	<div id="stat_tab_location" class="tab">
		<h2>Traffic location</h2>
		
		<?php if ( $countries ) { ?>
			
			<table border="0" cellspacing="2">
			<tr>
				<td valign="top">
					<h3>Top 5 countries</h3>
					<?php yourls_stats_pie( $countries, 5 ); ?>
					<p><a href="" class='details' id="more_countries">Click for more details</a></p>
					<ul id="details_countries" style="display:none" class="no_bullet">
					<?php
					foreach( $countries as $code=>$count ) {
						echo "<li><img src='".yourls_geo_get_flag( $code )."' /> $code (".yourls_geo_countrycode_to_countryname( $code ).") : $count ".yourls_plural('hit', $count)."</li>\n";
					}		
					?>
					</ul>

				</td>
				<td valign="top">
					<h3>Overall traffic</h3>
					<?php yourls_stats_countries_map( $countries ); ?>
				</td>
			</tr>
			</table>
		
		<?php } else {
			echo "<p>No country data.</p>";
		} ?>
	</div>
				
				
	<div id="stat_tab_sources" class="tab">
		<h2>Traffic Sources</h2>
		
		<?php if ( $referrers ) { ?>
			
			<table border="0" cellspacing="2">
			<tr>
				<td valign="top">
					<h3>Referrer shares</h3>
					<?php
					if ( $number_of_sites > 1 )
						$referrer_sort['Others'] = count( $referrers );
					yourls_stats_pie( $referrer_sort, 5, '440x220', '902020,FF6060' );
					unset( $referrer_sort['Others'] );
					?>
					<h3>Referrers</h3>
					<ul class="no_bullet">
						<?php
						$i = 0;
						foreach( $referrer_sort as $site => $count ) {
							$i++;
							echo "<li class='sites_list'><img src='http://$site/favicon.ico' class='fix_images'/> $site: <strong>$count</strong> <a href='' class='details' id='more_url$i'>(details)</a></li>\n";
							echo "<ul id='details_url$i' style='display:none'>";
							foreach( $referrers[$site] as $url => $count ) {
								echo "<li>"; yourls_html_link($url); echo ": <strong>$count</strong></li>\n";
							}
							echo "</ul>\n";
							unset( $referrers[$site] );
						}
						// Any referrer left? Group in "various"
						if ( $referrers ) {
							echo "<li id='sites_various'>Various: <strong>". count( $referrers ). "</strong> <a href='' class='details' id='more_various'>(details)</a></li>\n";
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
					<h3>Direct vs Referrer Traffic</h3>
					<?php
					yourls_stats_pie( array('Direct'=>$direct, 'Referrers'=> $notdirect), 5, '440x220', '902020,FF6060' );
					?>
					<p>Direct traffic: <strong><?php echo $direct; ?></strong> <?php echo yourls_plural( 'hit', $direct ); ?> </p>
					<p>Referrer traffic: <strong><?php echo $notdirect; ?></strong> <?php echo yourls_plural( 'hit', $notdirect ); ?> </p>

				</td>
			</tr>
			</table>

		<?php } else {
			echo "<p>No referrer data.</p>";
		} ?>
			
	</div>

<?php } // endif do log redirect ?>


	<div id="stat_tab_share" class="tab">
		<h2>Share</h2>
		
		<?php yourls_share_box( $longurl, YOURLS_SITE.'/'.$keyword, '', '', '<h3>Short link</h3>', '<h3>Quick Share</h3>'); ?>

	</div>
	
</div>


<?php yourls_html_footer(); ?>