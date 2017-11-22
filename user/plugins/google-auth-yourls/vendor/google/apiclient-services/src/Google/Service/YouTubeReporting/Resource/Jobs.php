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
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubereportingService = new Google_Service_YouTubeReporting(...);
 *   $jobs = $youtubereportingService->jobs;
 *  </code>
 */
class Google_Service_YouTubeReporting_Resource_Jobs extends Google_Service_Resource
{
  /**
   * Creates a job and returns it. (jobs.create)
   *
   * @param Google_Service_YouTubeReporting_Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner The content owner's external ID on
   * which behalf the user is acting on. If not set, the user is acting for
   * himself (his own channel).
   * @return Google_Service_YouTubeReporting_Job
   */
  public function create(Google_Service_YouTubeReporting_Job $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_YouTubeReporting_Job");
  }
  /**
   * Deletes a job. (jobs.delete)
   *
   * @param string $jobId The ID of the job to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner The content owner's external ID on
   * which behalf the user is acting on. If not set, the user is acting for
   * himself (his own channel).
   * @return Google_Service_YouTubeReporting_YoutubereportingEmpty
   */
  public function delete($jobId, $optParams = array())
  {
    $params = array('jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_YouTubeReporting_YoutubereportingEmpty");
  }
  /**
   * Gets a job. (jobs.get)
   *
   * @param string $jobId The ID of the job to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner The content owner's external ID on
   * which behalf the user is acting on. If not set, the user is acting for
   * himself (his own channel).
   * @return Google_Service_YouTubeReporting_Job
   */
  public function get($jobId, $optParams = array())
  {
    $params = array('jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_YouTubeReporting_Job");
  }
  /**
   * Lists jobs. (jobs.listJobs)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner The content owner's external ID on
   * which behalf the user is acting on. If not set, the user is acting for
   * himself (his own channel).
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListReportTypesResponse.next_page_token returned in response to the previous
   * call to the `ListJobs` method.
   * @opt_param bool includeSystemManaged If set to true, also system-managed jobs
   * will be returned; otherwise only user-created jobs will be returned. System-
   * managed jobs can neither be modified nor deleted.
   * @opt_param int pageSize Requested page size. Server may return fewer jobs
   * than requested. If unspecified, server will pick an appropriate default.
   * @return Google_Service_YouTubeReporting_ListJobsResponse
   */
  public function listJobs($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_YouTubeReporting_ListJobsResponse");
  }
}
