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

class Google_Service_Sheets_BasicChartAxis extends Google_Model
{
  protected $formatType = 'Google_Service_Sheets_TextFormat';
  protected $formatDataType = '';
  public $position;
  public $title;
  protected $titleTextPositionType = 'Google_Service_Sheets_TextPosition';
  protected $titleTextPositionDataType = '';

  /**
   * @param Google_Service_Sheets_TextFormat
   */
  public function setFormat(Google_Service_Sheets_TextFormat $format)
  {
    $this->format = $format;
  }
  /**
   * @return Google_Service_Sheets_TextFormat
   */
  public function getFormat()
  {
    return $this->format;
  }
  public function setPosition($position)
  {
    $this->position = $position;
  }
  public function getPosition()
  {
    return $this->position;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param Google_Service_Sheets_TextPosition
   */
  public function setTitleTextPosition(Google_Service_Sheets_TextPosition $titleTextPosition)
  {
    $this->titleTextPosition = $titleTextPosition;
  }
  /**
   * @return Google_Service_Sheets_TextPosition
   */
  public function getTitleTextPosition()
  {
    return $this->titleTextPosition;
  }
}
