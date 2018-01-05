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

class Google_Service_Spanner_CreateInstanceMetadata extends Google_Model
{
  public $cancelTime;
  public $endTime;
  protected $instanceType = 'Google_Service_Spanner_Instance';
  protected $instanceDataType = '';
  public $startTime;

  public function setCancelTime($cancelTime)
  {
    $this->cancelTime = $cancelTime;
  }
  public function getCancelTime()
  {
    return $this->cancelTime;
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
   * @param Google_Service_Spanner_Instance
   */
  public function setInstance(Google_Service_Spanner_Instance $instance)
  {
    $this->instance = $instance;
  }
  /**
   * @return Google_Service_Spanner_Instance
   */
  public function getInstance()
  {
    return $this->instance;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
}
