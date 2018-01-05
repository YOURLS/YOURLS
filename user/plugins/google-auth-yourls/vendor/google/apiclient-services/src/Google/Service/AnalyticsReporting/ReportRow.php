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

class Google_Service_AnalyticsReporting_ReportRow extends Google_Collection
{
  protected $collection_key = 'metrics';
  public $dimensions;
  protected $metricsType = 'Google_Service_AnalyticsReporting_DateRangeValues';
  protected $metricsDataType = 'array';

  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param Google_Service_AnalyticsReporting_DateRangeValues
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Google_Service_AnalyticsReporting_DateRangeValues
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
}
