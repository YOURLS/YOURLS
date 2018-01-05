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

class Google_Service_Slides_ColorStop extends Google_Model
{
  public $alpha;
  protected $colorType = 'Google_Service_Slides_OpaqueColor';
  protected $colorDataType = '';
  public $position;

  public function setAlpha($alpha)
  {
    $this->alpha = $alpha;
  }
  public function getAlpha()
  {
    return $this->alpha;
  }
  /**
   * @param Google_Service_Slides_OpaqueColor
   */
  public function setColor(Google_Service_Slides_OpaqueColor $color)
  {
    $this->color = $color;
  }
  /**
   * @return Google_Service_Slides_OpaqueColor
   */
  public function getColor()
  {
    return $this->color;
  }
  public function setPosition($position)
  {
    $this->position = $position;
  }
  public function getPosition()
  {
    return $this->position;
  }
}
