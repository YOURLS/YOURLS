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

class Google_Service_Sheets_SheetProperties extends Google_Model
{
  protected $gridPropertiesType = 'Google_Service_Sheets_GridProperties';
  protected $gridPropertiesDataType = '';
  public $hidden;
  public $index;
  public $rightToLeft;
  public $sheetId;
  public $sheetType;
  protected $tabColorType = 'Google_Service_Sheets_Color';
  protected $tabColorDataType = '';
  public $title;

  /**
   * @param Google_Service_Sheets_GridProperties
   */
  public function setGridProperties(Google_Service_Sheets_GridProperties $gridProperties)
  {
    $this->gridProperties = $gridProperties;
  }
  /**
   * @return Google_Service_Sheets_GridProperties
   */
  public function getGridProperties()
  {
    return $this->gridProperties;
  }
  public function setHidden($hidden)
  {
    $this->hidden = $hidden;
  }
  public function getHidden()
  {
    return $this->hidden;
  }
  public function setIndex($index)
  {
    $this->index = $index;
  }
  public function getIndex()
  {
    return $this->index;
  }
  public function setRightToLeft($rightToLeft)
  {
    $this->rightToLeft = $rightToLeft;
  }
  public function getRightToLeft()
  {
    return $this->rightToLeft;
  }
  public function setSheetId($sheetId)
  {
    $this->sheetId = $sheetId;
  }
  public function getSheetId()
  {
    return $this->sheetId;
  }
  public function setSheetType($sheetType)
  {
    $this->sheetType = $sheetType;
  }
  public function getSheetType()
  {
    return $this->sheetType;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setTabColor(Google_Service_Sheets_Color $tabColor)
  {
    $this->tabColor = $tabColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getTabColor()
  {
    return $this->tabColor;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
