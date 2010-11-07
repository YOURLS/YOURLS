<?php

// Echoes an image tag of Google Charts map from sorted array of 'country_code' => 'number of visits' (sort by DESC)
function yourls_stats_countries_map( $countries ) {
	yourls_do_action( 'stats_countries_map' );
	
	// Echo static map. Will be hidden if JS
	$map = array(
		'cht' => 't',
		'chs' => '440x220',
		'chtm'=> 'world',
		'chco'=> 'FFFFFF,88C0EB,2A85B3,1F669C',
		'chld'=> join('' , array_keys( $countries ) ),
		'chd' => 't:'. join(',' ,  $countries ),
		'chf' => 'bg,s,EAF7FE'
	);
	$map_src = 'http://chart.apis.google.com/chart?' . http_build_query( $map );
	echo "<img id='yourls_stat_countries_static' class='hide-if-js' src='$map_src' width='440' height='220' border='0' />";

	// Echo dynamic map. Will be hidden if no JS
	echo <<<MAP
<script type='text/javascript' src='http://www.google.com/jsapi'></script>
<script type='text/javascript'>
google.load('visualization', '1', {'packages': ['geomap']});
google.setOnLoadCallback(drawMap);
function drawMap() {
  var data = new google.visualization.DataTable();
MAP;
	echo '
	data.addRows('.count( $countries ).');
	';
	echo "
	data.addColumn('string', 'Country');
	data.addColumn('number', 'Hits');
	";
	$i = 0;
	foreach( $countries as $c => $v ) {
		echo "
		  data.setValue($i, 0, '$c');
		  data.setValue($i, 1, $v);
		";
		$i++;
	}

	echo <<<MAP
  var options = {};
  options['dataMode'] = 'regions';
  options['width'] = '550px';
  options['height'] = '340px';
  options['colors'] = [0x88C0EB,0x2A85B3,0x1F669C];
  var container = document.getElementById('yourls_stat_countries');
  var geomap = new google.visualization.GeoMap(container);
  geomap.draw(data, options);
};
</script>
<div id="yourls_stat_countries"></div>
MAP;

}

// Echoes an image tag of Google Charts pie from sorted array of 'data' => 'value' (sort by DESC). Optional $limit = (integer) limit list of X first countries, sorted by most visits
function yourls_stats_pie( $data, $limit = 10, $size = '340x220', $colors = 'C7E7FF,1F669C' ) {
	// Trim array: $limit first item + the sum of all others
	if ( count( $data ) > $limit ) {
		$i= 0;
		$trim_data = array('Others' => 0);
		foreach( $data as $item=>$value ) {
			$i++;
			if( $i <= $limit ) {
				$trim_data[$item] = $value;
			} else {
				$trim_data['Others'] += $value;
			}
		}
		$data = $trim_data;
	}
	
	// Scale items
	$_data = yourls_scale_data( $data );
	
	// Hmmm, pie
	$pie = array(
		'cht' => 'p',
		'chs' => $size,
		'chd' => 't:'.( join(',' ,  $_data ) ),
		'chco'=> $colors,
		'chl' => join('|' , array_keys( $data ) )
	);
	$pie_src = 'http://chart.apis.google.com/chart?' . http_build_query( $pie );
	
	list( $size_x, $size_y ) = split( 'x', $size );
	echo "<img src='$pie_src' width='$size_x' height='$size_y' border='0' />";
}

// Build a list of all daily values between d1/m1/y1 to d2/m2/y2.
function yourls_build_list_of_days( $dates ) {
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
	
	if( !$dates )
		return array();

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
				$list_of_days["$_year-$_month-$day"] = isset( $dates[$_year][$_month][$day] ) ? $dates[$_year][$_month][$day] : 0;
			}
		}
	}
	
	return array(
		'list_of_days' => $list_of_days,
		'list_of_months' => $list_of_months,
		'list_of_years' => $list_of_years,
	);
}

