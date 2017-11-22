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
class Google_Service_AdSense_Resource_CustomchannelsAdunits extends Google_Service_Resource
{
  /**
   * List all ad units in the specified custom channel.
   * (adunits.listCustomchannelsAdunits)
   *
   * @param string $adClientId Ad client which contains the custom channel.
   * @param string $customChannelId Custom channel for which to list ad units.
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
  public function listCustomchannelsAdunits($adClientId, $customChannelId, $optParams = array())
  {
    $params = array('adClientId' => $adClientId, 'customChannelId' => $customChannelId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdSense_AdUnits");
  }
}
