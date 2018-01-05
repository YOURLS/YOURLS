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
 * The "clusters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $clusters = $containerService->clusters;
 *  </code>
 */
class Google_Service_Container_Resource_ProjectsZonesClusters extends Google_Service_Resource
{
  /**
   * Sets the addons of a specific cluster. (clusters.addons)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to upgrade.
   * @param Google_Service_Container_SetAddonsConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function addons($projectId, $zone, $clusterId, Google_Service_Container_SetAddonsConfigRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addons', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Completes master IP rotation. (clusters.completeIpRotation)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster.
   * @param Google_Service_Container_CompleteIPRotationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function completeIpRotation($projectId, $zone, $clusterId, Google_Service_Container_CompleteIPRotationRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('completeIpRotation', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Creates a cluster, consisting of the specified number and type of Google
   * Compute Engine instances.
   *
   * By default, the cluster is created in the project's [default
   * network](/compute/docs/networks-and-firewalls#networks).
   *
   * One firewall is added for the cluster. After cluster creation, the cluster
   * creates routes for each node to allow the containers on that node to
   * communicate with all other instances in the cluster.
   *
   * Finally, an entry is added to the project's global metadata indicating which
   * CIDR range is being used by the cluster. (clusters.create)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param Google_Service_Container_CreateClusterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function create($projectId, $zone, Google_Service_Container_CreateClusterRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Deletes the cluster, including the Kubernetes endpoint and all worker nodes.
   *
   * Firewalls and routes that were configured during cluster creation are also
   * deleted.
   *
   * Other Google Compute Engine resources that might be in use by the cluster
   * (e.g. load balancer resources) will not be deleted if they weren't present at
   * the initial create time. (clusters.delete)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function delete($projectId, $zone, $clusterId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Gets the details of a specific cluster. (clusters.get)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Cluster
   */
  public function get($projectId, $zone, $clusterId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Container_Cluster");
  }
  /**
   * Enables or disables the ABAC authorization mechanism on a cluster.
   * (clusters.legacyAbac)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to update.
   * @param Google_Service_Container_SetLegacyAbacRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function legacyAbac($projectId, $zone, $clusterId, Google_Service_Container_SetLegacyAbacRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('legacyAbac', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Lists all clusters owned by a project in either the specified zone or all
   * zones. (clusters.listProjectsZonesClusters)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides, or "-"
   * for all zones.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_ListClustersResponse
   */
  public function listProjectsZonesClusters($projectId, $zone, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Container_ListClustersResponse");
  }
  /**
   * Sets the locations of a specific cluster. (clusters.locations)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to upgrade.
   * @param Google_Service_Container_SetLocationsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function locations($projectId, $zone, $clusterId, Google_Service_Container_SetLocationsRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('locations', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets the logging service of a specific cluster. (clusters.logging)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to upgrade.
   * @param Google_Service_Container_SetLoggingServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function logging($projectId, $zone, $clusterId, Google_Service_Container_SetLoggingServiceRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('logging', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Updates the master of a specific cluster. (clusters.master)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to upgrade.
   * @param Google_Service_Container_UpdateMasterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function master($projectId, $zone, $clusterId, Google_Service_Container_UpdateMasterRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('master', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets the monitoring service of a specific cluster. (clusters.monitoring)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to upgrade.
   * @param Google_Service_Container_SetMonitoringServiceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function monitoring($projectId, $zone, $clusterId, Google_Service_Container_SetMonitoringServiceRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('monitoring', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets labels on a cluster. (clusters.resourceLabels)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster.
   * @param Google_Service_Container_SetLabelsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function resourceLabels($projectId, $zone, $clusterId, Google_Service_Container_SetLabelsRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resourceLabels', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Sets the maintenance policy for a cluster. (clusters.setMaintenancePolicy)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to update.
   * @param Google_Service_Container_SetMaintenancePolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setMaintenancePolicy($projectId, $zone, $clusterId, Google_Service_Container_SetMaintenancePolicyRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setMaintenancePolicy', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Used to set master auth materials. Currently supports :- Changing the admin
   * password of a specific cluster. This can be either via password generation or
   * explicitly set the password. (clusters.setMasterAuth)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to upgrade.
   * @param Google_Service_Container_SetMasterAuthRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setMasterAuth($projectId, $zone, $clusterId, Google_Service_Container_SetMasterAuthRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setMasterAuth', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Enables/Disables Network Policy for a cluster. (clusters.setNetworkPolicy)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster.
   * @param Google_Service_Container_SetNetworkPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function setNetworkPolicy($projectId, $zone, $clusterId, Google_Service_Container_SetNetworkPolicyRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setNetworkPolicy', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Start master IP rotation. (clusters.startIpRotation)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://developers.google.com/console/help/new/#projectnumber).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster.
   * @param Google_Service_Container_StartIPRotationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function startIpRotation($projectId, $zone, $clusterId, Google_Service_Container_StartIPRotationRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('startIpRotation', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Updates the settings of a specific cluster. (clusters.update)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $clusterId The name of the cluster to upgrade.
   * @param Google_Service_Container_UpdateClusterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function update($projectId, $zone, $clusterId, Google_Service_Container_UpdateClusterRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Container_Operation");
  }
}
