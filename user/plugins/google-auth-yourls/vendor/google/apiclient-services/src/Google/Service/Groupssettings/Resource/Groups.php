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
 *   $groupssettingsService = new Google_Service_Groupssettings(...);
 *   $groups = $groupssettingsService->groups;
 *  </code>
 */
class Google_Service_Groupssettings_Resource_Groups extends Google_Service_Resource
{
  /**
   * Gets one resource by id. (groups.get)
   *
   * @param string $groupUniqueId The resource ID
   * @param array $optParams Optional parameters.
   * @return Google_Service_Groupssettings_Groups
   */
  public function get($groupUniqueId, $optParams = array())
  {
    $params = array('groupUniqueId' => $groupUniqueId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Groupssettings_Groups");
  }
  /**
   * Updates an existing resource. This method supports patch semantics.
   * (groups.patch)
   *
   * @param string $groupUniqueId The resource ID
   * @param Google_Service_Groupssettings_Groups $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Groupssettings_Groups
   */
  public function patch($groupUniqueId, Google_Service_Groupssettings_Groups $postBody, $optParams = array())
  {
    $params = array('groupUniqueId' => $groupUniqueId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Groupssettings_Groups");
  }
  /**
   * Updates an existing resource. (groups.update)
   *
   * @param string $groupUniqueId The resource ID
   * @param Google_Service_Groupssettings_Groups $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Groupssettings_Groups
   */
  public function update($groupUniqueId, Google_Service_Groupssettings_Groups $postBody, $optParams = array())
  {
    $params = array('groupUniqueId' => $groupUniqueId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Groupssettings_Groups");
  }
}
