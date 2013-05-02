#!/bin/bash

# Install YOURLS
mysql -e "create database IF NOT EXISTS yourls;" -uroot;
git clone git://github.com/YOURLS/YOURLS.git
cd YOURLS
git checkout master
copy ../yourls-tests-config-travis.php user/config.php
