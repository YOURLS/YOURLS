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
 * The "asps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $asps = $adminService->asps;
 *  </code>
 */
class Google_Service_Directory_Resource_Asps extends Google_Service_Resource
{
  /**
   * Delete an ASP issued by a user. (asps.delete)
   *
   * @param string $userKey Identifies the user in the API request. The value can
   * be the user's primary email address, alias email address, or unique user ID.
   * @param int $codeId The unique ID of the ASP to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($userKey, $codeId, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'codeId' => $codeId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Get information about an ASP issued by a user. (asps.get)
   *
   * @param string $userKey Identifies the user in the API request. The value can
   * be the user's primary email address, alias email address, or unique user ID.
   * @param int $codeId The unique ID of the ASP.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Asp
   */
  public function get($userKey, $codeId, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'codeId' => $codeId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_Asp");
  }
  /**
   * List the ASPs issued by a user. (asps.listAsps)
   *
   * @param string $userKey Identifies the user in the API request. The value can
   * be the user's primary email address, alias email address, or unique user ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Asps
   */
  public function listAsps($userKey, $optParams = array())
  {
    $params = array('userKey' => $userKey);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Asps");
  }
}
