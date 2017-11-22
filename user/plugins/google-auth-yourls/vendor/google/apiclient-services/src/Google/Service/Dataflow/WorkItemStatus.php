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

class Google_Service_Dataflow_WorkItemStatus extends Google_Collection
{
  protected $collection_key = 'metricUpdates';
  public $completed;
  protected $counterUpdatesType = 'Google_Service_Dataflow_CounterUpdate';
  protected $counterUpdatesDataType = 'array';
  protected $dynamicSourceSplitType = 'Google_Service_Dataflow_DynamicSourceSplit';
  protected $dynamicSourceSplitDataType = '';
  protected $errorsType = 'Google_Service_Dataflow_Status';
  protected $errorsDataType = 'array';
  protected $metricUpdatesType = 'Google_Service_Dataflow_MetricUpdate';
  protected $metricUpdatesDataType = 'array';
  protected $progressType = 'Google_Service_Dataflow_ApproximateProgress';
  protected $progressDataType = '';
  public $reportIndex;
  protected $reportedProgressType = 'Google_Service_Dataflow_ApproximateReportedProgress';
  protected $reportedProgressDataType = '';
  public $requestedLeaseDuration;
  protected $sourceForkType = 'Google_Service_Dataflow_SourceFork';
  protected $sourceForkDataType = '';
  protected $sourceOperationResponseType = 'Google_Service_Dataflow_SourceOperationResponse';
  protected $sourceOperationResponseDataType = '';
  protected $stopPositionType = 'Google_Service_Dataflow_Position';
  protected $stopPositionDataType = '';
  public $totalThrottlerWaitTimeSeconds;
  public $workItemId;

  public function setCompleted($completed)
  {
    $this->completed = $completed;
  }
  public function getCompleted()
  {
    return $this->completed;
  }
  /**
   * @param Google_Service_Dataflow_CounterUpdate
   */
  public function setCounterUpdates($counterUpdates)
  {
    $this->counterUpdates = $counterUpdates;
  }
  /**
   * @return Google_Service_Dataflow_CounterUpdate
   */
  public function getCounterUpdates()
  {
    return $this->counterUpdates;
  }
  /**
   * @param Google_Service_Dataflow_DynamicSourceSplit
   */
  public function setDynamicSourceSplit(Google_Service_Dataflow_DynamicSourceSplit $dynamicSourceSplit)
  {
    $this->dynamicSourceSplit = $dynamicSourceSplit;
  }
  /**
   * @return Google_Service_Dataflow_DynamicSourceSplit
   */
  public function getDynamicSourceSplit()
  {
    return $this->dynamicSourceSplit;
  }
  /**
   * @param Google_Service_Dataflow_Status
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Google_Service_Dataflow_Status
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param Google_Service_Dataflow_MetricUpdate
   */
  public function setMetricUpdates($metricUpdates)
  {
    $this->metricUpdates = $metricUpdates;
  }
  /**
   * @return Google_Service_Dataflow_MetricUpdate
   */
  public function getMetricUpdates()
  {
    return $this->metricUpdates;
  }
  /**
   * @param Google_Service_Dataflow_ApproximateProgress
   */
  public function setProgress(Google_Service_Dataflow_ApproximateProgress $progress)
  {
    $this->progress = $progress;
  }
  /**
   * @return Google_Service_Dataflow_ApproximateProgress
   */
  public function getProgress()
  {
    return $this->progress;
  }
  public function setReportIndex($reportIndex)
  {
    $this->reportIndex = $reportIndex;
  }
  public function getReportIndex()
  {
    return $this->reportIndex;
  }
  /**
   * @param Google_Service_Dataflow_ApproximateReportedProgress
   */
  public function setReportedProgress(Google_Service_Dataflow_ApproximateReportedProgress $reportedProgress)
  {
    $this->reportedProgress = $reportedProgress;
  }
  /**
   * @return Google_Service_Dataflow_ApproximateReportedProgress
   */
  public function getReportedProgress()
  {
    return $this->reportedProgress;
  }
  public function setRequestedLeaseDuration($requestedLeaseDuration)
  {
    $this->requestedLeaseDuration = $requestedLeaseDuration;
  }
  public function getRequestedLeaseDuration()
  {
    return $this->requestedLeaseDuration;
  }
  /**
   * @param Google_Service_Dataflow_SourceFork
   */
  public function setSourceFork(Google_Service_Dataflow_SourceFork $sourceFork)
  {
    $this->sourceFork = $sourceFork;
  }
  /**
   * @return Google_Service_Dataflow_SourceFork
   */
  public function getSourceFork()
  {
    return $this->sourceFork;
  }
  /**
   * @param Google_Service_Dataflow_SourceOperationResponse
   */
  public function setSourceOperationResponse(Google_Service_Dataflow_SourceOperationResponse $sourceOperationResponse)
  {
    $this->sourceOperationResponse = $sourceOperationResponse;
  }
  /**
   * @return Google_Service_Dataflow_SourceOperationResponse
   */
  public function getSourceOperationResponse()
  {
    return $this->sourceOperationResponse;
  }
  /**
   * @param Google_Service_Dataflow_Position
   */
  public function setStopPosition(Google_Service_Dataflow_Position $stopPosition)
  {
    $this->stopPosition = $stopPosition;
  }
  /**
   * @return Google_Service_Dataflow_Position
   */
  public function getStopPosition()
  {
    return $this->stopPosition;
  }
  public function setTotalThrottlerWaitTimeSeconds($totalThrottlerWaitTimeSeconds)
  {
    $this->totalThrottlerWaitTimeSeconds = $totalThrottlerWaitTimeSeconds;
  }
  public function getTotalThrottlerWaitTimeSeconds()
  {
    return $this->totalThrottlerWaitTimeSeconds;
  }
  public function setWorkItemId($workItemId)
  {
    $this->workItemId = $workItemId;
  }
  public function getWorkItemId()
  {
    return $this->workItemId;
  }
}
