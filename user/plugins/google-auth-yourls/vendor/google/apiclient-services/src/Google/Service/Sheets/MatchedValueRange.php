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

class Google_Service_Sheets_MatchedValueRange extends Google_Collection
{
  protected $collection_key = 'dataFilters';
  protected $dataFiltersType = 'Google_Service_Sheets_DataFilter';
  protected $dataFiltersDataType = 'array';
  protected $valueRangeType = 'Google_Service_Sheets_ValueRange';
  protected $valueRangeDataType = '';

  /**
   * @param Google_Service_Sheets_DataFilter
   */
  public function setDataFilters($dataFilters)
  {
    $this->dataFilters = $dataFilters;
  }
  /**
   * @return Google_Service_Sheets_DataFilter
   */
  public function getDataFilters()
  {
    return $this->dataFilters;
  }
  /**
   * @param Google_Service_Sheets_ValueRange
   */
  public function setValueRange(Google_Service_Sheets_ValueRange $valueRange)
  {
    $this->valueRange = $valueRange;
  }
  /**
   * @return Google_Service_Sheets_ValueRange
   */
  public function getValueRange()
  {
    return $this->valueRange;
  }
}
