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

class Google_Service_AndroidPublisher_DeviceMetadata extends Google_Model
{
  public $cpuMake;
  public $cpuModel;
  public $deviceClass;
  public $glEsVersion;
  public $manufacturer;
  public $nativePlatform;
  public $productName;
  public $ramMb;
  public $screenDensityDpi;
  public $screenHeightPx;
  public $screenWidthPx;

  public function setCpuMake($cpuMake)
  {
    $this->cpuMake = $cpuMake;
  }
  public function getCpuMake()
  {
    return $this->cpuMake;
  }
  public function setCpuModel($cpuModel)
  {
    $this->cpuModel = $cpuModel;
  }
  public function getCpuModel()
  {
    return $this->cpuModel;
  }
  public function setDeviceClass($deviceClass)
  {
    $this->deviceClass = $deviceClass;
  }
  public function getDeviceClass()
  {
    return $this->deviceClass;
  }
  public function setGlEsVersion($glEsVersion)
  {
    $this->glEsVersion = $glEsVersion;
  }
  public function getGlEsVersion()
  {
    return $this->glEsVersion;
  }
  public function setManufacturer($manufacturer)
  {
    $this->manufacturer = $manufacturer;
  }
  public function getManufacturer()
  {
    return $this->manufacturer;
  }
  public function setNativePlatform($nativePlatform)
  {
    $this->nativePlatform = $nativePlatform;
  }
  public function getNativePlatform()
  {
    return $this->nativePlatform;
  }
  public function setProductName($productName)
  {
    $this->productName = $productName;
  }
  public function getProductName()
  {
    return $this->productName;
  }
  public function setRamMb($ramMb)
  {
    $this->ramMb = $ramMb;
  }
  public function getRamMb()
  {
    return $this->ramMb;
  }
  public function setScreenDensityDpi($screenDensityDpi)
  {
    $this->screenDensityDpi = $screenDensityDpi;
  }
  public function getScreenDensityDpi()
  {
    return $this->screenDensityDpi;
  }
  public function setScreenHeightPx($screenHeightPx)
  {
    $this->screenHeightPx = $screenHeightPx;
  }
  public function getScreenHeightPx()
  {
    return $this->screenHeightPx;
  }
  public function setScreenWidthPx($screenWidthPx)
  {
    $this->screenWidthPx = $screenWidthPx;
  }
  public function getScreenWidthPx()
  {
    return $this->screenWidthPx;
  }
}
