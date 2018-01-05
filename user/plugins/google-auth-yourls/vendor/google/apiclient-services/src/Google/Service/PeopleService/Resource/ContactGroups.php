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
 * The "contactGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $peopleService = new Google_Service_PeopleService(...);
 *   $contactGroups = $peopleService->contactGroups;
 *  </code>
 */
class Google_Service_PeopleService_Resource_ContactGroups extends Google_Service_Resource
{
  /**
   * Get a list of contact groups owned by the authenticated user by specifying a
   * list of contact group resource names. (contactGroups.batchGet)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxMembers Specifies the maximum number of members to return
   * for each group.
   * @opt_param string resourceNames The resource names of the contact groups to
   * get.
   * @return Google_Service_PeopleService_BatchGetContactGroupsResponse
   */
  public function batchGet($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', array($params), "Google_Service_PeopleService_BatchGetContactGroupsResponse");
  }
  /**
   * Create a new contact group owned by the authenticated user.
   * (contactGroups.create)
   *
   * @param Google_Service_PeopleService_CreateContactGroupRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PeopleService_ContactGroup
   */
  public function create(Google_Service_PeopleService_CreateContactGroupRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_PeopleService_ContactGroup");
  }
  /**
   * Delete an existing contact group owned by the authenticated user by
   * specifying a contact group resource name. (contactGroups.delete)
   *
   * @param string $resourceName The resource name of the contact group to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool deleteContacts Set to true to also delete the contacts in the
   * specified group.
   * @return Google_Service_PeopleService_PeopleEmpty
   */
  public function delete($resourceName, $optParams = array())
  {
    $params = array('resourceName' => $resourceName);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_PeopleService_PeopleEmpty");
  }
  /**
   * Get a specific contact group owned by the authenticated user by specifying a
   * contact group resource name. (contactGroups.get)
   *
   * @param string $resourceName The resource name of the contact group to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxMembers Specifies the maximum number of members to return.
   * @return Google_Service_PeopleService_ContactGroup
   */
  public function get($resourceName, $optParams = array())
  {
    $params = array('resourceName' => $resourceName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_PeopleService_ContactGroup");
  }
  /**
   * List all contact groups owned by the authenticated user. Members of the
   * contact groups are not populated. (contactGroups.listContactGroups)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string syncToken A sync token, returned by a previous call to
   * `contactgroups.list`. Only resources changed since the sync token was created
   * will be returned.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous call to [ListContactGroups](/people/api/rest/v1/contactgroups/list).
   * Requests the next page of resources.
   * @opt_param int pageSize The maximum number of resources to return.
   * @return Google_Service_PeopleService_ListContactGroupsResponse
   */
  public function listContactGroups($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_PeopleService_ListContactGroupsResponse");
  }
  /**
   * Update the name of an existing contact group owned by the authenticated user.
   * (contactGroups.update)
   *
   * @param string $resourceName The resource name for the contact group, assigned
   * by the server. An ASCII string, in the form of
   * `contactGroups/`contact_group_id.
   * @param Google_Service_PeopleService_UpdateContactGroupRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PeopleService_ContactGroup
   */
  public function update($resourceName, Google_Service_PeopleService_UpdateContactGroupRequest $postBody, $optParams = array())
  {
    $params = array('resourceName' => $resourceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_PeopleService_ContactGroup");
  }
}
