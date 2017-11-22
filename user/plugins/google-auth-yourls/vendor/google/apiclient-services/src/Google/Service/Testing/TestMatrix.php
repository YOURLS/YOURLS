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

class Google_Service_Testing_TestMatrix extends Google_Collection
{
  protected $collection_key = 'testExecutions';
  protected $clientInfoType = 'Google_Service_Testing_ClientInfo';
  protected $clientInfoDataType = '';
  protected $environmentMatrixType = 'Google_Service_Testing_EnvironmentMatrix';
  protected $environmentMatrixDataType = '';
  public $invalidMatrixDetails;
  public $projectId;
  protected $resultStorageType = 'Google_Service_Testing_ResultStorage';
  protected $resultStorageDataType = '';
  public $state;
  protected $testExecutionsType = 'Google_Service_Testing_TestExecution';
  protected $testExecutionsDataType = 'array';
  public $testMatrixId;
  protected $testSpecificationType = 'Google_Service_Testing_TestSpecification';
  protected $testSpecificationDataType = '';
  public $timestamp;

  /**
   * @param Google_Service_Testing_ClientInfo
   */
  public function setClientInfo(Google_Service_Testing_ClientInfo $clientInfo)
  {
    $this->clientInfo = $clientInfo;
  }
  /**
   * @return Google_Service_Testing_ClientInfo
   */
  public function getClientInfo()
  {
    return $this->clientInfo;
  }
  /**
   * @param Google_Service_Testing_EnvironmentMatrix
   */
  public function setEnvironmentMatrix(Google_Service_Testing_EnvironmentMatrix $environmentMatrix)
  {
    $this->environmentMatrix = $environmentMatrix;
  }
  /**
   * @return Google_Service_Testing_EnvironmentMatrix
   */
  public function getEnvironmentMatrix()
  {
    return $this->environmentMatrix;
  }
  public function setInvalidMatrixDetails($invalidMatrixDetails)
  {
    $this->invalidMatrixDetails = $invalidMatrixDetails;
  }
  public function getInvalidMatrixDetails()
  {
    return $this->invalidMatrixDetails;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param Google_Service_Testing_ResultStorage
   */
  public function setResultStorage(Google_Service_Testing_ResultStorage $resultStorage)
  {
    $this->resultStorage = $resultStorage;
  }
  /**
   * @return Google_Service_Testing_ResultStorage
   */
  public function getResultStorage()
  {
    return $this->resultStorage;
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
   * @param Google_Service_Testing_TestExecution
   */
  public function setTestExecutions($testExecutions)
  {
    $this->testExecutions = $testExecutions;
  }
  /**
   * @return Google_Service_Testing_TestExecution
   */
  public function getTestExecutions()
  {
    return $this->testExecutions;
  }
  public function setTestMatrixId($testMatrixId)
  {
    $this->testMatrixId = $testMatrixId;
  }
  public function getTestMatrixId()
  {
    return $this->testMatrixId;
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
}
