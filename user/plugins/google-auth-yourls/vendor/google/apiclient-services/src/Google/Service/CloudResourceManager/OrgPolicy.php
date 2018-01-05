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

class Google_Service_CloudResourceManager_OrgPolicy extends Google_Model
{
  protected $booleanPolicyType = 'Google_Service_CloudResourceManager_BooleanPolicy';
  protected $booleanPolicyDataType = '';
  public $constraint;
  public $etag;
  protected $listPolicyType = 'Google_Service_CloudResourceManager_ListPolicy';
  protected $listPolicyDataType = '';
  protected $restoreDefaultType = 'Google_Service_CloudResourceManager_RestoreDefault';
  protected $restoreDefaultDataType = '';
  public $updateTime;
  public $version;

  /**
   * @param Google_Service_CloudResourceManager_BooleanPolicy
   */
  public function setBooleanPolicy(Google_Service_CloudResourceManager_BooleanPolicy $booleanPolicy)
  {
    $this->booleanPolicy = $booleanPolicy;
  }
  /**
   * @return Google_Service_CloudResourceManager_BooleanPolicy
   */
  public function getBooleanPolicy()
  {
    return $this->booleanPolicy;
  }
  public function setConstraint($constraint)
  {
    $this->constraint = $constraint;
  }
  public function getConstraint()
  {
    return $this->constraint;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param Google_Service_CloudResourceManager_ListPolicy
   */
  public function setListPolicy(Google_Service_CloudResourceManager_ListPolicy $listPolicy)
  {
    $this->listPolicy = $listPolicy;
  }
  /**
   * @return Google_Service_CloudResourceManager_ListPolicy
   */
  public function getListPolicy()
  {
    return $this->listPolicy;
  }
  /**
   * @param Google_Service_CloudResourceManager_RestoreDefault
   */
  public function setRestoreDefault(Google_Service_CloudResourceManager_RestoreDefault $restoreDefault)
  {
    $this->restoreDefault = $restoreDefault;
  }
  /**
   * @return Google_Service_CloudResourceManager_RestoreDefault
   */
  public function getRestoreDefault()
  {
    return $this->restoreDefault;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
