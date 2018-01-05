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

class Google_Service_Analytics_IncludeConditions extends Google_Model
{
  public $daysToLookBack;
  public $isSmartList;
  public $kind;
  public $membershipDurationDays;
  public $segment;

  public function setDaysToLookBack($daysToLookBack)
  {
    $this->daysToLookBack = $daysToLookBack;
  }
  public function getDaysToLookBack()
  {
    return $this->daysToLookBack;
  }
  public function setIsSmartList($isSmartList)
  {
    $this->isSmartList = $isSmartList;
  }
  public function getIsSmartList()
  {
    return $this->isSmartList;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMembershipDurationDays($membershipDurationDays)
  {
    $this->membershipDurationDays = $membershipDurationDays;
  }
  public function getMembershipDurationDays()
  {
    return $this->membershipDurationDays;
  }
  public function setSegment($segment)
  {
    $this->segment = $segment;
  }
  public function getSegment()
  {
    return $this->segment;
  }
}
