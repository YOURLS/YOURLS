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
 * The "userRoles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $userRoles = $dfareportingService->userRoles;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_UserRoles extends Google_Service_Resource
{
  /**
   * Deletes an existing user role. (userRoles.delete)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id User role ID.
   * @param array $optParams Optional parameters.
   */
  public function delete($profileId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Gets one user role by ID. (userRoles.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id User role ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_UserRole
   */
  public function get($profileId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_UserRole");
  }
  /**
   * Inserts a new user role. (userRoles.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_UserRole $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_UserRole
   */
  public function insert($profileId, Google_Service_Dfareporting_UserRole $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Dfareporting_UserRole");
  }
  /**
   * Retrieves a list of user roles, possibly filtered. This method supports
   * paging. (userRoles.listUserRoles)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool accountUserRoleOnly Select only account level user roles not
   * associated with any specific subaccount.
   * @opt_param string ids Select only user roles with the specified IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for objects by name or ID.
   * Wildcards (*) are allowed. For example, "userrole*2015" will return objects
   * with names like "userrole June 2015", "userrole April 2015", or simply
   * "userrole 2015". Most of the searches also add wildcards implicitly at the
   * start and the end of the search string. For example, a search string of
   * "userrole" will match objects with name "my userrole", "userrole 2015", or
   * simply "userrole".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @opt_param string subaccountId Select only user roles that belong to this
   * subaccount.
   * @return Google_Service_Dfareporting_UserRolesListResponse
   */
  public function listUserRoles($profileId, $optParams = array())
  {
    $params = array('profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_UserRolesListResponse");
  }
  /**
   * Updates an existing user role. This method supports patch semantics.
   * (userRoles.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id User role ID.
   * @param Google_Service_Dfareporting_UserRole $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_UserRole
   */
  public function patch($profileId, $id, Google_Service_Dfareporting_UserRole $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dfareporting_UserRole");
  }
  /**
   * Updates an existing user role. (userRoles.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_UserRole $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_UserRole
   */
  public function update($profileId, Google_Service_Dfareporting_UserRole $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Dfareporting_UserRole");
  }
}
