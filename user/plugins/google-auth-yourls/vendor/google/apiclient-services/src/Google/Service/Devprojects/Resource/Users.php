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
 *   $devprojectsService = new Google_Service_Devprojects(...);
 *   $users = $devprojectsService->users;
 *  </code>
 */
class Google_Service_Devprojects_Resource_Users extends Google_Service_Resource
{
  /**
   * Retrieves the configuration data for a single user. (users.get)
   *
   * @param string $userId The Gaia user ID to get ToS acceptance for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string section Specifies the sections of the UserData protobuf
   * that should be filled in in the response.
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_UserData
   */
  public function get($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Devprojects_UserData");
  }
  /**
   * Update a user. This method supports patch semantics. (users.patch)
   *
   * @param string $userId The user ID.
   * @param Google_Service_Devprojects_UserData $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string section The list of sections that should be updated.
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_UserData
   */
  public function patch($userId, Google_Service_Devprojects_UserData $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Devprojects_UserData");
  }
  /**
   * Update a user. (users.update)
   *
   * @param string $userId The user ID.
   * @param Google_Service_Devprojects_UserData $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string section The list of sections that should be updated.
   * @opt_param string whitelistId The whitelist project ID. See
   * Projects.Insert.whitelist_id documentation for details.
   * @return Google_Service_Devprojects_UserData
   */
  public function update($userId, Google_Service_Devprojects_UserData $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Devprojects_UserData");
  }
}
