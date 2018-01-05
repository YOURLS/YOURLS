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

class Google_Service_Dfareporting_PlacementGroup extends Google_Collection
{
  protected $collection_key = 'childPlacementIds';
  public $accountId;
  public $advertiserId;
  protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $advertiserIdDimensionValueDataType = '';
  public $archived;
  public $campaignId;
  protected $campaignIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $campaignIdDimensionValueDataType = '';
  public $childPlacementIds;
  public $comment;
  public $contentCategoryId;
  protected $createInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
  protected $createInfoDataType = '';
  public $directorySiteId;
  protected $directorySiteIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $directorySiteIdDimensionValueDataType = '';
  public $externalId;
  public $id;
  protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $idDimensionValueDataType = '';
  public $kind;
  protected $lastModifiedInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
  protected $lastModifiedInfoDataType = '';
  public $name;
  public $placementGroupType;
  public $placementStrategyId;
  protected $pricingScheduleType = 'Google_Service_Dfareporting_PricingSchedule';
  protected $pricingScheduleDataType = '';
  public $primaryPlacementId;
  protected $primaryPlacementIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $primaryPlacementIdDimensionValueDataType = '';
  public $siteId;
  protected $siteIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $siteIdDimensionValueDataType = '';
  public $subaccountId;

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
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setAdvertiserIdDimensionValue(Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue)
  {
    $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getAdvertiserIdDimensionValue()
  {
    return $this->advertiserIdDimensionValue;
  }
  public function setArchived($archived)
  {
    $this->archived = $archived;
  }
  public function getArchived()
  {
    return $this->archived;
  }
  public function setCampaignId($campaignId)
  {
    $this->campaignId = $campaignId;
  }
  public function getCampaignId()
  {
    return $this->campaignId;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setCampaignIdDimensionValue(Google_Service_Dfareporting_DimensionValue $campaignIdDimensionValue)
  {
    $this->campaignIdDimensionValue = $campaignIdDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getCampaignIdDimensionValue()
  {
    return $this->campaignIdDimensionValue;
  }
  public function setChildPlacementIds($childPlacementIds)
  {
    $this->childPlacementIds = $childPlacementIds;
  }
  public function getChildPlacementIds()
  {
    return $this->childPlacementIds;
  }
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  public function getComment()
  {
    return $this->comment;
  }
  public function setContentCategoryId($contentCategoryId)
  {
    $this->contentCategoryId = $contentCategoryId;
  }
  public function getContentCategoryId()
  {
    return $this->contentCategoryId;
  }
  /**
   * @param Google_Service_Dfareporting_LastModifiedInfo
   */
  public function setCreateInfo(Google_Service_Dfareporting_LastModifiedInfo $createInfo)
  {
    $this->createInfo = $createInfo;
  }
  /**
   * @return Google_Service_Dfareporting_LastModifiedInfo
   */
  public function getCreateInfo()
  {
    return $this->createInfo;
  }
  public function setDirectorySiteId($directorySiteId)
  {
    $this->directorySiteId = $directorySiteId;
  }
  public function getDirectorySiteId()
  {
    return $this->directorySiteId;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setDirectorySiteIdDimensionValue(Google_Service_Dfareporting_DimensionValue $directorySiteIdDimensionValue)
  {
    $this->directorySiteIdDimensionValue = $directorySiteIdDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getDirectorySiteIdDimensionValue()
  {
    return $this->directorySiteIdDimensionValue;
  }
  public function setExternalId($externalId)
  {
    $this->externalId = $externalId;
  }
  public function getExternalId()
  {
    return $this->externalId;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setIdDimensionValue(Google_Service_Dfareporting_DimensionValue $idDimensionValue)
  {
    $this->idDimensionValue = $idDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getIdDimensionValue()
  {
    return $this->idDimensionValue;
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
  public function setPlacementGroupType($placementGroupType)
  {
    $this->placementGroupType = $placementGroupType;
  }
  public function getPlacementGroupType()
  {
    return $this->placementGroupType;
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
   * @param Google_Service_Dfareporting_PricingSchedule
   */
  public function setPricingSchedule(Google_Service_Dfareporting_PricingSchedule $pricingSchedule)
  {
    $this->pricingSchedule = $pricingSchedule;
  }
  /**
   * @return Google_Service_Dfareporting_PricingSchedule
   */
  public function getPricingSchedule()
  {
    return $this->pricingSchedule;
  }
  public function setPrimaryPlacementId($primaryPlacementId)
  {
    $this->primaryPlacementId = $primaryPlacementId;
  }
  public function getPrimaryPlacementId()
  {
    return $this->primaryPlacementId;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setPrimaryPlacementIdDimensionValue(Google_Service_Dfareporting_DimensionValue $primaryPlacementIdDimensionValue)
  {
    $this->primaryPlacementIdDimensionValue = $primaryPlacementIdDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getPrimaryPlacementIdDimensionValue()
  {
    return $this->primaryPlacementIdDimensionValue;
  }
  public function setSiteId($siteId)
  {
    $this->siteId = $siteId;
  }
  public function getSiteId()
  {
    return $this->siteId;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setSiteIdDimensionValue(Google_Service_Dfareporting_DimensionValue $siteIdDimensionValue)
  {
    $this->siteIdDimensionValue = $siteIdDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getSiteIdDimensionValue()
  {
    return $this->siteIdDimensionValue;
  }
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
}
