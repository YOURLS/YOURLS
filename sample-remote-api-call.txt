<?php

/*
 * YOURLS : sample file showing how to use the API
 * This shows how to tap into your YOURLS install API from *ANOTHER* server
 * not from a file hosted on the same server. It's just a bit dumb to make a
 * remote HTTP request to the server the request originates from.
 *
 * Rename to .php
 *
 */

// EDIT THIS: your auth parameters
$username = 'joe';
$password = '123456';

// EDIT THIS: the query parameters
$url     = 'http://planetozh.com/blog/'; // URL to shrink
$keyword = 'ozh';                        // optional keyword
$title   = 'Super blog!';                // optional, if omitted YOURLS will lookup title with an HTTP request
$format  = 'json';                       // output format: 'json', 'xml' or 'simple'

// EDIT THIS: the URL of the API file
$api_url = 'http://your-own-domain-here.com/yourls-api.php';

// Init the CURL session
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, $api_url );
curl_setopt( $ch, CURLOPT_HEADER, 0 );            // No header in the result
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); // Return, do not echo result
curl_setopt( $ch, CURLOPT_POST, 1 );              // This is a POST request
curl_setopt( $ch, CURLOPT_POSTFIELDS, array(      // Data to POST
		'url'      => $url,
		'keyword'  => $keyword,
		'title'    => $title,
		'format'   => $format,
		'action'   => 'shorturl',
		'username' => $username,
		'password' => $password
	) );

// Fetch and return content
$data = curl_exec($ch);
curl_close($ch);

// Do something with the result. Here, we just echo it.
echo $data;

