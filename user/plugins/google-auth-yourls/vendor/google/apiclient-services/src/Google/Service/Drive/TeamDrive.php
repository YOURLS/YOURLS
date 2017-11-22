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

class Google_Service_Drive_TeamDrive extends Google_Model
{
  protected $backgroundImageFileType = 'Google_Service_Drive_TeamDriveBackgroundImageFile';
  protected $backgroundImageFileDataType = '';
  public $backgroundImageLink;
  protected $capabilitiesType = 'Google_Service_Drive_TeamDriveCapabilities';
  protected $capabilitiesDataType = '';
  public $colorRgb;
  public $createdTime;
  public $id;
  public $kind;
  public $name;
  public $themeId;

  /**
   * @param Google_Service_Drive_TeamDriveBackgroundImageFile
   */
  public function setBackgroundImageFile(Google_Service_Drive_TeamDriveBackgroundImageFile $backgroundImageFile)
  {
    $this->backgroundImageFile = $backgroundImageFile;
  }
  /**
   * @return Google_Service_Drive_TeamDriveBackgroundImageFile
   */
  public function getBackgroundImageFile()
  {
    return $this->backgroundImageFile;
  }
  public function setBackgroundImageLink($backgroundImageLink)
  {
    $this->backgroundImageLink = $backgroundImageLink;
  }
  public function getBackgroundImageLink()
  {
    return $this->backgroundImageLink;
  }
  /**
   * @param Google_Service_Drive_TeamDriveCapabilities
   */
  public function setCapabilities(Google_Service_Drive_TeamDriveCapabilities $capabilities)
  {
    $this->capabilities = $capabilities;
  }
  /**
   * @return Google_Service_Drive_TeamDriveCapabilities
   */
  public function getCapabilities()
  {
    return $this->capabilities;
  }
  public function setColorRgb($colorRgb)
  {
    $this->colorRgb = $colorRgb;
  }
  public function getColorRgb()
  {
    return $this->colorRgb;
  }
  public function setCreatedTime($createdTime)
  {
    $this->createdTime = $createdTime;
  }
  public function getCreatedTime()
  {
    return $this->createdTime;
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setThemeId($themeId)
  {
    $this->themeId = $themeId;
  }
  public function getThemeId()
  {
    return $this->themeId;
  }
}
