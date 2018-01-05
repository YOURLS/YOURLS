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

class Google_Service_Dfareporting_AccountPermission extends Google_Collection
{
  protected $collection_key = 'accountProfiles';
  public $accountProfiles;
  public $id;
  public $kind;
  public $level;
  public $name;
  public $permissionGroupId;

  public function setAccountProfiles($accountProfiles)
  {
    $this->accountProfiles = $accountProfiles;
  }
  public function getAccountProfiles()
  {
    return $this->accountProfiles;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLevel($level)
  {
    $this->level = $level;
  }
  public function getLevel()
  {
    return $this->level;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPermissionGroupId($permissionGroupId)
  {
    $this->permissionGroupId = $permissionGroupId;
  }
  public function getPermissionGroupId()
  {
    return $this->permissionGroupId;
  }
}
