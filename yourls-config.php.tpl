<?php

define( 'YOURLS_SITE',         '${YOURLS_SITE}' );
define( 'YOURLS_HOURS_OFFSET', 0 );
define( 'YOURLS_LANGUAGE',     'ru_RU' );

define( 'YOURLS_DB_USER',      '${YOURLS_DB_USER}' );
define( 'YOURLS_DB_PASS',      '${YOURLS_DB_PASS}' );
define( 'YOURLS_DB_NAME',      '${YOURLS_DB_NAME}' );
define( 'YOURLS_DB_HOST',      '${YOURLS_DB_HOST}' );
define( 'YOURLS_DB_PREFIX',    '${YOURLS_DB_PREFIX}' );

define( 'YOURLS_PRIVATE',      ${YOURLS_PRIVATE} );

$yourls_user_passwords = array(
  '${YOURLS_USER}' => '${YOURLS_PASS}',
);

define( 'YOURLS_UNIQUE_URLS', true );
define( 'YOURLS_COOKIEKEY',   md5('${YOURLS_SITE}${YOURLS_DB_NAME}${YOURLS_DB_USER}') );
define( 'YOURLS_DEBUG',       false );
