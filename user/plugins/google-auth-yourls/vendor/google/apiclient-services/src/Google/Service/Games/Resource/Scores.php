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
 * The "scores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $scores = $gamesService->scores;
 *  </code>
 */
class Google_Service_Games_Resource_Scores extends Google_Service_Resource
{
  /**
   * Get high scores, and optionally ranks, in leaderboards for the currently
   * authenticated player. For a specific time span, leaderboardId can be set to
   * ALL to retrieve data for all leaderboards in a given time span. NOTE: You
   * cannot ask for 'ALL' leaderboards and 'ALL' timeSpans in the same request;
   * only one parameter may be set to 'ALL'. (scores.get)
   *
   * @param string $playerId A player ID. A value of me may be used in place of
   * the authenticated player's ID.
   * @param string $leaderboardId The ID of the leaderboard. Can be set to 'ALL'
   * to retrieve data for all leaderboards for this application.
   * @param string $timeSpan The time span for the scores and ranks you're
   * requesting.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string includeRankType The types of ranks to return. If the
   * parameter is omitted, no ranks will be returned.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxResults The maximum number of leaderboard scores to return
   * in the response. For any response, the actual number of leaderboard scores
   * returned may be less than the specified maxResults.
   * @opt_param string pageToken The token returned by the previous request.
   * @return Google_Service_Games_PlayerLeaderboardScoreListResponse
   */
  public function get($playerId, $leaderboardId, $timeSpan, $optParams = array())
  {
    $params = array('playerId' => $playerId, 'leaderboardId' => $leaderboardId, 'timeSpan' => $timeSpan);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Games_PlayerLeaderboardScoreListResponse");
  }
  /**
   * Lists the scores in a leaderboard, starting from the top. (scores.listScores)
   *
   * @param string $leaderboardId The ID of the leaderboard.
   * @param string $collection The collection of scores you're requesting.
   * @param string $timeSpan The time span for the scores and ranks you're
   * requesting.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxResults The maximum number of leaderboard scores to return
   * in the response. For any response, the actual number of leaderboard scores
   * returned may be less than the specified maxResults.
   * @opt_param string pageToken The token returned by the previous request.
   * @return Google_Service_Games_LeaderboardScores
   */
  public function listScores($leaderboardId, $collection, $timeSpan, $optParams = array())
  {
    $params = array('leaderboardId' => $leaderboardId, 'collection' => $collection, 'timeSpan' => $timeSpan);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Games_LeaderboardScores");
  }
  /**
   * Lists the scores in a leaderboard around (and including) a player's score.
   * (scores.listWindow)
   *
   * @param string $leaderboardId The ID of the leaderboard.
   * @param string $collection The collection of scores you're requesting.
   * @param string $timeSpan The time span for the scores and ranks you're
   * requesting.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxResults The maximum number of leaderboard scores to return
   * in the response. For any response, the actual number of leaderboard scores
   * returned may be less than the specified maxResults.
   * @opt_param string pageToken The token returned by the previous request.
   * @opt_param int resultsAbove The preferred number of scores to return above
   * the player's score. More scores may be returned if the player is at the
   * bottom of the leaderboard; fewer may be returned if the player is at the top.
   * Must be less than or equal to maxResults.
   * @opt_param bool returnTopIfAbsent True if the top scores should be returned
   * when the player is not in the leaderboard. Defaults to true.
   * @return Google_Service_Games_LeaderboardScores
   */
  public function listWindow($leaderboardId, $collection, $timeSpan, $optParams = array())
  {
    $params = array('leaderboardId' => $leaderboardId, 'collection' => $collection, 'timeSpan' => $timeSpan);
    $params = array_merge($params, $optParams);
    return $this->call('listWindow', array($params), "Google_Service_Games_LeaderboardScores");
  }
  /**
   * Submits a score to the specified leaderboard. (scores.submit)
   *
   * @param string $leaderboardId The ID of the leaderboard.
   * @param string $score The score you're submitting. The submitted score is
   * ignored if it is worse than a previously submitted score, where worse depends
   * on the leaderboard sort order. The meaning of the score value depends on the
   * leaderboard format type. For fixed-point, the score represents the raw value.
   * For time, the score represents elapsed time in milliseconds. For currency,
   * the score represents a value in micro units.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param string scoreTag Additional information about the score you're
   * submitting. Values must contain no more than 64 URI-safe characters as
   * defined by section 2.3 of RFC 3986.
   * @return Google_Service_Games_PlayerScoreResponse
   */
  public function submit($leaderboardId, $score, $optParams = array())
  {
    $params = array('leaderboardId' => $leaderboardId, 'score' => $score);
    $params = array_merge($params, $optParams);
    return $this->call('submit', array($params), "Google_Service_Games_PlayerScoreResponse");
  }
  /**
   * Submits multiple scores to leaderboards. (scores.submitMultiple)
   *
   * @param Google_Service_Games_PlayerScoreSubmissionList $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @return Google_Service_Games_PlayerScoreListResponse
   */
  public function submitMultiple(Google_Service_Games_PlayerScoreSubmissionList $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('submitMultiple', array($params), "Google_Service_Games_PlayerScoreListResponse");
  }
}
