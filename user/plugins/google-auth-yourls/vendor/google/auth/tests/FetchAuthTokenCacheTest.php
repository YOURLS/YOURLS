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

namespace Google\Auth\tests;

use Google\Auth\FetchAuthTokenCache;

class FetchAuthTokenCacheTest extends BaseTest
{
    protected function setUp()
    {
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
        $accessToken = $cachedFetcher->fetchAuthToken();
        $this->assertEquals($accessToken, ['access_token' => $cachedValue]);
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
        $accessToken = $cachedFetcher->fetchAuthToken();
        $this->assertEquals($accessToken, ['access_token' => $cachedValue]);
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
        $accessToken = $cachedFetcher->fetchAuthToken();
        $this->assertEquals($accessToken, ['access_token' => $token]);
    }
}
