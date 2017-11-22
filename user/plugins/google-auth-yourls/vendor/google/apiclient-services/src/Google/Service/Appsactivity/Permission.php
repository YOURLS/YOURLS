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

class Google_Service_Appsactivity_Permission extends Google_Model
{
  public $name;
  public $permissionId;
  public $role;
  public $type;
  protected $userType = 'Google_Service_Appsactivity_User';
  protected $userDataType = '';
  public $withLink;

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPermissionId($permissionId)
  {
    $this->permissionId = $permissionId;
  }
  public function getPermissionId()
  {
    return $this->permissionId;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param Google_Service_Appsactivity_User
   */
  public function setUser(Google_Service_Appsactivity_User $user)
  {
    $this->user = $user;
  }
  /**
   * @return Google_Service_Appsactivity_User
   */
  public function getUser()
  {
    return $this->user;
  }
  public function setWithLink($withLink)
  {
    $this->withLink = $withLink;
  }
  public function getWithLink()
  {
    return $this->withLink;
  }
}
