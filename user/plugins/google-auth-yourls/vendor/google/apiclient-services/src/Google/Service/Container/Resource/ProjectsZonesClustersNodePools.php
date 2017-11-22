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
 * The "nodePools" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $nodePools = $containerService->nodePools;
 *  </code>
 */
class Google_Service_Container_Resource_ProjectsZonesClustersNodePools extends Google_Service_Resource
{
  /**
   * Sets the autoscaling settings of a specific node pool.
   * (nodePools.autoscaling)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to upgrade.
   * @param string $nodePoolId The name of the node pool to upgrade.
   * @param Google_Service_Container_SetNodePoolAutoscalingRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function autoscaling($projectId, $zone, $clusterId, $nodePoolId, Google_Service_Container_SetNodePoolAutoscalingRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'nodePoolId' => $nodePoolId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('autoscaling', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Creates a node pool for a cluster. (nodePools.create)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster.
   * @param Google_Service_Container_CreateNodePoolRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function create($projectId, $zone, $clusterId, Google_Service_Container_CreateNodePoolRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Deletes a node pool from a cluster. (nodePools.delete)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster.
   * @param string $nodePoolId The name of the node pool to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function delete($projectId, $zone, $clusterId, $nodePoolId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'nodePoolId' => $nodePoolId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Retrieves the node pool requested. (nodePools.get)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster.
   * @param string $nodePoolId The name of the node pool.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_NodePool
   */
  public function get($projectId, $zone, $clusterId, $nodePoolId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'nodePoolId' => $nodePoolId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Container_NodePool");
  }
  /**
   * Lists the node pools for a cluster.
   * (nodePools.listProjectsZonesClustersNodePools)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_ListNodePoolsResponse
   */
  public function listProjectsZonesClustersNodePools($projectId, $zone, $clusterId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Container_ListNodePoolsResponse");
  }
  /**
   * Roll back the previously Aborted or Failed NodePool upgrade. This will be an
   * no-op if the last upgrade successfully completed. (nodePools.rollback)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to rollback.
   * @param string $nodePoolId The name of the node pool to rollback.
   * @param Google_Service_Container_RollbackNodePoolUpgradeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function rollback($projectId, $zone, $clusterId, $nodePoolId, Google_Service_Container_RollbackNodePoolUpgradeRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'nodePoolId' => $nodePoolId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('rollback', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets the NodeManagement options for a node pool. (nodePools.setManagement)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to update.
   * @param string $nodePoolId The name of the node pool to update.
   * @param Google_Service_Container_SetNodePoolManagementRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setManagement($projectId, $zone, $clusterId, $nodePoolId, Google_Service_Container_SetNodePoolManagementRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'nodePoolId' => $nodePoolId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setManagement', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets the size of a specific node pool. (nodePools.setSize)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to update.
   * @param string $nodePoolId The name of the node pool to update.
   * @param Google_Service_Container_SetNodePoolSizeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setSize($projectId, $zone, $clusterId, $nodePoolId, Google_Service_Container_SetNodePoolSizeRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'nodePoolId' => $nodePoolId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setSize', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Updates the version and/or image type of a specific node pool.
   * (nodePools.update)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to upgrade.
   * @param string $nodePoolId The name of the node pool to upgrade.
   * @param Google_Service_Container_UpdateNodePoolRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function update($projectId, $zone, $clusterId, $nodePoolId, Google_Service_Container_UpdateNodePoolRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'nodePoolId' => $nodePoolId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Container_Operation");
  }
}
