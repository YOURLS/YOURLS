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

class Google_Service_Devprojects_RobotCreationParameters extends Google_Collection
{
  protected $collection_key = 'authRedirectUri';
  public $authClientType;
  public $authRedirectUri;
  public $friendlyName;
  public $kind;
  public $loasRoleForContainerOwnedRobot;
  public $robotConfigName;
  public $robotEnvironment;
  public $robotType;
  public $teamRole;

  public function setAuthClientType($authClientType)
  {
    $this->authClientType = $authClientType;
  }
  public function getAuthClientType()
  {
    return $this->authClientType;
  }
  public function setAuthRedirectUri($authRedirectUri)
  {
    $this->authRedirectUri = $authRedirectUri;
  }
  public function getAuthRedirectUri()
  {
    return $this->authRedirectUri;
  }
  public function setFriendlyName($friendlyName)
  {
    $this->friendlyName = $friendlyName;
  }
  public function getFriendlyName()
  {
    return $this->friendlyName;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLoasRoleForContainerOwnedRobot($loasRoleForContainerOwnedRobot)
  {
    $this->loasRoleForContainerOwnedRobot = $loasRoleForContainerOwnedRobot;
  }
  public function getLoasRoleForContainerOwnedRobot()
  {
    return $this->loasRoleForContainerOwnedRobot;
  }
  public function setRobotConfigName($robotConfigName)
  {
    $this->robotConfigName = $robotConfigName;
  }
  public function getRobotConfigName()
  {
    return $this->robotConfigName;
  }
  public function setRobotEnvironment($robotEnvironment)
  {
    $this->robotEnvironment = $robotEnvironment;
  }
  public function getRobotEnvironment()
  {
    return $this->robotEnvironment;
  }
  public function setRobotType($robotType)
  {
    $this->robotType = $robotType;
  }
  public function getRobotType()
  {
    return $this->robotType;
  }
  public function setTeamRole($teamRole)
  {
    $this->teamRole = $teamRole;
  }
  public function getTeamRole()
  {
    return $this->teamRole;
  }
}
