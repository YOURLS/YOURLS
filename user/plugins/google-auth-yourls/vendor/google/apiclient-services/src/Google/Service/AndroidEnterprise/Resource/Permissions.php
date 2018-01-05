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
 * The "permissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google_Service_AndroidEnterprise(...);
 *   $permissions = $androidenterpriseService->permissions;
 *  </code>
 */
class Google_Service_AndroidEnterprise_Resource_Permissions extends Google_Service_Resource
{
  /**
   * Retrieves details of an Android app permission for display to an enterprise
   * admin. (permissions.get)
   *
   * @param string $permissionId The ID of the permission.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The BCP47 tag for the user's preferred language
   * (e.g. "en-US", "de")
   * @return Google_Service_AndroidEnterprise_Permission
   */
  public function get($permissionId, $optParams = array())
  {
    $params = array('permissionId' => $permissionId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidEnterprise_Permission");
  }
}
