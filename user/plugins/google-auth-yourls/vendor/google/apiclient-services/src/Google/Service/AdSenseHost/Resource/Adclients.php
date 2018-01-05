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
 * The "adclients" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsensehostService = new Google_Service_AdSenseHost(...);
 *   $adclients = $adsensehostService->adclients;
 *  </code>
 */
class Google_Service_AdSenseHost_Resource_Adclients extends Google_Service_Resource
{
  /**
   * Get information about one of the ad clients in the Host AdSense account.
   * (adclients.get)
   *
   * @param string $adClientId Ad client to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSenseHost_AdClient
   */
  public function get($adClientId, $optParams = array())
  {
    $params = array('adClientId' => $adClientId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdSenseHost_AdClient");
  }
  /**
   * List all host ad clients in this AdSense account. (adclients.listAdclients)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of ad clients to include in
   * the response, used for paging.
   * @opt_param string pageToken A continuation token, used to page through ad
   * clients. To retrieve the next page, set this parameter to the value of
   * "nextPageToken" from the previous response.
   * @return Google_Service_AdSenseHost_AdClients
   */
  public function listAdclients($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdSenseHost_AdClients");
  }
}
