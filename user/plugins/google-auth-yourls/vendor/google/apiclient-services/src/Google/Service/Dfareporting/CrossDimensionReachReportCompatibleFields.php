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

class Google_Service_Dfareporting_CrossDimensionReachReportCompatibleFields extends Google_Collection
{
  protected $collection_key = 'overlapMetrics';
  protected $breakdownType = 'Google_Service_Dfareporting_Dimension';
  protected $breakdownDataType = 'array';
  protected $dimensionFiltersType = 'Google_Service_Dfareporting_Dimension';
  protected $dimensionFiltersDataType = 'array';
  public $kind;
  protected $metricsType = 'Google_Service_Dfareporting_Metric';
  protected $metricsDataType = 'array';
  protected $overlapMetricsType = 'Google_Service_Dfareporting_Metric';
  protected $overlapMetricsDataType = 'array';

  /**
   * @param Google_Service_Dfareporting_Dimension
   */
  public function setBreakdown($breakdown)
  {
    $this->breakdown = $breakdown;
  }
  /**
   * @return Google_Service_Dfareporting_Dimension
   */
  public function getBreakdown()
  {
    return $this->breakdown;
  }
  /**
   * @param Google_Service_Dfareporting_Dimension
   */
  public function setDimensionFilters($dimensionFilters)
  {
    $this->dimensionFilters = $dimensionFilters;
  }
  /**
   * @return Google_Service_Dfareporting_Dimension
   */
  public function getDimensionFilters()
  {
    return $this->dimensionFilters;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Dfareporting_Metric
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Google_Service_Dfareporting_Metric
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param Google_Service_Dfareporting_Metric
   */
  public function setOverlapMetrics($overlapMetrics)
  {
    $this->overlapMetrics = $overlapMetrics;
  }
  /**
   * @return Google_Service_Dfareporting_Metric
   */
  public function getOverlapMetrics()
  {
    return $this->overlapMetrics;
  }
}
