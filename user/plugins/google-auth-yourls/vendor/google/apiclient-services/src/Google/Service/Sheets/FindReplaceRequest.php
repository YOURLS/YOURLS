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

class Google_Service_Sheets_FindReplaceRequest extends Google_Model
{
  public $allSheets;
  public $find;
  public $includeFormulas;
  public $matchCase;
  public $matchEntireCell;
  protected $rangeType = 'Google_Service_Sheets_GridRange';
  protected $rangeDataType = '';
  public $replacement;
  public $searchByRegex;
  public $sheetId;

  public function setAllSheets($allSheets)
  {
    $this->allSheets = $allSheets;
  }
  public function getAllSheets()
  {
    return $this->allSheets;
  }
  public function setFind($find)
  {
    $this->find = $find;
  }
  public function getFind()
  {
    return $this->find;
  }
  public function setIncludeFormulas($includeFormulas)
  {
    $this->includeFormulas = $includeFormulas;
  }
  public function getIncludeFormulas()
  {
    return $this->includeFormulas;
  }
  public function setMatchCase($matchCase)
  {
    $this->matchCase = $matchCase;
  }
  public function getMatchCase()
  {
    return $this->matchCase;
  }
  public function setMatchEntireCell($matchEntireCell)
  {
    $this->matchEntireCell = $matchEntireCell;
  }
  public function getMatchEntireCell()
  {
    return $this->matchEntireCell;
  }
  /**
   * @param Google_Service_Sheets_GridRange
   */
  public function setRange(Google_Service_Sheets_GridRange $range)
  {
    $this->range = $range;
  }
  /**
   * @return Google_Service_Sheets_GridRange
   */
  public function getRange()
  {
    return $this->range;
  }
  public function setReplacement($replacement)
  {
    $this->replacement = $replacement;
  }
  public function getReplacement()
  {
    return $this->replacement;
  }
  public function setSearchByRegex($searchByRegex)
  {
    $this->searchByRegex = $searchByRegex;
  }
  public function getSearchByRegex()
  {
    return $this->searchByRegex;
  }
  public function setSheetId($sheetId)
  {
    $this->sheetId = $sheetId;
  }
  public function getSheetId()
  {
    return $this->sheetId;
  }
}
