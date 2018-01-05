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

class Google_Service_Dfareporting_Campaign extends Google_Collection
{
  protected $collection_key = 'traffickerEmails';
  public $accountId;
  protected $adBlockingConfigurationType = 'Google_Service_Dfareporting_AdBlockingConfiguration';
  protected $adBlockingConfigurationDataType = '';
  protected $additionalCreativeOptimizationConfigurationsType = 'Google_Service_Dfareporting_CreativeOptimizationConfiguration';
  protected $additionalCreativeOptimizationConfigurationsDataType = 'array';
  public $advertiserGroupId;
  public $advertiserId;
  protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $advertiserIdDimensionValueDataType = '';
  public $archived;
  protected $audienceSegmentGroupsType = 'Google_Service_Dfareporting_AudienceSegmentGroup';
  protected $audienceSegmentGroupsDataType = 'array';
  public $billingInvoiceCode;
  protected $clickThroughUrlSuffixPropertiesType = 'Google_Service_Dfareporting_ClickThroughUrlSuffixProperties';
  protected $clickThroughUrlSuffixPropertiesDataType = '';
  public $comment;
  protected $createInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
  protected $createInfoDataType = '';
  public $creativeGroupIds;
  protected $creativeOptimizationConfigurationType = 'Google_Service_Dfareporting_CreativeOptimizationConfiguration';
  protected $creativeOptimizationConfigurationDataType = '';
  protected $defaultClickThroughEventTagPropertiesType = 'Google_Service_Dfareporting_DefaultClickThroughEventTagProperties';
  protected $defaultClickThroughEventTagPropertiesDataType = '';
  public $defaultLandingPageId;
  public $endDate;
  protected $eventTagOverridesType = 'Google_Service_Dfareporting_EventTagOverride';
  protected $eventTagOverridesDataType = 'array';
  public $externalId;
  public $id;
  protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $idDimensionValueDataType = '';
  public $kind;
  protected $lastModifiedInfoType = 'Google_Service_Dfareporting_LastModifiedInfo';
  protected $lastModifiedInfoDataType = '';
  protected $lookbackConfigurationType = 'Google_Service_Dfareporting_LookbackConfiguration';
  protected $lookbackConfigurationDataType = '';
  public $name;
  public $nielsenOcrEnabled;
  public $startDate;
  public $subaccountId;
  public $traffickerEmails;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param Google_Service_Dfareporting_AdBlockingConfiguration
   */
  public function setAdBlockingConfiguration(Google_Service_Dfareporting_AdBlockingConfiguration $adBlockingConfiguration)
  {
    $this->adBlockingConfiguration = $adBlockingConfiguration;
  }
  /**
   * @return Google_Service_Dfareporting_AdBlockingConfiguration
   */
  public function getAdBlockingConfiguration()
  {
    return $this->adBlockingConfiguration;
  }
  /**
   * @param Google_Service_Dfareporting_CreativeOptimizationConfiguration
   */
  public function setAdditionalCreativeOptimizationConfigurations($additionalCreativeOptimizationConfigurations)
  {
    $this->additionalCreativeOptimizationConfigurations = $additionalCreativeOptimizationConfigurations;
  }
  /**
   * @return Google_Service_Dfareporting_CreativeOptimizationConfiguration
   */
  public function getAdditionalCreativeOptimizationConfigurations()
  {
    return $this->additionalCreativeOptimizationConfigurations;
  }
  public function setAdvertiserGroupId($advertiserGroupId)
  {
    $this->advertiserGroupId = $advertiserGroupId;
  }
  public function getAdvertiserGroupId()
  {
    return $this->advertiserGroupId;
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
  /**
   * @param Google_Service_Dfareporting_AudienceSegmentGroup
   */
  public function setAudienceSegmentGroups($audienceSegmentGroups)
  {
    $this->audienceSegmentGroups = $audienceSegmentGroups;
  }
  /**
   * @return Google_Service_Dfareporting_AudienceSegmentGroup
   */
  public function getAudienceSegmentGroups()
  {
    return $this->audienceSegmentGroups;
  }
  public function setBillingInvoiceCode($billingInvoiceCode)
  {
    $this->billingInvoiceCode = $billingInvoiceCode;
  }
  public function getBillingInvoiceCode()
  {
    return $this->billingInvoiceCode;
  }
  /**
   * @param Google_Service_Dfareporting_ClickThroughUrlSuffixProperties
   */
  public function setClickThroughUrlSuffixProperties(Google_Service_Dfareporting_ClickThroughUrlSuffixProperties $clickThroughUrlSuffixProperties)
  {
    $this->clickThroughUrlSuffixProperties = $clickThroughUrlSuffixProperties;
  }
  /**
   * @return Google_Service_Dfareporting_ClickThroughUrlSuffixProperties
   */
  public function getClickThroughUrlSuffixProperties()
  {
    return $this->clickThroughUrlSuffixProperties;
  }
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  public function getComment()
  {
    return $this->comment;
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
  public function setCreativeGroupIds($creativeGroupIds)
  {
    $this->creativeGroupIds = $creativeGroupIds;
  }
  public function getCreativeGroupIds()
  {
    return $this->creativeGroupIds;
  }
  /**
   * @param Google_Service_Dfareporting_CreativeOptimizationConfiguration
   */
  public function setCreativeOptimizationConfiguration(Google_Service_Dfareporting_CreativeOptimizationConfiguration $creativeOptimizationConfiguration)
  {
    $this->creativeOptimizationConfiguration = $creativeOptimizationConfiguration;
  }
  /**
   * @return Google_Service_Dfareporting_CreativeOptimizationConfiguration
   */
  public function getCreativeOptimizationConfiguration()
  {
    return $this->creativeOptimizationConfiguration;
  }
  /**
   * @param Google_Service_Dfareporting_DefaultClickThroughEventTagProperties
   */
  public function setDefaultClickThroughEventTagProperties(Google_Service_Dfareporting_DefaultClickThroughEventTagProperties $defaultClickThroughEventTagProperties)
  {
    $this->defaultClickThroughEventTagProperties = $defaultClickThroughEventTagProperties;
  }
  /**
   * @return Google_Service_Dfareporting_DefaultClickThroughEventTagProperties
   */
  public function getDefaultClickThroughEventTagProperties()
  {
    return $this->defaultClickThroughEventTagProperties;
  }
  public function setDefaultLandingPageId($defaultLandingPageId)
  {
    $this->defaultLandingPageId = $defaultLandingPageId;
  }
  public function getDefaultLandingPageId()
  {
    return $this->defaultLandingPageId;
  }
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param Google_Service_Dfareporting_EventTagOverride
   */
  public function setEventTagOverrides($eventTagOverrides)
  {
    $this->eventTagOverrides = $eventTagOverrides;
  }
  /**
   * @return Google_Service_Dfareporting_EventTagOverride
   */
  public function getEventTagOverrides()
  {
    return $this->eventTagOverrides;
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
  public function setNielsenOcrEnabled($nielsenOcrEnabled)
  {
    $this->nielsenOcrEnabled = $nielsenOcrEnabled;
  }
  public function getNielsenOcrEnabled()
  {
    return $this->nielsenOcrEnabled;
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
  public function setTraffickerEmails($traffickerEmails)
  {
    $this->traffickerEmails = $traffickerEmails;
  }
  public function getTraffickerEmails()
  {
    return $this->traffickerEmails;
  }
}
