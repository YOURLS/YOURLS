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

class Google_Service_ToolResults_Step extends Google_Collection
{
  protected $collection_key = 'labels';
  protected $completionTimeType = 'Google_Service_ToolResults_Timestamp';
  protected $completionTimeDataType = '';
  protected $creationTimeType = 'Google_Service_ToolResults_Timestamp';
  protected $creationTimeDataType = '';
  public $description;
  protected $deviceUsageDurationType = 'Google_Service_ToolResults_Duration';
  protected $deviceUsageDurationDataType = '';
  protected $dimensionValueType = 'Google_Service_ToolResults_StepDimensionValueEntry';
  protected $dimensionValueDataType = 'array';
  public $hasImages;
  protected $labelsType = 'Google_Service_ToolResults_StepLabelsEntry';
  protected $labelsDataType = 'array';
  public $name;
  protected $outcomeType = 'Google_Service_ToolResults_Outcome';
  protected $outcomeDataType = '';
  protected $runDurationType = 'Google_Service_ToolResults_Duration';
  protected $runDurationDataType = '';
  public $state;
  public $stepId;
  protected $testExecutionStepType = 'Google_Service_ToolResults_TestExecutionStep';
  protected $testExecutionStepDataType = '';
  protected $toolExecutionStepType = 'Google_Service_ToolResults_ToolExecutionStep';
  protected $toolExecutionStepDataType = '';

  /**
   * @param Google_Service_ToolResults_Timestamp
   */
  public function setCompletionTime(Google_Service_ToolResults_Timestamp $completionTime)
  {
    $this->completionTime = $completionTime;
  }
  /**
   * @return Google_Service_ToolResults_Timestamp
   */
  public function getCompletionTime()
  {
    return $this->completionTime;
  }
  /**
   * @param Google_Service_ToolResults_Timestamp
   */
  public function setCreationTime(Google_Service_ToolResults_Timestamp $creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return Google_Service_ToolResults_Timestamp
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_ToolResults_Duration
   */
  public function setDeviceUsageDuration(Google_Service_ToolResults_Duration $deviceUsageDuration)
  {
    $this->deviceUsageDuration = $deviceUsageDuration;
  }
  /**
   * @return Google_Service_ToolResults_Duration
   */
  public function getDeviceUsageDuration()
  {
    return $this->deviceUsageDuration;
  }
  /**
   * @param Google_Service_ToolResults_StepDimensionValueEntry
   */
  public function setDimensionValue($dimensionValue)
  {
    $this->dimensionValue = $dimensionValue;
  }
  /**
   * @return Google_Service_ToolResults_StepDimensionValueEntry
   */
  public function getDimensionValue()
  {
    return $this->dimensionValue;
  }
  public function setHasImages($hasImages)
  {
    $this->hasImages = $hasImages;
  }
  public function getHasImages()
  {
    return $this->hasImages;
  }
  /**
   * @param Google_Service_ToolResults_StepLabelsEntry
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return Google_Service_ToolResults_StepLabelsEntry
   */
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_ToolResults_Outcome
   */
  public function setOutcome(Google_Service_ToolResults_Outcome $outcome)
  {
    $this->outcome = $outcome;
  }
  /**
   * @return Google_Service_ToolResults_Outcome
   */
  public function getOutcome()
  {
    return $this->outcome;
  }
  /**
   * @param Google_Service_ToolResults_Duration
   */
  public function setRunDuration(Google_Service_ToolResults_Duration $runDuration)
  {
    $this->runDuration = $runDuration;
  }
  /**
   * @return Google_Service_ToolResults_Duration
   */
  public function getRunDuration()
  {
    return $this->runDuration;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStepId($stepId)
  {
    $this->stepId = $stepId;
  }
  public function getStepId()
  {
    return $this->stepId;
  }
  /**
   * @param Google_Service_ToolResults_TestExecutionStep
   */
  public function setTestExecutionStep(Google_Service_ToolResults_TestExecutionStep $testExecutionStep)
  {
    $this->testExecutionStep = $testExecutionStep;
  }
  /**
   * @return Google_Service_ToolResults_TestExecutionStep
   */
  public function getTestExecutionStep()
  {
    return $this->testExecutionStep;
  }
  /**
   * @param Google_Service_ToolResults_ToolExecutionStep
   */
  public function setToolExecutionStep(Google_Service_ToolResults_ToolExecutionStep $toolExecutionStep)
  {
    $this->toolExecutionStep = $toolExecutionStep;
  }
  /**
   * @return Google_Service_ToolResults_ToolExecutionStep
   */
  public function getToolExecutionStep()
  {
    return $this->toolExecutionStep;
  }
}
