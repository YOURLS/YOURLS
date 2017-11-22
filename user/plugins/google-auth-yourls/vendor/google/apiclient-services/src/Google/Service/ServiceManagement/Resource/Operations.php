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
 *   $servicemanagementService = new Google_Service_ServiceManagement(...);
 *   $operations = $servicemanagementService->operations;
 *  </code>
 */
class Google_Service_ServiceManagement_Resource_Operations extends Google_Service_Resource
{
  /**
   * Gets the latest state of a long-running operation.  Clients can use this
   * method to poll the operation result at intervals as recommended by the API
   * service. (operations.get)
   *
   * @param string $name The name of the operation resource.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ServiceManagement_Operation
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ServiceManagement_Operation");
  }
  /**
   * Lists service operations that match the specified filter in the request.
   * (operations.listOperations)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name Not used.
   * @opt_param string pageToken The standard list page token.
   * @opt_param int pageSize The maximum number of operations to return. If
   * unspecified, defaults to 50. The maximum value is 100.
   * @opt_param string filter A string for filtering Operations.   The following
   * filter fields are supported
   *
   *   * serviceName Required. Only `=` operator is allowed.   * startTime The
   * time this job was started, in ISO 8601 format.     Allowed operators are
   * `>=`,  `>`, `<=`, and `<`.   * status Can be `done`, `in_progress`, or
   * `failed`. Allowed     operators are `=`, and `!=`.
   *
   *   Filter expression supports conjunction (AND) and disjunction (OR)   logical
   * operators. However, the serviceName restriction must be at the   top-level
   * and can only be combined with other restrictions via the AND   logical
   * operator.
   *
   *   Examples
   *
   *   * `serviceName={some-service}.googleapis.com`   * `serviceName={some-
   * service}.googleapis.com AND startTime>="2017-02-01"`   * `serviceName={some-
   * service}.googleapis.com AND status=done`   * `serviceName={some-
   * service}.googleapis.com AND (status=done OR startTime>="2017-02-01")`
   * @return Google_Service_ServiceManagement_ListOperationsResponse
   */
  public function listOperations($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ServiceManagement_ListOperationsResponse");
  }
}
