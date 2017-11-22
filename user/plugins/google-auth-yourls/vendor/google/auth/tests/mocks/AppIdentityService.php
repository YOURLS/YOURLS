<?php

namespace google\appengine\api\app_identity;

class AppIdentityService
{
    public static $scope;
    public static $accessToken = array(
        'access_token' => 'xyz',
        'expiration_time' => '2147483646',
    );

    public static function getAccessToken($scope)
    {
        self::$scope = $scope;

        return self::$accessToken;
    }
}
