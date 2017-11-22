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

class Google_Service_CloudIot_DeviceConfig extends Google_Model
{
  public $binaryData;
  public $cloudUpdateTime;
  public $deviceAckTime;
  public $version;

  public function setBinaryData($binaryData)
  {
    $this->binaryData = $binaryData;
  }
  public function getBinaryData()
  {
    return $this->binaryData;
  }
  public function setCloudUpdateTime($cloudUpdateTime)
  {
    $this->cloudUpdateTime = $cloudUpdateTime;
  }
  public function getCloudUpdateTime()
  {
    return $this->cloudUpdateTime;
  }
  public function setDeviceAckTime($deviceAckTime)
  {
    $this->deviceAckTime = $deviceAckTime;
  }
  public function getDeviceAckTime()
  {
    return $this->deviceAckTime;
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
