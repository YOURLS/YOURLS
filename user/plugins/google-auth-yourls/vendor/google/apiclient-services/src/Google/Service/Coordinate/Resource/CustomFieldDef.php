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
 * The "customFieldDef" collection of methods.
 * Typical usage is:
 *  <code>
 *   $coordinateService = new Google_Service_Coordinate(...);
 *   $customFieldDef = $coordinateService->customFieldDef;
 *  </code>
 */
class Google_Service_Coordinate_Resource_CustomFieldDef extends Google_Service_Resource
{
  /**
   * Retrieves a list of custom field definitions for a team.
   * (customFieldDef.listCustomFieldDef)
   *
   * @param string $teamId Team ID
   * @param array $optParams Optional parameters.
   * @return Google_Service_Coordinate_CustomFieldDefListResponse
   */
  public function listCustomFieldDef($teamId, $optParams = array())
  {
    $params = array('teamId' => $teamId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Coordinate_CustomFieldDefListResponse");
  }
}
