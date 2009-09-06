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
foreach( $hits as $hit ) {
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

<h2>Informations</h2>

<h3>Short URL: <?php yourls_html_link( YOURLS_SITE."/$keyword" ); ?></h3>
<p>Long URL: <?php yourls_html_link( yourls_get_keyword_longurl( $keyword ) ); ?></p>
<p>Number of hits since <?php echo date("F j, Y, g:i a", strtotime($timestamp)); ?>: <strong><?php echo $clicks; ?></strong> hit<?php echo ($clicks > 1 ? 's' : ''); ?></p>

<h2>Traffic statistics</h2>

<p><?php yourls_stats_clicks_bar( $dates ); ?></p>

<?php $best = yourls_stats_get_best_day( $dates ); ?>
<p>Best day: <strong><?php echo $best['max'];?></strong> hit<?php echo ($best['max'] > 1 ? 's' : ''); ?> on <?php echo date("F j, Y", strtotime($best['day'])); ?>. 
<a href="#" class='details' onclick="$('#details_clicks').toggle(); return false">Click for more details</a></p>
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

<h2>Traffic location</h2>

<table border="0" cellspacing="2">
<tr>
	<td valign="top">
		<p>Top 5 countries. <a href="#" class='details' onclick="$('#details_countries').toggle(); return false">Click for more details</a></p></p>
		<?php yourls_stats_countries_pie( $countries, 5 ); ?>
		<ul id="details_countries" style="display:none">
		<?php
		foreach( $countries as $code=>$count ) {
			echo "<li><img src='".yourls_geo_get_flag( $code )."' /> $code (".yourls_geo_countrycode_to_countryname( $code ).") : $count ".yourls_plural('hit', $count)."</li>\n";
		}		
		?>
		</ul>

	</td>
	<td valign="top">
		<p>Overall traffic</p>
		<?php yourls_stats_countries_map( $countries ); ?>
	</td>
</tr>
</table>

<h2>Traffic sources</h2>

<ul>
	<li>Direct: <?php echo $direct; ?></li>
	<?php
	$i = 0;
	foreach( $referrer_sort as $site => $count ) {
		$i++;
		echo "<li>$site: $count. <a href='#' class='details' onclick='javascript:$(\"#details_url$i\").toggle(); return false;'>Details</a></li>\n";
		echo "<ul id='details_url$i' style='display:none'>";
		foreach( $referrers[$site] as $url => $count ) {
			echo "<li>"; yourls_html_link($url); echo ": $count</li>\n";
		}
		echo "</ul>\n";
		unset( $referrers[$site] );
	}
	echo "<li>Various: ". count( $referrers ). " <a href='#' class='details' onclick='javascript:$(\"#details_various\").toggle(); return false;'>Details</a></li>\n";
	echo "<ul id='details_various' style='display:none'>";
	foreach( $referrers as $url ) {
		echo "<li>"; yourls_html_link(key($url)); echo ": 1</li>\n";	
	}
	echo "</ul>\n"
	?>
	
</ul>



<?php yourls_html_footer(); ?>