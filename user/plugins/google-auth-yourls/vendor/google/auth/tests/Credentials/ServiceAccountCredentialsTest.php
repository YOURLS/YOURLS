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
use Google\Auth\Credentials\ServiceAccountCredentials;
use Google\Auth\Credentials\ServiceAccountJwtAccessCredentials;
use Google\Auth\CredentialsLoader;
use Google\Auth\OAuth2;
use GuzzleHttp\Psr7;

// Creates a standard JSON auth object for testing.
function createTestJson()
{
    return [
        'private_key_id' => 'key123',
        'private_key' => 'privatekey',
        'client_email' => 'test@example.com',
        'client_id' => 'client123',
        'type' => 'service_account',
    ];
}

class SACGetCacheKeyTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldBeTheSameAsOAuth2WithTheSameScope()
    {
        $testJson = createTestJson();
        $scope = ['scope/1', 'scope/2'];
        $sa = new ServiceAccountCredentials(
            $scope,
            $testJson);
        $o = new OAuth2(['scope' => $scope]);
        $this->assertSame(
            $testJson['client_email'] . ':' . $o->getCacheKey(),
            $sa->getCacheKey()
        );
    }

    public function testShouldBeTheSameAsOAuth2WithTheSameScopeWithSub()
    {
        $testJson = createTestJson();
        $scope = ['scope/1', 'scope/2'];
        $sub = 'sub123';
        $sa = new ServiceAccountCredentials(
            $scope,
            $testJson,
            $sub);
        $o = new OAuth2(['scope' => $scope]);
        $this->assertSame(
            $testJson['client_email'] . ':' . $o->getCacheKey() . ':' . $sub,
            $sa->getCacheKey()
        );
    }

    public function testShouldBeTheSameAsOAuth2WithTheSameScopeWithSubAddedLater()
    {
        $testJson = createTestJson();
        $scope = ['scope/1', 'scope/2'];
        $sub = 'sub123';
        $sa = new ServiceAccountCredentials(
            $scope,
            $testJson,
            null);
        $sa->setSub($sub);

        $o = new OAuth2(['scope' => $scope]);
        $this->assertSame(
            $testJson['client_email'] . ':' . $o->getCacheKey() . ':' . $sub,
            $sa->getCacheKey()
        );
    }
}

class SACConstructorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldFailIfScopeIsNotAValidType()
    {
        $testJson = createTestJson();
        $notAnArrayOrString = new \stdClass();
        $sa = new ServiceAccountCredentials(
            $notAnArrayOrString,
            $testJson
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldFailIfJsonDoesNotHaveClientEmail()
    {
        $testJson = createTestJson();
        unset($testJson['client_email']);
        $scope = ['scope/1', 'scope/2'];
        $sa = new ServiceAccountCredentials(
            $scope,
            $testJson
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldFailIfJsonDoesNotHavePrivateKey()
    {
        $testJson = createTestJson();
        unset($testJson['private_key']);
        $scope = ['scope/1', 'scope/2'];
        $sa = new ServiceAccountCredentials(
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
        new ServiceAccountCredentials('scope/1', $keyFile);
    }

    public function testInitalizeFromAFile()
    {
        $keyFile = __DIR__ . '/../fixtures' . '/private.json';
        $this->assertNotNull(
            new ServiceAccountCredentials('scope/1', $keyFile)
        );
    }
}

class SACFromEnvTest extends \PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        putenv(ServiceAccountCredentials::ENV_VAR);  // removes it from
    }

    public function testIsNullIfEnvVarIsNotSet()
    {
        $this->assertNull(ServiceAccountCredentials::fromEnv());
    }

    /**
     * @expectedException DomainException
     */
    public function testFailsIfEnvSpecifiesNonExistentFile()
    {
        $keyFile = __DIR__ . '/../fixtures' . '/does-not-exist-private.json';
        putenv(ServiceAccountCredentials::ENV_VAR . '=' . $keyFile);
        ApplicationDefaultCredentials::getCredentials('a scope');
    }

    public function testSucceedIfFileExists()
    {
        $keyFile = __DIR__ . '/../fixtures' . '/private.json';
        putenv(ServiceAccountCredentials::ENV_VAR . '=' . $keyFile);
        $this->assertNotNull(ApplicationDefaultCredentials::getCredentials('a scope'));
    }
}

class SACFromWellKnownFileTest extends \PHPUnit_Framework_TestCase
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
        putenv('HOME=' . __DIR__ . '/../not_exists_fixtures');
        $this->assertNull(
            ServiceAccountCredentials::fromWellKnownFile()
        );
    }

    public function testSucceedIfFileIsPresent()
    {
        putenv('HOME=' . __DIR__ . '/../fixtures');
        $this->assertNotNull(
            ApplicationDefaultCredentials::getCredentials('a scope')
        );
    }
}

