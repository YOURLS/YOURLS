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

class Google_Service_Blogger_BlogPerUserInfo extends Google_Model
{
  public $blogId;
  public $hasAdminAccess;
  public $kind;
  public $photosAlbumKey;
  public $role;
  public $userId;

  public function setBlogId($blogId)
  {
    $this->blogId = $blogId;
  }
  public function getBlogId()
  {
    return $this->blogId;
  }
  public function setHasAdminAccess($hasAdminAccess)
  {
    $this->hasAdminAccess = $hasAdminAccess;
  }
  public function getHasAdminAccess()
  {
    return $this->hasAdminAccess;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPhotosAlbumKey($photosAlbumKey)
  {
    $this->photosAlbumKey = $photosAlbumKey;
  }
  public function getPhotosAlbumKey()
  {
    return $this->photosAlbumKey;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
}
