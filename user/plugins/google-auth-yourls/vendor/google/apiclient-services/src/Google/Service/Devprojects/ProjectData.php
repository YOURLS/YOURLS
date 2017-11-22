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

class Google_Service_Devprojects_ProjectData extends Google_Collection
{
  protected $collection_key = 'visibility';
  protected $abuseSectionType = 'Google_Service_Devprojects_AbuseSection';
  protected $abuseSectionDataType = '';
  public $abuseState;
  protected $apiSectionType = 'Google_Service_Devprojects_ApiSection';
  protected $apiSectionDataType = '';
  protected $apiaryPropertySectionType = 'Google_Service_Devprojects_ApiaryPropertySection';
  protected $apiaryPropertySectionDataType = '';
  protected $appengineSectionType = 'Google_Service_Devprojects_AppEngineSection';
  protected $appengineSectionDataType = '';
  protected $appsScriptSectionType = 'Google_Service_Devprojects_AppsScriptSection';
  protected $appsScriptSectionDataType = '';
  public $assignedId;
  protected $authSectionType = 'Google_Service_Devprojects_AuthSection';
  protected $authSectionDataType = '';
  protected $cloudComputeSectionType = 'Google_Service_Devprojects_CloudComputeSection';
  protected $cloudComputeSectionDataType = '';
  protected $cloudSqlSectionType = 'Google_Service_Devprojects_CloudSqlSection';
  protected $cloudSqlSectionDataType = '';
  protected $cloudStorageSectionType = 'Google_Service_Devprojects_CloudStorageSection';
  protected $cloudStorageSectionDataType = '';
  public $createdMs;
  public $currentUserRole;
  protected $customizationSectionType = 'Google_Service_Devprojects_UiCustomizationSection';
  protected $customizationSectionDataType = '';
  public $disabledReasons;
  public $domainId;
  public $domainOrOrganization;
  protected $iamSectionType = 'Google_Service_Devprojects_IamSection';
  protected $iamSectionDataType = '';
  public $id;
  public $kind;
  public $label;
  protected $projectLinkingSectionType = 'Google_Service_Devprojects_ProjectLinkingSection';
  protected $projectLinkingSectionDataType = '';
  public $projectUrl;
  protected $quotasSectionType = 'Google_Service_Devprojects_QuotaConfiguration';
  protected $quotasSectionDataType = '';
  protected $serviceAccountSectionType = 'Google_Service_Devprojects_ServiceAccountSection';
  protected $serviceAccountSectionDataType = '';
  public $shardType;
  protected $statsSectionType = 'Google_Service_Devprojects_StatsSection';
  protected $statsSectionDataType = '';
  public $status;
  protected $teamSectionType = 'Google_Service_Devprojects_TeamSection';
  protected $teamSectionDataType = '';
  public $versionInfo;
  public $visibility;

