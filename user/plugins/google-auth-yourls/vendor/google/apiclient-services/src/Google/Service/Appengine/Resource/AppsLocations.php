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
 *   $appengineService = new Google_Service_Appengine(...);
 *   $locations = $appengineService->locations;
 *  </code>
 */
class Google_Service_Appengine_Resource_AppsLocations extends Google_Service_Resource
{
  /**
   * Get information about a location. (locations.get)
   *
   * @param string $appsId Part of `name`. Resource name for the location.
   * @param string $locationsId Part of `name`. See documentation of `appsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Appengine_Location
   */
  public function get($appsId, $locationsId, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'locationsId' => $locationsId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Appengine_Location");
  }
  /**
   * Lists information about the supported locations for this service.
   * (locations.listAppsLocations)
   *
   * @param string $appsId Part of `name`. The resource that owns the locations
   * collection, if applicable.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The standard list filter.
   * @opt_param string pageToken The standard list page token.
   * @opt_param int pageSize The standard list page size.
   * @return Google_Service_Appengine_ListLocationsResponse
   */
  public function listAppsLocations($appsId, $optParams = array())
  {
    $params = array('appsId' => $appsId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Appengine_ListLocationsResponse");
  }
}
