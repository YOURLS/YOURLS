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
 * The "activities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Reports(...);
 *   $activities = $adminService->activities;
 *  </code>
 */
class Google_Service_Reports_Resource_Activities extends Google_Service_Resource
{
  /**
   * Retrieves a list of activities for a specific customer and application.
   * (activities.listActivities)
   *
   * @param string $userKey Represents the profile id or the user email for which
   * the data should be filtered. When 'all' is specified as the userKey, it
   * returns usageReports for all users.
   * @param string $applicationName Application name for which the events are to
   * be retrieved.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string actorIpAddress IP Address of host where the event was
   * performed. Supports both IPv4 and IPv6 addresses.
   * @opt_param string customerId Represents the customer for which the data is to
   * be fetched.
   * @opt_param string endTime Return events which occurred at or before this
   * time.
   * @opt_param string eventName Name of the event being queried.
   * @opt_param string filters Event parameters in the form [parameter1
   * name][operator][parameter1 value],[parameter2 name][operator][parameter2
   * value],...
   * @opt_param int maxResults Number of activity records to be shown in each
   * page.
   * @opt_param string pageToken Token to specify next page.
   * @opt_param string startTime Return events which occurred at or after this
   * time.
   * @return Google_Service_Reports_Activities
   */
  public function listActivities($userKey, $applicationName, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'applicationName' => $applicationName);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Reports_Activities");
  }
  /**
   * Push changes to activities (activities.watch)
   *
   * @param string $userKey Represents the profile id or the user email for which
   * the data should be filtered. When 'all' is specified as the userKey, it
   * returns usageReports for all users.
   * @param string $applicationName Application name for which the events are to
   * be retrieved.
   * @param Google_Service_Reports_Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string actorIpAddress IP Address of host where the event was
   * performed. Supports both IPv4 and IPv6 addresses.
   * @opt_param string customerId Represents the customer for which the data is to
   * be fetched.
   * @opt_param string endTime Return events which occurred at or before this
   * time.
   * @opt_param string eventName Name of the event being queried.
   * @opt_param string filters Event parameters in the form [parameter1
   * name][operator][parameter1 value],[parameter2 name][operator][parameter2
   * value],...
   * @opt_param int maxResults Number of activity records to be shown in each
   * page.
   * @opt_param string pageToken Token to specify next page.
   * @opt_param string startTime Return events which occurred at or after this
   * time.
   * @return Google_Service_Reports_Channel
   */
  public function watch($userKey, $applicationName, Google_Service_Reports_Channel $postBody, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'applicationName' => $applicationName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('watch', array($params), "Google_Service_Reports_Channel");
  }
}
