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
 *   $dataprocService = new Google_Service_Dataproc(...);
 *   $clusters = $dataprocService->clusters;
 *  </code>
 */
class Google_Service_Dataproc_Resource_ProjectsRegionsClusters extends Google_Service_Resource
{
  /**
   * Creates a cluster in a project. (clusters.create)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the cluster belongs to.
   * @param string $region Required. The Cloud Dataproc region in which to handle
   * the request.
   * @param Google_Service_Dataproc_Cluster $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Operation
   */
  public function create($projectId, $region, Google_Service_Dataproc_Cluster $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dataproc_Operation");
  }
  /**
   * Deletes a cluster in a project. (clusters.delete)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the cluster belongs to.
   * @param string $region Required. The Cloud Dataproc region in which to handle
   * the request.
   * @param string $clusterName Required. The cluster name.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Operation
   */
  public function delete($projectId, $region, $clusterName, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'clusterName' => $clusterName);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Dataproc_Operation");
  }
  /**
   * Gets cluster diagnostic information. After the operation completes, the
   * Operation.response field contains DiagnoseClusterOutputLocation.
   * (clusters.diagnose)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the cluster belongs to.
   * @param string $region Required. The Cloud Dataproc region in which to handle
   * the request.
   * @param string $clusterName Required. The cluster name.
   * @param Google_Service_Dataproc_DiagnoseClusterRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Operation
   */
  public function diagnose($projectId, $region, $clusterName, Google_Service_Dataproc_DiagnoseClusterRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'clusterName' => $clusterName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('diagnose', array($params), "Google_Service_Dataproc_Operation");
  }
  /**
   * Gets the resource representation for a cluster in a project. (clusters.get)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the cluster belongs to.
   * @param string $region Required. The Cloud Dataproc region in which to handle
   * the request.
   * @param string $clusterName Required. The cluster name.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Cluster
   */
  public function get($projectId, $region, $clusterName, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'clusterName' => $clusterName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dataproc_Cluster");
  }
  /**
   * Lists all regions/{region}/clusters in a project.
   * (clusters.listProjectsRegionsClusters)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the cluster belongs to.
   * @param string $region Required. The Cloud Dataproc region in which to handle
   * the request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional. The standard List page token.
   * @opt_param int pageSize Optional. The standard List page size.
   * @opt_param string filter Optional. A filter constraining the clusters to
   * list. Filters are case-sensitive and have the following syntax:field = value
   * AND field = value ...where field is one of status.state, clusterName, or
   * labels.[KEY], and [KEY] is a label key. value can be * to match all values.
   * status.state can be one of the following: ACTIVE, INACTIVE, CREATING,
   * RUNNING, ERROR, DELETING, or UPDATING. ACTIVE contains the CREATING,
   * UPDATING, and RUNNING states. INACTIVE contains the DELETING and ERROR
   * states. clusterName is the name of the cluster provided at creation time.
   * Only the logical AND operator is supported; space-separated items are treated
   * as having an implicit AND operator.Example filter:status.state = ACTIVE AND
   * clusterName = mycluster AND labels.env = staging AND labels.starred = *
   * @return Google_Service_Dataproc_ListClustersResponse
   */
  public function listProjectsRegionsClusters($projectId, $region, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dataproc_ListClustersResponse");
  }
  /**
   * Updates a cluster in a project. (clusters.patch)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project the cluster belongs to.
   * @param string $region Required. The Cloud Dataproc region in which to handle
   * the request.
   * @param string $clusterName Required. The cluster name.
   * @param Google_Service_Dataproc_Cluster $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Specifies the path, relative to
   * Cluster, of the field to update. For example, to change the number of workers
   * in a cluster to 5, the update_mask parameter would be specified as
   * config.worker_config.num_instances, and the PATCH request body would specify
   * the new value, as follows: {   "config":{     "workerConfig":{
   * "numInstances":"5"     }   } } Similarly, to change the number of preemptible
   * workers in a cluster to 5, the update_mask parameter would be
   * config.secondary_worker_config.num_instances, and the PATCH request body
   * would be set as follows: {   "config":{     "secondaryWorkerConfig":{
   * "numInstances":"5"     }   } } Note: Currently, only the following fields can
   * be updated:      Mask  Purpose      labels  Update labels
   * config.worker_config.num_instances  Resize primary worker group
   * config.secondary_worker_config.num_instances  Resize secondary worker group
   * @return Google_Service_Dataproc_Operation
   */
  public function patch($projectId, $region, $clusterName, Google_Service_Dataproc_Cluster $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'clusterName' => $clusterName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dataproc_Operation");
  }
}
