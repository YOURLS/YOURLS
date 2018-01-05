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

class Google_Service_Appengine_ReadinessCheck extends Google_Model
{
  public $appStartTimeout;
  public $checkInterval;
  public $failureThreshold;
  public $host;
  public $path;
  public $successThreshold;
  public $timeout;

  public function setAppStartTimeout($appStartTimeout)
  {
    $this->appStartTimeout = $appStartTimeout;
  }
  public function getAppStartTimeout()
  {
    return $this->appStartTimeout;
  }
  public function setCheckInterval($checkInterval)
  {
    $this->checkInterval = $checkInterval;
  }
  public function getCheckInterval()
  {
    return $this->checkInterval;
  }
  public function setFailureThreshold($failureThreshold)
  {
    $this->failureThreshold = $failureThreshold;
  }
  public function getFailureThreshold()
  {
    return $this->failureThreshold;
  }
  public function setHost($host)
  {
    $this->host = $host;
  }
  public function getHost()
  {
    return $this->host;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  public function setSuccessThreshold($successThreshold)
  {
    $this->successThreshold = $successThreshold;
  }
  public function getSuccessThreshold()
  {
    return $this->successThreshold;
  }
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  public function getTimeout()
  {
    return $this->timeout;
  }
}
