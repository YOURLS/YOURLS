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
 * The "rooms" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $rooms = $gamesManagementService->rooms;
 *  </code>
 */
class Google_Service_GamesManagement_Resource_Rooms extends Google_Service_Resource
{
  /**
   * Reset all rooms for the currently authenticated player for your application.
   * This method is only accessible to whitelisted tester accounts for your
   * application. (rooms.reset)
   *
   * @param array $optParams Optional parameters.
   */
  public function reset($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('reset', array($params));
  }
  /**
   * Deletes rooms where the only room participants are from whitelisted tester
   * accounts for your application. This method is only available to user accounts
   * for your developer console. (rooms.resetForAllPlayers)
   *
   * @param array $optParams Optional parameters.
   */
  public function resetForAllPlayers($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('resetForAllPlayers', array($params));
  }
}
