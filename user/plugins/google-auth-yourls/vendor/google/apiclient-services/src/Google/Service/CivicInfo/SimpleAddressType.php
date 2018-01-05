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

class Google_Service_CivicInfo_SimpleAddressType extends Google_Model
{
  public $city;
  public $line1;
  public $line2;
  public $line3;
  public $locationName;
  public $state;
  public $zip;

  public function setCity($city)
  {
    $this->city = $city;
  }
  public function getCity()
  {
    return $this->city;
  }
  public function setLine1($line1)
  {
    $this->line1 = $line1;
  }
  public function getLine1()
  {
    return $this->line1;
  }
  public function setLine2($line2)
  {
    $this->line2 = $line2;
  }
  public function getLine2()
  {
    return $this->line2;
  }
  public function setLine3($line3)
  {
    $this->line3 = $line3;
  }
  public function getLine3()
  {
    return $this->line3;
  }
  public function setLocationName($locationName)
  {
    $this->locationName = $locationName;
  }
  public function getLocationName()
  {
    return $this->locationName;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setZip($zip)
  {
    $this->zip = $zip;
  }
  public function getZip()
  {
    return $this->zip;
  }
}
