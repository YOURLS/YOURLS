<?php

/*
 * Copyright 2008 Google Inc.
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

use Google\Auth\HttpHandler\HttpHandlerFactory;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;

/**
 * Wrapper around Google Access Tokens which provides convenience functions
 *
 */
class Google_AccessToken_Revoke
{
  /**
   * @var GuzzleHttp\ClientInterface The http client
   */
  private $http;

  /**
   * Instantiates the class, but does not initiate the login flow, leaving it
   * to the discretion of the caller.
   */
  public function __construct(ClientInterface $http = null)
  {
    $this->http = $http;
  }

  /**
   * Revoke an OAuth2 access token or refresh token. This method will revoke the current access
   * token, if a token isn't provided.
   *
   * @param string|array $token The token (access token or a refresh token) that should be revoked.
   * @return boolean Returns True if the revocation was successful, otherwise False.
   */
  public function revokeToken($token)
  {
    if (is_array($token)) {
      if (isset($token['refresh_token'])) {
        $token = $token['refresh_token'];
      } else {
        $token = $token['access_token'];
      }
    }

    $body = Psr7\stream_for(http_build_query(array('token' => $token)));
    $request = new Request(
        'POST',
        Google_Client::OAUTH2_REVOKE_URI,
        [
          'Cache-Control' => 'no-store',
          'Content-Type'  => 'application/x-www-form-urlencoded',
        ],
        $body
    );

    $httpHandler = HttpHandlerFactory::build($this->http);

    $response = $httpHandler($request);

    return $response->getStatusCode() == 200;
  }
}
