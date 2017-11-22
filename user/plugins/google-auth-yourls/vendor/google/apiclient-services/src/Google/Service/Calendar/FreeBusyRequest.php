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

class Google_Service_Calendar_FreeBusyRequest extends Google_Collection
{
  protected $collection_key = 'items';
  public $calendarExpansionMax;
  public $groupExpansionMax;
  protected $itemsType = 'Google_Service_Calendar_FreeBusyRequestItem';
  protected $itemsDataType = 'array';
  public $timeMax;
  public $timeMin;
  public $timeZone;

  public function setCalendarExpansionMax($calendarExpansionMax)
  {
    $this->calendarExpansionMax = $calendarExpansionMax;
  }
  public function getCalendarExpansionMax()
  {
    return $this->calendarExpansionMax;
  }
  public function setGroupExpansionMax($groupExpansionMax)
  {
    $this->groupExpansionMax = $groupExpansionMax;
  }
  public function getGroupExpansionMax()
  {
    return $this->groupExpansionMax;
  }
  /**
   * @param Google_Service_Calendar_FreeBusyRequestItem
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return Google_Service_Calendar_FreeBusyRequestItem
   */
  public function getItems()
  {
    return $this->items;
  }
  public function setTimeMax($timeMax)
  {
    $this->timeMax = $timeMax;
  }
  public function getTimeMax()
  {
    return $this->timeMax;
  }
  public function setTimeMin($timeMin)
  {
    $this->timeMin = $timeMin;
  }
  public function getTimeMin()
  {
    return $this->timeMin;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}
