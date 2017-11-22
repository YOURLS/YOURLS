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

class Google_Service_Slides_PageProperties extends Google_Model
{
  protected $colorSchemeType = 'Google_Service_Slides_ColorScheme';
  protected $colorSchemeDataType = '';
  protected $pageBackgroundFillType = 'Google_Service_Slides_PageBackgroundFill';
  protected $pageBackgroundFillDataType = '';

  /**
   * @param Google_Service_Slides_ColorScheme
   */
  public function setColorScheme(Google_Service_Slides_ColorScheme $colorScheme)
  {
    $this->colorScheme = $colorScheme;
  }
  /**
   * @return Google_Service_Slides_ColorScheme
   */
  public function getColorScheme()
  {
    return $this->colorScheme;
  }
  /**
   * @param Google_Service_Slides_PageBackgroundFill
   */
  public function setPageBackgroundFill(Google_Service_Slides_PageBackgroundFill $pageBackgroundFill)
  {
    $this->pageBackgroundFill = $pageBackgroundFill;
  }
  /**
   * @return Google_Service_Slides_PageBackgroundFill
   */
  public function getPageBackgroundFill()
  {
    return $this->pageBackgroundFill;
  }
}
