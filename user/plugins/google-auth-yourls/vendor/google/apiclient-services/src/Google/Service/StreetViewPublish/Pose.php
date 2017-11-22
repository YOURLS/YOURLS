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

class Google_Service_StreetViewPublish_Pose extends Google_Model
{
  public $altitude;
  public $heading;
  protected $latLngPairType = 'Google_Service_StreetViewPublish_LatLng';
  protected $latLngPairDataType = '';
  protected $levelType = 'Google_Service_StreetViewPublish_Level';
  protected $levelDataType = '';
  public $pitch;
  public $roll;

  public function setAltitude($altitude)
  {
    $this->altitude = $altitude;
  }
  public function getAltitude()
  {
    return $this->altitude;
  }
  public function setHeading($heading)
  {
    $this->heading = $heading;
  }
  public function getHeading()
  {
    return $this->heading;
  }
  /**
   * @param Google_Service_StreetViewPublish_LatLng
   */
  public function setLatLngPair(Google_Service_StreetViewPublish_LatLng $latLngPair)
  {
    $this->latLngPair = $latLngPair;
  }
  /**
   * @return Google_Service_StreetViewPublish_LatLng
   */
  public function getLatLngPair()
  {
    return $this->latLngPair;
  }
  /**
   * @param Google_Service_StreetViewPublish_Level
   */
  public function setLevel(Google_Service_StreetViewPublish_Level $level)
  {
    $this->level = $level;
  }
  /**
   * @return Google_Service_StreetViewPublish_Level
   */
  public function getLevel()
  {
    return $this->level;
  }
  public function setPitch($pitch)
  {
    $this->pitch = $pitch;
  }
  public function getPitch()
  {
    return $this->pitch;
  }
  public function setRoll($roll)
  {
    $this->roll = $roll;
  }
  public function getRoll()
  {
    return $this->roll;
  }
}
