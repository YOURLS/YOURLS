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
 * The "zones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $zones = $containerService->zones;
 *  </code>
 */
class Google_Service_Container_Resource_ProjectsZones extends Google_Service_Resource
{
  /**
   * Returns configuration info about the Container Engine service.
   * (zones.getServerconfig)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) to return operations for.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_ServerConfig
   */
  public function getServerconfig($projectId, $zone, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('getServerconfig', array($params), "Google_Service_Container_ServerConfig");
  }
}
