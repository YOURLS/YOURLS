#!/bin/bash

# Install YOURLS
mysql -e "create database IF NOT EXISTS yourls;" -uroot;
git clone git://github.com/YOURLS/YOURLS.git
sh -c "cd YOURLS"
git checkout master
sh -c "cp ../yourls-tests-config-travis.php user/config.php"
