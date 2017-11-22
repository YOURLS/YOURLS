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

class Google_Service_AndroidManagement_Policy extends Google_Collection
{
  protected $collection_key = 'stayOnPluggedModes';
  public $addUserDisabled;
  public $adjustVolumeDisabled;
  protected $applicationsType = 'Google_Service_AndroidManagement_ApplicationPolicy';
  protected $applicationsDataType = 'array';
  public $autoTimeRequired;
  public $blockApplicationsEnabled;
  public $cameraDisabled;
  protected $complianceRulesType = 'Google_Service_AndroidManagement_ComplianceRule';
  protected $complianceRulesDataType = 'array';
  public $debuggingFeaturesAllowed;
  public $defaultPermissionPolicy;
  public $factoryResetDisabled;
  public $frpAdminEmails;
  public $funDisabled;
  public $installUnknownSourcesAllowed;
  public $keyguardDisabled;
  public $maximumTimeToLock;
  public $modifyAccountsDisabled;
  public $name;
  public $networkEscapeHatchEnabled;
  public $openNetworkConfiguration;
  protected $passwordRequirementsType = 'Google_Service_AndroidManagement_PasswordRequirements';
  protected $passwordRequirementsDataType = '';
  protected $persistentPreferredActivitiesType = 'Google_Service_AndroidManagement_PersistentPreferredActivity';
  protected $persistentPreferredActivitiesDataType = 'array';
  public $removeUserDisabled;
  public $safeBootDisabled;
  public $screenCaptureDisabled;
  public $statusBarDisabled;
  protected $statusReportingSettingsType = 'Google_Service_AndroidManagement_StatusReportingSettings';
  protected $statusReportingSettingsDataType = '';
  public $stayOnPluggedModes;
  protected $systemUpdateType = 'Google_Service_AndroidManagement_SystemUpdate';
  protected $systemUpdateDataType = '';
  public $unmuteMicrophoneDisabled;
  public $version;
  public $wifiConfigDisabled;
  public $wifiConfigsLockdownEnabled;

