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

class Google_Service_Sheets_SpreadsheetProperties extends Google_Model
{
  public $autoRecalc;
  protected $defaultFormatType = 'Google_Service_Sheets_CellFormat';
  protected $defaultFormatDataType = '';
  protected $iterativeCalculationSettingsType = 'Google_Service_Sheets_IterativeCalculationSettings';
  protected $iterativeCalculationSettingsDataType = '';
  public $locale;
  public $timeZone;
  public $title;

  public function setAutoRecalc($autoRecalc)
  {
    $this->autoRecalc = $autoRecalc;
  }
  public function getAutoRecalc()
  {
    return $this->autoRecalc;
  }
  /**
   * @param Google_Service_Sheets_CellFormat
   */
  public function setDefaultFormat(Google_Service_Sheets_CellFormat $defaultFormat)
  {
    $this->defaultFormat = $defaultFormat;
  }
  /**
   * @return Google_Service_Sheets_CellFormat
   */
  public function getDefaultFormat()
  {
    return $this->defaultFormat;
  }
  /**
   * @param Google_Service_Sheets_IterativeCalculationSettings
   */
  public function setIterativeCalculationSettings(Google_Service_Sheets_IterativeCalculationSettings $iterativeCalculationSettings)
  {
    $this->iterativeCalculationSettings = $iterativeCalculationSettings;
  }
  /**
   * @return Google_Service_Sheets_IterativeCalculationSettings
   */
  public function getIterativeCalculationSettings()
  {
    return $this->iterativeCalculationSettings;
  }
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  public function getLocale()
  {
    return $this->locale;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
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
