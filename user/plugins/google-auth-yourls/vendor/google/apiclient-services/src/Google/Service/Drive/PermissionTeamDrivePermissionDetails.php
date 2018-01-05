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

class Google_Service_Drive_PermissionTeamDrivePermissionDetails extends Google_Model
{
  public $inherited;
  public $inheritedFrom;
  public $role;
  public $teamDrivePermissionType;

  public function setInherited($inherited)
  {
    $this->inherited = $inherited;
  }
  public function getInherited()
  {
    return $this->inherited;
  }
  public function setInheritedFrom($inheritedFrom)
  {
    $this->inheritedFrom = $inheritedFrom;
  }
  public function getInheritedFrom()
  {
    return $this->inheritedFrom;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
  public function setTeamDrivePermissionType($teamDrivePermissionType)
  {
    $this->teamDrivePermissionType = $teamDrivePermissionType;
  }
  public function getTeamDrivePermissionType()
  {
    return $this->teamDrivePermissionType;
  }
}
