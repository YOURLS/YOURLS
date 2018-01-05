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
 * The "orders" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $orders = $dfareportingService->orders;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_Orders extends Google_Service_Resource
{
  /**
   * Gets one order by ID. (orders.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $projectId Project ID for orders.
   * @param string $id Order ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_Order
   */
  public function get($profileId, $projectId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'projectId' => $projectId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_Order");
  }
  /**
   * Retrieves a list of orders, possibly filtered. This method supports paging.
   * (orders.listOrders)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $projectId Project ID for orders.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ids Select only orders with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for orders by name or ID.
   * Wildcards (*) are allowed. For example, "order*2015" will return orders with
   * names like "order June 2015", "order April 2015", or simply "order 2015".
   * Most of the searches also add wildcards implicitly at the start and the end
   * of the search string. For example, a search string of "order" will match
   * orders with name "my order", "order 2015", or simply "order".
   * @opt_param string siteId Select only orders that are associated with these
   * site IDs.
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return Google_Service_Dfareporting_OrdersListResponse
   */
  public function listOrders($profileId, $projectId, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_OrdersListResponse");
  }
}
