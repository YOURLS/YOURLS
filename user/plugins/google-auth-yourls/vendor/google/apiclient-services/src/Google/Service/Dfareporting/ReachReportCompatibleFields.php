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

class Google_Service_Dfareporting_ReachReportCompatibleFields extends Google_Collection
{
  protected $collection_key = 'reachByFrequencyMetrics';
  protected $dimensionFiltersType = 'Google_Service_Dfareporting_Dimension';
  protected $dimensionFiltersDataType = 'array';
  protected $dimensionsType = 'Google_Service_Dfareporting_Dimension';
  protected $dimensionsDataType = 'array';
  public $kind;
  protected $metricsType = 'Google_Service_Dfareporting_Metric';
  protected $metricsDataType = 'array';
  protected $pivotedActivityMetricsType = 'Google_Service_Dfareporting_Metric';
  protected $pivotedActivityMetricsDataType = 'array';
  protected $reachByFrequencyMetricsType = 'Google_Service_Dfareporting_Metric';
  protected $reachByFrequencyMetricsDataType = 'array';

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
  /**
   * @param Google_Service_Dfareporting_Dimension
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return Google_Service_Dfareporting_Dimension
   */
  public function getDimensions()
  {
    return $this->dimensions;
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
  public function setPivotedActivityMetrics($pivotedActivityMetrics)
  {
    $this->pivotedActivityMetrics = $pivotedActivityMetrics;
  }
  /**
   * @return Google_Service_Dfareporting_Metric
   */
  public function getPivotedActivityMetrics()
  {
    return $this->pivotedActivityMetrics;
  }
  /**
   * @param Google_Service_Dfareporting_Metric
   */
  public function setReachByFrequencyMetrics($reachByFrequencyMetrics)
  {
    $this->reachByFrequencyMetrics = $reachByFrequencyMetrics;
  }
  /**
   * @return Google_Service_Dfareporting_Metric
   */
  public function getReachByFrequencyMetrics()
  {
    return $this->reachByFrequencyMetrics;
  }
}
