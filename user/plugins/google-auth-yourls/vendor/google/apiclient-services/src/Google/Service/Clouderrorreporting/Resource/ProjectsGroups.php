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
 *   $clouderrorreportingService = new Google_Service_Clouderrorreporting(...);
 *   $groups = $clouderrorreportingService->groups;
 *  </code>
 */
class Google_Service_Clouderrorreporting_Resource_ProjectsGroups extends Google_Service_Resource
{
  /**
   * Get the specified group. (groups.get)
   *
   * @param string $groupName [Required] The group resource name. Written as
   * projects/projectID/groups/group_name. Call
   *
   * groupStats.list to return a list of groups belonging to this project.
   *
   * Example: projects/my-project-123/groups/my-group
   * @param array $optParams Optional parameters.
   * @return Google_Service_Clouderrorreporting_ErrorGroup
   */
  public function get($groupName, $optParams = array())
  {
    $params = array('groupName' => $groupName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Clouderrorreporting_ErrorGroup");
  }
  /**
   * Replace the data for the specified group. Fails if the group does not exist.
   * (groups.update)
   *
   * @param string $name The group resource name. Example: projects/my-
   * project-123/groups/my-groupid
   * @param Google_Service_Clouderrorreporting_ErrorGroup $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Clouderrorreporting_ErrorGroup
   */
  public function update($name, Google_Service_Clouderrorreporting_ErrorGroup $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Clouderrorreporting_ErrorGroup");
  }
}
