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

class Google_Service_Appengine_Instance extends Google_Model
{
  public $appEngineRelease;
  public $availability;
  public $averageLatency;
  public $errors;
  public $id;
  public $memoryUsage;
  public $name;
  public $qps;
  public $requests;
  public $startTime;
  public $vmDebugEnabled;
  public $vmId;
  public $vmIp;
  public $vmName;
  public $vmStatus;
  public $vmZoneName;

  public function setAppEngineRelease($appEngineRelease)
  {
    $this->appEngineRelease = $appEngineRelease;
  }
  public function getAppEngineRelease()
  {
    return $this->appEngineRelease;
  }
  public function setAvailability($availability)
  {
    $this->availability = $availability;
  }
  public function getAvailability()
  {
    return $this->availability;
  }
  public function setAverageLatency($averageLatency)
  {
    $this->averageLatency = $averageLatency;
  }
  public function getAverageLatency()
  {
    return $this->averageLatency;
  }
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  public function getErrors()
  {
    return $this->errors;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setMemoryUsage($memoryUsage)
  {
    $this->memoryUsage = $memoryUsage;
  }
  public function getMemoryUsage()
  {
    return $this->memoryUsage;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setQps($qps)
  {
    $this->qps = $qps;
  }
  public function getQps()
  {
    return $this->qps;
  }
  public function setRequests($requests)
  {
    $this->requests = $requests;
  }
  public function getRequests()
  {
    return $this->requests;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setVmDebugEnabled($vmDebugEnabled)
  {
    $this->vmDebugEnabled = $vmDebugEnabled;
  }
  public function getVmDebugEnabled()
  {
    return $this->vmDebugEnabled;
  }
  public function setVmId($vmId)
  {
    $this->vmId = $vmId;
  }
  public function getVmId()
  {
    return $this->vmId;
  }
  public function setVmIp($vmIp)
  {
    $this->vmIp = $vmIp;
  }
  public function getVmIp()
  {
    return $this->vmIp;
  }
  public function setVmName($vmName)
  {
    $this->vmName = $vmName;
  }
  public function getVmName()
  {
    return $this->vmName;
  }
  public function setVmStatus($vmStatus)
  {
    $this->vmStatus = $vmStatus;
  }
  public function getVmStatus()
  {
    return $this->vmStatus;
  }
  public function setVmZoneName($vmZoneName)
  {
    $this->vmZoneName = $vmZoneName;
  }
  public function getVmZoneName()
  {
    return $this->vmZoneName;
  }
}
