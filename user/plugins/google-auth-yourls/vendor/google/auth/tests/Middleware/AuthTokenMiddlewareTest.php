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

namespace Google\Auth\Tests;

use Google\Auth\FetchAuthTokenCache;
use Google\Auth\Middleware\AuthTokenMiddleware;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

class AuthTokenMiddlewareTest extends BaseTest
{
    private $mockFetcher;
    private $mockCacheItem;
    private $mockCache;
    private $mockRequest;

    protected function setUp()
    {
        $this->onlyGuzzle6();

        $this->mockFetcher =
            $this
                ->getMockBuilder('Google\Auth\FetchAuthTokenInterface')
                ->getMock();
        $this->mockCacheItem =
            $this
                ->getMockBuilder('Psr\Cache\CacheItemInterface')
                ->getMock();
        $this->mockCache =
            $this
                ->getMockBuilder('Psr\Cache\CacheItemPoolInterface')
                ->getMock();
        $this->mockRequest =
            $this
                ->getMockBuilder('GuzzleHttp\Psr7\Request')
                ->disableOriginalConstructor()
                ->getMock();
    }

    public function testOnlyTouchesWhenAuthConfigScoped()
    {
        $this->mockFetcher
            ->expects($this->any())
            ->method('fetchAuthToken')
            ->will($this->returnValue([]));
        $this->mockRequest
            ->expects($this->never())
            ->method('withHeader');

        $middleware = new AuthTokenMiddleware($this->mockFetcher);
        $mock = new MockHandler([new Response(200)]);
        $callable = $middleware($mock);
        $callable($this->mockRequest, ['auth' => 'not_google_auth']);
    }

    public function testAddsTheTokenAsAnAuthorizationHeader()
    {
        $authResult = ['access_token' => '1/abcdef1234567890'];
        $this->mockFetcher
            ->expects($this->once())
            ->method('fetchAuthToken')
            ->will($this->returnValue($authResult));
        $this->mockRequest
            ->expects($this->once())
            ->method('withHeader')
            ->with('authorization', 'Bearer ' . $authResult['access_token'])
            ->will($this->returnValue($this->mockRequest));

        // Run the test.
        $middleware = new AuthTokenMiddleware($this->mockFetcher);
        $mock = new MockHandler([new Response(200)]);
        $callable = $middleware($mock);
        $callable($this->mockRequest, ['auth' => 'google_auth']);
    }

    public function testDoesNotAddAnAuthorizationHeaderOnNoAccessToken()
    {
        $authResult = ['not_access_token' => '1/abcdef1234567890'];
        $this->mockFetcher
            ->expects($this->once())
            ->method('fetchAuthToken')
            ->will($this->returnValue($authResult));
        $this->mockRequest
            ->expects($this->once())
            ->method('withHeader')
            ->with('authorization', 'Bearer ')
            ->will($this->returnValue($this->mockRequest));

        // Run the test.
        $middleware = new AuthTokenMiddleware($this->mockFetcher);
        $mock = new MockHandler([new Response(200)]);
        $callable = $middleware($mock);
        $callable($this->mockRequest, ['auth' => 'google_auth']);
    }

    public function testUsesCachedAuthToken()
    {
        $cacheKey = 'myKey';
        $cachedValue = '2/abcdef1234567890';
        $this->mockCacheItem
            ->expects($this->once())
            ->method('isHit')
            ->will($this->returnValue(true));
        $this->mockCacheItem
            ->expects($this->once())
            ->method('get')
            ->will($this->returnValue($cachedValue));
        $this->mockCache
            ->expects($this->once())
            ->method('getItem')
            ->with($this->equalTo($cacheKey))
            ->will($this->returnValue($this->mockCacheItem));
        $this->mockFetcher
            ->expects($this->never())
            ->method('fetchAuthToken');
        $this->mockFetcher
            ->expects($this->any())
            ->method('getCacheKey')
            ->will($this->returnValue($cacheKey));
        $this->mockRequest
            ->expects($this->once())
            ->method('withHeader')
            ->with('authorization', 'Bearer ' . $cachedValue)
            ->will($this->returnValue($this->mockRequest));

        // Run the test.
        $cachedFetcher = new FetchAuthTokenCache(
            $this->mockFetcher,
            null,
            $this->mockCache
        );
        $middleware = new AuthTokenMiddleware($cachedFetcher);
        $mock = new MockHandler([new Response(200)]);
        $callable = $middleware($mock);
        $callable($this->mockRequest, ['auth' => 'google_auth']);
    }

    public function testGetsCachedAuthTokenUsingCacheOptions()
    {
        $prefix = 'test_prefix_';
        $cacheKey = 'myKey';
        $cachedValue = '2/abcdef1234567890';
        $this->mockCacheItem
            ->expects($this->once())
            ->method('isHit')
            ->will($this->returnValue(true));
        $this->mockCacheItem
            ->expects($this->once())
            ->method('get')
            ->will($this->returnValue($cachedValue));
        $this->mockCache
            ->expects($this->once())
            ->method('getItem')
            ->with($this->equalTo($prefix . $cacheKey))
            ->will($this->returnValue($this->mockCacheItem));
        $this->mockFetcher
            ->expects($this->never())
            ->method('fetchAuthToken');
        $this->mockFetcher
            ->expects($this->any())
            ->method('getCacheKey')
            ->will($this->returnValue($cacheKey));
        $this->mockRequest
            ->expects($this->once())
            ->method('withHeader')
            ->with('authorization', 'Bearer ' . $cachedValue)
            ->will($this->returnValue($this->mockRequest));

        // Run the test.
        $cachedFetcher = new FetchAuthTokenCache(
            $this->mockFetcher,
            ['prefix' => $prefix],
            $this->mockCache
        );
        $middleware = new AuthTokenMiddleware($cachedFetcher);
        $mock = new MockHandler([new Response(200)]);
        $callable = $middleware($mock);
        $callable($this->mockRequest, ['auth' => 'google_auth']);
    }

