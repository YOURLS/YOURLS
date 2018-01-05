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
 * The "media" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubereportingService = new Google_Service_YouTubeReporting(...);
 *   $media = $youtubereportingService->media;
 *  </code>
 */
class Google_Service_YouTubeReporting_Resource_Media extends Google_Service_Resource
{
  /**
   * Method for media download. Download is supported on the URI
   * `/v1/media/{+name}?alt=media`. (media.download)
   *
   * @param string $resourceName Name of the media that is being downloaded.  See
   * ReadRequest.resource_name.
   * @param array $optParams Optional parameters.
   * @return Google_Service_YouTubeReporting_Media
   */
  public function download($resourceName, $optParams = array())
  {
    $params = array('resourceName' => $resourceName);
    $params = array_merge($params, $optParams);
    return $this->call('download', array($params), "Google_Service_YouTubeReporting_Media");
  }
}
