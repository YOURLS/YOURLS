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

class Google_Service_AndroidManagement_StatusReportingSettings extends Google_Model
{
  public $displayInfoEnabled;
  public $hardwareStatusEnabled;
  public $memoryInfoEnabled;
  public $networkInfoEnabled;
  public $powerManagementEventsEnabled;
  public $softwareInfoEnabled;

  public function setDisplayInfoEnabled($displayInfoEnabled)
  {
    $this->displayInfoEnabled = $displayInfoEnabled;
  }
  public function getDisplayInfoEnabled()
  {
    return $this->displayInfoEnabled;
  }
  public function setHardwareStatusEnabled($hardwareStatusEnabled)
  {
    $this->hardwareStatusEnabled = $hardwareStatusEnabled;
  }
  public function getHardwareStatusEnabled()
  {
    return $this->hardwareStatusEnabled;
  }
  public function setMemoryInfoEnabled($memoryInfoEnabled)
  {
    $this->memoryInfoEnabled = $memoryInfoEnabled;
  }
  public function getMemoryInfoEnabled()
  {
    return $this->memoryInfoEnabled;
  }
  public function setNetworkInfoEnabled($networkInfoEnabled)
  {
    $this->networkInfoEnabled = $networkInfoEnabled;
  }
  public function getNetworkInfoEnabled()
  {
    return $this->networkInfoEnabled;
  }
  public function setPowerManagementEventsEnabled($powerManagementEventsEnabled)
  {
    $this->powerManagementEventsEnabled = $powerManagementEventsEnabled;
  }
  public function getPowerManagementEventsEnabled()
  {
    return $this->powerManagementEventsEnabled;
  }
  public function setSoftwareInfoEnabled($softwareInfoEnabled)
  {
    $this->softwareInfoEnabled = $softwareInfoEnabled;
  }
  public function getSoftwareInfoEnabled()
  {
    return $this->softwareInfoEnabled;
  }
}
