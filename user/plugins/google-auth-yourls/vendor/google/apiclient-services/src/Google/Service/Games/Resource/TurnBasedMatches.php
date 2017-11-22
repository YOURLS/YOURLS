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
 * The "turnBasedMatches" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google_Service_Games(...);
 *   $turnBasedMatches = $gamesService->turnBasedMatches;
 *  </code>
 */
class Google_Service_Games_Resource_TurnBasedMatches extends Google_Service_Resource
{
  /**
   * Cancel a turn-based match. (turnBasedMatches.cancel)
   *
   * @param string $matchId The ID of the match.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   */
  public function cancel($matchId, $optParams = array())
  {
    $params = array('matchId' => $matchId);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params));
  }
  /**
   * Create a turn-based match. (turnBasedMatches.create)
   *
   * @param Google_Service_Games_TurnBasedMatchCreateRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @return Google_Service_Games_TurnBasedMatch
   */
  public function create(Google_Service_Games_TurnBasedMatchCreateRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Games_TurnBasedMatch");
  }
  /**
   * Decline an invitation to play a turn-based match. (turnBasedMatches.decline)
   *
   * @param string $matchId The ID of the match.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @return Google_Service_Games_TurnBasedMatch
   */
  public function decline($matchId, $optParams = array())
  {
    $params = array('matchId' => $matchId);
    $params = array_merge($params, $optParams);
    return $this->call('decline', array($params), "Google_Service_Games_TurnBasedMatch");
  }
  /**
   * Dismiss a turn-based match from the match list. The match will no longer show
   * up in the list and will not generate notifications.
   * (turnBasedMatches.dismiss)
   *
   * @param string $matchId The ID of the match.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   */
  public function dismiss($matchId, $optParams = array())
  {
    $params = array('matchId' => $matchId);
    $params = array_merge($params, $optParams);
    return $this->call('dismiss', array($params));
  }
  /**
   * Finish a turn-based match. Each player should make this call once, after all
   * results are in. Only the player whose turn it is may make the first call to
   * Finish, and can pass in the final match state. (turnBasedMatches.finish)
   *
   * @param string $matchId The ID of the match.
   * @param Google_Service_Games_TurnBasedMatchResults $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @return Google_Service_Games_TurnBasedMatch
   */
  public function finish($matchId, Google_Service_Games_TurnBasedMatchResults $postBody, $optParams = array())
  {
    $params = array('matchId' => $matchId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('finish', array($params), "Google_Service_Games_TurnBasedMatch");
  }
  /**
   * Get the data for a turn-based match. (turnBasedMatches.get)
   *
   * @param string $matchId The ID of the match.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param bool includeMatchData Get match data along with metadata.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @return Google_Service_Games_TurnBasedMatch
   */
  public function get($matchId, $optParams = array())
  {
    $params = array('matchId' => $matchId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Games_TurnBasedMatch");
  }
  /**
   * Join a turn-based match. (turnBasedMatches.join)
   *
   * @param string $matchId The ID of the match.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @return Google_Service_Games_TurnBasedMatch
   */
  public function join($matchId, $optParams = array())
  {
    $params = array('matchId' => $matchId);
    $params = array_merge($params, $optParams);
    return $this->call('join', array($params), "Google_Service_Games_TurnBasedMatch");
  }
  /**
   * Leave a turn-based match when it is not the current player's turn, without
   * canceling the match. (turnBasedMatches.leave)
   *
   * @param string $matchId The ID of the match.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @return Google_Service_Games_TurnBasedMatch
   */
  public function leave($matchId, $optParams = array())
  {
    $params = array('matchId' => $matchId);
    $params = array_merge($params, $optParams);
    return $this->call('leave', array($params), "Google_Service_Games_TurnBasedMatch");
  }
  /**
   * Leave a turn-based match during the current player's turn, without canceling
   * the match. (turnBasedMatches.leaveTurn)
   *
   * @param string $matchId The ID of the match.
   * @param int $matchVersion The version of the match being updated.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param string pendingParticipantId The ID of another participant who
   * should take their turn next. If not set, the match will wait for other
   * player(s) to join via automatching; this is only valid if automatch criteria
   * is set on the match with remaining slots for automatched players.
   * @return Google_Service_Games_TurnBasedMatch
   */
  public function leaveTurn($matchId, $matchVersion, $optParams = array())
  {
    $params = array('matchId' => $matchId, 'matchVersion' => $matchVersion);
    $params = array_merge($params, $optParams);
    return $this->call('leaveTurn', array($params), "Google_Service_Games_TurnBasedMatch");
  }
  /**
   * Returns turn-based matches the player is or was involved in.
   * (turnBasedMatches.listTurnBasedMatches)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param bool includeMatchData True if match data should be returned in the
   * response. Note that not all data will necessarily be returned if
   * include_match_data is true; the server may decide to only return data for
   * some of the matches to limit download size for the client. The remainder of
   * the data for these matches will be retrievable on request.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxCompletedMatches The maximum number of completed or
   * canceled matches to return in the response. If not set, all matches returned
   * could be completed or canceled.
   * @opt_param int maxResults The maximum number of matches to return in the
   * response, used for paging. For any response, the actual number of matches to
   * return may be less than the specified maxResults.
   * @opt_param string pageToken The token returned by the previous request.
   * @return Google_Service_Games_TurnBasedMatchList
   */
  public function listTurnBasedMatches($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Games_TurnBasedMatchList");
  }
  /**
   * Create a rematch of a match that was previously completed, with the same
   * participants. This can be called by only one player on a match still in their
   * list; the player must have called Finish first. Returns the newly created
   * match; it will be the caller's turn. (turnBasedMatches.rematch)
   *
   * @param string $matchId The ID of the match.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param string requestId A randomly generated numeric ID for each request
   * specified by the caller. This number is used at the server to ensure that the
   * request is handled correctly across retries.
   * @return Google_Service_Games_TurnBasedMatchRematch
   */
  public function rematch($matchId, $optParams = array())
  {
    $params = array('matchId' => $matchId);
    $params = array_merge($params, $optParams);
    return $this->call('rematch', array($params), "Google_Service_Games_TurnBasedMatchRematch");
  }
  /**
   * Returns turn-based matches the player is or was involved in that changed
   * since the last sync call, with the least recent changes coming first. Matches
   * that should be removed from the local cache will have a status of
   * MATCH_DELETED. (turnBasedMatches.sync)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param bool includeMatchData True if match data should be returned in the
   * response. Note that not all data will necessarily be returned if
   * include_match_data is true; the server may decide to only return data for
   * some of the matches to limit download size for the client. The remainder of
   * the data for these matches will be retrievable on request.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxCompletedMatches The maximum number of completed or
   * canceled matches to return in the response. If not set, all matches returned
   * could be completed or canceled.
   * @opt_param int maxResults The maximum number of matches to return in the
   * response, used for paging. For any response, the actual number of matches to
   * return may be less than the specified maxResults.
   * @opt_param string pageToken The token returned by the previous request.
   * @return Google_Service_Games_TurnBasedMatchSync
   */
  public function sync($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('sync', array($params), "Google_Service_Games_TurnBasedMatchSync");
  }
  /**
   * Commit the results of a player turn. (turnBasedMatches.takeTurn)
   *
   * @param string $matchId The ID of the match.
   * @param Google_Service_Games_TurnBasedMatchTurn $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string consistencyToken The last-seen mutation timestamp.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @return Google_Service_Games_TurnBasedMatch
   */
  public function takeTurn($matchId, Google_Service_Games_TurnBasedMatchTurn $postBody, $optParams = array())
  {
    $params = array('matchId' => $matchId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('takeTurn', array($params), "Google_Service_Games_TurnBasedMatch");
  }
}
