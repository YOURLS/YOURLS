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

use Google\Auth\CacheTrait;

class CacheTraitTest extends \PHPUnit_Framework_TestCase
{
    private $mockFetcher;
    private $mockCacheItem;
    private $mockCache;

    public function setUp()
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

    public function testSuccessfullyPullsFromCache()
    {
        $expectedValue = '1234';
        $this->mockCacheItem
            ->expects($this->once())
            ->method('isHit')
            ->will($this->returnValue(true));
        $this->mockCacheItem
            ->expects($this->once())
            ->method('get')
            ->will($this->returnValue($expectedValue));
        $this->mockCache
            ->expects($this->once())
            ->method('getItem')
            ->will($this->returnValue($this->mockCacheItem));

        $implementation = new CacheTraitImplementation([
            'cache' => $this->mockCache,
        ]);

        $cachedValue = $implementation->gCachedValue();
        $this->assertEquals($expectedValue, $cachedValue);
    }

    public function testSuccessfullyPullsFromCacheWithInvalidKey()
    {
        $key = 'this-key-has-@-illegal-characters';
        $expectedKey = 'thiskeyhasillegalcharacters';
        $expectedValue = '1234';
        $this->mockCacheItem
            ->expects($this->once())
            ->method('isHit')
            ->will($this->returnValue(true));
        $this->mockCacheItem
            ->expects($this->once())
            ->method('get')
            ->will($this->returnValue($expectedValue));
        $this->mockCache
            ->expects($this->once())
            ->method('getItem')
            ->with($expectedKey)
            ->will($this->returnValue($this->mockCacheItem));

        $implementation = new CacheTraitImplementation([
            'cache' => $this->mockCache,
            'key' => $key,
        ]);

        $cachedValue = $implementation->gCachedValue();
        $this->assertEquals($expectedValue, $cachedValue);
    }

    public function testSuccessfullyPullsFromCacheWithLongKey()
    {
        $key = 'this-key-is-over-64-characters-and-it-will-still-work'
            . '-but-it-will-be-hashed-and-shortened';
        $expectedKey = str_replace('-', '', $key);
        $expectedKey = substr(hash('sha256', $expectedKey), 0, 64);
        $expectedValue = '1234';
        $this->mockCacheItem
            ->expects($this->once())
            ->method('isHit')
            ->will($this->returnValue(true));
        $this->mockCacheItem
            ->expects($this->once())
            ->method('get')
            ->will($this->returnValue($expectedValue));
        $this->mockCache
            ->expects($this->once())
            ->method('getItem')
            ->with($expectedKey)
            ->will($this->returnValue($this->mockCacheItem));

        $implementation = new CacheTraitImplementation([
            'cache' => $this->mockCache,
            'key' => $key
        ]);

        $cachedValue = $implementation->gCachedValue();
        $this->assertEquals($expectedValue, $cachedValue);
    }

    public function testFailsPullFromCacheWithNoCache()
    {
        $implementation = new CacheTraitImplementation();

        $cachedValue = $implementation->gCachedValue();
        $this->assertEquals(null, $cachedValue);
    }

    public function testFailsPullFromCacheWithoutKey()
    {
        $implementation = new CacheTraitImplementation([
            'cache' => $this->mockCache,
            'key'   => null,
        ]);

        $cachedValue = $implementation->gCachedValue();
    }

    public function testSuccessfullySetsToCache()
    {
        $value = '1234';
        $this->mockCacheItem
            ->expects($this->once())
            ->method('set')
            ->with($value);
        $this->mockCache
            ->expects($this->once())
            ->method('getItem')
            ->with($this->equalTo('key'))
            ->will($this->returnValue($this->mockCacheItem));

        $implementation = new CacheTraitImplementation([
            'cache' => $this->mockCache,
        ]);

        $implementation->sCachedValue($value);
    }

    public function testFailsSetToCacheWithNoCache()
    {
        $implementation = new CacheTraitImplementation();

        $implementation->sCachedValue('1234');

        $cachedValue = $implementation->sCachedValue('1234');
        $this->assertNull($cachedValue);
    }

    public function testFailsSetToCacheWithoutKey()
    {
        $implementation = new CacheTraitImplementation([
            'cache' => $this->mockCache,
            'key'   => null,
        ]);

        $cachedValue = $implementation->sCachedValue('1234');
        $this->assertNull($cachedValue);
    }
}

class CacheTraitImplementation
{
    use CacheTrait;

    private $cache;
    private $cacheConfig;

    public function __construct(array $config = [])
    {
        $this->key = array_key_exists('key', $config) ? $config['key'] : 'key';
        $this->cache = isset($config['cache']) ? $config['cache'] : null;
        $this->cacheConfig = [
            'prefix' => '',
            'lifetime' => 1000,
        ];
    }

    // allows us to keep trait methods private
    public function gCachedValue()
    {
        return $this->getCachedValue($this->key);
    }

    public function sCachedValue($v)
    {
        $this->setCachedValue($this->key, $v);
    }
}
