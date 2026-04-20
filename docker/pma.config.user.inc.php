<?php

ini_set('session.gc_maxlifetime', 43200);
$cfg['LoginCookieValidity'] = 43200;
$cfg['VersionCheck'] = false;

$cfg['Servers'][1]['host'] = 'db';
$cfg['Servers'][1]['auth_type'] = 'config';
$cfg['Servers'][1]['user'] = getenv('MYSQL_USER');
$cfg['Servers'][1]['password'] = getenv('MYSQL_PASSWORD');

$cfg['Servers'][2]['host'] = 'db-test';
$cfg['Servers'][2]['auth_type'] = 'config';
$cfg['Servers'][2]['user'] = getenv('MYSQL_USER');
$cfg['Servers'][2]['password'] = getenv('MYSQL_PASSWORD');
