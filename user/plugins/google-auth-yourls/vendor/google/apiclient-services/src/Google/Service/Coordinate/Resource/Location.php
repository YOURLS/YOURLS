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
 * The "location" collection of methods.
 * Typical usage is:
 *  <code>
 *   $coordinateService = new Google_Service_Coordinate(...);
 *   $location = $coordinateService->location;
 *  </code>
 */
class Google_Service_Coordinate_Resource_Location extends Google_Service_Resource
{
  /**
   * Retrieves a list of locations for a worker. (location.listLocation)
   *
   * @param string $teamId Team ID
   * @param string $workerEmail Worker email address.
   * @param string $startTimestampMs Start timestamp in milliseconds since the
   * epoch.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of results to return in one page.
   * @opt_param string pageToken Continuation token
   * @return Google_Service_Coordinate_LocationListResponse
   */
  public function listLocation($teamId, $workerEmail, $startTimestampMs, $optParams = array())
  {
    $params = array('teamId' => $teamId, 'workerEmail' => $workerEmail, 'startTimestampMs' => $startTimestampMs);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Coordinate_LocationListResponse");
  }
}
