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

class Google_Service_Reseller_Seats extends Google_Model
{
  public $kind;
  public $licensedNumberOfSeats;
  public $maximumNumberOfSeats;
  public $numberOfSeats;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLicensedNumberOfSeats($licensedNumberOfSeats)
  {
    $this->licensedNumberOfSeats = $licensedNumberOfSeats;
  }
  public function getLicensedNumberOfSeats()
  {
    return $this->licensedNumberOfSeats;
  }
  public function setMaximumNumberOfSeats($maximumNumberOfSeats)
  {
    $this->maximumNumberOfSeats = $maximumNumberOfSeats;
  }
  public function getMaximumNumberOfSeats()
  {
    return $this->maximumNumberOfSeats;
  }
  public function setNumberOfSeats($numberOfSeats)
  {
    $this->numberOfSeats = $numberOfSeats;
  }
  public function getNumberOfSeats()
  {
    return $this->numberOfSeats;
  }
}
