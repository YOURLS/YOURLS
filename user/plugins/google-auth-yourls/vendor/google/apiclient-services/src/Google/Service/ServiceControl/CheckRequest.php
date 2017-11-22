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

class Google_Service_ServiceControl_CheckRequest extends Google_Model
{
  protected $operationType = 'Google_Service_ServiceControl_Operation';
  protected $operationDataType = '';
  public $requestProjectSettings;
  public $serviceConfigId;
  public $skipActivationCheck;

  /**
   * @param Google_Service_ServiceControl_Operation
   */
  public function setOperation(Google_Service_ServiceControl_Operation $operation)
  {
    $this->operation = $operation;
  }
  /**
   * @return Google_Service_ServiceControl_Operation
   */
  public function getOperation()
  {
    return $this->operation;
  }
  public function setRequestProjectSettings($requestProjectSettings)
  {
    $this->requestProjectSettings = $requestProjectSettings;
  }
  public function getRequestProjectSettings()
  {
    return $this->requestProjectSettings;
  }
  public function setServiceConfigId($serviceConfigId)
  {
    $this->serviceConfigId = $serviceConfigId;
  }
  public function getServiceConfigId()
  {
    return $this->serviceConfigId;
  }
  public function setSkipActivationCheck($skipActivationCheck)
  {
    $this->skipActivationCheck = $skipActivationCheck;
  }
  public function getSkipActivationCheck()
  {
    return $this->skipActivationCheck;
  }
}
