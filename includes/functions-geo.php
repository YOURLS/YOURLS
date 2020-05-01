<?php
/**
 * Function relative to the geolocation functions (ip <-> country <-> flags), currently
 * tied to Maxmind's GeoIP but this should evolve to become more pluggable
 */

/**
 * Converts an IP to a 2 letter country code, using GeoIP database if available in includes/geo/
 *
 * @since 1.4
 * @param string $ip IP or, if empty string, will be current user IP
 * @param string $defaut Default string to return if IP doesn't resolve to a country (malformed, private IP...)
 * @return string 2 letter country code (eg 'US') or $default
 */
function yourls_geo_ip_to_countrycode( $ip = '', $default = '' ) {
    // Allow plugins to short-circuit the Geo IP API
    $location = yourls_apply_filter( 'shunt_geo_ip_to_countrycode', false, $ip, $default ); // at this point $ip can be '', check if your plugin hooks in here
    if ( false !== $location )
        return $location;

    // At this point, $location == false

    if ( $ip == '' )
        $ip = yourls_get_IP();

    // Allow plugins to stick to YOURLS internals but provide another DB
    $db = yourls_apply_filter('geo_ip_path_to_db', YOURLS_INC.'/geo/GeoLite2-Country.mmdb');
    if (!is_readable($db)) {
        return $default;
    }

    $reader = new \GeoIp2\Database\Reader($db);
    try {
        $record = $reader->country($ip);
        $location = $record->country->isoCode; // eg 'US'
    } catch (\Exception $e) {
        /*
        Unused for now, Exception and $e->getMessage() can be one of :

        - Exception: \GeoIp2\Exception\AddressNotFoundException
          When: valid IP not found
          Error message: "The address 10.0.0.30 is not in the database"

        - Exception: \InvalidArgumentException
          When: IP is not valid, or DB not readable
          Error message: "The value "10.0.0.300" is not a valid IP address", "The file "/path/to/GeoLite2-Country.mmdb" does not exist or is not readable"

        - Exception: \MaxMind\Db\Reader\InvalidDatabaseException
          When: DB is readable but is corrupt or invalid
          Error message: "The MaxMind DB file's search tree is corrupt"

        - or obviously \Exception for any other error (?)
        */
    }

    if(!$location) {
        $location = $default;
    }

    return yourls_apply_filter( 'geo_ip_to_countrycode', $location, $ip, $default );
}

/**
 * Converts a 2 letter country code to long name (ie AU -> Australia)
 *
 * This associative array is the one used by MaxMind internal functions, it may differ from other lists (eg "A1" does not universally stand for "Anon proxy")
 *
 * @since 1.4
 * @param string $code 2 letter country code, eg 'FR'
 * @return string Country long name (eg 'France') or an empty string if not found
 */
