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
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mirrorService = new Google_Service_Mirror(...);
 *   $locations = $mirrorService->locations;
 *  </code>
 */
class Google_Service_Mirror_Resource_Locations extends Google_Service_Resource
{
  /**
   * Gets a single location by ID. (locations.get)
   *
   * @param string $id The ID of the location or latest for the last known
   * location.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mirror_Location
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Mirror_Location");
  }
  /**
   * Retrieves a list of locations for the user. (locations.listLocations)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_Mirror_LocationsListResponse
   */
  public function listLocations($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Mirror_LocationsListResponse");
  }
}
