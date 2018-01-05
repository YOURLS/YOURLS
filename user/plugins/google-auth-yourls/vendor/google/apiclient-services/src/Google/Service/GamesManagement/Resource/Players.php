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
 * The "players" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $players = $gamesManagementService->players;
 *  </code>
 */
class Google_Service_GamesManagement_Resource_Players extends Google_Service_Resource
{
  /**
   * Hide the given player's leaderboard scores from the given application. This
   * method is only available to user accounts for your developer console.
   * (players.hide)
   *
   * @param string $applicationId The application ID from the Google Play
   * developer console.
   * @param string $playerId A player ID. A value of me may be used in place of
   * the authenticated player's ID.
   * @param array $optParams Optional parameters.
   */
  public function hide($applicationId, $playerId, $optParams = array())
  {
    $params = array('applicationId' => $applicationId, 'playerId' => $playerId);
    $params = array_merge($params, $optParams);
    return $this->call('hide', array($params));
  }
  /**
   * Unhide the given player's leaderboard scores from the given application. This
   * method is only available to user accounts for your developer console.
   * (players.unhide)
   *
   * @param string $applicationId The application ID from the Google Play
   * developer console.
   * @param string $playerId A player ID. A value of me may be used in place of
   * the authenticated player's ID.
   * @param array $optParams Optional parameters.
   */
  public function unhide($applicationId, $playerId, $optParams = array())
  {
    $params = array('applicationId' => $applicationId, 'playerId' => $playerId);
    $params = array_merge($params, $optParams);
    return $this->call('unhide', array($params));
  }
}
