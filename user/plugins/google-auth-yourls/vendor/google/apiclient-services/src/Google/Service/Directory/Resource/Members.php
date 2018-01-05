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
 * The "members" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $members = $adminService->members;
 *  </code>
 */
class Google_Service_Directory_Resource_Members extends Google_Service_Resource
{
  /**
   * Remove membership. (members.delete)
   *
   * @param string $groupKey Email or immutable ID of the group
   * @param string $memberKey Email or immutable ID of the member
   * @param array $optParams Optional parameters.
   */
  public function delete($groupKey, $memberKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'memberKey' => $memberKey);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieve Group Member (members.get)
   *
   * @param string $groupKey Email or immutable ID of the group
   * @param string $memberKey Email or immutable ID of the member
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Member
   */
  public function get($groupKey, $memberKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'memberKey' => $memberKey);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_Member");
  }
  /**
   * Checks Membership of an user within a Group (members.hasMember)
   *
   * @param string $groupKey Email or immutable Id of the group
   * @param string $memberKey Email or immutable Id of the member
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_MembersHasMember
   */
  public function hasMember($groupKey, $memberKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'memberKey' => $memberKey);
    $params = array_merge($params, $optParams);
    return $this->call('hasMember', array($params), "Google_Service_Directory_MembersHasMember");
  }
  /**
   * Add user to the specified group. (members.insert)
   *
   * @param string $groupKey Email or immutable ID of the group
   * @param Google_Service_Directory_Member $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Member
   */
  public function insert($groupKey, Google_Service_Directory_Member $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_Member");
  }
  /**
   * Retrieve all members in a group (paginated) (members.listMembers)
   *
   * @param string $groupKey Email or immutable ID of the group
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of results to return. Default is 200
   * @opt_param string pageToken Token to specify next page in the list
   * @opt_param string roles Comma separated role values to filter list results
   * on.
   * @return Google_Service_Directory_Members
   */
  public function listMembers($groupKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Members");
  }
  /**
   * Update membership of a user in the specified group. This method supports
   * patch semantics. (members.patch)
   *
   * @param string $groupKey Email or immutable ID of the group. If ID, it should
   * match with id of group object
   * @param string $memberKey Email or immutable ID of the user. If ID, it should
   * match with id of member object
   * @param Google_Service_Directory_Member $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Member
   */
  public function patch($groupKey, $memberKey, Google_Service_Directory_Member $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'memberKey' => $memberKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_Member");
  }
  /**
   * Update membership of a user in the specified group. (members.update)
   *
   * @param string $groupKey Email or immutable ID of the group. If ID, it should
   * match with id of group object
   * @param string $memberKey Email or immutable ID of the user. If ID, it should
   * match with id of member object
   * @param Google_Service_Directory_Member $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Member
   */
  public function update($groupKey, $memberKey, Google_Service_Directory_Member $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'memberKey' => $memberKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_Member");
  }
}
