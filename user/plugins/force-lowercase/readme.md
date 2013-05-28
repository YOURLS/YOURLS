Plugin for YOURLS 1.5+: Force Lowercase

# What for

Force short urls to lowercase so that http://sho.rt/ABC is the same as http://sho.rt/abc

# How to

* In `/user/plugins`, create a new folder named `force-lowercase`
* Drop these files in that directory
* Go to the Plugins administration page and activate the plugin 
* Have fun

# Disclaimer: this is stupid

Disclaimer: this is **stupid**. The web is case sensitive, http://bit.ly/BLAH is different from http://bit.ly/blah. Deal with it.

More about this: see http://www.w3.org/TR/WD-html40-970708/htmlweb.html and particularly the part that says:
>URLs in general are case-sensitive (with the exception of machine names). There may be URLs, or parts of URLs, where case doesn't matter, but identifying these may not be easy. Users should always consider that URLs are case-sensitive.

This said, lots of users are pestering me for that kind of plugin, so there it is. Have fun breaking the web! :)