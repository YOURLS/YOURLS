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
 * The "urlchannels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsensehostService = new Google_Service_AdSenseHost(...);
 *   $urlchannels = $adsensehostService->urlchannels;
 *  </code>
 */
class Google_Service_AdSenseHost_Resource_Urlchannels extends Google_Service_Resource
{
  /**
   * Delete a URL channel from the host AdSense account. (urlchannels.delete)
   *
   * @param string $adClientId Ad client from which to delete the URL channel.
   * @param string $urlChannelId URL channel to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSenseHost_UrlChannel
   */
  public function delete($adClientId, $urlChannelId, $optParams = array())
  {
    $params = array('adClientId' => $adClientId, 'urlChannelId' => $urlChannelId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_AdSenseHost_UrlChannel");
  }
  /**
   * Add a new URL channel to the host AdSense account. (urlchannels.insert)
   *
   * @param string $adClientId Ad client to which the new URL channel will be
   * added.
   * @param Google_Service_AdSenseHost_UrlChannel $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSenseHost_UrlChannel
   */
  public function insert($adClientId, Google_Service_AdSenseHost_UrlChannel $postBody, $optParams = array())
  {
    $params = array('adClientId' => $adClientId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_AdSenseHost_UrlChannel");
  }
  /**
   * List all host URL channels in the host AdSense account.
   * (urlchannels.listUrlchannels)
   *
   * @param string $adClientId Ad client for which to list URL channels.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of URL channels to include in
   * the response, used for paging.
   * @opt_param string pageToken A continuation token, used to page through URL
   * channels. To retrieve the next page, set this parameter to the value of
   * "nextPageToken" from the previous response.
   * @return Google_Service_AdSenseHost_UrlChannels
   */
  public function listUrlchannels($adClientId, $optParams = array())
  {
    $params = array('adClientId' => $adClientId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdSenseHost_UrlChannels");
  }
}
