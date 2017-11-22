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
 * The "roles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $roles = $adminService->roles;
 *  </code>
 */
class Google_Service_Directory_Resource_Roles extends Google_Service_Resource
{
  /**
   * Deletes a role. (roles.delete)
   *
   * @param string $customer Immutable ID of the G Suite account.
   * @param string $roleId Immutable ID of the role.
   * @param array $optParams Optional parameters.
   */
  public function delete($customer, $roleId, $optParams = array())
  {
    $params = array('customer' => $customer, 'roleId' => $roleId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a role. (roles.get)
   *
   * @param string $customer Immutable ID of the G Suite account.
   * @param string $roleId Immutable ID of the role.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Role
   */
  public function get($customer, $roleId, $optParams = array())
  {
    $params = array('customer' => $customer, 'roleId' => $roleId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_Role");
  }
  /**
   * Creates a role. (roles.insert)
   *
   * @param string $customer Immutable ID of the G Suite account.
   * @param Google_Service_Directory_Role $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Role
   */
  public function insert($customer, Google_Service_Directory_Role $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_Role");
  }
  /**
   * Retrieves a paginated list of all the roles in a domain. (roles.listRoles)
   *
   * @param string $customer Immutable ID of the G Suite account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Token to specify the next page in the list.
   * @return Google_Service_Directory_Roles
   */
  public function listRoles($customer, $optParams = array())
  {
    $params = array('customer' => $customer);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Roles");
  }
  /**
   * Updates a role. This method supports patch semantics. (roles.patch)
   *
   * @param string $customer Immutable ID of the G Suite account.
   * @param string $roleId Immutable ID of the role.
   * @param Google_Service_Directory_Role $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Role
   */
  public function patch($customer, $roleId, Google_Service_Directory_Role $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'roleId' => $roleId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_Role");
  }
  /**
   * Updates a role. (roles.update)
   *
   * @param string $customer Immutable ID of the G Suite account.
   * @param string $roleId Immutable ID of the role.
   * @param Google_Service_Directory_Role $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Role
   */
  public function update($customer, $roleId, Google_Service_Directory_Role $postBody, $optParams = array())
  {
    $params = array('customer' => $customer, 'roleId' => $roleId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_Role");
  }
}
