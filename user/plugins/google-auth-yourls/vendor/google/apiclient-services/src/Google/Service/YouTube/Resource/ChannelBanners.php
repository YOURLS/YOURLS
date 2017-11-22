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
 * The "channelBanners" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $channelBanners = $youtubeService->channelBanners;
 *  </code>
 */
class Google_Service_YouTube_Resource_ChannelBanners extends Google_Service_Resource
{
  /**
   * Uploads a channel banner image to YouTube. This method represents the first
   * two steps in a three-step process to update the banner image for a channel:
   *
   * - Call the channelBanners.insert method to upload the binary image data to
   * YouTube. The image must have a 16:9 aspect ratio and be at least 2120x1192
   * pixels. - Extract the url property's value from the response that the API
   * returns for step 1. - Call the channels.update method to update the channel's
   * branding settings. Set the brandingSettings.image.bannerExternalUrl
   * property's value to the URL obtained in step 2. (channelBanners.insert)
   *
   * @param Google_Service_YouTube_ChannelBannerResource $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string channelId The channelId parameter identifies the YouTube
   * channel to which the banner is uploaded. The channelId parameter was
   * introduced as a required parameter in May 2017. As this was a backward-
   * incompatible change, channelBanners.insert requests that do not specify this
   * parameter will not return an error until six months have passed from the time
   * that the parameter was introduced. Please see the API Terms of Service for
   * the official policy regarding backward incompatible changes and the API
   * revision history for the exact date that the parameter was introduced.
   * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
   * exclusively for YouTube content partners.
   *
   * The onBehalfOfContentOwner parameter indicates that the request's
   * authorization credentials identify a YouTube CMS user who is acting on behalf
   * of the content owner specified in the parameter value. This parameter is
   * intended for YouTube content partners that own and manage many different
   * YouTube channels. It allows content owners to authenticate once and get
   * access to all their video and channel data, without having to provide
   * authentication credentials for each individual channel. The CMS account that
   * the user authenticates with must be linked to the specified YouTube content
   * owner.
   * @return Google_Service_YouTube_ChannelBannerResource
   */
  public function insert(Google_Service_YouTube_ChannelBannerResource $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_YouTube_ChannelBannerResource");
  }
}
