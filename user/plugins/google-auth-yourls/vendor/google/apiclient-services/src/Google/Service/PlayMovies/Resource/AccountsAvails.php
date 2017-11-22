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
 * The "avails" collection of methods.
 * Typical usage is:
 *  <code>
 *   $playmoviespartnerService = new Google_Service_PlayMovies(...);
 *   $avails = $playmoviespartnerService->avails;
 *  </code>
 */
class Google_Service_PlayMovies_Resource_AccountsAvails extends Google_Service_Resource
{
  /**
   * Get an Avail given its avail group id and avail id. (avails.get)
   *
   * @param string $accountId REQUIRED. See _General rules_ for more information
   * about this field.
   * @param string $availId REQUIRED. Avail ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_PlayMovies_Avail
   */
  public function get($accountId, $availId, $optParams = array())
  {
    $params = array('accountId' => $accountId, 'availId' => $availId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_PlayMovies_Avail");
  }
  /**
   * List Avails owned or managed by the partner.
   *
   * See _Authentication and Authorization rules_ and _List methods rules_ for
   * more information about this method. (avails.listAccountsAvails)
   *
   * @param string $accountId REQUIRED. See _General rules_ for more information
   * about this field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pphNames See _List methods rules_ for info about this
   * field.
   * @opt_param string altId Filter Avails that match a case-insensitive, partner-
   * specific custom id. NOTE: this field is deprecated and will be removed on V2;
   * `alt_ids` should be used instead.
   * @opt_param string studioNames See _List methods rules_ for info about this
   * field.
   * @opt_param string territories Filter Avails that match (case-insensitive) any
   * of the given country codes, using the "ISO 3166-1 alpha-2" format (examples:
   * "US", "us", "Us").
   * @opt_param string title Filter that matches Avails with a
   * `title_internal_alias`, `series_title_internal_alias`,
   * `season_title_internal_alias`, or `episode_title_internal_alias` that
   * contains the given case-insensitive title.
   * @opt_param string videoIds Filter Avails that match any of the given
   * `video_id`s.
   * @opt_param string pageToken See _List methods rules_ for info about this
   * field.
   * @opt_param int pageSize See _List methods rules_ for info about this field.
   * @opt_param string altIds Filter Avails that match (case-insensitive) any of
   * the given partner-specific custom ids.
   * @return Google_Service_PlayMovies_ListAvailsResponse
   */
  public function listAccountsAvails($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_PlayMovies_ListAvailsResponse");
  }
}
