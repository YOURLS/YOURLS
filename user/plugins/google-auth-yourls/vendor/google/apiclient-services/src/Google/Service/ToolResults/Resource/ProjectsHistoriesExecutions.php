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
 * The "executions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $toolresultsService = new Google_Service_ToolResults(...);
 *   $executions = $toolresultsService->executions;
 *  </code>
 */
class Google_Service_ToolResults_Resource_ProjectsHistoriesExecutions extends Google_Service_Resource
{
  /**
   * Creates an Execution.
   *
   * The returned Execution will have the id set.
   *
   * May return any of the following canonical error codes:
   *
   * - PERMISSION_DENIED - if the user is not authorized to write to project -
   * INVALID_ARGUMENT - if the request is malformed - NOT_FOUND - if the
   * containing History does not exist (executions.create)
   *
   * @param string $projectId A Project id.
   *
   * Required.
   * @param string $historyId A History id.
   *
   * Required.
   * @param Google_Service_ToolResults_Execution $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId A unique request ID for server to detect
   * duplicated requests. For example, a UUID.
   *
   * Optional, but strongly recommended.
   * @return Google_Service_ToolResults_Execution
   */
  public function create($projectId, $historyId, Google_Service_ToolResults_Execution $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'historyId' => $historyId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ToolResults_Execution");
  }
  /**
   * Gets an Execution.
   *
   * May return any of the following canonical error codes:
   *
   * - PERMISSION_DENIED - if the user is not authorized to write to project -
   * INVALID_ARGUMENT - if the request is malformed - NOT_FOUND - if the Execution
   * does not exist (executions.get)
   *
   * @param string $projectId A Project id.
   *
   * Required.
   * @param string $historyId A History id.
   *
   * Required.
   * @param string $executionId An Execution id.
   *
   * Required.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ToolResults_Execution
   */
  public function get($projectId, $historyId, $executionId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ToolResults_Execution");
  }
  /**
   * Lists Histories for a given Project.
   *
   * The executions are sorted by creation_time in descending order. The
   * execution_id key will be used to order the executions with the same
   * creation_time.
   *
   * May return any of the following canonical error codes:
   *
   * - PERMISSION_DENIED - if the user is not authorized to read project -
   * INVALID_ARGUMENT - if the request is malformed - NOT_FOUND - if the
   * containing History does not exist
   * (executions.listProjectsHistoriesExecutions)
   *
   * @param string $projectId A Project id.
   *
   * Required.
   * @param string $historyId A History id.
   *
   * Required.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of Executions to fetch.
   *
   * Default value: 25. The server will use this default if the field is not set
   * or has a value of 0.
   *
   * Optional.
   * @opt_param string pageToken A continuation token to resume the query at the
   * next item.
   *
   * Optional.
   * @return Google_Service_ToolResults_ListExecutionsResponse
   */
  public function listProjectsHistoriesExecutions($projectId, $historyId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'historyId' => $historyId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ToolResults_ListExecutionsResponse");
  }
  /**
   * Updates an existing Execution with the supplied partial entity.
   *
   * May return any of the following canonical error codes:
   *
   * - PERMISSION_DENIED - if the user is not authorized to write to project -
   * INVALID_ARGUMENT - if the request is malformed - FAILED_PRECONDITION - if the
   * requested state transition is illegal - NOT_FOUND - if the containing History
   * does not exist (executions.patch)
   *
   * @param string $projectId A Project id. Required.
   * @param string $historyId Required.
   * @param string $executionId Required.
   * @param Google_Service_ToolResults_Execution $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId A unique request ID for server to detect
   * duplicated requests. For example, a UUID.
   *
   * Optional, but strongly recommended.
   * @return Google_Service_ToolResults_Execution
   */
  public function patch($projectId, $historyId, $executionId, Google_Service_ToolResults_Execution $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_ToolResults_Execution");
  }
}
