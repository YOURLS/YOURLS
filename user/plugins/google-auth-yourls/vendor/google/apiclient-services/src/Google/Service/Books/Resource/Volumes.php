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
 * The "volumes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $booksService = new Google_Service_Books(...);
 *   $volumes = $booksService->volumes;
 *  </code>
 */
class Google_Service_Books_Resource_Volumes extends Google_Service_Resource
{
  /**
   * Gets volume information for a single volume. (volumes.get)
   *
   * @param string $volumeId ID of volume to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string country ISO-3166-1 code to override the IP-based location.
   * @opt_param bool includeNonComicsSeries Set to true to include non-comics
   * series. Defaults to false.
   * @opt_param string partner Brand results for partner ID.
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @opt_param string source String to identify the originator of this request.
   * @opt_param bool user_library_consistent_read
   * @return Google_Service_Books_Volume
   */
  public function get($volumeId, $optParams = array())
  {
    $params = array('volumeId' => $volumeId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Books_Volume");
  }
  /**
   * Performs a book search. (volumes.listVolumes)
   *
   * @param string $q Full-text search query string.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string download Restrict to volumes by download availability.
   * @opt_param string filter Filter search results.
   * @opt_param string langRestrict Restrict results to books with this language
   * code.
   * @opt_param string libraryRestrict Restrict search to this user's library.
   * @opt_param string maxAllowedMaturityRating The maximum allowed maturity
   * rating of returned recommendations. Books with a higher maturity rating are
   * filtered out.
   * @opt_param string maxResults Maximum number of results to return.
   * @opt_param string orderBy Sort search results.
   * @opt_param string partner Restrict and brand results for partner ID.
   * @opt_param string printType Restrict to books or magazines.
   * @opt_param string projection Restrict information returned to a set of
   * selected fields.
   * @opt_param bool showPreorders Set to true to show books available for
   * preorder. Defaults to false.
   * @opt_param string source String to identify the originator of this request.
   * @opt_param string startIndex Index of the first result to return (starts at
   * 0)
   * @return Google_Service_Books_Volumes
   */
  public function listVolumes($q, $optParams = array())
  {
    $params = array('q' => $q);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Books_Volumes");
  }
}
