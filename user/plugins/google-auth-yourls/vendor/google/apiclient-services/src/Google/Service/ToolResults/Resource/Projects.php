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
 *   $toolresultsService = new Google_Service_ToolResults(...);
 *   $projects = $toolresultsService->projects;
 *  </code>
 */
class Google_Service_ToolResults_Resource_Projects extends Google_Service_Resource
{
  /**
   * Gets the Tool Results settings for a project.
   *
   * May return any of the following canonical error codes:
   *
   * - PERMISSION_DENIED - if the user is not authorized to read from project
   * (projects.getSettings)
   *
   * @param string $projectId A Project id.
   *
   * Required.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ToolResults_ProjectSettings
   */
  public function getSettings($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('getSettings', array($params), "Google_Service_ToolResults_ProjectSettings");
  }
  /**
   * Creates resources for settings which have not yet been set.
   *
   * Currently, this creates a single resource: a Google Cloud Storage bucket, to
   * be used as the default bucket for this project. The bucket is created in an
   * FTL-own storage project. Except for in rare cases, calling this method in
   * parallel from multiple clients will only create a single bucket. In order to
   * avoid unnecessary storage charges, the bucket is configured to automatically
   * delete objects older than 90 days.
   *
   * The bucket is created with the following permissions: - Owner access for
   * owners of central storage project (FTL-owned) - Writer access for
   * owners/editors of customer project - Reader access for viewers of customer
   * project The default ACL on objects created in the bucket is: - Owner access
   * for owners of central storage project - Reader access for
   * owners/editors/viewers of customer project See Google Cloud Storage
   * documentation for more details.
   *
   * If there is already a default bucket set and the project can access the
   * bucket, this call does nothing. However, if the project doesn't have the
   * permission to access the bucket or the bucket is deleted, a new bucket will
   * be created.
   *
   * May return any canonical error codes, including the following:
   *
   * - PERMISSION_DENIED - if the user is not authorized to write to project - Any
   * error code raised by Google Cloud Storage (projects.initializeSettings)
   *
   * @param string $projectId A Project id.
   *
   * Required.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ToolResults_ProjectSettings
   */
  public function initializeSettings($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('initializeSettings', array($params), "Google_Service_ToolResults_ProjectSettings");
  }
}
