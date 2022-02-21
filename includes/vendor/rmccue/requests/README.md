Requests for PHP
================

[![CS](https://github.com/WordPress/Requests/actions/workflows/cs.yml/badge.svg)](https://github.com/WordPress/Requests/actions/workflows/cs.yml)
[![Lint](https://github.com/WordPress/Requests/actions/workflows/lint.yml/badge.svg)](https://github.com/WordPress/Requests/actions/workflows/lint.yml)
[![Test](https://github.com/WordPress/Requests/actions/workflows/test.yml/badge.svg)](https://github.com/WordPress/Requests/actions/workflows/test.yml)
[![codecov.io](https://codecov.io/gh/WordPress/Requests/branch/stable/graph/badge.svg?token=AfpxK7WMxj&branch=stable)](https://codecov.io/gh/WordPress/Requests?branch=stable)

Requests is a HTTP library written in PHP, for human beings. It is roughly
based on the API from the excellent [Requests Python
library](http://python-requests.org/). Requests is [ISC
Licensed](https://github.com/WordPress/Requests/blob/stable/LICENSE) (similar to
the new BSD license) and has no dependencies, except for PHP 5.6+.

Despite PHP's use as a language for the web, its tools for sending HTTP requests
are severely lacking. cURL has an
[interesting API](https://www.php.net/curl-setopt), to say the
least, and you can't always rely on it being available. Sockets provide only low
level access, and require you to build most of the HTTP response parsing
yourself.

We all have better things to do. That's why Requests was born.

```php
$headers = array('Accept' => 'application/json');
$options = array('auth' => array('user', 'pass'));
$request = WpOrg\Requests\Requests::get('https://api.github.com/gists', $headers, $options);

var_dump($request->status_code);
// int(200)

var_dump($request->headers['content-type']);
// string(31) "application/json; charset=utf-8"

var_dump($request->body);
// string(26891) "[...]"
```

Requests allows you to send  **HEAD**, **GET**, **POST**, **PUT**, **DELETE**, 
and **PATCH** HTTP requests. You can add headers, form data, multipart files, 
and parameters with basic arrays, and access the response data in the same way.
Requests uses cURL and fsockopen, depending on what your system has available, 
but abstracts all the nasty stuff out of your way, providing a consistent API.


Features
--------

- International Domains and URLs
- Browser-style SSL Verification
- Basic/Digest Authentication
- Automatic Decompression
- Connection Timeouts


Installation
------------

### Install with Composer
If you're using [Composer](https://getcomposer.org/) to manage
dependencies, you can add Requests with it.

```sh
composer require rmccue/requests
```

or
```json
{
    "require": {
        "rmccue/requests": "^2.0"
    }
}
```

### Install source from GitHub
To install the source code:
```bash
$ git clone git://github.com/WordPress/Requests.git
```

Next, include the autoloader in your scripts:
```php
require_once '/path/to/Requests/src/Autoload.php';
```

You'll probably also want to register the autoloader:
```php
WpOrg\Requests\Autoload::register();
```

### Install source from zip/tarball
Alternatively, you can fetch a [tarball][] or [zipball][]:

```bash
$ curl -L https://github.com/WordPress/Requests/tarball/stable | tar xzv
(or)
$ wget https://github.com/WordPress/Requests/tarball/stable -O - | tar xzv
```

[tarball]: https://github.com/WordPress/Requests/tarball/stable
[zipball]: https://github.com/WordPress/Requests/zipball/stable


### Using a Class Loader
If you're using a class loader (e.g., [Symfony Class Loader][]) for
[PSR-4][]-style class loading:
```php
$loader = new Psr4ClassLoader();
$loader->addPrefix('WpOrg\\Requests\\', 'path/to/vendor/Requests/src');
$loader->register();
```

[Symfony Class Loader]: https://github.com/symfony/ClassLoader
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4.md


Documentation
-------------
The best place to start is our [prose-based documentation][], which will guide
you through using Requests.

After that, take a look at [the documentation for
`\WpOrg\Requests\Requests::request()`][request_method], where all the parameters are fully
documented.

Requests is [100% documented with PHPDoc](https://requests.ryanmccue.info/api-2.x/).
If you find any problems with it, [create a new
issue](https://github.com/WordPress/Requests/issues/new)!

[prose-based documentation]: https://github.com/WordPress/Requests/blob/stable/docs/README.md
[request_method]: https://requests.ryanmccue.info/api-2.x/classes/WpOrg-Requests-Requests.html#method_request

Testing
-------

Requests strives to have 100% code-coverage of the library with an extensive
set of tests. We're not quite there yet, but [we're getting close][codecov].

[codecov]: https://codecov.io/github/WordPress/Requests/

To run the test suite, first check that you have the [PHP
JSON extension ](https://www.php.net/book.json) enabled. Then
simply:
```bash
$ phpunit
```

If you'd like to run a single set of tests, specify just the name:
```bash
$ phpunit Transport/cURL
```

Contribute
----------

1. Check for open issues or open a new issue for a feature request or a bug.
2. Fork [the repository][] on Github to start making your changes to the
    `develop` branch (or branch off of it).
3. Write one or more tests which show that the bug was fixed or that the feature works as expected.
4. Send in a pull request.

If you have questions while working on your contribution and you use Slack, there is
a [#core-http-api] channel available in the [WordPress Slack] in which contributions can be discussed.

[the repository]: https://github.com/WordPress/Requests
[#core-http-api]: https://wordpress.slack.com/archives/C02BBE29V42
[WordPress Slack]: https://make.wordpress.org/chat/
