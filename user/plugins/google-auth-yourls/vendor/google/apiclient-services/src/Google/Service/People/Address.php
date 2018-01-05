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

class Google_Service_People_Address extends Google_Model
{
  public $city;
  public $country;
  public $countryCode;
  public $extendedAddress;
  public $formattedType;
  public $formattedValue;
  protected $metadataType = 'Google_Service_People_FieldMetadata';
  protected $metadataDataType = '';
  public $poBox;
  public $postalCode;
  public $region;
  public $streetAddress;
  public $type;

  public function setCity($city)
  {
    $this->city = $city;
  }
  public function getCity()
  {
    return $this->city;
  }
  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  public function setExtendedAddress($extendedAddress)
  {
    $this->extendedAddress = $extendedAddress;
  }
  public function getExtendedAddress()
  {
    return $this->extendedAddress;
  }
  public function setFormattedType($formattedType)
  {
    $this->formattedType = $formattedType;
  }
  public function getFormattedType()
  {
    return $this->formattedType;
  }
  public function setFormattedValue($formattedValue)
  {
    $this->formattedValue = $formattedValue;
  }
  public function getFormattedValue()
  {
    return $this->formattedValue;
  }
  public function setMetadata(Google_Service_People_FieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setPoBox($poBox)
  {
    $this->poBox = $poBox;
  }
  public function getPoBox()
  {
    return $this->poBox;
  }
  public function setPostalCode($postalCode)
  {
    $this->postalCode = $postalCode;
  }
  public function getPostalCode()
  {
    return $this->postalCode;
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
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
