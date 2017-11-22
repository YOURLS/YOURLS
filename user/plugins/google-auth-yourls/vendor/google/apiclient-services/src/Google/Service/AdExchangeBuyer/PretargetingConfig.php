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

class Google_Service_AdExchangeBuyer_PretargetingConfig extends Google_Collection
{
  protected $collection_key = 'videoPlayerSizes';
  public $billingId;
  public $configId;
  public $configName;
  public $creativeType;
  protected $dimensionsType = 'Google_Service_AdExchangeBuyer_PretargetingConfigDimensions';
  protected $dimensionsDataType = 'array';
  public $excludedContentLabels;
  public $excludedGeoCriteriaIds;
  protected $excludedPlacementsType = 'Google_Service_AdExchangeBuyer_PretargetingConfigExcludedPlacements';
  protected $excludedPlacementsDataType = 'array';
  public $excludedUserLists;
  public $excludedVerticals;
  public $geoCriteriaIds;
  public $isActive;
  public $kind;
  public $languages;
  public $minimumViewabilityDecile;
  public $mobileCarriers;
  public $mobileDevices;
  public $mobileOperatingSystemVersions;
  protected $placementsType = 'Google_Service_AdExchangeBuyer_PretargetingConfigPlacements';
  protected $placementsDataType = 'array';
  public $platforms;
  public $supportedCreativeAttributes;
  public $userIdentifierDataRequired;
  public $userLists;
  public $vendorTypes;
  public $verticals;
  protected $videoPlayerSizesType = 'Google_Service_AdExchangeBuyer_PretargetingConfigVideoPlayerSizes';
  protected $videoPlayerSizesDataType = 'array';

  public function setBillingId($billingId)
  {
    $this->billingId = $billingId;
  }
  public function getBillingId()
  {
    return $this->billingId;
  }
  public function setConfigId($configId)
  {
    $this->configId = $configId;
  }
  public function getConfigId()
  {
    return $this->configId;
  }
  public function setConfigName($configName)
  {
    $this->configName = $configName;
  }
  public function getConfigName()
  {
    return $this->configName;
  }
  public function setCreativeType($creativeType)
  {
    $this->creativeType = $creativeType;
  }
  public function getCreativeType()
  {
    return $this->creativeType;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_PretargetingConfigDimensions
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_PretargetingConfigDimensions
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  public function setExcludedContentLabels($excludedContentLabels)
  {
    $this->excludedContentLabels = $excludedContentLabels;
  }
  public function getExcludedContentLabels()
  {
    return $this->excludedContentLabels;
  }
  public function setExcludedGeoCriteriaIds($excludedGeoCriteriaIds)
  {
    $this->excludedGeoCriteriaIds = $excludedGeoCriteriaIds;
  }
  public function getExcludedGeoCriteriaIds()
  {
    return $this->excludedGeoCriteriaIds;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_PretargetingConfigExcludedPlacements
   */
  public function setExcludedPlacements($excludedPlacements)
  {
    $this->excludedPlacements = $excludedPlacements;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_PretargetingConfigExcludedPlacements
   */
  public function getExcludedPlacements()
  {
    return $this->excludedPlacements;
  }
  public function setExcludedUserLists($excludedUserLists)
  {
    $this->excludedUserLists = $excludedUserLists;
  }
  public function getExcludedUserLists()
  {
    return $this->excludedUserLists;
  }
  public function setExcludedVerticals($excludedVerticals)
  {
    $this->excludedVerticals = $excludedVerticals;
  }
  public function getExcludedVerticals()
  {
    return $this->excludedVerticals;
  }
  public function setGeoCriteriaIds($geoCriteriaIds)
  {
    $this->geoCriteriaIds = $geoCriteriaIds;
  }
  public function getGeoCriteriaIds()
  {
    return $this->geoCriteriaIds;
  }
  public function setIsActive($isActive)
  {
    $this->isActive = $isActive;
  }
  public function getIsActive()
  {
    return $this->isActive;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLanguages($languages)
  {
    $this->languages = $languages;
  }
  public function getLanguages()
  {
    return $this->languages;
  }
  public function setMinimumViewabilityDecile($minimumViewabilityDecile)
  {
    $this->minimumViewabilityDecile = $minimumViewabilityDecile;
  }
  public function getMinimumViewabilityDecile()
  {
    return $this->minimumViewabilityDecile;
  }
  public function setMobileCarriers($mobileCarriers)
  {
    $this->mobileCarriers = $mobileCarriers;
  }
  public function getMobileCarriers()
  {
    return $this->mobileCarriers;
  }
  public function setMobileDevices($mobileDevices)
  {
    $this->mobileDevices = $mobileDevices;
  }
  public function getMobileDevices()
  {
    return $this->mobileDevices;
  }
  public function setMobileOperatingSystemVersions($mobileOperatingSystemVersions)
  {
    $this->mobileOperatingSystemVersions = $mobileOperatingSystemVersions;
  }
  public function getMobileOperatingSystemVersions()
  {
    return $this->mobileOperatingSystemVersions;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_PretargetingConfigPlacements
   */
  public function setPlacements($placements)
  {
    $this->placements = $placements;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_PretargetingConfigPlacements
   */
  public function getPlacements()
  {
    return $this->placements;
  }
  public function setPlatforms($platforms)
  {
    $this->platforms = $platforms;
  }
  public function getPlatforms()
  {
    return $this->platforms;
  }
  public function setSupportedCreativeAttributes($supportedCreativeAttributes)
  {
    $this->supportedCreativeAttributes = $supportedCreativeAttributes;
  }
  public function getSupportedCreativeAttributes()
  {
    return $this->supportedCreativeAttributes;
  }
  public function setUserIdentifierDataRequired($userIdentifierDataRequired)
  {
    $this->userIdentifierDataRequired = $userIdentifierDataRequired;
  }
  public function getUserIdentifierDataRequired()
  {
    return $this->userIdentifierDataRequired;
  }
  public function setUserLists($userLists)
  {
    $this->userLists = $userLists;
  }
  public function getUserLists()
  {
    return $this->userLists;
  }
  public function setVendorTypes($vendorTypes)
  {
    $this->vendorTypes = $vendorTypes;
  }
  public function getVendorTypes()
  {
    return $this->vendorTypes;
  }
  public function setVerticals($verticals)
  {
    $this->verticals = $verticals;
  }
  public function getVerticals()
  {
    return $this->verticals;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_PretargetingConfigVideoPlayerSizes
   */
  public function setVideoPlayerSizes($videoPlayerSizes)
  {
    $this->videoPlayerSizes = $videoPlayerSizes;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_PretargetingConfigVideoPlayerSizes
   */
  public function getVideoPlayerSizes()
  {
    return $this->videoPlayerSizes;
  }
}
