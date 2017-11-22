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
 * The "achievementConfigurations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesConfigurationService = new Google_Service_GamesConfiguration(...);
 *   $achievementConfigurations = $gamesConfigurationService->achievementConfigurations;
 *  </code>
 */
class Google_Service_GamesConfiguration_Resource_AchievementConfigurations extends Google_Service_Resource
{
  /**
   * Delete the achievement configuration with the given ID.
   * (achievementConfigurations.delete)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param array $optParams Optional parameters.
   */
  public function delete($achievementId, $optParams = array())
  {
    $params = array('achievementId' => $achievementId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves the metadata of the achievement configuration with the given ID.
   * (achievementConfigurations.get)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param array $optParams Optional parameters.
   * @return Google_Service_GamesConfiguration_AchievementConfiguration
   */
  public function get($achievementId, $optParams = array())
  {
    $params = array('achievementId' => $achievementId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_GamesConfiguration_AchievementConfiguration");
  }
  /**
   * Insert a new achievement configuration in this application.
   * (achievementConfigurations.insert)
   *
   * @param string $applicationId The application ID from the Google Play
   * developer console.
   * @param Google_Service_GamesConfiguration_AchievementConfiguration $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GamesConfiguration_AchievementConfiguration
   */
  public function insert($applicationId, Google_Service_GamesConfiguration_AchievementConfiguration $postBody, $optParams = array())
  {
    $params = array('applicationId' => $applicationId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_GamesConfiguration_AchievementConfiguration");
  }
  /**
   * Returns a list of the achievement configurations in this application.
   * (achievementConfigurations.listAchievementConfigurations)
   *
   * @param string $applicationId The application ID from the Google Play
   * developer console.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults The maximum number of resource configurations to
   * return in the response, used for paging. For any response, the actual number
   * of resources returned may be less than the specified maxResults.
   * @opt_param string pageToken The token returned by the previous request.
   * @return Google_Service_GamesConfiguration_AchievementConfigurationListResponse
   */
  public function listAchievementConfigurations($applicationId, $optParams = array())
  {
    $params = array('applicationId' => $applicationId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_GamesConfiguration_AchievementConfigurationListResponse");
  }
  /**
   * Update the metadata of the achievement configuration with the given ID. This
   * method supports patch semantics. (achievementConfigurations.patch)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param Google_Service_GamesConfiguration_AchievementConfiguration $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GamesConfiguration_AchievementConfiguration
   */
  public function patch($achievementId, Google_Service_GamesConfiguration_AchievementConfiguration $postBody, $optParams = array())
  {
    $params = array('achievementId' => $achievementId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_GamesConfiguration_AchievementConfiguration");
  }
  /**
   * Update the metadata of the achievement configuration with the given ID.
   * (achievementConfigurations.update)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param Google_Service_GamesConfiguration_AchievementConfiguration $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_GamesConfiguration_AchievementConfiguration
   */
  public function update($achievementId, Google_Service_GamesConfiguration_AchievementConfiguration $postBody, $optParams = array())
  {
    $params = array('achievementId' => $achievementId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_GamesConfiguration_AchievementConfiguration");
  }
}
