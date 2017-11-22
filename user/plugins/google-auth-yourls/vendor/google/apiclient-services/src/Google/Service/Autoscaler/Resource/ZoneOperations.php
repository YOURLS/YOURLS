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
 * The "zoneOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $autoscalerService = new Google_Service_Autoscaler(...);
 *   $zoneOperations = $autoscalerService->zoneOperations;
 *  </code>
 */
class Google_Service_Autoscaler_Resource_ZoneOperations extends Google_Service_Resource
{
  /**
   * Deletes the specified zone-specific operation resource.
   * (zoneOperations.delete)
   *
   * @param string $project
   * @param string $zone
   * @param string $operation
   * @param array $optParams Optional parameters.
   */
  public function delete($project, $zone, $operation, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'operation' => $operation);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves the specified zone-specific operation resource.
   * (zoneOperations.get)
   *
   * @param string $project
   * @param string $zone
   * @param string $operation
   * @param array $optParams Optional parameters.
   * @return Google_Service_Autoscaler_Operation
   */
  public function get($project, $zone, $operation, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'operation' => $operation);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Autoscaler_Operation");
  }
  /**
   * Retrieves the list of operation resources contained within the specified
   * zone. (zoneOperations.listZoneOperations)
   *
   * @param string $project
   * @param string $zone
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * @opt_param string maxResults
   * @opt_param string pageToken
   * @return Google_Service_Autoscaler_OperationList
   */
  public function listZoneOperations($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Autoscaler_OperationList");
  }
}
