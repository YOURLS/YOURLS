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

class Google_Service_Storagetransfer_TransferOperation extends Google_Collection
{
  protected $collection_key = 'errorBreakdowns';
  protected $countersType = 'Google_Service_Storagetransfer_TransferCounters';
  protected $countersDataType = '';
  public $endTime;
  protected $errorBreakdownsType = 'Google_Service_Storagetransfer_ErrorSummary';
  protected $errorBreakdownsDataType = 'array';
  public $name;
  public $projectId;
  public $startTime;
  public $status;
  public $transferJobName;
  protected $transferSpecType = 'Google_Service_Storagetransfer_TransferSpec';
  protected $transferSpecDataType = '';

  /**
   * @param Google_Service_Storagetransfer_TransferCounters
   */
  public function setCounters(Google_Service_Storagetransfer_TransferCounters $counters)
  {
    $this->counters = $counters;
  }
  /**
   * @return Google_Service_Storagetransfer_TransferCounters
   */
  public function getCounters()
  {
    return $this->counters;
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
   * @param Google_Service_Storagetransfer_ErrorSummary
   */
  public function setErrorBreakdowns($errorBreakdowns)
  {
    $this->errorBreakdowns = $errorBreakdowns;
  }
  /**
   * @return Google_Service_Storagetransfer_ErrorSummary
   */
  public function getErrorBreakdowns()
  {
    return $this->errorBreakdowns;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
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
  public function setTransferJobName($transferJobName)
  {
    $this->transferJobName = $transferJobName;
  }
  public function getTransferJobName()
  {
    return $this->transferJobName;
  }
  /**
   * @param Google_Service_Storagetransfer_TransferSpec
   */
  public function setTransferSpec(Google_Service_Storagetransfer_TransferSpec $transferSpec)
  {
    $this->transferSpec = $transferSpec;
  }
  /**
   * @return Google_Service_Storagetransfer_TransferSpec
   */
  public function getTransferSpec()
  {
    return $this->transferSpec;
  }
}
