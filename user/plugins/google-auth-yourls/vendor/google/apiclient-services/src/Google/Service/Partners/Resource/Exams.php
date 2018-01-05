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
 * The "exams" collection of methods.
 * Typical usage is:
 *  <code>
 *   $partnersService = new Google_Service_Partners(...);
 *   $exams = $partnersService->exams;
 *  </code>
 */
class Google_Service_Partners_Resource_Exams extends Google_Service_Resource
{
  /**
   * Gets an Exam Token for a Partner's user to take an exam in the Exams System
   * (exams.getToken)
   *
   * @param string $examType The exam type we are requesting a token for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestMetadata.partnersSessionId Google Partners session
   * ID.
   * @opt_param string requestMetadata.userOverrides.userId Logged-in user ID to
   * impersonate instead of the user's ID.
   * @opt_param string requestMetadata.trafficSource.trafficSourceId Identifier to
   * indicate where the traffic comes from. An identifier has multiple letters
   * created by a team which redirected the traffic to us.
   * @opt_param string requestMetadata.locale Locale to use for the current
   * request.
   * @opt_param string requestMetadata.userOverrides.ipAddress IP address to use
   * instead of the user's geo-located IP address.
   * @opt_param string requestMetadata.experimentIds Experiment IDs the current
   * request belongs to.
   * @opt_param string requestMetadata.trafficSource.trafficSubId Second level
   * identifier to indicate where the traffic comes from. An identifier has
   * multiple letters created by a team which redirected the traffic to us.
   * @return Google_Service_Partners_ExamToken
   */
  public function getToken($examType, $optParams = array())
  {
    $params = array('examType' => $examType);
    $params = array_merge($params, $optParams);
    return $this->call('getToken', array($params), "Google_Service_Partners_ExamToken");
  }
}
