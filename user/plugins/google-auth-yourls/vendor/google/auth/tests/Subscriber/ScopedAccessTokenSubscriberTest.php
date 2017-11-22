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

use Google\Auth\Subscriber\ScopedAccessTokenSubscriber;
use GuzzleHttp\Client;
use GuzzleHttp\Event\BeforeEvent;
use GuzzleHttp\Transaction;

class ScopedAccessTokenSubscriberTest extends BaseTest
{
    const TEST_SCOPE = 'https://www.googleapis.com/auth/cloud-taskqueue';

    private $mockCacheItem;
    private $mockCache;
    private $mockRequest;

    protected function setUp()
    {
        $this->onlyGuzzle5();

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

    /**
     * @expectedException InvalidArgumentException
     */
    public function testRequiresScopeAsAStringOrArray()
    {
        $fakeAuthFunc = function ($unused_scopes) {
            return '1/abcdef1234567890';
        };
        new ScopedAccessTokenSubscriber($fakeAuthFunc, new \stdClass(), array());
    }

    public function testSubscribesToEvents()
    {
        $fakeAuthFunc = function ($unused_scopes) {
            return '1/abcdef1234567890';
        };
        $s = new ScopedAccessTokenSubscriber($fakeAuthFunc, self::TEST_SCOPE, array());
        $this->assertArrayHasKey('before', $s->getEvents());
    }

    public function testAddsTheTokenAsAnAuthorizationHeader()
    {
        $fakeAuthFunc = function ($unused_scopes) {
            return '1/abcdef1234567890';
        };
        $s = new ScopedAccessTokenSubscriber($fakeAuthFunc, self::TEST_SCOPE, array());
        $client = new Client();
        $request = $client->createRequest('GET', 'http://testing.org',
            ['auth' => 'scoped']);
        $before = new BeforeEvent(new Transaction($client, $request));
        $s->onBefore($before);
        $this->assertSame(
            'Bearer 1/abcdef1234567890',
            $request->getHeader('authorization')
        );
    }

    public function testUsesCachedAuthToken()
    {
        $cachedValue = '2/abcdef1234567890';
        $fakeAuthFunc = function ($unused_scopes) {
            return '';
        };
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
            ->with($this->getValidKeyName(self::TEST_SCOPE))
            ->will($this->returnValue($this->mockCacheItem));

        // Run the test
        $s = new ScopedAccessTokenSubscriber($fakeAuthFunc, self::TEST_SCOPE, array(),
            $this->mockCache);
        $client = new Client();
        $request = $client->createRequest('GET', 'http://testing.org',
            ['auth' => 'scoped']);
        $before = new BeforeEvent(new Transaction($client, $request));
        $s->onBefore($before);
        $this->assertSame(
            'Bearer 2/abcdef1234567890',
            $request->getHeader('authorization')
        );
    }

    public function testGetsCachedAuthTokenUsingCachePrefix()
    {
        $prefix = 'test_prefix_';
        $cachedValue = '2/abcdef1234567890';
        $fakeAuthFunc = function ($unused_scopes) {
            return '';
        };
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
            ->with($prefix . $this->getValidKeyName(self::TEST_SCOPE))
            ->will($this->returnValue($this->mockCacheItem));

        // Run the test
        $s = new ScopedAccessTokenSubscriber($fakeAuthFunc, self::TEST_SCOPE,
            ['prefix' => $prefix],
            $this->mockCache);
        $client = new Client();
        $request = $client->createRequest('GET', 'http://testing.org',
            ['auth' => 'scoped']);
        $before = new BeforeEvent(new Transaction($client, $request));
        $s->onBefore($before);
        $this->assertSame(
            'Bearer 2/abcdef1234567890',
            $request->getHeader('authorization')
        );
    }

    public function testShouldSaveValueInCache()
    {
        $token = '2/abcdef1234567890';
        $fakeAuthFunc = function ($unused_scopes) {
            return '2/abcdef1234567890';
        };
        $this->mockCacheItem
            ->expects($this->once())
            ->method('isHit')
            ->will($this->returnValue(false));
        $this->mockCacheItem
            ->expects($this->once())
            ->method('set')
            ->with($this->equalTo($token))
            ->will($this->returnValue(false));
        $this->mockCache
            ->expects($this->exactly(2))
            ->method('getItem')
            ->with($this->getValidKeyName(self::TEST_SCOPE))
            ->will($this->returnValue($this->mockCacheItem));
        $s = new ScopedAccessTokenSubscriber($fakeAuthFunc, self::TEST_SCOPE, array(),
            $this->mockCache);
        $client = new Client();
        $request = $client->createRequest('GET', 'http://testing.org',
            ['auth' => 'scoped']);
        $before = new BeforeEvent(new Transaction($client, $request));
        $s->onBefore($before);
        $this->assertSame(
            'Bearer 2/abcdef1234567890',
            $request->getHeader('authorization')
        );
    }

    public function testShouldSaveValueInCacheWithCacheOptions()
    {
        $token = '2/abcdef1234567890';
        $prefix = 'test_prefix_';
        $lifetime = '70707';
        $fakeAuthFunc = function ($unused_scopes) {
            return '2/abcdef1234567890';
        };
        $this->mockCacheItem
            ->expects($this->once())
            ->method('isHit')
            ->will($this->returnValue(false));
        $this->mockCacheItem
            ->expects($this->once())
            ->method('set')
            ->with($this->equalTo($token));
        $this->mockCacheItem
            ->expects($this->once())
            ->method('expiresAfter')
            ->with($this->equalTo($lifetime));
        $this->mockCache
            ->expects($this->exactly(2))
            ->method('getItem')
            ->with($prefix . $this->getValidKeyName(self::TEST_SCOPE))
            ->will($this->returnValue($this->mockCacheItem));

        // Run the test
        $s = new ScopedAccessTokenSubscriber($fakeAuthFunc, self::TEST_SCOPE,
            ['prefix' => $prefix, 'lifetime' => $lifetime],
            $this->mockCache);
        $client = new Client();
        $request = $client->createRequest('GET', 'http://testing.org',
            ['auth' => 'scoped']);
        $before = new BeforeEvent(new Transaction($client, $request));
        $s->onBefore($before);
        $this->assertSame(
            'Bearer 2/abcdef1234567890',
            $request->getHeader('authorization')
        );
    }

    public function testOnlyTouchesWhenAuthConfigScoped()
    {
        $fakeAuthFunc = function ($unused_scopes) {
            return '1/abcdef1234567890';
        };
        $s = new ScopedAccessTokenSubscriber($fakeAuthFunc, self::TEST_SCOPE, array());
        $client = new Client();
        $request = $client->createRequest('GET', 'http://testing.org',
            ['auth' => 'notscoped']);
        $before = new BeforeEvent(new Transaction($client, $request));
        $s->onBefore($before);
        $this->assertSame('', $request->getHeader('authorization'));
    }
}
