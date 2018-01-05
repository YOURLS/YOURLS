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
 * The "remarketingLists" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $remarketingLists = $dfareportingService->remarketingLists;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_RemarketingLists extends Google_Service_Resource
{
  /**
   * Gets one remarketing list by ID. (remarketingLists.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Remarketing list ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_RemarketingList
   */
  public function get($profileId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_RemarketingList");
  }
  /**
   * Inserts a new remarketing list. (remarketingLists.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_RemarketingList $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_RemarketingList
   */
  public function insert($profileId, Google_Service_Dfareporting_RemarketingList $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Dfareporting_RemarketingList");
  }
  /**
   * Retrieves a list of remarketing lists, possibly filtered. This method
   * supports paging. (remarketingLists.listRemarketingLists)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $advertiserId Select only remarketing lists owned by this
   * advertiser.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool active Select only active or only inactive remarketing lists.
   * @opt_param string floodlightActivityId Select only remarketing lists that
   * have this floodlight activity ID.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string name Allows searching for objects by name or ID. Wildcards
   * (*) are allowed. For example, "remarketing list*2015" will return objects
   * with names like "remarketing list June 2015", "remarketing list April 2015",
   * or simply "remarketing list 2015". Most of the searches also add wildcards
   * implicitly at the start and the end of the search string. For example, a
   * search string of "remarketing list" will match objects with name "my
   * remarketing list", "remarketing list 2015", or simply "remarketing list".
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return Google_Service_Dfareporting_RemarketingListsListResponse
   */
  public function listRemarketingLists($profileId, $advertiserId, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'advertiserId' => $advertiserId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_RemarketingListsListResponse");
  }
  /**
   * Updates an existing remarketing list. This method supports patch semantics.
   * (remarketingLists.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Remarketing list ID.
   * @param Google_Service_Dfareporting_RemarketingList $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_RemarketingList
   */
  public function patch($profileId, $id, Google_Service_Dfareporting_RemarketingList $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dfareporting_RemarketingList");
  }
  /**
   * Updates an existing remarketing list. (remarketingLists.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_RemarketingList $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_RemarketingList
   */
  public function update($profileId, Google_Service_Dfareporting_RemarketingList $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Dfareporting_RemarketingList");
  }
}
