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

class Google_Service_Appengine_StandardSchedulerSettings extends Google_Model
{
  public $maxInstances;
  public $minInstances;
  public $targetCpuUtilization;
  public $targetThroughputUtilization;

  public function setMaxInstances($maxInstances)
  {
    $this->maxInstances = $maxInstances;
  }
  public function getMaxInstances()
  {
    return $this->maxInstances;
  }
  public function setMinInstances($minInstances)
  {
    $this->minInstances = $minInstances;
  }
  public function getMinInstances()
  {
    return $this->minInstances;
  }
  public function setTargetCpuUtilization($targetCpuUtilization)
  {
    $this->targetCpuUtilization = $targetCpuUtilization;
  }
  public function getTargetCpuUtilization()
  {
    return $this->targetCpuUtilization;
  }
  public function setTargetThroughputUtilization($targetThroughputUtilization)
  {
    $this->targetThroughputUtilization = $targetThroughputUtilization;
  }
  public function getTargetThroughputUtilization()
  {
    return $this->targetThroughputUtilization;
  }
}
