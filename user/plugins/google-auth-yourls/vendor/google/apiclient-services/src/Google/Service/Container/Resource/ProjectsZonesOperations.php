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
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $containerService = new Google_Service_Container(...);
 *   $operations = $containerService->operations;
 *  </code>
 */
class Google_Service_Container_Resource_ProjectsZonesOperations extends Google_Service_Resource
{
  /**
   * Cancels the specified operation. (operations.cancel)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the operation resides.
   * @param string $operationId The server-assigned `name` of the operation.
   * @param Google_Service_Container_CancelOperationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_ContainerEmpty
   */
  public function cancel($projectId, $zone, $operationId, Google_Service_Container_CancelOperationRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'operationId' => $operationId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_Container_ContainerEmpty");
  }
  /**
   * Gets the specified operation. (operations.get)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) in which the cluster resides.
   * @param string $operationId The server-assigned `name` of the operation.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_Operation
   */
  public function get($projectId, $zone, $operationId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone, 'operationId' => $operationId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Container_Operation");
  }
  /**
   * Lists all operations in a project in a specific zone or all zones.
   * (operations.listProjectsZonesOperations)
   *
   * @param string $projectId The Google Developers Console [project ID or project
   * number](https://support.google.com/cloud/answer/6158840).
   * @param string $zone The name of the Google Compute Engine
   * [zone](/compute/docs/zones#available) to return operations for, or `-` for
   * all zones.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Container_ListOperationsResponse
   */
  public function listProjectsZonesOperations($projectId, $zone, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Container_ListOperationsResponse");
  }
}
