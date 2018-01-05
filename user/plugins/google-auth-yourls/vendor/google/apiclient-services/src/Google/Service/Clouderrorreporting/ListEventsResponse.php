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

class Google_Service_Clouderrorreporting_ListEventsResponse extends Google_Collection
{
  protected $collection_key = 'errorEvents';
  protected $errorEventsType = 'Google_Service_Clouderrorreporting_ErrorEvent';
  protected $errorEventsDataType = 'array';
  public $nextPageToken;
  public $timeRangeBegin;

  /**
   * @param Google_Service_Clouderrorreporting_ErrorEvent
   */
  public function setErrorEvents($errorEvents)
  {
    $this->errorEvents = $errorEvents;
  }
  /**
   * @return Google_Service_Clouderrorreporting_ErrorEvent
   */
  public function getErrorEvents()
  {
    return $this->errorEvents;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setTimeRangeBegin($timeRangeBegin)
  {
    $this->timeRangeBegin = $timeRangeBegin;
  }
  public function getTimeRangeBegin()
  {
    return $this->timeRangeBegin;
  }
}
