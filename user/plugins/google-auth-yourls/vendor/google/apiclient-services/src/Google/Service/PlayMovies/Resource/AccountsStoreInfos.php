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
 * The "storeInfos" collection of methods.
 * Typical usage is:
 *  <code>
 *   $playmoviespartnerService = new Google_Service_PlayMovies(...);
 *   $storeInfos = $playmoviespartnerService->storeInfos;
 *  </code>
 */
class Google_Service_PlayMovies_Resource_AccountsStoreInfos extends Google_Service_Resource
{
  /**
   * List StoreInfos owned or managed by the partner.
   *
   * See _Authentication and Authorization rules_ and _List methods rules_ for
   * more information about this method. (storeInfos.listAccountsStoreInfos)
   *
   * @param string $accountId REQUIRED. See _General rules_ for more information
   * about this field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize See _List methods rules_ for info about this field.
   * @opt_param string mids Filter StoreInfos that match any of the given `mid`s.
   * @opt_param string pphNames See _List methods rules_ for info about this
   * field.
   * @opt_param string countries Filter StoreInfos that match (case-insensitive)
   * any of the given country codes, using the "ISO 3166-1 alpha-2" format
   * (examples: "US", "us", "Us").
   * @opt_param string name Filter that matches StoreInfos with a `name` or
   * `show_name` that contains the given case-insensitive name.
   * @opt_param string studioNames See _List methods rules_ for info about this
   * field.
   * @opt_param string seasonIds Filter StoreInfos that match any of the given
   * `season_id`s.
   * @opt_param string videoIds Filter StoreInfos that match any of the given
   * `video_id`s.
   * @opt_param string videoId Filter StoreInfos that match a given `video_id`.
   * NOTE: this field is deprecated and will be removed on V2; `video_ids` should
   * be used instead.
   * @opt_param string pageToken See _List methods rules_ for info about this
   * field.
   * @return Google_Service_PlayMovies_ListStoreInfosResponse
   */
  public function listAccountsStoreInfos($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_PlayMovies_ListStoreInfosResponse");
  }
}
