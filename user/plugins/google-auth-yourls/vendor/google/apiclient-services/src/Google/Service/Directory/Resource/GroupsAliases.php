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
class Google_Service_Directory_Resource_GroupsAliases extends Google_Service_Resource
{
  /**
   * Remove a alias for the group (aliases.delete)
   *
   * @param string $groupKey Email or immutable ID of the group
   * @param string $alias The alias to be removed
   * @param array $optParams Optional parameters.
   */
  public function delete($groupKey, $alias, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'alias' => $alias);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Add a alias for the group (aliases.insert)
   *
   * @param string $groupKey Email or immutable ID of the group
   * @param Google_Service_Directory_Alias $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Alias
   */
  public function insert($groupKey, Google_Service_Directory_Alias $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_Alias");
  }
  /**
   * List all aliases for a group (aliases.listGroupsAliases)
   *
   * @param string $groupKey Email or immutable ID of the group
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Aliases
   */
  public function listGroupsAliases($groupKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Aliases");
  }
}
