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
 * The "deployments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $managerService = new Google_Service_Manager(...);
 *   $deployments = $managerService->deployments;
 *  </code>
 */
class Google_Service_Manager_DeploymentsResource extends Google_Service_Resource
{
  /**
   * (deployments.delete)
   *
   * @param string $projectId
   * @param string $region
   * @param string $deploymentName
   * @param array $optParams Optional parameters.
   */
  public function delete($projectId, $region, $deploymentName, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'deploymentName' => $deploymentName);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * (deployments.get)
   *
   * @param string $projectId
   * @param string $region
   * @param string $deploymentName
   * @param array $optParams Optional parameters.
   * @return Google_Service_Deployment
   */
  public function get($projectId, $region, $deploymentName, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'deploymentName' => $deploymentName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Manager_Deployment");
  }
  /**
   * (deployments.insert)
   *
   * @param string $projectId
   * @param string $region
   * @param Google_Deployment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Deployment
   */
  public function insert($projectId, $region, Google_Service_Manager_Deployment $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Manager_Deployment");
  }
  /**
   * (deployments.listDeployments)
   *
   * @param string $projectId
   * @param string $region
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum count of results to be returned. Acceptable
   * values are 0 to 100, inclusive. (Default: 50)
   * @opt_param string pageToken Specifies a nextPageToken returned by a previous
   * list request. This token can be used to request the next page of results from
   * a previous list request.
   * @return Google_Service_DeploymentsListResponse
   */
  public function listDeployments($projectId, $region, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Manager_DeploymentsListResponse");
  }
}
