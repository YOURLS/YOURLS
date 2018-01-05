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

class Google_Service_Drive_AboutTeamDriveThemes extends Google_Model
{
  public $backgroundImageLink;
  public $colorRgb;
  public $id;

  public function setBackgroundImageLink($backgroundImageLink)
  {
    $this->backgroundImageLink = $backgroundImageLink;
  }
  public function getBackgroundImageLink()
  {
    return $this->backgroundImageLink;
  }
  public function setColorRgb($colorRgb)
  {
    $this->colorRgb = $colorRgb;
  }
  public function getColorRgb()
  {
    return $this->colorRgb;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
}
