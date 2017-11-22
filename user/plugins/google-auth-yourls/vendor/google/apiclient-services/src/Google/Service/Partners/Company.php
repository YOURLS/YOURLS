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

class Google_Service_Partners_Company extends Google_Collection
{
  protected $collection_key = 'specializationStatus';
  public $additionalWebsites;
  public $autoApprovalEmailDomains;
  public $badgeTier;
  protected $certificationStatusesType = 'Google_Service_Partners_CertificationStatus';
  protected $certificationStatusesDataType = 'array';
  public $companyTypes;
  protected $convertedMinMonthlyBudgetType = 'Google_Service_Partners_Money';
  protected $convertedMinMonthlyBudgetDataType = '';
  public $id;
  public $industries;
  protected $localizedInfosType = 'Google_Service_Partners_LocalizedCompanyInfo';
  protected $localizedInfosDataType = 'array';
  protected $locationsType = 'Google_Service_Partners_Location';
  protected $locationsDataType = 'array';
  public $name;
  protected $originalMinMonthlyBudgetType = 'Google_Service_Partners_Money';
  protected $originalMinMonthlyBudgetDataType = '';
  public $primaryAdwordsManagerAccountId;
  public $primaryLanguageCode;
  protected $primaryLocationType = 'Google_Service_Partners_Location';
  protected $primaryLocationDataType = '';
  public $profileStatus;
  protected $publicProfileType = 'Google_Service_Partners_PublicProfile';
  protected $publicProfileDataType = '';
  protected $ranksType = 'Google_Service_Partners_Rank';
  protected $ranksDataType = 'array';
  public $services;
  protected $specializationStatusType = 'Google_Service_Partners_SpecializationStatus';
  protected $specializationStatusDataType = 'array';
  public $websiteUrl;

  public function setAdditionalWebsites($additionalWebsites)
  {
    $this->additionalWebsites = $additionalWebsites;
  }
  public function getAdditionalWebsites()
  {
    return $this->additionalWebsites;
  }
  public function setAutoApprovalEmailDomains($autoApprovalEmailDomains)
  {
    $this->autoApprovalEmailDomains = $autoApprovalEmailDomains;
  }
  public function getAutoApprovalEmailDomains()
  {
    return $this->autoApprovalEmailDomains;
  }
  public function setBadgeTier($badgeTier)
  {
    $this->badgeTier = $badgeTier;
  }
  public function getBadgeTier()
  {
    return $this->badgeTier;
  }
  /**
   * @param Google_Service_Partners_CertificationStatus
   */
  public function setCertificationStatuses($certificationStatuses)
  {
    $this->certificationStatuses = $certificationStatuses;
  }
  /**
   * @return Google_Service_Partners_CertificationStatus
   */
  public function getCertificationStatuses()
  {
    return $this->certificationStatuses;
  }
  public function setCompanyTypes($companyTypes)
  {
    $this->companyTypes = $companyTypes;
  }
  public function getCompanyTypes()
  {
    return $this->companyTypes;
  }
  /**
   * @param Google_Service_Partners_Money
   */
  public function setConvertedMinMonthlyBudget(Google_Service_Partners_Money $convertedMinMonthlyBudget)
  {
    $this->convertedMinMonthlyBudget = $convertedMinMonthlyBudget;
  }
  /**
   * @return Google_Service_Partners_Money
   */
  public function getConvertedMinMonthlyBudget()
  {
    return $this->convertedMinMonthlyBudget;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIndustries($industries)
  {
    $this->industries = $industries;
  }
  public function getIndustries()
  {
    return $this->industries;
  }
  /**
   * @param Google_Service_Partners_LocalizedCompanyInfo
   */
  public function setLocalizedInfos($localizedInfos)
  {
    $this->localizedInfos = $localizedInfos;
  }
  /**
   * @return Google_Service_Partners_LocalizedCompanyInfo
   */
  public function getLocalizedInfos()
  {
    return $this->localizedInfos;
  }
  /**
   * @param Google_Service_Partners_Location
   */
  public function setLocations($locations)
  {
    $this->locations = $locations;
  }
  /**
   * @return Google_Service_Partners_Location
   */
  public function getLocations()
  {
    return $this->locations;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Partners_Money
   */
  public function setOriginalMinMonthlyBudget(Google_Service_Partners_Money $originalMinMonthlyBudget)
  {
    $this->originalMinMonthlyBudget = $originalMinMonthlyBudget;
  }
  /**
   * @return Google_Service_Partners_Money
   */
  public function getOriginalMinMonthlyBudget()
  {
    return $this->originalMinMonthlyBudget;
  }
  public function setPrimaryAdwordsManagerAccountId($primaryAdwordsManagerAccountId)
  {
    $this->primaryAdwordsManagerAccountId = $primaryAdwordsManagerAccountId;
  }
  public function getPrimaryAdwordsManagerAccountId()
  {
    return $this->primaryAdwordsManagerAccountId;
  }
  public function setPrimaryLanguageCode($primaryLanguageCode)
  {
    $this->primaryLanguageCode = $primaryLanguageCode;
  }
  public function getPrimaryLanguageCode()
  {
    return $this->primaryLanguageCode;
  }
  /**
   * @param Google_Service_Partners_Location
   */
  public function setPrimaryLocation(Google_Service_Partners_Location $primaryLocation)
  {
    $this->primaryLocation = $primaryLocation;
  }
  /**
   * @return Google_Service_Partners_Location
   */
  public function getPrimaryLocation()
  {
    return $this->primaryLocation;
  }
  public function setProfileStatus($profileStatus)
  {
    $this->profileStatus = $profileStatus;
  }
  public function getProfileStatus()
  {
    return $this->profileStatus;
  }
  /**
   * @param Google_Service_Partners_PublicProfile
   */
  public function setPublicProfile(Google_Service_Partners_PublicProfile $publicProfile)
  {
    $this->publicProfile = $publicProfile;
  }
  /**
   * @return Google_Service_Partners_PublicProfile
   */
  public function getPublicProfile()
  {
    return $this->publicProfile;
  }
  /**
   * @param Google_Service_Partners_Rank
   */
  public function setRanks($ranks)
  {
    $this->ranks = $ranks;
  }
  /**
   * @return Google_Service_Partners_Rank
   */
  public function getRanks()
  {
    return $this->ranks;
  }
  public function setServices($services)
  {
    $this->services = $services;
  }
  public function getServices()
  {
    return $this->services;
  }
  /**
   * @param Google_Service_Partners_SpecializationStatus
   */
  public function setSpecializationStatus($specializationStatus)
  {
    $this->specializationStatus = $specializationStatus;
  }
  /**
   * @return Google_Service_Partners_SpecializationStatus
   */
  public function getSpecializationStatus()
  {
    return $this->specializationStatus;
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
