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

class Google_Service_Testing_TestExecution extends Google_Model
{
  protected $environmentType = 'Google_Service_Testing_Environment';
  protected $environmentDataType = '';
  public $id;
  public $matrixId;
  public $projectId;
  public $state;
  protected $testDetailsType = 'Google_Service_Testing_TestDetails';
  protected $testDetailsDataType = '';
  protected $testSpecificationType = 'Google_Service_Testing_TestSpecification';
  protected $testSpecificationDataType = '';
  public $timestamp;
  protected $toolResultsStepType = 'Google_Service_Testing_ToolResultsStep';
  protected $toolResultsStepDataType = '';

  /**
   * @param Google_Service_Testing_Environment
   */
  public function setEnvironment(Google_Service_Testing_Environment $environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return Google_Service_Testing_Environment
   */
  public function getEnvironment()
  {
    return $this->environment;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setMatrixId($matrixId)
  {
    $this->matrixId = $matrixId;
  }
  public function getMatrixId()
  {
    return $this->matrixId;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
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
   * @param Google_Service_Testing_TestDetails
   */
  public function setTestDetails(Google_Service_Testing_TestDetails $testDetails)
  {
    $this->testDetails = $testDetails;
  }
  /**
   * @return Google_Service_Testing_TestDetails
   */
  public function getTestDetails()
  {
    return $this->testDetails;
  }
  /**
   * @param Google_Service_Testing_TestSpecification
   */
  public function setTestSpecification(Google_Service_Testing_TestSpecification $testSpecification)
  {
    $this->testSpecification = $testSpecification;
  }
  /**
   * @return Google_Service_Testing_TestSpecification
   */
  public function getTestSpecification()
  {
    return $this->testSpecification;
  }
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  /**
   * @param Google_Service_Testing_ToolResultsStep
   */
  public function setToolResultsStep(Google_Service_Testing_ToolResultsStep $toolResultsStep)
  {
    $this->toolResultsStep = $toolResultsStep;
  }
  /**
   * @return Google_Service_Testing_ToolResultsStep
   */
  public function getToolResultsStep()
  {
    return $this->toolResultsStep;
  }
}
