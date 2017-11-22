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
 *   $dataflowService = new Google_Service_Dataflow(...);
 *   $jobs = $dataflowService->jobs;
 *  </code>
 */
class Google_Service_Dataflow_Resource_ProjectsJobs extends Google_Service_Resource
{
  /**
   * List the jobs of a project across all regions. (jobs.aggregated)
   *
   * @param string $projectId The project which owns the jobs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize If there are many jobs, limit response to at most
   * this many. The actual number of jobs returned will be the lesser of
   * max_responses and an unspecified server-defined limit.
   * @opt_param string view Level of information requested in response. Default is
   * `JOB_VIEW_SUMMARY`.
   * @opt_param string filter The kind of filter to use.
   * @opt_param string location The location that contains this job.
   * @opt_param string pageToken Set this to the 'next_page_token' field of a
   * previous response to request additional results in a long list.
   * @return Google_Service_Dataflow_ListJobsResponse
   */
  public function aggregated($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('aggregated', array($params), "Google_Service_Dataflow_ListJobsResponse");
  }
  /**
   * Creates a Cloud Dataflow job. (jobs.create)
   *
   * @param string $projectId The ID of the Cloud Platform project that the job
   * belongs to.
   * @param Google_Service_Dataflow_Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string location The location that contains this job.
   * @opt_param string replaceJobId Deprecated. This field is now in the Job
   * message.
   * @opt_param string view The level of information requested in response.
   * @return Google_Service_Dataflow_Job
   */
  public function create($projectId, Google_Service_Dataflow_Job $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dataflow_Job");
  }
  /**
   * Gets the state of the specified Cloud Dataflow job. (jobs.get)
   *
   * @param string $projectId The ID of the Cloud Platform project that the job
   * belongs to.
   * @param string $jobId The job ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string location The location that contains this job.
   * @opt_param string view The level of information requested in response.
   * @return Google_Service_Dataflow_Job
   */
  public function get($projectId, $jobId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dataflow_Job");
  }
  /**
   * Request the job status. (jobs.getMetrics)
   *
   * @param string $projectId A project id.
   * @param string $jobId The job to get messages for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string location The location which contains the job specified by
   * job_id.
   * @opt_param string startTime Return only metric data that has changed since
   * this time. Default is to return all information about all metrics for the
   * job.
   * @return Google_Service_Dataflow_JobMetrics
   */
  public function getMetrics($projectId, $jobId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('getMetrics', array($params), "Google_Service_Dataflow_JobMetrics");
  }
  /**
   * List the jobs of a project in a given region. (jobs.listProjectsJobs)
   *
   * @param string $projectId The project which owns the jobs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Set this to the 'next_page_token' field of a
   * previous response to request additional results in a long list.
   * @opt_param int pageSize If there are many jobs, limit response to at most
   * this many. The actual number of jobs returned will be the lesser of
   * max_responses and an unspecified server-defined limit.
   * @opt_param string view Level of information requested in response. Default is
   * `JOB_VIEW_SUMMARY`.
   * @opt_param string filter The kind of filter to use.
   * @opt_param string location The location that contains this job.
   * @return Google_Service_Dataflow_ListJobsResponse
   */
  public function listProjectsJobs($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dataflow_ListJobsResponse");
  }
  /**
   * Updates the state of an existing Cloud Dataflow job. (jobs.update)
   *
   * @param string $projectId The ID of the Cloud Platform project that the job
   * belongs to.
   * @param string $jobId The job ID.
   * @param Google_Service_Dataflow_Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string location The location that contains this job.
   * @return Google_Service_Dataflow_Job
   */
  public function update($projectId, $jobId, Google_Service_Dataflow_Job $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'jobId' => $jobId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Dataflow_Job");
  }
}
