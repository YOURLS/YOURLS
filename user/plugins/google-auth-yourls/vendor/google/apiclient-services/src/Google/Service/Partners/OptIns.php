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

class Google_Service_Partners_OptIns extends Google_Model
{
  public $marketComm;
  public $performanceSuggestions;
  public $phoneContact;
  public $physicalMail;
  public $specialOffers;

  public function setMarketComm($marketComm)
  {
    $this->marketComm = $marketComm;
  }
  public function getMarketComm()
  {
    return $this->marketComm;
  }
  public function setPerformanceSuggestions($performanceSuggestions)
  {
    $this->performanceSuggestions = $performanceSuggestions;
  }
  public function getPerformanceSuggestions()
  {
    return $this->performanceSuggestions;
  }
  public function setPhoneContact($phoneContact)
  {
    $this->phoneContact = $phoneContact;
  }
  public function getPhoneContact()
  {
    return $this->phoneContact;
  }
  public function setPhysicalMail($physicalMail)
  {
    $this->physicalMail = $physicalMail;
  }
  public function getPhysicalMail()
  {
    return $this->physicalMail;
  }
  public function setSpecialOffers($specialOffers)
  {
    $this->specialOffers = $specialOffers;
  }
  public function getSpecialOffers()
  {
    return $this->specialOffers;
  }
}
