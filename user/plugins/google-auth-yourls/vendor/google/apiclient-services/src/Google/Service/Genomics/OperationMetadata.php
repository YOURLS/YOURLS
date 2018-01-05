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

class Google_Service_Genomics_OperationMetadata extends Google_Collection
{
  protected $collection_key = 'events';
  public $clientId;
  public $createTime;
  public $endTime;
  protected $eventsType = 'Google_Service_Genomics_OperationEvent';
  protected $eventsDataType = 'array';
  public $labels;
  public $projectId;
  public $request;
  public $runtimeMetadata;
  public $startTime;

  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  public function getClientId()
  {
    return $this->clientId;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
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
   * @param Google_Service_Genomics_OperationEvent
   */
  public function setEvents($events)
  {
    $this->events = $events;
  }
  /**
   * @return Google_Service_Genomics_OperationEvent
   */
  public function getEvents()
  {
    return $this->events;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setRequest($request)
  {
    $this->request = $request;
  }
  public function getRequest()
  {
    return $this->request;
  }
  public function setRuntimeMetadata($runtimeMetadata)
  {
    $this->runtimeMetadata = $runtimeMetadata;
  }
  public function getRuntimeMetadata()
  {
    return $this->runtimeMetadata;
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
