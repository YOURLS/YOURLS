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

class Google_Service_Dfareporting_ReportCrossDimensionReachCriteria extends Google_Collection
{
  protected $collection_key = 'overlapMetricNames';
  protected $breakdownType = 'Google_Service_Dfareporting_SortedDimension';
  protected $breakdownDataType = 'array';
  protected $dateRangeType = 'Google_Service_Dfareporting_DateRange';
  protected $dateRangeDataType = '';
  public $dimension;
  protected $dimensionFiltersType = 'Google_Service_Dfareporting_DimensionValue';
  protected $dimensionFiltersDataType = 'array';
  public $metricNames;
  public $overlapMetricNames;
  public $pivoted;

  /**
   * @param Google_Service_Dfareporting_SortedDimension
   */
  public function setBreakdown($breakdown)
  {
    $this->breakdown = $breakdown;
  }
  /**
   * @return Google_Service_Dfareporting_SortedDimension
   */
  public function getBreakdown()
  {
    return $this->breakdown;
  }
  /**
   * @param Google_Service_Dfareporting_DateRange
   */
  public function setDateRange(Google_Service_Dfareporting_DateRange $dateRange)
  {
    $this->dateRange = $dateRange;
  }
  /**
   * @return Google_Service_Dfareporting_DateRange
   */
  public function getDateRange()
  {
    return $this->dateRange;
  }
  public function setDimension($dimension)
  {
    $this->dimension = $dimension;
  }
  public function getDimension()
  {
    return $this->dimension;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setDimensionFilters($dimensionFilters)
  {
    $this->dimensionFilters = $dimensionFilters;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getDimensionFilters()
  {
    return $this->dimensionFilters;
  }
  public function setMetricNames($metricNames)
  {
    $this->metricNames = $metricNames;
  }
  public function getMetricNames()
  {
    return $this->metricNames;
  }
  public function setOverlapMetricNames($overlapMetricNames)
  {
    $this->overlapMetricNames = $overlapMetricNames;
  }
  public function getOverlapMetricNames()
  {
    return $this->overlapMetricNames;
  }
  public function setPivoted($pivoted)
  {
    $this->pivoted = $pivoted;
  }
  public function getPivoted()
  {
    return $this->pivoted;
  }
}
