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
 *   $adsensehostService = new Google_Service_AdSenseHost(...);
 *   $customchannels = $adsensehostService->customchannels;
 *  </code>
 */
class Google_Service_AdSenseHost_Resource_Customchannels extends Google_Service_Resource
{
  /**
   * Delete a specific custom channel from the host AdSense account.
   * (customchannels.delete)
   *
   * @param string $adClientId Ad client from which to delete the custom channel.
   * @param string $customChannelId Custom channel to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSenseHost_CustomChannel
   */
  public function delete($adClientId, $customChannelId, $optParams = array())
  {
    $params = array('adClientId' => $adClientId, 'customChannelId' => $customChannelId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_AdSenseHost_CustomChannel");
  }
  /**
   * Get a specific custom channel from the host AdSense account.
   * (customchannels.get)
   *
   * @param string $adClientId Ad client from which to get the custom channel.
   * @param string $customChannelId Custom channel to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSenseHost_CustomChannel
   */
  public function get($adClientId, $customChannelId, $optParams = array())
  {
    $params = array('adClientId' => $adClientId, 'customChannelId' => $customChannelId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdSenseHost_CustomChannel");
  }
  /**
   * Add a new custom channel to the host AdSense account. (customchannels.insert)
   *
   * @param string $adClientId Ad client to which the new custom channel will be
   * added.
   * @param Google_Service_AdSenseHost_CustomChannel $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSenseHost_CustomChannel
   */
  public function insert($adClientId, Google_Service_AdSenseHost_CustomChannel $postBody, $optParams = array())
  {
    $params = array('adClientId' => $adClientId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_AdSenseHost_CustomChannel");
  }
  /**
   * List all host custom channels in this AdSense account.
   * (customchannels.listCustomchannels)
   *
   * @param string $adClientId Ad client for which to list custom channels.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of custom channels to include
   * in the response, used for paging.
   * @opt_param string pageToken A continuation token, used to page through custom
   * channels. To retrieve the next page, set this parameter to the value of
   * "nextPageToken" from the previous response.
   * @return Google_Service_AdSenseHost_CustomChannels
   */
  public function listCustomchannels($adClientId, $optParams = array())
  {
    $params = array('adClientId' => $adClientId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdSenseHost_CustomChannels");
  }
  /**
   * Update a custom channel in the host AdSense account. This method supports
   * patch semantics. (customchannels.patch)
   *
   * @param string $adClientId Ad client in which the custom channel will be
   * updated.
   * @param string $customChannelId Custom channel to get.
   * @param Google_Service_AdSenseHost_CustomChannel $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSenseHost_CustomChannel
   */
  public function patch($adClientId, $customChannelId, Google_Service_AdSenseHost_CustomChannel $postBody, $optParams = array())
  {
    $params = array('adClientId' => $adClientId, 'customChannelId' => $customChannelId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_AdSenseHost_CustomChannel");
  }
  /**
   * Update a custom channel in the host AdSense account. (customchannels.update)
   *
   * @param string $adClientId Ad client in which the custom channel will be
   * updated.
   * @param Google_Service_AdSenseHost_CustomChannel $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSenseHost_CustomChannel
   */
  public function update($adClientId, Google_Service_AdSenseHost_CustomChannel $postBody, $optParams = array())
  {
    $params = array('adClientId' => $adClientId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_AdSenseHost_CustomChannel");
  }
}
