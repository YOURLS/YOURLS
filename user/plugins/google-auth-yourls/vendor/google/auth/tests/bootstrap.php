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

error_reporting(E_ALL | E_STRICT);
require dirname(__DIR__) . '/vendor/autoload.php';
date_default_timezone_set('UTC');

// autoload base test
require_once __DIR__ . '/BaseTest.php';

function buildResponse($code, array $headers = [], $body = null)
{
    if (class_exists('GuzzleHttp\HandlerStack')) {
        return new \GuzzleHttp\Psr7\Response($code, $headers, $body);
    }

    return new \GuzzleHttp\Message\Response(
        $code,
        $headers,
        \GuzzleHttp\Stream\Stream::factory((string)$body)
    );
}

function getHandler(array $mockResponses = [])
{
    if (class_exists('GuzzleHttp\HandlerStack')) {
        $mock = new \GuzzleHttp\Handler\MockHandler($mockResponses);

        $handler = \GuzzleHttp\HandlerStack::create($mock);
        $client = new \GuzzleHttp\Client(['handler' => $handler]);

        return new \Google\Auth\HttpHandler\Guzzle6HttpHandler($client);
    }

    $client = new \GuzzleHttp\Client();
    $client->getEmitter()->attach(
        new \GuzzleHttp\Subscriber\Mock($mockResponses)
    );

    return new \Google\Auth\HttpHandler\Guzzle5HttpHandler($client);
}
