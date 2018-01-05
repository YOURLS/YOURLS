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

class Google_Service_Games_EventBatchRecordFailure extends Google_Model
{
  public $failureCause;
  public $kind;
  protected $rangeType = 'Google_Service_Games_EventPeriodRange';
  protected $rangeDataType = '';

  public function setFailureCause($failureCause)
  {
    $this->failureCause = $failureCause;
  }
  public function getFailureCause()
  {
    return $this->failureCause;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Games_EventPeriodRange
   */
  public function setRange(Google_Service_Games_EventPeriodRange $range)
  {
    $this->range = $range;
  }
  /**
   * @return Google_Service_Games_EventPeriodRange
   */
  public function getRange()
  {
    return $this->range;
  }
}
