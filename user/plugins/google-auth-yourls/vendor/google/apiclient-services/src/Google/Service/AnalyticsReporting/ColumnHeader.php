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

class Google_Service_AnalyticsReporting_ColumnHeader extends Google_Collection
{
  protected $collection_key = 'dimensions';
  public $dimensions;
  protected $metricHeaderType = 'Google_Service_AnalyticsReporting_MetricHeader';
  protected $metricHeaderDataType = '';

  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param Google_Service_AnalyticsReporting_MetricHeader
   */
  public function setMetricHeader(Google_Service_AnalyticsReporting_MetricHeader $metricHeader)
  {
    $this->metricHeader = $metricHeader;
  }
  /**
   * @return Google_Service_AnalyticsReporting_MetricHeader
   */
  public function getMetricHeader()
  {
    return $this->metricHeader;
  }
}
