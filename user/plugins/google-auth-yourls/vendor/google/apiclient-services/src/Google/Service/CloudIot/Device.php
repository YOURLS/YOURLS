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

class Google_Service_CloudIot_Device extends Google_Collection
{
  protected $collection_key = 'credentials';
  public $blocked;
  protected $configType = 'Google_Service_CloudIot_DeviceConfig';
  protected $configDataType = '';
  protected $credentialsType = 'Google_Service_CloudIot_DeviceCredential';
  protected $credentialsDataType = 'array';
  public $id;
  public $lastConfigAckTime;
  public $lastConfigSendTime;
  protected $lastErrorStatusType = 'Google_Service_CloudIot_Status';
  protected $lastErrorStatusDataType = '';
  public $lastErrorTime;
  public $lastEventTime;
  public $lastHeartbeatTime;
  public $lastStateTime;
  public $metadata;
  public $name;
  public $numId;
  protected $stateType = 'Google_Service_CloudIot_DeviceState';
  protected $stateDataType = '';

  public function setBlocked($blocked)
  {
    $this->blocked = $blocked;
  }
  public function getBlocked()
  {
    return $this->blocked;
  }
  /**
   * @param Google_Service_CloudIot_DeviceConfig
   */
  public function setConfig(Google_Service_CloudIot_DeviceConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return Google_Service_CloudIot_DeviceConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
  /**
   * @param Google_Service_CloudIot_DeviceCredential
   */
  public function setCredentials($credentials)
  {
    $this->credentials = $credentials;
  }
  /**
   * @return Google_Service_CloudIot_DeviceCredential
   */
  public function getCredentials()
  {
    return $this->credentials;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLastConfigAckTime($lastConfigAckTime)
  {
    $this->lastConfigAckTime = $lastConfigAckTime;
  }
  public function getLastConfigAckTime()
  {
    return $this->lastConfigAckTime;
  }
  public function setLastConfigSendTime($lastConfigSendTime)
  {
    $this->lastConfigSendTime = $lastConfigSendTime;
  }
  public function getLastConfigSendTime()
  {
    return $this->lastConfigSendTime;
  }
  /**
   * @param Google_Service_CloudIot_Status
   */
  public function setLastErrorStatus(Google_Service_CloudIot_Status $lastErrorStatus)
  {
    $this->lastErrorStatus = $lastErrorStatus;
  }
  /**
   * @return Google_Service_CloudIot_Status
   */
  public function getLastErrorStatus()
  {
    return $this->lastErrorStatus;
  }
  public function setLastErrorTime($lastErrorTime)
  {
    $this->lastErrorTime = $lastErrorTime;
  }
  public function getLastErrorTime()
  {
    return $this->lastErrorTime;
  }
  public function setLastEventTime($lastEventTime)
  {
    $this->lastEventTime = $lastEventTime;
  }
  public function getLastEventTime()
  {
    return $this->lastEventTime;
  }
  public function setLastHeartbeatTime($lastHeartbeatTime)
  {
    $this->lastHeartbeatTime = $lastHeartbeatTime;
  }
  public function getLastHeartbeatTime()
  {
    return $this->lastHeartbeatTime;
  }
  public function setLastStateTime($lastStateTime)
  {
    $this->lastStateTime = $lastStateTime;
  }
  public function getLastStateTime()
  {
    return $this->lastStateTime;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNumId($numId)
  {
    $this->numId = $numId;
  }
  public function getNumId()
  {
    return $this->numId;
  }
  /**
   * @param Google_Service_CloudIot_DeviceState
   */
  public function setState(Google_Service_CloudIot_DeviceState $state)
  {
    $this->state = $state;
  }
  /**
   * @return Google_Service_CloudIot_DeviceState
   */
  public function getState()
  {
    return $this->state;
  }
}
