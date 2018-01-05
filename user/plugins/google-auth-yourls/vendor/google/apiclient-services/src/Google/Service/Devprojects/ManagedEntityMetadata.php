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

class Google_Service_Devprojects_ManagedEntityMetadata extends Google_Model
{
  public $adminUrl;
  public $entityId;
  public $kind;
  public $label;
  public $robot;
  protected $robotToCreateType = 'Google_Service_Devprojects_RobotCreationParameters';
  protected $robotToCreateDataType = '';

  public function setAdminUrl($adminUrl)
  {
    $this->adminUrl = $adminUrl;
  }
  public function getAdminUrl()
  {
    return $this->adminUrl;
  }
  public function setEntityId($entityId)
  {
    $this->entityId = $entityId;
  }
  public function getEntityId()
  {
    return $this->entityId;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLabel($label)
  {
    $this->label = $label;
  }
  public function getLabel()
  {
    return $this->label;
  }
  public function setRobot($robot)
  {
    $this->robot = $robot;
  }
  public function getRobot()
  {
    return $this->robot;
  }
  public function setRobotToCreate(Google_Service_Devprojects_RobotCreationParameters $robotToCreate)
  {
    $this->robotToCreate = $robotToCreate;
  }
  public function getRobotToCreate()
  {
    return $this->robotToCreate;
  }
}
