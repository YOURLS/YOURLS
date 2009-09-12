<?php
// Require Files
require_once( dirname(__FILE__).'/includes/config.php' );
require_once( dirname(__FILE__).'/includes/functions-infos.php' );
yourls_maybe_require_auth();

if ( !isset( $_GET['id'] ) )
	yourls_redirect( YOURLS_SITE, 307 );

// Get basic infos for this shortened URL
$keyword = yourls_sanitize_string( $_GET['id'] );
$longurl = yourls_get_keyword_longurl( $keyword );
$clicks = yourls_get_keyword_clicks( $keyword );
$timestamp = yourls_get_keyword_timestamp( $keyword );
if ( $longurl === false )
	yourls_redirect( YOURLS_SITE, 307 );
	
// Fetch all information from the table log
$table = YOURLS_DB_TABLE_LOG;
$hits = $ydb->get_results( "SELECT `click_time`, `referrer`, `user_agent`, `country_code` FROM `$table` WHERE `shorturl` = '$keyword';" );

$referrers = array();
$direct = 0;
$countries = array();
$dates = array();

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
			$parse = parse_url( $referrer );
			$host = $parse['host'];
			unset( $parse );
			if( !array_key_exists( $host, $referrers ) )
				$referrers[$host] = array( );
			if( !array_key_exists( $referrer, $referrers[$host] ) )
				$referrers[$host][$referrer] = 0;
			$referrers[$host][$referrer]++;
		}
	}
	
	if( isset( $click_time ) ) {
		preg_match('/(\d+)-(\d+)-(\d+)\s(\d+):(\d+):(\d+)/', $click_time, $matches);
		list( $temp, $year, $month, $day ) = $matches;
		unset( $matches );
		if( !array_key_exists( $year, $dates ) )
			$dates[$year] = array();
		if( !array_key_exists( $month, $dates[$year] ) )
			$dates[$year][$month] = array();
		if( !array_key_exists( $day, $dates[$year][$month] ) )
			$dates[$year][$month][$day] = 0;
		$dates[$year][$month][$day]++;
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

// Sort countries, most frequent first
if ( $countries )
	arsort( $countries );

// Sort referrers. $referrer_sort is a array of most frequent domains
arsort( $referrers );
$referrer_sort = array();
foreach( $referrers as $site => $urls ) {
	if( count($urls) > 1 )
		$referrer_sort[$site] = array_sum( $urls );
}
arsort($referrer_sort);

/**
echo "<pre>";
echo "referrers: "; print_r( $referrers );
echo "referrer sort: "; print_r( $referrer_sort );
echo "dates: "; print_r( $dates );
echo "countries: "; print_r( $countries );
die();
/**/


yourls_html_head( 'infos' );
?>

<h1>
	<a href="<?php echo YOURLS_SITE; ?>/admin/index.php" title="YOURLS"><span>YOURLS</span>: <span>Y</span>our <span>O</span>wn <span>URL</span> <span>S</span>hortener<br/>
	<img src="<?php echo YOURLS_SITE; ?>/images/yourls-logo.png" alt="YOURLS" title="YOURLS" style="border: 0px;" /></a>
</h1>
<?php if ( yourls_is_private() ) { ?>
<p>Your are logged in as: <strong><?php echo YOURLS_USER; ?></strong>. <a href="?mode=logout" title="Logout">Logout</a></p>
<?php } ?>

<h2 id="informations">Informations</h2>

<h3>Short URL: <?php yourls_html_link( YOURLS_SITE."/$keyword" ); ?></h3>
<p>Long URL: <?php yourls_html_link( yourls_get_keyword_longurl( $keyword ) ); ?></p>
<p>Number of hits since <?php echo date("F j, Y, g:i a", strtotime($timestamp)); ?>: <strong><?php echo $clicks; ?></strong> hit<?php echo ($clicks > 1 ? 's' : ''); ?></p>

<div id="tabs">
	<ul id="headers">
		<li class="selected"><a href="#stats"><h2>Traffic statistics</h2></a></li>
		<li><a href="#location"><h2>Traffic location</h2></a></li>
		<li><a href="#sources"><h2>Traffic sources</h2></a></li>
		<li><a href="#share"><h2>Share</h2></a></li>
	</ul>

			
	<div id="stats" class="tab first_tab">
		<h2>Traffic statistics</h2>
		
		<?php if ( $dates ) { ?>
		
			<h3>Number of hits per day</h3>

			<p><?php yourls_stats_clicks_line( $dates ); ?></p>

			<?php $best = yourls_stats_get_best_day( $dates ); ?>
			
			<h3>Best day</h3>
			<p><strong><?php echo $best['max'];?></strong> hit<?php echo ($best['max'] > 1 ? 's' : ''); ?> on <?php echo date("F j, Y", strtotime($best['day'])); ?>. 
			<a href="" class='details' id="more_clicks">Click for more details</a></p>
			<ul id="details_clicks" style="display:none">
				<?php
				foreach( $dates as $year=>$months ) {
					foreach( $months as $month=>$days) {
						foreach( $days as $day=>$visits ) {
							echo '<li>'.date("F j, Y", strtotime("$year-$month-$day"))." : $visits ".yourls_plural( 'hit', $visits )."</li>\n";
						}
					}
				}
				?>
			</ul>
		
		<?php } else {
			echo "<p>No traffic yet. Get some clicks first!</p>";
		} ?>
	</div>


	<div id="location" class="tab">
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
			echo "<p>No countrie data. Maybe the geolocation module is not installed, or no traffic yet.</p>";
		} ?>
	</div>
				
				
	<div id="sources" class="tab">
		<h2>Traffic Sources</h2>
		
		<?php if ( $referrers ) { ?>
			
			<table border="0" cellspacing="2">
			<tr>
				<td valign="top">
					<h3>Referrer shares</h3>
					<?php
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
							echo "<li class='sites_list'><img src='http://$site/favicon.ico'/> $site: <strong>$count</strong> <a href='' class='details' id='more_url$i'>(details)</a></li>\n";
							echo "<ul id='details_url$i' style='display:none'>";
							foreach( $referrers[$site] as $url => $count ) {
								echo "<li>"; yourls_html_link($url); echo ": <strong>$count</strong></li>\n";
							}
							echo "</ul>\n";
							unset( $referrers[$site] );
						}
						echo "<li id='sites_various'>Various: <strong>". count( $referrers ). "</strong> <a href='' class='details' id='more_various'>(details)</a></li>\n";
						echo "<ul id='details_various' style='display:none'>";
						foreach( $referrers as $url ) {
							echo "<li>"; yourls_html_link(key($url)); echo ": 1</li>\n";	
						}
						echo "</ul>\n"
						?>
						
					</ul>
				
				</td>
				
				<td valign="top">
					<h3>Direct vs Referrer Traffic</h3>
					<?php
					$ref_traffic = count($referrer_sort) + count($referrers);
					yourls_stats_pie( array('Direct'=>$direct, 'Referrers'=> $ref_traffic), 5, '440x220', '902020,FF6060' );
					?>
					<p>Direct traffic: <strong><?php echo $direct; ?></strong> <?php echo yourls_plural( 'hit', $direct ); ?> </p>
					<p>Referrer traffic: <strong><?php echo $ref_traffic; ?></strong> <?php echo yourls_plural( 'hit', $ref_traffic ); ?> </p>

				</td>
			</tr>
			</table>

		<?php } else {
			echo "<p>No referrer data. Get some clicks first!</p>";
		} ?>
			
	</div>

	<div id="share" class="tab">
		<h2>Share</h2>
		
		<?php yourls_share_box( $longurl, YOURLS_SITE.'/'.$keyword, '', '', '<h3>Short link</h3>', '<h3>Quick Share</h3>'); ?>

	</div>
	
</div>


<?php yourls_html_footer(); ?>