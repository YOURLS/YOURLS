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
 * The "queries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclickbidmanagerService = new Google_Service_DoubleClickBidManager(...);
 *   $queries = $doubleclickbidmanagerService->queries;
 *  </code>
 */
class Google_Service_DoubleClickBidManager_Resource_Queries extends Google_Service_Resource
{
  /**
   * Creates a query. (queries.createquery)
   *
   * @param Google_Service_DoubleClickBidManager_Query $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DoubleClickBidManager_Query
   */
  public function createquery(Google_Service_DoubleClickBidManager_Query $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('createquery', array($params), "Google_Service_DoubleClickBidManager_Query");
  }
  /**
   * Deletes a stored query as well as the associated stored reports.
   * (queries.deletequery)
   *
   * @param string $queryId Query ID to delete.
   * @param array $optParams Optional parameters.
   */
  public function deletequery($queryId, $optParams = array())
  {
    $params = array('queryId' => $queryId);
    $params = array_merge($params, $optParams);
    return $this->call('deletequery', array($params));
  }
  /**
   * Retrieves a stored query. (queries.getquery)
   *
   * @param string $queryId Query ID to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DoubleClickBidManager_Query
   */
  public function getquery($queryId, $optParams = array())
  {
    $params = array('queryId' => $queryId);
    $params = array_merge($params, $optParams);
    return $this->call('getquery', array($params), "Google_Service_DoubleClickBidManager_Query");
  }
  /**
   * Retrieves stored queries. (queries.listqueries)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_DoubleClickBidManager_ListQueriesResponse
   */
  public function listqueries($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('listqueries', array($params), "Google_Service_DoubleClickBidManager_ListQueriesResponse");
  }
  /**
   * Runs a stored query to generate a report. (queries.runquery)
   *
   * @param string $queryId Query ID to run.
   * @param Google_Service_DoubleClickBidManager_RunQueryRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function runquery($queryId, Google_Service_DoubleClickBidManager_RunQueryRequest $postBody, $optParams = array())
  {
    $params = array('queryId' => $queryId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('runquery', array($params));
  }
}
