<?php

// Send a message to Twitter. Returns boolean for success or failure.
function wp_ozh_yourls_tweet_it($username, $password, $message){

    $host = "http://twitter.com/statuses/update.xml?status=".urlencode(stripslashes(urldecode($message)));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $host);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 1);

    // Go for it!!!
    $result = curl_exec($ch);
    // Look at the returned header
    $resultArray = curl_getinfo($ch);

    // close curl
    curl_close($ch);

    //echo "http code: ".$resultArray['http_code']."<br />";
	return ($resultArray['http_code'] == "200");

}
