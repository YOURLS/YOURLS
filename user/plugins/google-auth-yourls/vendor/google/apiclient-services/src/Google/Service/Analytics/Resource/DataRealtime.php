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

/**
 * The "realtime" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google_Service_Analytics(...);
 *   $realtime = $analyticsService->realtime;
 *  </code>
 */
class Google_Service_Analytics_Resource_DataRealtime extends Google_Service_Resource
{
  /**
   * Returns real time data for a view (profile). (realtime.get)
   *
   * @param string $ids Unique table ID for retrieving real time data. Table ID is
   * of the form ga:XXXX, where XXXX is the Analytics view (profile) ID.
   * @param string $metrics A comma-separated list of real time metrics. E.g.,
   * 'rt:activeUsers'. At least one metric must be specified.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dimensions A comma-separated list of real time dimensions.
   * E.g., 'rt:medium,rt:city'.
   * @opt_param string filters A comma-separated list of dimension or metric
   * filters to be applied to real time data.
   * @opt_param int max-results The maximum number of entries to include in this
   * feed.
   * @opt_param string sort A comma-separated list of dimensions or metrics that
   * determine the sort order for real time data.
   * @return Google_Service_Analytics_RealtimeData
   */
  public function get($ids, $metrics, $optParams = array())
  {
    $params = array('ids' => $ids, 'metrics' => $metrics);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Analytics_RealtimeData");
  }
}
