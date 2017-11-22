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

class Google_Service_Dataflow_WorkItemServiceState extends Google_Collection
{
  protected $collection_key = 'metricShortId';
  public $harnessData;
  public $leaseExpireTime;
  protected $metricShortIdType = 'Google_Service_Dataflow_MetricShortId';
  protected $metricShortIdDataType = 'array';
  public $nextReportIndex;
  public $reportStatusInterval;
  protected $splitRequestType = 'Google_Service_Dataflow_ApproximateSplitRequest';
  protected $splitRequestDataType = '';
  protected $suggestedStopPointType = 'Google_Service_Dataflow_ApproximateProgress';
  protected $suggestedStopPointDataType = '';
  protected $suggestedStopPositionType = 'Google_Service_Dataflow_Position';
  protected $suggestedStopPositionDataType = '';

  public function setHarnessData($harnessData)
  {
    $this->harnessData = $harnessData;
  }
  public function getHarnessData()
  {
    return $this->harnessData;
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
   * @param Google_Service_Dataflow_MetricShortId
   */
  public function setMetricShortId($metricShortId)
  {
    $this->metricShortId = $metricShortId;
  }
  /**
   * @return Google_Service_Dataflow_MetricShortId
   */
  public function getMetricShortId()
  {
    return $this->metricShortId;
  }
  public function setNextReportIndex($nextReportIndex)
  {
    $this->nextReportIndex = $nextReportIndex;
  }
  public function getNextReportIndex()
  {
    return $this->nextReportIndex;
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
   * @param Google_Service_Dataflow_ApproximateSplitRequest
   */
  public function setSplitRequest(Google_Service_Dataflow_ApproximateSplitRequest $splitRequest)
  {
    $this->splitRequest = $splitRequest;
  }
  /**
   * @return Google_Service_Dataflow_ApproximateSplitRequest
   */
  public function getSplitRequest()
  {
    return $this->splitRequest;
  }
  /**
   * @param Google_Service_Dataflow_ApproximateProgress
   */
  public function setSuggestedStopPoint(Google_Service_Dataflow_ApproximateProgress $suggestedStopPoint)
  {
    $this->suggestedStopPoint = $suggestedStopPoint;
  }
  /**
   * @return Google_Service_Dataflow_ApproximateProgress
   */
  public function getSuggestedStopPoint()
  {
    return $this->suggestedStopPoint;
  }
  /**
   * @param Google_Service_Dataflow_Position
   */
  public function setSuggestedStopPosition(Google_Service_Dataflow_Position $suggestedStopPosition)
  {
    $this->suggestedStopPosition = $suggestedStopPosition;
  }
  /**
   * @return Google_Service_Dataflow_Position
   */
  public function getSuggestedStopPosition()
  {
    return $this->suggestedStopPosition;
  }
}
