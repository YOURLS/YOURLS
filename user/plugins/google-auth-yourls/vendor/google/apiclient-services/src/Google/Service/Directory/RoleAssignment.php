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

class Google_Service_Directory_RoleAssignment extends Google_Model
{
  public $assignedTo;
  public $etag;
  public $kind;
  public $orgUnitId;
  public $roleAssignmentId;
  public $roleId;
  public $scopeType;

  public function setAssignedTo($assignedTo)
  {
    $this->assignedTo = $assignedTo;
  }
  public function getAssignedTo()
  {
    return $this->assignedTo;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setOrgUnitId($orgUnitId)
  {
    $this->orgUnitId = $orgUnitId;
  }
  public function getOrgUnitId()
  {
    return $this->orgUnitId;
  }
  public function setRoleAssignmentId($roleAssignmentId)
  {
    $this->roleAssignmentId = $roleAssignmentId;
  }
  public function getRoleAssignmentId()
  {
    return $this->roleAssignmentId;
  }
  public function setRoleId($roleId)
  {
    $this->roleId = $roleId;
  }
  public function getRoleId()
  {
    return $this->roleId;
  }
  public function setScopeType($scopeType)
  {
    $this->scopeType = $scopeType;
  }
  public function getScopeType()
  {
    return $this->scopeType;
  }
}
