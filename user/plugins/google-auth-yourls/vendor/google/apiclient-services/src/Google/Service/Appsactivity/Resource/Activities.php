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
 *   $appsactivityService = new Google_Service_Appsactivity(...);
 *   $activities = $appsactivityService->activities;
 *  </code>
 */
class Google_Service_Appsactivity_Resource_Activities extends Google_Service_Resource
{
  /**
   * Returns a list of activities visible to the current logged in user. Visible
   * activities are determined by the visiblity settings of the object that was
   * acted on, e.g. Drive files a user can see. An activity is a record of past
   * events. Multiple events may be merged if they are similar. A request is
   * scoped to activities from a given Google service using the source parameter.
   * (activities.listActivities)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string drive.ancestorId Identifies the Drive folder containing the
   * items for which to return activities.
   * @opt_param string drive.fileId Identifies the Drive item to return activities
   * for.
   * @opt_param string groupingStrategy Indicates the strategy to use when
   * grouping singleEvents items in the associated combinedEvent object.
   * @opt_param int pageSize The maximum number of events to return on a page. The
   * response includes a continuation token if there are more events.
   * @opt_param string pageToken A token to retrieve a specific page of results.
   * @opt_param string source The Google service from which to return activities.
   * Possible values of source are: - drive.google.com
   * @opt_param string userId Indicates the user to return activity for. Use the
   * special value me to indicate the currently authenticated user.
   * @return Google_Service_Appsactivity_ListActivitiesResponse
   */
  public function listActivities($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Appsactivity_ListActivitiesResponse");
  }
}
