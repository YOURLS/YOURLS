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
 *   $iamService = new Google_Service_Iam(...);
 *   $permissions = $iamService->permissions;
 *  </code>
 */
class Google_Service_Iam_Resource_Permissions extends Google_Service_Resource
{
  /**
   * Lists the permissions testable on a resource. A permission is testable if it
   * can be tested for an identity on a resource.
   * (permissions.queryTestablePermissions)
   *
   * @param Google_Service_Iam_QueryTestablePermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Iam_QueryTestablePermissionsResponse
   */
  public function queryTestablePermissions(Google_Service_Iam_QueryTestablePermissionsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('queryTestablePermissions', array($params), "Google_Service_Iam_QueryTestablePermissionsResponse");
  }
}
