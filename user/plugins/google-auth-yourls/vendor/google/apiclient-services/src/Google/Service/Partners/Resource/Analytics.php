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
 * The "analytics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $partnersService = new Google_Service_Partners(...);
 *   $analytics = $partnersService->analytics;
 *  </code>
 */
class Google_Service_Partners_Resource_Analytics extends Google_Service_Resource
{
  /**
   * Lists analytics data for a user's associated company. Should only be called
   * within the context of an authorized logged in user. (analytics.listAnalytics)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestMetadata.trafficSource.trafficSubId Second level
   * identifier to indicate where the traffic comes from. An identifier has
   * multiple letters created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.userOverrides.userId Logged-in user ID to
   * impersonate instead of the user's ID.
   * @opt_param string requestMetadata.partnersSessionId Google Partners session
   * ID.
   * @opt_param string pageToken A token identifying a page of results that the
   * server returns. Typically, this is the value of
   * `ListAnalyticsResponse.next_page_token` returned from the previous call to
   * ListAnalytics. Will be a date string in `YYYY-MM-DD` format representing the
   * end date of the date range of results to return. If unspecified or set to "",
   * default value is the current date.
   * @opt_param int pageSize Requested page size. Server may return fewer
   * analytics than requested. If unspecified or set to 0, default value is 30.
   * Specifies the number of days in the date range when querying analytics. The
   * `page_token` represents the end date of the date range and the start date is
   * calculated using the `page_size` as the number of days BEFORE the end date.
   * Must be a non-negative integer.
   * @opt_param string requestMetadata.trafficSource.trafficSourceId Identifier to
   * indicate where the traffic comes from. An identifier has multiple letters
   * created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.locale Locale to use for the current
   * request.
   * @opt_param string requestMetadata.userOverrides.ipAddress IP address to use
   * instead of the user's geo-located IP address.
   * @opt_param string requestMetadata.experimentIds Experiment IDs the current
   * request belongs to.
   * @return Google_Service_Partners_ListAnalyticsResponse
   */
  public function listAnalytics($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Partners_ListAnalyticsResponse");
  }
}
