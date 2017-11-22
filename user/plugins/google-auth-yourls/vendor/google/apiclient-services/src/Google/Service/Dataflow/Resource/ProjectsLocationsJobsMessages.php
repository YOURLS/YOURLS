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
 * The "messages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google_Service_Dataflow(...);
 *   $messages = $dataflowService->messages;
 *  </code>
 */
class Google_Service_Dataflow_Resource_ProjectsLocationsJobsMessages extends Google_Service_Resource
{
  /**
   * Request the job status. (messages.listProjectsLocationsJobsMessages)
   *
   * @param string $projectId A project id.
   * @param string $location The location which contains the job specified by
   * job_id.
   * @param string $jobId The job to get messages about.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endTime Return only messages with timestamps < end_time.
   * The default is now (i.e. return up to the latest messages available).
   * @opt_param string pageToken If supplied, this should be the value of
   * next_page_token returned by an earlier call. This will cause the next page of
   * results to be returned.
   * @opt_param string startTime If specified, return only messages with
   * timestamps >= start_time. The default is the job creation time (i.e.
   * beginning of messages).
   * @opt_param int pageSize If specified, determines the maximum number of
   * messages to return.  If unspecified, the service may choose an appropriate
   * default, or may return an arbitrarily large number of results.
   * @opt_param string minimumImportance Filter to only get messages with
   * importance >= level
   * @return Google_Service_Dataflow_ListJobMessagesResponse
   */
  public function listProjectsLocationsJobsMessages($projectId, $location, $jobId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'location' => $location, 'jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dataflow_ListJobMessagesResponse");
  }
}
