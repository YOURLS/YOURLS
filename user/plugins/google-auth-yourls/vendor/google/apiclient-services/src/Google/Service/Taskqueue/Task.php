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

class Google_Service_Taskqueue_Task extends Google_Model
{
  protected $internal_gapi_mappings = array(
        "retryCount" => "retry_count",
  );
  public $enqueueTimestamp;
  public $id;
  public $kind;
  public $leaseTimestamp;
  public $payloadBase64;
  public $queueName;
  public $retryCount;
  public $tag;

  public function setEnqueueTimestamp($enqueueTimestamp)
  {
    $this->enqueueTimestamp = $enqueueTimestamp;
  }
  public function getEnqueueTimestamp()
  {
    return $this->enqueueTimestamp;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLeaseTimestamp($leaseTimestamp)
  {
    $this->leaseTimestamp = $leaseTimestamp;
  }
  public function getLeaseTimestamp()
  {
    return $this->leaseTimestamp;
  }
  public function setPayloadBase64($payloadBase64)
  {
    $this->payloadBase64 = $payloadBase64;
  }
  public function getPayloadBase64()
  {
    return $this->payloadBase64;
  }
  public function setQueueName($queueName)
  {
    $this->queueName = $queueName;
  }
  public function getQueueName()
  {
    return $this->queueName;
  }
  public function setRetryCount($retryCount)
  {
    $this->retryCount = $retryCount;
  }
  public function getRetryCount()
  {
    return $this->retryCount;
  }
  public function setTag($tag)
  {
    $this->tag = $tag;
  }
  public function getTag()
  {
    return $this->tag;
  }
}
