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
 * The "leads" collection of methods.
 * Typical usage is:
 *  <code>
 *   $partnersService = new Google_Service_Partners(...);
 *   $leads = $partnersService->leads;
 *  </code>
 */
class Google_Service_Partners_Resource_Leads extends Google_Service_Resource
{
  /**
   * Lists advertiser leads for a user's associated company. Should only be called
   * within the context of an authorized logged in user. (leads.listLeads)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestMetadata.partnersSessionId Google Partners session
   * ID.
   * @opt_param string requestMetadata.userOverrides.userId Logged-in user ID to
   * impersonate instead of the user's ID.
   * @opt_param string pageToken A token identifying a page of results that the
   * server returns. Typically, this is the value of
   * `ListLeadsResponse.next_page_token` returned from the previous call to
   * ListLeads.
   * @opt_param int pageSize Requested page size. Server may return fewer leads
   * than requested. If unspecified, server picks an appropriate default.
   * @opt_param string requestMetadata.trafficSource.trafficSourceId Identifier to
   * indicate where the traffic comes from. An identifier has multiple letters
   * created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.locale Locale to use for the current
   * request.
   * @opt_param string requestMetadata.userOverrides.ipAddress IP address to use
   * instead of the user's geo-located IP address.
   * @opt_param string requestMetadata.experimentIds Experiment IDs the current
   * request belongs to.
   * @opt_param string orderBy How to order Leads. Currently, only `create_time`
   * and `create_time desc` are supported
   * @opt_param string requestMetadata.trafficSource.trafficSubId Second level
   * identifier to indicate where the traffic comes from. An identifier has
   * multiple letters created by a team which redirected the traffic to us.
   * @return Google_Service_Partners_ListLeadsResponse
   */
  public function listLeads($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Partners_ListLeadsResponse");
  }
}
