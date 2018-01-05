[![Build Status](https://travis-ci.org/google/google-api-php-client.svg?branch=master)](https://travis-ci.org/google/google-api-php-client)

# Google APIs Client Library for PHP #

## Library maintenance
This client library is supported but in maintenance mode only.  We are fixing necessary bugs and adding essential features to ensure this library continues to meet your needs for accessing Google APIs.  Non-critical issues will be closed.  Any issue may be reopened if it is causing ongoing problems.

## Description ##
The Google API Client Library enables you to work with Google APIs such as Google+, Drive, or YouTube on your server.

## Beta ##
This library is in Beta. We're comfortable enough with the stability and features of the library that we want you to build real production applications on it. We will make an effort to support the public and protected surface of the library and maintain backwards compatibility in the future. While we are still in Beta, we reserve the right to make incompatible changes.

## Requirements ##
* [PHP 5.4.0 or higher](http://www.php.net/)

## Google Cloud Platform APIs
If you're looking to call the **Google Cloud Platform** APIs, you will want to use the [Google Cloud PHP](https://github.com/googlecloudplatform/google-cloud-php) library instead of this one.

## Developer Documentation ##
http://developers.google.com/api-client-library/php

## Installation ##

You can use **Composer** or simply **Download the Release**

### Composer

The preferred method is via [composer](https://getcomposer.org). Follow the
[installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have
composer installed.

Once composer is installed, execute the following command in your project root to install this library:

```sh
composer require google/apiclient:^2.0
```

Finally, be sure to include the autoloader:

```php
require_once '/path/to/your-project/vendor/autoload.php';
```

### Download the Release

If you abhor using composer, you can download the package in its entirety. The [Releases](https://github.com/google/google-api-php-client/releases) page lists all stable versions. Download any file
with the name `google-api-php-client-[RELEASE_NAME].zip` for a package including this library and its dependencies.

Uncompress the zip file you download, and include the autoloader in your project:

```php
require_once '/path/to/google-api-php-client/vendor/autoload.php';
```

For additional installation and setup instructions, see [the documentation](https://developers.google.com/api-client-library/php/start/installation).

## Examples ##
See the [`examples/`](examples) directory for examples of the key client features. You can
view them in your browser by running the php built-in web server.

```
$ php -S localhost:8000 -t examples/
```

And then browsing to the host and port you specified
(in the above example, `http://localhost:8000`).

### Basic Example ###

```php
// include your composer dependencies
require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName("Client_Library_Examples");
$client->setDeveloperKey("YOUR_APP_KEY");

$service = new Google_Service_Books($client);
$optParams = array('filter' => 'free-ebooks');
$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

foreach ($results as $item) {
  echo $item['volumeInfo']['title'], "<br /> \n";
}
```

### Authentication with OAuth ###

> An example of this can be seen in [`examples/simple-file-upload.php`](examples/simple-file-upload.php).

1. Follow the instructions to [Create Web Application Credentials](https://developers.google.com/api-client-library/php/auth/web-app#creatingcred)
1. Download the JSON credentials
1. Set the path to these credentials using `Google_Client::setAuthConfig`:

    ```php
    $client = new Google_Client();
    $client->setAuthConfig('/path/to/client_credentials.json');
    ```

1. Set the scopes required for the API you are going to call

    ```php
    $client->addScope(Google_Service_Drive::DRIVE);
    ```

1. Set your application's redirect URI

    ```php
    // Your redirect URI can be any registered URI, but in this example
    // we redirect back to this same page
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $client->setRedirectUri($redirect_uri);
    ```

1. In the script handling the redirect URI, exchange the authorization code for an access token:

    ```php
    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    }
    ```

### Authentication with Service Accounts ###

> An example of this can be seen in [`examples/service-account.php`](examples/service-account.php).

1. Follow the instructions to [Create a Service Account](https://developers.google.com/api-client-library/php/auth/service-accounts#creatinganaccount)
1. Download the JSON credentials
1. Set the path to these credentials using the `GOOGLE_APPLICATION_CREDENTIALS` environment variable:

    ```php
    putenv('GOOGLE_APPLICATION_CREDENTIALS=/path/to/service-account.json');
    ```

1. Tell the Google client to use your service account credentials to authenticate:

    ```php
    $client = new Google_Client();
    $client->useApplicationDefaultCredentials();
    ```

1. Set the scopes required for the API you are going to call

    ```php
    $client->addScope(Google_Service_Drive::DRIVE);
    ```

1. If you have delegated domain-wide access to the service account and you want to impersonate a user account, specify the email address of the user account using the method setSubject:

    ```php
    $client->setSubject($user_to_impersonate);
    ```

### Making Requests ###

The classes used to call the API in [google-api-php-client-services](https://github.com/Google/google-api-php-client-services) are autogenerated. They map directly to the JSON requests and responses found in the [APIs Explorer](https://developers.google.com/apis-explorer/#p/).

A JSON request to the [Datastore API](https://developers.google.com/apis-explorer/#p/datastore/v1beta3/datastore.projects.runQuery) would look like this:

```json
POST https://datastore.googleapis.com/v1beta3/projects/YOUR_PROJECT_ID:runQuery?key=YOUR_API_KEY

{
    "query": {
        "kind": [{
            "name": "Book"
        }],
        "order": [{
            "property": {
                "name": "title"
            },
            "direction": "descending"
        }],
        "limit": 10
    }
}
```

Using this library, the same call would look something like this:

```php
// create the datastore service class
$datastore = new Google_Service_Datastore($client);

// build the query - this maps directly to the JSON
$query = new Google_Service_Datastore_Query([
    'kind' => [
        [
            'name' => 'Book',
        ],
    ],
    'order' => [
        'property' => [
            'name' => 'title',
        ],
        'direction' => 'descending',
    ],
    'limit' => 10,
]);

// build the request and response
$request = new Google_Service_Datastore_RunQueryRequest(['query' => $query]);
$response = $datastore->projects->runQuery('YOUR_DATASET_ID', $request);
```

However, as each property of the JSON API has a corresponding generated class, the above code could also be written like this:

```php
// create the datastore service class
$datastore = new Google_Service_Datastore($client);

// build the query
$request = new Google_Service_Datastore_RunQueryRequest();
$query = new Google_Service_Datastore_Query();
//   - set the order
$order = new Google_Service_Datastore_PropertyOrder();
$order->setDirection('descending');
$property = new Google_Service_Datastore_PropertyReference();
$property->setName('title');
$order->setProperty($property);
$query->setOrder([$order]);
//   - set the kinds
$kind = new Google_Service_Datastore_KindExpression();
$kind->setName('Book');
$query->setKinds([$kind]);
//   - set the limit
$query->setLimit(10);

// add the query to the request and make the request
$request->setQuery($query);
$response = $datastore->projects->runQuery('YOUR_DATASET_ID', $request);
```

The method used is a matter of preference, but *it will be very difficult to use this library without first understanding the JSON syntax for the API*, so it is recommended to look at the [APIs Explorer](https://developers.google.com/apis-explorer/#p/) before using any of the services here.

### Making HTTP Requests Directly ###

If Google Authentication is desired for external applications, or a Google API is not available yet in this library, HTTP requests can be made directly.

The `authorize` method returns an authorized [Guzzle Client](http://docs.guzzlephp.org/), so any request made using the client will contain the corresponding authorization.

```php
// create the Google client
$client = new Google_Client();

/**
 * Set your method for authentication. Depending on the API, This could be
 * directly with an access token, API key, or (recommended) using
 * Application Default Credentials.
 */
$client->useApplicationDefaultCredentials();
$client->addScope(Google_Service_Plus::PLUS_ME);

// returns a Guzzle HTTP Client
$httpClient = $client->authorize();

// make an HTTP request
$response = $httpClient->get('https://www.googleapis.com/plus/v1/people/me');
```

### Caching ###

It is recommended to use another caching library to improve performance. This can be done by passing a [PSR-6](http://www.php-fig.org/psr/psr-6/) compatible library to the client:

```php
$cache = new Stash\Pool(new Stash\Driver\FileSystem);
$client->setCache($cache);
```

In this example we use [StashPHP](http://www.stashphp.com/). Add this to your project with composer:

```
composer require tedivm/stash
```

### Updating Tokens ###

When using [Refresh Tokens](https://developers.google.com/identity/protocols/OAuth2InstalledApp#refresh) or [Service Account Credentials](https://developers.google.com/identity/protocols/OAuth2ServiceAccount#overview), it may be useful to perform some action when a new access token is granted. To do this, pass a callable to the `setTokenCallback` method on the client:

```php
$logger = new Monolog\Logger;
$tokenCallback = function ($cacheKey, $accessToken) use ($logger) {
  $logger->debug(sprintf('new access token received at cache key %s', $cacheKey));
};
$client->setTokenCallback($tokenCallback);
```

### Debugging Your HTTP Request using Charles ###

It is often very useful to debug your API calls by viewing the raw HTTP request. This library supports the use of [Charles Web Proxy](https://www.charlesproxy.com/documentation/getting-started/). Download and run Charles, and then capture all HTTP traffic through Charles with the following code:

```php
// FOR DEBUGGING ONLY
$httpClient = new GuzzleHttp\Client([
    'proxy' => 'localhost:8888', // by default, Charles runs on localhost port 8888
    'verify' => false, // otherwise HTTPS requests will fail.
]);

$client = new Google_Client();
$client->setHttpClient($httpClient);
```

Now all calls made by this library will appear in the Charles UI.

One additional step is required in Charles to view SSL requests. Go to **Charles > Proxy > SSL Proxying Settings** and add the domain you'd like captured. In the case of the Google APIs, this is usually `*.googleapis.com`.

### Service Specific Examples ###

YouTube: https://github.com/youtube/api-samples/tree/master/php

## How Do I Contribute? ##

Please see the [contributing](CONTRIBUTING.md) page for more information. In particular, we love pull requests - but please make sure to sign the [contributor license agreement](https://developers.google.com/api-client-library/php/contribute).

## Frequently Asked Questions ##

### What do I do if something isn't working? ###

For support with the library the best place to ask is via the google-api-php-client tag on StackOverflow: http://stackoverflow.com/questions/tagged/google-api-php-client

If there is a specific bug with the library, please [file a issue](https://github.com/google/google-api-php-client/issues) in the Github issues tracker, including an example of the failing code and any specific errors retrieved. Feature requests can also be filed, as long as they are core library requests, and not-API specific: for those, refer to the documentation for the individual APIs for the best place to file requests. Please try to provide a clear statement of the problem that the feature would address.

### I want an example of X! ###

If X is a feature of the library, file away! If X is an example of using a specific service, the best place to go is to the teams for those specific APIs - our preference is to link to their examples rather than add them to the library, as they can then pin to specific versions of the library. If you have any examples for other APIs, let us know and we will happily add a link to the README above!

### Why do you still support 5.2? ###

When we started working on the 1.0.0 branch we knew there were several fundamental issues to fix with the 0.6 releases of the library. At that time we looked at the usage of the library, and other related projects, and determined that there was still a large and active base of PHP 5.2 installs. You can see this in statistics such as the PHP versions chart in the WordPress stats: http://wordpress.org/about/stats/. We will keep looking at the types of usage we see, and try to take advantage of newer PHP features where possible.

### Why does Google_..._Service have weird names? ###

The _Service classes are generally automatically generated from the API discovery documents: https://developers.google.com/discovery/. Sometimes new features are added to APIs with unusual names, which can cause some unexpected or non-standard style naming in the PHP classes.

### How do I deal with non-JSON response types? ###

Some services return XML or similar by default, rather than JSON, which is what the library supports. You can request a JSON response by adding an 'alt' argument to optional params that is normally the last argument to a method call:

```
$opt_params = array(
  'alt' => "json"
);
```

### How do I set a field to null? ###

The library strips out nulls from the objects sent to the Google APIs as its the default value of all of the uninitialized properties. To work around this, set the field you want to null to `Google_Model::NULL_VALUE`. This is a placeholder that will be replaced with a true null when sent over the wire.

## Code Quality ##

Run the PHPUnit tests with PHPUnit. You can configure an API key and token in BaseTest.php to run all calls, but this will require some setup on the Google Developer Console.

    phpunit tests/

### Coding Style

To check for coding style violations, run

```
vendor/bin/phpcs src --standard=style/ruleset.xml -np
```

To automatically fix (fixable) coding style violations, run

```
vendor/bin/phpcbf src --standard=style/ruleset.xml
```
