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

use Google\Auth\ApplicationDefaultCredentials;
use Google\Auth\Credentials\GCECredentials;
use Google\Auth\Credentials\ServiceAccountCredentials;
use GuzzleHttp\Psr7;

class ADCGetTest extends \PHPUnit_Framework_TestCase
{
    private $originalHome;

    protected function setUp()
    {
        $this->originalHome = getenv('HOME');
    }

    protected function tearDown()
    {
        if ($this->originalHome != getenv('HOME')) {
            putenv('HOME=' . $this->originalHome);
        }
        putenv(ServiceAccountCredentials::ENV_VAR);  // removes it from
    }

    /**
     * @expectedException DomainException
     */
    public function testIsFailsEnvSpecifiesNonExistentFile()
    {
        $keyFile = __DIR__ . '/fixtures' . '/does-not-exist-private.json';
        putenv(ServiceAccountCredentials::ENV_VAR . '=' . $keyFile);
        ApplicationDefaultCredentials::getCredentials('a scope');
    }

    public function testLoadsOKIfEnvSpecifiedIsValid()
    {
        $keyFile = __DIR__ . '/fixtures' . '/private.json';
        putenv(ServiceAccountCredentials::ENV_VAR . '=' . $keyFile);
        $this->assertNotNull(
            ApplicationDefaultCredentials::getCredentials('a scope')
        );
    }

    public function testLoadsDefaultFileIfPresentAndEnvVarIsNotSet()
    {
        putenv('HOME=' . __DIR__ . '/fixtures');
        $this->assertNotNull(
            ApplicationDefaultCredentials::getCredentials('a scope')
        );
    }

    /**
     * @expectedException DomainException
     */
    public function testFailsIfNotOnGceAndNoDefaultFileFound()
    {
        putenv('HOME=' . __DIR__ . '/not_exist_fixtures');
        // simulate not being GCE by return 500
        $httpHandler = getHandler([
            buildResponse(500),
        ]);

        ApplicationDefaultCredentials::getCredentials('a scope', $httpHandler);
    }

    public function testSuccedsIfNoDefaultFilesButIsOnGCE()
    {
        $wantedTokens = [
            'access_token' => '1/abdef1234567890',
            'expires_in' => '57',
            'token_type' => 'Bearer',
        ];
        $jsonTokens = json_encode($wantedTokens);

        // simulate the response from GCE.
        $httpHandler = getHandler([
            buildResponse(200, [GCECredentials::FLAVOR_HEADER => 'Google']),
            buildResponse(200, [], Psr7\stream_for($jsonTokens)),
        ]);

        $this->assertNotNull(
            ApplicationDefaultCredentials::getCredentials('a scope', $httpHandler)
        );
    }
}

class ADCGetMiddlewareTest extends \PHPUnit_Framework_TestCase
{
    private $originalHome;

    protected function setUp()
    {
        $this->originalHome = getenv('HOME');
    }

    protected function tearDown()
    {
        if ($this->originalHome != getenv('HOME')) {
            putenv('HOME=' . $this->originalHome);
        }
        putenv(ServiceAccountCredentials::ENV_VAR);  // removes it if assigned
    }

    /**
     * @expectedException DomainException
     */
    public function testIsFailsEnvSpecifiesNonExistentFile()
    {
        $keyFile = __DIR__ . '/fixtures' . '/does-not-exist-private.json';
        putenv(ServiceAccountCredentials::ENV_VAR . '=' . $keyFile);
        ApplicationDefaultCredentials::getMiddleware('a scope');
    }

    public function testLoadsOKIfEnvSpecifiedIsValid()
    {
        $keyFile = __DIR__ . '/fixtures' . '/private.json';
        putenv(ServiceAccountCredentials::ENV_VAR . '=' . $keyFile);
        $this->assertNotNull(ApplicationDefaultCredentials::getMiddleware('a scope'));
    }

    public function testLoadsDefaultFileIfPresentAndEnvVarIsNotSet()
    {
        putenv('HOME=' . __DIR__ . '/fixtures');
        $this->assertNotNull(ApplicationDefaultCredentials::getMiddleware('a scope'));
    }

    /**
     * @expectedException DomainException
     */
    public function testFailsIfNotOnGceAndNoDefaultFileFound()
    {
        putenv('HOME=' . __DIR__ . '/not_exist_fixtures');

        // simulate not being GCE by return 500
        $httpHandler = getHandler([
            buildResponse(500),
        ]);

        ApplicationDefaultCredentials::getMiddleware('a scope', $httpHandler);
    }

