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

class Google_Service_Drive_Revision extends Google_Model
{
  public $id;
  public $keepForever;
  public $kind;
  protected $lastModifyingUserType = 'Google_Service_Drive_User';
  protected $lastModifyingUserDataType = '';
  public $md5Checksum;
  public $mimeType;
  public $modifiedTime;
  public $originalFilename;
  public $publishAuto;
  public $published;
  public $publishedOutsideDomain;
  public $size;

  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKeepForever($keepForever)
  {
    $this->keepForever = $keepForever;
  }
  public function getKeepForever()
  {
    return $this->keepForever;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Drive_User
   */
  public function setLastModifyingUser(Google_Service_Drive_User $lastModifyingUser)
  {
    $this->lastModifyingUser = $lastModifyingUser;
  }
  /**
   * @return Google_Service_Drive_User
   */
  public function getLastModifyingUser()
  {
    return $this->lastModifyingUser;
  }
  public function setMd5Checksum($md5Checksum)
  {
    $this->md5Checksum = $md5Checksum;
  }
  public function getMd5Checksum()
  {
    return $this->md5Checksum;
  }
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  public function getMimeType()
  {
    return $this->mimeType;
  }
  public function setModifiedTime($modifiedTime)
  {
    $this->modifiedTime = $modifiedTime;
  }
  public function getModifiedTime()
  {
    return $this->modifiedTime;
  }
  public function setOriginalFilename($originalFilename)
  {
    $this->originalFilename = $originalFilename;
  }
  public function getOriginalFilename()
  {
    return $this->originalFilename;
  }
  public function setPublishAuto($publishAuto)
  {
    $this->publishAuto = $publishAuto;
  }
  public function getPublishAuto()
  {
    return $this->publishAuto;
  }
  public function setPublished($published)
  {
    $this->published = $published;
  }
  public function getPublished()
  {
    return $this->published;
  }
  public function setPublishedOutsideDomain($publishedOutsideDomain)
  {
    $this->publishedOutsideDomain = $publishedOutsideDomain;
  }
  public function getPublishedOutsideDomain()
  {
    return $this->publishedOutsideDomain;
  }
  public function setSize($size)
  {
    $this->size = $size;
  }
  public function getSize()
  {
    return $this->size;
  }
}
