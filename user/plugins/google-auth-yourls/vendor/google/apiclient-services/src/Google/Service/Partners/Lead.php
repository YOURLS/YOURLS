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

class Google_Service_Partners_Lead extends Google_Collection
{
  protected $collection_key = 'gpsMotivations';
  public $adwordsCustomerId;
  public $comments;
  public $createTime;
  public $email;
  public $familyName;
  public $givenName;
  public $gpsMotivations;
  public $id;
  public $languageCode;
  public $marketingOptIn;
  protected $minMonthlyBudgetType = 'Google_Service_Partners_Money';
  protected $minMonthlyBudgetDataType = '';
  public $phoneNumber;
  public $state;
  public $type;
  public $websiteUrl;

  public function setAdwordsCustomerId($adwordsCustomerId)
  {
    $this->adwordsCustomerId = $adwordsCustomerId;
  }
  public function getAdwordsCustomerId()
  {
    return $this->adwordsCustomerId;
  }
  public function setComments($comments)
  {
    $this->comments = $comments;
  }
  public function getComments()
  {
    return $this->comments;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setFamilyName($familyName)
  {
    $this->familyName = $familyName;
  }
  public function getFamilyName()
  {
    return $this->familyName;
  }
  public function setGivenName($givenName)
  {
    $this->givenName = $givenName;
  }
  public function getGivenName()
  {
    return $this->givenName;
  }
  public function setGpsMotivations($gpsMotivations)
  {
    $this->gpsMotivations = $gpsMotivations;
  }
  public function getGpsMotivations()
  {
    return $this->gpsMotivations;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setMarketingOptIn($marketingOptIn)
  {
    $this->marketingOptIn = $marketingOptIn;
  }
  public function getMarketingOptIn()
  {
    return $this->marketingOptIn;
  }
  /**
   * @param Google_Service_Partners_Money
   */
  public function setMinMonthlyBudget(Google_Service_Partners_Money $minMonthlyBudget)
  {
    $this->minMonthlyBudget = $minMonthlyBudget;
  }
  /**
   * @return Google_Service_Partners_Money
   */
  public function getMinMonthlyBudget()
  {
    return $this->minMonthlyBudget;
  }
  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setWebsiteUrl($websiteUrl)
  {
    $this->websiteUrl = $websiteUrl;
  }
  public function getWebsiteUrl()
  {
    return $this->websiteUrl;
  }
}
