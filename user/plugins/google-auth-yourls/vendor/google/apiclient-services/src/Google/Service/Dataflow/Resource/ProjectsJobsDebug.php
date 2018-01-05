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
 * The "debug" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google_Service_Dataflow(...);
 *   $debug = $dataflowService->debug;
 *  </code>
 */
class Google_Service_Dataflow_Resource_ProjectsJobsDebug extends Google_Service_Resource
{
  /**
   * Get encoded debug configuration for component. Not cacheable.
   * (debug.getConfig)
   *
   * @param string $projectId The project id.
   * @param string $jobId The job id.
   * @param Google_Service_Dataflow_GetDebugConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataflow_GetDebugConfigResponse
   */
  public function getConfig($projectId, $jobId, Google_Service_Dataflow_GetDebugConfigRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'jobId' => $jobId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getConfig', array($params), "Google_Service_Dataflow_GetDebugConfigResponse");
  }
  /**
   * Send encoded debug capture data for component. (debug.sendCapture)
   *
   * @param string $projectId The project id.
   * @param string $jobId The job id.
   * @param Google_Service_Dataflow_SendDebugCaptureRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataflow_SendDebugCaptureResponse
   */
  public function sendCapture($projectId, $jobId, Google_Service_Dataflow_SendDebugCaptureRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'jobId' => $jobId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('sendCapture', array($params), "Google_Service_Dataflow_SendDebugCaptureResponse");
  }
}
