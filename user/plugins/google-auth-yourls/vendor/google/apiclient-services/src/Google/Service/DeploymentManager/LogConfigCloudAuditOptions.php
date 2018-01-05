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

class Google_Service_DeploymentManager_LogConfigCloudAuditOptions extends Google_Model
{
  protected $authorizationLoggingOptionsType = 'Google_Service_DeploymentManager_AuthorizationLoggingOptions';
  protected $authorizationLoggingOptionsDataType = '';
  public $logName;

  /**
   * @param Google_Service_DeploymentManager_AuthorizationLoggingOptions
   */
  public function setAuthorizationLoggingOptions(Google_Service_DeploymentManager_AuthorizationLoggingOptions $authorizationLoggingOptions)
  {
    $this->authorizationLoggingOptions = $authorizationLoggingOptions;
  }
  /**
   * @return Google_Service_DeploymentManager_AuthorizationLoggingOptions
   */
  public function getAuthorizationLoggingOptions()
  {
    return $this->authorizationLoggingOptions;
  }
  public function setLogName($logName)
  {
    $this->logName = $logName;
  }
  public function getLogName()
  {
    return $this->logName;
  }
}
