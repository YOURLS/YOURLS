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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1HyperparameterSpec extends Google_Collection
{
  protected $collection_key = 'params';
  public $goal;
  public $hyperparameterMetricTag;
  public $maxParallelTrials;
  public $maxTrials;
  protected $paramsType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ParameterSpec';
  protected $paramsDataType = 'array';

  public function setGoal($goal)
  {
    $this->goal = $goal;
  }
  public function getGoal()
  {
    return $this->goal;
  }
  public function setHyperparameterMetricTag($hyperparameterMetricTag)
  {
    $this->hyperparameterMetricTag = $hyperparameterMetricTag;
  }
  public function getHyperparameterMetricTag()
  {
    return $this->hyperparameterMetricTag;
  }
  public function setMaxParallelTrials($maxParallelTrials)
  {
    $this->maxParallelTrials = $maxParallelTrials;
  }
  public function getMaxParallelTrials()
  {
    return $this->maxParallelTrials;
  }
  public function setMaxTrials($maxTrials)
  {
    $this->maxTrials = $maxTrials;
  }
  public function getMaxTrials()
  {
    return $this->maxTrials;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ParameterSpec
   */
  public function setParams($params)
  {
    $this->params = $params;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ParameterSpec
   */
  public function getParams()
  {
    return $this->params;
  }
}