  public function setAddUserDisabled($addUserDisabled)
  {
    $this->addUserDisabled = $addUserDisabled;
  }
  public function getAddUserDisabled()
  {
    return $this->addUserDisabled;
  }
  public function setAdjustVolumeDisabled($adjustVolumeDisabled)
  {
    $this->adjustVolumeDisabled = $adjustVolumeDisabled;
  }
  public function getAdjustVolumeDisabled()
  {
    return $this->adjustVolumeDisabled;
  }
  /**
   * @param Google_Service_AndroidManagement_ApplicationPolicy
   */
  public function setApplications($applications)
  {
    $this->applications = $applications;
  }
  /**
   * @return Google_Service_AndroidManagement_ApplicationPolicy
   */
  public function getApplications()
  {
    return $this->applications;
  }
  public function setAutoTimeRequired($autoTimeRequired)
  {
    $this->autoTimeRequired = $autoTimeRequired;
  }
  public function getAutoTimeRequired()
  {
    return $this->autoTimeRequired;
  }
  public function setBlockApplicationsEnabled($blockApplicationsEnabled)
  {
    $this->blockApplicationsEnabled = $blockApplicationsEnabled;
  }
  public function getBlockApplicationsEnabled()
  {
    return $this->blockApplicationsEnabled;
  }
  public function setCameraDisabled($cameraDisabled)
  {
    $this->cameraDisabled = $cameraDisabled;
  }
  public function getCameraDisabled()
  {
    return $this->cameraDisabled;
  }
  /**
   * @param Google_Service_AndroidManagement_ComplianceRule
   */
  public function setComplianceRules($complianceRules)
  {
    $this->complianceRules = $complianceRules;
  }
  /**
   * @return Google_Service_AndroidManagement_ComplianceRule
   */
  public function getComplianceRules()
  {
    return $this->complianceRules;
  }
  public function setDebuggingFeaturesAllowed($debuggingFeaturesAllowed)
  {
    $this->debuggingFeaturesAllowed = $debuggingFeaturesAllowed;
  }
  public function getDebuggingFeaturesAllowed()
  {
    return $this->debuggingFeaturesAllowed;
  }
  public function setDefaultPermissionPolicy($defaultPermissionPolicy)
  {
    $this->defaultPermissionPolicy = $defaultPermissionPolicy;
  }
  public function getDefaultPermissionPolicy()
  {
    return $this->defaultPermissionPolicy;
  }
  public function setFactoryResetDisabled($factoryResetDisabled)
  {
    $this->factoryResetDisabled = $factoryResetDisabled;
  }
  public function getFactoryResetDisabled()
  {
    return $this->factoryResetDisabled;
  }
  public function setFrpAdminEmails($frpAdminEmails)
  {
    $this->frpAdminEmails = $frpAdminEmails;
  }
  public function getFrpAdminEmails()
  {
    return $this->frpAdminEmails;
  }
  public function setFunDisabled($funDisabled)
  {
    $this->funDisabled = $funDisabled;
  }
  public function getFunDisabled()
  {
    return $this->funDisabled;
  }
  public function setInstallUnknownSourcesAllowed($installUnknownSourcesAllowed)
  {
    $this->installUnknownSourcesAllowed = $installUnknownSourcesAllowed;
  }
  public function getInstallUnknownSourcesAllowed()
  {
    return $this->installUnknownSourcesAllowed;
  }
  public function setKeyguardDisabled($keyguardDisabled)
  {
    $this->keyguardDisabled = $keyguardDisabled;
  }
  public function getKeyguardDisabled()
  {
    return $this->keyguardDisabled;
  }
  public function setMaximumTimeToLock($maximumTimeToLock)
  {
    $this->maximumTimeToLock = $maximumTimeToLock;
  }
  public function getMaximumTimeToLock()
  {
    return $this->maximumTimeToLock;
  }
  public function setModifyAccountsDisabled($modifyAccountsDisabled)
  {
    $this->modifyAccountsDisabled = $modifyAccountsDisabled;
  }
  public function getModifyAccountsDisabled()
  {
    return $this->modifyAccountsDisabled;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNetworkEscapeHatchEnabled($networkEscapeHatchEnabled)
  {
    $this->networkEscapeHatchEnabled = $networkEscapeHatchEnabled;
  }
  public function getNetworkEscapeHatchEnabled()
  {
    return $this->networkEscapeHatchEnabled;
  }
  public function setOpenNetworkConfiguration($openNetworkConfiguration)
  {
    $this->openNetworkConfiguration = $openNetworkConfiguration;
  }
  public function getOpenNetworkConfiguration()
  {
    return $this->openNetworkConfiguration;
  }
  /**
   * @param Google_Service_AndroidManagement_PasswordRequirements
   */
  public function setPasswordRequirements(Google_Service_AndroidManagement_PasswordRequirements $passwordRequirements)
  {
    $this->passwordRequirements = $passwordRequirements;
  }
  /**
   * @return Google_Service_AndroidManagement_PasswordRequirements
   */
  public function getPasswordRequirements()
  {
    return $this->passwordRequirements;
  }
  /**
   * @param Google_Service_AndroidManagement_PersistentPreferredActivity
   */
  public function setPersistentPreferredActivities($persistentPreferredActivities)
  {
    $this->persistentPreferredActivities = $persistentPreferredActivities;
  }
  /**
   * @return Google_Service_AndroidManagement_PersistentPreferredActivity
   */
  public function getPersistentPreferredActivities()
  {
    return $this->persistentPreferredActivities;
  }
  public function setRemoveUserDisabled($removeUserDisabled)
  {
    $this->removeUserDisabled = $removeUserDisabled;
  }
  public function getRemoveUserDisabled()
  {
    return $this->removeUserDisabled;
  }
  public function setSafeBootDisabled($safeBootDisabled)
  {
    $this->safeBootDisabled = $safeBootDisabled;
  }
  public function getSafeBootDisabled()
  {
    return $this->safeBootDisabled;
  }
  public function setScreenCaptureDisabled($screenCaptureDisabled)
  {
    $this->screenCaptureDisabled = $screenCaptureDisabled;
  }
  public function getScreenCaptureDisabled()
  {
    return $this->screenCaptureDisabled;
  }
  public function setStatusBarDisabled($statusBarDisabled)
  {
    $this->statusBarDisabled = $statusBarDisabled;
  }
  public function getStatusBarDisabled()
  {
    return $this->statusBarDisabled;
  }
  /**
   * @param Google_Service_AndroidManagement_StatusReportingSettings
   */
  public function setStatusReportingSettings(Google_Service_AndroidManagement_StatusReportingSettings $statusReportingSettings)
  {
    $this->statusReportingSettings = $statusReportingSettings;
  }
  /**
   * @return Google_Service_AndroidManagement_StatusReportingSettings
   */
  public function getStatusReportingSettings()
  {
    return $this->statusReportingSettings;
  }
  public function setStayOnPluggedModes($stayOnPluggedModes)
  {
    $this->stayOnPluggedModes = $stayOnPluggedModes;
  }
  public function getStayOnPluggedModes()
  {
    return $this->stayOnPluggedModes;
  }
  /**
   * @param Google_Service_AndroidManagement_SystemUpdate
   */
  public function setSystemUpdate(Google_Service_AndroidManagement_SystemUpdate $systemUpdate)
  {
    $this->systemUpdate = $systemUpdate;
  }
  /**
   * @return Google_Service_AndroidManagement_SystemUpdate
   */
  public function getSystemUpdate()
  {
    return $this->systemUpdate;
  }
  public function setUnmuteMicrophoneDisabled($unmuteMicrophoneDisabled)
  {
    $this->unmuteMicrophoneDisabled = $unmuteMicrophoneDisabled;
  }
  public function getUnmuteMicrophoneDisabled()
  {
    return $this->unmuteMicrophoneDisabled;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
  public function setWifiConfigDisabled($wifiConfigDisabled)
  {
    $this->wifiConfigDisabled = $wifiConfigDisabled;
  }
  public function getWifiConfigDisabled()
  {
    return $this->wifiConfigDisabled;
  }
  public function setWifiConfigsLockdownEnabled($wifiConfigsLockdownEnabled)
  {
    $this->wifiConfigsLockdownEnabled = $wifiConfigsLockdownEnabled;
  }
  public function getWifiConfigsLockdownEnabled()
  {
    return $this->wifiConfigsLockdownEnabled;
  }
}
