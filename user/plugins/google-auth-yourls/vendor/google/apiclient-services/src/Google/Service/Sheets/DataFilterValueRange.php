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

class Google_Service_Sheets_DataFilterValueRange extends Google_Collection
{
  protected $collection_key = 'values';
  protected $dataFilterType = 'Google_Service_Sheets_DataFilter';
  protected $dataFilterDataType = '';
  public $majorDimension;
  public $values;

  /**
   * @param Google_Service_Sheets_DataFilter
   */
  public function setDataFilter(Google_Service_Sheets_DataFilter $dataFilter)
  {
    $this->dataFilter = $dataFilter;
  }
  /**
   * @return Google_Service_Sheets_DataFilter
   */
  public function getDataFilter()
  {
    return $this->dataFilter;
  }
  public function setMajorDimension($majorDimension)
  {
    $this->majorDimension = $majorDimension;
  }
  public function getMajorDimension()
  {
    return $this->majorDimension;
  }
  public function setValues($values)
  {
    $this->values = $values;
  }
  public function getValues()
  {
    return $this->values;
  }
}
