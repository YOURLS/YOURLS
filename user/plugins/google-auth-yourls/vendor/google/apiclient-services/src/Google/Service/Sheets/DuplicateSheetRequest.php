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

class Google_Service_Sheets_DuplicateSheetRequest extends Google_Model
{
  public $insertSheetIndex;
  public $newSheetId;
  public $newSheetName;
  public $sourceSheetId;

  public function setInsertSheetIndex($insertSheetIndex)
  {
    $this->insertSheetIndex = $insertSheetIndex;
  }
  public function getInsertSheetIndex()
  {
    return $this->insertSheetIndex;
  }
  public function setNewSheetId($newSheetId)
  {
    $this->newSheetId = $newSheetId;
  }
  public function getNewSheetId()
  {
    return $this->newSheetId;
  }
  public function setNewSheetName($newSheetName)
  {
    $this->newSheetName = $newSheetName;
  }
  public function getNewSheetName()
  {
    return $this->newSheetName;
  }
  public function setSourceSheetId($sourceSheetId)
  {
    $this->sourceSheetId = $sourceSheetId;
  }
  public function getSourceSheetId()
  {
    return $this->sourceSheetId;
  }
}
