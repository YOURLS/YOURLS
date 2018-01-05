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

class Google_Service_AndroidProvisioningPartner_Device extends Google_Collection
{
  protected $collection_key = 'claims';
  protected $claimsType = 'Google_Service_AndroidProvisioningPartner_DeviceClaim';
  protected $claimsDataType = 'array';
  public $configuration;
  public $deviceId;
  protected $deviceIdentifierType = 'Google_Service_AndroidProvisioningPartner_DeviceIdentifier';
  protected $deviceIdentifierDataType = '';
  protected $deviceMetadataType = 'Google_Service_AndroidProvisioningPartner_DeviceMetadata';
  protected $deviceMetadataDataType = '';
  public $name;

  /**
   * @param Google_Service_AndroidProvisioningPartner_DeviceClaim
   */
  public function setClaims($claims)
  {
    $this->claims = $claims;
  }
  /**
   * @return Google_Service_AndroidProvisioningPartner_DeviceClaim
   */
  public function getClaims()
  {
    return $this->claims;
  }
  public function setConfiguration($configuration)
  {
    $this->configuration = $configuration;
  }
  public function getConfiguration()
  {
    return $this->configuration;
  }
  public function setDeviceId($deviceId)
  {
    $this->deviceId = $deviceId;
  }
  public function getDeviceId()
  {
    return $this->deviceId;
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
  /**
   * @param Google_Service_AndroidProvisioningPartner_DeviceMetadata
   */
  public function setDeviceMetadata(Google_Service_AndroidProvisioningPartner_DeviceMetadata $deviceMetadata)
  {
    $this->deviceMetadata = $deviceMetadata;
  }
  /**
   * @return Google_Service_AndroidProvisioningPartner_DeviceMetadata
   */
  public function getDeviceMetadata()
  {
    return $this->deviceMetadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
