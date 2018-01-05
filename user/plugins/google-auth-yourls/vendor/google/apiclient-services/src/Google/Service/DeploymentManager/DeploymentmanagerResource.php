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

class Google_Service_DeploymentManager_DeploymentmanagerResource extends Google_Collection
{
  protected $collection_key = 'warnings';
  protected $accessControlType = 'Google_Service_DeploymentManager_ResourceAccessControl';
  protected $accessControlDataType = '';
  public $finalProperties;
  public $id;
  public $insertTime;
  public $manifest;
  public $name;
  public $properties;
  public $type;
  protected $updateType = 'Google_Service_DeploymentManager_ResourceUpdate';
  protected $updateDataType = '';
  public $updateTime;
  public $url;
  protected $warningsType = 'Google_Service_DeploymentManager_DeploymentmanagerResourceWarnings';
  protected $warningsDataType = 'array';

  /**
   * @param Google_Service_DeploymentManager_ResourceAccessControl
   */
  public function setAccessControl(Google_Service_DeploymentManager_ResourceAccessControl $accessControl)
  {
    $this->accessControl = $accessControl;
  }
  /**
   * @return Google_Service_DeploymentManager_ResourceAccessControl
   */
  public function getAccessControl()
  {
    return $this->accessControl;
  }
  public function setFinalProperties($finalProperties)
  {
    $this->finalProperties = $finalProperties;
  }
  public function getFinalProperties()
  {
    return $this->finalProperties;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInsertTime($insertTime)
  {
    $this->insertTime = $insertTime;
  }
  public function getInsertTime()
  {
    return $this->insertTime;
  }
  public function setManifest($manifest)
  {
    $this->manifest = $manifest;
  }
  public function getManifest()
  {
    return $this->manifest;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  public function getProperties()
  {
    return $this->properties;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param Google_Service_DeploymentManager_ResourceUpdate
   */
  public function setUpdate(Google_Service_DeploymentManager_ResourceUpdate $update)
  {
    $this->update = $update;
  }
  /**
   * @return Google_Service_DeploymentManager_ResourceUpdate
   */
  public function getUpdate()
  {
    return $this->update;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param Google_Service_DeploymentManager_DeploymentmanagerResourceWarnings
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return Google_Service_DeploymentManager_DeploymentmanagerResourceWarnings
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}
