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

class Google_Service_CloudTasks_RateLimits extends Google_Model
{
  public $maxBurstSize;
  public $maxConcurrentTasks;
  public $maxTasksDispatchedPerSecond;

  public function setMaxBurstSize($maxBurstSize)
  {
    $this->maxBurstSize = $maxBurstSize;
  }
  public function getMaxBurstSize()
  {
    return $this->maxBurstSize;
  }
  public function setMaxConcurrentTasks($maxConcurrentTasks)
  {
    $this->maxConcurrentTasks = $maxConcurrentTasks;
  }
  public function getMaxConcurrentTasks()
  {
    return $this->maxConcurrentTasks;
  }
  public function setMaxTasksDispatchedPerSecond($maxTasksDispatchedPerSecond)
  {
    $this->maxTasksDispatchedPerSecond = $maxTasksDispatchedPerSecond;
  }
  public function getMaxTasksDispatchedPerSecond()
  {
    return $this->maxTasksDispatchedPerSecond;
  }
}
