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

class Google_Service_Directory_UserLocation extends Google_Model
{
  public $area;
  public $buildingId;
  public $customType;
  public $deskCode;
  public $floorName;
  public $floorSection;
  public $type;

  public function setArea($area)
  {
    $this->area = $area;
  }
  public function getArea()
  {
    return $this->area;
  }
  public function setBuildingId($buildingId)
  {
    $this->buildingId = $buildingId;
  }
  public function getBuildingId()
  {
    return $this->buildingId;
  }
  public function setCustomType($customType)
  {
    $this->customType = $customType;
  }
  public function getCustomType()
  {
    return $this->customType;
  }
  public function setDeskCode($deskCode)
  {
    $this->deskCode = $deskCode;
  }
  public function getDeskCode()
  {
    return $this->deskCode;
  }
  public function setFloorName($floorName)
  {
    $this->floorName = $floorName;
  }
  public function getFloorName()
  {
    return $this->floorName;
  }
  public function setFloorSection($floorSection)
  {
    $this->floorSection = $floorSection;
  }
  public function getFloorSection()
  {
    return $this->floorSection;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
