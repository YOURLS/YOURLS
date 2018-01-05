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

class Google_Service_Spectrum_GeoLocationEllipse extends Google_Model
{
  protected $centerType = 'Google_Service_Spectrum_GeoLocationPoint';
  protected $centerDataType = '';
  public $orientation;
  public $semiMajorAxis;
  public $semiMinorAxis;

  /**
   * @param Google_Service_Spectrum_GeoLocationPoint
   */
  public function setCenter(Google_Service_Spectrum_GeoLocationPoint $center)
  {
    $this->center = $center;
  }
  /**
   * @return Google_Service_Spectrum_GeoLocationPoint
   */
  public function getCenter()
  {
    return $this->center;
  }
  public function setOrientation($orientation)
  {
    $this->orientation = $orientation;
  }
  public function getOrientation()
  {
    return $this->orientation;
  }
  public function setSemiMajorAxis($semiMajorAxis)
  {
    $this->semiMajorAxis = $semiMajorAxis;
  }
  public function getSemiMajorAxis()
  {
    return $this->semiMajorAxis;
  }
  public function setSemiMinorAxis($semiMinorAxis)
  {
    $this->semiMinorAxis = $semiMinorAxis;
  }
  public function getSemiMinorAxis()
  {
    return $this->semiMinorAxis;
  }
}
