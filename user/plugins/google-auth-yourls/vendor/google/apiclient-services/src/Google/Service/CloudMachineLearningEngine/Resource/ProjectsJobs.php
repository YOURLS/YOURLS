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
 *   $mlService = new Google_Service_CloudMachineLearningEngine(...);
 *   $jobs = $mlService->jobs;
 *  </code>
 */
class Google_Service_CloudMachineLearningEngine_Resource_ProjectsJobs extends Google_Service_Resource
{
  /**
   * Cancels a running job. (jobs.cancel)
   *
   * @param string $name Required. The name of the job to cancel.
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1CancelJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearningEngine_GoogleProtobufEmpty
   */
  public function cancel($name, Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1CancelJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_CloudMachineLearningEngine_GoogleProtobufEmpty");
  }
  /**
   * Creates a training or a batch prediction job. (jobs.create)
   *
   * @param string $parent Required. The project name.
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Job $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Job
   */
  public function create($parent, Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Job $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Job");
  }
  /**
   * Describes a job. (jobs.get)
   *
   * @param string $name Required. The name of the job to get the description of.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Job
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Job");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (jobs.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearningEngine_GoogleIamV1Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CloudMachineLearningEngine_GoogleIamV1Policy");
  }
  /**
   * Lists the jobs in the project. (jobs.listProjectsJobs)
   *
   * @param string $parent Required. The name of the project for which to list
   * jobs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional. A page token to request the next page
   * of results.
   *
   * You get the token from the `next_page_token` field of the response from the
   * previous call.
   * @opt_param int pageSize Optional. The number of jobs to retrieve per "page"
   * of results. If there are more remaining results than this number, the
   * response message will contain a valid value in the `next_page_token` field.
   *
   * The default value is 20, and the maximum page size is 100.
   * @opt_param string filter Optional. Specifies the subset of jobs to retrieve.
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ListJobsResponse
   */
  public function listProjectsJobs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ListJobsResponse");
  }
  /**
   * Updates a specific job resource.
   *
   * Currently the only supported fields to update are `labels`. (jobs.patch)
   *
   * @param string $name Required. The job name.
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Specifies the path, relative to `Job`,
   * of the field to update. To adopt etag mechanism, include `etag` field in the
   * mask, and include the `etag` value in your job resource.
   *
   * For example, to change the labels of a job, the `update_mask` parameter would
   * be specified as `labels`, `etag`, and the `PATCH` request body would specify
   * the new value, as follows:     {       "labels": {          "owner":
   * "Google",          "color": "Blue"       }       "etag":
   * "33a64df551425fcc55e4d42a148795d9f25f89d4"     } If `etag` matches the one on
   * the server, the labels of the job will be replaced with the given ones, and
   * the server end `etag` will be recalculated.
   *
   * Currently the only supported update masks are `labels` and `etag`.
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Job
   */
  public function patch($name, Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Job $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Job");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (jobs.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CloudMachineLearningEngine_GoogleIamV1SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearningEngine_GoogleIamV1Policy
   */
  public function setIamPolicy($resource, Google_Service_CloudMachineLearningEngine_GoogleIamV1SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CloudMachineLearningEngine_GoogleIamV1Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error.
   *
   * Note: This operation is designed to be used for building permission-aware UIs
   * and command-line tools, not for authorization checking. This operation may
   * "fail open" without warning. (jobs.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CloudMachineLearningEngine_GoogleIamV1TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearningEngine_GoogleIamV1TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CloudMachineLearningEngine_GoogleIamV1TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CloudMachineLearningEngine_GoogleIamV1TestIamPermissionsResponse");
  }
}
