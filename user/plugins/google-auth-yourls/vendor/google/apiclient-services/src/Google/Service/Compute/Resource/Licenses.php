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
 * The "licenses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $licenses = $computeService->licenses;
 *  </code>
 */
class Google_Service_Compute_Resource_Licenses extends Google_Service_Resource
{
  /**
   * Returns the specified License resource. (licenses.get)
   *
   * @param string $project Project ID for this request.
   * @param string $license Name of the License resource to return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_License
   */
  public function get($project, $license, $optParams = array())
  {
    $params = array('project' => $project, 'license' => $license);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Compute_License");
  }
}
