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

class Google_Service_Dfareporting_Placement extends Google_Collection
{
  protected $collection_key = 'tagFormats';
  public $accountId;
  public $adBlockingOptOut;
  public $advertiserId;
  protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $advertiserIdDimensionValueDataType = '';
  public $archived;
  public $campaignId;
  protected $campaignIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $campaignIdDimensionValueDataType = '';
  public $comment;
  public $compatibility;
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
  public $keyName;
  public $kind;
  protected $lastModifiedInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
  protected $lastModifiedInfoDataType = '';
  protected $lookbackConfigurationType = 'Google_Service_Dfareporting_LookbackConfiguration';
  protected $lookbackConfigurationDataType = '';
  public $name;
  public $paymentApproved;
  public $paymentSource;
  public $placementGroupId;
  protected $placementGroupIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $placementGroupIdDimensionValueDataType = '';
  public $placementStrategyId;
  protected $pricingScheduleType = 'Google_Service_Dfareporting_PricingSchedule';
  protected $pricingScheduleDataType = '';
  public $primary;
  protected $publisherUpdateInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
  protected $publisherUpdateInfoDataType = '';
  public $siteId;
  protected $siteIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $siteIdDimensionValueDataType = '';
  protected $sizeType = 'Google_Service_Dfareporting_Size';
  protected $sizeDataType = '';
  public $sslRequired;
  public $status;
  public $subaccountId;
  public $tagFormats;
  protected $tagSettingType = 'Google_Service_Dfareporting_TagSetting';
  protected $tagSettingDataType = '';
  public $videoActiveViewOptOut;
  protected $videoSettingsType = 'Google_Service_Dfareporting_VideoSettings';
  protected $videoSettingsDataType = '';
  public $vpaidAdapterChoice;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setAdBlockingOptOut($adBlockingOptOut)
  {
    $this->adBlockingOptOut = $adBlockingOptOut;
  }
  public function getAdBlockingOptOut()
  {
    return $this->adBlockingOptOut;
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
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  public function getComment()
  {
    return $this->comment;
  }
  public function setCompatibility($compatibility)
  {
    $this->compatibility = $compatibility;
  }
  public function getCompatibility()
  {
    return $this->compatibility;
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
  public function setKeyName($keyName)
  {
    $this->keyName = $keyName;
  }
  public function getKeyName()
  {
    return $this->keyName;
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
  /**
   * @param Google_Service_Dfareporting_LookbackConfiguration
   */
  public function setLookbackConfiguration(Google_Service_Dfareporting_LookbackConfiguration $lookbackConfiguration)
  {
    $this->lookbackConfiguration = $lookbackConfiguration;
  }
  /**
   * @return Google_Service_Dfareporting_LookbackConfiguration
   */
  public function getLookbackConfiguration()
  {
    return $this->lookbackConfiguration;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPaymentApproved($paymentApproved)
  {
    $this->paymentApproved = $paymentApproved;
  }
  public function getPaymentApproved()
  {
    return $this->paymentApproved;
  }
  public function setPaymentSource($paymentSource)
  {
    $this->paymentSource = $paymentSource;
  }
  public function getPaymentSource()
  {
    return $this->paymentSource;
  }
  public function setPlacementGroupId($placementGroupId)
  {
    $this->placementGroupId = $placementGroupId;
  }
  public function getPlacementGroupId()
  {
    return $this->placementGroupId;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setPlacementGroupIdDimensionValue(Google_Service_Dfareporting_DimensionValue $placementGroupIdDimensionValue)
  {
    $this->placementGroupIdDimensionValue = $placementGroupIdDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getPlacementGroupIdDimensionValue()
  {
    return $this->placementGroupIdDimensionValue;
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
  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }
  public function getPrimary()
  {
    return $this->primary;
  }
  /**
   * @param Google_Service_Dfareporting_LastModifiedInfo
   */
  public function setPublisherUpdateInfo(Google_Service_Dfareporting_LastModifiedInfo $publisherUpdateInfo)
  {
    $this->publisherUpdateInfo = $publisherUpdateInfo;
  }
  /**
   * @return Google_Service_Dfareporting_LastModifiedInfo
   */
  public function getPublisherUpdateInfo()
  {
    return $this->publisherUpdateInfo;
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
  /**
   * @param Google_Service_Dfareporting_Size
   */
  public function setSize(Google_Service_Dfareporting_Size $size)
  {
    $this->size = $size;
  }
  /**
   * @return Google_Service_Dfareporting_Size
   */
  public function getSize()
  {
    return $this->size;
  }
  public function setSslRequired($sslRequired)
  {
    $this->sslRequired = $sslRequired;
  }
  public function getSslRequired()
  {
    return $this->sslRequired;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  public function setTagFormats($tagFormats)
  {
    $this->tagFormats = $tagFormats;
  }
  public function getTagFormats()
  {
    return $this->tagFormats;
  }
  /**
   * @param Google_Service_Dfareporting_TagSetting
   */
  public function setTagSetting(Google_Service_Dfareporting_TagSetting $tagSetting)
  {
    $this->tagSetting = $tagSetting;
  }
  /**
   * @return Google_Service_Dfareporting_TagSetting
   */
  public function getTagSetting()
  {
    return $this->tagSetting;
  }
  public function setVideoActiveViewOptOut($videoActiveViewOptOut)
  {
    $this->videoActiveViewOptOut = $videoActiveViewOptOut;
  }
  public function getVideoActiveViewOptOut()
  {
    return $this->videoActiveViewOptOut;
  }
  /**
   * @param Google_Service_Dfareporting_VideoSettings
   */
  public function setVideoSettings(Google_Service_Dfareporting_VideoSettings $videoSettings)
  {
    $this->videoSettings = $videoSettings;
  }
  /**
   * @return Google_Service_Dfareporting_VideoSettings
   */
  public function getVideoSettings()
  {
    return $this->videoSettings;
  }
  public function setVpaidAdapterChoice($vpaidAdapterChoice)
  {
    $this->vpaidAdapterChoice = $vpaidAdapterChoice;
  }
  public function getVpaidAdapterChoice()
  {
    return $this->vpaidAdapterChoice;
  }
}
