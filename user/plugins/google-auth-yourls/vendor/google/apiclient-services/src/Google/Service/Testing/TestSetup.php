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

class Google_Service_Testing_TestSetup extends Google_Collection
{
  protected $collection_key = 'filesToPush';
  protected $accountType = 'Google_Service_Testing_Account';
  protected $accountDataType = '';
  public $directoriesToPull;
  protected $environmentVariablesType = 'Google_Service_Testing_EnvironmentVariable';
  protected $environmentVariablesDataType = 'array';
  protected $filesToPushType = 'Google_Service_Testing_DeviceFile';
  protected $filesToPushDataType = 'array';
  public $networkProfile;

  /**
   * @param Google_Service_Testing_Account
   */
  public function setAccount(Google_Service_Testing_Account $account)
  {
    $this->account = $account;
  }
  /**
   * @return Google_Service_Testing_Account
   */
  public function getAccount()
  {
    return $this->account;
  }
  public function setDirectoriesToPull($directoriesToPull)
  {
    $this->directoriesToPull = $directoriesToPull;
  }
  public function getDirectoriesToPull()
  {
    return $this->directoriesToPull;
  }
  /**
   * @param Google_Service_Testing_EnvironmentVariable
   */
  public function setEnvironmentVariables($environmentVariables)
  {
    $this->environmentVariables = $environmentVariables;
  }
  /**
   * @return Google_Service_Testing_EnvironmentVariable
   */
  public function getEnvironmentVariables()
  {
    return $this->environmentVariables;
  }
  /**
   * @param Google_Service_Testing_DeviceFile
   */
  public function setFilesToPush($filesToPush)
  {
    $this->filesToPush = $filesToPush;
  }
  /**
   * @return Google_Service_Testing_DeviceFile
   */
  public function getFilesToPush()
  {
    return $this->filesToPush;
  }
  public function setNetworkProfile($networkProfile)
  {
    $this->networkProfile = $networkProfile;
  }
  public function getNetworkProfile()
  {
    return $this->networkProfile;
  }
}
