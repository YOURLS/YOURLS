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
 * The "achievements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $achievements = $gamesService->achievements;
 *  </code>
 */
class Google_Service_Games_Resource_Achievements extends Google_Service_Resource
{
  /**
   * Increments the steps of the achievement with the given ID for the currently
   * authenticated player. (achievements.increment)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param int $stepsToIncrement The number of steps to increment.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string requestId A randomly generated numeric ID for each request
   * specified by the caller. This number is used at the server to ensure that the
   * request is handled correctly across retries.
   * @return Google_Service_Games_AchievementIncrementResponse
   */
  public function increment($achievementId, $stepsToIncrement, $optParams = array())
  {
    $params = array('achievementId' => $achievementId, 'stepsToIncrement' => $stepsToIncrement);
    $params = array_merge($params, $optParams);
    return $this->call('increment', array($params), "Google_Service_Games_AchievementIncrementResponse");
  }
  /**
   * Lists the progress for all your application's achievements for the currently
   * authenticated player. (achievements.listAchievements)
   *
   * @param string $playerId A player ID. A value of me may be used in place of
   * the authenticated player's ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxResults The maximum number of achievement resources to
   * return in the response, used for paging. For any response, the actual number
   * of achievement resources returned may be less than the specified maxResults.
   * @opt_param string pageToken The token returned by the previous request.
   * @opt_param string state Tells the server to return only achievements with the
   * specified state. If this parameter isn't specified, all achievements are
   * returned.
   * @return Google_Service_Games_PlayerAchievementListResponse
   */
  public function listAchievements($playerId, $optParams = array())
  {
    $params = array('playerId' => $playerId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Games_PlayerAchievementListResponse");
  }
  /**
   * Sets the state of the achievement with the given ID to REVEALED for the
   * currently authenticated player. (achievements.reveal)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @return Google_Service_Games_AchievementRevealResponse
   */
  public function reveal($achievementId, $optParams = array())
  {
    $params = array('achievementId' => $achievementId);
    $params = array_merge($params, $optParams);
    return $this->call('reveal', array($params), "Google_Service_Games_AchievementRevealResponse");
  }
  /**
   * Sets the steps for the currently authenticated player towards unlocking an
   * achievement. If the steps parameter is less than the current number of steps
   * that the player already gained for the achievement, the achievement is not
   * modified. (achievements.setStepsAtLeast)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param int $steps The minimum value to set the steps to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @return Google_Service_Games_AchievementSetStepsAtLeastResponse
   */
  public function setStepsAtLeast($achievementId, $steps, $optParams = array())
  {
    $params = array('achievementId' => $achievementId, 'steps' => $steps);
    $params = array_merge($params, $optParams);
    return $this->call('setStepsAtLeast', array($params), "Google_Service_Games_AchievementSetStepsAtLeastResponse");
  }
  /**
   * Unlocks this achievement for the currently authenticated player.
   * (achievements.unlock)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @return Google_Service_Games_AchievementUnlockResponse
   */
  public function unlock($achievementId, $optParams = array())
  {
    $params = array('achievementId' => $achievementId);
    $params = array_merge($params, $optParams);
    return $this->call('unlock', array($params), "Google_Service_Games_AchievementUnlockResponse");
  }
  /**
   * Updates multiple achievements for the currently authenticated player.
   * (achievements.updateMultiple)
   *
   * @param Google_Service_Games_AchievementUpdateMultipleRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @return Google_Service_Games_AchievementUpdateMultipleResponse
   */
  public function updateMultiple(Google_Service_Games_AchievementUpdateMultipleRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateMultiple', array($params), "Google_Service_Games_AchievementUpdateMultipleResponse");
  }
}
