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

class Google_Service_SQLAdmin_DemoteMasterContext extends Google_Model
{
  public $kind;
  public $masterInstanceName;
  protected $replicaConfigurationType = 'Google_Service_SQLAdmin_DemoteMasterConfiguration';
  protected $replicaConfigurationDataType = '';

  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMasterInstanceName($masterInstanceName)
  {
    $this->masterInstanceName = $masterInstanceName;
  }
  public function getMasterInstanceName()
  {
    return $this->masterInstanceName;
  }
  /**
   * @param Google_Service_SQLAdmin_DemoteMasterConfiguration
   */
  public function setReplicaConfiguration(Google_Service_SQLAdmin_DemoteMasterConfiguration $replicaConfiguration)
  {
    $this->replicaConfiguration = $replicaConfiguration;
  }
  /**
   * @return Google_Service_SQLAdmin_DemoteMasterConfiguration
   */
  public function getReplicaConfiguration()
  {
    return $this->replicaConfiguration;
  }
}
