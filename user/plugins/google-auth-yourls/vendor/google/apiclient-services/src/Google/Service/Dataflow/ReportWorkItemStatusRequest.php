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

class Google_Service_Dataflow_ReportWorkItemStatusRequest extends Google_Collection
{
  protected $collection_key = 'workItemStatuses';
  public $currentWorkerTime;
  public $location;
  protected $workItemStatusesType = 'Google_Service_Dataflow_WorkItemStatus';
  protected $workItemStatusesDataType = 'array';
  public $workerId;

  public function setCurrentWorkerTime($currentWorkerTime)
  {
    $this->currentWorkerTime = $currentWorkerTime;
  }
  public function getCurrentWorkerTime()
  {
    return $this->currentWorkerTime;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param Google_Service_Dataflow_WorkItemStatus
   */
  public function setWorkItemStatuses($workItemStatuses)
  {
    $this->workItemStatuses = $workItemStatuses;
  }
  /**
   * @return Google_Service_Dataflow_WorkItemStatus
   */
  public function getWorkItemStatuses()
  {
    return $this->workItemStatuses;
  }
  public function setWorkerId($workerId)
  {
    $this->workerId = $workerId;
  }
  public function getWorkerId()
  {
    return $this->workerId;
  }
}
