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
 * The "metagame" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $metagame = $gamesService->metagame;
 *  </code>
 */
class Google_Service_Games_Resource_Metagame extends Google_Service_Resource
{
  /**
   * Return the metagame configuration data for the calling application.
   * (metagame.getMetagameConfig)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @return Google_Service_Games_MetagameConfig
   */
  public function getMetagameConfig($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getMetagameConfig', array($params), "Google_Service_Games_MetagameConfig");
  }
  /**
   * List play data aggregated per category for the player corresponding to
   * playerId. (metagame.listCategoriesByPlayer)
   *
   * @param string $playerId A player ID. A value of me may be used in place of
   * the authenticated player's ID.
   * @param string $collection The collection of categories for which data will be
   * returned.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxResults The maximum number of category resources to return
   * in the response, used for paging. For any response, the actual number of
   * category resources returned may be less than the specified maxResults.
   * @opt_param string pageToken The token returned by the previous request.
   * @return Google_Service_Games_CategoryListResponse
   */
  public function listCategoriesByPlayer($playerId, $collection, $optParams = array())
  {
    $params = array('playerId' => $playerId, 'collection' => $collection);
    $params = array_merge($params, $optParams);
    return $this->call('listCategoriesByPlayer', array($params), "Google_Service_Games_CategoryListResponse");
  }
}
