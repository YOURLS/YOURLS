<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_Mirror_Account extends Google_Collection
{
  protected $collection_key = 'userData';
  protected $authTokensType = 'Google_Service_Mirror_AuthToken';
  protected $authTokensDataType = 'array';
  public $features;
  public $password;
  protected $userDataType = 'Google_Service_Mirror_UserData';
  protected $userDataDataType = 'array';

  /**
   * @param Google_Service_Mirror_AuthToken
   */
  public function setAuthTokens($authTokens)
  {
    $this->authTokens = $authTokens;
  }
  /**
   * @return Google_Service_Mirror_AuthToken
   */
  public function getAuthTokens()
  {
    return $this->authTokens;
  }
  public function setFeatures($features)
  {
    $this->features = $features;
  }
  public function getFeatures()
  {
    return $this->features;
  }
  public function setPassword($password)
  {
    $this->password = $password;
  }
  public function getPassword()
  {
    return $this->password;
  }
  /**
   * @param Google_Service_Mirror_UserData
   */
  public function setUserData($userData)
  {
    $this->userData = $userData;
  }
  /**
   * @return Google_Service_Mirror_UserData
   */
  public function getUserData()
  {
    return $this->userData;
  }
}
