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
 * The "changes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google_Service_Dns(...);
 *   $changes = $dnsService->changes;
 *  </code>
 */
class Google_Service_Dns_Resource_Changes extends Google_Service_Resource
{
  /**
   * Atomically update the ResourceRecordSet collection. (changes.create)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or id.
   * @param Google_Service_Dns_Change $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dns_Change
   */
  public function create($project, $managedZone, Google_Service_Dns_Change $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dns_Change");
  }
  /**
   * Fetch the representation of an existing Change. (changes.get)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or id.
   * @param string $changeId The identifier of the requested change, from a
   * previous ResourceRecordSetsChangeResponse.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dns_Change
   */
  public function get($project, $managedZone, $changeId, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone, 'changeId' => $changeId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dns_Change");
  }
  /**
   * Enumerate Changes to a ResourceRecordSet collection. (changes.listChanges)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or id.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Optional. Maximum number of results to be returned.
   * If unspecified, the server will decide how many results to return.
   * @opt_param string pageToken Optional. A tag returned by a previous list
   * request that was truncated. Use this parameter to continue a previous list
   * request.
   * @opt_param string sortBy Sorting criterion. The only supported value is
   * change sequence.
   * @opt_param string sortOrder Sorting order direction: 'ascending' or
   * 'descending'.
   * @return Google_Service_Dns_ChangesListResponse
   */
  public function listChanges($project, $managedZone, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dns_ChangesListResponse");
  }
}
