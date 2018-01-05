<?php
/*
 * Copyright 2010 Google Inc.
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

use Google\Auth\Subscriber\SimpleSubscriber;
use GuzzleHttp\Client;
use GuzzleHttp\Event\BeforeEvent;
use GuzzleHttp\Transaction;

class SimpleSubscriberTest extends BaseTest
{
    protected function setUp()
    {
        $this->onlyGuzzle5();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testRequiresADeveloperKey()
    {
        new SimpleSubscriber(['not_key' => 'a test key']);
    }

    public function testSubscribesToEvents()
    {
        $events = (new SimpleSubscriber(['key' => 'a test key']))->getEvents();
        $this->assertArrayHasKey('before', $events);
    }

    public function testAddsTheKeyToTheQuery()
    {
        $s = new SimpleSubscriber(['key' => 'test_key']);
        $client = new Client();
        $request = $client->createRequest('GET', 'http://testing.org',
            ['auth' => 'simple']);
        $before = new BeforeEvent(new Transaction($client, $request));
        $s->onBefore($before);
        $this->assertCount(1, $request->getQuery());
        $this->assertTrue($request->getQuery()->hasKey('key'));
        $this->assertSame($request->getQuery()->get('key'), 'test_key');
    }

    public function testOnlyTouchesWhenAuthConfigIsSimple()
    {
        $s = new SimpleSubscriber(['key' => 'test_key']);
        $client = new Client();
        $request = $client->createRequest('GET', 'http://testing.org',
            ['auth' => 'notsimple']);
        $before = new BeforeEvent(new Transaction($client, $request));
        $s->onBefore($before);
        $this->assertCount(0, $request->getQuery());
    }
}
