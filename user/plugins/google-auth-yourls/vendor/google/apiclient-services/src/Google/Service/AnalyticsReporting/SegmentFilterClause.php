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

class Google_Service_AnalyticsReporting_SegmentFilterClause extends Google_Model
{
  protected $dimensionFilterType = 'Google_Service_AnalyticsReporting_SegmentDimensionFilter';
  protected $dimensionFilterDataType = '';
  protected $metricFilterType = 'Google_Service_AnalyticsReporting_SegmentMetricFilter';
  protected $metricFilterDataType = '';
  public $not;

  /**
   * @param Google_Service_AnalyticsReporting_SegmentDimensionFilter
   */
  public function setDimensionFilter(Google_Service_AnalyticsReporting_SegmentDimensionFilter $dimensionFilter)
  {
    $this->dimensionFilter = $dimensionFilter;
  }
  /**
   * @return Google_Service_AnalyticsReporting_SegmentDimensionFilter
   */
  public function getDimensionFilter()
  {
    return $this->dimensionFilter;
  }
  /**
   * @param Google_Service_AnalyticsReporting_SegmentMetricFilter
   */
  public function setMetricFilter(Google_Service_AnalyticsReporting_SegmentMetricFilter $metricFilter)
  {
    $this->metricFilter = $metricFilter;
  }
  /**
   * @return Google_Service_AnalyticsReporting_SegmentMetricFilter
   */
  public function getMetricFilter()
  {
    return $this->metricFilter;
  }
  public function setNot($not)
  {
    $this->not = $not;
  }
  public function getNot()
  {
    return $this->not;
  }
}
