<?php

// Echoes an image tag of Google Charts map from sorted array of 'country_code' => 'number of visits' (sort by DESC)
function yourls_stats_countries_map( $countries ) {
	arsort( $countries );
	$map = array(
		'cht' => 't',
		'chs' => '440x220',
		'chtm'=> 'world',
		'chco'=> 'FFFFFF,9090AA,202040',
		'chld'=> join('' , array_keys( $countries ) ),
		'chd' => 't:'. join(',' ,  $countries ),
		'chf' => 'bg,s,EAF7FE'
	);
	$map_src = 'http://chart.apis.google.com/chart?' . http_build_query( $map );
	echo "<img src='$map_src' witdh='440' height='220' border='0' />";
}

// Echoes an image tag of Google Charts pie from sorted array of 'country_code' => 'number of visits' (sort by DESC). Optional $limit = (integer) limit list of X first countries, sorted by most visits
function yourls_stats_countries_pie( $countries, $limit = 10 ) {
	if ( count( $countries ) > $limit ) {
		$i= 0;
		$trim_countries = array('Others' => 0);
		foreach( $countries as $country_code=>$visits ) {
			$i++;
			if( $i <= $limit ) {
				$trim_countries[$country_code] = $visits;
			} else {
				$trim_countries['Others'] += $visits;
			}
		}
		$countries = $trim_countries;
	}
	$pie = array(
		'cht' => 'p',
		'chs' => '340x220',
		'chd' => 't:'.( join(',' ,  $countries ) ),
		'chco'=> '202040,9090AA',
		'chl' => join('|' , array_keys( $countries ) )
	);
	$pie_src = 'http://chart.apis.google.com/chart?' . http_build_query( $pie );
	echo "<img src='$pie_src' witdh='440' height='220' border='0' />";
}

// Echoes an image tag of Google Charts bar graph from list of chronologically sorted array of [year][month][day] => 'number of clicks'
function yourls_stats_clicks_bar( $dates ) {
	/* Say we have an array like:
	$dates = array (
		2009 => array (
			'08' => array (
				29 => 15,
				30 => 5,
				),
		    '09' => array (
				'02' => 3,
				'03' => 5,
				'04' => 2,
				'05' => 99,
				),
			),
		)
	*/

	// Get first & last years from our range. In our example: 2009 & 2009
	$first_year = key( $dates );
	$last_year  = end( array_keys($dates) );
	reset( $dates );

	// Get first & last months from our range. In our example: 08 & 09
	$first_month = key( $dates[$first_year] );
	$last_month  = end( array_keys($dates[$last_year]) );
	reset( $dates );
	
	// Get first & last days from our range. In our example: 29 & 05
	$first_day = key( $dates[$first_year][$first_month] );
	$last_day  = end( array_keys($dates[$last_year][$last_month]) );

	// Now build a list of all years (2009), month (08 & 09) and days (all from 2009-08-29 to 2009-09-05)
	$list_of_years = array();
	$list_of_months = array();
	$list_of_days = array();
	for ( $year = $first_year; $year <= $last_year; $year++ ) {
		$_year = sprintf('%04d', $year);
		$list_of_years[$_year] = $_year;
		$current_first_month = ( $year == $first_year ? $first_month : '01' );
		$current_last_month  = ( $year == $last_year ? $last_month : '12' );
		for ( $month = $current_first_month; $month <= $current_last_month; $month++ ) {
			$_month = sprintf('%02d', $month);
			$list_of_months[$_month] = $_month;
			$current_first_day = ( $year == $first_year && $month == $first_month ? $first_day : '01' );
			$current_last_day  = ( $year == $last_year && $month == $last_month ? $last_day : yourls_days_in_month($month, $year) );
			for ( $day = $current_first_day; $day <= $current_last_day; $day++ ) {
				$day = sprintf('%02d', $day);
				$list_of_days[] = isset( $dates[$_year][$_month][$day] ) ? $dates[$_year][$_month][$day] : 0;
			}
		}
	}

	// Make the chart
	$label_years = $first_year != $last_year ? join('|', $list_of_years ) : $first_year.'|'.$last_year;
	$label_months = count( $list_of_months ) > 1 ? join('|', $list_of_months) : $first_month.'|'.$first_year;
	$max = max( $list_of_days );
	$label_clicks = '0|'.intval( $max / 4 ).'|'.intval( $max / 2 ).'|'.intval( $max / 1.5 ).'|'.$max;
	$line = array(
		'cht' => 'lc',
		'chs' => '1000x300',
		'chs' => '440x220',
		'chxt'=> 'x,x,y',
		'chd' => 't:'.( join(',' ,  $list_of_days ) ),
		'chxl'=> '0:|'. $label_years .'|1:|'. $label_months .'|2:|'. $label_clicks
	);
	$line_src = 'http://chart.apis.google.com/chart?' . http_build_query( $line );
	echo "<img src='$line_src' />";
}

// Return the number of days in a month. From php.net, used if PHP built without calendar functions
function yourls_days_in_month($month, $year) {
	// calculate number of days in a month
	return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
}

// Get max value from date array of [year][month][day] = 'hits'
function yourls_stats_get_best_day( $dates ) {
	$max = 0; $day = 0;
	foreach( $dates as $year=>$months ) {
		foreach( $months as $month=>$days ) {
			foreach( $days as $day=>$visits ) {
				if( $visits > $max ) {
					$max = intval($visits);
					$day = "$year-$month-$day";
				}
			}
		}
	}

	return array( 'day' => $day, 'max' => $max );

}

