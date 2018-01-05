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
 * The "country" collection of methods.
 * Typical usage is:
 *  <code>
 *   $playmoviespartnerService = new Google_Service_PlayMovies(...);
 *   $country = $playmoviespartnerService->country;
 *  </code>
 */
class Google_Service_PlayMovies_Resource_AccountsStoreInfosCountry extends Google_Service_Resource
{
  /**
   * Get a StoreInfo given its video id and country.
   *
   * See _Authentication and Authorization rules_ and _Get methods rules_ for more
   * information about this method. (country.get)
   *
   * @param string $accountId REQUIRED. See _General rules_ for more information
   * about this field.
   * @param string $videoId REQUIRED. Video ID.
   * @param string $country REQUIRED. Edit country.
   * @param array $optParams Optional parameters.
   * @return Google_Service_PlayMovies_StoreInfo
   */
  public function get($accountId, $videoId, $country, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'videoId' => $videoId, 'country' => $country);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_PlayMovies_StoreInfo");
  }
}
