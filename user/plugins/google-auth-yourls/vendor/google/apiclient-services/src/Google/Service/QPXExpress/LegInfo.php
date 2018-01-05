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

class Google_Service_QPXExpress_LegInfo extends Google_Model
{
  public $aircraft;
  public $arrivalTime;
  public $changePlane;
  public $connectionDuration;
  public $departureTime;
  public $destination;
  public $destinationTerminal;
  public $duration;
  public $id;
  public $kind;
  public $meal;
  public $mileage;
  public $onTimePerformance;
  public $operatingDisclosure;
  public $origin;
  public $originTerminal;
  public $secure;

  public function setAircraft($aircraft)
  {
    $this->aircraft = $aircraft;
  }
  public function getAircraft()
  {
    return $this->aircraft;
  }
  public function setArrivalTime($arrivalTime)
  {
    $this->arrivalTime = $arrivalTime;
  }
  public function getArrivalTime()
  {
    return $this->arrivalTime;
  }
  public function setChangePlane($changePlane)
  {
    $this->changePlane = $changePlane;
  }
  public function getChangePlane()
  {
    return $this->changePlane;
  }
  public function setConnectionDuration($connectionDuration)
  {
    $this->connectionDuration = $connectionDuration;
  }
  public function getConnectionDuration()
  {
    return $this->connectionDuration;
  }
  public function setDepartureTime($departureTime)
  {
    $this->departureTime = $departureTime;
  }
  public function getDepartureTime()
  {
    return $this->departureTime;
  }
  public function setDestination($destination)
  {
    $this->destination = $destination;
  }
  public function getDestination()
  {
    return $this->destination;
  }
  public function setDestinationTerminal($destinationTerminal)
  {
    $this->destinationTerminal = $destinationTerminal;
  }
  public function getDestinationTerminal()
  {
    return $this->destinationTerminal;
  }
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  public function getDuration()
  {
    return $this->duration;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMeal($meal)
  {
    $this->meal = $meal;
  }
  public function getMeal()
  {
    return $this->meal;
  }
  public function setMileage($mileage)
  {
    $this->mileage = $mileage;
  }
  public function getMileage()
  {
    return $this->mileage;
  }
  public function setOnTimePerformance($onTimePerformance)
  {
    $this->onTimePerformance = $onTimePerformance;
  }
  public function getOnTimePerformance()
  {
    return $this->onTimePerformance;
  }
  public function setOperatingDisclosure($operatingDisclosure)
  {
    $this->operatingDisclosure = $operatingDisclosure;
  }
  public function getOperatingDisclosure()
  {
    return $this->operatingDisclosure;
  }
  public function setOrigin($origin)
  {
    $this->origin = $origin;
  }
  public function getOrigin()
  {
    return $this->origin;
  }
  public function setOriginTerminal($originTerminal)
  {
    $this->originTerminal = $originTerminal;
  }
  public function getOriginTerminal()
  {
    return $this->originTerminal;
  }
  public function setSecure($secure)
  {
    $this->secure = $secure;
  }
  public function getSecure()
  {
    return $this->secure;
  }
}
