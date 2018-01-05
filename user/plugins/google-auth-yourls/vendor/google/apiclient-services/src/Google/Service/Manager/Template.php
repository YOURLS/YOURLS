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

class Google_Service_Manager_Template extends Google_Model
{
  protected $actionsType = 'Google_Service_Manager_Action';
  protected $actionsDataType = 'map';
  public $description;
  protected $modulesType = 'Google_Service_Manager_Module';
  protected $modulesDataType = 'map';
  public $name;

  public function setActions($actions)
  {
    $this->actions = $actions;
  }
  public function getActions()
  {
    return $this->actions;
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
}
