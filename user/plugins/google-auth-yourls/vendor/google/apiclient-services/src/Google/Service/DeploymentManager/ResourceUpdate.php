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

class Google_Service_DeploymentManager_ResourceUpdate extends Google_Collection
{
  protected $collection_key = 'warnings';
  protected $accessControlType = 'Google_Service_DeploymentManager_ResourceAccessControl';
  protected $accessControlDataType = '';
  protected $errorType = 'Google_Service_DeploymentManager_ResourceUpdateError';
  protected $errorDataType = '';
  public $finalProperties;
  public $intent;
  public $manifest;
  public $properties;
  public $state;
  protected $warningsType = 'Google_Service_DeploymentManager_ResourceUpdateWarnings';
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
  /**
   * @param Google_Service_DeploymentManager_ResourceUpdateError
   */
  public function setError(Google_Service_DeploymentManager_ResourceUpdateError $error)
  {
    $this->error = $error;
  }
  /**
   * @return Google_Service_DeploymentManager_ResourceUpdateError
   */
  public function getError()
  {
    return $this->error;
  }
  public function setFinalProperties($finalProperties)
  {
    $this->finalProperties = $finalProperties;
  }
  public function getFinalProperties()
  {
    return $this->finalProperties;
  }
  public function setIntent($intent)
  {
    $this->intent = $intent;
  }
  public function getIntent()
  {
    return $this->intent;
  }
  public function setManifest($manifest)
  {
    $this->manifest = $manifest;
  }
  public function getManifest()
  {
    return $this->manifest;
  }
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  public function getProperties()
  {
    return $this->properties;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param Google_Service_DeploymentManager_ResourceUpdateWarnings
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return Google_Service_DeploymentManager_ResourceUpdateWarnings
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}
