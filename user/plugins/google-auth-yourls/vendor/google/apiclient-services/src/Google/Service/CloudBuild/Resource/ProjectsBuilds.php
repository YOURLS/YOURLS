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
 * The "builds" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbuildService = new Google_Service_CloudBuild(...);
 *   $builds = $cloudbuildService->builds;
 *  </code>
 */
class Google_Service_CloudBuild_Resource_ProjectsBuilds extends Google_Service_Resource
{
  /**
   * Cancels a requested build in progress. (builds.cancel)
   *
   * @param string $projectId ID of the project.
   * @param string $id ID of the build.
   * @param Google_Service_CloudBuild_CancelBuildRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudBuild_Build
   */
  public function cancel($projectId, $id, Google_Service_CloudBuild_CancelBuildRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_CloudBuild_Build");
  }
  /**
   * Starts a build with the specified configuration.
   *
   * The long-running Operation returned by this method will include the ID of the
   * build, which can be passed to GetBuild to determine its status (e.g., success
   * or failure). (builds.create)
   *
   * @param string $projectId ID of the project.
   * @param Google_Service_CloudBuild_Build $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudBuild_Operation
   */
  public function create($projectId, Google_Service_CloudBuild_Build $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudBuild_Operation");
  }
  /**
   * Returns information about a previously requested build.
   *
   * The Build that is returned includes its status (e.g., success or failure, or
   * in-progress), and timing information. (builds.get)
   *
   * @param string $projectId ID of the project.
   * @param string $id ID of the build.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudBuild_Build
   */
  public function get($projectId, $id, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudBuild_Build");
  }
  /**
   * Lists previously requested builds.
   *
   * Previously requested builds may still be in-progress, or may have finished
   * successfully or unsuccessfully. (builds.listProjectsBuilds)
   *
   * @param string $projectId ID of the project.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The raw filter text to constrain the results.
   * @opt_param string pageToken Token to provide to skip to a particular spot in
   * the list.
   * @opt_param int pageSize Number of results to return in the list.
   * @return Google_Service_CloudBuild_ListBuildsResponse
   */
  public function listProjectsBuilds($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudBuild_ListBuildsResponse");
  }
  /**
   * Creates a new build based on the given build.
   *
   * This API creates a new build using the original build request,  which may or
   * may not result in an identical build.
   *
   * For triggered builds:
   *
   * * Triggered builds resolve to a precise revision, so a retry of a triggered
   * build will result in a build that uses the same revision.
   *
   * For non-triggered builds that specify RepoSource:
   *
   * * If the original build built from the tip of a branch, the retried build
   * will build from the tip of that branch, which may not be the same revision as
   * the original build. * If the original build specified a commit sha or
   * revision ID, the retried build will use the identical source.
   *
   * For builds that specify StorageSource:
   *
   * * If the original build pulled source from Cloud Storage without specifying
   * the generation of the object, the new build will use the current object,
   * which may be different from the original build source. * If the original
   * build pulled source from Cloud Storage and specified the generation of the
   * object, the new build will attempt to use the same object, which may or may
   * not be available depending on the bucket's lifecycle management settings.
   * (builds.retry)
   *
   * @param string $projectId ID of the project.
   * @param string $id Build ID of the original build.
   * @param Google_Service_CloudBuild_RetryBuildRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudBuild_Operation
   */
  public function retry($projectId, $id, Google_Service_CloudBuild_RetryBuildRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('retry', array($params), "Google_Service_CloudBuild_Operation");
  }
}
