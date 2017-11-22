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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $osloginService = new Google_Service_CloudOSLogin(...);
 *   $projects = $osloginService->projects;
 *  </code>
 */
class Google_Service_CloudOSLogin_Resource_UsersProjects extends Google_Service_Resource
{
  /**
   * Deletes a POSIX account. (projects.delete)
   *
   * @param string $name A reference to the POSIX account to update. POSIX
   * accounts are identified by the project ID they are associated with. A
   * reference to the POSIX account is in format
   * `users/{user}/projects/{project}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudOSLogin_OsloginEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudOSLogin_OsloginEmpty");
  }
}
