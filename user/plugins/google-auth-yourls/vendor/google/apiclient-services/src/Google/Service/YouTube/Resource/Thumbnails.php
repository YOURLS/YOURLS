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
 * The "thumbnails" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $thumbnails = $youtubeService->thumbnails;
 *  </code>
 */
class Google_Service_YouTube_Resource_Thumbnails extends Google_Service_Resource
{
  /**
   * Uploads a custom video thumbnail to YouTube and sets it for a video.
   * (thumbnails.set)
   *
   * @param string $videoId The videoId parameter specifies a YouTube video ID for
   * which the custom video thumbnail is being provided.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner Note: This parameter is intended
   * exclusively for YouTube content partners.
   *
   * The onBehalfOfContentOwner parameter indicates that the request's
   * authorization credentials identify a YouTube CMS user who is acting on behalf
   * of the content owner specified in the parameter value. This parameter is
   * intended for YouTube content partners that own and manage many different
   * YouTube channels. It allows content owners to authenticate once and get
   * access to all their video and channel data, without having to provide
   * authentication credentials for each individual channel. The actual CMS
   * account that the user authenticates with must be linked to the specified
   * YouTube content owner.
   * @return Google_Service_YouTube_ThumbnailSetResponse
   */
  public function set($videoId, $optParams = array())
  {
    $params = array('videoId' => $videoId);
    $params = array_merge($params, $optParams);
    return $this->call('set', array($params), "Google_Service_YouTube_ThumbnailSetResponse");
  }
}
