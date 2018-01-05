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
 * The "zones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $autoscalerService = new Google_Service_Autoscaler(...);
 *   $zones = $autoscalerService->zones;
 *  </code>
 */
class Google_Service_Autoscaler_Resource_Zones extends Google_Service_Resource
{
  /**
   * (zones.listZones)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * @opt_param string maxResults
   * @opt_param string pageToken
   * @opt_param string project
   * @return Google_Service_Autoscaler_ZoneList
   */
  public function listZones($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Autoscaler_ZoneList");
  }
}
