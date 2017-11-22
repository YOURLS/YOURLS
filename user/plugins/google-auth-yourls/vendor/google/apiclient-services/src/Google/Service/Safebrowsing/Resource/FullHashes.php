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
 * The "fullHashes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $safebrowsingService = new Google_Service_Safebrowsing(...);
 *   $fullHashes = $safebrowsingService->fullHashes;
 *  </code>
 */
class Google_Service_Safebrowsing_Resource_FullHashes extends Google_Service_Resource
{
  /**
   * Finds the full hashes that match the requested hash prefixes.
   * (fullHashes.find)
   *
   * @param Google_Service_Safebrowsing_FindFullHashesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Safebrowsing_FindFullHashesResponse
   */
  public function find(Google_Service_Safebrowsing_FindFullHashesRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('find', array($params), "Google_Service_Safebrowsing_FindFullHashesResponse");
  }
}
