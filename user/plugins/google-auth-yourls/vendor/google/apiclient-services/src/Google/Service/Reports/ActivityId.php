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

class Google_Service_Reports_ActivityId extends Google_Model
{
  public $applicationName;
  public $customerId;
  public $time;
  public $uniqueQualifier;

  public function setApplicationName($applicationName)
  {
    $this->applicationName = $applicationName;
  }
  public function getApplicationName()
  {
    return $this->applicationName;
  }
  public function setCustomerId($customerId)
  {
    $this->customerId = $customerId;
  }
  public function getCustomerId()
  {
    return $this->customerId;
  }
  public function setTime($time)
  {
    $this->time = $time;
  }
  public function getTime()
  {
    return $this->time;
  }
  public function setUniqueQualifier($uniqueQualifier)
  {
    $this->uniqueQualifier = $uniqueQualifier;
  }
  public function getUniqueQualifier()
  {
    return $this->uniqueQualifier;
  }
}
