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
 * The "roleAssignments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $roleAssignments = $adminService->roleAssignments;
 *  </code>
 */
class Google_Service_Directory_Resource_RoleAssignments extends Google_Service_Resource
{
  /**
   * Deletes a role assignment. (roleAssignments.delete)
   *
   * @param string $customer Immutable ID of the G Suite account.
   * @param string $roleAssignmentId Immutable ID of the role assignment.
   * @param array $optParams Optional parameters.
   */
  public function delete($customer, $roleAssignmentId, $optParams = array())
  {
    $params = array('customer' => $customer, 'roleAssignmentId' => $roleAssignmentId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieve a role assignment. (roleAssignments.get)
   *
   * @param string $customer Immutable ID of the G Suite account.
   * @param string $roleAssignmentId Immutable ID of the role assignment.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_RoleAssignment
   */
  public function get($customer, $roleAssignmentId, $optParams = array())
  {
    $params = array('customer' => $customer, 'roleAssignmentId' => $roleAssignmentId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_RoleAssignment");
  }
  /**
   * Creates a role assignment. (roleAssignments.insert)
   *
   * @param string $customer Immutable ID of the G Suite account.
   * @param Google_Service_Directory_RoleAssignment $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_RoleAssignment
   */
  public function insert($customer, Google_Service_Directory_RoleAssignment $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_RoleAssignment");
  }
  /**
   * Retrieves a paginated list of all roleAssignments.
   * (roleAssignments.listRoleAssignments)
   *
   * @param string $customer Immutable ID of the G Suite account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Token to specify the next page in the list.
   * @opt_param string roleId Immutable ID of a role. If included in the request,
   * returns only role assignments containing this role ID.
   * @opt_param string userKey The user's primary email address, alias email
   * address, or unique user ID. If included in the request, returns role
   * assignments only for this user.
   * @return Google_Service_Directory_RoleAssignments
   */
  public function listRoleAssignments($customer, $optParams = array())
  {
    $params = array('customer' => $customer);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_RoleAssignments");
  }
}
