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

class Google_Service_ServiceManagement_FlowOperationMetadata extends Google_Collection
{
  protected $collection_key = 'resourceNames';
  public $cancelState;
  public $deadline;
  public $flowName;
  public $operationType;
  public $resourceNames;
  public $startTime;
  public $surface;

  public function setCancelState($cancelState)
  {
    $this->cancelState = $cancelState;
  }
  public function getCancelState()
  {
    return $this->cancelState;
  }
  public function setDeadline($deadline)
  {
    $this->deadline = $deadline;
  }
  public function getDeadline()
  {
    return $this->deadline;
  }
  public function setFlowName($flowName)
  {
    $this->flowName = $flowName;
  }
  public function getFlowName()
  {
    return $this->flowName;
  }
  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }
  public function getOperationType()
  {
    return $this->operationType;
  }
  public function setResourceNames($resourceNames)
  {
    $this->resourceNames = $resourceNames;
  }
  public function getResourceNames()
  {
    return $this->resourceNames;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setSurface($surface)
  {
    $this->surface = $surface;
  }
  public function getSurface()
  {
    return $this->surface;
  }
}
