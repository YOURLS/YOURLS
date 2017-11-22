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

class Google_Service_Slides_Size extends Google_Model
{
  protected $heightType = 'Google_Service_Slides_Dimension';
  protected $heightDataType = '';
  protected $widthType = 'Google_Service_Slides_Dimension';
  protected $widthDataType = '';

  /**
   * @param Google_Service_Slides_Dimension
   */
  public function setHeight(Google_Service_Slides_Dimension $height)
  {
    $this->height = $height;
  }
  /**
   * @return Google_Service_Slides_Dimension
   */
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param Google_Service_Slides_Dimension
   */
  public function setWidth(Google_Service_Slides_Dimension $width)
  {
    $this->width = $width;
  }
  /**
   * @return Google_Service_Slides_Dimension
   */
  public function getWidth()
  {
    return $this->width;
  }
}
