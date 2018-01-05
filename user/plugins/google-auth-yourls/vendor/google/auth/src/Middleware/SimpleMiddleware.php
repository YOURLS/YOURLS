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

use GuzzleHttp\Psr7;
use Psr\Http\Message\RequestInterface;

/**
 * SimpleMiddleware is a Guzzle Middleware that implements Google's Simple API
 * access.
 *
 * Requests are accessed using the Simple API access developer key.
 */
class SimpleMiddleware
{
    /**
     * @var array
     */
    private $config;

    /**
     * Create a new Simple plugin.
     *
     * The configuration array expects one option
     * - key: required, otherwise InvalidArgumentException is thrown
     *
     * @param array $config Configuration array
     */
    public function __construct(array $config)
    {
        if (!isset($config['key'])) {
            throw new \InvalidArgumentException('requires a key to have been set');
        }

        $this->config = array_merge(['key' => null], $config);
    }

    /**
     * Updates the request query with the developer key if auth is set to simple.
     *
     *   use Google\Auth\Middleware\SimpleMiddleware;
     *   use GuzzleHttp\Client;
     *   use GuzzleHttp\HandlerStack;
     *
     *   $my_key = 'is not the same as yours';
     *   $middleware = new SimpleMiddleware(['key' => $my_key]);
     *   $stack = HandlerStack::create();
     *   $stack->push($middleware);
     *
     *   $client = new Client([
     *       'handler' => $stack,
     *       'base_uri' => 'https://www.googleapis.com/discovery/v1/',
     *       'auth' => 'simple'
     *   ]);
     *
     *   $res = $client->get('drive/v2/rest');
     *
     * @param callable $handler
     *
     * @return \Closure
     */
    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            // Requests using "auth"="scoped" will be authorized.
            if (!isset($options['auth']) || $options['auth'] !== 'simple') {
                return $handler($request, $options);
            }

            $query = Psr7\parse_query($request->getUri()->getQuery());
            $params = array_merge($query, $this->config);
            $uri = $request->getUri()->withQuery(Psr7\build_query($params));
            $request = $request->withUri($uri);

            return $handler($request, $options);
        };
    }
}
