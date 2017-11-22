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

class Google_Service_AndroidManagement_Device extends Google_Collection
{
  protected $collection_key = 'previousDeviceNames';
  public $apiLevel;
  public $appliedPolicyName;
  public $appliedPolicyVersion;
  public $appliedState;
  protected $disabledReasonType = 'Google_Service_AndroidManagement_UserFacingMessage';
  protected $disabledReasonDataType = '';
  protected $displaysType = 'Google_Service_AndroidManagement_Display';
  protected $displaysDataType = 'array';
  public $enrollmentTime;
  public $enrollmentTokenData;
  public $enrollmentTokenName;
  protected $hardwareInfoType = 'Google_Service_AndroidManagement_HardwareInfo';
  protected $hardwareInfoDataType = '';
  protected $hardwareStatusSamplesType = 'Google_Service_AndroidManagement_HardwareStatus';
  protected $hardwareStatusSamplesDataType = 'array';
  public $lastPolicyComplianceReportTime;
  public $lastPolicySyncTime;
  public $lastStatusReportTime;
  protected $memoryEventsType = 'Google_Service_AndroidManagement_MemoryEvent';
  protected $memoryEventsDataType = 'array';
  protected $memoryInfoType = 'Google_Service_AndroidManagement_MemoryInfo';
  protected $memoryInfoDataType = '';
  public $name;
  protected $networkInfoType = 'Google_Service_AndroidManagement_NetworkInfo';
  protected $networkInfoDataType = '';
  protected $nonComplianceDetailsType = 'Google_Service_AndroidManagement_NonComplianceDetail';
  protected $nonComplianceDetailsDataType = 'array';
  public $policyCompliant;
  public $policyName;
  protected $powerManagementEventsType = 'Google_Service_AndroidManagement_PowerManagementEvent';
  protected $powerManagementEventsDataType = 'array';
  public $previousDeviceNames;
  protected $softwareInfoType = 'Google_Service_AndroidManagement_SoftwareInfo';
  protected $softwareInfoDataType = '';
  public $state;
  public $userName;

