<?php
/*
 * Copyright 2015 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Auth\Credentials;

/*
 * The AppIdentityService class is automatically defined on App Engine,
 * so including this dependency is not necessary, and will result in a
 * PHP fatal error in the App Engine environment.
 */
use google\appengine\api\app_identity\AppIdentityService;
use Google\Auth\CredentialsLoader;

/**
 * AppIdentityCredentials supports authorization on Google App Engine.
 *
 * It can be used to authorize requests using the AuthTokenMiddleware or
 * AuthTokenSubscriber, but will only succeed if being run on App Engine:
 *
 *   use Google\Auth\Credentials\AppIdentityCredentials;
 *   use Google\Auth\Middleware\AuthTokenMiddleware;
 *   use GuzzleHttp\Client;
 *   use GuzzleHttp\HandlerStack;
 *
 *   $gae = new AppIdentityCredentials('https://www.googleapis.com/auth/books');
 *   $middleware = new AuthTokenMiddleware($gae);
 *   $stack = HandlerStack::create();
 *   $stack->push($middleware);
 *
 *   $client = new Client([
 *       'handler' => $stack,
 *       'base_uri' => 'https://www.googleapis.com/books/v1',
 *       'auth' => 'google_auth'
 *   ]);
 *
 *   $res = $client->get('volumes?q=Henry+David+Thoreau&country=US');
 */
class AppIdentityCredentials extends CredentialsLoader
{
    /**
     * Result of fetchAuthToken.
     *
     * @array
     */
    protected $lastReceivedToken;

    /**
     * Array of OAuth2 scopes to be requested.
     */
    private $scope;

    public function __construct($scope = array())
    {
        $this->scope = $scope;
    }

    /**
     * Determines if this an App Engine instance, by accessing the
     * SERVER_SOFTWARE environment variable (prod) or the APPENGINE_RUNTIME
     * environment variable (dev).
     *
     * @return true if this an App Engine Instance, false otherwise
     */
    public static function onAppEngine()
    {
        $appEngineProduction = isset($_SERVER['SERVER_SOFTWARE']) &&
            0 === strpos($_SERVER['SERVER_SOFTWARE'], 'Google App Engine');
        if ($appEngineProduction) {
            return true;
        }
        $appEngineDevAppServer = isset($_SERVER['APPENGINE_RUNTIME']) &&
            $_SERVER['APPENGINE_RUNTIME'] == 'php';
        if ($appEngineDevAppServer) {
            return true;
        }
        return false;
    }

    /**
     * Implements FetchAuthTokenInterface#fetchAuthToken.
     *
     * Fetches the auth tokens using the AppIdentityService if available.
     * As the AppIdentityService uses protobufs to fetch the access token,
     * the GuzzleHttp\ClientInterface instance passed in will not be used.
     *
     * @param callable $httpHandler callback which delivers psr7 request
     *
     * @return array the auth metadata:
     *  array(2) {
     *   ["access_token"]=>
     *   string(3) "xyz"
     *   ["expiration_time"]=>
     *   string(10) "1444339905"
     *  }
     *
     * @throws \Exception
     */
    public function fetchAuthToken(callable $httpHandler = null)
    {
        if (!self::onAppEngine()) {
            return array();
        }

        if (!class_exists('google\appengine\api\app_identity\AppIdentityService')) {
            throw new \Exception(
                'This class must be run in App Engine, or you must include the AppIdentityService '
                . 'mock class defined in tests/mocks/AppIdentityService.php'
            );
        }

        // AppIdentityService expects an array when multiple scopes are supplied
        $scope = is_array($this->scope) ? $this->scope : explode(' ', $this->scope);

        $token = AppIdentityService::getAccessToken($scope);
        $this->lastReceivedToken = $token;

        return $token;
    }

    /**
     * @return array|null
     */
    public function getLastReceivedToken()
    {
        if ($this->lastReceivedToken) {
            return [
                'access_token' => $this->lastReceivedToken['access_token'],
                'expires_at' => $this->lastReceivedToken['expiration_time'],
            ];
        }

        return null;
    }

    /**
     * Caching is handled by the underlying AppIdentityService, return empty string
     * to prevent caching.
     *
     * @return string
     */
    public function getCacheKey()
    {
        return '';
    }
}
