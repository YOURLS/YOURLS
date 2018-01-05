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
 * The "connections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $peopleService = new Google_Service_People(...);
 *   $connections = $peopleService->connections;
 *  </code>
 */
class Google_Service_People_Resource_PeopleConnections extends Google_Service_Resource
{
  /**
   * Provides a list of the authenticated user's contacts merged with any linked
   * profiles. (connections.listPeopleConnections)
   *
   * @param string $resourceName The resource name to return connections for. Only
   * `people/me` is valid.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string sortOrder The order in which the connections should be
   * sorted. Defaults to `LAST_MODIFIED_ASCENDING`.
   * @opt_param bool requestSyncToken Whether the response should include a sync
   * token, which can be used to get all changes since the last request.
   * @opt_param string pageToken The token of the page to be returned.
   * @opt_param int pageSize The number of connections to include in the response.
   * Valid values are between 1 and 500, inclusive. Defaults to 100.
   * @opt_param string requestMask.includeField Comma-separated list of fields to
   * be included in the response. Omitting this field will include all fields
   * except for connections.list requests, which have a default mask that includes
   * common fields like metadata, name, photo, and profile url. Each path should
   * start with `person.`: for example, `person.names` or `person.photos`.
   * @opt_param string syncToken A sync token, returned by a previous call to
   * `people.connections.list`. Only resources changed since the sync token was
   * created will be returned.
   * @return Google_Service_People_ListConnectionsResponse
   */
  public function listPeopleConnections($resourceName, $optParams = array())
  {
    $params = array('resourceName' => $resourceName);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_People_ListConnectionsResponse");
  }
}
