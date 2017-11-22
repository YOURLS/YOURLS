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
 * The "resolvedAppAccessSettings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $resolvedAppAccessSettings = $adminService->resolvedAppAccessSettings;
 *  </code>
 */
class Google_Service_Directory_Resource_ResolvedAppAccessSettings extends Google_Service_Resource
{
  /**
   * Retrieves resolved app access settings of the logged in user.
   * (resolvedAppAccessSettings.GetSettings)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_AppAccessCollections
   */
  public function GetSettings($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('GetSettings', array($params), "Google_Service_Directory_AppAccessCollections");
  }
  /**
   * Retrieves the list of apps trusted by the admin of the logged in user.
   * (resolvedAppAccessSettings.ListTrustedApps)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_TrustedApps
   */
  public function ListTrustedApps($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('ListTrustedApps', array($params), "Google_Service_Directory_TrustedApps");
  }
}
