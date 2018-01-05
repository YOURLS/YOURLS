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

class Google_Service_CloudTrace_Span extends Google_Model
{
  protected $attributesType = 'Google_Service_CloudTrace_Attributes';
  protected $attributesDataType = '';
  public $childSpanCount;
  protected $displayNameType = 'Google_Service_CloudTrace_TruncatableString';
  protected $displayNameDataType = '';
  public $endTime;
  protected $linksType = 'Google_Service_CloudTrace_Links';
  protected $linksDataType = '';
  public $name;
  public $parentSpanId;
  public $sameProcessAsParentSpan;
  public $spanId;
  protected $stackTraceType = 'Google_Service_CloudTrace_StackTrace';
  protected $stackTraceDataType = '';
  public $startTime;
  protected $statusType = 'Google_Service_CloudTrace_Status';
  protected $statusDataType = '';
  protected $timeEventsType = 'Google_Service_CloudTrace_TimeEvents';
  protected $timeEventsDataType = '';

  /**
   * @param Google_Service_CloudTrace_Attributes
   */
  public function setAttributes(Google_Service_CloudTrace_Attributes $attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return Google_Service_CloudTrace_Attributes
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  public function setChildSpanCount($childSpanCount)
  {
    $this->childSpanCount = $childSpanCount;
  }
  public function getChildSpanCount()
  {
    return $this->childSpanCount;
  }
  /**
   * @param Google_Service_CloudTrace_TruncatableString
   */
  public function setDisplayName(Google_Service_CloudTrace_TruncatableString $displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return Google_Service_CloudTrace_TruncatableString
   */
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
  /**
   * @param Google_Service_CloudTrace_Links
   */
  public function setLinks(Google_Service_CloudTrace_Links $links)
  {
    $this->links = $links;
  }
  /**
   * @return Google_Service_CloudTrace_Links
   */
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
  public function setSameProcessAsParentSpan($sameProcessAsParentSpan)
  {
    $this->sameProcessAsParentSpan = $sameProcessAsParentSpan;
  }
  public function getSameProcessAsParentSpan()
  {
    return $this->sameProcessAsParentSpan;
  }
  public function setSpanId($spanId)
  {
    $this->spanId = $spanId;
  }
  public function getSpanId()
  {
    return $this->spanId;
  }
  /**
   * @param Google_Service_CloudTrace_StackTrace
   */
  public function setStackTrace(Google_Service_CloudTrace_StackTrace $stackTrace)
  {
    $this->stackTrace = $stackTrace;
  }
  /**
   * @return Google_Service_CloudTrace_StackTrace
   */
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
  /**
   * @param Google_Service_CloudTrace_Status
   */
  public function setStatus(Google_Service_CloudTrace_Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_CloudTrace_Status
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param Google_Service_CloudTrace_TimeEvents
   */
  public function setTimeEvents(Google_Service_CloudTrace_TimeEvents $timeEvents)
  {
    $this->timeEvents = $timeEvents;
  }
  /**
   * @return Google_Service_CloudTrace_TimeEvents
   */
  public function getTimeEvents()
  {
    return $this->timeEvents;
  }
}
