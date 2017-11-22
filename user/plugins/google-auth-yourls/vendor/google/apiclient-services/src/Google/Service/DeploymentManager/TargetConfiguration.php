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

class Google_Service_DeploymentManager_TargetConfiguration extends Google_Collection
{
  protected $collection_key = 'imports';
  protected $configType = 'Google_Service_DeploymentManager_ConfigFile';
  protected $configDataType = '';
  protected $importsType = 'Google_Service_DeploymentManager_ImportFile';
  protected $importsDataType = 'array';

  /**
   * @param Google_Service_DeploymentManager_ConfigFile
   */
  public function setConfig(Google_Service_DeploymentManager_ConfigFile $config)
  {
    $this->config = $config;
  }
  /**
   * @return Google_Service_DeploymentManager_ConfigFile
   */
  public function getConfig()
  {
    return $this->config;
  }
  /**
   * @param Google_Service_DeploymentManager_ImportFile
   */
  public function setImports($imports)
  {
    $this->imports = $imports;
  }
  /**
   * @return Google_Service_DeploymentManager_ImportFile
   */
  public function getImports()
  {
    return $this->imports;
  }
}
