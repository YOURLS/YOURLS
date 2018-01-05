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

class Google_Service_Slides_ParagraphMarker extends Google_Model
{
  protected $bulletType = 'Google_Service_Slides_Bullet';
  protected $bulletDataType = '';
  protected $styleType = 'Google_Service_Slides_ParagraphStyle';
  protected $styleDataType = '';

  /**
   * @param Google_Service_Slides_Bullet
   */
  public function setBullet(Google_Service_Slides_Bullet $bullet)
  {
    $this->bullet = $bullet;
  }
  /**
   * @return Google_Service_Slides_Bullet
   */
  public function getBullet()
  {
    return $this->bullet;
  }
  /**
   * @param Google_Service_Slides_ParagraphStyle
   */
  public function setStyle(Google_Service_Slides_ParagraphStyle $style)
  {
    $this->style = $style;
  }
  /**
   * @return Google_Service_Slides_ParagraphStyle
   */
  public function getStyle()
  {
    return $this->style;
  }
}