function yourls_geo_countrycode_to_countryname( $code ) {
    // Allow plugins to short-circuit the function
    $country = yourls_apply_filter( 'shunt_geo_countrycode_to_countryname', false, $code );
    if ( false !== $country )
        return $country;

    // Weeeeeeeeeeee
    $countries = array(
        'A1' => 'Anonymous Proxy', 'A2' => 'Satellite Provider', 'AD' => 'Andorra', 'AE' => 'United Arab Emirates', 'AF' => 'Afghanistan',
        'AG' => 'Antigua and Barbuda', 'AI' => 'Anguilla', 'AL' => 'Albania', 'AM' => 'Armenia', 'AO' => 'Angola',
        'AP' => 'Asia/Pacific Region', 'AQ' => 'Antarctica', 'AR' => 'Argentina', 'AS' => 'American Samoa', 'AT' => 'Austria',
        'AU' => 'Australia', 'AW' => 'Aruba', 'AX' => 'Aland Islands', 'AZ' => 'Azerbaijan', 'BA' => 'Bosnia and Herzegovina',
        'BB' => 'Barbados', 'BD' => 'Bangladesh', 'BE' => 'Belgium', 'BF' => 'Burkina Faso', 'BG' => 'Bulgaria',
        'BH' => 'Bahrain', 'BI' => 'Burundi', 'BJ' => 'Benin', 'BL' => 'Saint Barthelemy', 'BM' => 'Bermuda',
        'BN' => 'Brunei Darussalam', 'BO' => 'Bolivia', 'BQ' => 'Bonaire, Saint Eustatius and Saba', 'BR' => 'Brazil', 'BS' => 'Bahamas',
        'BT' => 'Bhutan', 'BV' => 'Bouvet Island', 'BW' => 'Botswana', 'BY' => 'Belarus', 'BZ' => 'Belize',
        'CA' => 'Canada', 'CC' => 'Cocos (Keeling) Islands', 'CD' => 'Congo, The Democratic Republic of the', 'CF' => 'Central African Republic', 'CG' => 'Congo',
        'CH' => 'Switzerland', 'CI' => 'Cote D\'Ivoire', 'CK' => 'Cook Islands', 'CL' => 'Chile', 'CM' => 'Cameroon',
        'CN' => 'China', 'CO' => 'Colombia', 'CR' => 'Costa Rica', 'CU' => 'Cuba', 'CV' => 'Cape Verde',
        'CW' => 'Curacao', 'CX' => 'Christmas Island', 'CY' => 'Cyprus', 'CZ' => 'Czech Republic', 'DE' => 'Germany',
        'DJ' => 'Djibouti', 'DK' => 'Denmark', 'DM' => 'Dominica', 'DO' => 'Dominican Republic', 'DZ' => 'Algeria',
        'EC' => 'Ecuador', 'EE' => 'Estonia', 'EG' => 'Egypt', 'EH' => 'Western Sahara', 'ER' => 'Eritrea',
        'ES' => 'Spain', 'ET' => 'Ethiopia', 'EU' => 'Europe', 'FI' => 'Finland', 'FJ' => 'Fiji',
        'FK' => 'Falkland Islands (Malvinas)', 'FM' => 'Micronesia, Federated States of', 'FO' => 'Faroe Islands', 'FR' => 'France', 'GA' => 'Gabon',
        'GB' => 'United Kingdom', 'GD' => 'Grenada', 'GE' => 'Georgia', 'GF' => 'French Guiana', 'GG' => 'Guernsey',
        'GH' => 'Ghana', 'GI' => 'Gibraltar', 'GL' => 'Greenland', 'GM' => 'Gambia', 'GN' => 'Guinea',
        'GP' => 'Guadeloupe', 'GQ' => 'Equatorial Guinea', 'GR' => 'Greece', 'GS' => 'South Georgia and the South Sandwich Islands', 'GT' => 'Guatemala',
        'GU' => 'Guam', 'GW' => 'Guinea-Bissau', 'GY' => 'Guyana', 'HK' => 'Hong Kong', 'HM' => 'Heard Island and McDonald Islands',
        'HN' => 'Honduras', 'HR' => 'Croatia', 'HT' => 'Haiti', 'HU' => 'Hungary', 'ID' => 'Indonesia',
        'IE' => 'Ireland', 'IL' => 'Israel', 'IM' => 'Isle of Man', 'IN' => 'India', 'IO' => 'British Indian Ocean Territory',
        'IQ' => 'Iraq', 'IR' => 'Iran, Islamic Republic of', 'IS' => 'Iceland', 'IT' => 'Italy', 'JE' => 'Jersey',
        'JM' => 'Jamaica', 'JO' => 'Jordan', 'JP' => 'Japan', 'KE' => 'Kenya', 'KG' => 'Kyrgyzstan',
        'KH' => 'Cambodia', 'KI' => 'Kiribati', 'KM' => 'Comoros', 'KN' => 'Saint Kitts and Nevis', 'KP' => 'Korea, Democratic People\'s Republic of',
        'KR' => 'Korea, Republic of', 'KW' => 'Kuwait', 'KY' => 'Cayman Islands', 'KZ' => 'Kazakhstan', 'LA' => 'Lao People\'s Democratic Republic',
        'LB' => 'Lebanon', 'LC' => 'Saint Lucia', 'LI' => 'Liechtenstein', 'LK' => 'Sri Lanka', 'LR' => 'Liberia',
        'LS' => 'Lesotho', 'LT' => 'Lithuania', 'LU' => 'Luxembourg', 'LV' => 'Latvia', 'LY' => 'Libya',
        'MA' => 'Morocco', 'MC' => 'Monaco', 'MD' => 'Moldova, Republic of', 'ME' => 'Montenegro', 'MF' => 'Saint Martin',
        'MG' => 'Madagascar', 'MH' => 'Marshall Islands', 'MK' => 'Macedonia', 'ML' => 'Mali', 'MM' => 'Myanmar',
        'MN' => 'Mongolia', 'MO' => 'Macau', 'MP' => 'Northern Mariana Islands', 'MQ' => 'Martinique', 'MR' => 'Mauritania',
        'MS' => 'Montserrat', 'MT' => 'Malta', 'MU' => 'Mauritius', 'MV' => 'Maldives', 'MW' => 'Malawi',
        'MX' => 'Mexico', 'MY' => 'Malaysia', 'MZ' => 'Mozambique', 'NA' => 'Namibia', 'NC' => 'New Caledonia',
        'NE' => 'Niger', 'NF' => 'Norfolk Island', 'NG' => 'Nigeria', 'NI' => 'Nicaragua', 'NL' => 'Netherlands',
        'NO' => 'Norway', 'NP' => 'Nepal', 'NR' => 'Nauru', 'NU' => 'Niue', 'NZ' => 'New Zealand',
        'O1' => 'Other', 'OM' => 'Oman', 'PA' => 'Panama', 'PE' => 'Peru', 'PF' => 'French Polynesia',
        'PG' => 'Papua New Guinea', 'PH' => 'Philippines', 'PK' => 'Pakistan', 'PL' => 'Poland', 'PM' => 'Saint Pierre and Miquelon',
        'PN' => 'Pitcairn Islands', 'PR' => 'Puerto Rico', 'PS' => 'Palestinian Territory', 'PT' => 'Portugal', 'PW' => 'Palau',
        'PY' => 'Paraguay', 'QA' => 'Qatar', 'RE' => 'Reunion', 'RO' => 'Romania', 'RS' => 'Serbia',
        'RU' => 'Russian Federation', 'RW' => 'Rwanda', 'SA' => 'Saudi Arabia', 'SB' => 'Solomon Islands', 'SC' => 'Seychelles',
        'SD' => 'Sudan', 'SE' => 'Sweden', 'SG' => 'Singapore', 'SH' => 'Saint Helena', 'SI' => 'Slovenia',
        'SJ' => 'Svalbard and Jan Mayen', 'SK' => 'Slovakia', 'SL' => 'Sierra Leone', 'SM' => 'San Marino', 'SN' => 'Senegal',
        'SO' => 'Somalia', 'SR' => 'Suriname', 'SS' => 'South Sudan', 'ST' => 'Sao Tome and Principe', 'SV' => 'El Salvador',
        'SX' => 'Sint Maarten (Dutch part)', 'SY' => 'Syrian Arab Republic', 'SZ' => 'Swaziland', 'TC' => 'Turks and Caicos Islands', 'TD' => 'Chad',
        'TF' => 'French Southern Territories', 'TG' => 'Togo', 'TH' => 'Thailand', 'TJ' => 'Tajikistan', 'TK' => 'Tokelau',
        'TL' => 'Timor-Leste', 'TM' => 'Turkmenistan', 'TN' => 'Tunisia', 'TO' => 'Tonga', 'TR' => 'Turkey',
        'TT' => 'Trinidad and Tobago', 'TV' => 'Tuvalu', 'TW' => 'Taiwan', 'TZ' => 'Tanzania, United Republic of', 'UA' => 'Ukraine',
        'UG' => 'Uganda', 'UM' => 'United States Minor Outlying Islands', 'US' => 'United States', 'UY' => 'Uruguay', 'UZ' => 'Uzbekistan',
        'VA' => 'Holy See (Vatican City State)', 'VC' => 'Saint Vincent and the Grenadines', 'VE' => 'Venezuela', 'VG' => 'Virgin Islands, British', 'VI' => 'Virgin Islands, U.S.',
        'VN' => 'Vietnam', 'VU' => 'Vanuatu', 'WF' => 'Wallis and Futuna', 'WS' => 'Samoa', 'YE' => 'Yemen',
        'YT' => 'Mayotte', 'ZA' => 'South Africa', 'ZM' => 'Zambia', 'ZW' => 'Zimbabwe',
    );

    $code = strtoupper($code);
    if(array_key_exists($code, $countries)) {
        $name = $countries[$code];
    } else {
        $name = '';
    }

    return yourls_apply_filter( 'geo_countrycode_to_countryname', $name );
}

/**
 * Return flag URL from 2 letter country code
 *
 */
function yourls_geo_get_flag( $code ) {
    if( file_exists( YOURLS_INC.'/geo/flags/flag_'.strtolower($code).'.gif' ) ) {
        $img = yourls_match_current_protocol( yourls_get_yourls_site().'/includes/geo/flags/flag_'.( strtolower( $code ) ).'.gif' );
    } else {
        $img = false;
    }
    return yourls_apply_filter( 'geo_get_flag', $img, $code );
}

