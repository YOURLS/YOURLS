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
 * The "histories" collection of methods.
 * Typical usage is:
 *  <code>
 *   $toolresultsService = new Google_Service_ToolResults(...);
 *   $histories = $toolresultsService->histories;
 *  </code>
 */
class Google_Service_ToolResults_Resource_ProjectsHistories extends Google_Service_Resource
{
  /**
   * Creates a History.
   *
   * The returned History will have the id set.
   *
   * May return any of the following canonical error codes:
   *
   * - PERMISSION_DENIED - if the user is not authorized to write to project -
   * INVALID_ARGUMENT - if the request is malformed - NOT_FOUND - if the
   * containing project does not exist (histories.create)
   *
   * @param string $projectId A Project id.
   *
   * Required.
   * @param Google_Service_ToolResults_History $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId A unique request ID for server to detect
   * duplicated requests. For example, a UUID.
   *
   * Optional, but strongly recommended.
   * @return Google_Service_ToolResults_History
   */
  public function create($projectId, Google_Service_ToolResults_History $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ToolResults_History");
  }
  /**
   * Gets a History.
   *
   * May return any of the following canonical error codes:
   *
   * - PERMISSION_DENIED - if the user is not authorized to read project -
   * INVALID_ARGUMENT - if the request is malformed - NOT_FOUND - if the History
   * does not exist (histories.get)
   *
   * @param string $projectId A Project id.
   *
   * Required.
   * @param string $historyId A History id.
   *
   * Required.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ToolResults_History
   */
  public function get($projectId, $historyId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'historyId' => $historyId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ToolResults_History");
  }
  /**
   * Lists Histories for a given Project.
   *
   * The histories are sorted by modification time in descending order. The
   * history_id key will be used to order the history with the same modification
   * time.
   *
   * May return any of the following canonical error codes:
   *
   * - PERMISSION_DENIED - if the user is not authorized to read project -
   * INVALID_ARGUMENT - if the request is malformed - NOT_FOUND - if the History
   * does not exist (histories.listProjectsHistories)
   *
   * @param string $projectId A Project id.
   *
   * Required.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filterByName If set, only return histories with the given
   * name.
   *
   * Optional.
   * @opt_param int pageSize The maximum number of Histories to fetch.
   *
   * Default value: 20. The server will use this default if the field is not set
   * or has a value of 0. Any value greater than 100 will be treated as 100.
   *
   * Optional.
   * @opt_param string pageToken A continuation token to resume the query at the
   * next item.
   *
   * Optional.
   * @return Google_Service_ToolResults_ListHistoriesResponse
   */
  public function listProjectsHistories($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ToolResults_ListHistoriesResponse");
  }
}
