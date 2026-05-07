<?php

/**
 * Echoes an image tag of Google Charts map from sorted array of 'country_code' => 'number of visits' (sort by DESC)
 *
 * @param array $countries  Array of 'country_code' => 'number of visits'
 * @param string $id        Optional HTML element ID
 * @return void
 */
function yourls_stats_countries_map($countries, $id = null) {

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
 * @param array $data  Array of 'data' => 'value'
 * @param int $limit   Optional limit list of X first countries
 * @param $size        Optional size of the image
 * @param $id          Optional HTML element ID
 * @return void
 */
function yourls_stats_pie($data, $limit = 10, $size = '340x220', $id = null) {

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
 * @param array $dates
 * @return array[]  Array of arrays of days, months, years
 */
function yourls_build_list_of_days($dates) {
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

    // Extend to today
    $today = new DateTime();
    $today->setTime( 0, 0, 0 ); // Start of today
    $today_year = $today->format( 'Y' );
    $today_month = $today->format( 'm' );
    $today_day = $today->format( 'd' );

    // Now build a list of all years (2009), month (08 & 09) and days (all from 2009-08-29 to 2009-09-05)
    $list_of_years  = array();
    $list_of_months = array();
    $list_of_days   = array();
    for ( $year = $first_year; $year <= $today_year; $year++ ) {
        $_year = sprintf( '%04d', $year );
        $list_of_years[ $_year ] = $_year;
        $current_first_month = ( $year == $first_year ? $first_month : '01' );
        $current_last_month = ( $year == $today_year ? $today_month : '12' );
        for ( $month = $current_first_month; $month <= $current_last_month; $month++ ) {
            $_month = sprintf( '%02d', $month );
            $list_of_months[ $_month ] = $_month;
            $current_first_day = ( $year == $first_year && $month == $first_month ? $first_day : '01' );
            $current_last_day = ( $year == $today_year && $month == $today_month ? $today_day : yourls_days_in_month( $month, $year ) );
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
 * @param array $values  Array of values (eg 'number of clicks')
 * @param string $id     HTML element id
 * @return void
 */
function yourls_stats_line($values, $id = null) {

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
        "height"      => 220,
        "hAxis"       => "{minTextSpacing: 80, maxTextLines: 1, maxAlternation: 1}",
        "vAxis"       => "{minValue: 0, format: '#'}",
        "colors"      => "['#2a85b3']",
    );
    $options = yourls_apply_filter( 'stats_line_options', $options );

    $lineChart = yourls_google_viz_code( 'LineChart', $data, $options, $id );

    echo yourls_apply_filter( 'stats_line', $lineChart, $values, $options, $id );
}


/**
 * Return the number of days in a month. From php.net.
 *
 * @param int $month
 * @param int $year
 * @return int
 */
function yourls_days_in_month($month, $year) {
    // calculate number of days in a month
    return $month == 2 ? ( $year % 4 ? 28 : ( $year % 100 ? 29 : ( $year % 400 ? 28 : 29 ) ) ) : ( ( $month - 1 ) % 7 % 2 ? 30 : 31 );
}


/**
 * Get max value from date array of 'Aug 12, 2012' = '1337'
 *
 * @param array $list_of_days
 * @return array
 */
function yourls_stats_get_best_day($list_of_days) {
    $max = max( $list_of_days );
    foreach( $list_of_days as $k=>$v ) {
        if ( $v == $max )
            return array( 'day' => $k, 'max' => $max );
    }
}

/**
 * Return domain of a URL
 *
 * @param string $url
 * @param bool $include_scheme
 * @return string
 */
function yourls_get_domain($url, $include_scheme = false) {
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
 * @param string $url
 * @return string
 */
function yourls_get_favicon_url($url) {
    return yourls_match_current_protocol( '//www.google.com/s2/favicons?domain=' . yourls_get_domain( $url, false ) );
}

/**
 * Scale array of data from 0 to 100 max
 *
 * @param array $data
 * @return array
 */
function yourls_scale_data($data ) {
    $max = max( $data );
    if( $max > 100 ) {
        foreach( $data as $k=>$v ) {
            $data[$k] = intval( $v / $max * 100 );
        }
    }
    return $data;
}


/**
 * Tweak granularity of array $array: keep only $grain values.
 *
 * This make less accurate but less messy graphs when too much values.
 * See https://developers.google.com/chart/image/docs/gallery/line_charts?hl=en#data-granularity
 *
 * @param array $array
 * @param int $grain
 * @param bool $preserve_max
 * @return array
 */
function yourls_array_granularity($array, $grain = 100, $preserve_max = true) {
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
 * @param array $data
 * @return string
 */
function yourls_google_array_to_data_table($data){
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
 * @param string $graph_type
 * @param string $data
 * @param var $options
 * @param string $id
 * @return string
 */
function yourls_google_viz_code($graph_type, $data, $options, $id ) {
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

/**
 * Group clicks by a hot column.
 *
 * @param string $keyword
 * @param string $column   Whitelisted column name
 * @param string $range    'all'|'24h'|'7d'|'30d'
 * @param int    $limit
 * @return array<string,int>  ordered desc
 */
function yourls_get_clicks_by_dimension( string $keyword, string $column, string $range = 'all', int $limit = 20 ): array {
    static $allowed = [ 'device_type','browser','os','referrer_host','utm_source','utm_medium','utm_campaign','city','region','country_code' ];
    if ( ! in_array( $column, $allowed, true ) ) return [];

    $cacheKey = sprintf( 'yourls_click_agg:%s:%s:%s:%d', $keyword, $column, $range, $limit );
    $cached   = yourls_click_cache_get( $cacheKey );
    if ( $cached !== null ) return $cached;

    $where = 'shorturl = :k' . yourls_clicks_range_where( $range );
    $sql = 'SELECT `' . $column . '` AS k, COUNT(*) AS c FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE ' . $where .
        ' GROUP BY `' . $column . '` ORDER BY c DESC LIMIT :lim';
    $sql = yourls_apply_filter( 'clicks_aggregate_query', $sql, $keyword, $column, $range, $limit );

    $rows = yourls_get_db( 'read-clicks_by_dimension' )->fetchAll( $sql, [ 'k' => $keyword, 'lim' => $limit ] );
    $out = [];
    foreach ( $rows as $r ) {
        $key = $r['k'] !== null && $r['k'] !== '' ? (string) $r['k'] : '(unknown)';
        $out[ $key ] = (int) $r['c'];
    }
    yourls_click_cache_set( $cacheKey, $out );
    return $out;
}

/**
 * Group clicks by a JSON path inside the meta column.
 *
 * @param string $keyword
 * @param string $jsonPath  Whitelisted JSON path (e.g. '$.tz')
 * @param string $range
 * @param int    $limit
 * @return array<string,int>
 */
function yourls_get_clicks_meta_aggregate( string $keyword, string $jsonPath, string $range = 'all', int $limit = 20 ): array {
    static $allowedPaths = [ '$.tz','$.lang','$.connection_type','$.viewport_w','$.is_bot' ];
    if ( ! in_array( $jsonPath, $allowedPaths, true ) ) return [];

    $where = 'shorturl = :k' . yourls_clicks_range_where( $range );
    $sql = "SELECT JSON_UNQUOTE(JSON_EXTRACT(meta, :path)) AS k, COUNT(*) AS c FROM `" . YOURLS_DB_TABLE_LOG . "` WHERE $where GROUP BY k ORDER BY c DESC LIMIT :lim";

    $rows = yourls_get_db( 'read-clicks_meta_aggregate' )->fetchAll( $sql, [ 'k' => $keyword, 'path' => $jsonPath, 'lim' => $limit ] );
    $out = [];
    foreach ( $rows as $r ) {
        $key = $r['k'] !== null && $r['k'] !== '' ? (string) $r['k'] : '(unknown)';
        $out[ $key ] = (int) $r['c'];
    }
    return $out;
}

/**
 * Distinct visitor count.
 */
function yourls_get_unique_visitors( string $keyword, string $range = 'all' ): int {
    $where = 'shorturl = :k' . yourls_clicks_range_where( $range );
    $sql = 'SELECT COUNT(DISTINCT COALESCE(visitor_hash, ip_address)) AS n FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE ' . $where;
    return (int) yourls_get_db( 'read-unique_visitors' )->fetchValue( $sql, [ 'k' => $keyword ] );
}

/**
 * Paginated raw click rows for the Activity tab.
 */
function yourls_get_recent_clicks( string $keyword, int $page = 1, int $perPage = 50 ): array {
    $page = max( 1, $page );
    $perPage = max( 1, min( 200, $perPage ) );
    $sql = 'SELECT * FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k ORDER BY click_id DESC LIMIT :off, :lim';
    return yourls_get_db( 'read-recent_clicks' )->fetchAll( $sql, [ 'k' => $keyword, 'off' => ( $page - 1 ) * $perPage, 'lim' => $perPage ] );
}

function yourls_clicks_range_where( string $range ): string {
    return match ( $range ) {
        '24h' => " AND click_time >= NOW() - INTERVAL 1 DAY",
        '7d'  => " AND click_time >= NOW() - INTERVAL 7 DAY",
        '30d' => " AND click_time >= NOW() - INTERVAL 30 DAY",
        default => '',
    };
}

function yourls_click_cache_get( string $key ) {
    if ( function_exists( 'apcu_fetch' ) ) {
        $ok = false; $v = apcu_fetch( $key, $ok );
        return $ok ? $v : null;
    }
    return null;
}

function yourls_click_cache_set( string $key, $value, int $ttl = 300 ): void {
    if ( function_exists( 'apcu_store' ) ) {
        apcu_store( $key, $value, $ttl );
    }
}

/**
 * Click counts in three rolling windows: today, last 7d, last 30d.
 *
 * @return array{today:int,last7d:int,last30d:int}
 */
function yourls_get_click_windows( string $keyword ): array {
    $sql = 'SELECT '
         . 'SUM(click_time >= CURRENT_DATE) AS today, '
         . 'SUM(click_time >= NOW() - INTERVAL 7  DAY) AS last7d, '
         . 'SUM(click_time >= NOW() - INTERVAL 30 DAY) AS last30d '
         . 'FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k';
    $row = yourls_get_db( 'read-click_windows' )->fetchOne( $sql, [ 'k' => $keyword ] );
    return [
        'today'   => (int) ( $row['today']   ?? 0 ),
        'last7d'  => (int) ( $row['last7d']  ?? 0 ),
        'last30d' => (int) ( $row['last30d'] ?? 0 ),
    ];
}

/**
 * Daily click count for the last $days days. Returns an associative array
 * keyed by 'YYYY-MM-DD' (UTC date), every day filled (zeros included).
 *
 * @return array<string,int>
 */
function yourls_get_clicks_by_day( string $keyword, int $days = 30 ): array {
    $days = max( 1, min( 365, $days ) );
    $sql = 'SELECT DATE(click_time) AS d, COUNT(*) AS c '
         . 'FROM `' . YOURLS_DB_TABLE_LOG . '` '
         . 'WHERE shorturl = :k AND click_time >= NOW() - INTERVAL :days DAY '
         . 'GROUP BY d ORDER BY d ASC';
    $rows = yourls_get_db( 'read-clicks_by_day' )->fetchAll( $sql, [ 'k' => $keyword, 'days' => $days ] );

    $out = [];
    $cursor = new \DateTimeImmutable( '-' . ( $days - 1 ) . ' days', new \DateTimeZone( 'UTC' ) );
    for ( $i = 0; $i < $days; $i++ ) {
        $out[ $cursor->format( 'Y-m-d' ) ] = 0;
        $cursor = $cursor->modify( '+1 day' );
    }
    foreach ( $rows as $r ) {
        $key = (string) $r['d'];
        if ( isset( $out[ $key ] ) ) {
            $out[ $key ] = (int) $r['c'];
        }
    }
    return $out;
}

/**
 * Hour-of-day × day-of-week grid for the last $days days.
 * Returns a 7x24 matrix indexed by [dow 0=Mon..6=Sun][hour 0..23].
 *
 * @return array<int,array<int,int>>
 */
function yourls_get_clicks_heatmap( string $keyword, int $days = 30 ): array {
    $days = max( 1, min( 365, $days ) );
    // MySQL WEEKDAY() returns 0=Mon..6=Sun, matching our convention.
    $sql = 'SELECT WEEKDAY(click_time) AS dow, HOUR(click_time) AS h, COUNT(*) AS c '
         . 'FROM `' . YOURLS_DB_TABLE_LOG . '` '
         . 'WHERE shorturl = :k AND click_time >= NOW() - INTERVAL :days DAY '
         . 'GROUP BY dow, h';
    $rows = yourls_get_db( 'read-clicks_heatmap' )->fetchAll( $sql, [ 'k' => $keyword, 'days' => $days ] );

    $grid = array_fill( 0, 7, array_fill( 0, 24, 0 ) );
    foreach ( $rows as $r ) {
        $dow = (int) $r['dow']; $h = (int) $r['h'];
        if ( $dow >= 0 && $dow < 7 && $h >= 0 && $h < 24 ) {
            $grid[ $dow ][ $h ] = (int) $r['c'];
        }
    }
    return $grid;
}

/**
 * Time elapsed between link creation and the first recorded click.
 * Returns NULL if either anchor is missing.
 */
function yourls_get_time_to_first_click( string $keyword ): ?int {
    $sql = 'SELECT TIMESTAMPDIFF(SECOND, u.timestamp, MIN(l.click_time)) AS secs '
         . 'FROM `' . YOURLS_DB_TABLE_URL . '` u '
         . 'LEFT JOIN `' . YOURLS_DB_TABLE_LOG . '` l ON l.shorturl = u.keyword '
         . 'WHERE u.keyword = :k GROUP BY u.timestamp';
    $val = yourls_get_db( 'read-time_to_first_click' )->fetchValue( $sql, [ 'k' => $keyword ] );
    return $val === null ? null : (int) $val;
}

/**
 * Format a number of seconds into a short human-readable string.
 */
function yourls_format_duration( int $secs ): string {
    if ( $secs < 60 )      return $secs . 's';
    if ( $secs < 3600 )    return round( $secs / 60 ) . 'm';
    if ( $secs < 86400 )   return round( $secs / 3600, 1 ) . 'h';
    if ( $secs < 2592000 ) return round( $secs / 86400, 1 ) . 'd';
    return round( $secs / 2592000, 1 ) . 'mo';
}

/**
 * New vs returning visitors based on visitor_hash repetition for the same shorturl.
 *
 * @return array{new:int,returning:int,total_visitors:int,total_clicks:int}
 */
function yourls_get_visitor_segments( string $keyword ): array {
    $sql = 'SELECT COUNT(*) AS hits, COUNT(DISTINCT vh) AS visitors, '
         . 'SUM(seen_count = 1) AS one_timers '
         . 'FROM ('
         . '  SELECT COALESCE(visitor_hash, ip_address) AS vh, COUNT(*) AS seen_count '
         . '  FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k '
         . '  GROUP BY vh'
         . ') t';
    $row = yourls_get_db( 'read-visitor_segments' )->fetchOne( $sql, [ 'k' => $keyword ] );

    $clicksSql = 'SELECT COUNT(*) FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k';
    $totalClicks = (int) yourls_get_db( 'read-visitor_segments' )->fetchValue( $clicksSql, [ 'k' => $keyword ] );

    $visitors  = (int) ( $row['visitors']   ?? 0 );
    $oneTimers = (int) ( $row['one_timers'] ?? 0 );
    return [
        'new'            => $oneTimers,
        'returning'      => max( 0, $visitors - $oneTimers ),
        'total_visitors' => $visitors,
        'total_clicks'   => $totalClicks,
    ];
}

/**
 * Daily distinct-visitor series for the last $days days.
 *
 * @return array<string,int>
 */
function yourls_get_unique_visitors_by_day( string $keyword, int $days = 30 ): array {
    $days = max( 1, min( 365, $days ) );
    $sql = 'SELECT DATE(click_time) AS d, COUNT(DISTINCT COALESCE(visitor_hash, ip_address)) AS c '
         . 'FROM `' . YOURLS_DB_TABLE_LOG . '` '
         . 'WHERE shorturl = :k AND click_time >= NOW() - INTERVAL :days DAY '
         . 'GROUP BY d ORDER BY d ASC';
    $rows = yourls_get_db( 'read-unique_visitors_day' )->fetchAll( $sql, [ 'k' => $keyword, 'days' => $days ] );

    $out = [];
    $cursor = new \DateTimeImmutable( '-' . ( $days - 1 ) . ' days', new \DateTimeZone( 'UTC' ) );
    for ( $i = 0; $i < $days; $i++ ) {
        $out[ $cursor->format( 'Y-m-d' ) ] = 0;
        $cursor = $cursor->modify( '+1 day' );
    }
    foreach ( $rows as $r ) {
        $key = (string) $r['d'];
        if ( isset( $out[ $key ] ) ) {
            $out[ $key ] = (int) $r['c'];
        }
    }
    return $out;
}

/**
 * Bot vs human breakdown of the click count.
 *
 * @return array{bot:int,human:int}
 */
function yourls_get_bot_split( string $keyword ): array {
    $sql = 'SELECT '
         . 'SUM(device_type = "bot") AS bot, '
         . 'SUM(device_type IS NOT NULL AND device_type != "bot") AS human '
         . 'FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k';
    $row = yourls_get_db( 'read-bot_split' )->fetchOne( $sql, [ 'k' => $keyword ] );
    return [
        'bot'   => (int) ( $row['bot']   ?? 0 ),
        'human' => (int) ( $row['human'] ?? 0 ),
    ];
}

/**
 * OS × device-type cross-tab.
 *
 * @return array<string,array<string,int>>  os => [ device_type => count ]
 */
function yourls_get_os_by_device( string $keyword, int $limit = 6 ): array {
    $sql = 'SELECT os, device_type, COUNT(*) AS c '
         . 'FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k '
         . 'GROUP BY os, device_type';
    $rows = yourls_get_db( 'read-os_by_device' )->fetchAll( $sql, [ 'k' => $keyword ] );

    $totals = [];
    foreach ( $rows as $r ) {
        $os = $r['os'] ?: '(unknown)';
        $totals[ $os ] = ( $totals[ $os ] ?? 0 ) + (int) $r['c'];
    }
    arsort( $totals );
    $top = array_slice( array_keys( $totals ), 0, $limit );

    $out = [];
    foreach ( $top as $os ) $out[ $os ] = [ 'desktop' => 0, 'mobile' => 0, 'tablet' => 0, 'bot' => 0 ];
    foreach ( $rows as $r ) {
        $os = $r['os'] ?: '(unknown)';
        $dt = $r['device_type'] ?: '(unknown)';
        if ( ! isset( $out[ $os ] ) ) continue;
        if ( ! isset( $out[ $os ][ $dt ] ) ) $out[ $os ][ $dt ] = 0;
        $out[ $os ][ $dt ] += (int) $r['c'];
    }
    return $out;
}

/**
 * Top user-agent strings.
 *
 * @return array<string,int>
 */
function yourls_get_top_user_agents( string $keyword, int $limit = 10 ): array {
    $sql = 'SELECT user_agent AS ua, COUNT(*) AS c '
         . 'FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k AND user_agent != "" '
         . 'GROUP BY ua ORDER BY c DESC LIMIT :lim';
    $rows = yourls_get_db( 'read-top_user_agents' )->fetchAll( $sql, [ 'k' => $keyword, 'lim' => $limit ] );
    $out = [];
    foreach ( $rows as $r ) $out[ (string) $r['ua'] ] = (int) $r['c'];
    return $out;
}

/**
 * ISO 3166-1 alpha-2 country code -> continent code mapping.
 * Used by Geography tab for continent rollups when the click row only
 * carries a country_code.
 */
function yourls_country_to_continent( string $cc ): string {
    static $map = null;
    if ( $map === null ) {
        $map = [
            // Africa
            'DZ'=>'AF','AO'=>'AF','BJ'=>'AF','BW'=>'AF','BF'=>'AF','BI'=>'AF','CM'=>'AF','CV'=>'AF','CF'=>'AF','TD'=>'AF',
            'KM'=>'AF','CG'=>'AF','CD'=>'AF','CI'=>'AF','DJ'=>'AF','EG'=>'AF','GQ'=>'AF','ER'=>'AF','SZ'=>'AF','ET'=>'AF',
            'GA'=>'AF','GM'=>'AF','GH'=>'AF','GN'=>'AF','GW'=>'AF','KE'=>'AF','LS'=>'AF','LR'=>'AF','LY'=>'AF','MG'=>'AF',
            'MW'=>'AF','ML'=>'AF','MR'=>'AF','MU'=>'AF','YT'=>'AF','MA'=>'AF','MZ'=>'AF','NA'=>'AF','NE'=>'AF','NG'=>'AF',
            'RE'=>'AF','RW'=>'AF','SH'=>'AF','ST'=>'AF','SN'=>'AF','SC'=>'AF','SL'=>'AF','SO'=>'AF','ZA'=>'AF','SS'=>'AF',
            'SD'=>'AF','TZ'=>'AF','TG'=>'AF','TN'=>'AF','UG'=>'AF','EH'=>'AF','ZM'=>'AF','ZW'=>'AF',
            // Antarctica
            'AQ'=>'AN','BV'=>'AN','TF'=>'AN','HM'=>'AN','GS'=>'AN',
            // Asia
            'AF'=>'AS','AM'=>'AS','AZ'=>'AS','BH'=>'AS','BD'=>'AS','BT'=>'AS','BN'=>'AS','KH'=>'AS','CN'=>'AS','CY'=>'AS',
            'GE'=>'AS','HK'=>'AS','IN'=>'AS','ID'=>'AS','IR'=>'AS','IQ'=>'AS','IL'=>'AS','JP'=>'AS','JO'=>'AS','KZ'=>'AS',
            'KP'=>'AS','KR'=>'AS','KW'=>'AS','KG'=>'AS','LA'=>'AS','LB'=>'AS','MO'=>'AS','MY'=>'AS','MV'=>'AS','MN'=>'AS',
            'MM'=>'AS','NP'=>'AS','OM'=>'AS','PK'=>'AS','PS'=>'AS','PH'=>'AS','QA'=>'AS','SA'=>'AS','SG'=>'AS','LK'=>'AS',
            'SY'=>'AS','TW'=>'AS','TJ'=>'AS','TH'=>'AS','TL'=>'AS','TR'=>'AS','TM'=>'AS','AE'=>'AS','UZ'=>'AS','VN'=>'AS','YE'=>'AS',
            // Europe
            'AL'=>'EU','AD'=>'EU','AT'=>'EU','BY'=>'EU','BE'=>'EU','BA'=>'EU','BG'=>'EU','HR'=>'EU','CZ'=>'EU','DK'=>'EU',
            'EE'=>'EU','FO'=>'EU','FI'=>'EU','FR'=>'EU','DE'=>'EU','GI'=>'EU','GR'=>'EU','GG'=>'EU','HU'=>'EU','IS'=>'EU',
            'IE'=>'EU','IM'=>'EU','IT'=>'EU','JE'=>'EU','XK'=>'EU','LV'=>'EU','LI'=>'EU','LT'=>'EU','LU'=>'EU','MT'=>'EU',
            'MD'=>'EU','MC'=>'EU','ME'=>'EU','NL'=>'EU','MK'=>'EU','NO'=>'EU','PL'=>'EU','PT'=>'EU','RO'=>'EU','RU'=>'EU',
            'SM'=>'EU','RS'=>'EU','SK'=>'EU','SI'=>'EU','ES'=>'EU','SJ'=>'EU','SE'=>'EU','CH'=>'EU','UA'=>'EU','GB'=>'EU','VA'=>'EU','AX'=>'EU',
            // North America
            'AI'=>'NA','AG'=>'NA','AW'=>'NA','BS'=>'NA','BB'=>'NA','BZ'=>'NA','BM'=>'NA','BQ'=>'NA','CA'=>'NA','KY'=>'NA',
            'CR'=>'NA','CU'=>'NA','CW'=>'NA','DM'=>'NA','DO'=>'NA','SV'=>'NA','GL'=>'NA','GD'=>'NA','GP'=>'NA','GT'=>'NA',
            'HT'=>'NA','HN'=>'NA','JM'=>'NA','MQ'=>'NA','MX'=>'NA','MS'=>'NA','NI'=>'NA','PA'=>'NA','PR'=>'NA','BL'=>'NA',
            'KN'=>'NA','LC'=>'NA','MF'=>'NA','PM'=>'NA','VC'=>'NA','SX'=>'NA','TT'=>'NA','TC'=>'NA','US'=>'NA','VG'=>'NA','VI'=>'NA',
            // Oceania
            'AS'=>'OC','AU'=>'OC','CX'=>'OC','CC'=>'OC','CK'=>'OC','FJ'=>'OC','PF'=>'OC','GU'=>'OC','KI'=>'OC','MH'=>'OC',
            'FM'=>'OC','NR'=>'OC','NC'=>'OC','NZ'=>'OC','NU'=>'OC','NF'=>'OC','MP'=>'OC','PW'=>'OC','PG'=>'OC','PN'=>'OC',
            'WS'=>'OC','SB'=>'OC','TK'=>'OC','TO'=>'OC','TV'=>'OC','UM'=>'OC','VU'=>'OC','WF'=>'OC',
            // South America
            'AR'=>'SA','BO'=>'SA','BR'=>'SA','CL'=>'SA','CO'=>'SA','EC'=>'SA','FK'=>'SA','GF'=>'SA','GY'=>'SA','PY'=>'SA',
            'PE'=>'SA','SR'=>'SA','UY'=>'SA','VE'=>'SA',
        ];
    }
    $cc = strtoupper( $cc );
    return $map[ $cc ] ?? '??';
}

/**
 * Pretty name for a continent code.
 */
function yourls_continent_name( string $code ): string {
    return [
        'AF' => yourls__( 'Africa' ),
        'AN' => yourls__( 'Antarctica' ),
        'AS' => yourls__( 'Asia' ),
        'EU' => yourls__( 'Europe' ),
        'NA' => yourls__( 'North America' ),
        'OC' => yourls__( 'Oceania' ),
        'SA' => yourls__( 'South America' ),
    ][ $code ] ?? yourls__( 'Unknown' );
}

/**
 * Country tier classification used for the tier-1/2/3 KPI.
 * Sources: G7 + EU27 + ANZ + Israel + Korea + Singapore + HK + Taiwan in tier 1;
 * BRICS + Gulf + LatAm majors + East Europe in tier 2; the rest in tier 3.
 */
function yourls_country_tier( string $cc ): int {
    static $tiers = null;
    if ( $tiers === null ) {
        $tier1 = [ 'US','CA','GB','DE','FR','IT','JP','AU','NZ','IL','KR','SG','HK','TW','CH','NO','SE','FI','DK','IS','AT','BE','NL','LU','IE','ES','PT','GR','PL','CZ','HU','SK','SI','HR','EE','LV','LT','BG','RO','MT','CY','MC','LI','AD','SM' ];
        $tier2 = [ 'BR','RU','IN','CN','ZA','MX','AR','CL','CO','PE','UY','SA','AE','QA','KW','BH','OM','TR','UA','BY','RS','BA','MK','AL','ME','MD','XK','MY','TH','VN','PH','ID','EG','MA','TN','NG','KE','GH' ];
        $tiers = [];
        foreach ( $tier1 as $c ) $tiers[ $c ] = 1;
        foreach ( $tier2 as $c ) $tiers[ $c ] = 2;
    }
    $cc = strtoupper( $cc );
    return $tiers[ $cc ] ?? 3;
}

/**
 * Geography rollups for the page.
 *
 * @return array{
 *   countries: array<string,int>,
 *   cities: array<string,int>,
 *   continents: array<string,int>,
 *   tiers: array{1:int,2:int,3:int},
 *   total_clicks: int,
 *   reached: int,
 *   coverage_pct: float,
 *   hhi: float,
 *   top5_share: float,
 *   top_continent: ?string
 * }
 */
function yourls_get_geography_rollup( string $keyword ): array {
    $countries = yourls_get_clicks_by_dimension( $keyword, 'country_code', 'all', 250 );
    $cities    = yourls_get_clicks_by_dimension( $keyword, 'city',         'all', 100 );

    // Strip the (unknown) bucket for KPI math but keep it for the table view.
    $real = $countries;
    unset( $real['(unknown)'] );

    $totalReal = array_sum( $real );
    $reached   = count( $real );

    // Continent rollup
    $continents = [];
    $tiers      = [ 1 => 0, 2 => 0, 3 => 0 ];
    foreach ( $real as $cc => $n ) {
        $cont = yourls_country_to_continent( $cc );
        $continents[ $cont ] = ( $continents[ $cont ] ?? 0 ) + (int) $n;
        $tiers[ yourls_country_tier( $cc ) ] += (int) $n;
    }
    arsort( $continents );

    // HHI = sum of squared shares (0..10000 in market-share convention; we use 0..1)
    $hhi = 0.0;
    if ( $totalReal > 0 ) {
        foreach ( $real as $n ) {
            $share = $n / $totalReal;
            $hhi  += $share * $share;
        }
    }

    // Top-5 concentration
    $top5Share = 0.0;
    if ( $totalReal > 0 ) {
        $top5Sum   = array_sum( array_slice( $real, 0, 5, true ) );
        $top5Share = $top5Sum / $totalReal;
    }

    return [
        'countries'     => $countries,
        'cities'        => $cities,
        'continents'    => $continents,
        'tiers'         => $tiers,
        'total_clicks'  => array_sum( $countries ),
        'reached'       => $reached,
        'coverage_pct'  => round( $reached * 100 / 195, 1 ), // 195 UN-recognised states
        'hhi'           => round( $hhi, 4 ),
        'top5_share'    => round( $top5Share * 100, 1 ),
        'top_continent' => $continents ? array_key_first( $continents ) : null,
    ];
}

/**
 * Daily click series for the top-N countries (multi-line chart).
 *
 * @return array{labels:array<string>,series:array<string,array<int>>}
 */
function yourls_get_top_countries_trend( string $keyword, int $topN = 5, int $days = 30 ): array {
    $days = max( 1, min( 90, $days ) );

    // 1) find the top-N country codes for the period
    $sql = 'SELECT country_code AS k, COUNT(*) AS c FROM `' . YOURLS_DB_TABLE_LOG . '` '
         . 'WHERE shorturl = :k AND click_time >= NOW() - INTERVAL :days DAY '
         . 'AND country_code != "" '
         . 'GROUP BY k ORDER BY c DESC LIMIT :lim';
    $top = yourls_get_db( 'read-top_countries_trend' )->fetchAll( $sql, [ 'k' => $keyword, 'days' => $days, 'lim' => $topN ] );
    $codes = array_map( fn( $r ) => (string) $r['k'], $top );
    if ( ! $codes ) return [ 'labels' => [], 'series' => [] ];

    // 2) per-day per-country click counts
    $placeholders = implode( ',', array_map( fn( $i ) => ':c' . $i, array_keys( $codes ) ) );
    $bind = [ 'k' => $keyword, 'days' => $days ];
    foreach ( $codes as $i => $c ) $bind[ 'c' . $i ] = $c;
    $sql = 'SELECT DATE(click_time) AS d, country_code AS cc, COUNT(*) AS n '
         . 'FROM `' . YOURLS_DB_TABLE_LOG . '` '
         . 'WHERE shorturl = :k AND click_time >= NOW() - INTERVAL :days DAY '
         . 'AND country_code IN (' . $placeholders . ') '
         . 'GROUP BY d, cc ORDER BY d ASC';
    $rows = yourls_get_db( 'read-top_countries_trend' )->fetchAll( $sql, $bind );

    // build label axis + zero-filled series
    $labels = [];
    $cursor = new \DateTimeImmutable( '-' . ( $days - 1 ) . ' days', new \DateTimeZone( 'UTC' ) );
    for ( $i = 0; $i < $days; $i++ ) {
        $labels[] = $cursor->format( 'Y-m-d' );
        $cursor = $cursor->modify( '+1 day' );
    }
    $series = [];
    foreach ( $codes as $c ) $series[ $c ] = array_fill( 0, $days, 0 );
    foreach ( $rows as $r ) {
        $idx = array_search( (string) $r['d'], $labels, true );
        if ( $idx !== false && isset( $series[ (string) $r['cc'] ] ) ) {
            $series[ (string) $r['cc'] ][ $idx ] = (int) $r['n'];
        }
    }
    return [ 'labels' => $labels, 'series' => $series ];
}

/**
 * Country + city + unique-visitor breakdown for the table view.
 *
 * @return array<int,array{country:string,city:?string,clicks:int,visitors:int}>
 */
function yourls_get_geo_table( string $keyword, int $limit = 30 ): array {
    $sql = 'SELECT country_code AS country, city, COUNT(*) AS clicks, '
         . 'COUNT(DISTINCT COALESCE(visitor_hash, ip_address)) AS visitors '
         . 'FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k '
         . 'GROUP BY country, city ORDER BY clicks DESC LIMIT :lim';
    $rows = yourls_get_db( 'read-geo_table' )->fetchAll( $sql, [ 'k' => $keyword, 'lim' => $limit ] );
    $out = [];
    foreach ( $rows as $r ) {
        $out[] = [
            'country'  => (string) ( $r['country'] ?? '' ),
            'city'     => $r['city'] !== null && $r['city'] !== '' ? (string) $r['city'] : null,
            'clicks'   => (int) $r['clicks'],
            'visitors' => (int) $r['visitors'],
        ];
    }
    return $out;
}

/**
 * ISO 3166-1 alpha-2 -> numeric mapping. The world-atlas TopoJSON used by
 * the Geography map identifies features by ISO numeric, so the Blade view
 * needs a JS-readable map alpha2 -> numeric. The PHP side already groups
 * clicks by alpha-2; we hand the JS an array keyed by numeric.
 */
function yourls_country_to_iso_numeric( string $cc ): ?string {
    static $map = null;
    if ( $map === null ) {
        $map = [
            'AF'=>'004','AL'=>'008','DZ'=>'012','AS'=>'016','AD'=>'020','AO'=>'024','AI'=>'660','AQ'=>'010','AG'=>'028','AR'=>'032',
            'AM'=>'051','AW'=>'533','AU'=>'036','AT'=>'040','AZ'=>'031','BS'=>'044','BH'=>'048','BD'=>'050','BB'=>'052','BY'=>'112',
            'BE'=>'056','BZ'=>'084','BJ'=>'204','BM'=>'060','BT'=>'064','BO'=>'068','BQ'=>'535','BA'=>'070','BW'=>'072','BV'=>'074',
            'BR'=>'076','IO'=>'086','BN'=>'096','BG'=>'100','BF'=>'854','BI'=>'108','CV'=>'132','KH'=>'116','CM'=>'120','CA'=>'124',
            'KY'=>'136','CF'=>'140','TD'=>'148','CL'=>'152','CN'=>'156','CX'=>'162','CC'=>'166','CO'=>'170','KM'=>'174','CG'=>'178',
            'CD'=>'180','CK'=>'184','CR'=>'188','CI'=>'384','HR'=>'191','CU'=>'192','CW'=>'531','CY'=>'196','CZ'=>'203','DK'=>'208',
            'DJ'=>'262','DM'=>'212','DO'=>'214','EC'=>'218','EG'=>'818','SV'=>'222','GQ'=>'226','ER'=>'232','EE'=>'233','SZ'=>'748',
            'ET'=>'231','FK'=>'238','FO'=>'234','FJ'=>'242','FI'=>'246','FR'=>'250','GF'=>'254','PF'=>'258','TF'=>'260','GA'=>'266',
            'GM'=>'270','GE'=>'268','DE'=>'276','GH'=>'288','GI'=>'292','GR'=>'300','GL'=>'304','GD'=>'308','GP'=>'312','GU'=>'316',
            'GT'=>'320','GG'=>'831','GN'=>'324','GW'=>'624','GY'=>'328','HT'=>'332','HM'=>'334','VA'=>'336','HN'=>'340','HK'=>'344',
            'HU'=>'348','IS'=>'352','IN'=>'356','ID'=>'360','IR'=>'364','IQ'=>'368','IE'=>'372','IM'=>'833','IL'=>'376','IT'=>'380',
            'JM'=>'388','JP'=>'392','JE'=>'832','JO'=>'400','KZ'=>'398','KE'=>'404','KI'=>'296','KP'=>'408','KR'=>'410','KW'=>'414',
            'KG'=>'417','LA'=>'418','LV'=>'428','LB'=>'422','LS'=>'426','LR'=>'430','LY'=>'434','LI'=>'438','LT'=>'440','LU'=>'442',
            'MO'=>'446','MG'=>'450','MW'=>'454','MY'=>'458','MV'=>'462','ML'=>'466','MT'=>'470','MH'=>'584','MQ'=>'474','MR'=>'478',
            'MU'=>'480','YT'=>'175','MX'=>'484','FM'=>'583','MD'=>'498','MC'=>'492','MN'=>'496','ME'=>'499','MS'=>'500','MA'=>'504',
            'MZ'=>'508','MM'=>'104','NA'=>'516','NR'=>'520','NP'=>'524','NL'=>'528','NC'=>'540','NZ'=>'554','NI'=>'558','NE'=>'562',
            'NG'=>'566','NU'=>'570','NF'=>'574','MK'=>'807','MP'=>'580','NO'=>'578','OM'=>'512','PK'=>'586','PW'=>'585','PS'=>'275',
            'PA'=>'591','PG'=>'598','PY'=>'600','PE'=>'604','PH'=>'608','PN'=>'612','PL'=>'616','PT'=>'620','PR'=>'630','QA'=>'634',
            'RE'=>'638','RO'=>'642','RU'=>'643','RW'=>'646','BL'=>'652','SH'=>'654','KN'=>'659','LC'=>'662','MF'=>'663','PM'=>'666',
            'VC'=>'670','WS'=>'882','SM'=>'674','ST'=>'678','SA'=>'682','SN'=>'686','RS'=>'688','SC'=>'690','SL'=>'694','SG'=>'702',
            'SX'=>'534','SK'=>'703','SI'=>'705','SB'=>'090','SO'=>'706','ZA'=>'710','GS'=>'239','SS'=>'728','ES'=>'724','LK'=>'144',
            'SD'=>'729','SR'=>'740','SJ'=>'744','SE'=>'752','CH'=>'756','SY'=>'760','TW'=>'158','TJ'=>'762','TZ'=>'834','TH'=>'764',
            'TL'=>'626','TG'=>'768','TK'=>'772','TO'=>'776','TT'=>'780','TN'=>'788','TR'=>'792','TM'=>'795','TC'=>'796','TV'=>'798',
            'UG'=>'800','UA'=>'804','AE'=>'784','GB'=>'826','US'=>'840','UM'=>'581','UY'=>'858','UZ'=>'860','VU'=>'548','VE'=>'862',
            'VN'=>'704','VG'=>'092','VI'=>'850','WF'=>'876','EH'=>'732','YE'=>'887','ZM'=>'894','ZW'=>'716','XK'=>'983',
        ];
    }
    $cc = strtoupper( $cc );
    return $map[ $cc ] ?? null;
}

/**
 * Pretty country name from ISO 3166-1 alpha-2 code (English).
 * Used by the Geography map tooltips. Best-effort — falls back to the code.
 */
function yourls_country_name( string $cc ): string {
    if ( function_exists( 'yourls_geo_countrycode_to_countryname' ) ) {
        $name = (string) yourls_geo_countrycode_to_countryname( strtoupper( $cc ) );
        if ( $name !== '' ) return $name;
    }
    return strtoupper( $cc );
}

/**
 * Categorise a referrer host into a traffic source category.
 *
 * Returns one of: 'direct', 'social', 'search', 'email', 'qr', 'referral'.
 *  - direct  : no referrer host
 *  - social  : known social platform domain
 *  - search  : known search engine domain
 *  - email   : known webmail / newsletter domain (best-effort)
 *  - qr      : utm_medium tag flagged as 'qr' (caller passes it in)
 *  - referral: anything else
 */
function yourls_classify_source( ?string $host, ?string $utmMedium = null ): string {
    if ( is_string( $utmMedium ) && strtolower( trim( $utmMedium ) ) === 'qr' ) return 'qr';
    if ( $host === null || $host === '' ) return 'direct';

    $host = strtolower( $host );
    static $social = [
        'facebook.com','m.facebook.com','l.facebook.com','fb.com','fb.me',
        'twitter.com','x.com','t.co','mobile.twitter.com',
        'linkedin.com','www.linkedin.com','lnkd.in',
        'instagram.com','l.instagram.com',
        'tiktok.com','www.tiktok.com',
        'reddit.com','www.reddit.com','old.reddit.com','out.reddit.com',
        'pinterest.com','www.pinterest.com','pin.it',
        'youtube.com','www.youtube.com','youtu.be','m.youtube.com',
        'whatsapp.com','wa.me',
        'telegram.org','t.me',
        'snapchat.com',
        'discord.com','discord.gg',
        'mastodon.social','threads.net','bsky.app',
        'news.ycombinator.com',
        'medium.com',
    ];
    static $search = [
        'google.com','www.google.com','google.co.uk','google.fr','google.de','google.it','google.es','google.nl','google.ca','google.com.au','google.co.jp','google.com.br','google.co.in','google.ru',
        'bing.com','www.bing.com',
        'duckduckgo.com',
        'yahoo.com','search.yahoo.com',
        'yandex.com','yandex.ru',
        'baidu.com','www.baidu.com',
        'ecosia.org','startpage.com','qwant.com','brave.com','search.brave.com','kagi.com',
    ];
    static $email = [
        'mail.google.com','outlook.live.com','outlook.office.com','outlook.office365.com',
        'mail.yahoo.com','mail.aol.com','mail.proton.me','protonmail.com',
        'mailchimp.com','sendgrid.net','sendinblue.com','brevo.com','convertkit.com',
        'zoho.com','superhuman.com','fastmail.com',
    ];
    if ( in_array( $host, $social, true ) ) return 'social';
    if ( in_array( $host, $search, true ) ) return 'search';
    if ( in_array( $host, $email,  true ) ) return 'email';

    // suffix matches for google.* and similar
    foreach ( $search as $s ) if ( str_ends_with( $host, '.' . $s ) ) return 'search';
    foreach ( $social as $s ) if ( str_ends_with( $host, '.' . $s ) ) return 'social';

    return 'referral';
}

/**
 * Aggregate clicks by source category. Pulls each (referrer_host, utm_medium)
 * combo and rolls up via yourls_classify_source.
 *
 * @return array<string,int>  category => clicks (ordered desc)
 */
function yourls_get_clicks_by_source_category( string $keyword ): array {
    $sql = 'SELECT referrer_host AS h, utm_medium AS m, COUNT(*) AS c '
         . 'FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k '
         . 'GROUP BY h, m';
    $rows = yourls_get_db( 'read-source_categories' )->fetchAll( $sql, [ 'k' => $keyword ] );
    $out = [ 'direct' => 0, 'social' => 0, 'search' => 0, 'email' => 0, 'qr' => 0, 'referral' => 0 ];
    foreach ( $rows as $r ) {
        $cat = yourls_classify_source( $r['h'] ?? null, $r['m'] ?? null );
        $out[ $cat ] = ( $out[ $cat ] ?? 0 ) + (int) $r['c'];
    }
    arsort( $out );
    return array_filter( $out, fn( $v ) => $v > 0 );
}

/**
 * Top referrers within a category, with optional drill-down.
 *
 * @param string $category one of 'social', 'search', 'email', 'referral'
 * @return array<string,int>
 */
function yourls_get_top_referrers_in_category( string $keyword, string $category, int $limit = 10 ): array {
    $sql = 'SELECT referrer_host AS h, utm_medium AS m, COUNT(*) AS c '
         . 'FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k '
         . 'AND referrer_host IS NOT NULL AND referrer_host != "" '
         . 'GROUP BY h, m';
    $rows = yourls_get_db( 'read-referrers_in_category' )->fetchAll( $sql, [ 'k' => $keyword ] );
    $out = [];
    foreach ( $rows as $r ) {
        $host = (string) $r['h'];
        $cat  = yourls_classify_source( $host, $r['m'] ?? null );
        if ( $cat !== $category ) continue;
        $out[ $host ] = ( $out[ $host ] ?? 0 ) + (int) $r['c'];
    }
    arsort( $out );
    return array_slice( $out, 0, $limit, true );
}

/**
 * Source category daily series for stacked area / multi-line.
 *
 * @return array{labels:array<string>,series:array<string,array<int>>}
 */
function yourls_get_source_categories_trend( string $keyword, int $days = 30 ): array {
    $days = max( 1, min( 90, $days ) );
    $sql = 'SELECT DATE(click_time) AS d, referrer_host AS h, utm_medium AS m, COUNT(*) AS c '
         . 'FROM `' . YOURLS_DB_TABLE_LOG . '` '
         . 'WHERE shorturl = :k AND click_time >= NOW() - INTERVAL :days DAY '
         . 'GROUP BY d, h, m ORDER BY d ASC';
    $rows = yourls_get_db( 'read-source_categories_trend' )->fetchAll( $sql, [ 'k' => $keyword, 'days' => $days ] );

    $labels = [];
    $cursor = new \DateTimeImmutable( '-' . ( $days - 1 ) . ' days', new \DateTimeZone( 'UTC' ) );
    for ( $i = 0; $i < $days; $i++ ) {
        $labels[] = $cursor->format( 'Y-m-d' );
        $cursor   = $cursor->modify( '+1 day' );
    }
    $cats = [ 'direct', 'social', 'search', 'email', 'qr', 'referral' ];
    $series = [];
    foreach ( $cats as $c ) $series[ $c ] = array_fill( 0, $days, 0 );

    foreach ( $rows as $r ) {
        $idx = array_search( (string) $r['d'], $labels, true );
        if ( $idx === false ) continue;
        $cat = yourls_classify_source( $r['h'] ?? null, $r['m'] ?? null );
        $series[ $cat ][ $idx ] += (int) $r['c'];
    }
    // drop empty series
    $series = array_filter( $series, fn( $vals ) => array_sum( $vals ) > 0 );
    return [ 'labels' => $labels, 'series' => $series ];
}

/**
 * Source category × day-of-week heatmap (UTC).
 *
 * @return array<string,array<int,int>>  category => [ dow=>count ]
 */
function yourls_get_source_dow_heatmap( string $keyword, int $days = 30 ): array {
    $days = max( 1, min( 365, $days ) );
    $sql = 'SELECT WEEKDAY(click_time) AS dow, referrer_host AS h, utm_medium AS m, COUNT(*) AS c '
         . 'FROM `' . YOURLS_DB_TABLE_LOG . '` '
         . 'WHERE shorturl = :k AND click_time >= NOW() - INTERVAL :days DAY '
         . 'GROUP BY dow, h, m';
    $rows = yourls_get_db( 'read-source_dow_heatmap' )->fetchAll( $sql, [ 'k' => $keyword, 'days' => $days ] );

    $out = [];
    foreach ( $rows as $r ) {
        $cat = yourls_classify_source( $r['h'] ?? null, $r['m'] ?? null );
        $dow = (int) $r['dow'];
        if ( ! isset( $out[ $cat ] ) ) $out[ $cat ] = array_fill( 0, 7, 0 );
        if ( $dow >= 0 && $dow < 7 ) $out[ $cat ][ $dow ] += (int) $r['c'];
    }
    return $out;
}

/**
 * UTM matrix: source × medium × campaign rollup.
 *
 * @return array<int,array{source:string,medium:string,campaign:string,clicks:int,visitors:int}>
 */
function yourls_get_utm_matrix( string $keyword, int $limit = 50 ): array {
    $sql = 'SELECT '
         . '  COALESCE(utm_source,"(none)") AS source, '
         . '  COALESCE(utm_medium,"(none)") AS medium, '
         . '  COALESCE(utm_campaign,"(none)") AS campaign, '
         . '  COUNT(*) AS clicks, '
         . '  COUNT(DISTINCT COALESCE(visitor_hash, ip_address)) AS visitors '
         . 'FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k '
         . 'AND (utm_source IS NOT NULL OR utm_medium IS NOT NULL OR utm_campaign IS NOT NULL) '
         . 'GROUP BY source, medium, campaign ORDER BY clicks DESC LIMIT :lim';
    $rows = yourls_get_db( 'read-utm_matrix' )->fetchAll( $sql, [ 'k' => $keyword, 'lim' => $limit ] );

    $out = [];
    foreach ( $rows as $r ) {
        $out[] = [
            'source'   => (string) $r['source'],
            'medium'   => (string) $r['medium'],
            'campaign' => (string) $r['campaign'],
            'clicks'   => (int) $r['clicks'],
            'visitors' => (int) $r['visitors'],
        ];
    }
    return $out;
}

/**
 * Top referrers with optional 30-day daily series for sparklines.
 *
 * @return array<int,array{host:string,category:string,clicks:int,visitors:int,sparkline:array<int>}>
 */
function yourls_get_top_referrers_with_trend( string $keyword, int $limit = 20, int $days = 30 ): array {
    // 1) totals + visitors
    $totalsSql = 'SELECT referrer_host AS h, COUNT(*) AS clicks, '
               . 'COUNT(DISTINCT COALESCE(visitor_hash, ip_address)) AS visitors '
               . 'FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = :k '
               . 'AND referrer_host IS NOT NULL AND referrer_host != "" '
               . 'GROUP BY h ORDER BY clicks DESC LIMIT :lim';
    $totals = yourls_get_db( 'read-top_referrers' )->fetchAll( $totalsSql, [ 'k' => $keyword, 'lim' => $limit ] );
    if ( ! $totals ) return [];

    $hosts = array_map( fn( $r ) => (string) $r['h'], $totals );
    $placeholders = implode( ',', array_map( fn( $i ) => ':h' . $i, array_keys( $hosts ) ) );
    $bind = [ 'k' => $keyword, 'days' => $days ];
    foreach ( $hosts as $i => $h ) $bind[ 'h' . $i ] = $h;

    // 2) per-host per-day series
    $trendSql = 'SELECT DATE(click_time) AS d, referrer_host AS h, COUNT(*) AS c '
              . 'FROM `' . YOURLS_DB_TABLE_LOG . '` '
              . 'WHERE shorturl = :k AND click_time >= NOW() - INTERVAL :days DAY '
              . 'AND referrer_host IN (' . $placeholders . ') '
              . 'GROUP BY d, h';
    $trendRows = yourls_get_db( 'read-top_referrers' )->fetchAll( $trendSql, $bind );

    // build label axis
    $labels = [];
    $cursor = new \DateTimeImmutable( '-' . ( $days - 1 ) . ' days', new \DateTimeZone( 'UTC' ) );
    for ( $i = 0; $i < $days; $i++ ) {
        $labels[] = $cursor->format( 'Y-m-d' );
        $cursor = $cursor->modify( '+1 day' );
    }
    $byHost = [];
    foreach ( $hosts as $h ) $byHost[ $h ] = array_fill( 0, $days, 0 );
    foreach ( $trendRows as $r ) {
        $idx = array_search( (string) $r['d'], $labels, true );
        if ( $idx !== false && isset( $byHost[ (string) $r['h'] ] ) ) {
            $byHost[ (string) $r['h'] ][ $idx ] = (int) $r['c'];
        }
    }

    $out = [];
    foreach ( $totals as $r ) {
        $h = (string) $r['h'];
        $out[] = [
            'host'      => $h,
            'category'  => yourls_classify_source( $h, null ),
            'clicks'    => (int) $r['clicks'],
            'visitors'  => (int) $r['visitors'],
            'sparkline' => $byHost[ $h ] ?? array_fill( 0, $days, 0 ),
        ];
    }
    return $out;
}
