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
 * The "leaderboardConfigurations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesConfigurationService = new Google_Service_GamesConfiguration(...);
 *   $leaderboardConfigurations = $gamesConfigurationService->leaderboardConfigurations;
 *  </code>
 */
class Google_Service_GamesConfiguration_Resource_LeaderboardConfigurations extends Google_Service_Resource
{
  /**
   * Delete the leaderboard configuration with the given ID.
   * (leaderboardConfigurations.delete)
   *
   * @param string $leaderboardId The ID of the leaderboard.
   * @param array $optParams Optional parameters.
   */
  public function delete($leaderboardId, $optParams = array())
  {
    $params = array('leaderboardId' => $leaderboardId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves the metadata of the leaderboard configuration with the given ID.
   * (leaderboardConfigurations.get)
   *
   * @param string $leaderboardId The ID of the leaderboard.
   * @param array $optParams Optional parameters.
   * @return Google_Service_GamesConfiguration_LeaderboardConfiguration
   */
  public function get($leaderboardId, $optParams = array())
  {
    $params = array('leaderboardId' => $leaderboardId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_GamesConfiguration_LeaderboardConfiguration");
  }
  /**
   * Insert a new leaderboard configuration in this application.
   * (leaderboardConfigurations.insert)
   *
   * @param string $applicationId The application ID from the Google Play
   * developer console.
   * @param Google_Service_GamesConfiguration_LeaderboardConfiguration $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GamesConfiguration_LeaderboardConfiguration
   */
  public function insert($applicationId, Google_Service_GamesConfiguration_LeaderboardConfiguration $postBody, $optParams = array())
  {
    $params = array('applicationId' => $applicationId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_GamesConfiguration_LeaderboardConfiguration");
  }
  /**
   * Returns a list of the leaderboard configurations in this application.
   * (leaderboardConfigurations.listLeaderboardConfigurations)
   *
   * @param string $applicationId The application ID from the Google Play
   * developer console.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults The maximum number of resource configurations to
   * return in the response, used for paging. For any response, the actual number
   * of resources returned may be less than the specified maxResults.
   * @opt_param string pageToken The token returned by the previous request.
   * @return Google_Service_GamesConfiguration_LeaderboardConfigurationListResponse
   */
  public function listLeaderboardConfigurations($applicationId, $optParams = array())
  {
    $params = array('applicationId' => $applicationId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_GamesConfiguration_LeaderboardConfigurationListResponse");
  }
  /**
   * Update the metadata of the leaderboard configuration with the given ID. This
   * method supports patch semantics. (leaderboardConfigurations.patch)
   *
   * @param string $leaderboardId The ID of the leaderboard.
   * @param Google_Service_GamesConfiguration_LeaderboardConfiguration $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GamesConfiguration_LeaderboardConfiguration
   */
  public function patch($leaderboardId, Google_Service_GamesConfiguration_LeaderboardConfiguration $postBody, $optParams = array())
  {
    $params = array('leaderboardId' => $leaderboardId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_GamesConfiguration_LeaderboardConfiguration");
  }
  /**
   * Update the metadata of the leaderboard configuration with the given ID.
   * (leaderboardConfigurations.update)
   *
   * @param string $leaderboardId The ID of the leaderboard.
   * @param Google_Service_GamesConfiguration_LeaderboardConfiguration $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GamesConfiguration_LeaderboardConfiguration
   */
  public function update($leaderboardId, Google_Service_GamesConfiguration_LeaderboardConfiguration $postBody, $optParams = array())
  {
    $params = array('leaderboardId' => $leaderboardId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_GamesConfiguration_LeaderboardConfiguration");
  }
}
