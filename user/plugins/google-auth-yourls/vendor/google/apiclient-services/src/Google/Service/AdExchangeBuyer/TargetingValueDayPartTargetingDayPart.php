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

class Google_Service_AdExchangeBuyer_TargetingValueDayPartTargetingDayPart extends Google_Model
{
  public $dayOfWeek;
  public $endHour;
  public $endMinute;
  public $startHour;
  public $startMinute;

  public function setDayOfWeek($dayOfWeek)
  {
    $this->dayOfWeek = $dayOfWeek;
  }
  public function getDayOfWeek()
  {
    return $this->dayOfWeek;
  }
  public function setEndHour($endHour)
  {
    $this->endHour = $endHour;
  }
  public function getEndHour()
  {
    return $this->endHour;
  }
  public function setEndMinute($endMinute)
  {
    $this->endMinute = $endMinute;
  }
  public function getEndMinute()
  {
    return $this->endMinute;
  }
  public function setStartHour($startHour)
  {
    $this->startHour = $startHour;
  }
  public function getStartHour()
  {
    return $this->startHour;
  }
  public function setStartMinute($startMinute)
  {
    $this->startMinute = $startMinute;
  }
  public function getStartMinute()
  {
    return $this->startMinute;
  }
}
