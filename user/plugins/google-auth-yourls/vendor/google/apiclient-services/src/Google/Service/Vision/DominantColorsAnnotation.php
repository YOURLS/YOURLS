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

class Google_Service_Vision_DominantColorsAnnotation extends Google_Collection
{
  protected $collection_key = 'colors';
  protected $colorsType = 'Google_Service_Vision_ColorInfo';
  protected $colorsDataType = 'array';

  /**
   * @param Google_Service_Vision_ColorInfo
   */
  public function setColors($colors)
  {
    $this->colors = $colors;
  }
  /**
   * @return Google_Service_Vision_ColorInfo
   */
  public function getColors()
  {
    return $this->colors;
  }
}
