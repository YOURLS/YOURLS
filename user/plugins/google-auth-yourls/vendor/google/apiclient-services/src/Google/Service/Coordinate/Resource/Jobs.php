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
 *   $coordinateService = new Google_Service_Coordinate(...);
 *   $jobs = $coordinateService->jobs;
 *  </code>
 */
class Google_Service_Coordinate_Resource_Jobs extends Google_Service_Resource
{
  /**
   * Retrieves a job, including all the changes made to the job. (jobs.get)
   *
   * @param string $teamId Team ID
   * @param string $jobId Job number
   * @param array $optParams Optional parameters.
   * @return Google_Service_Coordinate_Job
   */
  public function get($teamId, $jobId, $optParams = array())
  {
    $params = array('teamId' => $teamId, 'jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Coordinate_Job");
  }
  /**
   * Inserts a new job. Only the state field of the job should be set.
   * (jobs.insert)
   *
   * @param string $teamId Team ID
   * @param string $address Job address as newline (Unix) separated string
   * @param double $lat The latitude coordinate of this job's location.
   * @param double $lng The longitude coordinate of this job's location.
   * @param string $title Job title
   * @param Google_Service_Coordinate_Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string assignee Assignee email address, or empty string to
   * unassign.
   * @opt_param string customField Sets the value of custom fields. To set a
   * custom field, pass the field id (from /team/teamId/custom_fields), a URL
   * escaped '=' character, and the desired value as a parameter. For example,
   * customField=12%3DAlice. Repeat the parameter for each custom field. Note that
   * '=' cannot appear in the parameter value. Specifying an invalid, or inactive
   * enum field will result in an error 500.
   * @opt_param string customerName Customer name
   * @opt_param string customerPhoneNumber Customer phone number
   * @opt_param string note Job note as newline (Unix) separated string
   * @return Google_Service_Coordinate_Job
   */
  public function insert($teamId, $address, $lat, $lng, $title, Google_Service_Coordinate_Job $postBody, $optParams = array())
  {
    $params = array('teamId' => $teamId, 'address' => $address, 'lat' => $lat, 'lng' => $lng, 'title' => $title, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Coordinate_Job");
  }
  /**
   * Retrieves jobs created or modified since the given timestamp. (jobs.listJobs)
   *
   * @param string $teamId Team ID
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of results to return in one page.
   * @opt_param string minModifiedTimestampMs Minimum time a job was modified in
   * milliseconds since epoch.
   * @opt_param bool omitJobChanges Whether to omit detail job history
   * information.
   * @opt_param string pageToken Continuation token
   * @return Google_Service_Coordinate_JobListResponse
   */
  public function listJobs($teamId, $optParams = array())
  {
    $params = array('teamId' => $teamId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Coordinate_JobListResponse");
  }
  /**
   * Updates a job. Fields that are set in the job state will be updated. This
   * method supports patch semantics. (jobs.patch)
   *
   * @param string $teamId Team ID
   * @param string $jobId Job number
   * @param Google_Service_Coordinate_Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string address Job address as newline (Unix) separated string
   * @opt_param string assignee Assignee email address, or empty string to
   * unassign.
   * @opt_param string customField Sets the value of custom fields. To set a
   * custom field, pass the field id (from /team/teamId/custom_fields), a URL
   * escaped '=' character, and the desired value as a parameter. For example,
   * customField=12%3DAlice. Repeat the parameter for each custom field. Note that
   * '=' cannot appear in the parameter value. Specifying an invalid, or inactive
   * enum field will result in an error 500.
   * @opt_param string customerName Customer name
   * @opt_param string customerPhoneNumber Customer phone number
   * @opt_param double lat The latitude coordinate of this job's location.
   * @opt_param double lng The longitude coordinate of this job's location.
   * @opt_param string note Job note as newline (Unix) separated string
   * @opt_param string progress Job progress
   * @opt_param string title Job title
   * @return Google_Service_Coordinate_Job
   */
  public function patch($teamId, $jobId, Google_Service_Coordinate_Job $postBody, $optParams = array())
  {
    $params = array('teamId' => $teamId, 'jobId' => $jobId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Coordinate_Job");
  }
  /**
   * Updates a job. Fields that are set in the job state will be updated.
   * (jobs.update)
   *
   * @param string $teamId Team ID
   * @param string $jobId Job number
   * @param Google_Service_Coordinate_Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string address Job address as newline (Unix) separated string
   * @opt_param string assignee Assignee email address, or empty string to
   * unassign.
   * @opt_param string customField Sets the value of custom fields. To set a
   * custom field, pass the field id (from /team/teamId/custom_fields), a URL
   * escaped '=' character, and the desired value as a parameter. For example,
   * customField=12%3DAlice. Repeat the parameter for each custom field. Note that
   * '=' cannot appear in the parameter value. Specifying an invalid, or inactive
   * enum field will result in an error 500.
   * @opt_param string customerName Customer name
   * @opt_param string customerPhoneNumber Customer phone number
   * @opt_param double lat The latitude coordinate of this job's location.
   * @opt_param double lng The longitude coordinate of this job's location.
   * @opt_param string note Job note as newline (Unix) separated string
   * @opt_param string progress Job progress
   * @opt_param string title Job title
   * @return Google_Service_Coordinate_Job
   */
  public function update($teamId, $jobId, Google_Service_Coordinate_Job $postBody, $optParams = array())
  {
    $params = array('teamId' => $teamId, 'jobId' => $jobId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Coordinate_Job");
  }
}
