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
 *   $computeService = new Google_Service_Compute(...);
 *   $projects = $computeService->projects;
 *  </code>
 */
class Google_Service_Compute_Resource_Projects extends Google_Service_Resource
{
  /**
   * Disable this project as a shared VPC host project. (projects.disableXpnHost)
   *
   * @param string $project Project ID for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function disableXpnHost($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('disableXpnHost', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Disable a serivce resource (a.k.a service project) associated with this host
   * project. (projects.disableXpnResource)
   *
   * @param string $project Project ID for this request.
   * @param Google_Service_Compute_ProjectsDisableXpnResourceRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function disableXpnResource($project, Google_Service_Compute_ProjectsDisableXpnResourceRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('disableXpnResource', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Enable this project as a shared VPC host project. (projects.enableXpnHost)
   *
   * @param string $project Project ID for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function enableXpnHost($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('enableXpnHost', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Enable service resource (a.k.a service project) for a host project, so that
   * subnets in the host project can be used by instances in the service project.
   * (projects.enableXpnResource)
   *
   * @param string $project Project ID for this request.
   * @param Google_Service_Compute_ProjectsEnableXpnResourceRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function enableXpnResource($project, Google_Service_Compute_ProjectsEnableXpnResourceRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('enableXpnResource', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified Project resource. (projects.get)
   *
   * @param string $project Project ID for this request.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_Project
   */
  public function get($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Compute_Project");
  }
  /**
   * Get the shared VPC host project that this project links to. May be empty if
   * no link exists. (projects.getXpnHost)
   *
   * @param string $project Project ID for this request.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_Project
   */
  public function getXpnHost($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('getXpnHost', array($params), "Google_Service_Compute_Project");
  }
  /**
   * Get service resources (a.k.a service project) associated with this host
   * project. (projects.getXpnResources)
   *
   * @param string $project Project ID for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * @opt_param string maxResults
   * @opt_param string order_by
   * @opt_param string pageToken
   * @return Google_Service_Compute_ProjectsGetXpnResources
   */
  public function getXpnResources($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('getXpnResources', array($params), "Google_Service_Compute_ProjectsGetXpnResources");
  }
  /**
   * List all shared VPC host projects visible to the user in an organization.
   * (projects.listXpnHosts)
   *
   * @param string $project Project ID for this request.
   * @param Google_Service_Compute_ProjectsListXpnHostsRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * @opt_param string maxResults
   * @opt_param string order_by
   * @opt_param string pageToken
   * @return Google_Service_Compute_XpnHostList
   */
  public function listXpnHosts($project, Google_Service_Compute_ProjectsListXpnHostsRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('listXpnHosts', array($params), "Google_Service_Compute_XpnHostList");
  }
  /**
   * Moves a persistent disk from one zone to another. (projects.moveDisk)
   *
   * @param string $project Project ID for this request.
   * @param Google_Service_Compute_DiskMoveRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function moveDisk($project, Google_Service_Compute_DiskMoveRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('moveDisk', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Moves an instance and its attached persistent disks from one zone to another.
   * (projects.moveInstance)
   *
   * @param string $project Project ID for this request.
   * @param Google_Service_Compute_InstanceMoveRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function moveInstance($project, Google_Service_Compute_InstanceMoveRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('moveInstance', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Sets metadata common to all instances within the specified project using the
   * data included in the request. (projects.setCommonInstanceMetadata)
   *
   * @param string $project Project ID for this request.
   * @param Google_Service_Compute_Metadata $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function setCommonInstanceMetadata($project, Google_Service_Compute_Metadata $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setCommonInstanceMetadata', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Enables the usage export feature and sets the usage export bucket where
   * reports are stored. If you provide an empty request body using this method,
   * the usage export feature will be disabled. (projects.setUsageExportBucket)
   *
   * @param string $project Project ID for this request.
   * @param Google_Service_Compute_UsageExportLocation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function setUsageExportBucket($project, Google_Service_Compute_UsageExportLocation $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setUsageExportBucket', array($params), "Google_Service_Compute_Operation");
  }
}
