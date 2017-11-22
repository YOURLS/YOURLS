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

class Google_Service_CloudTrace_TimeEvents extends Google_Collection
{
  protected $collection_key = 'timeEvent';
  public $droppedAnnotationsCount;
  public $droppedMessageEventsCount;
  protected $timeEventType = 'Google_Service_CloudTrace_TimeEvent';
  protected $timeEventDataType = 'array';

  public function setDroppedAnnotationsCount($droppedAnnotationsCount)
  {
    $this->droppedAnnotationsCount = $droppedAnnotationsCount;
  }
  public function getDroppedAnnotationsCount()
  {
    return $this->droppedAnnotationsCount;
  }
  public function setDroppedMessageEventsCount($droppedMessageEventsCount)
  {
    $this->droppedMessageEventsCount = $droppedMessageEventsCount;
  }
  public function getDroppedMessageEventsCount()
  {
    return $this->droppedMessageEventsCount;
  }
  /**
   * @param Google_Service_CloudTrace_TimeEvent
   */
  public function setTimeEvent($timeEvent)
  {
    $this->timeEvent = $timeEvent;
  }
  /**
   * @return Google_Service_CloudTrace_TimeEvent
   */
  public function getTimeEvent()
  {
    return $this->timeEvent;
  }
}
