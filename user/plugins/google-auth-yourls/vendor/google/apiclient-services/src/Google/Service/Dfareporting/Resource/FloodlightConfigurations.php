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
 * The "floodlightConfigurations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $floodlightConfigurations = $dfareportingService->floodlightConfigurations;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_FloodlightConfigurations extends Google_Service_Resource
{
  /**
   * Gets one floodlight configuration by ID. (floodlightConfigurations.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Floodlight configuration ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_FloodlightConfiguration
   */
  public function get($profileId, $id, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dfareporting_FloodlightConfiguration");
  }
  /**
   * Retrieves a list of floodlight configurations, possibly filtered.
   * (floodlightConfigurations.listFloodlightConfigurations)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ids Set of IDs of floodlight configurations to retrieve.
   * Required field; otherwise an empty list will be returned.
   * @return Google_Service_Dfareporting_FloodlightConfigurationsListResponse
   */
  public function listFloodlightConfigurations($profileId, $optParams = array())
  {
    $params = array('profileId' => $profileId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dfareporting_FloodlightConfigurationsListResponse");
  }
  /**
   * Updates an existing floodlight configuration. This method supports patch
   * semantics. (floodlightConfigurations.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Floodlight configuration ID.
   * @param Google_Service_Dfareporting_FloodlightConfiguration $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_FloodlightConfiguration
   */
  public function patch($profileId, $id, Google_Service_Dfareporting_FloodlightConfiguration $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dfareporting_FloodlightConfiguration");
  }
  /**
   * Updates an existing floodlight configuration.
   * (floodlightConfigurations.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Google_Service_Dfareporting_FloodlightConfiguration $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_FloodlightConfiguration
   */
  public function update($profileId, Google_Service_Dfareporting_FloodlightConfiguration $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Dfareporting_FloodlightConfiguration");
  }
}
