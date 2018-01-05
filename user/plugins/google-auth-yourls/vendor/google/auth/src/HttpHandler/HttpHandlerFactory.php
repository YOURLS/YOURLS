<?php
/**
 * Copyright 2015 Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace Google\Auth\HttpHandler;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class HttpHandlerFactory
{
    /**
     * Builds out a default http handler for the installed version of guzzle.
     *
     * @param ClientInterface $client
     *
     * @return Guzzle5HttpHandler|Guzzle6HttpHandler
     *
     * @throws \Exception
     */
    public static function build(ClientInterface $client = null)
    {
        $version = ClientInterface::VERSION;
        $client = $client ?: new Client();

        switch ($version[0]) {
            case '5':
                return new Guzzle5HttpHandler($client);
            case '6':
                return new Guzzle6HttpHandler($client);
            default:
                throw new \Exception('Version not supported');
        }
    }
}
