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

class Google_Service_Taskqueue_TaskQueueStats extends Google_Model
{
  public $leasedLastHour;
  public $leasedLastMinute;
  public $oldestTask;
  public $totalTasks;

  public function setLeasedLastHour($leasedLastHour)
  {
    $this->leasedLastHour = $leasedLastHour;
  }
  public function getLeasedLastHour()
  {
    return $this->leasedLastHour;
  }
  public function setLeasedLastMinute($leasedLastMinute)
  {
    $this->leasedLastMinute = $leasedLastMinute;
  }
  public function getLeasedLastMinute()
  {
    return $this->leasedLastMinute;
  }
  public function setOldestTask($oldestTask)
  {
    $this->oldestTask = $oldestTask;
  }
  public function getOldestTask()
  {
    return $this->oldestTask;
  }
  public function setTotalTasks($totalTasks)
  {
    $this->totalTasks = $totalTasks;
  }
  public function getTotalTasks()
  {
    return $this->totalTasks;
  }
}
