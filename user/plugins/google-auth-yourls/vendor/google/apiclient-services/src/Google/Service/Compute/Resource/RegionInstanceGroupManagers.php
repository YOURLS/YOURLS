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
 * The "regionInstanceGroupManagers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $regionInstanceGroupManagers = $computeService->regionInstanceGroupManagers;
 *  </code>
 */
class Google_Service_Compute_Resource_RegionInstanceGroupManagers extends Google_Service_Resource
{
  /**
   * Schedules a group action to remove the specified instances from the managed
   * instance group. Abandoning an instance does not delete the instance, but it
   * does remove the instance from any target pools that are applied by the
   * managed instance group. This method reduces the targetSize of the managed
   * instance group by the number of instances that you abandon. This operation is
   * marked as DONE when the action is scheduled even if the instances have not
   * yet been removed from the group. You must separately verify the status of the
   * abandoning action with the listmanagedinstances method.
   *
   * If the group is part of a backend service that has enabled connection
   * draining, it can take up to 60 seconds after the connection draining duration
   * has elapsed before the VM instance is removed or deleted.
   *
   * You can specify a maximum of 1000 instances with this method per request.
   * (regionInstanceGroupManagers.abandonInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager Name of the managed instance group.
   * @param Google_Service_Compute_RegionInstanceGroupManagersAbandonInstancesRequest $postBody
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
  public function abandonInstances($project, $region, $instanceGroupManager, Google_Service_Compute_RegionInstanceGroupManagersAbandonInstancesRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('abandonInstances', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Deletes the specified managed instance group and all of the instances in that
   * group. (regionInstanceGroupManagers.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager Name of the managed instance group to
   * delete.
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
  public function delete($project, $region, $instanceGroupManager, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Schedules a group action to delete the specified instances in the managed
   * instance group. The instances are also removed from any target pools of which
   * they were a member. This method reduces the targetSize of the managed
   * instance group by the number of instances that you delete. This operation is
   * marked as DONE when the action is scheduled even if the instances are still
   * being deleted. You must separately verify the status of the deleting action
   * with the listmanagedinstances method.
   *
   * If the group is part of a backend service that has enabled connection
   * draining, it can take up to 60 seconds after the connection draining duration
   * has elapsed before the VM instance is removed or deleted.
   *
   * You can specify a maximum of 1000 instances with this method per request.
   * (regionInstanceGroupManagers.deleteInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager Name of the managed instance group.
   * @param Google_Service_Compute_RegionInstanceGroupManagersDeleteInstancesRequest $postBody
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
  public function deleteInstances($project, $region, $instanceGroupManager, Google_Service_Compute_RegionInstanceGroupManagersDeleteInstancesRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('deleteInstances', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Returns all of the details about the specified managed instance group.
   * (regionInstanceGroupManagers.get)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager Name of the managed instance group to
   * return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_InstanceGroupManager
   */
  public function get($project, $region, $instanceGroupManager, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Compute_InstanceGroupManager");
  }
  /**
   * Creates a managed instance group using the information that you specify in
   * the request. After the group is created, it schedules an action to create
   * instances in the group using the specified instance template. This operation
   * is marked as DONE when the group is created even if the instances in the
   * group have not yet been created. You must separately verify the status of the
   * individual instances with the listmanagedinstances method.
   *
   * A regional managed instance group can contain up to 2000 instances.
   * (regionInstanceGroupManagers.insert)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param Google_Service_Compute_InstanceGroupManager $postBody
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
  public function insert($project, $region, Google_Service_Compute_InstanceGroupManager $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of managed instance groups that are contained within the
   * specified region.
   * (regionInstanceGroupManagers.listRegionInstanceGroupManagers)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Sets a filter {expression} for filtering listed
   * resources. Your {expression} must be in the format: field_name
   * comparison_string literal_string.
   *
   * The field_name is the name of the field you want to compare. Only atomic
   * field types are supported (string, number, boolean). The comparison_string
   * must be either eq (equals) or ne (not equals). The literal_string is the
   * string value to filter to. The literal value must be valid for the type of
   * field you are filtering by (string, number, boolean). For string fields, the
   * literal value is interpreted as a regular expression using RE2 syntax. The
   * literal value must match the entire field.
   *
   * For example, to filter for instances that do not have a name of example-
   * instance, you would use name ne example-instance.
   *
   * You can filter on nested fields. For example, you could filter on instances
   * that have set the scheduling.automaticRestart field to true. Use filtering on
   * nested fields to take advantage of labels to organize and search for results
   * based on label values.
   *
   * To filter on multiple expressions, provide each separate expression within
   * parentheses. For example, (scheduling.automaticRestart eq true) (zone eq us-
   * central1-f). Multiple expressions are treated as AND expressions, meaning
   * that resources must match all expressions to pass the filters.
   * @opt_param string maxResults The maximum number of results per page that
   * should be returned. If the number of available results is larger than
   * maxResults, Compute Engine returns a nextPageToken that can be used to get
   * the next page of results in subsequent list requests. Acceptable values are 0
   * to 500, inclusive. (Default: 500)
   * @opt_param string orderBy Sorts list results by a certain order. By default,
   * results are returned in alphanumerical order based on the resource name.
   *
   * You can also sort results in descending order based on the creation timestamp
   * using orderBy="creationTimestamp desc". This sorts results based on the
   * creationTimestamp field in reverse chronological order (newest result first).
   * Use this to sort resources like operations so that the newest operation is
   * returned first.
   *
   * Currently, only sorting by name or creationTimestamp desc is supported.
   * @opt_param string pageToken Specifies a page token to use. Set pageToken to
   * the nextPageToken returned by a previous list request to get the next page of
   * results.
   * @return Google_Service_Compute_RegionInstanceGroupManagerList
   */
  public function listRegionInstanceGroupManagers($project, $region, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Compute_RegionInstanceGroupManagerList");
  }
  /**
   * Lists the instances in the managed instance group and instances that are
   * scheduled to be created. The list includes any current actions that the group
   * has scheduled for its instances.
   * (regionInstanceGroupManagers.listManagedInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager The name of the managed instance group.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * @opt_param string maxResults
   * @opt_param string order_by
   * @opt_param string pageToken
   * @return Google_Service_Compute_RegionInstanceGroupManagersListInstancesResponse
   */
  public function listManagedInstances($project, $region, $instanceGroupManager, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager);
    $params = array_merge($params, $optParams);
    return $this->call('listManagedInstances', array($params), "Google_Service_Compute_RegionInstanceGroupManagersListInstancesResponse");
  }
  /**
   * Schedules a group action to recreate the specified instances in the managed
   * instance group. The instances are deleted and recreated using the current
   * instance template for the managed instance group. This operation is marked as
   * DONE when the action is scheduled even if the instances have not yet been
   * recreated. You must separately verify the status of the recreating action
   * with the listmanagedinstances method.
   *
   * If the group is part of a backend service that has enabled connection
   * draining, it can take up to 60 seconds after the connection draining duration
   * has elapsed before the VM instance is removed or deleted.
   *
   * You can specify a maximum of 1000 instances with this method per request.
   * (regionInstanceGroupManagers.recreateInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager Name of the managed instance group.
   * @param Google_Service_Compute_RegionInstanceGroupManagersRecreateRequest $postBody
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
  public function recreateInstances($project, $region, $instanceGroupManager, Google_Service_Compute_RegionInstanceGroupManagersRecreateRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('recreateInstances', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Changes the intended size for the managed instance group. If you increase the
   * size, the group schedules actions to create new instances using the current
   * instance template. If you decrease the size, the group schedules delete
   * actions on one or more instances. The resize operation is marked DONE when
   * the resize actions are scheduled even if the group has not yet added or
   * deleted any instances. You must separately verify the status of the creating
   * or deleting actions with the listmanagedinstances method.
   *
   * If the group is part of a backend service that has enabled connection
   * draining, it can take up to 60 seconds after the connection draining duration
   * has elapsed before the VM instance is removed or deleted.
   * (regionInstanceGroupManagers.resize)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager Name of the managed instance group.
   * @param int $size Number of instances that should exist in this instance group
   * manager.
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
  public function resize($project, $region, $instanceGroupManager, $size, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'size' => $size);
    $params = array_merge($params, $optParams);
    return $this->call('resize', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Sets the instance template to use when creating new instances or recreating
   * instances in this group. Existing instances are not affected.
   * (regionInstanceGroupManagers.setInstanceTemplate)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager The name of the managed instance group.
   * @param Google_Service_Compute_RegionInstanceGroupManagersSetTemplateRequest $postBody
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
  public function setInstanceTemplate($project, $region, $instanceGroupManager, Google_Service_Compute_RegionInstanceGroupManagersSetTemplateRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setInstanceTemplate', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Modifies the target pools to which all new instances in this group are
   * assigned. Existing instances in the group are not affected.
   * (regionInstanceGroupManagers.setTargetPools)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager Name of the managed instance group.
   * @param Google_Service_Compute_RegionInstanceGroupManagersSetTargetPoolsRequest $postBody
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
  public function setTargetPools($project, $region, $instanceGroupManager, Google_Service_Compute_RegionInstanceGroupManagersSetTargetPoolsRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setTargetPools', array($params), "Google_Service_Compute_Operation");
  }
}
