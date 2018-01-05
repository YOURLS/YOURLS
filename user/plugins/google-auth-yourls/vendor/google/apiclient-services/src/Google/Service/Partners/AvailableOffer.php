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

class Google_Service_Partners_AvailableOffer extends Google_Collection
{
  protected $collection_key = 'qualifiedCustomer';
  public $available;
  protected $countryOfferInfosType = 'Google_Service_Partners_CountryOfferInfo';
  protected $countryOfferInfosDataType = 'array';
  public $description;
  public $id;
  public $maxAccountAge;
  public $name;
  public $offerLevel;
  public $offerType;
  protected $qualifiedCustomerType = 'Google_Service_Partners_OfferCustomer';
  protected $qualifiedCustomerDataType = 'array';
  public $qualifiedCustomersComplete;
  public $showSpecialOfferCopy;
  public $terms;

  public function setAvailable($available)
  {
    $this->available = $available;
  }
  public function getAvailable()
  {
    return $this->available;
  }
  /**
   * @param Google_Service_Partners_CountryOfferInfo
   */
  public function setCountryOfferInfos($countryOfferInfos)
  {
    $this->countryOfferInfos = $countryOfferInfos;
  }
  /**
   * @return Google_Service_Partners_CountryOfferInfo
   */
  public function getCountryOfferInfos()
  {
    return $this->countryOfferInfos;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setMaxAccountAge($maxAccountAge)
  {
    $this->maxAccountAge = $maxAccountAge;
  }
  public function getMaxAccountAge()
  {
    return $this->maxAccountAge;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOfferLevel($offerLevel)
  {
    $this->offerLevel = $offerLevel;
  }
  public function getOfferLevel()
  {
    return $this->offerLevel;
  }
  public function setOfferType($offerType)
  {
    $this->offerType = $offerType;
  }
  public function getOfferType()
  {
    return $this->offerType;
  }
  /**
   * @param Google_Service_Partners_OfferCustomer
   */
  public function setQualifiedCustomer($qualifiedCustomer)
  {
    $this->qualifiedCustomer = $qualifiedCustomer;
  }
  /**
   * @return Google_Service_Partners_OfferCustomer
   */
  public function getQualifiedCustomer()
  {
    return $this->qualifiedCustomer;
  }
  public function setQualifiedCustomersComplete($qualifiedCustomersComplete)
  {
    $this->qualifiedCustomersComplete = $qualifiedCustomersComplete;
  }
  public function getQualifiedCustomersComplete()
  {
    return $this->qualifiedCustomersComplete;
  }
  public function setShowSpecialOfferCopy($showSpecialOfferCopy)
  {
    $this->showSpecialOfferCopy = $showSpecialOfferCopy;
  }
  public function getShowSpecialOfferCopy()
  {
    return $this->showSpecialOfferCopy;
  }
  public function setTerms($terms)
  {
    $this->terms = $terms;
  }
  public function getTerms()
  {
    return $this->terms;
  }
}
