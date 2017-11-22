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

use google\appengine\api\app_identity\AppIdentityService;
// included from tests\mocks\AppIdentityService.php
use Google\Auth\Credentials\AppIdentityCredentials;

class AppIdentityCredentialsOnAppEngineTest extends \PHPUnit_Framework_TestCase
{
    public function testIsFalseByDefault()
    {
        $this->assertFalse(AppIdentityCredentials::onAppEngine());
    }

    public function testIsTrueWhenServerSoftwareIsGoogleAppEngine()
    {
        $_SERVER['SERVER_SOFTWARE'] = 'Google App Engine';
        $this->assertTrue(AppIdentityCredentials::onAppEngine());
    }

    public function testIsTrueWhenAppEngineRuntimeIsPhp()
    {
        $_SERVER['APPENGINE_RUNTIME'] = 'php';
        $this->assertTrue(AppIdentityCredentials::onAppEngine());
    }
}

class AppIdentityCredentialsGetCacheKeyTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldBeEmpty()
    {
        $g = new AppIdentityCredentials();
        $this->assertEmpty($g->getCacheKey());
    }
}

class AppIdentityCredentialsFetchAuthTokenTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldBeEmptyIfNotOnAppEngine()
    {
        $g = new AppIdentityCredentials();
        $this->assertEquals(array(), $g->fetchAuthToken());
    }

    /* @expectedException */
    public function testThrowsExceptionIfClassDoesntExist()
    {
        $_SERVER['SERVER_SOFTWARE'] = 'Google App Engine';
        $g = new AppIdentityCredentials();
    }

    public function testReturnsExpectedToken()
    {
        // include the mock AppIdentityService class
        require_once __DIR__ . '/../mocks/AppIdentityService.php';

        $wantedToken = [
            'access_token' => '1/abdef1234567890',
            'expires_in' => '57',
            'token_type' => 'Bearer',
        ];

        AppIdentityService::$accessToken = $wantedToken;

        $_SERVER['SERVER_SOFTWARE'] = 'Google App Engine';

        $g = new AppIdentityCredentials();
        $this->assertEquals($wantedToken, $g->fetchAuthToken());
    }

    public function testScopeIsAlwaysArray()
    {
        // include the mock AppIdentityService class
        require_once __DIR__ . '/../mocks/AppIdentityService.php';

        $scope1 = ['scopeA', 'scopeB'];
        $scope2 = 'scopeA scopeB';
        $scope3 = 'scopeA';

        $_SERVER['SERVER_SOFTWARE'] = 'Google App Engine';

        $g = new AppIdentityCredentials($scope1);
        $g->fetchAuthToken();
        $this->assertEquals($scope1, AppIdentityService::$scope);

        $g = new AppIdentityCredentials($scope2);
        $g->fetchAuthToken();
        $this->assertEquals(explode(' ', $scope2), AppIdentityService::$scope);

        $g = new AppIdentityCredentials($scope3);
        $g->fetchAuthToken();
        $this->assertEquals([$scope3], AppIdentityService::$scope);
    }
}
