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

class Google_Service_SQLAdmin_BackupRun extends Google_Model
{
  public $description;
  public $endTime;
  public $enqueuedTime;
  protected $errorType = 'Google_Service_SQLAdmin_OperationError';
  protected $errorDataType = '';
  public $id;
  public $instance;
  public $kind;
  public $selfLink;
  public $startTime;
  public $status;
  public $type;
  public $windowStartTime;

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setEnqueuedTime($enqueuedTime)
  {
    $this->enqueuedTime = $enqueuedTime;
  }
  public function getEnqueuedTime()
  {
    return $this->enqueuedTime;
  }
  /**
   * @param Google_Service_SQLAdmin_OperationError
   */
  public function setError(Google_Service_SQLAdmin_OperationError $error)
  {
    $this->error = $error;
  }
  /**
   * @return Google_Service_SQLAdmin_OperationError
   */
  public function getError()
  {
    return $this->error;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInstance($instance)
  {
    $this->instance = $instance;
  }
  public function getInstance()
  {
    return $this->instance;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
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
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setWindowStartTime($windowStartTime)
  {
    $this->windowStartTime = $windowStartTime;
  }
  public function getWindowStartTime()
  {
    return $this->windowStartTime;
  }
}
