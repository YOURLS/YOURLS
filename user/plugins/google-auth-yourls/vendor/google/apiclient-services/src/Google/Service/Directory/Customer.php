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

class Google_Service_Directory_Customer extends Google_Model
{
  public $alternateEmail;
  public $customerCreationTime;
  public $customerDomain;
  public $etag;
  public $id;
  public $kind;
  public $language;
  public $phoneNumber;
  protected $postalAddressType = 'Google_Service_Directory_CustomerPostalAddress';
  protected $postalAddressDataType = '';

  public function setAlternateEmail($alternateEmail)
  {
    $this->alternateEmail = $alternateEmail;
  }
  public function getAlternateEmail()
  {
    return $this->alternateEmail;
  }
  public function setCustomerCreationTime($customerCreationTime)
  {
    $this->customerCreationTime = $customerCreationTime;
  }
  public function getCustomerCreationTime()
  {
    return $this->customerCreationTime;
  }
  public function setCustomerDomain($customerDomain)
  {
    $this->customerDomain = $customerDomain;
  }
  public function getCustomerDomain()
  {
    return $this->customerDomain;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
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
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  public function getLanguage()
  {
    return $this->language;
  }
  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  /**
   * @param Google_Service_Directory_CustomerPostalAddress
   */
  public function setPostalAddress(Google_Service_Directory_CustomerPostalAddress $postalAddress)
  {
    $this->postalAddress = $postalAddress;
  }
  /**
   * @return Google_Service_Directory_CustomerPostalAddress
   */
  public function getPostalAddress()
  {
    return $this->postalAddress;
  }
}
