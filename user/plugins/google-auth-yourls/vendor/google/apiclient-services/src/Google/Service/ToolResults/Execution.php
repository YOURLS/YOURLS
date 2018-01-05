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

class Google_Service_ToolResults_Execution extends Google_Model
{
  protected $completionTimeType = 'Google_Service_ToolResults_Timestamp';
  protected $completionTimeDataType = '';
  protected $creationTimeType = 'Google_Service_ToolResults_Timestamp';
  protected $creationTimeDataType = '';
  public $executionId;
  protected $outcomeType = 'Google_Service_ToolResults_Outcome';
  protected $outcomeDataType = '';
  protected $specificationType = 'Google_Service_ToolResults_Specification';
  protected $specificationDataType = '';
  public $state;
  public $testExecutionMatrixId;

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
  public function setExecutionId($executionId)
  {
    $this->executionId = $executionId;
  }
  public function getExecutionId()
  {
    return $this->executionId;
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
   * @param Google_Service_ToolResults_Specification
   */
  public function setSpecification(Google_Service_ToolResults_Specification $specification)
  {
    $this->specification = $specification;
  }
  /**
   * @return Google_Service_ToolResults_Specification
   */
  public function getSpecification()
  {
    return $this->specification;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTestExecutionMatrixId($testExecutionMatrixId)
  {
    $this->testExecutionMatrixId = $testExecutionMatrixId;
  }
  public function getTestExecutionMatrixId()
  {
    return $this->testExecutionMatrixId;
  }
}
