<?php

/**
 * Echoes an image tag of Google Charts map from sorted array of 'country_code' => 'number of visits' (sort by DESC)
 *
 */
function yourls_stats_countries_map( $countries, $id = null ) {

	yourls_do_action( 'pre_stats_countries_map' );
	
	// if $id is null then assign a random string
	if( $id === null )
		$id = uniqid ( 'yourls_stats_map_' );

	$data = array_merge( array( 'Country' => 'Hits' ), $countries );
	$data = yourls_google_array_to_data_table( $data );

	$options = array(
		'backgroundColor' => "white",
		'colorAxis'       => "{colors:['A8D0ED','99C4E4','8AB8DB','7BACD2','6BA1C9','5C95C0','4D89B7','3E7DAE','2E72A5','1F669C']}",
		'width'           => "550",
		'height'          => "340",
		'theme'           => 'maximized'
	);
	$options = yourls_apply_filter( 'stats_countries_map_options', $options );
	
	$map = yourls_google_viz_code( 'GeoChart', $data, $options, $id );

	echo yourls_apply_filter( 'stats_countries_map', $map, $countries, $options, $id );
}

/**
 * Echoes an image tag of Google Charts pie from sorted array of 'data' => 'value' (sort by DESC). Optional $limit = (integer) limit list of X first countries, sorted by most visits
 *
 */
function yourls_stats_pie( $data, $limit = 10, $size = '340x220', $id = null ) {

	yourls_do_action( 'pre_stats_pie' );
	
	// if $id is null then assign a random string
	if( $id === null )
		$id = uniqid ( 'yourls_stats_pie_' );

	// Trim array: $limit first item + the sum of all others
	if ( count( $data ) > $limit ) {
		$i= 0;
		$trim_data = array( 'Others' => 0 );
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
	
	list($width, $height) = explode( 'x', $size );
	
	$options = array(
		'theme'  => 'maximized',
		'width'   => $width,
		'height'   => $height,
		'colors'    => "['A8D0ED','99C4E4','8AB8DB','7BACD2','6BA1C9','5C95C0','4D89B7','3E7DAE','2E72A5','1F669C']",
		'legend'     => 'none',
		'chartArea'   => '{top: "5%", height: "90%"}',
		'pieSliceText' => 'label',
	);
	$options = yourls_apply_filter( 'stats_pie_options', $options );

	$script_data = array_merge( array( 'Country' => 'Value' ), $_data );
	$script_data = yourls_google_array_to_data_table( $script_data );

	$pie = yourls_google_viz_code( 'PieChart', $script_data, $options, $id );

	echo yourls_apply_filter( 'stats_pie', $pie, $data, $limit, $size, $options, $id );
}

/**
 * Build a list of all daily values between d1/m1/y1 to d2/m2/y2.
 *
 */
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
	$_keys      = array_keys( $dates );
	$last_year  = end( $_keys );
	reset( $dates );

	// Get first & last months from our range. In our example: 08 & 09
	$first_month = key( $dates[ $first_year ] );
	$_keys       = array_keys( $dates[ $last_year ] );
	$last_month  = end( $_keys );
	reset( $dates );
	
	// Get first & last days from our range. In our example: 29 & 05
	$first_day = key( $dates[ $first_year ][ $first_month ] );
	$_keys     = array_keys( $dates[ $last_year ][ $last_month ] );
	$last_day  = end( $_keys );
	
	unset( $_keys );

	// Now build a list of all years (2009), month (08 & 09) and days (all from 2009-08-29 to 2009-09-05)
	$list_of_years  = array();
	$list_of_months = array();
	$list_of_days   = array();
	for ( $year = $first_year; $year <= $last_year; $year++ ) {
		$_year = sprintf( '%04d', $year );
		$list_of_years[ $_year ] = $_year;
		$current_first_month = ( $year == $first_year ? $first_month : '01' );
		$current_last_month  = ( $year == $last_year ? $last_month : '12' );
		for ( $month = $current_first_month; $month <= $current_last_month; $month++ ) {
			$_month = sprintf( '%02d', $month );
			$list_of_months[ $_month ] = $_month;
			$current_first_day = ( $year == $first_year && $month == $first_month ? $first_day : '01' );
			$current_last_day  = ( $year == $last_year && $month == $last_month ? $last_day : yourls_days_in_month( $month, $year) );
			for ( $day = $current_first_day; $day <= $current_last_day; $day++ ) {
				$day = sprintf( '%02d', $day );
				$key = date( 'M d, Y', mktime( 0, 0, 0, $_month, $day, $_year ) );
				$list_of_days[ $key ] = isset( $dates[$_year][$_month][$day] ) ? $dates[$_year][$_month][$day] : 0;
			}
		}
	}
	
	return array(
		'list_of_days'   => $list_of_days,
		'list_of_months' => $list_of_months,
		'list_of_years'  => $list_of_years,
	);
}

