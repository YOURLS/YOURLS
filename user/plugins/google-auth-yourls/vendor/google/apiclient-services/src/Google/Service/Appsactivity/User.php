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

class Google_Service_Appsactivity_User extends Google_Model
{
  public $isDeleted;
  public $isMe;
  public $name;
  public $permissionId;
  protected $photoType = 'Google_Service_Appsactivity_Photo';
  protected $photoDataType = '';

  public function setIsDeleted($isDeleted)
  {
    $this->isDeleted = $isDeleted;
  }
  public function getIsDeleted()
  {
    return $this->isDeleted;
  }
  public function setIsMe($isMe)
  {
    $this->isMe = $isMe;
  }
  public function getIsMe()
  {
    return $this->isMe;
  }
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
  /**
   * @param Google_Service_Appsactivity_Photo
   */
  public function setPhoto(Google_Service_Appsactivity_Photo $photo)
  {
    $this->photo = $photo;
  }
  /**
   * @return Google_Service_Appsactivity_Photo
   */
  public function getPhoto()
  {
    return $this->photo;
  }
}
