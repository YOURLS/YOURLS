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
 *   $peopleService = new Google_Service_PeopleService(...);
 *   $connections = $peopleService->connections;
 *  </code>
 */
class Google_Service_PeopleService_Resource_PeopleConnections extends Google_Service_Resource
{
  /**
   * Provides a list of the authenticated user's contacts merged with any
   * connected profiles.
   *
   * The request throws a 400 error if 'personFields' is not specified.
   * (connections.listPeopleConnections)
   *
   * @param string $resourceName The resource name to return connections for. Only
   * `people/me` is valid.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string syncToken A sync token, returned by a previous call to
   * `people.connections.list`. Only resources changed since the sync token was
   * created will be returned.
   * @opt_param string personFields **Required.** A field mask to restrict which
   * fields on each person are returned. Valid values are:
   *
   * * addresses * ageRanges * biographies * birthdays * braggingRights *
   * coverPhotos * emailAddresses * events * genders * imClients * locales *
   * memberships * metadata * names * nicknames * occupations * organizations *
   * phoneNumbers * photos * relations * relationshipInterests *
   * relationshipStatuses * residences * skills * taglines * urls
   * @opt_param string sortOrder The order in which the connections should be
   * sorted. Defaults to `LAST_MODIFIED_ASCENDING`.
   * @opt_param bool requestSyncToken Whether the response should include a sync
   * token, which can be used to get all changes since the last request.
   * @opt_param string pageToken The token of the page to be returned.
   * @opt_param int pageSize The number of connections to include in the response.
   * Valid values are between 1 and 2000, inclusive. Defaults to 100.
   * @opt_param string requestMask.includeField **Required.** Comma-separated list
   * of person fields to be included in the response. Each path should start with
   * `person.`: for example, `person.names` or `person.photos`.
   * @return Google_Service_PeopleService_ListConnectionsResponse
   */
  public function listPeopleConnections($resourceName, $optParams = array())
  {
    $params = array('resourceName' => $resourceName);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_PeopleService_ListConnectionsResponse");
  }
}
