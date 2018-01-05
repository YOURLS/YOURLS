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

class Google_Service_DeploymentManager_Policy extends Google_Collection
{
  protected $collection_key = 'rules';
  protected $auditConfigsType = 'Google_Service_DeploymentManager_AuditConfig';
  protected $auditConfigsDataType = 'array';
  protected $bindingsType = 'Google_Service_DeploymentManager_Binding';
  protected $bindingsDataType = 'array';
  public $etag;
  public $iamOwned;
  protected $rulesType = 'Google_Service_DeploymentManager_Rule';
  protected $rulesDataType = 'array';
  public $version;

  /**
   * @param Google_Service_DeploymentManager_AuditConfig
   */
  public function setAuditConfigs($auditConfigs)
  {
    $this->auditConfigs = $auditConfigs;
  }
  /**
   * @return Google_Service_DeploymentManager_AuditConfig
   */
  public function getAuditConfigs()
  {
    return $this->auditConfigs;
  }
  /**
   * @param Google_Service_DeploymentManager_Binding
   */
  public function setBindings($bindings)
  {
    $this->bindings = $bindings;
  }
  /**
   * @return Google_Service_DeploymentManager_Binding
   */
  public function getBindings()
  {
    return $this->bindings;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setIamOwned($iamOwned)
  {
    $this->iamOwned = $iamOwned;
  }
  public function getIamOwned()
  {
    return $this->iamOwned;
  }
  /**
   * @param Google_Service_DeploymentManager_Rule
   */
  public function setRules($rules)
  {
    $this->rules = $rules;
  }
  /**
   * @return Google_Service_DeploymentManager_Rule
   */
  public function getRules()
  {
    return $this->rules;
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
