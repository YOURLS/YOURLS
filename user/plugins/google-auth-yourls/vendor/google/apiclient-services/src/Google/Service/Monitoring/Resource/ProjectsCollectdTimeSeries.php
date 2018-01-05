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
 * The "collectdTimeSeries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $monitoringService = new Google_Service_Monitoring(...);
 *   $collectdTimeSeries = $monitoringService->collectdTimeSeries;
 *  </code>
 */
class Google_Service_Monitoring_Resource_ProjectsCollectdTimeSeries extends Google_Service_Resource
{
  /**
   * Stackdriver Monitoring Agent only: Creates a new time series.This method is
   * only for use by the Stackdriver Monitoring Agent. Use
   * projects.timeSeries.create instead. (collectdTimeSeries.create)
   *
   * @param string $name The project in which to create the time series. The
   * format is "projects/PROJECT_ID_OR_NUMBER".
   * @param Google_Service_Monitoring_CreateCollectdTimeSeriesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Monitoring_CreateCollectdTimeSeriesResponse
   */
  public function create($name, Google_Service_Monitoring_CreateCollectdTimeSeriesRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Monitoring_CreateCollectdTimeSeriesResponse");
  }
}
