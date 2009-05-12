<?php

// POST parameters
$post_data = array( 'url' => 'http://planetozh.com/', 'keyword'=>'ozh', 'format'=>'json' );

// Init the CURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1/ozh.in/yourls-api.php");	// URL of the API file
curl_setopt($ch, CURLOPT_HEADER, 0);								// No header in the result
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);					// AUTH with any (best) method available
curl_setopt($ch, CURLOPT_USERPWD, 'ozh:richward');					// login/pwd as defined in config.php
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);						// Return, do not echo result
curl_setopt($ch, CURLOPT_POST, 1);									// This is a POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);					// Data to POST

// Grab URL and return content
$data = curl_exec($ch);
curl_close($ch);

// Echo result (either a new short URL, or an error message beginning with "Error")
echo htmlentities($data);

?>