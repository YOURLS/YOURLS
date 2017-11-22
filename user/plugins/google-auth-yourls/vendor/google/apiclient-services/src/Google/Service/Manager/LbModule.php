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

class Google_Service_Manager_LbModule extends Google_Collection
{
  protected $collection_key = 'targetModules';
  public $description;
  public $healthChecks;
  public $ipAddress;
  public $ipProtocol;
  public $portRange;
  public $sessionAffinity;
  public $targetModules;

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setHealthChecks($healthChecks)
  {
    $this->healthChecks = $healthChecks;
  }
  public function getHealthChecks()
  {
    return $this->healthChecks;
  }
  public function setIpAddress($ipAddress)
  {
    $this->ipAddress = $ipAddress;
  }
  public function getIpAddress()
  {
    return $this->ipAddress;
  }
  public function setIpProtocol($ipProtocol)
  {
    $this->ipProtocol = $ipProtocol;
  }
  public function getIpProtocol()
  {
    return $this->ipProtocol;
  }
  public function setPortRange($portRange)
  {
    $this->portRange = $portRange;
  }
  public function getPortRange()
  {
    return $this->portRange;
  }
  public function setSessionAffinity($sessionAffinity)
  {
    $this->sessionAffinity = $sessionAffinity;
  }
  public function getSessionAffinity()
  {
    return $this->sessionAffinity;
  }
  public function setTargetModules($targetModules)
  {
    $this->targetModules = $targetModules;
  }
  public function getTargetModules()
  {
    return $this->targetModules;
  }
}
