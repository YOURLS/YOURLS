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

class Google_Service_Sheets_DeveloperMetadataLocation extends Google_Model
{
  protected $dimensionRangeType = 'Google_Service_Sheets_DimensionRange';
  protected $dimensionRangeDataType = '';
  public $locationType;
  public $sheetId;
  public $spreadsheet;

  /**
   * @param Google_Service_Sheets_DimensionRange
   */
  public function setDimensionRange(Google_Service_Sheets_DimensionRange $dimensionRange)
  {
    $this->dimensionRange = $dimensionRange;
  }
  /**
   * @return Google_Service_Sheets_DimensionRange
   */
  public function getDimensionRange()
  {
    return $this->dimensionRange;
  }
  public function setLocationType($locationType)
  {
    $this->locationType = $locationType;
  }
  public function getLocationType()
  {
    return $this->locationType;
  }
  public function setSheetId($sheetId)
  {
    $this->sheetId = $sheetId;
  }
  public function getSheetId()
  {
    return $this->sheetId;
  }
  public function setSpreadsheet($spreadsheet)
  {
    $this->spreadsheet = $spreadsheet;
  }
  public function getSpreadsheet()
  {
    return $this->spreadsheet;
  }
}
