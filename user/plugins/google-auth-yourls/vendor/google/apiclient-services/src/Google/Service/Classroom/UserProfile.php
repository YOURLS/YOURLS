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

class Google_Service_Classroom_UserProfile extends Google_Collection
{
  protected $collection_key = 'permissions';
  public $emailAddress;
  public $id;
  protected $nameType = 'Google_Service_Classroom_Name';
  protected $nameDataType = '';
  protected $permissionsType = 'Google_Service_Classroom_GlobalPermission';
  protected $permissionsDataType = 'array';
  public $photoUrl;
  public $verifiedTeacher;

  public function setEmailAddress($emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }
  public function getEmailAddress()
  {
    return $this->emailAddress;
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
   * @param Google_Service_Classroom_Name
   */
  public function setName(Google_Service_Classroom_Name $name)
  {
    $this->name = $name;
  }
  /**
   * @return Google_Service_Classroom_Name
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Classroom_GlobalPermission
   */
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return Google_Service_Classroom_GlobalPermission
   */
  public function getPermissions()
  {
    return $this->permissions;
  }
  public function setPhotoUrl($photoUrl)
  {
    $this->photoUrl = $photoUrl;
  }
  public function getPhotoUrl()
  {
    return $this->photoUrl;
  }
  public function setVerifiedTeacher($verifiedTeacher)
  {
    $this->verifiedTeacher = $verifiedTeacher;
  }
  public function getVerifiedTeacher()
  {
    return $this->verifiedTeacher;
  }
}