class SACFetchAuthTokenTest extends \PHPUnit_Framework_TestCase
{
    private $privateKey;

    public function setUp()
    {
        $this->privateKey =
            file_get_contents(__DIR__ . '/../fixtures' . '/private.pem');
    }

    private function createTestJson()
    {
        $testJson = createTestJson();
        $testJson['private_key'] = $this->privateKey;

        return $testJson;
    }

    /**
     * @expectedException GuzzleHttp\Exception\ClientException
     */
    public function testFailsOnClientErrors()
    {
        $testJson = $this->createTestJson();
        $scope = ['scope/1', 'scope/2'];
        $httpHandler = getHandler([
            buildResponse(400),
        ]);
        $sa = new ServiceAccountCredentials(
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
        $testJson = $this->createTestJson();
        $scope = ['scope/1', 'scope/2'];
        $httpHandler = getHandler([
            buildResponse(500),
        ]);
        $sa = new ServiceAccountCredentials(
            $scope,
            $testJson
        );
        $sa->fetchAuthToken($httpHandler);
    }

    public function testCanFetchCredsOK()
    {
        $testJson = $this->createTestJson();
        $testJsonText = json_encode($testJson);
        $scope = ['scope/1', 'scope/2'];
        $httpHandler = getHandler([
            buildResponse(200, [], Psr7\stream_for($testJsonText)),
        ]);
        $sa = new ServiceAccountCredentials(
            $scope,
            $testJson
        );
        $tokens = $sa->fetchAuthToken($httpHandler);
        $this->assertEquals($testJson, $tokens);
    }

    public function testUpdateMetadataFunc()
    {
        $testJson = $this->createTestJson();
        $scope = ['scope/1', 'scope/2'];
        $access_token = 'accessToken123';
        $responseText = json_encode(array('access_token' => $access_token));
        $httpHandler = getHandler([
            buildResponse(200, [], Psr7\stream_for($responseText)),
        ]);
        $sa = new ServiceAccountCredentials(
            $scope,
            $testJson
        );
        $update_metadata = $sa->getUpdateMetadataFunc();
        $this->assertTrue(is_callable($update_metadata));

        $actual_metadata = call_user_func($update_metadata,
            $metadata = array('foo' => 'bar'),
            $authUri = null,
            $httpHandler);
        $this->assertTrue(
            isset($actual_metadata[CredentialsLoader::AUTH_METADATA_KEY]));
        $this->assertEquals(
            $actual_metadata[CredentialsLoader::AUTH_METADATA_KEY],
            array('Bearer ' . $access_token));
    }
}

class SACJwtAccessTest extends \PHPUnit_Framework_TestCase
{
    private $privateKey;

    public function setUp()
    {
        $this->privateKey =
            file_get_contents(__DIR__ . '/../fixtures' . '/private.pem');
    }

