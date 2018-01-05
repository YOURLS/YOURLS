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

class Google_Service_CloudIot_DeviceRegistry extends Google_Collection
{
  protected $collection_key = 'eventNotificationConfigs';
  protected $credentialsType = 'Google_Service_CloudIot_RegistryCredential';
  protected $credentialsDataType = 'array';
  protected $eventNotificationConfigsType = 'Google_Service_CloudIot_EventNotificationConfig';
  protected $eventNotificationConfigsDataType = 'array';
  protected $httpConfigType = 'Google_Service_CloudIot_HttpConfig';
  protected $httpConfigDataType = '';
  public $id;
  protected $mqttConfigType = 'Google_Service_CloudIot_MqttConfig';
  protected $mqttConfigDataType = '';
  public $name;
  protected $stateNotificationConfigType = 'Google_Service_CloudIot_StateNotificationConfig';
  protected $stateNotificationConfigDataType = '';

  /**
   * @param Google_Service_CloudIot_RegistryCredential
   */
  public function setCredentials($credentials)
  {
    $this->credentials = $credentials;
  }
  /**
   * @return Google_Service_CloudIot_RegistryCredential
   */
  public function getCredentials()
  {
    return $this->credentials;
  }
  /**
   * @param Google_Service_CloudIot_EventNotificationConfig
   */
  public function setEventNotificationConfigs($eventNotificationConfigs)
  {
    $this->eventNotificationConfigs = $eventNotificationConfigs;
  }
  /**
   * @return Google_Service_CloudIot_EventNotificationConfig
   */
  public function getEventNotificationConfigs()
  {
    return $this->eventNotificationConfigs;
  }
  /**
   * @param Google_Service_CloudIot_HttpConfig
   */
  public function setHttpConfig(Google_Service_CloudIot_HttpConfig $httpConfig)
  {
    $this->httpConfig = $httpConfig;
  }
  /**
   * @return Google_Service_CloudIot_HttpConfig
   */
  public function getHttpConfig()
  {
    return $this->httpConfig;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_CloudIot_MqttConfig
   */
  public function setMqttConfig(Google_Service_CloudIot_MqttConfig $mqttConfig)
  {
    $this->mqttConfig = $mqttConfig;
  }
  /**
   * @return Google_Service_CloudIot_MqttConfig
   */
  public function getMqttConfig()
  {
    return $this->mqttConfig;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CloudIot_StateNotificationConfig
   */
  public function setStateNotificationConfig(Google_Service_CloudIot_StateNotificationConfig $stateNotificationConfig)
  {
    $this->stateNotificationConfig = $stateNotificationConfig;
  }
  /**
   * @return Google_Service_CloudIot_StateNotificationConfig
   */
  public function getStateNotificationConfig()
  {
    return $this->stateNotificationConfig;
  }
}
