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
 * The "history" collection of methods.
 * Typical usage is:
 *  <code>
 *   $partnersService = new Google_Service_Partners(...);
 *   $history = $partnersService->history;
 *  </code>
 */
class Google_Service_Partners_Resource_OffersHistory extends Google_Service_Resource
{
  /**
   * Lists the Historical Offers for the current user (or user's entire company)
   * (history.listOffersHistory)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestMetadata.userOverrides.ipAddress IP address to use
   * instead of the user's geo-located IP address.
   * @opt_param string requestMetadata.experimentIds Experiment IDs the current
   * request belongs to.
   * @opt_param bool entireCompany if true, show history for the entire company.
   * Requires user to be admin.
   * @opt_param string requestMetadata.trafficSource.trafficSubId Second level
   * identifier to indicate where the traffic comes from. An identifier has
   * multiple letters created by a team which redirected the traffic to us.
   * @opt_param string orderBy Comma-separated list of fields to order by, e.g.:
   * "foo,bar,baz". Use "foo desc" to sort descending. List of valid field names
   * is: name, offer_code, expiration_time, status,     last_modified_time,
   * sender_name, creation_time, country_code,     offer_type.
   * @opt_param string requestMetadata.partnersSessionId Google Partners session
   * ID.
   * @opt_param string requestMetadata.userOverrides.userId Logged-in user ID to
   * impersonate instead of the user's ID.
   * @opt_param string pageToken Token to retrieve a specific page.
   * @opt_param int pageSize Maximum number of rows to return per page.
   * @opt_param string requestMetadata.trafficSource.trafficSourceId Identifier to
   * indicate where the traffic comes from. An identifier has multiple letters
   * created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.locale Locale to use for the current
   * request.
   * @return Google_Service_Partners_ListOffersHistoryResponse
   */
  public function listOffersHistory($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Partners_ListOffersHistoryResponse");
  }
}
