## Server requirements

1.  A server with **mod_rewrite** enabled
2.  At least **PHP 5.2**
3.  At least **MYSQL 4.1**
4.  _Note_: YOURLS can also run on [Nginx](http://www.packetcollision.com/2012/01/27/yourls-and-nginx-an-updated-config/) and [Cherokee](http://www.ututech.com/2010/10/configuring-yourls-to-work-with-cherokee-web-server/)

## Server recommendations

*   PHP [CURL extension](http://www.php.net/curl) installed if you plan on playing with the API

## Limitations

*   Maximum length of custom keyword is **200 characters**
*   That makes about **8 sexdecillions of centillions** of available URLs ([seriously](http://en.wikipedia.org/wiki/Names_of_large_numbers). That's a 355 digits number).

## Difference Between Base 36 And Base 62 Encoding

*   Base 36 encoding uses `0123456789abcdefghijklmnopqrstuvwxyz` for short URLs
*   Base 62 encoding uses `0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz`
*   Stick to one setting, don't change after you've created links as it will change all your short URLs!
*   Base 36 is the default and should be picked if you're not sure.

## Getting a short domain name for your YOURLS install

*   Unless you plan on making it public and as popular as bit.ly, any shared hosting will be fine. Ozh runs all his YOURLS instance on [Dreamhost](http://yourls.org/dreamhost) and it works just great.
*   [Domainr](http://domai.nr/) is a fun search tool that might inspire and help you
*   Aim for exotic top level domains (.in, .im, .li ...), they're often cheap and a lot are still available. [Gandi](https://www.gandi.net/domain/buy/search/) is a pretty comprehensive registrar, for instance.

## YOURLS needs its own .htaccess

*   You cannot install YOURLS and, say, WordPress, in the same directory. Both need to handle URLs differently and need their own `.htaccess` file.
*   If you want to install YOURLS on the same domain than your blog, give it its own (short) subdirectory, such as yourblog.com/s/ (for "short") or yourblog.com/x/ (for "exit")

## If YOURLS generates 404 for your short URLs

*   Make sure **mod_rewrite** is enabled with your Apache server
*   Make sure your .htaccess file looks like [this one](http://yourls.org/htaccess)
*   Eventually, check your server Apache configuration allows use of .htaccess (`AllowOverride All` directive, ask your server admin)

## There is no index page at the root of the install

*   Indeed. It's intented. It's up to the user to make what they need. Some will redirect the root to a different place, some make a public interface for anyone to shorten links, some make a portfolio. You make it.
*   If you want to make a public interface and run your own little bitly.com, there's a sample file provided as an example: `sample-public-front-page.txt`. This implies important issues to deal with: spam, performance and security. Read [Public Shortening](http://yourls.org/public) for important information.

## Uppercase letters in short URLs are eaten up, eg "`OmgOzh`" becomes "`mgzh`" !

*   Indeed. It's intented if you selected Base 36 (see above). Letters that don't belong to the character set, eg `@#!` or `ABC`, are removed.
*   If you want to force lowercase, you'll need a [plugin](http://yourls.org/pluginlist).

## Feedback, feature requests and bug reporting

1.  Please don't get in touch directly by mail or Twitter. [Please](http://yourls.org/support).
2.  Check the [Road Map](http://yourls.org/roadmap) for future features.
3.  Read all the [wiki documents](http://yourls.org/wiki).
4.  Search in all the [issues](http://yourls.org/issues), open and closed.
5.  Eventually raise a new issue. To do so, please read the [contribute guidelines](http://yourls.org/contribute). Thanks!
