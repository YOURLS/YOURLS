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
 * The "perfMetricsSummary" collection of methods.
 * Typical usage is:
 *  <code>
 *   $toolresultsService = new Google_Service_ToolResults(...);
 *   $perfMetricsSummary = $toolresultsService->perfMetricsSummary;
 *  </code>
 */
class Google_Service_ToolResults_Resource_ProjectsHistoriesExecutionsStepsPerfMetricsSummary extends Google_Service_Resource
{
  /**
   * Creates a PerfMetricsSummary resource. Returns the existing one if it has
   * already been created.
   *
   * May return any of the following error code(s): - NOT_FOUND - The containing
   * Step does not exist (perfMetricsSummary.create)
   *
   * @param string $projectId The cloud project
   * @param string $historyId A tool results history ID.
   * @param string $executionId A tool results execution ID.
   * @param string $stepId A tool results step ID.
   * @param Google_Service_ToolResults_PerfMetricsSummary $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ToolResults_PerfMetricsSummary
   */
  public function create($projectId, $historyId, $executionId, $stepId, Google_Service_ToolResults_PerfMetricsSummary $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId, 'stepId' => $stepId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_ToolResults_PerfMetricsSummary");
  }
}
