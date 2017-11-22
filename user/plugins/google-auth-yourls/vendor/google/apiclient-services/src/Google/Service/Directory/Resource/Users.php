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
 *   $adminService = new Google_Service_Directory(...);
 *   $users = $adminService->users;
 *  </code>
 */
class Google_Service_Directory_Resource_Users extends Google_Service_Resource
{
  /**
   * Delete user (users.delete)
   *
   * @param string $userKey Email or immutable ID of the user
   * @param array $optParams Optional parameters.
   */
  public function delete($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * retrieve user (users.get)
   *
   * @param string $userKey Email or immutable ID of the user
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customFieldMask Comma-separated list of schema names. All
   * fields from these schemas are fetched. This should only be set when
   * projection=custom.
   * @opt_param string projection What subset of fields to fetch for this user.
   * @opt_param string viewType Whether to fetch the ADMIN_VIEW or DOMAIN_PUBLIC
   * view of the user.
   * @return Google_Service_Directory_User
   */
  public function get($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_User");
  }
  /**
   * create user. (users.insert)
   *
   * @param Google_Service_Directory_User $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_User
   */
  public function insert(Google_Service_Directory_User $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_User");
  }
  /**
   * Retrieve either deleted users or all users in a domain (paginated)
   * (users.listUsers)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customFieldMask Comma-separated list of schema names. All
   * fields from these schemas are fetched. This should only be set when
   * projection=custom.
   * @opt_param string customer Immutable ID of the G Suite account. In case of
   * multi-domain, to fetch all users for a customer, fill this field instead of
   * domain.
   * @opt_param string domain Name of the domain. Fill this field to get users
   * from only this domain. To return all users in a multi-domain fill customer
   * field instead.
   * @opt_param string event Event on which subscription is intended (if
   * subscribing)
   * @opt_param int maxResults Maximum number of results to return. Default is
   * 100. Max allowed is 500
   * @opt_param string orderBy Column to use for sorting results
   * @opt_param string pageToken Token to specify next page in the list
   * @opt_param string projection What subset of fields to fetch for this user.
   * @opt_param string query Query string search. Should be of the form "".
   * Complete documentation is at https://developers.google.com/admin-
   * sdk/directory/v1/guides/search-users
   * @opt_param string showDeleted If set to true retrieves the list of deleted
   * users. Default is false
   * @opt_param string sortOrder Whether to return results in ascending or
   * descending order.
   * @opt_param string viewType Whether to fetch the ADMIN_VIEW or DOMAIN_PUBLIC
   * view of the user.
   * @return Google_Service_Directory_Users
   */
  public function listUsers($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Users");
  }
  /**
   * change admin status of a user (users.makeAdmin)
   *
   * @param string $userKey Email or immutable ID of the user as admin
   * @param Google_Service_Directory_UserMakeAdmin $postBody
   * @param array $optParams Optional parameters.
   */
  public function makeAdmin($userKey, Google_Service_Directory_UserMakeAdmin $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('makeAdmin', array($params));
  }
  /**
   * update user. This method supports patch semantics. (users.patch)
   *
   * @param string $userKey Email or immutable ID of the user. If ID, it should
   * match with id of user object
   * @param Google_Service_Directory_User $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_User
   */
  public function patch($userKey, Google_Service_Directory_User $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_User");
  }
  /**
   * Undelete a deleted user (users.undelete)
   *
   * @param string $userKey The immutable id of the user
   * @param Google_Service_Directory_UserUndelete $postBody
   * @param array $optParams Optional parameters.
   */
  public function undelete($userKey, Google_Service_Directory_UserUndelete $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undelete', array($params));
  }
  /**
   * update user (users.update)
   *
   * @param string $userKey Email or immutable ID of the user. If ID, it should
   * match with id of user object
   * @param Google_Service_Directory_User $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_User
   */
  public function update($userKey, Google_Service_Directory_User $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_User");
  }
  /**
   * Watch for changes in users list (users.watch)
   *
   * @param Google_Service_Directory_Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customFieldMask Comma-separated list of schema names. All
   * fields from these schemas are fetched. This should only be set when
   * projection=custom.
   * @opt_param string customer Immutable ID of the G Suite account. In case of
   * multi-domain, to fetch all users for a customer, fill this field instead of
   * domain.
   * @opt_param string domain Name of the domain. Fill this field to get users
   * from only this domain. To return all users in a multi-domain fill customer
   * field instead.
   * @opt_param string event Event on which subscription is intended (if
   * subscribing)
   * @opt_param int maxResults Maximum number of results to return. Default is
   * 100. Max allowed is 500
   * @opt_param string orderBy Column to use for sorting results
   * @opt_param string pageToken Token to specify next page in the list
   * @opt_param string projection What subset of fields to fetch for this user.
   * @opt_param string query Query string search. Should be of the form "".
   * Complete documentation is at https://developers.google.com/admin-
   * sdk/directory/v1/guides/search-users
   * @opt_param string showDeleted If set to true retrieves the list of deleted
   * users. Default is false
   * @opt_param string sortOrder Whether to return results in ascending or
   * descending order.
   * @opt_param string viewType Whether to fetch the ADMIN_VIEW or DOMAIN_PUBLIC
   * view of the user.
   * @return Google_Service_Directory_Channel
   */
  public function watch(Google_Service_Directory_Channel $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('watch', array($params), "Google_Service_Directory_Channel");
  }
}
