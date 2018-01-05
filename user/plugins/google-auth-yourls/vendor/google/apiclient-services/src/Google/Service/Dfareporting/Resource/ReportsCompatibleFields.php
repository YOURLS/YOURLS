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
 * The "compatibleFields" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google_Service_Dfareporting(...);
 *   $compatibleFields = $dfareportingService->compatibleFields;
 *  </code>
 */
class Google_Service_Dfareporting_Resource_ReportsCompatibleFields extends Google_Service_Resource
{
  /**
   * Returns the fields that are compatible to be selected in the respective
   * sections of a report criteria, given the fields already selected in the input
   * report and user permissions. (compatibleFields.query)
   *
   * @param string $profileId The DFA user profile ID.
   * @param Google_Service_Dfareporting_Report $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dfareporting_CompatibleFields
   */
  public function query($profileId, Google_Service_Dfareporting_Report $postBody, $optParams = array())
  {
    $params = array('profileId' => $profileId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('query', array($params), "Google_Service_Dfareporting_CompatibleFields");
  }
}