  public function setAbuseSection(Google_Service_Devprojects_AbuseSection $abuseSection)
  {
    $this->abuseSection = $abuseSection;
  }
  public function getAbuseSection()
  {
    return $this->abuseSection;
  }
  public function setAbuseState($abuseState)
  {
    $this->abuseState = $abuseState;
  }
  public function getAbuseState()
  {
    return $this->abuseState;
  }
  public function setApiSection(Google_Service_Devprojects_ApiSection $apiSection)
  {
    $this->apiSection = $apiSection;
  }
  public function getApiSection()
  {
    return $this->apiSection;
  }
  public function setApiaryPropertySection(Google_Service_Devprojects_ApiaryPropertySection $apiaryPropertySection)
  {
    $this->apiaryPropertySection = $apiaryPropertySection;
  }
  public function getApiaryPropertySection()
  {
    return $this->apiaryPropertySection;
  }
  public function setAppengineSection(Google_Service_Devprojects_AppEngineSection $appengineSection)
  {
    $this->appengineSection = $appengineSection;
  }
  public function getAppengineSection()
  {
    return $this->appengineSection;
  }
  public function setAppsScriptSection(Google_Service_Devprojects_AppsScriptSection $appsScriptSection)
  {
    $this->appsScriptSection = $appsScriptSection;
  }
  public function getAppsScriptSection()
  {
    return $this->appsScriptSection;
  }
  public function setAssignedId($assignedId)
  {
    $this->assignedId = $assignedId;
  }
  public function getAssignedId()
  {
    return $this->assignedId;
  }
  public function setAuthSection(Google_Service_Devprojects_AuthSection $authSection)
  {
    $this->authSection = $authSection;
  }
  public function getAuthSection()
  {
    return $this->authSection;
  }
  public function setCloudComputeSection(Google_Service_Devprojects_CloudComputeSection $cloudComputeSection)
  {
    $this->cloudComputeSection = $cloudComputeSection;
  }
  public function getCloudComputeSection()
  {
    return $this->cloudComputeSection;
  }
  public function setCloudSqlSection(Google_Service_Devprojects_CloudSqlSection $cloudSqlSection)
  {
    $this->cloudSqlSection = $cloudSqlSection;
  }
  public function getCloudSqlSection()
  {
    return $this->cloudSqlSection;
  }
  public function setCloudStorageSection(Google_Service_Devprojects_CloudStorageSection $cloudStorageSection)
  {
    $this->cloudStorageSection = $cloudStorageSection;
  }
  public function getCloudStorageSection()
  {
    return $this->cloudStorageSection;
  }
  public function setCreatedMs($createdMs)
  {
    $this->createdMs = $createdMs;
  }
  public function getCreatedMs()
  {
    return $this->createdMs;
  }
  public function setCurrentUserRole($currentUserRole)
  {
    $this->currentUserRole = $currentUserRole;
  }
  public function getCurrentUserRole()
  {
    return $this->currentUserRole;
  }
  public function setCustomizationSection(Google_Service_Devprojects_UiCustomizationSection $customizationSection)
  {
    $this->customizationSection = $customizationSection;
  }
  public function getCustomizationSection()
  {
    return $this->customizationSection;
  }
  public function setDisabledReasons($disabledReasons)
  {
    $this->disabledReasons = $disabledReasons;
  }
  public function getDisabledReasons()
  {
    return $this->disabledReasons;
  }
  public function setDomainId($domainId)
  {
    $this->domainId = $domainId;
  }
  public function getDomainId()
  {
    return $this->domainId;
  }
  public function setDomainOrOrganization($domainOrOrganization)
  {
    $this->domainOrOrganization = $domainOrOrganization;
  }
  public function getDomainOrOrganization()
  {
    return $this->domainOrOrganization;
  }
  public function setIamSection(Google_Service_Devprojects_IamSection $iamSection)
  {
    $this->iamSection = $iamSection;
  }
  public function getIamSection()
  {
    return $this->iamSection;
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
  public function setLabel($label)
  {
    $this->label = $label;
  }
  public function getLabel()
  {
    return $this->label;
  }
  public function setProjectLinkingSection(Google_Service_Devprojects_ProjectLinkingSection $projectLinkingSection)
  {
    $this->projectLinkingSection = $projectLinkingSection;
  }
  public function getProjectLinkingSection()
  {
    return $this->projectLinkingSection;
  }
  public function setProjectUrl($projectUrl)
  {
    $this->projectUrl = $projectUrl;
  }
  public function getProjectUrl()
  {
    return $this->projectUrl;
  }
  public function setQuotasSection(Google_Service_Devprojects_QuotaConfiguration $quotasSection)
  {
    $this->quotasSection = $quotasSection;
  }
  public function getQuotasSection()
  {
    return $this->quotasSection;
  }
  public function setServiceAccountSection(Google_Service_Devprojects_ServiceAccountSection $serviceAccountSection)
  {
    $this->serviceAccountSection = $serviceAccountSection;
  }
  public function getServiceAccountSection()
  {
    return $this->serviceAccountSection;
  }
  public function setShardType($shardType)
  {
    $this->shardType = $shardType;
  }
  public function getShardType()
  {
    return $this->shardType;
  }
  public function setStatsSection(Google_Service_Devprojects_StatsSection $statsSection)
  {
    $this->statsSection = $statsSection;
  }
  public function getStatsSection()
  {
    return $this->statsSection;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTeamSection(Google_Service_Devprojects_TeamSection $teamSection)
  {
    $this->teamSection = $teamSection;
  }
  public function getTeamSection()
  {
    return $this->teamSection;
  }
  public function setVersionInfo($versionInfo)
  {
    $this->versionInfo = $versionInfo;
  }
  public function getVersionInfo()
  {
    return $this->versionInfo;
  }
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  public function getVisibility()
  {
    return $this->visibility;
  }
}
