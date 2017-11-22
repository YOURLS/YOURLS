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
use Google\Auth\Credentials\UserRefreshCredentials;
use Google\Auth\OAuth2;
use GuzzleHttp\Psr7;

// Creates a standard JSON auth object for testing.
function createURCTestJson()
{
    return [
        'client_id' => 'client123',
        'client_secret' => 'clientSecret123',
        'refresh_token' => 'refreshToken123',
        'type' => 'authorized_user',
    ];
}

class URCGetCacheKeyTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldBeTheSameAsOAuth2WithTheSameScope()
    {
        $testJson = createURCTestJson();
        $scope = ['scope/1', 'scope/2'];
        $sa = new UserRefreshCredentials(
            $scope,
            $testJson);
        $o = new OAuth2(['scope' => $scope]);
        $this->assertSame(
            $testJson['client_id'] . ':' . $o->getCacheKey(),
            $sa->getCacheKey()
        );
    }
}

class URCConstructorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldFailIfScopeIsNotAValidType()
    {
        $testJson = createURCTestJson();
        $notAnArrayOrString = new \stdClass();
        $sa = new UserRefreshCredentials(
            $notAnArrayOrString,
            $testJson
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldFailIfJsonDoesNotHaveClientSecret()
    {
        $testJson = createURCTestJson();
        unset($testJson['client_secret']);
        $scope = ['scope/1', 'scope/2'];
        $sa = new UserRefreshCredentials(
            $scope,
            $testJson
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldFailIfJsonDoesNotHaveRefreshToken()
    {
        $testJson = createURCTestJson();
        unset($testJson['refresh_token']);
        $scope = ['scope/1', 'scope/2'];
        $sa = new UserRefreshCredentials(
            $scope,
            $testJson
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testFailsToInitalizeFromANonExistentFile()
    {
        $keyFile = __DIR__ . '/../fixtures' . '/does-not-exist-private.json';
        new UserRefreshCredentials('scope/1', $keyFile);
    }

    public function testInitalizeFromAFile()
    {
        $keyFile = __DIR__ . '/../fixtures2' . '/private.json';
        $this->assertNotNull(
            new UserRefreshCredentials('scope/1', $keyFile)
        );
    }
}

class URCFromEnvTest extends \PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        putenv(UserRefreshCredentials::ENV_VAR);  // removes it from
    }

    public function testIsNullIfEnvVarIsNotSet()
    {
        $this->assertNull(UserRefreshCredentials::fromEnv('a scope'));
    }

    /**
     * @expectedException DomainException
     */
    public function testFailsIfEnvSpecifiesNonExistentFile()
    {
        $keyFile = __DIR__ . '/../fixtures' . '/does-not-exist-private.json';
        putenv(UserRefreshCredentials::ENV_VAR . '=' . $keyFile);
        UserRefreshCredentials::fromEnv('a scope');
    }

    public function testSucceedIfFileExists()
    {
        $keyFile = __DIR__ . '/../fixtures2' . '/private.json';
        putenv(UserRefreshCredentials::ENV_VAR . '=' . $keyFile);
        $this->assertNotNull(ApplicationDefaultCredentials::getCredentials('a scope'));
    }
}

class URCFromWellKnownFileTest extends \PHPUnit_Framework_TestCase
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
    }

    public function testIsNullIfFileDoesNotExist()
    {
        putenv('HOME=' . __DIR__ . '/../not_exist_fixtures');
        $this->assertNull(
            UserRefreshCredentials::fromWellKnownFile('a scope')
        );
    }

    public function testSucceedIfFileIsPresent()
    {
        putenv('HOME=' . __DIR__ . '/../fixtures2');
        $this->assertNotNull(
            ApplicationDefaultCredentials::getCredentials('a scope')
        );
    }
}

class URCFetchAuthTokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException GuzzleHttp\Exception\ClientException
     */
    public function testFailsOnClientErrors()
    {
        $testJson = createURCTestJson();
        $scope = ['scope/1', 'scope/2'];
        $httpHandler = getHandler([
            buildResponse(400),
        ]);
        $sa = new UserRefreshCredentials(
            $scope,
            $testJson
        );
        $sa->fetchAuthToken($httpHandler);
    }

    /**
     * @expectedException GuzzleHttp\Exception\ServerException
     */
    public function testFailsOnServerErrors()
    {
        $testJson = createURCTestJson();
        $scope = ['scope/1', 'scope/2'];
        $httpHandler = getHandler([
            buildResponse(500),
        ]);
        $sa = new UserRefreshCredentials(
            $scope,
            $testJson
        );
        $sa->fetchAuthToken($httpHandler);
    }

    public function testCanFetchCredsOK()
    {
        $testJson = createURCTestJson();
        $testJsonText = json_encode($testJson);
        $scope = ['scope/1', 'scope/2'];
        $httpHandler = getHandler([
            buildResponse(200, [], Psr7\stream_for($testJsonText)),
        ]);
        $sa = new UserRefreshCredentials(
            $scope,
            $testJson
        );
        $tokens = $sa->fetchAuthToken($httpHandler);
        $this->assertEquals($testJson, $tokens);
    }
}
