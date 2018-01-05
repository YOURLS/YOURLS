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
 * The "trainedmodels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $predictionService = new Google_Service_Prediction(...);
 *   $trainedmodels = $predictionService->trainedmodels;
 *  </code>
 */
class Google_Service_Prediction_Resource_Trainedmodels extends Google_Service_Resource
{
  /**
   * Get analysis of the model and the data the model was trained on.
   * (trainedmodels.analyze)
   *
   * @param string $project The project associated with the model.
   * @param string $id The unique name for the predictive model.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Prediction_Analyze
   */
  public function analyze($project, $id, $optParams = array())
  {
    $params = array('project' => $project, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('analyze', array($params), "Google_Service_Prediction_Analyze");
  }
  /**
   * Delete a trained model. (trainedmodels.delete)
   *
   * @param string $project The project associated with the model.
   * @param string $id The unique name for the predictive model.
   * @param array $optParams Optional parameters.
   */
  public function delete($project, $id, $optParams = array())
  {
    $params = array('project' => $project, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Check training status of your model. (trainedmodels.get)
   *
   * @param string $project The project associated with the model.
   * @param string $id The unique name for the predictive model.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Prediction_Insert2
   */
  public function get($project, $id, $optParams = array())
  {
    $params = array('project' => $project, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Prediction_Insert2");
  }
  /**
   * Train a Prediction API model. (trainedmodels.insert)
   *
   * @param string $project The project associated with the model.
   * @param Google_Service_Prediction_Insert $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Prediction_Insert2
   */
  public function insert($project, Google_Service_Prediction_Insert $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Prediction_Insert2");
  }
  /**
   * List available models. (trainedmodels.listTrainedmodels)
   *
   * @param string $project The project associated with the model.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of results to return.
   * @opt_param string pageToken Pagination token.
   * @return Google_Service_Prediction_PredictionList
   */
  public function listTrainedmodels($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Prediction_PredictionList");
  }
  /**
   * Submit model id and request a prediction. (trainedmodels.predict)
   *
   * @param string $project The project associated with the model.
   * @param string $id The unique name for the predictive model.
   * @param Google_Service_Prediction_Input $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Prediction_Output
   */
  public function predict($project, $id, Google_Service_Prediction_Input $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('predict', array($params), "Google_Service_Prediction_Output");
  }
  /**
   * Add new data to a trained model. (trainedmodels.update)
   *
   * @param string $project The project associated with the model.
   * @param string $id The unique name for the predictive model.
   * @param Google_Service_Prediction_Update $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Prediction_Insert2
   */
  public function update($project, $id, Google_Service_Prediction_Update $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Prediction_Insert2");
  }
}
