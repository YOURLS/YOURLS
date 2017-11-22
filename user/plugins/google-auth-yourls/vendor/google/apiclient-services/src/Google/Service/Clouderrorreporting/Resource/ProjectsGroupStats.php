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
 * The "groupStats" collection of methods.
 * Typical usage is:
 *  <code>
 *   $clouderrorreportingService = new Google_Service_Clouderrorreporting(...);
 *   $groupStats = $clouderrorreportingService->groupStats;
 *  </code>
 */
class Google_Service_Clouderrorreporting_Resource_ProjectsGroupStats extends Google_Service_Resource
{
  /**
   * Lists the specified groups. (groupStats.listProjectsGroupStats)
   *
   * @param string $projectName [Required] The resource name of the Google Cloud
   * Platform project. Written as projects/ plus the Google Cloud Platform project
   * ID.
   *
   * Example: projects/my-project-123.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string timeRange.period Restricts the query to the specified time
   * range.
   * @opt_param string alignment [Optional] The alignment of the timed counts to
   * be returned. Default is `ALIGNMENT_EQUAL_AT_END`.
   * @opt_param string groupId [Optional] List all ErrorGroupStats with these IDs.
   * @opt_param string serviceFilter.service [Optional] The exact value to match
   * against [`ServiceContext.service`](/error-
   * reporting/reference/rest/v1beta1/ServiceContext#FIELDS.service).
   * @opt_param int pageSize [Optional] The maximum number of results to return
   * per response. Default is 20.
   * @opt_param string serviceFilter.version [Optional] The exact value to match
   * against [`ServiceContext.version`](/error-
   * reporting/reference/rest/v1beta1/ServiceContext#FIELDS.version).
   * @opt_param string order [Optional] The sort order in which the results are
   * returned. Default is `COUNT_DESC`.
   * @opt_param string serviceFilter.resourceType [Optional] The exact value to
   * match against [`ServiceContext.resource_type`](/error-
   * reporting/reference/rest/v1beta1/ServiceContext#FIELDS.resource_type).
   * @opt_param string alignmentTime [Optional] Time where the timed counts shall
   * be aligned if rounded alignment is chosen. Default is 00:00 UTC.
   * @opt_param string timedCountDuration [Optional] The preferred duration for a
   * single returned `TimedCount`. If not set, no timed counts are returned.
   * @opt_param string pageToken [Optional] A `next_page_token` provided by a
   * previous response. To view additional results, pass this token along with the
   * identical query parameters as the first request.
   * @return Google_Service_Clouderrorreporting_ListGroupStatsResponse
   */
  public function listProjectsGroupStats($projectName, $optParams = array())
  {
    $params = array('projectName' => $projectName);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Clouderrorreporting_ListGroupStatsResponse");
  }
}
