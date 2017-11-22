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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $clouderrorreportingService = new Google_Service_Clouderrorreporting(...);
 *   $projects = $clouderrorreportingService->projects;
 *  </code>
 */
class Google_Service_Clouderrorreporting_Resource_Projects extends Google_Service_Resource
{
  /**
   * Deletes all error events of a given project. (projects.deleteEvents)
   *
   * @param string $projectName [Required] The resource name of the Google Cloud
   * Platform project. Written as `projects/` plus the [Google Cloud Platform
   * project ID](https://support.google.com/cloud/answer/6158840). Example:
   * `projects/my-project-123`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Clouderrorreporting_DeleteEventsResponse
   */
  public function deleteEvents($projectName, $optParams = array())
  {
    $params = array('projectName' => $projectName);
    $params = array_merge($params, $optParams);
    return $this->call('deleteEvents', array($params), "Google_Service_Clouderrorreporting_DeleteEventsResponse");
  }
}
