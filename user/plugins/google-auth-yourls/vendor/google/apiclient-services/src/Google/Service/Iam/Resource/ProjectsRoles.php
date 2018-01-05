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
 *   $iamService = new Google_Service_Iam(...);
 *   $roles = $iamService->roles;
 *  </code>
 */
class Google_Service_Iam_Resource_ProjectsRoles extends Google_Service_Resource
{
  /**
   * Creates a new Role. (roles.create)
   *
   * @param string $parent The resource name of the parent resource in one of the
   * following formats: `organizations/{ORGANIZATION_ID}` `projects/{PROJECT_ID}`
   * @param Google_Service_Iam_CreateRoleRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_Role
   */
  public function create($parent, Google_Service_Iam_CreateRoleRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Iam_Role");
  }
  /**
   * Soft deletes a role. The role is suspended and cannot be used to create new
   * IAM Policy Bindings. The Role will not be included in `ListRoles()` unless
   * `show_deleted` is set in the `ListRolesRequest`. The Role contains the
   * deleted boolean set. Existing Bindings remains, but are inactive. The Role
   * can be undeleted within 7 days. After 7 days the Role is deleted and all
   * Bindings associated with the role are removed. (roles.delete)
   *
   * @param string $name The resource name of the role in one of the following
   * formats: `organizations/{ORGANIZATION_ID}/roles/{ROLE_NAME}`
   * `projects/{PROJECT_ID}/roles/{ROLE_NAME}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag Used to perform a consistent read-modify-write.
   * @return Google_Service_Iam_Role
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Iam_Role");
  }
  /**
   * Gets a Role definition. (roles.get)
   *
   * @param string $name The resource name of the role in one of the following
   * formats: `roles/{ROLE_NAME}`
   * `organizations/{ORGANIZATION_ID}/roles/{ROLE_NAME}`
   * `projects/{PROJECT_ID}/roles/{ROLE_NAME}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_Role
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Iam_Role");
  }
  /**
   * Lists the Roles defined on a resource. (roles.listProjectsRoles)
   *
   * @param string $parent The resource name of the parent resource in one of the
   * following formats: `` (empty string) -- this refers to curated roles.
   * `organizations/{ORGANIZATION_ID}` `projects/{PROJECT_ID}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional limit on the number of roles to include in
   * the response.
   * @opt_param string view Optional view for the returned Role objects.
   * @opt_param bool showDeleted Include Roles that have been deleted.
   * @opt_param string pageToken Optional pagination token returned in an earlier
   * ListRolesResponse.
   * @return Google_Service_Iam_ListRolesResponse
   */
  public function listProjectsRoles($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Iam_ListRolesResponse");
  }
  /**
   * Updates a Role definition. (roles.patch)
   *
   * @param string $name The resource name of the role in one of the following
   * formats: `roles/{ROLE_NAME}`
   * `organizations/{ORGANIZATION_ID}/roles/{ROLE_NAME}`
   * `projects/{PROJECT_ID}/roles/{ROLE_NAME}`
   * @param Google_Service_Iam_Role $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask A mask describing which fields in the Role have
   * changed.
   * @return Google_Service_Iam_Role
   */
  public function patch($name, Google_Service_Iam_Role $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Iam_Role");
  }
  /**
   * Undelete a Role, bringing it back in its previous state. (roles.undelete)
   *
   * @param string $name The resource name of the role in one of the following
   * formats: `organizations/{ORGANIZATION_ID}/roles/{ROLE_NAME}`
   * `projects/{PROJECT_ID}/roles/{ROLE_NAME}`
   * @param Google_Service_Iam_UndeleteRoleRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_Role
   */
  public function undelete($name, Google_Service_Iam_UndeleteRoleRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params), "Google_Service_Iam_Role");
  }
}
