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
 * The "states" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudiotService = new Google_Service_CloudIot(...);
 *   $states = $cloudiotService->states;
 *  </code>
 */
class Google_Service_CloudIot_Resource_ProjectsLocationsRegistriesDevicesStates extends Google_Service_Resource
{
  /**
   * Lists the last few versions of the device state in descending order (i.e.:
   * newest first). (states.listProjectsLocationsRegistriesDevicesStates)
   *
   * @param string $name The name of the device. For example,
   * `projects/p0/locations/us-central1/registries/registry0/devices/device0` or
   * `projects/p0/locations/us-central1/registries/registry0/devices/{num_id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int numStates The number of states to list. States are listed in
   * descending order of update time. The maximum number of states retained is 10.
   * If this value is zero, it will return all the states available.
   * @return Google_Service_CloudIot_ListDeviceStatesResponse
   */
  public function listProjectsLocationsRegistriesDevicesStates($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudIot_ListDeviceStatesResponse");
  }
}
