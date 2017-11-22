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
use Google\Auth\Subscriber\AuthTokenSubscriber;
use GuzzleHttp\Client;
use GuzzleHttp\Event\BeforeEvent;
use GuzzleHttp\Transaction;

class AuthTokenSubscriberTest extends BaseTest
{
    private $mockFetcher;
    private $mockCacheItem;
    private $mockCache;

    protected function setUp()
    {
        $this->onlyGuzzle5();

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
    }

    public function testSubscribesToEvents()
    {
        $a = new AuthTokenSubscriber($this->mockFetcher);
        $this->assertArrayHasKey('before', $a->getEvents());
    }

    public function testOnlyTouchesWhenAuthConfigScoped()
    {
        $s = new AuthTokenSubscriber($this->mockFetcher);
        $client = new Client();
        $request = $client->createRequest('GET', 'http://testing.org',
            ['auth' => 'not_google_auth']);
        $before = new BeforeEvent(new Transaction($client, $request));
        $s->onBefore($before);
        $this->assertSame($request->getHeader('authorization'), '');
    }

    public function testAddsTheTokenAsAnAuthorizationHeader()
    {
        $authResult = ['access_token' => '1/abcdef1234567890'];
        $this->mockFetcher
            ->expects($this->once())
            ->method('fetchAuthToken')
            ->will($this->returnValue($authResult));

        // Run the test.
        $a = new AuthTokenSubscriber($this->mockFetcher);
        $client = new Client();
        $request = $client->createRequest('GET', 'http://testing.org',
            ['auth' => 'google_auth']);
        $before = new BeforeEvent(new Transaction($client, $request));
        $a->onBefore($before);
        $this->assertSame($request->getHeader('authorization'),
            'Bearer 1/abcdef1234567890');
    }

    public function testDoesNotAddAnAuthorizationHeaderOnNoAccessToken()
    {
        $authResult = ['not_access_token' => '1/abcdef1234567890'];
        $this->mockFetcher
            ->expects($this->once())
            ->method('fetchAuthToken')
            ->will($this->returnValue($authResult));

        // Run the test.
        $a = new AuthTokenSubscriber($this->mockFetcher);
        $client = new Client();
        $request = $client->createRequest('GET', 'http://testing.org',
            ['auth' => 'google_auth']);
        $before = new BeforeEvent(new Transaction($client, $request));
        $a->onBefore($before);
        $this->assertSame($request->getHeader('authorization'), '');
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

        // Run the test.
        $cachedFetcher = new FetchAuthTokenCache(
            $this->mockFetcher,
            null,
            $this->mockCache
        );
        $a = new AuthTokenSubscriber($cachedFetcher);
        $client = new Client();
        $request = $client->createRequest('GET', 'http://testing.org',
            ['auth' => 'google_auth']);
        $before = new BeforeEvent(new Transaction($client, $request));
        $a->onBefore($before);
        $this->assertSame($request->getHeader('authorization'),
            'Bearer 2/abcdef1234567890');
    }

    public function testGetsCachedAuthTokenUsingCachePrefix()
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

        // Run the test
        $cachedFetcher = new FetchAuthTokenCache(
            $this->mockFetcher,
            ['prefix' => $prefix],
            $this->mockCache
        );
        $a = new AuthTokenSubscriber($cachedFetcher);
        $client = new Client();
        $request = $client->createRequest('GET', 'http://testing.org',
            ['auth' => 'google_auth']);
        $before = new BeforeEvent(new Transaction($client, $request));
        $a->onBefore($before);
        $this->assertSame($request->getHeader('authorization'),
            'Bearer 2/abcdef1234567890');
    }

    public function testShouldSaveValueInCacheWithCacheOptions()
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
            ->expects($this->exactly(2))
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

        // Run the test
        $cachedFetcher = new FetchAuthTokenCache(
            $this->mockFetcher,
            ['prefix' => $prefix, 'lifetime' => $lifetime],
            $this->mockCache
        );
        $a = new AuthTokenSubscriber($cachedFetcher);
        $client = new Client();
        $request = $client->createRequest('GET', 'http://testing.org',
            ['auth' => 'google_auth']);
        $before = new BeforeEvent(new Transaction($client, $request));
        $a->onBefore($before);
        $this->assertSame($request->getHeader('authorization'),
            'Bearer 1/abcdef1234567890');
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

        SubscriberCallback::$expectedKey = $this->getValidKeyName($prefix . $cacheKey);
        SubscriberCallback::$expectedValue = $token;
        SubscriberCallback::$called = false;

        // Run the test
        $cachedFetcher = new FetchAuthTokenCache(
            $this->mockFetcher,
            ['prefix' => $prefix],
            $this->mockCache
        );
        $a = new AuthTokenSubscriber(
            $cachedFetcher,
            null,
            $tokenCallback
        );

        $client = new Client();
        $request = $client->createRequest('GET', 'http://testing.org',
            ['auth' => 'google_auth']);
        $before = new BeforeEvent(new Transaction($client, $request));
        $a->onBefore($before);
        $this->assertTrue(SubscriberCallback::$called);
    }

    public function provideShouldNotifyTokenCallback()
    {
        SubscriberCallback::$phpunit = $this;
        $anonymousFunc = function ($key, $value) {
            SubscriberCallback::staticInvoke($key, $value);
        };
        return [
            ['Google\Auth\Tests\SubscriberCallbackFunction'],
            ['Google\Auth\Tests\SubscriberCallback::staticInvoke'],
            [['Google\Auth\Tests\SubscriberCallback', 'staticInvoke']],
            [$anonymousFunc],
            [[new SubscriberCallback, 'staticInvoke']],
            [[new SubscriberCallback, 'methodInvoke']],
            [new SubscriberCallback],
        ];
    }
}

class SubscriberCallback
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

function SubscriberCallbackFunction($key, $value)
{
    return SubscriberCallback::staticInvoke($key, $value);
}
