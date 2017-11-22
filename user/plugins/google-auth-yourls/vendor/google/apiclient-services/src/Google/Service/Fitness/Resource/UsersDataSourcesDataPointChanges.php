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
 * The "dataPointChanges" collection of methods.
 * Typical usage is:
 *  <code>
 *   $fitnessService = new Google_Service_Fitness(...);
 *   $dataPointChanges = $fitnessService->dataPointChanges;
 *  </code>
 */
class Google_Service_Fitness_Resource_UsersDataSourcesDataPointChanges extends Google_Service_Resource
{
  /**
   * Queries for user's data point changes for a particular data source.
   * (dataPointChanges.listUsersDataSourcesDataPointChanges)
   *
   * @param string $userId List data points for the person identified. Use me to
   * indicate the authenticated user. Only me is supported at this time.
   * @param string $dataSourceId The data stream ID of the data source that
   * created the dataset.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int limit If specified, no more than this many data point changes
   * will be included in the response.
   * @opt_param string pageToken The continuation token, which is used to page
   * through large result sets. To get the next page of results, set this
   * parameter to the value of nextPageToken from the previous response.
   * @return Google_Service_Fitness_ListDataPointChangesResponse
   */
  public function listUsersDataSourcesDataPointChanges($userId, $dataSourceId, $optParams = array())
  {
    $params = array('userId' => $userId, 'dataSourceId' => $dataSourceId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Fitness_ListDataPointChangesResponse");
  }
}
