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
 * The "statscollection" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudlatencytestService = new Google_Service_Cloudlatencytest(...);
 *   $statscollection = $cloudlatencytestService->statscollection;
 *  </code>
 */
class Google_Service_Cloudlatencytest_StatscollectionResource extends Google_Service_Resource
{
  /**
   * RPC to update the new TCP stats. (statscollection.updateaggregatedstats)
   *
   * @param Google_Service_Cloudlatencytest_AggregatedStats $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudlatencytest_AggregatedStatsReply
   */
  public function updateaggregatedstats(Google_Service_Cloudlatencytest_AggregatedStats $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateaggregatedstats', array($params), "Google_Service_Cloudlatencytest_AggregatedStatsReply");
  }
  /**
   * RPC to update the new TCP stats. (statscollection.updatestats)
   *
   * @param Google_Service_Cloudlatencytest_Stats $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudlatencytest_StatsReply
   */
  public function updatestats(Google_Service_Cloudlatencytest_Stats $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updatestats', array($params), "Google_Service_Cloudlatencytest_StatsReply");
  }
}
