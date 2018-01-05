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

class Google_Service_Drive_TeamDriveBackgroundImageFile extends Google_Model
{
  public $id;
  public $width;
  public $xCoordinate;
  public $yCoordinate;

  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setWidth($width)
  {
    $this->width = $width;
  }
  public function getWidth()
  {
    return $this->width;
  }
  public function setXCoordinate($xCoordinate)
  {
    $this->xCoordinate = $xCoordinate;
  }
  public function getXCoordinate()
  {
    return $this->xCoordinate;
  }
  public function setYCoordinate($yCoordinate)
  {
    $this->yCoordinate = $yCoordinate;
  }
  public function getYCoordinate()
  {
    return $this->yCoordinate;
  }
}
