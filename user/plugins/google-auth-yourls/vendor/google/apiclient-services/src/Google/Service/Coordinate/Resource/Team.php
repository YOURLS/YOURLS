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
 * The "team" collection of methods.
 * Typical usage is:
 *  <code>
 *   $coordinateService = new Google_Service_Coordinate(...);
 *   $team = $coordinateService->team;
 *  </code>
 */
class Google_Service_Coordinate_Resource_Team extends Google_Service_Resource
{
  /**
   * Retrieves a list of teams for a user. (team.listTeam)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool admin Whether to include teams for which the user has the
   * Admin role.
   * @opt_param bool dispatcher Whether to include teams for which the user has
   * the Dispatcher role.
   * @opt_param bool worker Whether to include teams for which the user has the
   * Worker role.
   * @return Google_Service_Coordinate_TeamListResponse
   */
  public function listTeam($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Coordinate_TeamListResponse");
  }
}
