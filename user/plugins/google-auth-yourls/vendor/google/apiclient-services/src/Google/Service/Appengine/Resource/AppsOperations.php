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
 *   $appengineService = new Google_Service_Appengine(...);
 *   $operations = $appengineService->operations;
 *  </code>
 */
class Google_Service_Appengine_Resource_AppsOperations extends Google_Service_Resource
{
  /**
   * Gets the latest state of a long-running operation. Clients can use this
   * method to poll the operation result at intervals as recommended by the API
   * service. (operations.get)
   *
   * @param string $appsId Part of `name`. The name of the operation resource.
   * @param string $operationsId Part of `name`. See documentation of `appsId`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Appengine_Operation
   */
  public function get($appsId, $operationsId, $optParams = array())
  {
    $params = array('appsId' => $appsId, 'operationsId' => $operationsId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Appengine_Operation");
  }
  /**
   * Lists operations that match the specified filter in the request. If the
   * server doesn't support this method, it returns UNIMPLEMENTED.NOTE: the name
   * binding allows API services to override the binding to use different resource
   * name schemes, such as users/operations. To override the binding, API services
   * can add a binding such as "/v1/{name=users}/operations" to their service
   * configuration. For backwards compatibility, the default name includes the
   * operations collection id, however overriding users must ensure the name
   * binding is the parent resource, without the operations collection id.
   * (operations.listAppsOperations)
   *
   * @param string $appsId Part of `name`. The name of the operation's parent
   * resource.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The standard list page token.
   * @opt_param int pageSize The standard list page size.
   * @opt_param string filter The standard list filter.
   * @return Google_Service_Appengine_ListOperationsResponse
   */
  public function listAppsOperations($appsId, $optParams = array())
  {
    $params = array('appsId' => $appsId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Appengine_ListOperationsResponse");
  }
}
