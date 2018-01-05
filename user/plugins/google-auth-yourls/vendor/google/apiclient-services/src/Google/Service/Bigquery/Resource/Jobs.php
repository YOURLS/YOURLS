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
 *   $bigqueryService = new Google_Service_Bigquery(...);
 *   $jobs = $bigqueryService->jobs;
 *  </code>
 */
class Google_Service_Bigquery_Resource_Jobs extends Google_Service_Resource
{
  /**
   * Requests that a job be cancelled. This call will return immediately, and the
   * client will need to poll for the job status to see if the cancel completed
   * successfully. Cancelled jobs may still incur costs. (jobs.cancel)
   *
   * @param string $projectId [Required] Project ID of the job to cancel
   * @param string $jobId [Required] Job ID of the job to cancel
   * @param array $optParams Optional parameters.
   * @return Google_Service_Bigquery_JobCancelResponse
   */
  public function cancel($projectId, $jobId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_Bigquery_JobCancelResponse");
  }
  /**
   * Returns information about a specific job. Job information is available for a
   * six month period after creation. Requires that you're the person who ran the
   * job, or have the Is Owner project role. (jobs.get)
   *
   * @param string $projectId [Required] Project ID of the requested job
   * @param string $jobId [Required] Job ID of the requested job
   * @param array $optParams Optional parameters.
   * @return Google_Service_Bigquery_Job
   */
  public function get($projectId, $jobId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Bigquery_Job");
  }
  /**
   * Retrieves the results of a query job. (jobs.getQueryResults)
   *
   * @param string $projectId [Required] Project ID of the query job
   * @param string $jobId [Required] Job ID of the query job
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of results to read
   * @opt_param string pageToken Page token, returned by a previous call, to
   * request the next page of results
   * @opt_param string startIndex Zero-based index of the starting row
   * @opt_param string timeoutMs How long to wait for the query to complete, in
   * milliseconds, before returning. Default is 10 seconds. If the timeout passes
   * before the job completes, the 'jobComplete' field in the response will be
   * false
   * @return Google_Service_Bigquery_GetQueryResultsResponse
   */
  public function getQueryResults($projectId, $jobId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('getQueryResults', array($params), "Google_Service_Bigquery_GetQueryResultsResponse");
  }
  /**
   * Starts a new asynchronous job. Requires the Can View project role.
   * (jobs.insert)
   *
   * @param string $projectId Project ID of the project that will be billed for
   * the job
   * @param Google_Service_Bigquery_Job $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Bigquery_Job
   */
  public function insert($projectId, Google_Service_Bigquery_Job $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Bigquery_Job");
  }
  /**
   * Lists all jobs that you started in the specified project. Job information is
   * available for a six month period after creation. The job list is sorted in
   * reverse chronological order, by job creation time. Requires the Can View
   * project role, or the Is Owner project role if you set the allUsers property.
   * (jobs.listJobs)
   *
   * @param string $projectId Project ID of the jobs to list
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allUsers Whether to display jobs owned by all users in the
   * project. Default false
   * @opt_param string maxResults Maximum number of results to return
   * @opt_param string pageToken Page token, returned by a previous call, to
   * request the next page of results
   * @opt_param string projection Restrict information returned to a set of
   * selected fields
   * @opt_param string stateFilter Filter for job state
   * @return Google_Service_Bigquery_JobList
   */
  public function listJobs($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Bigquery_JobList");
  }
  /**
   * Runs a BigQuery SQL query synchronously and returns query results if the
   * query completes within a specified timeout. (jobs.query)
   *
   * @param string $projectId Project ID of the project billed for the query
   * @param Google_Service_Bigquery_QueryRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Bigquery_QueryResponse
   */
  public function query($projectId, Google_Service_Bigquery_QueryRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('query', array($params), "Google_Service_Bigquery_QueryResponse");
  }
}
