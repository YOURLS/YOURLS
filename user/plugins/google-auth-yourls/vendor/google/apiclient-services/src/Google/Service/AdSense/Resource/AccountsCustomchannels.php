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
 * The "customchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $customchannels = $adsenseService->customchannels;
 *  </code>
 */
class Google_Service_AdSense_Resource_AccountsCustomchannels extends Google_Service_Resource
{
  /**
   * Get the specified custom channel from the specified ad client for the
   * specified account. (customchannels.get)
   *
   * @param string $accountId Account to which the ad client belongs.
   * @param string $adClientId Ad client which contains the custom channel.
   * @param string $customChannelId Custom channel to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSense_CustomChannel
   */
  public function get($accountId, $adClientId, $customChannelId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'adClientId' => $adClientId, 'customChannelId' => $customChannelId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdSense_CustomChannel");
  }
  /**
   * List all custom channels in the specified ad client for the specified
   * account. (customchannels.listAccountsCustomchannels)
   *
   * @param string $accountId Account to which the ad client belongs.
   * @param string $adClientId Ad client for which to list custom channels.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults The maximum number of custom channels to include in
   * the response, used for paging.
   * @opt_param string pageToken A continuation token, used to page through custom
   * channels. To retrieve the next page, set this parameter to the value of
   * "nextPageToken" from the previous response.
   * @return Google_Service_AdSense_CustomChannels
   */
  public function listAccountsCustomchannels($accountId, $adClientId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'adClientId' => $adClientId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdSense_CustomChannels");
  }
}
