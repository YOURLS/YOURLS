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

class Google_Service_Manager_Deployment extends Google_Collection
{
  protected $collection_key = 'overrides';
  public $creationDate;
  public $description;
  protected $modulesType = 'Google_Service_Manager_ModuleStatus';
  protected $modulesDataType = 'map';
  public $name;
  protected $overridesType = 'Google_Service_Manager_ParamOverride';
  protected $overridesDataType = 'array';
  protected $stateType = 'Google_Service_Manager_DeployState';
  protected $stateDataType = '';
  public $templateName;

  public function setCreationDate($creationDate)
  {
    $this->creationDate = $creationDate;
  }
  public function getCreationDate()
  {
    return $this->creationDate;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setModules($modules)
  {
    $this->modules = $modules;
  }
  public function getModules()
  {
    return $this->modules;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOverrides($overrides)
  {
    $this->overrides = $overrides;
  }
  public function getOverrides()
  {
    return $this->overrides;
  }
  public function setState(Google_Service_Manager_DeployState $state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTemplateName($templateName)
  {
    $this->templateName = $templateName;
  }
  public function getTemplateName()
  {
    return $this->templateName;
  }
}
