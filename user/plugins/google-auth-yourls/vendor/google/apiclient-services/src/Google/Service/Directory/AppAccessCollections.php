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

class Google_Service_Directory_AppAccessCollections extends Google_Collection
{
  protected $collection_key = 'blockedApiAccessBuckets';
  public $blockedApiAccessBuckets;
  public $enforceSettingsForAndroidDrive;
  public $errorMessage;
  public $etag;
  public $kind;
  public $resourceId;
  public $resourceName;
  public $trustDomainOwnedApps;

  public function setBlockedApiAccessBuckets($blockedApiAccessBuckets)
  {
    $this->blockedApiAccessBuckets = $blockedApiAccessBuckets;
  }
  public function getBlockedApiAccessBuckets()
  {
    return $this->blockedApiAccessBuckets;
  }
  public function setEnforceSettingsForAndroidDrive($enforceSettingsForAndroidDrive)
  {
    $this->enforceSettingsForAndroidDrive = $enforceSettingsForAndroidDrive;
  }
  public function getEnforceSettingsForAndroidDrive()
  {
    return $this->enforceSettingsForAndroidDrive;
  }
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setResourceId($resourceId)
  {
    $this->resourceId = $resourceId;
  }
  public function getResourceId()
  {
    return $this->resourceId;
  }
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  public function getResourceName()
  {
    return $this->resourceName;
  }
  public function setTrustDomainOwnedApps($trustDomainOwnedApps)
  {
    $this->trustDomainOwnedApps = $trustDomainOwnedApps;
  }
  public function getTrustDomainOwnedApps()
  {
    return $this->trustDomainOwnedApps;
  }
}
