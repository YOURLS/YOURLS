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

class Google_Service_Dataflow_ExecutionStageState extends Google_Model
{
  public $currentStateTime;
  public $executionStageName;
  public $executionStageState;

  public function setCurrentStateTime($currentStateTime)
  {
    $this->currentStateTime = $currentStateTime;
  }
  public function getCurrentStateTime()
  {
    return $this->currentStateTime;
  }
  public function setExecutionStageName($executionStageName)
  {
    $this->executionStageName = $executionStageName;
  }
  public function getExecutionStageName()
  {
    return $this->executionStageName;
  }
  public function setExecutionStageState($executionStageState)
  {
    $this->executionStageState = $executionStageState;
  }
  public function getExecutionStageState()
  {
    return $this->executionStageState;
  }
}
