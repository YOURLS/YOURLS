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

class Google_Service_Sheets_TextFormat extends Google_Model
{
  public $bold;
  public $fontFamily;
  public $fontSize;
  protected $foregroundColorType = 'Google_Service_Sheets_Color';
  protected $foregroundColorDataType = '';
  public $italic;
  public $strikethrough;
  public $underline;

  public function setBold($bold)
  {
    $this->bold = $bold;
  }
  public function getBold()
  {
    return $this->bold;
  }
  public function setFontFamily($fontFamily)
  {
    $this->fontFamily = $fontFamily;
  }
  public function getFontFamily()
  {
    return $this->fontFamily;
  }
  public function setFontSize($fontSize)
  {
    $this->fontSize = $fontSize;
  }
  public function getFontSize()
  {
    return $this->fontSize;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setForegroundColor(Google_Service_Sheets_Color $foregroundColor)
  {
    $this->foregroundColor = $foregroundColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getForegroundColor()
  {
    return $this->foregroundColor;
  }
  public function setItalic($italic)
  {
    $this->italic = $italic;
  }
  public function getItalic()
  {
    return $this->italic;
  }
  public function setStrikethrough($strikethrough)
  {
    $this->strikethrough = $strikethrough;
  }
  public function getStrikethrough()
  {
    return $this->strikethrough;
  }
  public function setUnderline($underline)
  {
    $this->underline = $underline;
  }
  public function getUnderline()
  {
    return $this->underline;
  }
}
