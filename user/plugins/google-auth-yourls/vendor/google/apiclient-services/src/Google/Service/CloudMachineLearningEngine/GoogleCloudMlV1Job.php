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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Job extends Google_Model
{
  public $createTime;
  public $endTime;
  public $errorMessage;
  public $etag;
  public $jobId;
  public $labels;
  protected $predictionInputType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1PredictionInput';
  protected $predictionInputDataType = '';
  protected $predictionOutputType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1PredictionOutput';
  protected $predictionOutputDataType = '';
  public $startTime;
  public $state;
  protected $trainingInputType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrainingInput';
  protected $trainingInputDataType = '';
  protected $trainingOutputType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrainingOutput';
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
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setJobId($jobId)
  {
    $this->jobId = $jobId;
  }
  public function getJobId()
  {
    return $this->jobId;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1PredictionInput
   */
  public function setPredictionInput(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1PredictionInput $predictionInput)
  {
    $this->predictionInput = $predictionInput;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1PredictionInput
   */
  public function getPredictionInput()
  {
    return $this->predictionInput;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1PredictionOutput
   */
  public function setPredictionOutput(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1PredictionOutput $predictionOutput)
  {
    $this->predictionOutput = $predictionOutput;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1PredictionOutput
   */
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
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrainingInput
   */
  public function setTrainingInput(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrainingInput $trainingInput)
  {
    $this->trainingInput = $trainingInput;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrainingInput
   */
  public function getTrainingInput()
  {
    return $this->trainingInput;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrainingOutput
   */
  public function setTrainingOutput(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrainingOutput $trainingOutput)
  {
    $this->trainingOutput = $trainingOutput;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1TrainingOutput
   */
  public function getTrainingOutput()
  {
    return $this->trainingOutput;
  }
}