  public function setApiLevel($apiLevel)
  {
    $this->apiLevel = $apiLevel;
  }
  public function getApiLevel()
  {
    return $this->apiLevel;
  }
  public function setAppliedPolicyName($appliedPolicyName)
  {
    $this->appliedPolicyName = $appliedPolicyName;
  }
  public function getAppliedPolicyName()
  {
    return $this->appliedPolicyName;
  }
  public function setAppliedPolicyVersion($appliedPolicyVersion)
  {
    $this->appliedPolicyVersion = $appliedPolicyVersion;
  }
  public function getAppliedPolicyVersion()
  {
    return $this->appliedPolicyVersion;
  }
  public function setAppliedState($appliedState)
  {
    $this->appliedState = $appliedState;
  }
  public function getAppliedState()
  {
    return $this->appliedState;
  }
  /**
   * @param Google_Service_AndroidManagement_UserFacingMessage
   */
  public function setDisabledReason(Google_Service_AndroidManagement_UserFacingMessage $disabledReason)
  {
    $this->disabledReason = $disabledReason;
  }
  /**
   * @return Google_Service_AndroidManagement_UserFacingMessage
   */
  public function getDisabledReason()
  {
    return $this->disabledReason;
  }
  /**
   * @param Google_Service_AndroidManagement_Display
   */
  public function setDisplays($displays)
  {
    $this->displays = $displays;
  }
  /**
   * @return Google_Service_AndroidManagement_Display
   */
  public function getDisplays()
  {
    return $this->displays;
  }
  public function setEnrollmentTime($enrollmentTime)
  {
    $this->enrollmentTime = $enrollmentTime;
  }
  public function getEnrollmentTime()
  {
    return $this->enrollmentTime;
  }
  public function setEnrollmentTokenData($enrollmentTokenData)
  {
    $this->enrollmentTokenData = $enrollmentTokenData;
  }
  public function getEnrollmentTokenData()
  {
    return $this->enrollmentTokenData;
  }
  public function setEnrollmentTokenName($enrollmentTokenName)
  {
    $this->enrollmentTokenName = $enrollmentTokenName;
  }
  public function getEnrollmentTokenName()
  {
    return $this->enrollmentTokenName;
  }
  /**
   * @param Google_Service_AndroidManagement_HardwareInfo
   */
  public function setHardwareInfo(Google_Service_AndroidManagement_HardwareInfo $hardwareInfo)
  {
    $this->hardwareInfo = $hardwareInfo;
  }
  /**
   * @return Google_Service_AndroidManagement_HardwareInfo
   */
  public function getHardwareInfo()
  {
    return $this->hardwareInfo;
  }
  /**
   * @param Google_Service_AndroidManagement_HardwareStatus
   */
  public function setHardwareStatusSamples($hardwareStatusSamples)
  {
    $this->hardwareStatusSamples = $hardwareStatusSamples;
  }
  /**
   * @return Google_Service_AndroidManagement_HardwareStatus
   */
  public function getHardwareStatusSamples()
  {
    return $this->hardwareStatusSamples;
  }
  public function setLastPolicyComplianceReportTime($lastPolicyComplianceReportTime)
  {
    $this->lastPolicyComplianceReportTime = $lastPolicyComplianceReportTime;
  }
  public function getLastPolicyComplianceReportTime()
  {
    return $this->lastPolicyComplianceReportTime;
  }
  public function setLastPolicySyncTime($lastPolicySyncTime)
  {
    $this->lastPolicySyncTime = $lastPolicySyncTime;
  }
  public function getLastPolicySyncTime()
  {
    return $this->lastPolicySyncTime;
  }
  public function setLastStatusReportTime($lastStatusReportTime)
  {
    $this->lastStatusReportTime = $lastStatusReportTime;
  }
  public function getLastStatusReportTime()
  {
    return $this->lastStatusReportTime;
  }
  /**
   * @param Google_Service_AndroidManagement_MemoryEvent
   */
  public function setMemoryEvents($memoryEvents)
  {
    $this->memoryEvents = $memoryEvents;
  }
  /**
   * @return Google_Service_AndroidManagement_MemoryEvent
   */
  public function getMemoryEvents()
  {
    return $this->memoryEvents;
  }
  /**
   * @param Google_Service_AndroidManagement_MemoryInfo
   */
  public function setMemoryInfo(Google_Service_AndroidManagement_MemoryInfo $memoryInfo)
  {
    $this->memoryInfo = $memoryInfo;
  }
  /**
   * @return Google_Service_AndroidManagement_MemoryInfo
   */
  public function getMemoryInfo()
  {
    return $this->memoryInfo;
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
   * @param Google_Service_AndroidManagement_NetworkInfo
   */
  public function setNetworkInfo(Google_Service_AndroidManagement_NetworkInfo $networkInfo)
  {
    $this->networkInfo = $networkInfo;
  }
  /**
   * @return Google_Service_AndroidManagement_NetworkInfo
   */
  public function getNetworkInfo()
  {
    return $this->networkInfo;
  }
  /**
   * @param Google_Service_AndroidManagement_NonComplianceDetail
   */
  public function setNonComplianceDetails($nonComplianceDetails)
  {
    $this->nonComplianceDetails = $nonComplianceDetails;
  }
  /**
   * @return Google_Service_AndroidManagement_NonComplianceDetail
   */
  public function getNonComplianceDetails()
  {
    return $this->nonComplianceDetails;
  }
  public function setPolicyCompliant($policyCompliant)
  {
    $this->policyCompliant = $policyCompliant;
  }
  public function getPolicyCompliant()
  {
    return $this->policyCompliant;
  }
  public function setPolicyName($policyName)
  {
    $this->policyName = $policyName;
  }
  public function getPolicyName()
  {
    return $this->policyName;
  }
  /**
   * @param Google_Service_AndroidManagement_PowerManagementEvent
   */
  public function setPowerManagementEvents($powerManagementEvents)
  {
    $this->powerManagementEvents = $powerManagementEvents;
  }
  /**
   * @return Google_Service_AndroidManagement_PowerManagementEvent
   */
  public function getPowerManagementEvents()
  {
    return $this->powerManagementEvents;
  }
  public function setPreviousDeviceNames($previousDeviceNames)
  {
    $this->previousDeviceNames = $previousDeviceNames;
  }
  public function getPreviousDeviceNames()
  {
    return $this->previousDeviceNames;
  }
  /**
   * @param Google_Service_AndroidManagement_SoftwareInfo
   */
  public function setSoftwareInfo(Google_Service_AndroidManagement_SoftwareInfo $softwareInfo)
  {
    $this->softwareInfo = $softwareInfo;
  }
  /**
   * @return Google_Service_AndroidManagement_SoftwareInfo
   */
  public function getSoftwareInfo()
  {
    return $this->softwareInfo;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUserName($userName)
  {
    $this->userName = $userName;
  }
  public function getUserName()
  {
    return $this->userName;
  }
}
