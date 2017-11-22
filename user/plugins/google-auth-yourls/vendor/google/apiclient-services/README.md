Google PHP API Client Services
==============================

## Requirements

[Google API PHP Client](https://github.com/google/google-api-php-client/releases)

## Usage in v2 of Google API PHP Client

This library will be automatically installed with the
[Google API PHP Client](https://github.com/google/google-api-php-client/releases)
via composer. Composer will automatically pull down a monthly tag
from this repository.

If you'd like to always be up-to-date with the latest release, rather than
wait for monthly tagged releases, request the `dev-master` version in composer:

```sh
composer require google/apiclient-services:dev-master
```

## Usage in v1

If you are currently using the [`v1-master`](https://github.com/google/google-api-php-client/tree/v1-master)
branch of the client library, but want to use the latest API services, you can
do so by requiring this library directly into your project via the same composer command:

```sh
composer require google/apiclient-services:dev-master
```
