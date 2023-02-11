<?php

/** Test encrypting file with passwords containing special chars */
$yourls_user_passwords = array(
    'string'  => 'hello ozh',
    'special' => 'lol .\+*?[^]$(){}=!<>|:-/@',
    '1994'    => '@$*',
    'quote1'  => '"ahah"',
    'quote2'  => "'ahah'",
    'utf8fun' => 'أنا أحب النقانق',
    's[p]e(c)i{a}!@#$%^&*-=l<>,/?' => 'password',
	);

