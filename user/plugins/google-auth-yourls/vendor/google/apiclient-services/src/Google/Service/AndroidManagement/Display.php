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

class Google_Service_AndroidManagement_Display extends Google_Model
{
  public $density;
  public $displayId;
  public $height;
  public $name;
  public $refreshRate;
  public $state;
  public $width;

  public function setDensity($density)
  {
    $this->density = $density;
  }
  public function getDensity()
  {
    return $this->density;
  }
  public function setDisplayId($displayId)
  {
    $this->displayId = $displayId;
  }
  public function getDisplayId()
  {
    return $this->displayId;
  }
  public function setHeight($height)
  {
    $this->height = $height;
  }
  public function getHeight()
  {
    return $this->height;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRefreshRate($refreshRate)
  {
    $this->refreshRate = $refreshRate;
  }
  public function getRefreshRate()
  {
    return $this->refreshRate;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setWidth($width)
  {
    $this->width = $width;
  }
  public function getWidth()
  {
    return $this->width;
  }
}
