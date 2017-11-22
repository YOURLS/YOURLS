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

namespace Google\Auth\Subscriber;

use Google\Auth\FetchAuthTokenInterface;
use GuzzleHttp\Event\BeforeEvent;
use GuzzleHttp\Event\RequestEvents;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * AuthTokenSubscriber is a Guzzle Subscriber that adds an Authorization header
 * provided by an object implementing FetchAuthTokenInterface.
 *
 * The FetchAuthTokenInterface#fetchAuthToken is used to obtain a hash; one of
 * the values value in that hash is added as the authorization header.
 *
 * Requests will be accessed with the authorization header:
 *
 * 'authorization' 'Bearer <value of auth_token>'
 */
class AuthTokenSubscriber implements SubscriberInterface
{
    /**
     * @var callable
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
     * Creates a new AuthTokenSubscriber.
     *
     * @param FetchAuthTokenInterface $fetcher is used to fetch the auth token
     * @param callable $httpHandler (optional) http client to fetch the token.
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
     * @return array
     */
    public function getEvents()
    {
        return ['before' => ['onBefore', RequestEvents::SIGN_REQUEST]];
    }

    /**
     * Updates the request with an Authorization header when auth is 'fetched_auth_token'.
     *
     *   use GuzzleHttp\Client;
     *   use Google\Auth\OAuth2;
     *   use Google\Auth\Subscriber\AuthTokenSubscriber;
     *
     *   $config = [..<oauth config param>.];
     *   $oauth2 = new OAuth2($config)
     *   $subscriber = new AuthTokenSubscriber($oauth2);
     *
     *   $client = new Client([
     *      'base_url' => 'https://www.googleapis.com/taskqueue/v1beta2/projects/',
     *      'defaults' => ['auth' => 'google_auth']
     *   ]);
     *   $client->getEmitter()->attach($subscriber);
     *
     *   $res = $client->get('myproject/taskqueues/myqueue');
     *
     * @param BeforeEvent $event
     */
    public function onBefore(BeforeEvent $event)
    {
        // Requests using "auth"="google_auth" will be authorized.
        $request = $event->getRequest();
        if ($request->getConfig()['auth'] != 'google_auth') {
            return;
        }

        // Fetch the auth token.
        $auth_tokens = $this->fetcher->fetchAuthToken($this->httpHandler);
        if (array_key_exists('access_token', $auth_tokens)) {
            $request->setHeader('authorization', 'Bearer ' . $auth_tokens['access_token']);

            // notify the callback if applicable
            if ($this->tokenCallback) {
                call_user_func($this->tokenCallback, $this->fetcher->getCacheKey(), $auth_tokens['access_token']);
            }
        }
    }
}