    private function createTestJson()
    {
        $testJson = createTestJson();
        $testJson['private_key'] = $this->privateKey;

        return $testJson;
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testFailsOnMissingClientEmail()
    {
        $testJson = $this->createTestJson();
        unset($testJson['client_email']);
        $sa = new ServiceAccountJwtAccessCredentials(
            $testJson
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testFailsOnMissingPrivateKey()
    {
        $testJson = $this->createTestJson();
        unset($testJson['private_key']);
        $sa = new ServiceAccountJwtAccessCredentials(
            $testJson
        );
    }

    public function testCanInitializeFromJson()
    {
        $testJson = $this->createTestJson();
        $sa = new ServiceAccountJwtAccessCredentials(
            $testJson
        );
        $this->assertNotNull($sa);
    }

    public function testNoOpOnFetchAuthToken()
    {
        $testJson = $this->createTestJson();
        $sa = new ServiceAccountJwtAccessCredentials(
            $testJson
        );
        $this->assertNotNull($sa);

        $httpHandler = getHandler([
            buildResponse(200),
        ]);
        $result = $sa->fetchAuthToken($httpHandler); // authUri has not been set
        $this->assertNull($result);
    }

    public function testAuthUriIsNotSet()
    {
        $testJson = $this->createTestJson();
        $sa = new ServiceAccountJwtAccessCredentials(
            $testJson
        );
        $this->assertNotNull($sa);

        $update_metadata = $sa->getUpdateMetadataFunc();
        $this->assertTrue(is_callable($update_metadata));

        $actual_metadata = call_user_func($update_metadata,
            $metadata = array('foo' => 'bar'),
            $authUri = null);
        $this->assertTrue(
            !isset($actual_metadata[CredentialsLoader::AUTH_METADATA_KEY]));
    }

    public function testUpdateMetadataFunc()
    {
        $testJson = $this->createTestJson();
        $sa = new ServiceAccountJwtAccessCredentials(
            $testJson
        );
        $this->assertNotNull($sa);

        $update_metadata = $sa->getUpdateMetadataFunc();
        $this->assertTrue(is_callable($update_metadata));

        $actual_metadata = call_user_func($update_metadata,
            $metadata = array('foo' => 'bar'),
            $authUri = 'https://example.com/service');
        $this->assertTrue(
            isset($actual_metadata[CredentialsLoader::AUTH_METADATA_KEY]));

        $authorization = $actual_metadata[CredentialsLoader::AUTH_METADATA_KEY];
        $this->assertTrue(is_array($authorization));

        $bearer_token = current($authorization);
        $this->assertTrue(is_string($bearer_token));
        $this->assertTrue(strpos($bearer_token, 'Bearer ') == 0);
        $this->assertTrue(strlen($bearer_token) > 30);

        $actual_metadata2 = call_user_func($update_metadata,
            $metadata = array('foo' => 'bar'),
            $authUri = 'https://example.com/anotherService');
        $this->assertTrue(
            isset($actual_metadata2[CredentialsLoader::AUTH_METADATA_KEY]));

        $authorization2 = $actual_metadata2[CredentialsLoader::AUTH_METADATA_KEY];
        $this->assertTrue(is_array($authorization2));

        $bearer_token2 = current($authorization2);
        $this->assertTrue(is_string($bearer_token2));
        $this->assertTrue(strpos($bearer_token2, 'Bearer ') == 0);
        $this->assertTrue(strlen($bearer_token2) > 30);
        $this->assertTrue($bearer_token != $bearer_token2);
    }
}

class SACJwtAccessComboTest extends \PHPUnit_Framework_TestCase
{
    private $privateKey;

    public function setUp()
    {
        $this->privateKey =
            file_get_contents(__DIR__ . '/../fixtures' . '/private.pem');
    }

    private function createTestJson()
    {
        $testJson = createTestJson();
        $testJson['private_key'] = $this->privateKey;

        return $testJson;
    }

    public function testNoScopeUseJwtAccess()
    {
        $testJson = $this->createTestJson();
        // no scope, jwt access should be used, no outbound
        // call should be made
        $scope = null;
        $sa = new ServiceAccountCredentials(
            $scope,
            $testJson
        );
        $this->assertNotNull($sa);

        $update_metadata = $sa->getUpdateMetadataFunc();
        $this->assertTrue(is_callable($update_metadata));

        $actual_metadata = call_user_func($update_metadata,
            $metadata = array('foo' => 'bar'),
            $authUri = 'https://example.com/service');
        $this->assertTrue(
            isset($actual_metadata[CredentialsLoader::AUTH_METADATA_KEY]));

        $authorization = $actual_metadata[CredentialsLoader::AUTH_METADATA_KEY];
        $this->assertTrue(is_array($authorization));

        $bearer_token = current($authorization);
        $this->assertTrue(is_string($bearer_token));
        $this->assertTrue(strpos($bearer_token, 'Bearer ') == 0);
        $this->assertTrue(strlen($bearer_token) > 30);
    }

    public function testNoScopeAndNoAuthUri()
    {
        $testJson = $this->createTestJson();
        // no scope, jwt access should be used, no outbound
        // call should be made
        $scope = null;
        $sa = new ServiceAccountCredentials(
            $scope,
            $testJson
        );
        $this->assertNotNull($sa);

        $update_metadata = $sa->getUpdateMetadataFunc();
        $this->assertTrue(is_callable($update_metadata));

        $actual_metadata = call_user_func($update_metadata,
            $metadata = array('foo' => 'bar'),
            $authUri = null);
        // no access_token is added to the metadata hash
        // but also, no error should be thrown
        $this->assertTrue(is_array($actual_metadata));
        $this->assertTrue(
            !isset($actual_metadata[CredentialsLoader::AUTH_METADATA_KEY]));
    }
}
