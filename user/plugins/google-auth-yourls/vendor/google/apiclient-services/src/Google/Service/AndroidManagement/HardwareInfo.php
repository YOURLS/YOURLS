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

class Google_Service_AndroidManagement_HardwareInfo extends Google_Collection
{
  protected $collection_key = 'skinThrottlingTemperatures';
  public $batteryShutdownTemperatures;
  public $batteryThrottlingTemperatures;
  public $brand;
  public $cpuShutdownTemperatures;
  public $cpuThrottlingTemperatures;
  public $deviceBasebandVersion;
  public $gpuShutdownTemperatures;
  public $gpuThrottlingTemperatures;
  public $hardware;
  public $manufacturer;
  public $model;
  public $serialNumber;
  public $skinShutdownTemperatures;
  public $skinThrottlingTemperatures;

  public function setBatteryShutdownTemperatures($batteryShutdownTemperatures)
  {
    $this->batteryShutdownTemperatures = $batteryShutdownTemperatures;
  }
  public function getBatteryShutdownTemperatures()
  {
    return $this->batteryShutdownTemperatures;
  }
  public function setBatteryThrottlingTemperatures($batteryThrottlingTemperatures)
  {
    $this->batteryThrottlingTemperatures = $batteryThrottlingTemperatures;
  }
  public function getBatteryThrottlingTemperatures()
  {
    return $this->batteryThrottlingTemperatures;
  }
  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  public function getBrand()
  {
    return $this->brand;
  }
  public function setCpuShutdownTemperatures($cpuShutdownTemperatures)
  {
    $this->cpuShutdownTemperatures = $cpuShutdownTemperatures;
  }
  public function getCpuShutdownTemperatures()
  {
    return $this->cpuShutdownTemperatures;
  }
  public function setCpuThrottlingTemperatures($cpuThrottlingTemperatures)
  {
    $this->cpuThrottlingTemperatures = $cpuThrottlingTemperatures;
  }
  public function getCpuThrottlingTemperatures()
  {
    return $this->cpuThrottlingTemperatures;
  }
  public function setDeviceBasebandVersion($deviceBasebandVersion)
  {
    $this->deviceBasebandVersion = $deviceBasebandVersion;
  }
  public function getDeviceBasebandVersion()
  {
    return $this->deviceBasebandVersion;
  }
  public function setGpuShutdownTemperatures($gpuShutdownTemperatures)
  {
    $this->gpuShutdownTemperatures = $gpuShutdownTemperatures;
  }
  public function getGpuShutdownTemperatures()
  {
    return $this->gpuShutdownTemperatures;
  }
  public function setGpuThrottlingTemperatures($gpuThrottlingTemperatures)
  {
    $this->gpuThrottlingTemperatures = $gpuThrottlingTemperatures;
  }
  public function getGpuThrottlingTemperatures()
  {
    return $this->gpuThrottlingTemperatures;
  }
  public function setHardware($hardware)
  {
    $this->hardware = $hardware;
  }
  public function getHardware()
  {
    return $this->hardware;
  }
  public function setManufacturer($manufacturer)
  {
    $this->manufacturer = $manufacturer;
  }
  public function getManufacturer()
  {
    return $this->manufacturer;
  }
  public function setModel($model)
  {
    $this->model = $model;
  }
  public function getModel()
  {
    return $this->model;
  }
  public function setSerialNumber($serialNumber)
  {
    $this->serialNumber = $serialNumber;
  }
  public function getSerialNumber()
  {
    return $this->serialNumber;
  }
  public function setSkinShutdownTemperatures($skinShutdownTemperatures)
  {
    $this->skinShutdownTemperatures = $skinShutdownTemperatures;
  }
  public function getSkinShutdownTemperatures()
  {
    return $this->skinShutdownTemperatures;
  }
  public function setSkinThrottlingTemperatures($skinThrottlingTemperatures)
  {
    $this->skinThrottlingTemperatures = $skinThrottlingTemperatures;
  }
  public function getSkinThrottlingTemperatures()
  {
    return $this->skinThrottlingTemperatures;
  }
}
