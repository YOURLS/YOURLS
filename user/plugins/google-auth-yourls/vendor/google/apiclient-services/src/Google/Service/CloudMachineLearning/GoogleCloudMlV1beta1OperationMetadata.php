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

class Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1OperationMetadata extends Google_Model
{
  public $createTime;
  public $endTime;
  public $isCancellationRequested;
  public $modelName;
  public $operationType;
  public $startTime;
  protected $versionType = 'Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Version';
  protected $versionDataType = '';

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
  public function setIsCancellationRequested($isCancellationRequested)
  {
    $this->isCancellationRequested = $isCancellationRequested;
  }
  public function getIsCancellationRequested()
  {
    return $this->isCancellationRequested;
  }
  public function setModelName($modelName)
  {
    $this->modelName = $modelName;
  }
  public function getModelName()
  {
    return $this->modelName;
  }
  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  public function getOperationType()
  {
    return $this->operationType;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setVersion(Google_Service_CloudMachineLearning_GoogleCloudMlV1beta1Version $version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
