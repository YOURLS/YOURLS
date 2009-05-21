<?php

/*
 * YOURLS : sample file showing how to use the API
 */

// EDIT THIS: your auth parameters
$username = 'joe';
$password = '123456';

// EDIT THIS: the query parameters
$url = 'http://planetozh.com/caca'; // URL to shrink
$keyword = 'caca';				// optional keyword
$format = 'json';				// output format: 'json', 'xml' or 'simple'

// EDIT THIS: the URL of the API file
$api_url = 'http://127.0.0.1/ozh.in/yourls-api.php';

// Init the CURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_HEADER, 0);            // No header in the result
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return, do not echo result
curl_setopt($ch, CURLOPT_POST, 1);              // This is a POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, array(     // Data to POST
		'url'      => $url,
		'keyword'  => $keyword,
		'format'   => $format,
		'username' => $username,
		'password' => $password
	));

// Fetch and return content
$data = curl_exec($ch);
curl_close($ch);

// Do something with the result. Here, we just echo it.
echo $data;

?>