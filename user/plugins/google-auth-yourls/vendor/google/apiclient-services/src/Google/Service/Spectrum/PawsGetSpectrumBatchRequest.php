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

class Google_Service_Spectrum_PawsGetSpectrumBatchRequest extends Google_Collection
{
  protected $collection_key = 'locations';
  protected $antennaType = 'Google_Service_Spectrum_AntennaCharacteristics';
  protected $antennaDataType = '';
  protected $capabilitiesType = 'Google_Service_Spectrum_DeviceCapabilities';
  protected $capabilitiesDataType = '';
  protected $deviceDescType = 'Google_Service_Spectrum_DeviceDescriptor';
  protected $deviceDescDataType = '';
  protected $locationsType = 'Google_Service_Spectrum_GeoLocation';
  protected $locationsDataType = 'array';
  protected $masterDeviceDescType = 'Google_Service_Spectrum_DeviceDescriptor';
  protected $masterDeviceDescDataType = '';
  protected $ownerType = 'Google_Service_Spectrum_DeviceOwner';
  protected $ownerDataType = '';
  public $requestType;
  public $type;
  public $version;

  /**
   * @param Google_Service_Spectrum_AntennaCharacteristics
   */
  public function setAntenna(Google_Service_Spectrum_AntennaCharacteristics $antenna)
  {
    $this->antenna = $antenna;
  }
  /**
   * @return Google_Service_Spectrum_AntennaCharacteristics
   */
  public function getAntenna()
  {
    return $this->antenna;
  }
  /**
   * @param Google_Service_Spectrum_DeviceCapabilities
   */
  public function setCapabilities(Google_Service_Spectrum_DeviceCapabilities $capabilities)
  {
    $this->capabilities = $capabilities;
  }
  /**
   * @return Google_Service_Spectrum_DeviceCapabilities
   */
  public function getCapabilities()
  {
    return $this->capabilities;
  }
  /**
   * @param Google_Service_Spectrum_DeviceDescriptor
   */
  public function setDeviceDesc(Google_Service_Spectrum_DeviceDescriptor $deviceDesc)
  {
    $this->deviceDesc = $deviceDesc;
  }
  /**
   * @return Google_Service_Spectrum_DeviceDescriptor
   */
  public function getDeviceDesc()
  {
    return $this->deviceDesc;
  }
  /**
   * @param Google_Service_Spectrum_GeoLocation
   */
  public function setLocations($locations)
  {
    $this->locations = $locations;
  }
  /**
   * @return Google_Service_Spectrum_GeoLocation
   */
  public function getLocations()
  {
    return $this->locations;
  }
  /**
   * @param Google_Service_Spectrum_DeviceDescriptor
   */
  public function setMasterDeviceDesc(Google_Service_Spectrum_DeviceDescriptor $masterDeviceDesc)
  {
    $this->masterDeviceDesc = $masterDeviceDesc;
  }
  /**
   * @return Google_Service_Spectrum_DeviceDescriptor
   */
  public function getMasterDeviceDesc()
  {
    return $this->masterDeviceDesc;
  }
  /**
   * @param Google_Service_Spectrum_DeviceOwner
   */
  public function setOwner(Google_Service_Spectrum_DeviceOwner $owner)
  {
    $this->owner = $owner;
  }
  /**
   * @return Google_Service_Spectrum_DeviceOwner
   */
  public function getOwner()
  {
    return $this->owner;
  }
  public function setRequestType($requestType)
  {
    $this->requestType = $requestType;
  }
  public function getRequestType()
  {
    return $this->requestType;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
