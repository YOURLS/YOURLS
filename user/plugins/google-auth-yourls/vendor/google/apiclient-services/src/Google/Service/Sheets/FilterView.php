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

class Google_Service_Sheets_FilterView extends Google_Collection
{
  protected $collection_key = 'sortSpecs';
  protected $criteriaType = 'Google_Service_Sheets_FilterCriteria';
  protected $criteriaDataType = 'map';
  public $filterViewId;
  public $namedRangeId;
  protected $rangeType = 'Google_Service_Sheets_GridRange';
  protected $rangeDataType = '';
  protected $sortSpecsType = 'Google_Service_Sheets_SortSpec';
  protected $sortSpecsDataType = 'array';
  public $title;

  /**
   * @param Google_Service_Sheets_FilterCriteria
   */
  public function setCriteria($criteria)
  {
    $this->criteria = $criteria;
  }
  /**
   * @return Google_Service_Sheets_FilterCriteria
   */
  public function getCriteria()
  {
    return $this->criteria;
  }
  public function setFilterViewId($filterViewId)
  {
    $this->filterViewId = $filterViewId;
  }
  public function getFilterViewId()
  {
    return $this->filterViewId;
  }
  public function setNamedRangeId($namedRangeId)
  {
    $this->namedRangeId = $namedRangeId;
  }
  public function getNamedRangeId()
  {
    return $this->namedRangeId;
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
  /**
   * @param Google_Service_Sheets_SortSpec
   */
  public function setSortSpecs($sortSpecs)
  {
    $this->sortSpecs = $sortSpecs;
  }
  /**
   * @return Google_Service_Sheets_SortSpec
   */
  public function getSortSpecs()
  {
    return $this->sortSpecs;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
