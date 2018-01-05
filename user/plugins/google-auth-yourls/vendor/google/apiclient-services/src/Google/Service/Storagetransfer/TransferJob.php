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

class Google_Service_Storagetransfer_TransferJob extends Google_Model
{
  public $creationTime;
  public $deletionTime;
  public $description;
  public $lastModificationTime;
  public $name;
  public $projectId;
  protected $scheduleType = 'Google_Service_Storagetransfer_Schedule';
  protected $scheduleDataType = '';
  public $status;
  protected $transferSpecType = 'Google_Service_Storagetransfer_TransferSpec';
  protected $transferSpecDataType = '';

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setDeletionTime($deletionTime)
  {
    $this->deletionTime = $deletionTime;
  }
  public function getDeletionTime()
  {
    return $this->deletionTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setLastModificationTime($lastModificationTime)
  {
    $this->lastModificationTime = $lastModificationTime;
  }
  public function getLastModificationTime()
  {
    return $this->lastModificationTime;
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
  /**
   * @param Google_Service_Storagetransfer_Schedule
   */
  public function setSchedule(Google_Service_Storagetransfer_Schedule $schedule)
  {
    $this->schedule = $schedule;
  }
  /**
   * @return Google_Service_Storagetransfer_Schedule
   */
  public function getSchedule()
  {
    return $this->schedule;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
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