// Echoes an image tag of Google Charts line graph from array of values (eg 'number of clicks'). $legend1_list & legend2_list are values used for the 2 x-axis labels
function yourls_stats_line( $values, $legend1_list, $legend2_list ) {

	// If we have only 1 day of data, prepend a fake day with 0 hits for a prettier graph
	if ( count( $values ) == 1 )
		array_unshift( $values, 0 );
		
	$values = yourls_array_granularity( $values, 30 );
	
	// If x-axis labels have only 1 value, double it for a nicer graph
	if( count( $legend1_list ) == 1 )
		$legend1_list[] = current( $legend1_list );
	if( count( $legend2_list ) == 1 )
		$legend2_list[] = current( $legend2_list );

	// Make the chart
	$legend1 = join('|', $legend1_list );
	$legend2 = join('|', $legend2_list );
	$max = max( $values );
	if ( $max >= 4 ) {
		$label_clicks = '0|'.intval( $max / 4 ).'|'.intval( $max / 2 ).'|'.intval( $max / 1.5 ).'|'.$max;
	} else {
		$label_clicks = array();
		for ($i = 0; $i <= $max; $i++) {
			$label_clicks[] = $i;
		}
		$label_clicks = join( '|', $label_clicks );
	}
	$line = array(
		'cht' => 'lc',
		'chs' => '440x220',
		'chxt'=> 'x,x,y',
		'chd' => 't:'.( join(',' ,  $values ) ),
		'chds' => '0,'.$max,
		'chm' => 'B,E3F3FF,0,0,0|o,2a85b3,0,-1,6|o,FFFFFF,0,-1,4',
		'chco' => '2a85b3',
		'chxl'=> '0:|'. $legend1 .'|1:|'. $legend2 .'|2:|'. $label_clicks
	);
	$line_src = 'http://chart.apis.google.com/chart?' . http_build_query( $line );
	echo "<img src='$line_src' />";
}

// Return the number of days in a month. From php.net, used if PHP built without calendar functions
function yourls_days_in_month($month, $year) {
	// calculate number of days in a month
	return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
}

// Get max value from date array of 'year-month-day' = 'hits'
function yourls_stats_get_best_day( $list_of_days ) {
	$max = 0; $day = 0;
	$max = max( $list_of_days );
	foreach( $list_of_days as $k=>$v ) {
		if ( $v == $max )
			return array( 'day' => $k, 'max' => $max );
	}
}

// Return domain of a URL
function yourls_get_domain( $url, $include_scheme = false ) {
	$parse = @parse_url( $url ); // Hiding ugly stuff coming from malformed referrer URLs

	// Get host & scheme. Fall back to path if not found.
	$host = isset( $parse['host'] ) ? $parse['host'] : '';
	$scheme = isset( $parse['scheme'] ) ? $parse['scheme'] : '';
	$path = isset( $parse['path'] ) ? $parse['path'] : '';
	if( !$host )
		$host = $path;	
		
	if ( $include_scheme && $scheme )
		$host = $scheme.'://'.$host;
		
	return $host;
}

// Return favicon URL
function yourls_get_favicon_url( $url ) {
	return 'http://www.google.com/s2/u/0/favicons?domain=' . yourls_get_domain( $url, false );
}

// Scale array of data from 0 to 100 max
function yourls_scale_data( $data ) {
	$max = max( $data );
	if( $max > 100 ) {
		foreach( $data as $k=>$v ) {
			$data[$k] = intval( $v / $max * 100 );
		}
	}
	return $data;
}

// Tweak granularity of array $array: keep only $grain values. This make less accurate but less messy graphs when too much values. See http://code.google.com/apis/chart/formats.html#granularity
function yourls_array_granularity( $array, $grain = 100, $preserve_max = true ) {
	if ( count( $array ) > $grain ) {
		$max = max( $array );
		$step = intval( count( $array ) / $grain );
		$i = 0;
		// Loop through each item and unset except every $step (optional preserve the max value)
		foreach( $array as $k=>$v ) {
			$i++;
			if ( $i % $step != 0 ) {
				if ( $preserve_max == false ) {
					unset( $array[$k] );
				} else {
					if ( $v < $max )
						unset( $array[$k] );
				}
			}
		}
	}
	return $array;
}
