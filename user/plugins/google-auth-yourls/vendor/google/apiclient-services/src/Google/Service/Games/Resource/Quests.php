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
 *   $gamesService = new Google_Service_Games(...);
 *   $quests = $gamesService->quests;
 *  </code>
 */
class Google_Service_Games_Resource_Quests extends Google_Service_Resource
{
  /**
   * Indicates that the currently authorized user will participate in the quest.
   * (quests.accept)
   *
   * @param string $questId The ID of the quest.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @return Google_Service_Games_Quest
   */
  public function accept($questId, $optParams = array())
  {
    $params = array('questId' => $questId);
    $params = array_merge($params, $optParams);
    return $this->call('accept', array($params), "Google_Service_Games_Quest");
  }
  /**
   * Get a list of quests for your application and the currently authenticated
   * player. (quests.listQuests)
   *
   * @param string $playerId A player ID. A value of me may be used in place of
   * the authenticated player's ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxResults The maximum number of quest resources to return in
   * the response, used for paging. For any response, the actual number of quest
   * resources returned may be less than the specified maxResults. Acceptable
   * values are 1 to 50, inclusive. (Default: 50).
   * @opt_param string pageToken The token returned by the previous request.
   * @return Google_Service_Games_QuestListResponse
   */
  public function listQuests($playerId, $optParams = array())
  {
    $params = array('playerId' => $playerId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Games_QuestListResponse");
  }
}