/**
 * Echoes an image tag of Google Charts line graph from array of values (eg 'number of clicks').
 * 
 * $legend1_list & legend2_list are values used for the 2 x-axis labels. $id is an HTML/JS id
 *
 */
function yourls_stats_line( $values, $id = null ) {

	yourls_do_action( 'pre_stats_line' );
	
	// if $id is null then assign a random string
	if( $id === null )
		$id = uniqid ( 'yourls_stats_line_' );
		
	// If we have only 1 day of data, prepend a fake day with 0 hits for a prettier graph
	if ( count( $values ) == 1 )
		array_unshift( $values, 0 );
		
	// Keep only a subset of values to keep graph smooth
	$values = yourls_array_granularity( $values, 30 );
	
	$data = array_merge( array( 'Time' => 'Hits' ), $values );
	$data = yourls_google_array_to_data_table( $data );
	
	$options = array(
		"legend"      => "none",
		"pointSize"   => "3",
		"theme"       => "maximized",
		"curveType"   => "function",
		"width"       => 430,
		"height"	  => 220,
		"hAxis"       => "{minTextSpacing: 80, maxTextLines: 1, maxAlternation: 1}",
		"vAxis"       => "{minValue: 0, format: '#'}",
		"colors"	  => "['#2a85b3']",
	);
	$options = yourls_apply_filter( 'stats_line_options', $options );
	
	$lineChart = yourls_google_viz_code( 'LineChart', $data, $options, $id );

	echo yourls_apply_filter( 'stats_line', $lineChart, $values, $options, $id );
}

/**
 * Return the number of days in a month. From php.net, used if PHP built without calendar functions
 *
 */
function yourls_days_in_month( $month, $year ) {
	// calculate number of days in a month
	return $month == 2 ? ( $year % 4 ? 28 : ( $year % 100 ? 29 : ( $year % 400 ? 28 : 29 ) ) ) : ( ( $month - 1 ) % 7 % 2 ? 30 : 31 );
}

/**
 * Get max value from date array of 'Aug 12, 2012' = '1337'
 *
 */
function yourls_stats_get_best_day( $list_of_days ) {
	$max = max( $list_of_days );
	foreach( $list_of_days as $k=>$v ) {
		if ( $v == $max )
			return array( 'day' => $k, 'max' => $max );
	}
}

/**
 * Return domain of a URL
 *
 */
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

/**
 * Return favicon URL
 *
 */
function yourls_get_favicon_url( $url ) {
	return yourls_match_current_protocol( 'http://www.google.com/s2/favicons?domain=' . yourls_get_domain( $url, false ) );
}

/**
 * Scale array of data from 0 to 100 max
 *
 */
function yourls_scale_data( $data ) {
	$max = max( $data );
	if( $max > 100 ) {
		foreach( $data as $k=>$v ) {
			$data[$k] = intval( $v / $max * 100 );
		}
	}
	return $data;
}

/**
 * Tweak granularity of array $array: keep only $grain values. This make less accurate but less messy graphs when too much values. See http://code.google.com/apis/chart/formats.html#granularity
 *
 */
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

/**
 * Transform data array to data table for Google API
 *
 */
function yourls_google_array_to_data_table( $data ){
	$str  = "var data = google.visualization.arrayToDataTable([\n";
	foreach( $data as $label => $values ){
		if( !is_array( $values ) ) {
			$values = array( $values );
		}
		$str .= "\t['$label',"; 
		foreach( $values as $value ){
			if( !is_numeric( $value ) && strpos( $value, '[' ) !== 0 && strpos( $value, '{' ) !== 0 ) { 
				$value = "'$value'";
			}
			$str .= "$value";
		}		
		$str .= "],\n";
	}
	$str = substr( $str, 0, -2 ) . "\n"; // remove the trailing comma/return, reappend the return
	$str .= "]);\n"; // wrap it up	
	return $str;
}

/**
 * Return javascript code that will display the Google Chart
 *
 */
function yourls_google_viz_code( $graph_type, $data, $options, $id ) {
	$function_name = 'yourls_graph' . $id;
	$code  = "\n<script id=\"$function_name\" type=\"text/javascript\">\n";
	$code .= "function $function_name() { \n";

	$code .= "$data\n";

	$code .= "var options = {\n";
	foreach( $options as $field => $value ) {
		if( !is_numeric( $value ) && strpos( $value, '[' ) !== 0 && strpos( $value, '{' ) !== 0 ) { 
			$value = "\"$value\"";
		}
		$code .= "\t'$field': $value,\n";
	}
	$code  = substr( $code, 0, -2 ) . "\n"; // remove the trailing comma/return, reappend the return
	$code .= "\t}\n";

	$code .= "new google.visualization.$graph_type( document.getElementById('visualization_$id') ).draw( data, options );";
	$code .= "}\n";
	$code .= "google.setOnLoadCallback( $function_name );\n";
	$code .= "</script>\n";
	$code .= "<div id=\"visualization_$id\"></div>\n";
	
	return $code;
}

