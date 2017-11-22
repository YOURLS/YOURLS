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
 *   $plusDomainsService = new Google_Service_PlusDomains(...);
 *   $media = $plusDomainsService->media;
 *  </code>
 */
class Google_Service_PlusDomains_Resource_Media extends Google_Service_Resource
{
  /**
   * Add a new media item to an album. The current upload size limitations are
   * 36MB for a photo and 1GB for a video. Uploads do not count against quota if
   * photos are less than 2048 pixels on their longest side or videos are less
   * than 15 minutes in length. (media.insert)
   *
   * @param string $userId The ID of the user to create the activity on behalf of.
   * @param string $collection
   * @param Google_Service_PlusDomains_Media $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PlusDomains_Media
   */
  public function insert($userId, $collection, Google_Service_PlusDomains_Media $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'collection' => $collection, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_PlusDomains_Media");
  }
}
