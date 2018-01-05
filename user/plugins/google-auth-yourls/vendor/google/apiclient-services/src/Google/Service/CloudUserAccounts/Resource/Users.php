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
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $clouduseraccountsService = new Google_Service_CloudUserAccounts(...);
 *   $users = $clouduseraccountsService->users;
 *  </code>
 */
class Google_Service_CloudUserAccounts_Resource_Users extends Google_Service_Resource
{
  /**
   * Adds a public key to the specified User resource with the data included in
   * the request. (users.addPublicKey)
   *
   * @param string $project Project ID for this request.
   * @param string $user Name of the user for this request.
   * @param Google_Service_CloudUserAccounts_PublicKey $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudUserAccounts_Operation
   */
  public function addPublicKey($project, $user, Google_Service_CloudUserAccounts_PublicKey $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'user' => $user, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addPublicKey', array($params), "Google_Service_CloudUserAccounts_Operation");
  }
  /**
   * Deletes the specified User resource. (users.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $user Name of the user resource to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudUserAccounts_Operation
   */
  public function delete($project, $user, $optParams = array())
  {
    $params = array('project' => $project, 'user' => $user);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudUserAccounts_Operation");
  }
  /**
   * Returns the specified User resource. (users.get)
   *
   * @param string $project Project ID for this request.
   * @param string $user Name of the user resource to return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudUserAccounts_User
   */
  public function get($project, $user, $optParams = array())
  {
    $params = array('project' => $project, 'user' => $user);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudUserAccounts_User");
  }
  /**
   * Gets the access control policy for a resource. May be empty if no such policy
   * or resource exists. (users.getIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name of the resource for this request.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudUserAccounts_Policy
   */
  public function getIamPolicy($project, $resource, $optParams = array())
  {
    $params = array('project' => $project, 'resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudUserAccounts_Policy");
  }
  /**
   * Creates a User resource in the specified project using the data included in
   * the request. (users.insert)
   *
   * @param string $project Project ID for this request.
   * @param Google_Service_CloudUserAccounts_User $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudUserAccounts_Operation
   */
  public function insert($project, Google_Service_CloudUserAccounts_User $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_CloudUserAccounts_Operation");
  }
  /**
   * Retrieves a list of users contained within the specified project.
   * (users.listUsers)
   *
   * @param string $project Project ID for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Sets a filter expression for filtering listed
   * resources, in the form filter={expression}. Your {expression} must be in the
   * format: field_name comparison_string literal_string.
   *
   * The field_name is the name of the field you want to compare. Only atomic
   * field types are supported (string, number, boolean). The comparison_string
   * must be either eq (equals) or ne (not equals). The literal_string is the
   * string value to filter to. The literal value must be valid for the type of
   * field you are filtering by (string, number, boolean). For string fields, the
   * literal value is interpreted as a regular expression using RE2 syntax. The
   * literal value must match the entire field.
   *
   * For example, to filter for instances that do not have a name of example-
   * instance, you would use filter=name ne example-instance.
   *
   * Compute Engine Beta API Only: If you use filtering in the Beta API, you can
   * also filter on nested fields. For example, you could filter on instances that
   * have set the scheduling.automaticRestart field to true. In particular, use
   * filtering on nested fields to take advantage of instance labels to organize
   * and filter results based on label values.
   *
   * The Beta API also supports filtering on multiple expressions by providing
   * each separate expression within parentheses. For example,
   * (scheduling.automaticRestart eq true) (zone eq us-central1-f). Multiple
   * expressions are treated as AND expressions, meaning that resources must match
   * all expressions to pass the filters.
   * @opt_param string maxResults The maximum number of results per page that
   * should be returned. If the number of available results is larger than
   * maxResults, Compute Engine returns a nextPageToken that can be used to get
   * the next page of results in subsequent list requests.
   * @opt_param string orderBy Sorts list results by a certain order. By default,
   * results are returned in alphanumerical order based on the resource name.
   *
   * You can also sort results in descending order based on the creation timestamp
   * using orderBy="creationTimestamp desc". This sorts results based on the
   * creationTimestamp field in reverse chronological order (newest result first).
   * Use this to sort resources like operations so that the newest operation is
   * returned first.
   *
   * Currently, only sorting by name or creationTimestamp desc is supported.
   * @opt_param string pageToken Specifies a page token to use. Set pageToken to
   * the nextPageToken returned by a previous list request to get the next page of
   * results.
   * @return Google_Service_CloudUserAccounts_UserList
   */
  public function listUsers($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudUserAccounts_UserList");
  }
  /**
   * Removes the specified public key from the user. (users.removePublicKey)
   *
   * @param string $project Project ID for this request.
   * @param string $user Name of the user for this request.
   * @param string $fingerprint The fingerprint of the public key to delete.
   * Public keys are identified by their fingerprint, which is defined by RFC4716
   * to be the MD5 digest of the public key.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudUserAccounts_Operation
   */
  public function removePublicKey($project, $user, $fingerprint, $optParams = array())
  {
    $params = array('project' => $project, 'user' => $user, 'fingerprint' => $fingerprint);
    $params = array_merge($params, $optParams);
    return $this->call('removePublicKey', array($params), "Google_Service_CloudUserAccounts_Operation");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (users.setIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name of the resource for this request.
   * @param Google_Service_CloudUserAccounts_Policy $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudUserAccounts_Policy
   */
  public function setIamPolicy($project, $resource, Google_Service_CloudUserAccounts_Policy $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CloudUserAccounts_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource.
   * (users.testIamPermissions)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name of the resource for this request.
   * @param Google_Service_CloudUserAccounts_TestPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudUserAccounts_TestPermissionsResponse
   */
  public function testIamPermissions($project, $resource, Google_Service_CloudUserAccounts_TestPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CloudUserAccounts_TestPermissionsResponse");
  }
}
