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
 * The "floodlightActivityGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $floodlightActivityGroups = $dfareportingService->floodlightActivityGroups;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_FloodlightActivityGroups extends Google_Service_Resource
{
  /**
   * Gets one floodlight activity group by ID. (floodlightActivityGroups.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Floodlight activity Group ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_FloodlightActivityGroup
   */
  public function get($profileId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_FloodlightActivityGroup");
  }
  /**
   * Inserts a new floodlight activity group. (floodlightActivityGroups.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_FloodlightActivityGroup $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_FloodlightActivityGroup
   */
  public function insert($profileId, Google_Service_Dfareporting_FloodlightActivityGroup $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Dfareporting_FloodlightActivityGroup");
  }
  /**
   * Retrieves a list of floodlight activity groups, possibly filtered. This
   * method supports paging.
   * (floodlightActivityGroups.listFloodlightActivityGroups)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId Select only floodlight activity groups with
   * the specified advertiser ID. Must specify either advertiserId or
   * floodlightConfigurationId for a non-empty result.
   * @opt_param string floodlightConfigurationId Select only floodlight activity
   * groups with the specified floodlight configuration ID. Must specify either
   * advertiserId, or floodlightConfigurationId for a non-empty result.
   * @opt_param string ids Select only floodlight activity groups with the
   * specified IDs. Must specify either advertiserId or floodlightConfigurationId
   * for a non-empty result.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for objects by name or ID.
   * Wildcards (*) are allowed. For example, "floodlightactivitygroup*2015" will
   * return objects with names like "floodlightactivitygroup June 2015",
   * "floodlightactivitygroup April 2015", or simply "floodlightactivitygroup
   * 2015". Most of the searches also add wildcards implicitly at the start and
   * the end of the search string. For example, a search string of
   * "floodlightactivitygroup" will match objects with name "my
   * floodlightactivitygroup activity", "floodlightactivitygroup 2015", or simply
   * "floodlightactivitygroup".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @opt_param string type Select only floodlight activity groups with the
   * specified floodlight activity group type.
   * @return Google_Service_Dfareporting_FloodlightActivityGroupsListResponse
   */
  public function listFloodlightActivityGroups($profileId, $optParams = array())
  {
    $params = array('profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_FloodlightActivityGroupsListResponse");
  }
  /**
   * Updates an existing floodlight activity group. This method supports patch
   * semantics. (floodlightActivityGroups.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Floodlight activity Group ID.
   * @param Google_Service_Dfareporting_FloodlightActivityGroup $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_FloodlightActivityGroup
   */
  public function patch($profileId, $id, Google_Service_Dfareporting_FloodlightActivityGroup $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dfareporting_FloodlightActivityGroup");
  }
  /**
   * Updates an existing floodlight activity group.
   * (floodlightActivityGroups.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_FloodlightActivityGroup $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_FloodlightActivityGroup
   */
  public function update($profileId, Google_Service_Dfareporting_FloodlightActivityGroup $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Dfareporting_FloodlightActivityGroup");
  }
}
