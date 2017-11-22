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
 * The "quests" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google_Service_GamesManagement(...);
 *   $quests = $gamesManagementService->quests;
 *  </code>
 */
class Google_Service_GamesManagement_Resource_Quests extends Google_Service_Resource
{
  /**
   * Resets all player progress on the quest with the given ID for the currently
   * authenticated player. This method is only accessible to whitelisted tester
   * accounts for your application. (quests.reset)
   *
   * @param string $questId The ID of the quest.
   * @param array $optParams Optional parameters.
   */
  public function reset($questId, $optParams = array())
  {
    $params = array('questId' => $questId);
    $params = array_merge($params, $optParams);
    return $this->call('reset', array($params));
  }
  /**
   * Resets all player progress on all quests for the currently authenticated
   * player. This method is only accessible to whitelisted tester accounts for
   * your application. (quests.resetAll)
   *
   * @param array $optParams Optional parameters.
   */
  public function resetAll($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('resetAll', array($params));
  }
  /**
   * Resets all draft quests for all players. This method is only available to
   * user accounts for your developer console. (quests.resetAllForAllPlayers)
   *
   * @param array $optParams Optional parameters.
   */
  public function resetAllForAllPlayers($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('resetAllForAllPlayers', array($params));
  }
  /**
   * Resets all player progress on the quest with the given ID for all players.
   * This method is only available to user accounts for your developer console.
   * Only draft quests can be reset. (quests.resetForAllPlayers)
   *
   * @param string $questId The ID of the quest.
   * @param array $optParams Optional parameters.
   */
  public function resetForAllPlayers($questId, $optParams = array())
  {
    $params = array('questId' => $questId);
    $params = array_merge($params, $optParams);
    return $this->call('resetForAllPlayers', array($params));
  }
  /**
   * Resets quests with the given IDs for all players. This method is only
   * available to user accounts for your developer console. Only draft quests may
   * be reset. (quests.resetMultipleForAllPlayers)
   *
   * @param Google_Service_GamesManagement_QuestsResetMultipleForAllRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function resetMultipleForAllPlayers(Google_Service_GamesManagement_QuestsResetMultipleForAllRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resetMultipleForAllPlayers', array($params));
  }
}
