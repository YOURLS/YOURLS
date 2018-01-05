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

class Google_Service_Dataflow_TaskRunnerSettings extends Google_Collection
{
  protected $collection_key = 'oauthScopes';
  public $alsologtostderr;
  public $baseTaskDir;
  public $baseUrl;
  public $commandlinesFileName;
  public $continueOnException;
  public $dataflowApiVersion;
  public $harnessCommand;
  public $languageHint;
  public $logDir;
  public $logToSerialconsole;
  public $logUploadLocation;
  public $oauthScopes;
  protected $parallelWorkerSettingsType = 'Google_Service_Dataflow_WorkerSettings';
  protected $parallelWorkerSettingsDataType = '';
  public $streamingWorkerMainClass;
  public $taskGroup;
  public $taskUser;
  public $tempStoragePrefix;
  public $vmId;
  public $workflowFileName;

  public function setAlsologtostderr($alsologtostderr)
  {
    $this->alsologtostderr = $alsologtostderr;
  }
  public function getAlsologtostderr()
  {
    return $this->alsologtostderr;
  }
  public function setBaseTaskDir($baseTaskDir)
  {
    $this->baseTaskDir = $baseTaskDir;
  }
  public function getBaseTaskDir()
  {
    return $this->baseTaskDir;
  }
  public function setBaseUrl($baseUrl)
  {
    $this->baseUrl = $baseUrl;
  }
  public function getBaseUrl()
  {
    return $this->baseUrl;
  }
  public function setCommandlinesFileName($commandlinesFileName)
  {
    $this->commandlinesFileName = $commandlinesFileName;
  }
  public function getCommandlinesFileName()
  {
    return $this->commandlinesFileName;
  }
  public function setContinueOnException($continueOnException)
  {
    $this->continueOnException = $continueOnException;
  }
  public function getContinueOnException()
  {
    return $this->continueOnException;
  }
  public function setDataflowApiVersion($dataflowApiVersion)
  {
    $this->dataflowApiVersion = $dataflowApiVersion;
  }
  public function getDataflowApiVersion()
  {
    return $this->dataflowApiVersion;
  }
  public function setHarnessCommand($harnessCommand)
  {
    $this->harnessCommand = $harnessCommand;
  }
  public function getHarnessCommand()
  {
    return $this->harnessCommand;
  }
  public function setLanguageHint($languageHint)
  {
    $this->languageHint = $languageHint;
  }
  public function getLanguageHint()
  {
    return $this->languageHint;
  }
  public function setLogDir($logDir)
  {
    $this->logDir = $logDir;
  }
  public function getLogDir()
  {
    return $this->logDir;
  }
  public function setLogToSerialconsole($logToSerialconsole)
  {
    $this->logToSerialconsole = $logToSerialconsole;
  }
  public function getLogToSerialconsole()
  {
    return $this->logToSerialconsole;
  }
  public function setLogUploadLocation($logUploadLocation)
  {
    $this->logUploadLocation = $logUploadLocation;
  }
  public function getLogUploadLocation()
  {
    return $this->logUploadLocation;
  }
  public function setOauthScopes($oauthScopes)
  {
    $this->oauthScopes = $oauthScopes;
  }
  public function getOauthScopes()
  {
    return $this->oauthScopes;
  }
  /**
   * @param Google_Service_Dataflow_WorkerSettings
   */
  public function setParallelWorkerSettings(Google_Service_Dataflow_WorkerSettings $parallelWorkerSettings)
  {
    $this->parallelWorkerSettings = $parallelWorkerSettings;
  }
  /**
   * @return Google_Service_Dataflow_WorkerSettings
   */
  public function getParallelWorkerSettings()
  {
    return $this->parallelWorkerSettings;
  }
  public function setStreamingWorkerMainClass($streamingWorkerMainClass)
  {
    $this->streamingWorkerMainClass = $streamingWorkerMainClass;
  }
  public function getStreamingWorkerMainClass()
  {
    return $this->streamingWorkerMainClass;
  }
  public function setTaskGroup($taskGroup)
  {
    $this->taskGroup = $taskGroup;
  }
  public function getTaskGroup()
  {
    return $this->taskGroup;
  }
  public function setTaskUser($taskUser)
  {
    $this->taskUser = $taskUser;
  }
  public function getTaskUser()
  {
    return $this->taskUser;
  }
  public function setTempStoragePrefix($tempStoragePrefix)
  {
    $this->tempStoragePrefix = $tempStoragePrefix;
  }
  public function getTempStoragePrefix()
  {
    return $this->tempStoragePrefix;
  }
  public function setVmId($vmId)
  {
    $this->vmId = $vmId;
  }
  public function getVmId()
  {
    return $this->vmId;
  }
  public function setWorkflowFileName($workflowFileName)
  {
    $this->workflowFileName = $workflowFileName;
  }
  public function getWorkflowFileName()
  {
    return $this->workflowFileName;
  }
}
