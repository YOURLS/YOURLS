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

class Google_Service_Games_Snapshot extends Google_Model
{
  protected $coverImageType = 'Google_Service_Games_SnapshotImage';
  protected $coverImageDataType = '';
  public $description;
  public $driveId;
  public $durationMillis;
  public $id;
  public $kind;
  public $lastModifiedMillis;
  public $progressValue;
  public $title;
  public $type;
  public $uniqueName;

  /**
   * @param Google_Service_Games_SnapshotImage
   */
  public function setCoverImage(Google_Service_Games_SnapshotImage $coverImage)
  {
    $this->coverImage = $coverImage;
  }
  /**
   * @return Google_Service_Games_SnapshotImage
   */
  public function getCoverImage()
  {
    return $this->coverImage;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDriveId($driveId)
  {
    $this->driveId = $driveId;
  }
  public function getDriveId()
  {
    return $this->driveId;
  }
  public function setDurationMillis($durationMillis)
  {
    $this->durationMillis = $durationMillis;
  }
  public function getDurationMillis()
  {
    return $this->durationMillis;
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
  public function setLastModifiedMillis($lastModifiedMillis)
  {
    $this->lastModifiedMillis = $lastModifiedMillis;
  }
  public function getLastModifiedMillis()
  {
    return $this->lastModifiedMillis;
  }
  public function setProgressValue($progressValue)
  {
    $this->progressValue = $progressValue;
  }
  public function getProgressValue()
  {
    return $this->progressValue;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUniqueName($uniqueName)
  {
    $this->uniqueName = $uniqueName;
  }
  public function getUniqueName()
  {
    return $this->uniqueName;
  }
}
