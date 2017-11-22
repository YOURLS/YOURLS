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

class Google_Service_Spectrum_PawsRegisterRequest extends Google_Model
{
  protected $antennaType = 'Google_Service_Spectrum_AntennaCharacteristics';
  protected $antennaDataType = '';
  protected $deviceDescType = 'Google_Service_Spectrum_DeviceDescriptor';
  protected $deviceDescDataType = '';
  protected $deviceOwnerType = 'Google_Service_Spectrum_DeviceOwner';
  protected $deviceOwnerDataType = '';
  protected $locationType = 'Google_Service_Spectrum_GeoLocation';
  protected $locationDataType = '';
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
   * @param Google_Service_Spectrum_DeviceOwner
   */
  public function setDeviceOwner(Google_Service_Spectrum_DeviceOwner $deviceOwner)
  {
    $this->deviceOwner = $deviceOwner;
  }
  /**
   * @return Google_Service_Spectrum_DeviceOwner
   */
  public function getDeviceOwner()
  {
    return $this->deviceOwner;
  }
  /**
   * @param Google_Service_Spectrum_GeoLocation
   */
  public function setLocation(Google_Service_Spectrum_GeoLocation $location)
  {
    $this->location = $location;
  }
  /**
   * @return Google_Service_Spectrum_GeoLocation
   */
  public function getLocation()
  {
    return $this->location;
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
