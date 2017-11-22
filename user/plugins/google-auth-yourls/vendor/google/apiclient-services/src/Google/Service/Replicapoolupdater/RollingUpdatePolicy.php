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

class Google_Service_Replicapoolupdater_RollingUpdatePolicy extends Google_Model
{
  public $autoPauseAfterInstances;
  public $instanceStartupTimeoutSec;
  public $maxNumConcurrentInstances;
  public $maxNumFailedInstances;
  public $minInstanceUpdateTimeSec;

  public function setAutoPauseAfterInstances($autoPauseAfterInstances)
  {
    $this->autoPauseAfterInstances = $autoPauseAfterInstances;
  }
  public function getAutoPauseAfterInstances()
  {
    return $this->autoPauseAfterInstances;
  }
  public function setInstanceStartupTimeoutSec($instanceStartupTimeoutSec)
  {
    $this->instanceStartupTimeoutSec = $instanceStartupTimeoutSec;
  }
  public function getInstanceStartupTimeoutSec()
  {
    return $this->instanceStartupTimeoutSec;
  }
  public function setMaxNumConcurrentInstances($maxNumConcurrentInstances)
  {
    $this->maxNumConcurrentInstances = $maxNumConcurrentInstances;
  }
  public function getMaxNumConcurrentInstances()
  {
    return $this->maxNumConcurrentInstances;
  }
  public function setMaxNumFailedInstances($maxNumFailedInstances)
  {
    $this->maxNumFailedInstances = $maxNumFailedInstances;
  }
  public function getMaxNumFailedInstances()
  {
    return $this->maxNumFailedInstances;
  }
  public function setMinInstanceUpdateTimeSec($minInstanceUpdateTimeSec)
  {
    $this->minInstanceUpdateTimeSec = $minInstanceUpdateTimeSec;
  }
  public function getMinInstanceUpdateTimeSec()
  {
    return $this->minInstanceUpdateTimeSec;
  }
}
