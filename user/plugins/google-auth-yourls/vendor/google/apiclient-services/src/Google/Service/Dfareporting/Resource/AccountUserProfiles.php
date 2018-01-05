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
 * The "accountUserProfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $accountUserProfiles = $dfareportingService->accountUserProfiles;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_AccountUserProfiles extends Google_Service_Resource
{
  /**
   * Gets one account user profile by ID. (accountUserProfiles.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id User profile ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_AccountUserProfile
   */
  public function get($profileId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_AccountUserProfile");
  }
  /**
   * Inserts a new account user profile. (accountUserProfiles.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_AccountUserProfile $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_AccountUserProfile
   */
  public function insert($profileId, Google_Service_Dfareporting_AccountUserProfile $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Dfareporting_AccountUserProfile");
  }
  /**
   * Retrieves a list of account user profiles, possibly filtered. This method
   * supports paging. (accountUserProfiles.listAccountUserProfiles)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool active Select only active user profiles.
   * @opt_param string ids Select only user profiles with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for objects by name, ID or
   * email. Wildcards (*) are allowed. For example, "user profile*2015" will
   * return objects with names like "user profile June 2015", "user profile April
   * 2015", or simply "user profile 2015". Most of the searches also add wildcards
   * implicitly at the start and the end of the search string. For example, a
   * search string of "user profile" will match objects with name "my user
   * profile", "user profile 2015", or simply "user profile".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @opt_param string subaccountId Select only user profiles with the specified
   * subaccount ID.
   * @opt_param string userRoleId Select only user profiles with the specified
   * user role ID.
   * @return Google_Service_Dfareporting_AccountUserProfilesListResponse
   */
  public function listAccountUserProfiles($profileId, $optParams = array())
  {
    $params = array('profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_AccountUserProfilesListResponse");
  }
  /**
   * Updates an existing account user profile. This method supports patch
   * semantics. (accountUserProfiles.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id User profile ID.
   * @param Google_Service_Dfareporting_AccountUserProfile $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_AccountUserProfile
   */
  public function patch($profileId, $id, Google_Service_Dfareporting_AccountUserProfile $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dfareporting_AccountUserProfile");
  }
  /**
   * Updates an existing account user profile. (accountUserProfiles.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_AccountUserProfile $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_AccountUserProfile
   */
  public function update($profileId, Google_Service_Dfareporting_AccountUserProfile $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Dfareporting_AccountUserProfile");
  }
}
