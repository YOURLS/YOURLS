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

class Google_Service_Spectrum_DeviceValidity extends Google_Model
{
  protected $deviceDescType = 'Google_Service_Spectrum_DeviceDescriptor';
  protected $deviceDescDataType = '';
  public $isValid;
  public $reason;

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
  public function setIsValid($isValid)
  {
    $this->isValid = $isValid;
  }
  public function getIsValid()
  {
    return $this->isValid;
  }
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  public function getReason()
  {
    return $this->reason;
  }
}
