<?php
global $yourls_user_passwords;
$realm = "*** YOURLS: Your Own URL Shortener ***";
$users = $yourls_user_passwords;

// PHP as CGI fix
// split the user/pass parts
list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':' , base64_decode(substr($_SERVER['REDIRECT_REMOTE_USER'], 6)));

// Normal server: $_SERVER['PHP_AUTH_DIGEST']
// PHP as CGI: $_SERVER['REDIRECT_REMOTE_USER']
$token = isset($_SERVER['PHP_AUTH_DIGEST']) ? $_SERVER['PHP_AUTH_DIGEST'] : $_SERVER['REDIRECT_REMOTE_USER'] ;

// No auth data
if (empty($token)) {
	yourls_auth_headers($realm);
}

if (!($data = yourls_http_digest_parse($token)) || !isset($users[$data['username']])) {
	die('Oops. Invalid request.');
}

$A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
$valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

// Incorrect auth data: try again
if ($data['response'] != $valid_response) {
	yourls_auth_headers($realm);
}
