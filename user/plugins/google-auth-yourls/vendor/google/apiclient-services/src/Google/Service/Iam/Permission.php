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

class Google_Service_Iam_Permission extends Google_Model
{
  public $customRolesSupportLevel;
  public $description;
  public $name;
  public $onlyInPredefinedRoles;
  public $stage;
  public $title;

  public function setCustomRolesSupportLevel($customRolesSupportLevel)
  {
    $this->customRolesSupportLevel = $customRolesSupportLevel;
  }
  public function getCustomRolesSupportLevel()
  {
    return $this->customRolesSupportLevel;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOnlyInPredefinedRoles($onlyInPredefinedRoles)
  {
    $this->onlyInPredefinedRoles = $onlyInPredefinedRoles;
  }
  public function getOnlyInPredefinedRoles()
  {
    return $this->onlyInPredefinedRoles;
  }
  public function setStage($stage)
  {
    $this->stage = $stage;
  }
  public function getStage()
  {
    return $this->stage;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
