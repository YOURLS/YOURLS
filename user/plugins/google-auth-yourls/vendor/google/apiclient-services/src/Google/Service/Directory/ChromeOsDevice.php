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

class Google_Service_Directory_ChromeOsDevice extends Google_Collection
{
  protected $collection_key = 'recentUsers';
  protected $activeTimeRangesType = 'Google_Service_Directory_ChromeOsDeviceActiveTimeRanges';
  protected $activeTimeRangesDataType = 'array';
  public $annotatedAssetId;
  public $annotatedLocation;
  public $annotatedUser;
  public $bootMode;
  public $deviceId;
  public $etag;
  public $ethernetMacAddress;
  public $firmwareVersion;
  public $kind;
  public $lastEnrollmentTime;
  public $lastSync;
  public $macAddress;
  public $meid;
  public $model;
  public $notes;
  public $orderNumber;
  public $orgUnitPath;
  public $osVersion;
  public $platformVersion;
  protected $recentUsersType = 'Google_Service_Directory_ChromeOsDeviceRecentUsers';
  protected $recentUsersDataType = 'array';
  public $serialNumber;
  public $status;
  public $supportEndDate;
  public $willAutoRenew;

  /**
   * @param Google_Service_Directory_ChromeOsDeviceActiveTimeRanges
   */
  public function setActiveTimeRanges($activeTimeRanges)
  {
    $this->activeTimeRanges = $activeTimeRanges;
  }
  /**
   * @return Google_Service_Directory_ChromeOsDeviceActiveTimeRanges
   */
  public function getActiveTimeRanges()
  {
    return $this->activeTimeRanges;
  }
  public function setAnnotatedAssetId($annotatedAssetId)
  {
    $this->annotatedAssetId = $annotatedAssetId;
  }
  public function getAnnotatedAssetId()
  {
    return $this->annotatedAssetId;
  }
  public function setAnnotatedLocation($annotatedLocation)
  {
    $this->annotatedLocation = $annotatedLocation;
  }
  public function getAnnotatedLocation()
  {
    return $this->annotatedLocation;
  }
  public function setAnnotatedUser($annotatedUser)
  {
    $this->annotatedUser = $annotatedUser;
  }
  public function getAnnotatedUser()
  {
    return $this->annotatedUser;
  }
  public function setBootMode($bootMode)
  {
    $this->bootMode = $bootMode;
  }
  public function getBootMode()
  {
    return $this->bootMode;
  }
  public function setDeviceId($deviceId)
  {
    $this->deviceId = $deviceId;
  }
  public function getDeviceId()
  {
    return $this->deviceId;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setEthernetMacAddress($ethernetMacAddress)
  {
    $this->ethernetMacAddress = $ethernetMacAddress;
  }
  public function getEthernetMacAddress()
  {
    return $this->ethernetMacAddress;
  }
  public function setFirmwareVersion($firmwareVersion)
  {
    $this->firmwareVersion = $firmwareVersion;
  }
  public function getFirmwareVersion()
  {
    return $this->firmwareVersion;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLastEnrollmentTime($lastEnrollmentTime)
  {
    $this->lastEnrollmentTime = $lastEnrollmentTime;
  }
  public function getLastEnrollmentTime()
  {
    return $this->lastEnrollmentTime;
  }
  public function setLastSync($lastSync)
  {
    $this->lastSync = $lastSync;
  }
  public function getLastSync()
  {
    return $this->lastSync;
  }
  public function setMacAddress($macAddress)
  {
    $this->macAddress = $macAddress;
  }
  public function getMacAddress()
  {
    return $this->macAddress;
  }
  public function setMeid($meid)
  {
    $this->meid = $meid;
  }
  public function getMeid()
  {
    return $this->meid;
  }
  public function setModel($model)
  {
    $this->model = $model;
  }
  public function getModel()
  {
    return $this->model;
  }
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  public function getNotes()
  {
    return $this->notes;
  }
  public function setOrderNumber($orderNumber)
  {
    $this->orderNumber = $orderNumber;
  }
  public function getOrderNumber()
  {
    return $this->orderNumber;
  }
  public function setOrgUnitPath($orgUnitPath)
  {
    $this->orgUnitPath = $orgUnitPath;
  }
  public function getOrgUnitPath()
  {
    return $this->orgUnitPath;
  }
  public function setOsVersion($osVersion)
  {
    $this->osVersion = $osVersion;
  }
  public function getOsVersion()
  {
    return $this->osVersion;
  }
  public function setPlatformVersion($platformVersion)
  {
    $this->platformVersion = $platformVersion;
  }
  public function getPlatformVersion()
  {
    return $this->platformVersion;
  }
  /**
   * @param Google_Service_Directory_ChromeOsDeviceRecentUsers
   */
  public function setRecentUsers($recentUsers)
  {
    $this->recentUsers = $recentUsers;
  }
  /**
   * @return Google_Service_Directory_ChromeOsDeviceRecentUsers
   */
  public function getRecentUsers()
  {
    return $this->recentUsers;
  }
  public function setSerialNumber($serialNumber)
  {
    $this->serialNumber = $serialNumber;
  }
  public function getSerialNumber()
  {
    return $this->serialNumber;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setSupportEndDate($supportEndDate)
  {
    $this->supportEndDate = $supportEndDate;
  }
  public function getSupportEndDate()
  {
    return $this->supportEndDate;
  }
  public function setWillAutoRenew($willAutoRenew)
  {
    $this->willAutoRenew = $willAutoRenew;
  }
  public function getWillAutoRenew()
  {
    return $this->willAutoRenew;
  }
}
