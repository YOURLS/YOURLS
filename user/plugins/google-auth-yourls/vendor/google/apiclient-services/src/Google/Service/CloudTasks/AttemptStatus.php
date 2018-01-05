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

class Google_Service_CloudTasks_AttemptStatus extends Google_Model
{
  public $dispatchTime;
  protected $responseStatusType = 'Google_Service_CloudTasks_Status';
  protected $responseStatusDataType = '';
  public $responseTime;
  public $scheduleTime;

  public function setDispatchTime($dispatchTime)
  {
    $this->dispatchTime = $dispatchTime;
  }
  public function getDispatchTime()
  {
    return $this->dispatchTime;
  }
  /**
   * @param Google_Service_CloudTasks_Status
   */
  public function setResponseStatus(Google_Service_CloudTasks_Status $responseStatus)
  {
    $this->responseStatus = $responseStatus;
  }
  /**
   * @return Google_Service_CloudTasks_Status
   */
  public function getResponseStatus()
  {
    return $this->responseStatus;
  }
  public function setResponseTime($responseTime)
  {
    $this->responseTime = $responseTime;
  }
  public function getResponseTime()
  {
    return $this->responseTime;
  }
  public function setScheduleTime($scheduleTime)
  {
    $this->scheduleTime = $scheduleTime;
  }
  public function getScheduleTime()
  {
    return $this->scheduleTime;
  }
}
