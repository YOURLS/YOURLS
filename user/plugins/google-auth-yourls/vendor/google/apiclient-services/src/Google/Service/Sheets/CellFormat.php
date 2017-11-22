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

class Google_Service_Sheets_CellFormat extends Google_Model
{
  protected $backgroundColorType = 'Google_Service_Sheets_Color';
  protected $backgroundColorDataType = '';
  protected $bordersType = 'Google_Service_Sheets_Borders';
  protected $bordersDataType = '';
  public $horizontalAlignment;
  public $hyperlinkDisplayType;
  protected $numberFormatType = 'Google_Service_Sheets_NumberFormat';
  protected $numberFormatDataType = '';
  protected $paddingType = 'Google_Service_Sheets_Padding';
  protected $paddingDataType = '';
  public $textDirection;
  protected $textFormatType = 'Google_Service_Sheets_TextFormat';
  protected $textFormatDataType = '';
  protected $textRotationType = 'Google_Service_Sheets_TextRotation';
  protected $textRotationDataType = '';
  public $verticalAlignment;
  public $wrapStrategy;

  /**
   * @param Google_Service_Sheets_Color
   */
  public function setBackgroundColor(Google_Service_Sheets_Color $backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  /**
   * @param Google_Service_Sheets_Borders
   */
  public function setBorders(Google_Service_Sheets_Borders $borders)
  {
    $this->borders = $borders;
  }
  /**
   * @return Google_Service_Sheets_Borders
   */
  public function getBorders()
  {
    return $this->borders;
  }
  public function setHorizontalAlignment($horizontalAlignment)
  {
    $this->horizontalAlignment = $horizontalAlignment;
  }
  public function getHorizontalAlignment()
  {
    return $this->horizontalAlignment;
  }
  public function setHyperlinkDisplayType($hyperlinkDisplayType)
  {
    $this->hyperlinkDisplayType = $hyperlinkDisplayType;
  }
  public function getHyperlinkDisplayType()
  {
    return $this->hyperlinkDisplayType;
  }
  /**
   * @param Google_Service_Sheets_NumberFormat
   */
  public function setNumberFormat(Google_Service_Sheets_NumberFormat $numberFormat)
  {
    $this->numberFormat = $numberFormat;
  }
  /**
   * @return Google_Service_Sheets_NumberFormat
   */
  public function getNumberFormat()
  {
    return $this->numberFormat;
  }
  /**
   * @param Google_Service_Sheets_Padding
   */
  public function setPadding(Google_Service_Sheets_Padding $padding)
  {
    $this->padding = $padding;
  }
  /**
   * @return Google_Service_Sheets_Padding
   */
  public function getPadding()
  {
    return $this->padding;
  }
  public function setTextDirection($textDirection)
  {
    $this->textDirection = $textDirection;
  }
  public function getTextDirection()
  {
    return $this->textDirection;
  }
  /**
   * @param Google_Service_Sheets_TextFormat
   */
  public function setTextFormat(Google_Service_Sheets_TextFormat $textFormat)
  {
    $this->textFormat = $textFormat;
  }
  /**
   * @return Google_Service_Sheets_TextFormat
   */
  public function getTextFormat()
  {
    return $this->textFormat;
  }
  /**
   * @param Google_Service_Sheets_TextRotation
   */
  public function setTextRotation(Google_Service_Sheets_TextRotation $textRotation)
  {
    $this->textRotation = $textRotation;
  }
  /**
   * @return Google_Service_Sheets_TextRotation
   */
  public function getTextRotation()
  {
    return $this->textRotation;
  }
  public function setVerticalAlignment($verticalAlignment)
  {
    $this->verticalAlignment = $verticalAlignment;
  }
  public function getVerticalAlignment()
  {
    return $this->verticalAlignment;
  }
  public function setWrapStrategy($wrapStrategy)
  {
    $this->wrapStrategy = $wrapStrategy;
  }
  public function getWrapStrategy()
  {
    return $this->wrapStrategy;
  }
}
