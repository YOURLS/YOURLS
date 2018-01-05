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

use Google\Auth\Credentials\GCECredentials;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Response;

class GCECredentialsOnGCETest extends \PHPUnit_Framework_TestCase
{
    public function testIsFalseOnClientErrorStatus()
    {
        $httpHandler = getHandler([
            buildResponse(400),
        ]);
        $this->assertFalse(GCECredentials::onGCE($httpHandler));
    }

    public function testIsFalseOnServerErrorStatus()
    {
        $httpHandler = getHandler([
            buildResponse(500),
        ]);
        $this->assertFalse(GCECredentials::onGCE($httpHandler));
    }

    public function testIsFalseOnOkStatusWithoutExpectedHeader()
    {
        $httpHandler = getHandler([
            buildResponse(200),
        ]);
        $this->assertFalse(GCECredentials::onGCE($httpHandler));
    }

    public function testIsOkIfGoogleIsTheFlavor()
    {
        $httpHandler = getHandler([
            buildResponse(200, [GCECredentials::FLAVOR_HEADER => 'Google']),
        ]);
        $this->assertTrue(GCECredentials::onGCE($httpHandler));
    }
}

class GCECredentialsOnAppEngineFlexibleTest extends \PHPUnit_Framework_TestCase
{
    public function testIsFalseByDefault()
    {
        $this->assertFalse(GCECredentials::onAppEngineFlexible());
    }

    public function testIsTrueWhenGaeVmIsTrue()
    {
        $_SERVER['GAE_VM'] = 'true';
        $this->assertTrue(GCECredentials::onAppEngineFlexible());
    }
}

class GCECredentialsGetCacheKeyTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldNotBeEmpty()
    {
        $g = new GCECredentials();
        $this->assertNotEmpty($g->getCacheKey());
    }
}

class GCECredentialsFetchAuthTokenTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldBeEmptyIfNotOnGCE()
    {
        $httpHandler = getHandler([
            buildResponse(500),
        ]);
        $g = new GCECredentials();
        $this->assertEquals(array(), $g->fetchAuthToken($httpHandler));
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Invalid JSON response
     */
    public function testShouldFailIfResponseIsNotJson()
    {
        $notJson = '{"foo": , this is cannot be passed as json" "bar"}';
        $httpHandler = getHandler([
            buildResponse(200, [GCECredentials::FLAVOR_HEADER => 'Google']),
            buildResponse(200, [], $notJson),
        ]);
        $g = new GCECredentials();
        $g->fetchAuthToken($httpHandler);
    }

    public function testShouldReturnTokenInfo()
    {
        $wantedTokens = [
            'access_token' => '1/abdef1234567890',
            'expires_in' => '57',
            'token_type' => 'Bearer',
        ];
        $jsonTokens = json_encode($wantedTokens);
        $httpHandler = getHandler([
            buildResponse(200, [GCECredentials::FLAVOR_HEADER => 'Google']),
            buildResponse(200, [], Psr7\stream_for($jsonTokens)),
        ]);
        $g = new GCECredentials();
        $this->assertEquals($wantedTokens, $g->fetchAuthToken($httpHandler));
        $this->assertEquals(time() + 57, $g->getLastReceivedToken()['expires_at']);
    }
}
