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
 * The "adunits" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $adunits = $adsenseService->adunits;
 *  </code>
 */
class Google_Service_AdSense_Resource_AccountsAdunits extends Google_Service_Resource
{
  /**
   * Gets the specified ad unit in the specified ad client for the specified
   * account. (adunits.get)
   *
   * @param string $accountId Account to which the ad client belongs.
   * @param string $adClientId Ad client for which to get the ad unit.
   * @param string $adUnitId Ad unit to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSense_AdUnit
   */
  public function get($accountId, $adClientId, $adUnitId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'adClientId' => $adClientId, 'adUnitId' => $adUnitId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdSense_AdUnit");
  }
  /**
   * Get ad code for the specified ad unit. (adunits.getAdCode)
   *
   * @param string $accountId Account which contains the ad client.
   * @param string $adClientId Ad client with contains the ad unit.
   * @param string $adUnitId Ad unit to get the code for.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSense_AdCode
   */
  public function getAdCode($accountId, $adClientId, $adUnitId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'adClientId' => $adClientId, 'adUnitId' => $adUnitId);
    $params = array_merge($params, $optParams);
    return $this->call('getAdCode', array($params), "Google_Service_AdSense_AdCode");
  }
  /**
   * List all ad units in the specified ad client for the specified account.
   * (adunits.listAccountsAdunits)
   *
   * @param string $accountId Account to which the ad client belongs.
   * @param string $adClientId Ad client for which to list ad units.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeInactive Whether to include inactive ad units.
   * Default: true.
   * @opt_param int maxResults The maximum number of ad units to include in the
   * response, used for paging.
   * @opt_param string pageToken A continuation token, used to page through ad
   * units. To retrieve the next page, set this parameter to the value of
   * "nextPageToken" from the previous response.
   * @return Google_Service_AdSense_AdUnits
   */
  public function listAccountsAdunits($accountId, $adClientId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'adClientId' => $adClientId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdSense_AdUnits");
  }
}
