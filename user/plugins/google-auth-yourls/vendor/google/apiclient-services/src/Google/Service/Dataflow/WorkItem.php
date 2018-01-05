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

class Google_Service_Dataflow_WorkItem extends Google_Collection
{
  protected $collection_key = 'packages';
  public $configuration;
  public $id;
  public $initialReportIndex;
  public $jobId;
  public $leaseExpireTime;
  protected $mapTaskType = 'Google_Service_Dataflow_MapTask';
  protected $mapTaskDataType = '';
  protected $packagesType = 'Google_Service_Dataflow_Package';
  protected $packagesDataType = 'array';
  public $projectId;
  public $reportStatusInterval;
  protected $seqMapTaskType = 'Google_Service_Dataflow_SeqMapTask';
  protected $seqMapTaskDataType = '';
  protected $shellTaskType = 'Google_Service_Dataflow_ShellTask';
  protected $shellTaskDataType = '';
  protected $sourceOperationTaskType = 'Google_Service_Dataflow_SourceOperationRequest';
  protected $sourceOperationTaskDataType = '';
  protected $streamingComputationTaskType = 'Google_Service_Dataflow_StreamingComputationTask';
  protected $streamingComputationTaskDataType = '';
  protected $streamingConfigTaskType = 'Google_Service_Dataflow_StreamingConfigTask';
  protected $streamingConfigTaskDataType = '';
  protected $streamingSetupTaskType = 'Google_Service_Dataflow_StreamingSetupTask';
  protected $streamingSetupTaskDataType = '';

  public function setConfiguration($configuration)
  {
    $this->configuration = $configuration;
  }
  public function getConfiguration()
  {
    return $this->configuration;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInitialReportIndex($initialReportIndex)
  {
    $this->initialReportIndex = $initialReportIndex;
  }
  public function getInitialReportIndex()
  {
    return $this->initialReportIndex;
  }
  public function setJobId($jobId)
  {
    $this->jobId = $jobId;
  }
  public function getJobId()
  {
    return $this->jobId;
  }
  public function setLeaseExpireTime($leaseExpireTime)
  {
    $this->leaseExpireTime = $leaseExpireTime;
  }
  public function getLeaseExpireTime()
  {
    return $this->leaseExpireTime;
  }
  /**
   * @param Google_Service_Dataflow_MapTask
   */
  public function setMapTask(Google_Service_Dataflow_MapTask $mapTask)
  {
    $this->mapTask = $mapTask;
  }
  /**
   * @return Google_Service_Dataflow_MapTask
   */
  public function getMapTask()
  {
    return $this->mapTask;
  }
  /**
   * @param Google_Service_Dataflow_Package
   */
  public function setPackages($packages)
  {
    $this->packages = $packages;
  }
  /**
   * @return Google_Service_Dataflow_Package
   */
  public function getPackages()
  {
    return $this->packages;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setReportStatusInterval($reportStatusInterval)
  {
    $this->reportStatusInterval = $reportStatusInterval;
  }
  public function getReportStatusInterval()
  {
    return $this->reportStatusInterval;
  }
  /**
   * @param Google_Service_Dataflow_SeqMapTask
   */
  public function setSeqMapTask(Google_Service_Dataflow_SeqMapTask $seqMapTask)
  {
    $this->seqMapTask = $seqMapTask;
  }
  /**
   * @return Google_Service_Dataflow_SeqMapTask
   */
  public function getSeqMapTask()
  {
    return $this->seqMapTask;
  }
  /**
   * @param Google_Service_Dataflow_ShellTask
   */
  public function setShellTask(Google_Service_Dataflow_ShellTask $shellTask)
  {
    $this->shellTask = $shellTask;
  }
  /**
   * @return Google_Service_Dataflow_ShellTask
   */
  public function getShellTask()
  {
    return $this->shellTask;
  }
  /**
   * @param Google_Service_Dataflow_SourceOperationRequest
   */
  public function setSourceOperationTask(Google_Service_Dataflow_SourceOperationRequest $sourceOperationTask)
  {
    $this->sourceOperationTask = $sourceOperationTask;
  }
  /**
   * @return Google_Service_Dataflow_SourceOperationRequest
   */
  public function getSourceOperationTask()
  {
    return $this->sourceOperationTask;
  }
  /**
   * @param Google_Service_Dataflow_StreamingComputationTask
   */
  public function setStreamingComputationTask(Google_Service_Dataflow_StreamingComputationTask $streamingComputationTask)
  {
    $this->streamingComputationTask = $streamingComputationTask;
  }
  /**
   * @return Google_Service_Dataflow_StreamingComputationTask
   */
  public function getStreamingComputationTask()
  {
    return $this->streamingComputationTask;
  }
  /**
   * @param Google_Service_Dataflow_StreamingConfigTask
   */
  public function setStreamingConfigTask(Google_Service_Dataflow_StreamingConfigTask $streamingConfigTask)
  {
    $this->streamingConfigTask = $streamingConfigTask;
  }
  /**
   * @return Google_Service_Dataflow_StreamingConfigTask
   */
  public function getStreamingConfigTask()
  {
    return $this->streamingConfigTask;
  }
  /**
   * @param Google_Service_Dataflow_StreamingSetupTask
   */
  public function setStreamingSetupTask(Google_Service_Dataflow_StreamingSetupTask $streamingSetupTask)
  {
    $this->streamingSetupTask = $streamingSetupTask;
  }
  /**
   * @return Google_Service_Dataflow_StreamingSetupTask
   */
  public function getStreamingSetupTask()
  {
    return $this->streamingSetupTask;
  }
}
