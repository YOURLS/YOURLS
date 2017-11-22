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

class Google_Service_QPXExpress_SliceInput extends Google_Collection
{
  protected $collection_key = 'prohibitedCarrier';
  public $alliance;
  public $date;
  public $destination;
  public $kind;
  public $maxConnectionDuration;
  public $maxStops;
  public $origin;
  public $permittedCarrier;
  protected $permittedDepartureTimeType = 'Google_Service_QPXExpress_TimeOfDayRange';
  protected $permittedDepartureTimeDataType = '';
  public $preferredCabin;
  public $prohibitedCarrier;

  public function setAlliance($alliance)
  {
    $this->alliance = $alliance;
  }
  public function getAlliance()
  {
    return $this->alliance;
  }
  public function setDate($date)
  {
    $this->date = $date;
  }
  public function getDate()
  {
    return $this->date;
  }
  public function setDestination($destination)
  {
    $this->destination = $destination;
  }
  public function getDestination()
  {
    return $this->destination;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMaxConnectionDuration($maxConnectionDuration)
  {
    $this->maxConnectionDuration = $maxConnectionDuration;
  }
  public function getMaxConnectionDuration()
  {
    return $this->maxConnectionDuration;
  }
  public function setMaxStops($maxStops)
  {
    $this->maxStops = $maxStops;
  }
  public function getMaxStops()
  {
    return $this->maxStops;
  }
  public function setOrigin($origin)
  {
    $this->origin = $origin;
  }
  public function getOrigin()
  {
    return $this->origin;
  }
  public function setPermittedCarrier($permittedCarrier)
  {
    $this->permittedCarrier = $permittedCarrier;
  }
  public function getPermittedCarrier()
  {
    return $this->permittedCarrier;
  }
  /**
   * @param Google_Service_QPXExpress_TimeOfDayRange
   */
  public function setPermittedDepartureTime(Google_Service_QPXExpress_TimeOfDayRange $permittedDepartureTime)
  {
    $this->permittedDepartureTime = $permittedDepartureTime;
  }
  /**
   * @return Google_Service_QPXExpress_TimeOfDayRange
   */
  public function getPermittedDepartureTime()
  {
    return $this->permittedDepartureTime;
  }
  public function setPreferredCabin($preferredCabin)
  {
    $this->preferredCabin = $preferredCabin;
  }
  public function getPreferredCabin()
  {
    return $this->preferredCabin;
  }
  public function setProhibitedCarrier($prohibitedCarrier)
  {
    $this->prohibitedCarrier = $prohibitedCarrier;
  }
  public function getProhibitedCarrier()
  {
    return $this->prohibitedCarrier;
  }
}
