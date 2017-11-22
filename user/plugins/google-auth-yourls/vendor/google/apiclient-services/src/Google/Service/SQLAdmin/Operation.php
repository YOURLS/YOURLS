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

class Google_Service_SQLAdmin_Operation extends Google_Model
{
  public $endTime;
  protected $errorType = 'Google_Service_SQLAdmin_OperationErrors';
  protected $errorDataType = '';
  protected $exportContextType = 'Google_Service_SQLAdmin_ExportContext';
  protected $exportContextDataType = '';
  protected $importContextType = 'Google_Service_SQLAdmin_ImportContext';
  protected $importContextDataType = '';
  public $insertTime;
  public $kind;
  public $name;
  public $operationType;
  public $selfLink;
  public $startTime;
  public $status;
  public $targetId;
  public $targetLink;
  public $targetProject;
  public $user;

  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param Google_Service_SQLAdmin_OperationErrors
   */
  public function setError(Google_Service_SQLAdmin_OperationErrors $error)
  {
    $this->error = $error;
  }
  /**
   * @return Google_Service_SQLAdmin_OperationErrors
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param Google_Service_SQLAdmin_ExportContext
   */
  public function setExportContext(Google_Service_SQLAdmin_ExportContext $exportContext)
  {
    $this->exportContext = $exportContext;
  }
  /**
   * @return Google_Service_SQLAdmin_ExportContext
   */
  public function getExportContext()
  {
    return $this->exportContext;
  }
  /**
   * @param Google_Service_SQLAdmin_ImportContext
   */
  public function setImportContext(Google_Service_SQLAdmin_ImportContext $importContext)
  {
    $this->importContext = $importContext;
  }
  /**
   * @return Google_Service_SQLAdmin_ImportContext
   */
  public function getImportContext()
  {
    return $this->importContext;
  }
  public function setInsertTime($insertTime)
  {
    $this->insertTime = $insertTime;
  }
  public function getInsertTime()
  {
    return $this->insertTime;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  public function getOperationType()
  {
    return $this->operationType;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTargetId($targetId)
  {
    $this->targetId = $targetId;
  }
  public function getTargetId()
  {
    return $this->targetId;
  }
  public function setTargetLink($targetLink)
  {
    $this->targetLink = $targetLink;
  }
  public function getTargetLink()
  {
    return $this->targetLink;
  }
  public function setTargetProject($targetProject)
  {
    $this->targetProject = $targetProject;
  }
  public function getTargetProject()
  {
    return $this->targetProject;
  }
  public function setUser($user)
  {
    $this->user = $user;
  }
  public function getUser()
  {
    return $this->user;
  }
}
