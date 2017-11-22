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

class Google_Service_ShoppingContent_OrderAddress extends Google_Collection
{
  protected $collection_key = 'streetAddress';
  public $country;
  public $fullAddress;
  public $isPostOfficeBox;
  public $locality;
  public $postalCode;
  public $recipientName;
  public $region;
  public $streetAddress;

  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function setFullAddress($fullAddress)
  {
    $this->fullAddress = $fullAddress;
  }
  public function getFullAddress()
  {
    return $this->fullAddress;
  }
  public function setIsPostOfficeBox($isPostOfficeBox)
  {
    $this->isPostOfficeBox = $isPostOfficeBox;
  }
  public function getIsPostOfficeBox()
  {
    return $this->isPostOfficeBox;
  }
  public function setLocality($locality)
  {
    $this->locality = $locality;
  }
  public function getLocality()
  {
    return $this->locality;
  }
  public function setPostalCode($postalCode)
  {
    $this->postalCode = $postalCode;
  }
  public function getPostalCode()
  {
    return $this->postalCode;
  }
  public function setRecipientName($recipientName)
  {
    $this->recipientName = $recipientName;
  }
  public function getRecipientName()
  {
    return $this->recipientName;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setStreetAddress($streetAddress)
  {
    $this->streetAddress = $streetAddress;
  }
  public function getStreetAddress()
  {
    return $this->streetAddress;
  }
}
