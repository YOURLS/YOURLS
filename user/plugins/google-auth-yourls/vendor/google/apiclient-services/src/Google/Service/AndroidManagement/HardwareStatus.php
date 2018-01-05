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

class Google_Service_AndroidManagement_HardwareStatus extends Google_Collection
{
  protected $collection_key = 'skinTemperatures';
  public $batteryTemperatures;
  public $cpuTemperatures;
  public $cpuUsages;
  public $createTime;
  public $fanSpeeds;
  public $gpuTemperatures;
  public $skinTemperatures;

  public function setBatteryTemperatures($batteryTemperatures)
  {
    $this->batteryTemperatures = $batteryTemperatures;
  }
  public function getBatteryTemperatures()
  {
    return $this->batteryTemperatures;
  }
  public function setCpuTemperatures($cpuTemperatures)
  {
    $this->cpuTemperatures = $cpuTemperatures;
  }
  public function getCpuTemperatures()
  {
    return $this->cpuTemperatures;
  }
  public function setCpuUsages($cpuUsages)
  {
    $this->cpuUsages = $cpuUsages;
  }
  public function getCpuUsages()
  {
    return $this->cpuUsages;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setFanSpeeds($fanSpeeds)
  {
    $this->fanSpeeds = $fanSpeeds;
  }
  public function getFanSpeeds()
  {
    return $this->fanSpeeds;
  }
  public function setGpuTemperatures($gpuTemperatures)
  {
    $this->gpuTemperatures = $gpuTemperatures;
  }
  public function getGpuTemperatures()
  {
    return $this->gpuTemperatures;
  }
  public function setSkinTemperatures($skinTemperatures)
  {
    $this->skinTemperatures = $skinTemperatures;
  }
  public function getSkinTemperatures()
  {
    return $this->skinTemperatures;
  }
}
