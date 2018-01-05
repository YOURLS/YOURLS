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

class Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Job extends Google_Model
{
  public $createTime;
  public $endTime;
  public $errorMessage;
  public $jobId;
  protected $predictionInputType = 'Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1PredictionInput';
  protected $predictionInputDataType = '';
  protected $predictionOutputType = 'Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1PredictionOutput';
  protected $predictionOutputDataType = '';
  public $startTime;
  public $state;
  protected $trainingInputType = 'Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1TrainingInput';
  protected $trainingInputDataType = '';
  protected $trainingOutputType = 'Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1TrainingOutput';
  protected $trainingOutputDataType = '';

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  public function setJobId($jobId)
  {
    $this->jobId = $jobId;
  }
  public function getJobId()
  {
    return $this->jobId;
  }
  public function setPredictionInput(Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1PredictionInput $predictionInput)
  {
    $this->predictionInput = $predictionInput;
  }
  public function getPredictionInput()
  {
    return $this->predictionInput;
  }
  public function setPredictionOutput(Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1PredictionOutput $predictionOutput)
  {
    $this->predictionOutput = $predictionOutput;
  }
  public function getPredictionOutput()
  {
    return $this->predictionOutput;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTrainingInput(Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1TrainingInput $trainingInput)
  {
    $this->trainingInput = $trainingInput;
  }
  public function getTrainingInput()
  {
    return $this->trainingInput;
  }
  public function setTrainingOutput(Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1TrainingOutput $trainingOutput)
  {
    $this->trainingOutput = $trainingOutput;
  }
  public function getTrainingOutput()
  {
    return $this->trainingOutput;
  }
}
