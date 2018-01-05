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

class Google_Service_Sheets_DataFilter extends Google_Model
{
  public $a1Range;
  protected $developerMetadataLookupType = 'Google_Service_Sheets_DeveloperMetadataLookup';
  protected $developerMetadataLookupDataType = '';
  protected $gridRangeType = 'Google_Service_Sheets_GridRange';
  protected $gridRangeDataType = '';

  public function setA1Range($a1Range)
  {
    $this->a1Range = $a1Range;
  }
  public function getA1Range()
  {
    return $this->a1Range;
  }
  /**
   * @param Google_Service_Sheets_DeveloperMetadataLookup
   */
  public function setDeveloperMetadataLookup(Google_Service_Sheets_DeveloperMetadataLookup $developerMetadataLookup)
  {
    $this->developerMetadataLookup = $developerMetadataLookup;
  }
  /**
   * @return Google_Service_Sheets_DeveloperMetadataLookup
   */
  public function getDeveloperMetadataLookup()
  {
    return $this->developerMetadataLookup;
  }
  /**
   * @param Google_Service_Sheets_GridRange
   */
  public function setGridRange(Google_Service_Sheets_GridRange $gridRange)
  {
    $this->gridRange = $gridRange;
  }
  /**
   * @return Google_Service_Sheets_GridRange
   */
  public function getGridRange()
  {
    return $this->gridRange;
  }
}
