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

class Google_Service_BigQueryDataTransfer_TransferRun extends Google_Model
{
  public $dataSourceId;
  public $destinationDatasetId;
  public $endTime;
  protected $errorStatusType = 'Google_Service_BigQueryDataTransfer_Status';
  protected $errorStatusDataType = '';
  public $name;
  public $params;
  public $runTime;
  public $schedule;
  public $scheduleTime;
  public $startTime;
  public $state;
  public $updateTime;
  public $userId;

  public function setDataSourceId($dataSourceId)
  {
    $this->dataSourceId = $dataSourceId;
  }
  public function getDataSourceId()
  {
    return $this->dataSourceId;
  }
  public function setDestinationDatasetId($destinationDatasetId)
  {
    $this->destinationDatasetId = $destinationDatasetId;
  }
  public function getDestinationDatasetId()
  {
    return $this->destinationDatasetId;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param Google_Service_BigQueryDataTransfer_Status
   */
  public function setErrorStatus(Google_Service_BigQueryDataTransfer_Status $errorStatus)
  {
    $this->errorStatus = $errorStatus;
  }
  /**
   * @return Google_Service_BigQueryDataTransfer_Status
   */
  public function getErrorStatus()
  {
    return $this->errorStatus;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setParams($params)
  {
    $this->params = $params;
  }
  public function getParams()
  {
    return $this->params;
  }
  public function setRunTime($runTime)
  {
    $this->runTime = $runTime;
  }
  public function getRunTime()
  {
    return $this->runTime;
  }
  public function setSchedule($schedule)
  {
    $this->schedule = $schedule;
  }
  public function getSchedule()
  {
    return $this->schedule;
  }
  public function setScheduleTime($scheduleTime)
  {
    $this->scheduleTime = $scheduleTime;
  }
  public function getScheduleTime()
  {
    return $this->scheduleTime;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
}
