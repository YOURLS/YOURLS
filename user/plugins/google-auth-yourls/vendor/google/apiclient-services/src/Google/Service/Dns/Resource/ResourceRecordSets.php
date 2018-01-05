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
 * The "resourceRecordSets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google_Service_Dns(...);
 *   $resourceRecordSets = $dnsService->resourceRecordSets;
 *  </code>
 */
class Google_Service_Dns_Resource_ResourceRecordSets extends Google_Service_Resource
{
  /**
   * Enumerate ResourceRecordSets that have been created but not yet deleted.
   * (resourceRecordSets.listResourceRecordSets)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $managedZone Identifies the managed zone addressed by this
   * request. Can be the managed zone name or id.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Optional. Maximum number of results to be returned.
   * If unspecified, the server will decide how many results to return.
   * @opt_param string name Restricts the list to return only records with this
   * fully qualified domain name.
   * @opt_param string pageToken Optional. A tag returned by a previous list
   * request that was truncated. Use this parameter to continue a previous list
   * request.
   * @opt_param string type Restricts the list to return only records of this
   * type. If present, the "name" parameter must also be present.
   * @return Google_Service_Dns_ResourceRecordSetsListResponse
   */
  public function listResourceRecordSets($project, $managedZone, $optParams = array())
  {
    $params = array('project' => $project, 'managedZone' => $managedZone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dns_ResourceRecordSetsListResponse");
  }
}
