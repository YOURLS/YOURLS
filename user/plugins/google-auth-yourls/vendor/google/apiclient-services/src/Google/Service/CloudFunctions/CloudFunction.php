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

class Google_Service_CloudFunctions_CloudFunction extends Google_Model
{
  public $availableMemoryMb;
  public $description;
  public $entryPoint;
  protected $eventTriggerType = 'Google_Service_CloudFunctions_EventTrigger';
  protected $eventTriggerDataType = '';
  protected $httpsTriggerType = 'Google_Service_CloudFunctions_HttpsTrigger';
  protected $httpsTriggerDataType = '';
  public $labels;
  public $name;
  public $serviceAccountEmail;
  public $sourceArchiveUrl;
  protected $sourceRepositoryType = 'Google_Service_CloudFunctions_SourceRepository';
  protected $sourceRepositoryDataType = '';
  public $sourceUploadUrl;
  public $status;
  public $timeout;
  public $updateTime;
  public $versionId;

  public function setAvailableMemoryMb($availableMemoryMb)
  {
    $this->availableMemoryMb = $availableMemoryMb;
  }
  public function getAvailableMemoryMb()
  {
    return $this->availableMemoryMb;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEntryPoint($entryPoint)
  {
    $this->entryPoint = $entryPoint;
  }
  public function getEntryPoint()
  {
    return $this->entryPoint;
  }
  /**
   * @param Google_Service_CloudFunctions_EventTrigger
   */
  public function setEventTrigger(Google_Service_CloudFunctions_EventTrigger $eventTrigger)
  {
    $this->eventTrigger = $eventTrigger;
  }
  /**
   * @return Google_Service_CloudFunctions_EventTrigger
   */
  public function getEventTrigger()
  {
    return $this->eventTrigger;
  }
  /**
   * @param Google_Service_CloudFunctions_HttpsTrigger
   */
  public function setHttpsTrigger(Google_Service_CloudFunctions_HttpsTrigger $httpsTrigger)
  {
    $this->httpsTrigger = $httpsTrigger;
  }
  /**
   * @return Google_Service_CloudFunctions_HttpsTrigger
   */
  public function getHttpsTrigger()
  {
    return $this->httpsTrigger;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setServiceAccountEmail($serviceAccountEmail)
  {
    $this->serviceAccountEmail = $serviceAccountEmail;
  }
  public function getServiceAccountEmail()
  {
    return $this->serviceAccountEmail;
  }
  public function setSourceArchiveUrl($sourceArchiveUrl)
  {
    $this->sourceArchiveUrl = $sourceArchiveUrl;
  }
  public function getSourceArchiveUrl()
  {
    return $this->sourceArchiveUrl;
  }
  /**
   * @param Google_Service_CloudFunctions_SourceRepository
   */
  public function setSourceRepository(Google_Service_CloudFunctions_SourceRepository $sourceRepository)
  {
    $this->sourceRepository = $sourceRepository;
  }
  /**
   * @return Google_Service_CloudFunctions_SourceRepository
   */
  public function getSourceRepository()
  {
    return $this->sourceRepository;
  }
  public function setSourceUploadUrl($sourceUploadUrl)
  {
    $this->sourceUploadUrl = $sourceUploadUrl;
  }
  public function getSourceUploadUrl()
  {
    return $this->sourceUploadUrl;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  public function getTimeout()
  {
    return $this->timeout;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setVersionId($versionId)
  {
    $this->versionId = $versionId;
  }
  public function getVersionId()
  {
    return $this->versionId;
  }
}
