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
 * The "colors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $calendarService = new Google_Service_Calendar(...);
 *   $colors = $calendarService->colors;
 *  </code>
 */
class Google_Service_Calendar_Resource_Colors extends Google_Service_Resource
{
  /**
   * Returns the color definitions for calendars and events. (colors.get)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_Calendar_Colors
   */
  public function get($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Calendar_Colors");
  }
}
