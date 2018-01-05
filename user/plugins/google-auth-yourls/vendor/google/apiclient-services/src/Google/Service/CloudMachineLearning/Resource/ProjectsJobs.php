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
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mlService = new Google_Service_CloudMachineLearning(...);
 *   $jobs = $mlService->jobs;
 *  </code>
 */
class Google_Service_CloudMachineLearning_Resource_ProjectsJobs extends Google_Service_Resource
{
  /**
   * Cancels a running job. (jobs.cancel)
   *
   * @param string $name Required. The name of the job to cancel.
   *
   * Authorization: requires `Editor` role on the parent project.
   * @param Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1CancelJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearning_GoogleProtobufEmpty
   */
  public function cancel($name, Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1CancelJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_CloudMachineLearning_GoogleProtobufEmpty");
  }
  /**
   * Creates a training or a batch prediction job. (jobs.create)
   *
   * @param string $parent Required. The project name.
   *
   * Authorization: requires `Editor` role on the specified project.
   * @param Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Job $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Job
   */
  public function create($parent, Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Job $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Job");
  }
  /**
   * Describes a job. (jobs.get)
   *
   * @param string $name Required. The name of the job to get the description of.
   *
   * Authorization: requires `Viewer` role on the parent project.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Job
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Job");
  }
  /**
   * Lists the jobs in the project. (jobs.listProjectsJobs)
   *
   * @param string $parent Required. The name of the project for which to list
   * jobs.
   *
   * Authorization: requires `Viewer` role on the specified project.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The number of jobs to retrieve per "page"
   * of results. If there are more remaining results than this number, the
   * response message will contain a valid value in the `next_page_token` field.
   *
   * The default value is 20, and the maximum page size is 100.
   * @opt_param string filter Optional. Specifies the subset of jobs to retrieve.
   * @opt_param string pageToken Optional. A page token to request the next page
   * of results.
   *
   * You get the token from the `next_page_token` field of the response from the
   * previous call.
   * @return Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1ListJobsResponse
   */
  public function listProjectsJobs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1ListJobsResponse");
  }
}
