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
 * The "storelayoutclusters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google_Service_AndroidEnterprise(...);
 *   $storelayoutclusters = $androidenterpriseService->storelayoutclusters;
 *  </code>
 */
class Google_Service_AndroidEnterprise_Resource_Storelayoutclusters extends Google_Service_Resource
{
  /**
   * Deletes a cluster. (storelayoutclusters.delete)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $pageId The ID of the page.
   * @param string $clusterId The ID of the cluster.
   * @param array $optParams Optional parameters.
   */
  public function delete($enterpriseId, $pageId, $clusterId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'pageId' => $pageId, 'clusterId' => $clusterId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves details of a cluster. (storelayoutclusters.get)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $pageId The ID of the page.
   * @param string $clusterId The ID of the cluster.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_StoreCluster
   */
  public function get($enterpriseId, $pageId, $clusterId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'pageId' => $pageId, 'clusterId' => $clusterId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidEnterprise_StoreCluster");
  }
  /**
   * Inserts a new cluster in a page. (storelayoutclusters.insert)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $pageId The ID of the page.
   * @param Google_Service_AndroidEnterprise_StoreCluster $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_StoreCluster
   */
  public function insert($enterpriseId, $pageId, Google_Service_AndroidEnterprise_StoreCluster $postBody, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'pageId' => $pageId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_AndroidEnterprise_StoreCluster");
  }
  /**
   * Retrieves the details of all clusters on the specified page.
   * (storelayoutclusters.listStorelayoutclusters)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $pageId The ID of the page.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_StoreLayoutClustersListResponse
   */
  public function listStorelayoutclusters($enterpriseId, $pageId, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'pageId' => $pageId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidEnterprise_StoreLayoutClustersListResponse");
  }
  /**
   * Updates a cluster. This method supports patch semantics.
   * (storelayoutclusters.patch)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $pageId The ID of the page.
   * @param string $clusterId The ID of the cluster.
   * @param Google_Service_AndroidEnterprise_StoreCluster $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_StoreCluster
   */
  public function patch($enterpriseId, $pageId, $clusterId, Google_Service_AndroidEnterprise_StoreCluster $postBody, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'pageId' => $pageId, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AndroidEnterprise_StoreCluster");
  }
  /**
   * Updates a cluster. (storelayoutclusters.update)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $pageId The ID of the page.
   * @param string $clusterId The ID of the cluster.
   * @param Google_Service_AndroidEnterprise_StoreCluster $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidEnterprise_StoreCluster
   */
  public function update($enterpriseId, $pageId, $clusterId, Google_Service_AndroidEnterprise_StoreCluster $postBody, $optParams = array())
  {
    $params = array('enterpriseId' => $enterpriseId, 'pageId' => $pageId, 'clusterId' => $clusterId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AndroidEnterprise_StoreCluster");
  }
}
