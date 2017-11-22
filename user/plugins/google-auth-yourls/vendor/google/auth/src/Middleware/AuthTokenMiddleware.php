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

use Google\Auth\FetchAuthTokenInterface;
use Psr\Http\Message\RequestInterface;

/**
 * AuthTokenMiddleware is a Guzzle Middleware that adds an Authorization header
 * provided by an object implementing FetchAuthTokenInterface.
 *
 * The FetchAuthTokenInterface#fetchAuthToken is used to obtain a hash; one of
 * the values value in that hash is added as the authorization header.
 *
 * Requests will be accessed with the authorization header:
 *
 * 'authorization' 'Bearer <value of auth_token>'
 */
class AuthTokenMiddleware
{
    /**
     * @var callback
     */
    private $httpHandler;

    /**
     * @var FetchAuthTokenInterface
     */
    private $fetcher;

    /**
     * @var callable
     */
    private $tokenCallback;

    /**
     * Creates a new AuthTokenMiddleware.
     *
     * @param FetchAuthTokenInterface $fetcher is used to fetch the auth token
     * @param callable $httpHandler (optional) callback which delivers psr7 request
     * @param callable $tokenCallback (optional) function to be called when a new token is fetched.
     */
    public function __construct(
        FetchAuthTokenInterface $fetcher,
        callable $httpHandler = null,
        callable $tokenCallback = null
    ) {
        $this->fetcher = $fetcher;
        $this->httpHandler = $httpHandler;
        $this->tokenCallback = $tokenCallback;
    }

    /**
     * Updates the request with an Authorization header when auth is 'google_auth'.
     *
     *   use Google\Auth\Middleware\AuthTokenMiddleware;
     *   use Google\Auth\OAuth2;
     *   use GuzzleHttp\Client;
     *   use GuzzleHttp\HandlerStack;
     *
     *   $config = [..<oauth config param>.];
     *   $oauth2 = new OAuth2($config)
     *   $middleware = new AuthTokenMiddleware($oauth2);
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
     *
     * @param callable $handler
     *
     * @return \Closure
     */
    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            // Requests using "auth"="google_auth" will be authorized.
            if (!isset($options['auth']) || $options['auth'] !== 'google_auth') {
                return $handler($request, $options);
            }

            $request = $request->withHeader('authorization', 'Bearer ' . $this->fetchToken());

            return $handler($request, $options);
        };
    }

    /**
     * Call fetcher to fetch the token.
     *
     * @return string
     */
    private function fetchToken()
    {
        $auth_tokens = $this->fetcher->fetchAuthToken($this->httpHandler);

        if (array_key_exists('access_token', $auth_tokens)) {
            // notify the callback if applicable
            if ($this->tokenCallback) {
                call_user_func($this->tokenCallback, $this->fetcher->getCacheKey(), $auth_tokens['access_token']);
            }

            return $auth_tokens['access_token'];
        }
    }
}
