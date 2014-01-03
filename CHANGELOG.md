YOURLS Changelog
================

_This file lists the main changes through all versions of YOURLS.  
For a much more detailed list, simply refer to [commit messages](https://github.com/YOURLS/YOURLS/commits/master)._

1.7
---
- added: support for PDO and MySQLi
- added: social bookmarklets - share on Twitter, Facebook or Tumblr in a click
- added: check api.yourls.org if a new version of YOURLS is available
- added: proxy support - install YOURLS behind a firewall!
- improved: security regarding SQL injections
- improved: security regarding your credentials - now auto-encrypted
- improved: external HTTP request handling
- improved: ƒυηкƴ UTF-8 titles handling
- fixed: compatibility with Apache mod_security blocking bookmarklets
- fixed: lots of bugs

1.6
---
- added: مرحبا العالم! Hej verden! 你好世界! Kumusta mundo! Ciao mondo! Hello world! Translation API.
- added: custom API actions
- added: support for URLs with common protocols
- fixed: search and pagination in the admin interface
- updated: third party libs jQuery, ezSQL, GeoIP
- improved: sanitizing and escaping functions

1.5.1
-----
- added: full jsonp support
- added: ability to use encrypted passwords in the config file
- fixed: support for http://www.sho.rt/bleh and http://sho.rt/bleh
- added: support for any favicon dropped in the /user directory
- updated: Google Visualization API instead of deprecated Google Charts
- fixed: bugs, bugs, bugs
- added: hooks, hooks, hooks
- improved: things, things, things

1.5
---
- added: plugin architecture! OMG plugins!!1!!1!
- added: directory /user, config.php can be moved there
- added: new "instant bookmarklets"
- added: 1 click copy-to-clipboard a la bitly
- change in logic: now all request are handled by PHP and don't rely on .htaccess
- added: saving URL titles
- added: support for prefix-n-shorten: sho.rt/http://example.com/
- added: core plugin to allow hyphens in URLs
- added: core sample plugin to wrap redirected URLs in a social toolbar
- added: core sample plugin to show how to create administration page in plugins
- added: core plugin to display a random pretty background
- changed: layout now using a more consistent palette, see http://yourls.org/palette
- added: anti XSS and anti CSRF measures
- added: interactive map if possible in stat traffic by countries
- fixed: lots of bugs

1.4.3
-----
- fixed bug no-stats-showing-ffs due to inconsistency in DB schema
- improve error reporting with API method url-stat

1.4.2
-----
- fixed: bug in auth function
- added: sample public API file
- added: check in API requests for WordPress plugin when adding a new short URL
- prettier sample public interface

1.4.1
-----
- fixed: base 62 URLs (keywords with MiXeD CaSe)
- new & secure auth method for API calls, with no need to use login & password combo
- allow SSL enforcement for admin pages
- new API method: stats for individual URL.
- prevent internal redirection loops
- filter and search URLs & short URLs by date

1.4
---
- added: an upgrader from 1.3 to 1.4
- change in logic: now using a global object $ydb for everything related to DB and other globally needed stuff
- change in logic: include "load-yourls.php" instead of "config.php" to start engine
- change in DB schema: now storing URLs with their keyword as used in shorturl, allowing for any keyword length
- change in DB schema: new table for storing various options including next_id, dropping table of the same name
- change in DB schema: new table for storing hits (for stats)
- improved the installer, with .htaccess file creation
- layout tweak: now prettier, isn't it?
- stats! OMG stats!

1.3-RC1
-------
- added bookmarklet and tools page
- improved XSS filter when adding new URL
- code cleanup in admin/index.php to separate code and display
- added favicon
- stricter coding to prevent notices with undefined indexes
- hide PHP notices & SQL errors & warnings, unless YOURLS_DEBUG constant set to true

1.2
---
- don't remember. A few tiny stuff for sure.

1.1
---
- don't remember. Some little bugs I guess.

1.0.1
-----
- don't remember. Trivial stuff probably.

1.0
---
- initial release
