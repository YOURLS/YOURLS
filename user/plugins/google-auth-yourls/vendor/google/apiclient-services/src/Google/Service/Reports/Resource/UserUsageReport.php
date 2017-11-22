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
 * The "userUsageReport" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Reports(...);
 *   $userUsageReport = $adminService->userUsageReport;
 *  </code>
 */
class Google_Service_Reports_Resource_UserUsageReport extends Google_Service_Resource
{
  /**
   * Retrieves a report which is a collection of properties / statistics for a set
   * of users. (userUsageReport.get)
   *
   * @param string $userKey Represents the profile id or the user email for which
   * the data should be filtered.
   * @param string $date Represents the date in yyyy-mm-dd format for which the
   * data is to be fetched.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId Represents the customer for which the data is to
   * be fetched.
   * @opt_param string filters Represents the set of filters including parameter
   * operator value.
   * @opt_param string maxResults Maximum number of results to return. Maximum
   * allowed is 1000
   * @opt_param string pageToken Token to specify next page.
   * @opt_param string parameters Represents the application name, parameter name
   * pairs to fetch in csv as app_name1:param_name1, app_name2:param_name2.
   * @return Google_Service_Reports_UsageReports
   */
  public function get($userKey, $date, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'date' => $date);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Reports_UsageReports");
  }
}
