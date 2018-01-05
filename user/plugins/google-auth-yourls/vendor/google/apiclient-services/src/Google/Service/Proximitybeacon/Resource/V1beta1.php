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
 * The "v1beta1" collection of methods.
 * Typical usage is:
 *  <code>
 *   $proximitybeaconService = new Google_Service_Proximitybeacon(...);
 *   $v1beta1 = $proximitybeaconService->v1beta1;
 *  </code>
 */
class Google_Service_Proximitybeacon_Resource_V1beta1 extends Google_Service_Resource
{
  /**
   * Gets the Proximity Beacon API's current public key and associated parameters
   * used to initiate the Diffie-Hellman key exchange required to register a
   * beacon that broadcasts the Eddystone-EID format. This key changes
   * periodically; clients may cache it and re-use the same public key to
   * provision and register multiple beacons. However, clients should be prepared
   * to refresh this key when they encounter an error registering an Eddystone-EID
   * beacon. (v1beta1.getEidparams)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_Proximitybeacon_EphemeralIdRegistrationParams
   */
  public function getEidparams($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getEidparams', array($params), "Google_Service_Proximitybeacon_EphemeralIdRegistrationParams");
  }
}
