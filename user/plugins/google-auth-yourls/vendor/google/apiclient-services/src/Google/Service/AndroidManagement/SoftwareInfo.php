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

class Google_Service_AndroidManagement_SoftwareInfo extends Google_Model
{
  public $androidBuildNumber;
  public $androidBuildTime;
  public $androidVersion;
  public $bootloaderVersion;
  public $deviceKernelVersion;
  public $securityPatchLevel;

  public function setAndroidBuildNumber($androidBuildNumber)
  {
    $this->androidBuildNumber = $androidBuildNumber;
  }
  public function getAndroidBuildNumber()
  {
    return $this->androidBuildNumber;
  }
  public function setAndroidBuildTime($androidBuildTime)
  {
    $this->androidBuildTime = $androidBuildTime;
  }
  public function getAndroidBuildTime()
  {
    return $this->androidBuildTime;
  }
  public function setAndroidVersion($androidVersion)
  {
    $this->androidVersion = $androidVersion;
  }
  public function getAndroidVersion()
  {
    return $this->androidVersion;
  }
  public function setBootloaderVersion($bootloaderVersion)
  {
    $this->bootloaderVersion = $bootloaderVersion;
  }
  public function getBootloaderVersion()
  {
    return $this->bootloaderVersion;
  }
  public function setDeviceKernelVersion($deviceKernelVersion)
  {
    $this->deviceKernelVersion = $deviceKernelVersion;
  }
  public function getDeviceKernelVersion()
  {
    return $this->deviceKernelVersion;
  }
  public function setSecurityPatchLevel($securityPatchLevel)
  {
    $this->securityPatchLevel = $securityPatchLevel;
  }
  public function getSecurityPatchLevel()
  {
    return $this->securityPatchLevel;
  }
}
