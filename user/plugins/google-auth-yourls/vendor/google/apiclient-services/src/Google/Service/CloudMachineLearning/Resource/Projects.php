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
 *   $mlService = new Google_Service_CloudMachineLearning(...);
 *   $projects = $mlService->projects;
 *  </code>
 */
class Google_Service_CloudMachineLearning_Resource_Projects extends Google_Service_Resource
{
  /**
   * Get the service account information associated with your project. You need
   * this information in order to grant the service account persmissions for the
   * Google Cloud Storage location where you put your model training code for
   * training the model with Google Cloud Machine Learning. (projects.getConfig)
   *
   * @param string $name Required. The project name.
   *
   * Authorization: requires `Viewer` role on the specified project.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1GetConfigResponse
   */
  public function getConfig($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getConfig', array($params), "Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1GetConfigResponse");
  }
  /**
   * Performs prediction on the data in the request.
   *
   * Responses are very similar to requests. There are two top-level fields, each
   * of which are JSON lists:
   *
   *   predictions   The list of predictions, one per instance in the request.
   * error   An error message returned instead of a prediction list if any
   * instance produced an error.
   *
   * If the call is successful, the response body will contain one prediction
   * entry per instance in the request body. If prediction fails for any instance,
   * the response body will contain no predictions and will contian a single error
   * entry instead.
   *
   * Even though there is one prediction per instance, the format of a prediction
   * is not directly related to the format of an instance. Predictions take
   * whatever format is specified in the outputs collection defined in the model.
   * The collection of predictions is returned in a JSON list. Each member of the
   * list can be a simple value, a list, or a JSON object of any complexity. If
   * your model has more than one output tensor, each prediction will be a JSON
   * object containing a name/value pair for each output. The names identify the
   * output aliases in the graph.
   *
   * The following examples show some possible responses:
   *
   * A simple set of predictions for three input instances, where each prediction
   * is an integer value:
   *
   * {"predictions": [5, 4, 3]}
   *
   * A more complex set of predictions, each containing two named values that
   * correspond to output tensors, named **label** and **scores** respectively.
   * The value of **label** is the predicted category ("car" or "beach") and
   * **scores** contains a list of probabilities for that instance across the
   * possible categories.
   *
   * {"predictions": [{"label": "beach", "scores": [0.1, 0.9]},
   * {"label": "car", "scores": [0.75, 0.25]}]}
   *
   * A response when there is an error processing an input instance:
   *
   * {"error": "Divide by zero"}  (projects.predict)
   *
   * @param string $name Required. The resource name of a model or a version.
   *
   * Authorization: requires `Viewer` role on the parent project.
   * @param Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1PredictRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearning_GoogleApiHttpBody
   */
  public function predict($name, Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1PredictRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('predict', array($params), "Google_Service_CloudMachineLearning_GoogleApiHttpBody");
  }
}
