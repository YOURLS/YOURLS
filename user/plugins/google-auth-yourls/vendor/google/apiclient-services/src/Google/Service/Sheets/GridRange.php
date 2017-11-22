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

class Google_Service_Sheets_GridRange extends Google_Model
{
  public $endColumnIndex;
  public $endRowIndex;
  public $sheetId;
  public $startColumnIndex;
  public $startRowIndex;

  public function setEndColumnIndex($endColumnIndex)
  {
    $this->endColumnIndex = $endColumnIndex;
  }
  public function getEndColumnIndex()
  {
    return $this->endColumnIndex;
  }
  public function setEndRowIndex($endRowIndex)
  {
    $this->endRowIndex = $endRowIndex;
  }
  public function getEndRowIndex()
  {
    return $this->endRowIndex;
  }
  public function setSheetId($sheetId)
  {
    $this->sheetId = $sheetId;
  }
  public function getSheetId()
  {
    return $this->sheetId;
  }
  public function setStartColumnIndex($startColumnIndex)
  {
    $this->startColumnIndex = $startColumnIndex;
  }
  public function getStartColumnIndex()
  {
    return $this->startColumnIndex;
  }
  public function setStartRowIndex($startRowIndex)
  {
    $this->startRowIndex = $startRowIndex;
  }
  public function getStartRowIndex()
  {
    return $this->startRowIndex;
  }
}
