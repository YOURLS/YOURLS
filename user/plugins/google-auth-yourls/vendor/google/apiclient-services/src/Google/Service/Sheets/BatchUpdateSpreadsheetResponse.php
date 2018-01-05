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

class Google_Service_Sheets_BatchUpdateSpreadsheetResponse extends Google_Collection
{
  protected $collection_key = 'replies';
  protected $repliesType = 'Google_Service_Sheets_Response';
  protected $repliesDataType = 'array';
  public $spreadsheetId;
  protected $updatedSpreadsheetType = 'Google_Service_Sheets_Spreadsheet';
  protected $updatedSpreadsheetDataType = '';

  /**
   * @param Google_Service_Sheets_Response
   */
  public function setReplies($replies)
  {
    $this->replies = $replies;
  }
  /**
   * @return Google_Service_Sheets_Response
   */
  public function getReplies()
  {
    return $this->replies;
  }
  public function setSpreadsheetId($spreadsheetId)
  {
    $this->spreadsheetId = $spreadsheetId;
  }
  public function getSpreadsheetId()
  {
    return $this->spreadsheetId;
  }
  /**
   * @param Google_Service_Sheets_Spreadsheet
   */
  public function setUpdatedSpreadsheet(Google_Service_Sheets_Spreadsheet $updatedSpreadsheet)
  {
    $this->updatedSpreadsheet = $updatedSpreadsheet;
  }
  /**
   * @return Google_Service_Sheets_Spreadsheet
   */
  public function getUpdatedSpreadsheet()
  {
    return $this->updatedSpreadsheet;
  }
}
