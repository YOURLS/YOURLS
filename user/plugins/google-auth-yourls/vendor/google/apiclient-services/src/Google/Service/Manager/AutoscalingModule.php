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

class Google_Service_Manager_AutoscalingModule extends Google_Model
{
  public $coolDownPeriodSec;
  public $description;
  public $maxNumReplicas;
  public $minNumReplicas;
  public $signalType;
  public $targetModule;
  public $targetUtilization;

  public function setCoolDownPeriodSec($coolDownPeriodSec)
  {
    $this->coolDownPeriodSec = $coolDownPeriodSec;
  }
  public function getCoolDownPeriodSec()
  {
    return $this->coolDownPeriodSec;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setMaxNumReplicas($maxNumReplicas)
  {
    $this->maxNumReplicas = $maxNumReplicas;
  }
  public function getMaxNumReplicas()
  {
    return $this->maxNumReplicas;
  }
  public function setMinNumReplicas($minNumReplicas)
  {
    $this->minNumReplicas = $minNumReplicas;
  }
  public function getMinNumReplicas()
  {
    return $this->minNumReplicas;
  }
  public function setSignalType($signalType)
  {
    $this->signalType = $signalType;
  }
  public function getSignalType()
  {
    return $this->signalType;
  }
  public function setTargetModule($targetModule)
  {
    $this->targetModule = $targetModule;
  }
  public function getTargetModule()
  {
    return $this->targetModule;
  }
  public function setTargetUtilization($targetUtilization)
  {
    $this->targetUtilization = $targetUtilization;
  }
  public function getTargetUtilization()
  {
    return $this->targetUtilization;
  }
}
