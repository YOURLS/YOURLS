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
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubereportingService = new Google_Service_YouTubeReporting(...);
 *   $reports = $youtubereportingService->reports;
 *  </code>
 */
class Google_Service_YouTubeReporting_Resource_JobsReports extends Google_Service_Resource
{
  /**
   * Gets the metadata of a specific report. (reports.get)
   *
   * @param string $jobId The ID of the job.
   * @param string $reportId The ID of the report to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner The content owner's external ID on
   * which behalf the user is acting on. If not set, the user is acting for
   * himself (his own channel).
   * @return Google_Service_YouTubeReporting_Report
   */
  public function get($jobId, $reportId, $optParams = array())
  {
    $params = array('jobId' => $jobId, 'reportId' => $reportId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_YouTubeReporting_Report");
  }
  /**
   * Lists reports created by a specific job. Returns NOT_FOUND if the job does
   * not exist. (reports.listJobsReports)
   *
   * @param string $jobId The ID of the job.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string startTimeBefore If set, only reports whose start time is
   * smaller than the specified date/time are returned.
   * @opt_param string createdAfter If set, only reports created after the
   * specified date/time are returned.
   * @opt_param string startTimeAtOrAfter If set, only reports whose start time is
   * greater than or equal the specified date/time are returned.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListReportsResponse.next_page_token returned in response to the previous call
   * to the `ListReports` method.
   * @opt_param int pageSize Requested page size. Server may return fewer report
   * types than requested. If unspecified, server will pick an appropriate
   * default.
   * @opt_param string onBehalfOfContentOwner The content owner's external ID on
   * which behalf the user is acting on. If not set, the user is acting for
   * himself (his own channel).
   * @return Google_Service_YouTubeReporting_ListReportsResponse
   */
  public function listJobsReports($jobId, $optParams = array())
  {
    $params = array('jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTubeReporting_ListReportsResponse");
  }
}
