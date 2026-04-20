<?php

/*
 ** MySQL settings - You can get this info from your web host
 */

/** MySQL database username */
define('YOURLS_DB_USER', 'yourlsUser');

/** MySQL database password */
define('YOURLS_DB_PASS', 'yourlsUserPassword');

/** The name of the database for YOURLS
 ** Use lower case letters [a-z], digits [0-9] and underscores [_] only */
define('YOURLS_DB_NAME', 'yourlsDB');

/** MySQL hostname.
 ** If using a non standard port, specify it like 'hostname:port', e.g. 'localhost:9999' or '127.0.0.1:666' */
define('YOURLS_DB_HOST', 'db');

/** MySQL tables prefix
 ** YOURLS will create tables using this prefix (eg `yourls_url`, `yourls_options`, ...)
 ** Use lower case letters [a-z], digits [0-9] and underscores [_] only */
define('YOURLS_DB_PREFIX', 'yourls_');

/*
 ** Site options
 */

/** YOURLS installation URL
 ** All lowercase, no trailing slash at the end.
 ** If you define it to "http://sho.rt", don't use "http://www.sho.rt" in your browser (and vice-versa)
 ** To use an IDN domain (eg http://héhé.com), write its ascii form here (eg http://xn--hh-bjab.com) */
define('YOURLS_SITE', 'https://localhost');

/** YOURLS language
 ** Change this setting to use a translation file for your language, instead of the default English.
 ** That translation file (a .mo file) must be installed in the user/language directory.
 ** See http://yourls.org/translations for more information */
define('YOURLS_LANG', '');

/** Allow multiple short URLs for a same long URL
 ** Set to true to have only one pair of shortURL/longURL (default YOURLS behavior)
 ** Set to false to allow multiple short URLs pointing to the same long URL (bit.ly behavior) */
define('YOURLS_UNIQUE_URLS', false);

/** Private means the Admin area will be protected with login/pass as defined below.
 ** Set to false for public usage (eg on a restricted intranet or for test setups)
 ** Read http://yourls.org/privatepublic for more details if you're unsure */
define('YOURLS_PRIVATE', true);

/** A random secret hash used to encrypt cookies. You don't have to remember it, make it long and complicated
 ** Hint: copy from http://yourls.org/cookie */
define('YOURLS_COOKIEKEY', 'cw9Q](M_hNcgEhqz3YZ0{LX(yY%HMvZna[4rBgNC');

/** Username(s) and password(s) allowed to access the site. Passwords either in plain text or as encrypted hashes
 ** YOURLS will auto encrypt plain text passwords in this file
 ** Read http://yourls.org/userpassword for more information */
$yourls_user_passwords = [
    'root' => 'phpass:!2y!10!ReBEcmyyweixxgYka/L1QeLx05tFzaU9oVF2CX1r/lWEdWBwtKgGy'
    /* Password encrypted by YOURLS */,
];

/** URL shortening method: either 36 or 62
 ** 36: generates all lowercase keywords (ie: 13jkm)
 ** 62: generates mixed case keywords (ie: 13jKm or 13JKm)
 ** For more information, see https://yourls.org/urlconvert */
define('YOURLS_URL_CONVERT', 36);

/** Debug mode to output some internal information
 ** Default is false for live site. Enable when coding or before submitting a new issue */
define('YOURLS_DEBUG', true);

/**
 * Reserved keywords (so that generated URLs won't match them)
 * Define here negative, unwanted or potentially misleading keywords.
 */
$yourls_reserved_URL = [
    'porn',
    'pron',
    'faggot',
    'sex',
    'nigger',
    'fuck',
    'cunt',
    'dick',
    'white',
    'trash',
    'arabic',
    'islam',
    'jew',
    'christian',
    'jesus',
];

/*
 ** Personal settings would go after here.
 */
