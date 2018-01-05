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

class Google_Service_Dataproc_ClusterStatus extends Google_Model
{
  public $detail;
  public $state;
  public $stateStartTime;
  public $substate;

  public function setDetail($detail)
  {
    $this->detail = $detail;
  }
  public function getDetail()
  {
    return $this->detail;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStateStartTime($stateStartTime)
  {
    $this->stateStartTime = $stateStartTime;
  }
  public function getStateStartTime()
  {
    return $this->stateStartTime;
  }
  public function setSubstate($substate)
  {
    $this->substate = $substate;
  }
  public function getSubstate()
  {
    return $this->substate;
  }
}
