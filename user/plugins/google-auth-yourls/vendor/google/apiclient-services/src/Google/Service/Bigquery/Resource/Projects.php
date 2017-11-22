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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryService = new Google_Service_Bigquery(...);
 *   $projects = $bigqueryService->projects;
 *  </code>
 */
class Google_Service_Bigquery_Resource_Projects extends Google_Service_Resource
{
  /**
   * Returns the email address of the service account for your project used for
   * interactions with Google Cloud KMS. (projects.getServiceAccount)
   *
   * @param string $projectId Project ID for which the service account is
   * requested.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Bigquery_GetServiceAccountResponse
   */
  public function getServiceAccount($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('getServiceAccount', array($params), "Google_Service_Bigquery_GetServiceAccountResponse");
  }
  /**
   * Lists all projects to which you have been granted any project role.
   * (projects.listProjects)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of results to return
   * @opt_param string pageToken Page token, returned by a previous call, to
   * request the next page of results
   * @return Google_Service_Bigquery_ProjectList
   */
  public function listProjects($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Bigquery_ProjectList");
  }
}
