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
 * The "diagnostics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $proximitybeaconService = new Google_Service_Proximitybeacon(...);
 *   $diagnostics = $proximitybeaconService->diagnostics;
 *  </code>
 */
class Google_Service_Proximitybeacon_Resource_BeaconsDiagnostics extends Google_Service_Resource
{
  /**
   * List the diagnostics for a single beacon. You can also list diagnostics for
   * all the beacons owned by your Google Developers Console project by using the
   * beacon name `beacons/-`.
   *
   * Authenticate using an [OAuth access
   * token](https://developers.google.com/identity/protocols/OAuth2) from a
   * signed-in user with **viewer**, **Is owner** or **Can edit** permissions in
   * the Google Developers Console project. (diagnostics.listBeaconsDiagnostics)
   *
   * @param string $beaconName Beacon that the diagnostics are for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Requests results that occur after the
   * `page_token`, obtained from the response to a previous request. Optional.
   * @opt_param int pageSize Specifies the maximum number of results to return.
   * Defaults to 10. Maximum 1000. Optional.
   * @opt_param string alertFilter Requests only beacons that have the given
   * alert. For example, to find beacons that have low batteries use
   * `alert_filter=LOW_BATTERY`.
   * @opt_param string projectId Requests only diagnostic records for the given
   * project id. If not set, then the project making the request will be used for
   * looking up diagnostic records. Optional.
   * @return Google_Service_Proximitybeacon_ListDiagnosticsResponse
   */
  public function listBeaconsDiagnostics($beaconName, $optParams = array())
  {
    $params = array('beaconName' => $beaconName);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Proximitybeacon_ListDiagnosticsResponse");
  }
}
