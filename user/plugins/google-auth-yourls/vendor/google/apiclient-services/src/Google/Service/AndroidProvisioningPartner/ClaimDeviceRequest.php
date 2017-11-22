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

class Google_Service_AndroidProvisioningPartner_ClaimDeviceRequest extends Google_Model
{
  public $customerId;
  protected $deviceIdentifierType = 'Google_Service_AndroidProvisioningPartner_DeviceIdentifier';
  protected $deviceIdentifierDataType = '';
  public $sectionType;

  public function setCustomerId($customerId)
  {
    $this->customerId = $customerId;
  }
  public function getCustomerId()
  {
    return $this->customerId;
  }
  /**
   * @param Google_Service_AndroidProvisioningPartner_DeviceIdentifier
   */
  public function setDeviceIdentifier(Google_Service_AndroidProvisioningPartner_DeviceIdentifier $deviceIdentifier)
  {
    $this->deviceIdentifier = $deviceIdentifier;
  }
  /**
   * @return Google_Service_AndroidProvisioningPartner_DeviceIdentifier
   */
  public function getDeviceIdentifier()
  {
    return $this->deviceIdentifier;
  }
  public function setSectionType($sectionType)
  {
    $this->sectionType = $sectionType;
  }
  public function getSectionType()
  {
    return $this->sectionType;
  }
}
