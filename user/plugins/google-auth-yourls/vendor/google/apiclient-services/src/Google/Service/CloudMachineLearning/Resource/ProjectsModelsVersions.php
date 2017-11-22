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
 * The "versions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mlService = new Google_Service_CloudMachineLearning(...);
 *   $versions = $mlService->versions;
 *  </code>
 */
class Google_Service_CloudMachineLearning_Resource_ProjectsModelsVersions extends Google_Service_Resource
{
  /**
   * Creates a new version of a model from a trained TensorFlow model.
   *
   * If the version created in the cloud by this call is the first deployed
   * version of the specified model, it will be made the default version of the
   * model. When you add a version to a model that already has one or more
   * versions, the default version does not automatically change. If you want a
   * new version to be the default, you must call [projects.models.versions.setDef
   * ault](/ml/reference/rest/v1beta1/projects.models.versions/setDefault).
   * (versions.create)
   *
   * @param string $parent Required. The name of the model.
   *
   * Authorization: requires `Editor` role on the parent project.
   * @param Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Version $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearning_GoogleLongrunningOperation
   */
  public function create($parent, Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Version $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudMachineLearning_GoogleLongrunningOperation");
  }
  /**
   * Deletes a model version.
   *
   * Each model can have multiple versions deployed and in use at any given time.
   * Use this method to remove a single version.
   *
   * Note: You cannot delete the version that is set as the default version of the
   * model unless it is the only remaining version. (versions.delete)
   *
   * @param string $name Required. The name of the version. You can get the names
   * of all the versions of a model by calling [projects.models.versions.list](/ml
   * /reference/rest/v1beta1/projects.models.versions/list).
   *
   * Authorization: requires `Editor` role on the parent project.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearning_GoogleLongrunningOperation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudMachineLearning_GoogleLongrunningOperation");
  }
  /**
   * Gets information about a model version.
   *
   * Models can have multiple versions. You can call [projects.models.versions.lis
   * t](/ml/reference/rest/v1beta1/projects.models.versions/list) to get the same
   * information that this method returns for all of the versions of a model.
   * (versions.get)
   *
   * @param string $name Required. The name of the version.
   *
   * Authorization: requires `Viewer` role on the parent project.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Version
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Version");
  }
  /**
   * Gets basic information about all the versions of a model.
   *
   * If you expect that a model has a lot of versions, or if you need to handle
   * only a limited number of results at a time, you can request that the list be
   * retrieved in batches (called pages): (versions.listProjectsModelsVersions)
   *
   * @param string $parent Required. The name of the model for which to list the
   * version.
   *
   * Authorization: requires `Viewer` role on the parent project.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The number of versions to retrieve per
   * "page" of results. If there are more remaining results than this number, the
   * response message will contain a valid value in the `next_page_token` field.
   *
   * The default value is 20, and the maximum page size is 100.
   * @opt_param string pageToken Optional. A page token to request the next page
   * of results.
   *
   * You get the token from the `next_page_token` field of the response from the
   * previous call.
   * @return Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1ListVersionsResponse
   */
  public function listProjectsModelsVersions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1ListVersionsResponse");
  }
  /**
   * Designates a version to be the default for the model.
   *
   * The default version is used for prediction requests made against the model
   * that don't specify a version.
   *
   * The first version to be created for a model is automatically set as the
   * default. You must make any subsequent changes to the default version setting
   * manually using this method. (versions.setDefault)
   *
   * @param string $name Required. The name of the version to make the default for
   * the model. You can get the names of all the versions of a model by calling [p
   * rojects.models.versions.list](/ml/reference/rest/v1beta1/projects.models.vers
   * ions/list).
   *
   * Authorization: requires `Editor` role on the parent project.
   * @param Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1SetDefaultVersionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Version
   */
  public function setDefault($name, Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1SetDefaultVersionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setDefault', array($params), "Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Version");
  }
}
