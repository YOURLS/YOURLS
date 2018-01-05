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
 * The "sponsors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubeService = new Google_Service_YouTube(...);
 *   $sponsors = $youtubeService->sponsors;
 *  </code>
 */
class Google_Service_YouTube_Resource_Sponsors extends Google_Service_Resource
{
  /**
   * Lists sponsors for a channel. (sponsors.listSponsors)
   *
   * @param string $part The part parameter specifies the sponsor resource parts
   * that the API response will include. Supported values are id and snippet.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The filter parameter specifies which channel
   * sponsors to return.
   * @opt_param string maxResults The maxResults parameter specifies the maximum
   * number of items that should be returned in the result set.
   * @opt_param string pageToken The pageToken parameter identifies a specific
   * page in the result set that should be returned. In an API response, the
   * nextPageToken and prevPageToken properties identify other pages that could be
   * retrieved.
   * @return Google_Service_YouTube_SponsorListResponse
   */
  public function listSponsors($part, $optParams = array())
  {
    $params = array('part' => $part);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTube_SponsorListResponse");
  }
}
