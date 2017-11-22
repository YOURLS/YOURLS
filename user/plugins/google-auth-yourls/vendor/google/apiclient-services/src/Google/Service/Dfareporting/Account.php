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

class Google_Service_Dfareporting_Account extends Google_Collection
{
  protected $collection_key = 'availablePermissionIds';
  public $accountPermissionIds;
  public $accountProfile;
  public $active;
  public $activeAdsLimitTier;
  public $activeViewOptOut;
  public $availablePermissionIds;
  public $countryId;
  public $currencyId;
  public $defaultCreativeSizeId;
  public $description;
  public $id;
  public $kind;
  public $locale;
  public $maximumImageSize;
  public $name;
  public $nielsenOcrEnabled;
  protected $reportsConfigurationType = 'Google_Service_Dfareporting_ReportsConfiguration';
  protected $reportsConfigurationDataType = '';
  public $shareReportsWithTwitter;
  public $teaserSizeLimit;

  public function setAccountPermissionIds($accountPermissionIds)
  {
    $this->accountPermissionIds = $accountPermissionIds;
  }
  public function getAccountPermissionIds()
  {
    return $this->accountPermissionIds;
  }
  public function setAccountProfile($accountProfile)
  {
    $this->accountProfile = $accountProfile;
  }
  public function getAccountProfile()
  {
    return $this->accountProfile;
  }
  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  public function setActiveAdsLimitTier($activeAdsLimitTier)
  {
    $this->activeAdsLimitTier = $activeAdsLimitTier;
  }
  public function getActiveAdsLimitTier()
  {
    return $this->activeAdsLimitTier;
  }
  public function setActiveViewOptOut($activeViewOptOut)
  {
    $this->activeViewOptOut = $activeViewOptOut;
  }
  public function getActiveViewOptOut()
  {
    return $this->activeViewOptOut;
  }
  public function setAvailablePermissionIds($availablePermissionIds)
  {
    $this->availablePermissionIds = $availablePermissionIds;
  }
  public function getAvailablePermissionIds()
  {
    return $this->availablePermissionIds;
  }
  public function setCountryId($countryId)
  {
    $this->countryId = $countryId;
  }
  public function getCountryId()
  {
    return $this->countryId;
  }
  public function setCurrencyId($currencyId)
  {
    $this->currencyId = $currencyId;
  }
  public function getCurrencyId()
  {
    return $this->currencyId;
  }
  public function setDefaultCreativeSizeId($defaultCreativeSizeId)
  {
    $this->defaultCreativeSizeId = $defaultCreativeSizeId;
  }
  public function getDefaultCreativeSizeId()
  {
    return $this->defaultCreativeSizeId;
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
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  public function getLocale()
  {
    return $this->locale;
  }
  public function setMaximumImageSize($maximumImageSize)
  {
    $this->maximumImageSize = $maximumImageSize;
  }
  public function getMaximumImageSize()
  {
    return $this->maximumImageSize;
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
  /**
   * @param Google_Service_Dfareporting_ReportsConfiguration
   */
  public function setReportsConfiguration(Google_Service_Dfareporting_ReportsConfiguration $reportsConfiguration)
  {
    $this->reportsConfiguration = $reportsConfiguration;
  }
  /**
   * @return Google_Service_Dfareporting_ReportsConfiguration
   */
  public function getReportsConfiguration()
  {
    return $this->reportsConfiguration;
  }
  public function setShareReportsWithTwitter($shareReportsWithTwitter)
  {
    $this->shareReportsWithTwitter = $shareReportsWithTwitter;
  }
  public function getShareReportsWithTwitter()
  {
    return $this->shareReportsWithTwitter;
  }
  public function setTeaserSizeLimit($teaserSizeLimit)
  {
    $this->teaserSizeLimit = $teaserSizeLimit;
  }
  public function getTeaserSizeLimit()
  {
    return $this->teaserSizeLimit;
  }
}
