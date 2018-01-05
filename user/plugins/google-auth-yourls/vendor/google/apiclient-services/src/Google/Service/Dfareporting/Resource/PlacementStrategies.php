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
 * The "placementStrategies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $placementStrategies = $dfareportingService->placementStrategies;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_PlacementStrategies extends Google_Service_Resource
{
  /**
   * Deletes an existing placement strategy. (placementStrategies.delete)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Placement strategy ID.
   * @param array $optParams Optional parameters.
   */
  public function delete($profileId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets one placement strategy by ID. (placementStrategies.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Placement strategy ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_PlacementStrategy
   */
  public function get($profileId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_PlacementStrategy");
  }
  /**
   * Inserts a new placement strategy. (placementStrategies.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_PlacementStrategy $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_PlacementStrategy
   */
  public function insert($profileId, Google_Service_Dfareporting_PlacementStrategy $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Dfareporting_PlacementStrategy");
  }
  /**
   * Retrieves a list of placement strategies, possibly filtered. This method
   * supports paging. (placementStrategies.listPlacementStrategies)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ids Select only placement strategies with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for objects by name or ID.
   * Wildcards (*) are allowed. For example, "placementstrategy*2015" will return
   * objects with names like "placementstrategy June 2015", "placementstrategy
   * April 2015", or simply "placementstrategy 2015". Most of the searches also
   * add wildcards implicitly at the start and the end of the search string. For
   * example, a search string of "placementstrategy" will match objects with name
   * "my placementstrategy", "placementstrategy 2015", or simply
   * "placementstrategy".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return Google_Service_Dfareporting_PlacementStrategiesListResponse
   */
  public function listPlacementStrategies($profileId, $optParams = array())
  {
    $params = array('profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_PlacementStrategiesListResponse");
  }
  /**
   * Updates an existing placement strategy. This method supports patch semantics.
   * (placementStrategies.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Placement strategy ID.
   * @param Google_Service_Dfareporting_PlacementStrategy $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_PlacementStrategy
   */
  public function patch($profileId, $id, Google_Service_Dfareporting_PlacementStrategy $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dfareporting_PlacementStrategy");
  }
  /**
   * Updates an existing placement strategy. (placementStrategies.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_PlacementStrategy $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_PlacementStrategy
   */
  public function update($profileId, Google_Service_Dfareporting_PlacementStrategy $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Dfareporting_PlacementStrategy");
  }
}
