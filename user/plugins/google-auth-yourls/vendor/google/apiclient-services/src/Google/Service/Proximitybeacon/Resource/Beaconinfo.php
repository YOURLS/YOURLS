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
 * The "beaconinfo" collection of methods.
 * Typical usage is:
 *  <code>
 *   $proximitybeaconService = new Google_Service_Proximitybeacon(...);
 *   $beaconinfo = $proximitybeaconService->beaconinfo;
 *  </code>
 */
class Google_Service_Proximitybeacon_Resource_Beaconinfo extends Google_Service_Resource
{
  /**
   * Given one or more beacon observations, returns any beacon information and
   * attachments accessible to your application. Authorize by using the [API
   * key](https://developers.google.com/beacons/proximity/get-
   * started#request_a_browser_api_key) for the application.
   * (beaconinfo.getforobserved)
   *
   * @param Google_Service_Proximitybeacon_GetInfoForObservedBeaconsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Proximitybeacon_GetInfoForObservedBeaconsResponse
   */
  public function getforobserved(Google_Service_Proximitybeacon_GetInfoForObservedBeaconsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getforobserved', array($params), "Google_Service_Proximitybeacon_GetInfoForObservedBeaconsResponse");
  }
}
