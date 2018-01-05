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
 * The "triggers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbuildService = new Google_Service_CloudBuild(...);
 *   $triggers = $cloudbuildService->triggers;
 *  </code>
 */
class Google_Service_CloudBuild_Resource_ProjectsTriggers extends Google_Service_Resource
{
  /**
   * Creates a new BuildTrigger.
   *
   * This API is experimental. (triggers.create)
   *
   * @param string $projectId ID of the project for which to configure automatic
   * builds.
   * @param Google_Service_CloudBuild_BuildTrigger $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudBuild_BuildTrigger
   */
  public function create($projectId, Google_Service_CloudBuild_BuildTrigger $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudBuild_BuildTrigger");
  }
  /**
   * Deletes an BuildTrigger by its project ID and trigger ID.
   *
   * This API is experimental. (triggers.delete)
   *
   * @param string $projectId ID of the project that owns the trigger.
   * @param string $triggerId ID of the BuildTrigger to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudBuild_CloudbuildEmpty
   */
  public function delete($projectId, $triggerId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'triggerId' => $triggerId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudBuild_CloudbuildEmpty");
  }
  /**
   * Gets information about a BuildTrigger.
   *
   * This API is experimental. (triggers.get)
   *
   * @param string $projectId ID of the project that owns the trigger.
   * @param string $triggerId ID of the BuildTrigger to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudBuild_BuildTrigger
   */
  public function get($projectId, $triggerId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'triggerId' => $triggerId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudBuild_BuildTrigger");
  }
  /**
   * Lists existing BuildTrigger.
   *
   * This API is experimental. (triggers.listProjectsTriggers)
   *
   * @param string $projectId ID of the project for which to list BuildTriggers.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudBuild_ListBuildTriggersResponse
   */
  public function listProjectsTriggers($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudBuild_ListBuildTriggersResponse");
  }
  /**
   * Updates an BuildTrigger by its project ID and trigger ID.
   *
   * This API is experimental. (triggers.patch)
   *
   * @param string $projectId ID of the project that owns the trigger.
   * @param string $triggerId ID of the BuildTrigger to update.
   * @param Google_Service_CloudBuild_BuildTrigger $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudBuild_BuildTrigger
   */
  public function patch($projectId, $triggerId, Google_Service_CloudBuild_BuildTrigger $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'triggerId' => $triggerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudBuild_BuildTrigger");
  }
  /**
   * Runs a BuildTrigger at a particular source revision. (triggers.run)
   *
   * @param string $projectId ID of the project.
   * @param string $triggerId ID of the trigger.
   * @param Google_Service_CloudBuild_RepoSource $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudBuild_Operation
   */
  public function run($projectId, $triggerId, Google_Service_CloudBuild_RepoSource $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'triggerId' => $triggerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('run', array($params), "Google_Service_CloudBuild_Operation");
  }
}
