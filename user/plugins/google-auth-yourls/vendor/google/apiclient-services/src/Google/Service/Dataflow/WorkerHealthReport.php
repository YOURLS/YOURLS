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

class Google_Service_Dataflow_WorkerHealthReport extends Google_Collection
{
  protected $collection_key = 'pods';
  public $pods;
  public $reportInterval;
  public $vmIsHealthy;
  public $vmStartupTime;

  public function setPods($pods)
  {
    $this->pods = $pods;
  }
  public function getPods()
  {
    return $this->pods;
  }
  public function setReportInterval($reportInterval)
  {
    $this->reportInterval = $reportInterval;
  }
  public function getReportInterval()
  {
    return $this->reportInterval;
  }
  public function setVmIsHealthy($vmIsHealthy)
  {
    $this->vmIsHealthy = $vmIsHealthy;
  }
  public function getVmIsHealthy()
  {
    return $this->vmIsHealthy;
  }
  public function setVmStartupTime($vmStartupTime)
  {
    $this->vmStartupTime = $vmStartupTime;
  }
  public function getVmStartupTime()
  {
    return $this->vmStartupTime;
  }
}