    public function testShouldSaveValueInCacheWithSpecifiedPrefix()
    {
        $prefix = 'test_prefix_';
        $lifetime = '70707';
        $cacheKey = 'myKey';
        $token = '1/abcdef1234567890';
        $authResult = ['access_token' => $token];
        $this->mockCacheItem
            ->expects($this->any())
            ->method('get')
            ->will($this->returnValue(null));
        $this->mockCacheItem
            ->expects($this->once())
            ->method('set')
            ->with($this->equalTo($token))
            ->will($this->returnValue(false));
        $this->mockCacheItem
            ->expects($this->once())
            ->method('expiresAfter')
            ->with($this->equalTo($lifetime));
        $this->mockCache
            ->expects($this->any())
            ->method('getItem')
            ->with($this->equalTo($prefix . $cacheKey))
            ->will($this->returnValue($this->mockCacheItem));
        $this->mockFetcher
            ->expects($this->any())
            ->method('getCacheKey')
            ->will($this->returnValue($cacheKey));
        $this->mockFetcher
            ->expects($this->once())
            ->method('fetchAuthToken')
            ->will($this->returnValue($authResult));
        $this->mockRequest
            ->expects($this->once())
            ->method('withHeader')
            ->with('authorization', 'Bearer ' . $token)
            ->will($this->returnValue($this->mockRequest));

        // Run the test.
        $cachedFetcher = new FetchAuthTokenCache(
            $this->mockFetcher,
            ['prefix' => $prefix, 'lifetime' => $lifetime],
            $this->mockCache
        );
        $middleware = new AuthTokenMiddleware($cachedFetcher);
        $mock = new MockHandler([new Response(200)]);
        $callable = $middleware($mock);
        $callable($this->mockRequest, ['auth' => 'google_auth']);
    }

    /** @dataProvider provideShouldNotifyTokenCallback */
    public function testShouldNotifyTokenCallback(callable $tokenCallback)
    {
        $prefix = 'test_prefix_';
        $cacheKey = 'myKey';
        $token = '1/abcdef1234567890';
        $authResult = ['access_token' => $token];
        $this->mockCacheItem
            ->expects($this->any())
            ->method('get')
            ->will($this->returnValue(null));
        $this->mockCache
            ->expects($this->any())
            ->method('getItem')
            ->with($this->equalTo($prefix . $cacheKey))
            ->will($this->returnValue($this->mockCacheItem));
        $this->mockFetcher
            ->expects($this->any())
            ->method('getCacheKey')
            ->will($this->returnValue($cacheKey));
        $this->mockFetcher
            ->expects($this->once())
            ->method('fetchAuthToken')
            ->will($this->returnValue($authResult));
        $this->mockRequest
            ->expects($this->once())
            ->method('withHeader')
            ->will($this->returnValue($this->mockRequest));

        MiddlewareCallback::$expectedKey = $this->getValidKeyName($prefix . $cacheKey);
        MiddlewareCallback::$expectedValue = $token;
        MiddlewareCallback::$called = false;

        // Run the test.
        $cachedFetcher = new FetchAuthTokenCache(
            $this->mockFetcher,
            ['prefix' => $prefix],
            $this->mockCache
        );
        $middleware = new AuthTokenMiddleware(
            $cachedFetcher,
            null,
            $tokenCallback
        );
        $mock = new MockHandler([new Response(200)]);
        $callable = $middleware($mock);
        $callable($this->mockRequest, ['auth' => 'google_auth']);
        $this->assertTrue(MiddlewareCallback::$called);
    }

    public function provideShouldNotifyTokenCallback()
    {
        MiddlewareCallback::$phpunit = $this;
        $anonymousFunc = function ($key, $value) {
            MiddlewareCallback::staticInvoke($key, $value);
        };
        return [
            ['Google\Auth\Tests\MiddlewareCallbackFunction'],
            ['Google\Auth\Tests\MiddlewareCallback::staticInvoke'],
            [['Google\Auth\Tests\MiddlewareCallback', 'staticInvoke']],
            [$anonymousFunc],
            [[new MiddlewareCallback, 'staticInvoke']],
            [[new MiddlewareCallback, 'methodInvoke']],
            [new MiddlewareCallback],
        ];
    }
}

class MiddlewareCallback
{
    public static $phpunit;
    public static $expectedKey;
    public static $expectedValue;
    public static $called = false;

    public function __invoke($key, $value)
    {
        self::$phpunit->assertEquals(self::$expectedKey, $key);
        self::$phpunit->assertEquals(self::$expectedValue, $value);
        self::$called = true;
    }

    public function methodInvoke($key, $value)
    {
        return $this($key, $value);
    }

    public static function staticInvoke($key, $value)
    {
        $instance = new self();
        return $instance($key, $value);
    }
}

function MiddlewareCallbackFunction($key, $value)
{
    return MiddlewareCallback::staticInvoke($key, $value);
}
