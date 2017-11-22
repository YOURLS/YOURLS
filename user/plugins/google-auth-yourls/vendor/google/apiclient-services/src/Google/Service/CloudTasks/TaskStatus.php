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

class Google_Service_CloudTasks_TaskStatus extends Google_Model
{
  public $attemptDispatchCount;
  public $attemptResponseCount;
  protected $firstAttemptStatusType = 'Google_Service_CloudTasks_AttemptStatus';
  protected $firstAttemptStatusDataType = '';
  protected $lastAttemptStatusType = 'Google_Service_CloudTasks_AttemptStatus';
  protected $lastAttemptStatusDataType = '';

  public function setAttemptDispatchCount($attemptDispatchCount)
  {
    $this->attemptDispatchCount = $attemptDispatchCount;
  }
  public function getAttemptDispatchCount()
  {
    return $this->attemptDispatchCount;
  }
  public function setAttemptResponseCount($attemptResponseCount)
  {
    $this->attemptResponseCount = $attemptResponseCount;
  }
  public function getAttemptResponseCount()
  {
    return $this->attemptResponseCount;
  }
  /**
   * @param Google_Service_CloudTasks_AttemptStatus
   */
  public function setFirstAttemptStatus(Google_Service_CloudTasks_AttemptStatus $firstAttemptStatus)
  {
    $this->firstAttemptStatus = $firstAttemptStatus;
  }
  /**
   * @return Google_Service_CloudTasks_AttemptStatus
   */
  public function getFirstAttemptStatus()
  {
    return $this->firstAttemptStatus;
  }
  /**
   * @param Google_Service_CloudTasks_AttemptStatus
   */
  public function setLastAttemptStatus(Google_Service_CloudTasks_AttemptStatus $lastAttemptStatus)
  {
    $this->lastAttemptStatus = $lastAttemptStatus;
  }
  /**
   * @return Google_Service_CloudTasks_AttemptStatus
   */
  public function getLastAttemptStatus()
  {
    return $this->lastAttemptStatus;
  }
}
