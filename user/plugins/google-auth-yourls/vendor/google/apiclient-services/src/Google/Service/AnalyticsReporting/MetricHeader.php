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

class Google_Service_AnalyticsReporting_MetricHeader extends Google_Collection
{
  protected $collection_key = 'pivotHeaders';
  protected $metricHeaderEntriesType = 'Google_Service_AnalyticsReporting_MetricHeaderEntry';
  protected $metricHeaderEntriesDataType = 'array';
  protected $pivotHeadersType = 'Google_Service_AnalyticsReporting_PivotHeader';
  protected $pivotHeadersDataType = 'array';

  /**
   * @param Google_Service_AnalyticsReporting_MetricHeaderEntry
   */
  public function setMetricHeaderEntries($metricHeaderEntries)
  {
    $this->metricHeaderEntries = $metricHeaderEntries;
  }
  /**
   * @return Google_Service_AnalyticsReporting_MetricHeaderEntry
   */
  public function getMetricHeaderEntries()
  {
    return $this->metricHeaderEntries;
  }
  /**
   * @param Google_Service_AnalyticsReporting_PivotHeader
   */
  public function setPivotHeaders($pivotHeaders)
  {
    $this->pivotHeaders = $pivotHeaders;
  }
  /**
   * @return Google_Service_AnalyticsReporting_PivotHeader
   */
  public function getPivotHeaders()
  {
    return $this->pivotHeaders;
  }
}
