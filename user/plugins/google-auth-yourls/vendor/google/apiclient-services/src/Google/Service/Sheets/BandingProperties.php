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

class Google_Service_Sheets_BandingProperties extends Google_Model
{
  protected $firstBandColorType = 'Google_Service_Sheets_Color';
  protected $firstBandColorDataType = '';
  protected $footerColorType = 'Google_Service_Sheets_Color';
  protected $footerColorDataType = '';
  protected $headerColorType = 'Google_Service_Sheets_Color';
  protected $headerColorDataType = '';
  protected $secondBandColorType = 'Google_Service_Sheets_Color';
  protected $secondBandColorDataType = '';

  /**
   * @param Google_Service_Sheets_Color
   */
  public function setFirstBandColor(Google_Service_Sheets_Color $firstBandColor)
  {
    $this->firstBandColor = $firstBandColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getFirstBandColor()
  {
    return $this->firstBandColor;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setFooterColor(Google_Service_Sheets_Color $footerColor)
  {
    $this->footerColor = $footerColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getFooterColor()
  {
    return $this->footerColor;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setHeaderColor(Google_Service_Sheets_Color $headerColor)
  {
    $this->headerColor = $headerColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getHeaderColor()
  {
    return $this->headerColor;
  }
  /**
   * @param Google_Service_Sheets_Color
   */
  public function setSecondBandColor(Google_Service_Sheets_Color $secondBandColor)
  {
    $this->secondBandColor = $secondBandColor;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getSecondBandColor()
  {
    return $this->secondBandColor;
  }
}
