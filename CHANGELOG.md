YOURLS Changelog
================

_This file lists the main changes through all versions of YOURLS.  
For a much more detailed list, simply refer to [commit messages](https://github.com/YOURLS/YOURLS/commits/master)._

1.10.0
---
- added: Support PHP 8.3 & 8.4
- removed: Support for PHP prior to 8.1 which is now minimal requirement
- changed: Ensure all `statusCode`/`errorCode` API values are strings (#3756)
- fixed: Results with 0 clicks on search (#3589)
- fixed: Upgrade Aura.SQL to fix PHP 8.4 compatibility (#3852)
- fixed: login page accessibility (#3660)
- fixed: MySQL 8+ compatibility (#3828)
- changed: Upgrade dependencies
- changed: Update GeoIP DB
- changed: Update certificates

1.9.2
---
- added: Support PHP 8.2 (#3474)
- improved: Googlebot indexing now filterable for plugins, for your SEO needs (#3517)
- improved: Use safe sandbox for all included files (#3478)
- fixed: bookmarklets with URL containing special chars (#3527)
- fixed: unwanted cookies could interfere with YOURLS (#3516)
- fixed: cosmetic bugs in the admin interface (#3485, #3431, #3518)
- fixed: support usernames containing brackets (#3365)
- updated: third party libs and binaries

1.9.1
---
- fixed: error `Undefined constant "intval"` when upgrading (#3332)
- fixed: warnings on PHP 8.1 (#3317)
- fixed: incorrect HTTP status header with the API when shortening a duplicate (#3355)
- fixed: no hyphen in random keywords (#3353)
- added: required/suggested PHP extensions in composer.json (#3339)
- updated: third party libs and binaries

1.9
---
- removed : support for PHP prior to 7.4
- improved: the API plugin with more plugin functions (#3281), a sandbox and a plugin uninstall procedure (#3282)
- improved: inline documentation, [online documentation](https://docs.yourls.org/) and unit tests
- improved: concurrency during mass shortening (#3233)
- improved: minor security fixes - sanitize step name during upgrade (#3055),
    nonce on the logout link (#3264), salt cookie with newer hash (#3278)
- improved: Remove ozh/phpass library and use native PHP password_* functions (#3232)
- added: more hooks in the admin view & search (#3265)
- fixed: incorrect notice when "prefix and shorten" while not logged in (#3189)
- fixed: UI sometimes not responsive after editing a URL (#3244)

1.8.2
---
- fixed: display SVG logo for IE 11 (#2864)
- fixed (again) : DB upgrade procedure (#2933)
- fixed: cosmetic issue with Docker falsely warning about unencrypted password (#3040)
- improved: minor security improvements - iframes clickjacking and login nonce (#3034), potential XSS (#3041)
- improved: SSL support for proxies (#3044)
- improved: inline documentation and unit tests
- added: more filters in admin pages (#2912), HTTP requests (#2951), to deal with user defined consts (#3048)
- added: documentation for API action "version" (#2957)

1.8.1
---
- fixed: upgrade procedure with MySQL 8 & table names containing dashes (#2844, #2846) 
- fixed: function to make public some pages on private installs (#2859)
- added: `all` hook to debug YOURLS and plugins (#2860)
- improved: plugin inline documentation

1.8
---
- fixed: support for PHP 8
- removed : support for PHP prior to 7.2
- improved: IDN domain, and UTF8 URLs and titles (aka Number One Issue Since Day One)
- improved: timezone management
- improved: YOURLS UI and logo, now in SVG
- improved: several little things
- fixed: several little bugs

1.7.9
---
- improved: compatibility of YOURLS with proxies and reversed proxies
- improved: accept timestamped signature in API requests with [arbitrary hash](https://docs.yourls.org/guide/advanced/passwordless-api.html#use-other-hash-algorithms-than-md5)
- improved: YOURLS pages are now located in `user/` and [documented](https://docs.yourls.org/guide/extend/pages.html)
- improved: accessibility, with labels and aria tags in the main admin screen
- fixed: various little things here and also there

1.7.6
---
- improved: due to popular demand, "Random Keywords" is now a core plugin bundled with YOURLS
- fixed: JSONP parameters now match the documentation, duh
- fixed: various little things here and also there

1.7.5
---
- fixed: long referrers or client name won't trigger errors
- fixed: some little bugs

1.7.4
---
- fixed: type juggling vulnerability in the API
- improved: several little things and several little updates
- dropped: PHP <= 5.5 support

1.7.3
---
- improved: some little things
- added: some hooks here and there to allow more pluginness
- fixed: some little bugs
- updated: jquery and some javascript stuff

1.7.2
---
- improved: stat graphs, regarding accuracy and time zones
- improved: navigation in the admin interface
- improved: several little things
- fixed: several little bugs
- updated: all third party libs
- dropped: PHP 5.2 support

1.7.1
---
- added: compatibility with PHP 7
- added: allow hooks with closures (see [Advanced Hook Syntax](https://docs.yourls.org/development/hooks.html))
- improved: you can now search across all fields at once in the admin interface
- improved: bookmarklets are now human readable in the PHP source, and minified on the fly
- improved, still not perfect: support for URLs and page titles with encoded chars
- fixed: timezone warnings
- fixed: cookie mismatch preventing login when multiple YOURLS installs on subdomains of the same domain
- fixed: lotsa bugs
- improved: lotsa things

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
