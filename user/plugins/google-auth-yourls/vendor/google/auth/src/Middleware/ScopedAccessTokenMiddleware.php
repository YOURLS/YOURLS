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

namespace Google\Auth\Middleware;

use Google\Auth\CacheTrait;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Message\RequestInterface;

/**
 * ScopedAccessTokenMiddleware is a Guzzle Middleware that adds an Authorization
 * header provided by a closure.
 *
 * The closure returns an access token, taking the scope, either a single
 * string or an array of strings, as its value.  If provided, a cache will be
 * used to preserve the access token for a given lifetime.
 *
 * Requests will be accessed with the authorization header:
 *
 * 'authorization' 'Bearer <value of auth_token>'
 */
class ScopedAccessTokenMiddleware
{
    use CacheTrait;

    const DEFAULT_CACHE_LIFETIME = 1500;

    /**
     * @var CacheItemPoolInterface
     */
    private $cache;

    /**
     * @var array configuration
     */
    private $cacheConfig;

    /**
     * @var callable
     */
    private $tokenFunc;

    /**
     * @var array|string
     */
    private $scopes;

    /**
     * Creates a new ScopedAccessTokenMiddleware.
     *
     * @param callable $tokenFunc a token generator function
     * @param array|string $scopes the token authentication scopes
     * @param array $cacheConfig configuration for the cache when it's present
     * @param CacheItemPoolInterface $cache an implementation of CacheItemPoolInterface
     */
    public function __construct(
        callable $tokenFunc,
        $scopes,
        array $cacheConfig = null,
        CacheItemPoolInterface $cache = null
    ) {
        $this->tokenFunc = $tokenFunc;
        if (!(is_string($scopes) || is_array($scopes))) {
            throw new \InvalidArgumentException(
                'wants scope should be string or array');
        }
        $this->scopes = $scopes;

        if (!is_null($cache)) {
            $this->cache = $cache;
            $this->cacheConfig = array_merge([
                'lifetime' => self::DEFAULT_CACHE_LIFETIME,
                'prefix' => '',
            ], $cacheConfig);
        }
    }

    /**
     * Updates the request with an Authorization header when auth is 'scoped'.
     *
     *   E.g this could be used to authenticate using the AppEngine
     *   AppIdentityService.
     *
     *   use google\appengine\api\app_identity\AppIdentityService;
     *   use Google\Auth\Middleware\ScopedAccessTokenMiddleware;
     *   use GuzzleHttp\Client;
     *   use GuzzleHttp\HandlerStack;
     *
     *   $scope = 'https://www.googleapis.com/auth/taskqueue'
     *   $middleware = new ScopedAccessTokenMiddleware(
     *       'AppIdentityService::getAccessToken',
     *       $scope,
     *       [ 'prefix' => 'Google\Auth\ScopedAccessToken::' ],
     *       $cache = new Memcache()
     *   );
     *   $stack = HandlerStack::create();
     *   $stack->push($middleware);
     *
     *   $client = new Client([
     *       'handler' => $stack,
     *       'base_url' => 'https://www.googleapis.com/taskqueue/v1beta2/projects/',
     *       'auth' => 'scoped' // authorize all requests
     *   ]);
     *
     *   $res = $client->get('myproject/taskqueues/myqueue');
     *
     * @param callable $handler
     *
     * @return \Closure
     */
    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            // Requests using "auth"="scoped" will be authorized.
            if (!isset($options['auth']) || $options['auth'] !== 'scoped') {
                return $handler($request, $options);
            }

            $request = $request->withHeader('authorization', 'Bearer ' . $this->fetchToken());

            return $handler($request, $options);
        };
    }

    /**
     * @return string
     */
    private function getCacheKey()
    {
        $key = null;

        if (is_string($this->scopes)) {
            $key .= $this->scopes;
        } elseif (is_array($this->scopes)) {
            $key .= implode(':', $this->scopes);
        }

        return $key;
    }

    /**
     * Determine if token is available in the cache, if not call tokenFunc to
     * fetch it.
     *
     * @return string
     */
    private function fetchToken()
    {
        $cacheKey = $this->getCacheKey();
        $cached = $this->getCachedValue($cacheKey);

        if (!empty($cached)) {
            return $cached;
        }

        $token = call_user_func($this->tokenFunc, $this->scopes);
        $this->setCachedValue($cacheKey, $token);

        return $token;
    }
}
