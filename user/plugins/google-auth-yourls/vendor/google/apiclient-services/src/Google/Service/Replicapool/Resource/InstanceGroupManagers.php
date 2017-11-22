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
 * The "instanceGroupManagers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $replicapoolService = new Google_Service_Replicapool(...);
 *   $instanceGroupManagers = $replicapoolService->instanceGroupManagers;
 *  </code>
 */
class Google_Service_Replicapool_Resource_InstanceGroupManagers extends Google_Service_Resource
{
  /**
   * Removes the specified instances from the managed instance group, and from any
   * target pools of which they were members, without deleting the instances.
   * (instanceGroupManagers.abandonInstances)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the instance group manager
   * resides.
   * @param string $instanceGroupManager The name of the instance group manager.
   * @param Google_Service_Replicapool_InstanceGroupManagersAbandonInstancesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Operation
   */
  public function abandonInstances($project, $zone, $instanceGroupManager, Google_Service_Replicapool_InstanceGroupManagersAbandonInstancesRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('abandonInstances', array($params), "Google_Service_Replicapool_Operation");
  }
  /**
   * Deletes the instance group manager and all instances contained within. If
   * you'd like to delete the manager without deleting the instances, you must
   * first abandon the instances to remove them from the group.
   * (instanceGroupManagers.delete)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the instance group manager
   * resides.
   * @param string $instanceGroupManager Name of the Instance Group Manager
   * resource to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Operation
   */
  public function delete($project, $zone, $instanceGroupManager, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Replicapool_Operation");
  }
  /**
   * Deletes the specified instances. The instances are deleted, then removed from
   * the instance group and any target pools of which they were a member. The
   * targetSize of the instance group manager is reduced by the number of
   * instances deleted. (instanceGroupManagers.deleteInstances)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the instance group manager
   * resides.
   * @param string $instanceGroupManager The name of the instance group manager.
   * @param Google_Service_Replicapool_InstanceGroupManagersDeleteInstancesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Operation
   */
  public function deleteInstances($project, $zone, $instanceGroupManager, Google_Service_Replicapool_InstanceGroupManagersDeleteInstancesRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('deleteInstances', array($params), "Google_Service_Replicapool_Operation");
  }
  /**
   * Returns the specified Instance Group Manager resource.
   * (instanceGroupManagers.get)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the instance group manager
   * resides.
   * @param string $instanceGroupManager Name of the instance resource to return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_InstanceGroupManager
   */
  public function get($project, $zone, $instanceGroupManager, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Replicapool_InstanceGroupManager");
  }
  /**
   * Creates an instance group manager, as well as the instance group and the
   * specified number of instances. (instanceGroupManagers.insert)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the instance group manager
   * resides.
   * @param int $size Number of instances that should exist.
   * @param Google_Service_Replicapool_InstanceGroupManager $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Operation
   */
  public function insert($project, $zone, $size, Google_Service_Replicapool_InstanceGroupManager $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'size' => $size, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Replicapool_Operation");
  }
  /**
   * Retrieves the list of Instance Group Manager resources contained within the
   * specified zone. (instanceGroupManagers.listInstanceGroupManagers)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the instance group manager
   * resides.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter expression for filtering listed
   * resources.
   * @opt_param string maxResults Optional. Maximum count of results to be
   * returned. Maximum value is 500 and default value is 500.
   * @opt_param string pageToken Optional. Tag returned by a previous list request
   * truncated by maxResults. Used to continue a previous list request.
   * @return Google_Service_Replicapool_InstanceGroupManagerList
   */
  public function listInstanceGroupManagers($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Replicapool_InstanceGroupManagerList");
  }
  /**
   * Recreates the specified instances. The instances are deleted, then recreated
   * using the instance group manager's current instance template.
   * (instanceGroupManagers.recreateInstances)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the instance group manager
   * resides.
   * @param string $instanceGroupManager The name of the instance group manager.
   * @param Google_Service_Replicapool_InstanceGroupManagersRecreateInstancesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Operation
   */
  public function recreateInstances($project, $zone, $instanceGroupManager, Google_Service_Replicapool_InstanceGroupManagersRecreateInstancesRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('recreateInstances', array($params), "Google_Service_Replicapool_Operation");
  }
  /**
   * Resizes the managed instance group up or down. If resized up, new instances
   * are created using the current instance template. If resized down, instances
   * are removed in the order outlined in Resizing a managed instance group.
   * (instanceGroupManagers.resize)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the instance group manager
   * resides.
   * @param string $instanceGroupManager The name of the instance group manager.
   * @param int $size Number of instances that should exist in this Instance Group
   * Manager.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Operation
   */
  public function resize($project, $zone, $instanceGroupManager, $size, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'size' => $size);
    $params = array_merge($params, $optParams);
    return $this->call('resize', array($params), "Google_Service_Replicapool_Operation");
  }
  /**
   * Sets the instance template to use when creating new instances in this group.
   * Existing instances are not affected.
   * (instanceGroupManagers.setInstanceTemplate)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the instance group manager
   * resides.
   * @param string $instanceGroupManager The name of the instance group manager.
   * @param Google_Service_Replicapool_InstanceGroupManagersSetInstanceTemplateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Operation
   */
  public function setInstanceTemplate($project, $zone, $instanceGroupManager, Google_Service_Replicapool_InstanceGroupManagersSetInstanceTemplateRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setInstanceTemplate', array($params), "Google_Service_Replicapool_Operation");
  }
  /**
   * Modifies the target pools to which all new instances in this group are
   * assigned. Existing instances in the group are not affected.
   * (instanceGroupManagers.setTargetPools)
   *
   * @param string $project The Google Developers Console project name.
   * @param string $zone The name of the zone in which the instance group manager
   * resides.
   * @param string $instanceGroupManager The name of the instance group manager.
   * @param Google_Service_Replicapool_InstanceGroupManagersSetTargetPoolsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Replicapool_Operation
   */
  public function setTargetPools($project, $zone, $instanceGroupManager, Google_Service_Replicapool_InstanceGroupManagersSetTargetPoolsRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setTargetPools', array($params), "Google_Service_Replicapool_Operation");
  }
}
