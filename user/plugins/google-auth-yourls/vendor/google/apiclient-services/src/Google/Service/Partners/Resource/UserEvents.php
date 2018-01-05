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
 * The "userEvents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $partnersService = new Google_Service_Partners(...);
 *   $userEvents = $partnersService->userEvents;
 *  </code>
 */
class Google_Service_Partners_Resource_UserEvents extends Google_Service_Resource
{
  /**
   * Logs a user event. (userEvents.log)
   *
   * @param Google_Service_Partners_LogUserEventRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Partners_LogUserEventResponse
   */
  public function log(Google_Service_Partners_LogUserEventRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('log', array($params), "Google_Service_Partners_LogUserEventResponse");
  }
}
