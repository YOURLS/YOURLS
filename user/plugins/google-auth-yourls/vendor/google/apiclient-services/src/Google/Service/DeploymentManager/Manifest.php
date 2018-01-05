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

class Google_Service_DeploymentManager_Manifest extends Google_Collection
{
  protected $collection_key = 'imports';
  protected $configType = 'Google_Service_DeploymentManager_ConfigFile';
  protected $configDataType = '';
  public $expandedConfig;
  public $id;
  protected $importsType = 'Google_Service_DeploymentManager_ImportFile';
  protected $importsDataType = 'array';
  public $insertTime;
  public $layout;
  public $name;
  public $selfLink;

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
  public function setExpandedConfig($expandedConfig)
  {
    $this->expandedConfig = $expandedConfig;
  }
  public function getExpandedConfig()
  {
    return $this->expandedConfig;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
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
  public function setInsertTime($insertTime)
  {
    $this->insertTime = $insertTime;
  }
  public function getInsertTime()
  {
    return $this->insertTime;
  }
  public function setLayout($layout)
  {
    $this->layout = $layout;
  }
  public function getLayout()
  {
    return $this->layout;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
}
