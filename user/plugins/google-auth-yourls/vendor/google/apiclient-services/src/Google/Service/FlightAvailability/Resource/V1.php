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
 * The "v1" collection of methods.
 * Typical usage is:
 *  <code>
 *   $flightavailabilityService = new Google_Service_FlightAvailability(...);
 *   $v1 = $flightavailabilityService->v1;
 *  </code>
 */
class Google_Service_FlightAvailability_Resource_V1 extends Google_Service_Resource
{
  /**
   * Called by a partner: receives questions, each of which consists of one or
   * more segments, and returns answers with availability data. (v1.query)
   *
   * @param Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestions $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswers
   */
  public function query(Google_Service_FlightAvailability_FlightavailabilityPartnerAvailQuestions $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('query', array($params), "Google_Service_FlightAvailability_FlightavailabilityPartnerAvailAnswers");
  }
}
