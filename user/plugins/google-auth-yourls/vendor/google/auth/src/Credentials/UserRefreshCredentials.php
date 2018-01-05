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

use Google\Auth\CredentialsLoader;
use Google\Auth\OAuth2;

/**
 * Authenticates requests using User Refresh credentials.
 *
 * This class allows authorizing requests from user refresh tokens.
 *
 * This the end of the result of a 3LO flow.  E.g, the end result of
 * 'gcloud auth login' saves a file with these contents in well known
 * location
 *
 * @see [Application Default Credentials](http://goo.gl/mkAHpZ)
 */
class UserRefreshCredentials extends CredentialsLoader
{
    /**
     * The OAuth2 instance used to conduct authorization.
     *
     * @var OAuth2
     */
    protected $auth;

    /**
     * Create a new UserRefreshCredentials.
     *
     * @param string|array $scope the scope of the access request, expressed
     *   either as an Array or as a space-delimited String.
     * @param string|array $jsonKey JSON credential file path or JSON credentials
     *   as an associative array
     */
    public function __construct(
        $scope,
        $jsonKey
    ) {
        if (is_string($jsonKey)) {
            if (!file_exists($jsonKey)) {
                throw new \InvalidArgumentException('file does not exist');
            }
            $jsonKeyStream = file_get_contents($jsonKey);
            if (!$jsonKey = json_decode($jsonKeyStream, true)) {
                throw new \LogicException('invalid json for auth config');
            }
        }
        if (!array_key_exists('client_id', $jsonKey)) {
            throw new \InvalidArgumentException(
                'json key is missing the client_id field');
        }
        if (!array_key_exists('client_secret', $jsonKey)) {
            throw new \InvalidArgumentException(
                'json key is missing the client_secret field');
        }
        if (!array_key_exists('refresh_token', $jsonKey)) {
            throw new \InvalidArgumentException(
                'json key is missing the refresh_token field');
        }
        $this->auth = new OAuth2([
            'clientId' => $jsonKey['client_id'],
            'clientSecret' => $jsonKey['client_secret'],
            'refresh_token' => $jsonKey['refresh_token'],
            'scope' => $scope,
            'tokenCredentialUri' => self::TOKEN_CREDENTIAL_URI,
        ]);
    }

    /**
     * @param callable $httpHandler
     *
     * @return array
     */
    public function fetchAuthToken(callable $httpHandler = null)
    {
        return $this->auth->fetchAuthToken($httpHandler);
    }

    /**
     * @return string
     */
    public function getCacheKey()
    {
        return $this->auth->getClientId() . ':' . $this->auth->getCacheKey();
    }

    /**
     * @return array
     */
    public function getLastReceivedToken()
    {
        return $this->auth->getLastReceivedToken();
    }
}
