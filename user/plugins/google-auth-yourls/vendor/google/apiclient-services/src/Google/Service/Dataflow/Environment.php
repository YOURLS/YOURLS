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

class Google_Service_Dataflow_Environment extends Google_Collection
{
  protected $collection_key = 'workerPools';
  public $clusterManagerApiService;
  public $dataset;
  public $experiments;
  public $internalExperiments;
  public $sdkPipelineOptions;
  public $serviceAccountEmail;
  public $tempStoragePrefix;
  public $userAgent;
  public $version;
  protected $workerPoolsType = 'Google_Service_Dataflow_WorkerPool';
  protected $workerPoolsDataType = 'array';

  public function setClusterManagerApiService($clusterManagerApiService)
  {
    $this->clusterManagerApiService = $clusterManagerApiService;
  }
  public function getClusterManagerApiService()
  {
    return $this->clusterManagerApiService;
  }
  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  public function getDataset()
  {
    return $this->dataset;
  }
  public function setExperiments($experiments)
  {
    $this->experiments = $experiments;
  }
  public function getExperiments()
  {
    return $this->experiments;
  }
  public function setInternalExperiments($internalExperiments)
  {
    $this->internalExperiments = $internalExperiments;
  }
  public function getInternalExperiments()
  {
    return $this->internalExperiments;
  }
  public function setSdkPipelineOptions($sdkPipelineOptions)
  {
    $this->sdkPipelineOptions = $sdkPipelineOptions;
  }
  public function getSdkPipelineOptions()
  {
    return $this->sdkPipelineOptions;
  }
  public function setServiceAccountEmail($serviceAccountEmail)
  {
    $this->serviceAccountEmail = $serviceAccountEmail;
  }
  public function getServiceAccountEmail()
  {
    return $this->serviceAccountEmail;
  }
  public function setTempStoragePrefix($tempStoragePrefix)
  {
    $this->tempStoragePrefix = $tempStoragePrefix;
  }
  public function getTempStoragePrefix()
  {
    return $this->tempStoragePrefix;
  }
  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }
  public function getUserAgent()
  {
    return $this->userAgent;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
  /**
   * @param Google_Service_Dataflow_WorkerPool
   */
  public function setWorkerPools($workerPools)
  {
    $this->workerPools = $workerPools;
  }
  /**
   * @return Google_Service_Dataflow_WorkerPool
   */
  public function getWorkerPools()
  {
    return $this->workerPools;
  }
}
