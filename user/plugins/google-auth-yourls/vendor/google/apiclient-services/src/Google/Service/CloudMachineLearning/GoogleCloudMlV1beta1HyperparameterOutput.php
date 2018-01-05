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

class Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1HyperparameterOutput extends Google_Collection
{
  protected $collection_key = 'allMetrics';
  protected $allMetricsType = 'Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1HyperparameterOutputHyperparameterMetric';
  protected $allMetricsDataType = 'array';
  protected $finalMetricType = 'Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1HyperparameterOutputHyperparameterMetric';
  protected $finalMetricDataType = '';
  public $hyperparameters;
  public $trialId;

  public function setAllMetrics($allMetrics)
  {
    $this->allMetrics = $allMetrics;
  }
  public function getAllMetrics()
  {
    return $this->allMetrics;
  }
  public function setFinalMetric(Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1HyperparameterOutputHyperparameterMetric $finalMetric)
  {
    $this->finalMetric = $finalMetric;
  }
  public function getFinalMetric()
  {
    return $this->finalMetric;
  }
  public function setHyperparameters($hyperparameters)
  {
    $this->hyperparameters = $hyperparameters;
  }
  public function getHyperparameters()
  {
    return $this->hyperparameters;
  }
  public function setTrialId($trialId)
  {
    $this->trialId = $trialId;
  }
  public function getTrialId()
  {
    return $this->trialId;
  }
}
