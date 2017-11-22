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

class Google_Service_Dfareporting_Project extends Google_Model
{
  public $accountId;
  public $advertiserId;
  public $audienceAgeGroup;
  public $audienceGender;
  public $budget;
  public $clientBillingCode;
  public $clientName;
  public $endDate;
  public $id;
  public $kind;
  protected $lastModifiedInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
  protected $lastModifiedInfoDataType = '';
  public $name;
  public $overview;
  public $startDate;
  public $subaccountId;
  public $targetClicks;
  public $targetConversions;
  public $targetCpaNanos;
  public $targetCpcNanos;
  public $targetCpmActiveViewNanos;
  public $targetCpmNanos;
  public $targetImpressions;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  public function setAudienceAgeGroup($audienceAgeGroup)
  {
    $this->audienceAgeGroup = $audienceAgeGroup;
  }
  public function getAudienceAgeGroup()
  {
    return $this->audienceAgeGroup;
  }
  public function setAudienceGender($audienceGender)
  {
    $this->audienceGender = $audienceGender;
  }
  public function getAudienceGender()
  {
    return $this->audienceGender;
  }
  public function setBudget($budget)
  {
    $this->budget = $budget;
  }
  public function getBudget()
  {
    return $this->budget;
  }
  public function setClientBillingCode($clientBillingCode)
  {
    $this->clientBillingCode = $clientBillingCode;
  }
  public function getClientBillingCode()
  {
    return $this->clientBillingCode;
  }
  public function setClientName($clientName)
  {
    $this->clientName = $clientName;
  }
  public function getClientName()
  {
    return $this->clientName;
  }
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  public function getEndDate()
  {
    return $this->endDate;
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
  /**
   * @param Google_Service_Dfareporting_LastModifiedInfo
   */
  public function setLastModifiedInfo(Google_Service_Dfareporting_LastModifiedInfo $lastModifiedInfo)
  {
    $this->lastModifiedInfo = $lastModifiedInfo;
  }
  /**
   * @return Google_Service_Dfareporting_LastModifiedInfo
   */
  public function getLastModifiedInfo()
  {
    return $this->lastModifiedInfo;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOverview($overview)
  {
    $this->overview = $overview;
  }
  public function getOverview()
  {
    return $this->overview;
  }
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  public function getStartDate()
  {
    return $this->startDate;
  }
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  public function setTargetClicks($targetClicks)
  {
    $this->targetClicks = $targetClicks;
  }
  public function getTargetClicks()
  {
    return $this->targetClicks;
  }
  public function setTargetConversions($targetConversions)
  {
    $this->targetConversions = $targetConversions;
  }
  public function getTargetConversions()
  {
    return $this->targetConversions;
  }
  public function setTargetCpaNanos($targetCpaNanos)
  {
    $this->targetCpaNanos = $targetCpaNanos;
  }
  public function getTargetCpaNanos()
  {
    return $this->targetCpaNanos;
  }
  public function setTargetCpcNanos($targetCpcNanos)
  {
    $this->targetCpcNanos = $targetCpcNanos;
  }
  public function getTargetCpcNanos()
  {
    return $this->targetCpcNanos;
  }
  public function setTargetCpmActiveViewNanos($targetCpmActiveViewNanos)
  {
    $this->targetCpmActiveViewNanos = $targetCpmActiveViewNanos;
  }
  public function getTargetCpmActiveViewNanos()
  {
    return $this->targetCpmActiveViewNanos;
  }
  public function setTargetCpmNanos($targetCpmNanos)
  {
    $this->targetCpmNanos = $targetCpmNanos;
  }
  public function getTargetCpmNanos()
  {
    return $this->targetCpmNanos;
  }
  public function setTargetImpressions($targetImpressions)
  {
    $this->targetImpressions = $targetImpressions;
  }
  public function getTargetImpressions()
  {
    return $this->targetImpressions;
  }
}
