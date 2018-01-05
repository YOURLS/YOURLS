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

class Google_Service_Dfareporting_InventoryItem extends Google_Collection
{
  protected $collection_key = 'adSlots';
  public $accountId;
  protected $adSlotsType = 'Google_Service_Dfareporting_AdSlot';
  protected $adSlotsDataType = 'array';
  public $advertiserId;
  public $contentCategoryId;
  public $estimatedClickThroughRate;
  public $estimatedConversionRate;
  public $id;
  public $inPlan;
  public $kind;
  protected $lastModifiedInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
  protected $lastModifiedInfoDataType = '';
  public $name;
  public $negotiationChannelId;
  public $orderId;
  public $placementStrategyId;
  protected $pricingType = 'Google_Service_Dfareporting_Pricing';
  protected $pricingDataType = '';
  public $projectId;
  public $rfpId;
  public $siteId;
  public $subaccountId;
  public $type;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param Google_Service_Dfareporting_AdSlot
   */
  public function setAdSlots($adSlots)
  {
    $this->adSlots = $adSlots;
  }
  /**
   * @return Google_Service_Dfareporting_AdSlot
   */
  public function getAdSlots()
  {
    return $this->adSlots;
  }
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  public function setContentCategoryId($contentCategoryId)
  {
    $this->contentCategoryId = $contentCategoryId;
  }
  public function getContentCategoryId()
  {
    return $this->contentCategoryId;
  }
  public function setEstimatedClickThroughRate($estimatedClickThroughRate)
  {
    $this->estimatedClickThroughRate = $estimatedClickThroughRate;
  }
  public function getEstimatedClickThroughRate()
  {
    return $this->estimatedClickThroughRate;
  }
  public function setEstimatedConversionRate($estimatedConversionRate)
  {
    $this->estimatedConversionRate = $estimatedConversionRate;
  }
  public function getEstimatedConversionRate()
  {
    return $this->estimatedConversionRate;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInPlan($inPlan)
  {
    $this->inPlan = $inPlan;
  }
  public function getInPlan()
  {
    return $this->inPlan;
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
  public function setNegotiationChannelId($negotiationChannelId)
  {
    $this->negotiationChannelId = $negotiationChannelId;
  }
  public function getNegotiationChannelId()
  {
    return $this->negotiationChannelId;
  }
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }
  public function getOrderId()
  {
    return $this->orderId;
  }
  public function setPlacementStrategyId($placementStrategyId)
  {
    $this->placementStrategyId = $placementStrategyId;
  }
  public function getPlacementStrategyId()
  {
    return $this->placementStrategyId;
  }
  /**
   * @param Google_Service_Dfareporting_Pricing
   */
  public function setPricing(Google_Service_Dfareporting_Pricing $pricing)
  {
    $this->pricing = $pricing;
  }
  /**
   * @return Google_Service_Dfareporting_Pricing
   */
  public function getPricing()
  {
    return $this->pricing;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setRfpId($rfpId)
  {
    $this->rfpId = $rfpId;
  }
  public function getRfpId()
  {
    return $this->rfpId;
  }
  public function setSiteId($siteId)
  {
    $this->siteId = $siteId;
  }
  public function getSiteId()
  {
    return $this->siteId;
  }
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  public function getSubaccountId()
  {
    return $this->subaccountId;
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
