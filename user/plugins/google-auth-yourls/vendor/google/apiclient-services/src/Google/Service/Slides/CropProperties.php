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

class Google_Service_Slides_CropProperties extends Google_Model
{
  public $angle;
  public $bottomOffset;
  public $leftOffset;
  public $rightOffset;
  public $topOffset;

  public function setAngle($angle)
  {
    $this->angle = $angle;
  }
  public function getAngle()
  {
    return $this->angle;
  }
  public function setBottomOffset($bottomOffset)
  {
    $this->bottomOffset = $bottomOffset;
  }
  public function getBottomOffset()
  {
    return $this->bottomOffset;
  }
  public function setLeftOffset($leftOffset)
  {
    $this->leftOffset = $leftOffset;
  }
  public function getLeftOffset()
  {
    return $this->leftOffset;
  }
  public function setRightOffset($rightOffset)
  {
    $this->rightOffset = $rightOffset;
  }
  public function getRightOffset()
  {
    return $this->rightOffset;
  }
  public function setTopOffset($topOffset)
  {
    $this->topOffset = $topOffset;
  }
  public function getTopOffset()
  {
    return $this->topOffset;
  }
}
