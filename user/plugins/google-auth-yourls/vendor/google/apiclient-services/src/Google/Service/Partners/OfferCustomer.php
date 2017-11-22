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

class Google_Service_Partners_OfferCustomer extends Google_Model
{
  public $adwordsUrl;
  public $countryCode;
  public $creationTime;
  public $eligibilityDaysLeft;
  public $externalCid;
  public $getYAmount;
  public $name;
  public $offerType;
  public $spendXAmount;

  public function setAdwordsUrl($adwordsUrl)
  {
    $this->adwordsUrl = $adwordsUrl;
  }
  public function getAdwordsUrl()
  {
    return $this->adwordsUrl;
  }
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setEligibilityDaysLeft($eligibilityDaysLeft)
  {
    $this->eligibilityDaysLeft = $eligibilityDaysLeft;
  }
  public function getEligibilityDaysLeft()
  {
    return $this->eligibilityDaysLeft;
  }
  public function setExternalCid($externalCid)
  {
    $this->externalCid = $externalCid;
  }
  public function getExternalCid()
  {
    return $this->externalCid;
  }
  public function setGetYAmount($getYAmount)
  {
    $this->getYAmount = $getYAmount;
  }
  public function getGetYAmount()
  {
    return $this->getYAmount;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOfferType($offerType)
  {
    $this->offerType = $offerType;
  }
  public function getOfferType()
  {
    return $this->offerType;
  }
  public function setSpendXAmount($spendXAmount)
  {
    $this->spendXAmount = $spendXAmount;
  }
  public function getSpendXAmount()
  {
    return $this->spendXAmount;
  }
}
