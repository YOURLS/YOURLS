# http_build_url() for PHP

[![Tests](https://github.com/ozh/http_build_url/actions/workflows/test.yml/badge.svg)](https://github.com/ozh/http_build_url/actions/workflows/test.yml)

An implementation of [`http_build_url()`](https://www.php.net/manual/en/function.http-build-url.php),
the URL builder from the `pecl_http` extension, for environments where that
extension isn't installed.

## About this fork

The original package, [jakeasmith/http_build_url](https://github.com/jakeasmith/http_build_url),
was abandoned in favor of the URI API built into PHP 8.5. That's good advice for new
code, but plenty of existing projects still call `http_build_url()` and just need
it to keep working on modern PHP. So this fork picks up maintenance:

- published on Packagist as **`ozh/http_build_url`**
- PHP 8.1+ only, typed signature, tested up to PHP 8.5
- same behavior and same function name as the original, so switching is a one-line
  change in `composer.json`

If you are starting fresh on PHP 8.5+, use [`Uri\Rfc3986\Uri`](https://www.php.net/manual/en/class.uri-rfc3986-uri.php)
instead; see [Modern alternative](#modern-alternative) below.

## Install

```sh
composer require ozh/http_build_url
```

## Usage

```php
http_build_url(
    string|array $url,
    string|array|null $parts = [],
    int $flags = HTTP_URL_REPLACE,
    ?array &$new_url = null
): string
```

`$url` and `$parts` are each either a URL string or an associative array in the
shape `parse_url()` returns. The parts of `$parts` are merged into `$url`
according to `$flags`. If `$new_url` is passed, it is filled with the parts of
the resulting URL, as `parse_url()` would return them.

```php
// Replace parts of a URL (the default)
echo http_build_url('http://example.com/some/path?a=b', ['host' => 'example.org']);
// http://example.org/some/path?a=b

// Join a relative path, merge the query string, drop auth and fragment
echo http_build_url(
    'http://user@www.example.com/pub/index.php?a=b#files',
    [
        'scheme' => 'ftp',
        'host'   => 'ftp.example.com',
        'path'   => 'files/current/',
        'query'  => 'a=c',
    ],
    HTTP_URL_STRIP_AUTH | HTTP_URL_JOIN_PATH | HTTP_URL_JOIN_QUERY | HTTP_URL_STRIP_FRAGMENT
);
// ftp://ftp.example.com/pub/files/current/?a=c

// Get the composed parts back
http_build_url('http://example.com/path?a=b', [], HTTP_URL_STRIP_QUERY, $parts);
// $parts === ['scheme' => 'http', 'host' => 'example.com', 'path' => '/path']
```

### Flags

| Constant                   | Effect                                                     |
|----------------------------|------------------------------------------------------------|
| `HTTP_URL_REPLACE`         | Replace every part given in `$parts` (default)              |
| `HTTP_URL_JOIN_PATH`       | Join the path of `$parts` onto the path of `$url`           |
| `HTTP_URL_JOIN_QUERY`      | Merge the query strings of `$url` and `$parts`              |
| `HTTP_URL_STRIP_USER`      | Strip the user                                              |
| `HTTP_URL_STRIP_PASS`      | Strip the password                                          |
| `HTTP_URL_STRIP_AUTH`      | Strip user and password                                     |
| `HTTP_URL_STRIP_PORT`      | Strip the port                                              |
| `HTTP_URL_STRIP_PATH`      | Strip the path                                              |
| `HTTP_URL_STRIP_QUERY`     | Strip the query string                                      |
| `HTTP_URL_STRIP_FRAGMENT`  | Strip the fragment                                          |
| `HTTP_URL_STRIP_ALL`       | Strip everything but scheme and host                        |

Scheme and host given in `$parts` are always applied, regardless of flags. The
constants are defined only if they don't already exist, and use the same values
as `pecl_http`.

## Modern alternative

On PHP 8.5+, the built-in URI API covers most of the same ground:

```php
use Uri\Rfc3986\Uri;

echo Uri::parse('https://example.com/search?q=php#top')
    ->withPath('/docs')
    ->withQuery('page=2')
    ->withFragment(null)
    ->toString();
// https://example.com/docs?page=2
```

## Tests

```sh
composer install
vendor/bin/phpunit
```

## License

MIT, as the original. See [LICENSE](LICENSE).
