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

class Google_Service_Tracing_Span extends Google_Model
{
  protected $attributesType = 'Google_Service_Tracing_Attributes';
  protected $attributesDataType = '';
  protected $displayNameType = 'Google_Service_Tracing_TruncatableString';
  protected $displayNameDataType = '';
  public $endTime;
  protected $linksType = 'Google_Service_Tracing_Links';
  protected $linksDataType = '';
  public $name;
  public $parentSpanId;
  public $spanId;
  protected $stackTraceType = 'Google_Service_Tracing_StackTrace';
  protected $stackTraceDataType = '';
  public $startTime;
  protected $statusType = 'Google_Service_Tracing_Status';
  protected $statusDataType = '';
  protected $timeEventsType = 'Google_Service_Tracing_TimeEvents';
  protected $timeEventsDataType = '';

  public function setAttributes(Google_Service_Tracing_Attributes $attributes)
  {
    $this->attributes = $attributes;
  }
  public function getAttributes()
  {
    return $this->attributes;
  }
  public function setDisplayName(Google_Service_Tracing_TruncatableString $displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setLinks(Google_Service_Tracing_Links $links)
  {
    $this->links = $links;
  }
  public function getLinks()
  {
    return $this->links;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setParentSpanId($parentSpanId)
  {
    $this->parentSpanId = $parentSpanId;
  }
  public function getParentSpanId()
  {
    return $this->parentSpanId;
  }
  public function setSpanId($spanId)
  {
    $this->spanId = $spanId;
  }
  public function getSpanId()
  {
    return $this->spanId;
  }
  public function setStackTrace(Google_Service_Tracing_StackTrace $stackTrace)
  {
    $this->stackTrace = $stackTrace;
  }
  public function getStackTrace()
  {
    return $this->stackTrace;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setStatus(Google_Service_Tracing_Status $status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTimeEvents(Google_Service_Tracing_TimeEvents $timeEvents)
  {
    $this->timeEvents = $timeEvents;
  }
  public function getTimeEvents()
  {
    return $this->timeEvents;
  }
}
