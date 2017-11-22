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
 * The "rollouts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $servicemanagementService = new Google_Service_ServiceManagement(...);
 *   $rollouts = $servicemanagementService->rollouts;
 *  </code>
 */
class Google_Service_ServiceManagement_Resource_ServicesRollouts extends Google_Service_Resource
{
  /**
   * Creates a new service configuration rollout. Based on rollout, the Google
   * Service Management will roll out the service configurations to different
   * backend services. For example, the logging configuration will be pushed to
   * Google Cloud Logging.
   *
   * Please note that any previous pending and running Rollouts and associated
   * Operations will be automatically cancelled so that the latest Rollout will
   * not be blocked by previous Rollouts.
   *
   * Operation (rollouts.create)
   *
   * @param string $serviceName The name of the service.  See the [overview
   * ](/service-management/overview) for naming requirements.  For example:
   * `example.googleapis.com`.
   * @param Google_Service_ServiceManagement_Rollout $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceManagement_Operation
   */
  public function create($serviceName, Google_Service_ServiceManagement_Rollout $postBody, $optParams = array())
  {
    $params = array('serviceName' => $serviceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ServiceManagement_Operation");
  }
  /**
   * Gets a service configuration rollout. (rollouts.get)
   *
   * @param string $serviceName The name of the service.  See the [overview
   * ](/service-management/overview) for naming requirements.  For example:
   * `example.googleapis.com`.
   * @param string $rolloutId The id of the rollout resource.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceManagement_Rollout
   */
  public function get($serviceName, $rolloutId, $optParams = array())
  {
    $params = array('serviceName' => $serviceName, 'rolloutId' => $rolloutId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ServiceManagement_Rollout");
  }
  /**
   * Lists the history of the service configuration rollouts for a managed
   * service, from the newest to the oldest. (rollouts.listServicesRollouts)
   *
   * @param string $serviceName The name of the service.  See the [overview
   * ](/service-management/overview) for naming requirements.  For example:
   * `example.googleapis.com`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The token of the page to retrieve.
   * @opt_param int pageSize The max number of items to include in the response
   * list.
   * @opt_param string filter Use `filter` to return subset of rollouts. The
   * following filters are supported:   -- To limit the results to only those in
   * [status](google.api.servicemanagement.v1.RolloutStatus) 'SUCCESS',      use
   * filter='status=SUCCESS'   -- To limit the results to those in
   * [status](google.api.servicemanagement.v1.RolloutStatus) 'CANCELLED'      or
   * 'FAILED', use filter='status=CANCELLED OR status=FAILED'
   * @return Google_Service_ServiceManagement_ListServiceRolloutsResponse
   */
  public function listServicesRollouts($serviceName, $optParams = array())
  {
    $params = array('serviceName' => $serviceName);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ServiceManagement_ListServiceRolloutsResponse");
  }
}