    public function testSuccedsIfNoDefaultFilesButIsOnGCE()
    {
        $wantedTokens = [
            'access_token' => '1/abdef1234567890',
            'expires_in' => '57',
            'token_type' => 'Bearer',
        ];
        $jsonTokens = json_encode($wantedTokens);

        // simulate the response from GCE.
        $httpHandler = getHandler([
            buildResponse(200, [GCECredentials::FLAVOR_HEADER => 'Google']),
            buildResponse(200, [], Psr7\stream_for($jsonTokens)),
        ]);

        $this->assertNotNull(ApplicationDefaultCredentials::getMiddleware('a scope', $httpHandler));
    }
}

class ADCGetCredentialsAppEngineTest extends BaseTest
{
    private $originalHome;
    private $originalServiceAccount;

    protected function setUp()
    {
        // set home to be somewhere else
        $this->originalHome = getenv('HOME');
        putenv('HOME=' . __DIR__ . '/not_exist_fixtures');

        // remove service account path
        $this->originalServiceAccount = getenv(ServiceAccountCredentials::ENV_VAR);
        putenv(ServiceAccountCredentials::ENV_VAR);
    }

    protected function tearDown()
    {
        // removes it if assigned
        putenv('HOME=' . $this->originalHome);
        putenv(ServiceAccountCredentials::ENV_VAR . '=' . $this->originalServiceAccount);
    }

    public function testAppEngineStandard()
    {
        $_SERVER['SERVER_SOFTWARE'] = 'Google App Engine';
        $this->assertInstanceOf(
            'Google\Auth\Credentials\AppIdentityCredentials',
            ApplicationDefaultCredentials::getCredentials()
        );
    }

    public function testAppEngineFlexible()
    {
        $_SERVER['SERVER_SOFTWARE'] = 'Google App Engine';
        $_SERVER['GAE_VM'] = 'true';
        $httpHandler = getHandler([
            buildResponse(200, [GCECredentials::FLAVOR_HEADER => 'Google']),
        ]);
        $this->assertInstanceOf(
            'Google\Auth\Credentials\GCECredentials',
            ApplicationDefaultCredentials::getCredentials(null, $httpHandler)
        );
    }
}

// @todo consider a way to DRY this and above class up
class ADCGetSubscriberTest extends BaseTest
{
    private $originalHome;

    protected function setUp()
    {
        $this->onlyGuzzle5();

        $this->originalHome = getenv('HOME');
    }

    protected function tearDown()
    {
        if ($this->originalHome != getenv('HOME')) {
            putenv('HOME=' . $this->originalHome);
        }
        putenv(ServiceAccountCredentials::ENV_VAR);  // removes it if assigned
    }

    /**
     * @expectedException DomainException
     */
    public function testIsFailsEnvSpecifiesNonExistentFile()
    {
        $keyFile = __DIR__ . '/fixtures' . '/does-not-exist-private.json';
        putenv(ServiceAccountCredentials::ENV_VAR . '=' . $keyFile);
        ApplicationDefaultCredentials::getSubscriber('a scope');
    }

    public function testLoadsOKIfEnvSpecifiedIsValid()
    {
        $keyFile = __DIR__ . '/fixtures' . '/private.json';
        putenv(ServiceAccountCredentials::ENV_VAR . '=' . $keyFile);
        $this->assertNotNull(ApplicationDefaultCredentials::getSubscriber('a scope'));
    }

    public function testLoadsDefaultFileIfPresentAndEnvVarIsNotSet()
    {
        putenv('HOME=' . __DIR__ . '/fixtures');
        $this->assertNotNull(ApplicationDefaultCredentials::getSubscriber('a scope'));
    }

    /**
     * @expectedException DomainException
     */
    public function testFailsIfNotOnGceAndNoDefaultFileFound()
    {
        putenv('HOME=' . __DIR__ . '/not_exist_fixtures');

        // simulate not being GCE by return 500
        $httpHandler = getHandler([
            buildResponse(500),
        ]);

        ApplicationDefaultCredentials::getSubscriber('a scope', $httpHandler);
    }

    public function testSuccedsIfNoDefaultFilesButIsOnGCE()
    {
        $wantedTokens = [
            'access_token' => '1/abdef1234567890',
            'expires_in' => '57',
            'token_type' => 'Bearer',
        ];
        $jsonTokens = json_encode($wantedTokens);

        // simulate the response from GCE.
        $httpHandler = getHandler([
            buildResponse(200, [GCECredentials::FLAVOR_HEADER => 'Google']),
            buildResponse(200, [], Psr7\stream_for($jsonTokens)),
        ]);

        $this->assertNotNull(ApplicationDefaultCredentials::getSubscriber('a scope', $httpHandler));
    }
}
