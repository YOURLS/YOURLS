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
 * The "aliases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $aliases = $adminService->aliases;
 *  </code>
 */
class Google_Service_Directory_Resource_UsersAliases extends Google_Service_Resource
{
  /**
   * Remove a alias for the user (aliases.delete)
   *
   * @param string $userKey Email or immutable ID of the user
   * @param string $alias The alias to be removed
   * @param array $optParams Optional parameters.
   */
  public function delete($userKey, $alias, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'alias' => $alias);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Add a alias for the user (aliases.insert)
   *
   * @param string $userKey Email or immutable ID of the user
   * @param Google_Service_Directory_Alias $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Alias
   */
  public function insert($userKey, Google_Service_Directory_Alias $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_Alias");
  }
  /**
   * List all aliases for a user (aliases.listUsersAliases)
   *
   * @param string $userKey Email or immutable ID of the user
   * @param array $optParams Optional parameters.
   *
   * @opt_param string event Event on which subscription is intended (if
   * subscribing)
   * @return Google_Service_Directory_Aliases
   */
  public function listUsersAliases($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Aliases");
  }
  /**
   * Watch for changes in user aliases list (aliases.watch)
   *
   * @param string $userKey Email or immutable ID of the user
   * @param Google_Service_Directory_Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string event Event on which subscription is intended (if
   * subscribing)
   * @return Google_Service_Directory_Channel
   */
  public function watch($userKey, Google_Service_Directory_Channel $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('watch', array($params), "Google_Service_Directory_Channel");
  }
}
