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

class Google_Service_Appengine_HealthCheck extends Google_Model
{
  public $checkInterval;
  public $disableHealthCheck;
  public $healthyThreshold;
  public $host;
  public $restartThreshold;
  public $timeout;
  public $unhealthyThreshold;

  public function setCheckInterval($checkInterval)
  {
    $this->checkInterval = $checkInterval;
  }
  public function getCheckInterval()
  {
    return $this->checkInterval;
  }
  public function setDisableHealthCheck($disableHealthCheck)
  {
    $this->disableHealthCheck = $disableHealthCheck;
  }
  public function getDisableHealthCheck()
  {
    return $this->disableHealthCheck;
  }
  public function setHealthyThreshold($healthyThreshold)
  {
    $this->healthyThreshold = $healthyThreshold;
  }
  public function getHealthyThreshold()
  {
    return $this->healthyThreshold;
  }
  public function setHost($host)
  {
    $this->host = $host;
  }
  public function getHost()
  {
    return $this->host;
  }
  public function setRestartThreshold($restartThreshold)
  {
    $this->restartThreshold = $restartThreshold;
  }
  public function getRestartThreshold()
  {
    return $this->restartThreshold;
  }
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  public function getTimeout()
  {
    return $this->timeout;
  }
  public function setUnhealthyThreshold($unhealthyThreshold)
  {
    $this->unhealthyThreshold = $unhealthyThreshold;
  }
  public function getUnhealthyThreshold()
  {
    return $this->unhealthyThreshold;
  }
}
