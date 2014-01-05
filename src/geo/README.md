GeoIP package for YOURLS
========================

What the hell?
--------------

Text files from this package (GeoIP.dat and geoip.inc) are provided free by
MaxMind. Accuracy is 99.5% so don't sweat it if you get unrealistic results.

If unsure, you can always get the latest version of the GeoIP database
from the following URL: http://www.maxmind.com/app/geolitecountry
(look for a link pointing to a file named "GeoIP.dat.gz")

Flag files from this package come from various sources. Feel free to copy and
redistribute them just as I'm doing :)

How to install this package
---------------------------

* In directory "includes", create a subdirectory "geo", so you have the
following directory structure:   

		[yourls_root]
			  +--admin
			  +--[other directories...]
			  +--includes
				   +--geo

* Put the content of this package (files GeoIP.dat and geoip.inc) into
the freshly created "geo" subdirectory
