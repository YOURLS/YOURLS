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

class Google_Service_AndroidProvisioningPartner_DevicesLongRunningOperationResponse extends Google_Collection
{
  protected $collection_key = 'perDeviceStatus';
  protected $perDeviceStatusType = 'Google_Service_AndroidProvisioningPartner_OperationPerDevice';
  protected $perDeviceStatusDataType = 'array';
  public $successCount;

  /**
   * @param Google_Service_AndroidProvisioningPartner_OperationPerDevice
   */
  public function setPerDeviceStatus($perDeviceStatus)
  {
    $this->perDeviceStatus = $perDeviceStatus;
  }
  /**
   * @return Google_Service_AndroidProvisioningPartner_OperationPerDevice
   */
  public function getPerDeviceStatus()
  {
    return $this->perDeviceStatus;
  }
  public function setSuccessCount($successCount)
  {
    $this->successCount = $successCount;
  }
  public function getSuccessCount()
  {
    return $this->successCount;
  }
}
