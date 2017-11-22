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
 * The "schedule" collection of methods.
 * Typical usage is:
 *  <code>
 *   $coordinateService = new Google_Service_Coordinate(...);
 *   $schedule = $coordinateService->schedule;
 *  </code>
 */
class Google_Service_Coordinate_Resource_Schedule extends Google_Service_Resource
{
  /**
   * Retrieves the schedule for a job. (schedule.get)
   *
   * @param string $teamId Team ID
   * @param string $jobId Job number
   * @param array $optParams Optional parameters.
   * @return Google_Service_Coordinate_Schedule
   */
  public function get($teamId, $jobId, $optParams = array())
  {
    $params = array('teamId' => $teamId, 'jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Coordinate_Schedule");
  }
  /**
   * Replaces the schedule of a job with the provided schedule. This method
   * supports patch semantics. (schedule.patch)
   *
   * @param string $teamId Team ID
   * @param string $jobId Job number
   * @param Google_Service_Coordinate_Schedule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allDay Whether the job is scheduled for the whole day. Time
   * of day in start/end times is ignored if this is true.
   * @opt_param string duration Job duration in milliseconds.
   * @opt_param string endTime Scheduled end time in milliseconds since epoch.
   * @opt_param string startTime Scheduled start time in milliseconds since epoch.
   * @return Google_Service_Coordinate_Schedule
   */
  public function patch($teamId, $jobId, Google_Service_Coordinate_Schedule $postBody, $optParams = array())
  {
    $params = array('teamId' => $teamId, 'jobId' => $jobId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Coordinate_Schedule");
  }
  /**
   * Replaces the schedule of a job with the provided schedule. (schedule.update)
   *
   * @param string $teamId Team ID
   * @param string $jobId Job number
   * @param Google_Service_Coordinate_Schedule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allDay Whether the job is scheduled for the whole day. Time
   * of day in start/end times is ignored if this is true.
   * @opt_param string duration Job duration in milliseconds.
   * @opt_param string endTime Scheduled end time in milliseconds since epoch.
   * @opt_param string startTime Scheduled start time in milliseconds since epoch.
   * @return Google_Service_Coordinate_Schedule
   */
  public function update($teamId, $jobId, Google_Service_Coordinate_Schedule $postBody, $optParams = array())
  {
    $params = array('teamId' => $teamId, 'jobId' => $jobId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Coordinate_Schedule");
  }
}
