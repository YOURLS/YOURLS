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

class Google_Service_Directory_CustomerPostalAddress extends Google_Model
{
  public $addressLine1;
  public $addressLine2;
  public $addressLine3;
  public $contactName;
  public $countryCode;
  public $locality;
  public $organizationName;
  public $postalCode;
  public $region;

  public function setAddressLine1($addressLine1)
  {
    $this->addressLine1 = $addressLine1;
  }
  public function getAddressLine1()
  {
    return $this->addressLine1;
  }
  public function setAddressLine2($addressLine2)
  {
    $this->addressLine2 = $addressLine2;
  }
  public function getAddressLine2()
  {
    return $this->addressLine2;
  }
  public function setAddressLine3($addressLine3)
  {
    $this->addressLine3 = $addressLine3;
  }
  public function getAddressLine3()
  {
    return $this->addressLine3;
  }
  public function setContactName($contactName)
  {
    $this->contactName = $contactName;
  }
  public function getContactName()
  {
    return $this->contactName;
  }
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  public function setLocality($locality)
  {
    $this->locality = $locality;
  }
  public function getLocality()
  {
    return $this->locality;
  }
  public function setOrganizationName($organizationName)
  {
    $this->organizationName = $organizationName;
  }
  public function getOrganizationName()
  {
    return $this->organizationName;
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
}
