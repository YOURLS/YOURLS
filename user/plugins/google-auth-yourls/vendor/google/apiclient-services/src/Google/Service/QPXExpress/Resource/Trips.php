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
 * The "trips" collection of methods.
 * Typical usage is:
 *  <code>
 *   $qpxExpressService = new Google_Service_QPXExpress(...);
 *   $trips = $qpxExpressService->trips;
 *  </code>
 */
class Google_Service_QPXExpress_Resource_Trips extends Google_Service_Resource
{
  /**
   * Returns a list of flights. (trips.search)
   *
   * @param Google_Service_QPXExpress_TripsSearchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_QPXExpress_TripsSearchResponse
   */
  public function search(Google_Service_QPXExpress_TripsSearchRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_QPXExpress_TripsSearchResponse");
  }
}
