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
 * The "userProfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $userProfiles = $dfareportingService->userProfiles;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_UserProfiles extends Google_Service_Resource
{
  /**
   * Gets one user profile by ID. (userProfiles.get)
   *
   * @param string $profileId The user profile ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_UserProfile
   */
  public function get($profileId, $optParams = array())
  {
    $params = array('profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_UserProfile");
  }
  /**
   * Retrieves list of user profiles for a user. (userProfiles.listUserProfiles)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_UserProfileList
   */
  public function listUserProfiles($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_UserProfileList");
  }
}
