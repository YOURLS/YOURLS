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
 * The "groups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $groups = $adminService->groups;
 *  </code>
 */
class Google_Service_Directory_Resource_Groups extends Google_Service_Resource
{
  /**
   * Delete Group (groups.delete)
   *
   * @param string $groupKey Email or immutable ID of the group
   * @param array $optParams Optional parameters.
   */
  public function delete($groupKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieve Group (groups.get)
   *
   * @param string $groupKey Email or immutable ID of the group
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Group
   */
  public function get($groupKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_Group");
  }
  /**
   * Create Group (groups.insert)
   *
   * @param Google_Service_Directory_Group $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Group
   */
  public function insert(Google_Service_Directory_Group $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_Group");
  }
  /**
   * Retrieve all groups in a domain (paginated) (groups.listGroups)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customer Immutable ID of the G Suite account. In case of
   * multi-domain, to fetch all groups for a customer, fill this field instead of
   * domain.
   * @opt_param string domain Name of the domain. Fill this field to get groups
   * from only this domain. To return all groups in a multi-domain fill customer
   * field instead.
   * @opt_param int maxResults Maximum number of results to return. Default is 200
   * @opt_param string pageToken Token to specify next page in the list
   * @opt_param string userKey Email or immutable ID of the user if only those
   * groups are to be listed, the given user is a member of. If ID, it should
   * match with id of user object
   * @return Google_Service_Directory_Groups
   */
  public function listGroups($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Groups");
  }
  /**
   * Update Group. This method supports patch semantics. (groups.patch)
   *
   * @param string $groupKey Email or immutable ID of the group. If ID, it should
   * match with id of group object
   * @param Google_Service_Directory_Group $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Group
   */
  public function patch($groupKey, Google_Service_Directory_Group $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_Group");
  }
  /**
   * Update Group (groups.update)
   *
   * @param string $groupKey Email or immutable ID of the group. If ID, it should
   * match with id of group object
   * @param Google_Service_Directory_Group $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Group
   */
  public function update($groupKey, Google_Service_Directory_Group $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_Group");
  }
}
