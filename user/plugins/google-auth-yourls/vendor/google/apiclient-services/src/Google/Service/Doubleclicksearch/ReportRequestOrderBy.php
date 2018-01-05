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

class Google_Service_Doubleclicksearch_ReportRequestOrderBy extends Google_Model
{
  protected $columnType = 'Google_Service_Doubleclicksearch_ReportApiColumnSpec';
  protected $columnDataType = '';
  public $sortOrder;

  /**
   * @param Google_Service_Doubleclicksearch_ReportApiColumnSpec
   */
  public function setColumn(Google_Service_Doubleclicksearch_ReportApiColumnSpec $column)
  {
    $this->column = $column;
  }
  /**
   * @return Google_Service_Doubleclicksearch_ReportApiColumnSpec
   */
  public function getColumn()
  {
    return $this->column;
  }
  public function setSortOrder($sortOrder)
  {
    $this->sortOrder = $sortOrder;
  }
  public function getSortOrder()
  {
    return $this->sortOrder;
  }
}
