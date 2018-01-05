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

class Google_Service_Dataflow_AutoscalingEvent extends Google_Model
{
  public $currentNumWorkers;
  protected $descriptionType = 'Google_Service_Dataflow_StructuredMessage';
  protected $descriptionDataType = '';
  public $eventType;
  public $targetNumWorkers;
  public $time;

  public function setCurrentNumWorkers($currentNumWorkers)
  {
    $this->currentNumWorkers = $currentNumWorkers;
  }
  public function getCurrentNumWorkers()
  {
    return $this->currentNumWorkers;
  }
  /**
   * @param Google_Service_Dataflow_StructuredMessage
   */
  public function setDescription(Google_Service_Dataflow_StructuredMessage $description)
  {
    $this->description = $description;
  }
  /**
   * @return Google_Service_Dataflow_StructuredMessage
   */
  public function getDescription()
  {
    return $this->description;
  }
  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
  public function getEventType()
  {
    return $this->eventType;
  }
  public function setTargetNumWorkers($targetNumWorkers)
  {
    $this->targetNumWorkers = $targetNumWorkers;
  }
  public function getTargetNumWorkers()
  {
    return $this->targetNumWorkers;
  }
  public function setTime($time)
  {
    $this->time = $time;
  }
  public function getTime()
  {
    return $this->time;
  }
}
