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

class Google_Service_Sheets_AppendValuesResponse extends Google_Model
{
  public $spreadsheetId;
  public $tableRange;
  protected $updatesType = 'Google_Service_Sheets_UpdateValuesResponse';
  protected $updatesDataType = '';

  public function setSpreadsheetId($spreadsheetId)
  {
    $this->spreadsheetId = $spreadsheetId;
  }
  public function getSpreadsheetId()
  {
    return $this->spreadsheetId;
  }
  public function setTableRange($tableRange)
  {
    $this->tableRange = $tableRange;
  }
  public function getTableRange()
  {
    return $this->tableRange;
  }
  /**
   * @param Google_Service_Sheets_UpdateValuesResponse
   */
  public function setUpdates(Google_Service_Sheets_UpdateValuesResponse $updates)
  {
    $this->updates = $updates;
  }
  /**
   * @return Google_Service_Sheets_UpdateValuesResponse
   */
  public function getUpdates()
  {
    return $this->updates;
  }
}
