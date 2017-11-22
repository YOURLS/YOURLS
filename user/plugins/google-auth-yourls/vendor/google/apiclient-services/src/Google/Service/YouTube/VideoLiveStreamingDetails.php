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

class Google_Service_YouTube_VideoLiveStreamingDetails extends Google_Model
{
  public $activeLiveChatId;
  public $actualEndTime;
  public $actualStartTime;
  public $concurrentViewers;
  public $scheduledEndTime;
  public $scheduledStartTime;

  public function setActiveLiveChatId($activeLiveChatId)
  {
    $this->activeLiveChatId = $activeLiveChatId;
  }
  public function getActiveLiveChatId()
  {
    return $this->activeLiveChatId;
  }
  public function setActualEndTime($actualEndTime)
  {
    $this->actualEndTime = $actualEndTime;
  }
  public function getActualEndTime()
  {
    return $this->actualEndTime;
  }
  public function setActualStartTime($actualStartTime)
  {
    $this->actualStartTime = $actualStartTime;
  }
  public function getActualStartTime()
  {
    return $this->actualStartTime;
  }
  public function setConcurrentViewers($concurrentViewers)
  {
    $this->concurrentViewers = $concurrentViewers;
  }
  public function getConcurrentViewers()
  {
    return $this->concurrentViewers;
  }
  public function setScheduledEndTime($scheduledEndTime)
  {
    $this->scheduledEndTime = $scheduledEndTime;
  }
  public function getScheduledEndTime()
  {
    return $this->scheduledEndTime;
  }
  public function setScheduledStartTime($scheduledStartTime)
  {
    $this->scheduledStartTime = $scheduledStartTime;
  }
  public function getScheduledStartTime()
  {
    return $this->scheduledStartTime;
  }
}
