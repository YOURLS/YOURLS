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

class Google_Service_Dfareporting_FsCommand extends Google_Model
{
  public $left;
  public $positionOption;
  public $top;
  public $windowHeight;
  public $windowWidth;

  public function setLeft($left)
  {
    $this->left = $left;
  }
  public function getLeft()
  {
    return $this->left;
  }
  public function setPositionOption($positionOption)
  {
    $this->positionOption = $positionOption;
  }
  public function getPositionOption()
  {
    return $this->positionOption;
  }
  public function setTop($top)
  {
    $this->top = $top;
  }
  public function getTop()
  {
    return $this->top;
  }
  public function setWindowHeight($windowHeight)
  {
    $this->windowHeight = $windowHeight;
  }
  public function getWindowHeight()
  {
    return $this->windowHeight;
  }
  public function setWindowWidth($windowWidth)
  {
    $this->windowWidth = $windowWidth;
  }
  public function getWindowWidth()
  {
    return $this->windowWidth;
  }
}
