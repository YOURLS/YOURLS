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

namespace Google\Auth;

use DomainException;
use Google\Auth\Credentials\AppIdentityCredentials;
use Google\Auth\Credentials\GCECredentials;
use Google\Auth\Middleware\AuthTokenMiddleware;
use Google\Auth\Subscriber\AuthTokenSubscriber;
use Psr\Cache\CacheItemPoolInterface;

/**
 * ApplicationDefaultCredentials obtains the default credentials for
 * authorizing a request to a Google service.
 *
 * Application Default Credentials are described here:
 * https://developers.google.com/accounts/docs/application-default-credentials
 *
 * This class implements the search for the application default credentials as
 * described in the link.
 *
 * It provides three factory methods:
 * - #get returns the computed credentials object
 * - #getSubscriber returns an AuthTokenSubscriber built from the credentials object
 * - #getMiddleware returns an AuthTokenMiddleware built from the credentials object
 *
 * This allows it to be used as follows with GuzzleHttp\Client:
 *
 *   use Google\Auth\ApplicationDefaultCredentials;
 *   use GuzzleHttp\Client;
 *   use GuzzleHttp\HandlerStack;
 *
 *   $middleware = ApplicationDefaultCredentials::getMiddleware(
 *       'https://www.googleapis.com/auth/taskqueue'
 *   );
 *   $stack = HandlerStack::create();
 *   $stack->push($middleware);
 *
 *   $client = new Client([
 *       'handler' => $stack,
 *       'base_uri' => 'https://www.googleapis.com/taskqueue/v1beta2/projects/',
 *       'auth' => 'google_auth' // authorize all requests
 *   ]);
 *
 *   $res = $client->get('myproject/taskqueues/myqueue');
 */
class ApplicationDefaultCredentials
{
    /**
     * Obtains an AuthTokenSubscriber that uses the default FetchAuthTokenInterface
     * implementation to use in this environment.
     *
     * If supplied, $scope is used to in creating the credentials instance if
     * this does not fallback to the compute engine defaults.
     *
     * @param string|array scope the scope of the access request, expressed
     *   either as an Array or as a space-delimited String.
     * @param callable $httpHandler callback which delivers psr7 request
     * @param array $cacheConfig configuration for the cache when it's present
     * @param CacheItemPoolInterface $cache an implementation of CacheItemPoolInterface
     *
     * @return AuthTokenSubscriber
     *
     * @throws DomainException if no implementation can be obtained.
     */
    public static function getSubscriber(
        $scope = null,
        callable $httpHandler = null,
        array $cacheConfig = null,
        CacheItemPoolInterface $cache = null
    ) {
        $creds = self::getCredentials($scope, $httpHandler, $cacheConfig, $cache);

        return new AuthTokenSubscriber($creds, $cacheConfig);
    }

    /**
     * Obtains an AuthTokenMiddleware that uses the default FetchAuthTokenInterface
     * implementation to use in this environment.
     *
     * If supplied, $scope is used to in creating the credentials instance if
     * this does not fallback to the compute engine defaults.
     *
     * @param string|array scope the scope of the access request, expressed
     *   either as an Array or as a space-delimited String.
     * @param callable $httpHandler callback which delivers psr7 request
     * @param array $cacheConfig configuration for the cache when it's present
     * @param CacheItemPoolInterface $cache
     *
     * @return AuthTokenMiddleware
     *
     * @throws DomainException if no implementation can be obtained.
     */
    public static function getMiddleware(
        $scope = null,
        callable $httpHandler = null,
        array $cacheConfig = null,
        CacheItemPoolInterface $cache = null
    ) {
        $creds = self::getCredentials($scope, $httpHandler, $cacheConfig, $cache);

        return new AuthTokenMiddleware($creds, $cacheConfig);
    }

    /**
     * Obtains the default FetchAuthTokenInterface implementation to use
     * in this environment.
     *
     * If supplied, $scope is used to in creating the credentials instance if
     * this does not fallback to the Compute Engine defaults.
     *
     * @param string|array scope the scope of the access request, expressed
     *   either as an Array or as a space-delimited String.
     * @param callable $httpHandler callback which delivers psr7 request
     * @param array $cacheConfig configuration for the cache when it's present
     * @param CacheItemPoolInterface $cache
     *
     * @return CredentialsLoader
     *
     * @throws DomainException if no implementation can be obtained.
     */
    public static function getCredentials(
        $scope = null,
        callable $httpHandler = null,
        array $cacheConfig = null,
        CacheItemPoolInterface $cache = null
    ) {
        $creds = null;
        $jsonKey = CredentialsLoader::fromEnv()
            ?: CredentialsLoader::fromWellKnownFile();

        if (!is_null($jsonKey)) {
            $creds = CredentialsLoader::makeCredentials($scope, $jsonKey);
        } elseif (AppIdentityCredentials::onAppEngine() && !GCECredentials::onAppEngineFlexible()) {
            $creds = new AppIdentityCredentials($scope);
        } elseif (GCECredentials::onGce($httpHandler)) {
            $creds = new GCECredentials();
        }

        if (is_null($creds)) {
            throw new \DomainException(self::notFound());
        }
        if (!is_null($cache)) {
            $creds = new FetchAuthTokenCache($creds, $cacheConfig, $cache);
        }
        return $creds;
    }

    private static function notFound()
    {
        $msg = 'Could not load the default credentials. Browse to ';
        $msg .= 'https://developers.google.com';
        $msg .= '/accounts/docs/application-default-credentials';
        $msg .= ' for more information';

        return $msg;
    }
}
