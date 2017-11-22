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

class Google_Service_Drive_DriveFileImageMediaMetadata extends Google_Model
{
  public $aperture;
  public $cameraMake;
  public $cameraModel;
  public $colorSpace;
  public $exposureBias;
  public $exposureMode;
  public $exposureTime;
  public $flashUsed;
  public $focalLength;
  public $height;
  public $isoSpeed;
  public $lens;
  protected $locationType = 'Google_Service_Drive_DriveFileImageMediaMetadataLocation';
  protected $locationDataType = '';
  public $maxApertureValue;
  public $meteringMode;
  public $rotation;
  public $sensor;
  public $subjectDistance;
  public $time;
  public $whiteBalance;
  public $width;

  public function setAperture($aperture)
  {
    $this->aperture = $aperture;
  }
  public function getAperture()
  {
    return $this->aperture;
  }
  public function setCameraMake($cameraMake)
  {
    $this->cameraMake = $cameraMake;
  }
  public function getCameraMake()
  {
    return $this->cameraMake;
  }
  public function setCameraModel($cameraModel)
  {
    $this->cameraModel = $cameraModel;
  }
  public function getCameraModel()
  {
    return $this->cameraModel;
  }
  public function setColorSpace($colorSpace)
  {
    $this->colorSpace = $colorSpace;
  }
  public function getColorSpace()
  {
    return $this->colorSpace;
  }
  public function setExposureBias($exposureBias)
  {
    $this->exposureBias = $exposureBias;
  }
  public function getExposureBias()
  {
    return $this->exposureBias;
  }
  public function setExposureMode($exposureMode)
  {
    $this->exposureMode = $exposureMode;
  }
  public function getExposureMode()
  {
    return $this->exposureMode;
  }
  public function setExposureTime($exposureTime)
  {
    $this->exposureTime = $exposureTime;
  }
  public function getExposureTime()
  {
    return $this->exposureTime;
  }
  public function setFlashUsed($flashUsed)
  {
    $this->flashUsed = $flashUsed;
  }
  public function getFlashUsed()
  {
    return $this->flashUsed;
  }
  public function setFocalLength($focalLength)
  {
    $this->focalLength = $focalLength;
  }
  public function getFocalLength()
  {
    return $this->focalLength;
  }
  public function setHeight($height)
  {
    $this->height = $height;
  }
  public function getHeight()
  {
    return $this->height;
  }
  public function setIsoSpeed($isoSpeed)
  {
    $this->isoSpeed = $isoSpeed;
  }
  public function getIsoSpeed()
  {
    return $this->isoSpeed;
  }
  public function setLens($lens)
  {
    $this->lens = $lens;
  }
  public function getLens()
  {
    return $this->lens;
  }
  /**
   * @param Google_Service_Drive_DriveFileImageMediaMetadataLocation
   */
  public function setLocation(Google_Service_Drive_DriveFileImageMediaMetadataLocation $location)
  {
    $this->location = $location;
  }
  /**
   * @return Google_Service_Drive_DriveFileImageMediaMetadataLocation
   */
  public function getLocation()
  {
    return $this->location;
  }
  public function setMaxApertureValue($maxApertureValue)
  {
    $this->maxApertureValue = $maxApertureValue;
  }
  public function getMaxApertureValue()
  {
    return $this->maxApertureValue;
  }
  public function setMeteringMode($meteringMode)
  {
    $this->meteringMode = $meteringMode;
  }
  public function getMeteringMode()
  {
    return $this->meteringMode;
  }
  public function setRotation($rotation)
  {
    $this->rotation = $rotation;
  }
  public function getRotation()
  {
    return $this->rotation;
  }
  public function setSensor($sensor)
  {
    $this->sensor = $sensor;
  }
  public function getSensor()
  {
    return $this->sensor;
  }
  public function setSubjectDistance($subjectDistance)
  {
    $this->subjectDistance = $subjectDistance;
  }
  public function getSubjectDistance()
  {
    return $this->subjectDistance;
  }
  public function setTime($time)
  {
    $this->time = $time;
  }
  public function getTime()
  {
    return $this->time;
  }
  public function setWhiteBalance($whiteBalance)
  {
    $this->whiteBalance = $whiteBalance;
  }
  public function getWhiteBalance()
  {
    return $this->whiteBalance;
  }
  public function setWidth($width)
  {
    $this->width = $width;
  }
  public function getWidth()
  {
    return $this->width;
  }
}
