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

class Google_Service_Devprojects_ApiConsumer extends Google_Model
{
  protected $consumerInformationType = 'Google_Service_Devprojects_ConsumerInfo';
  protected $consumerInformationDataType = '';
  protected $idType = 'Google_Service_Devprojects_ApiConsumerId';
  protected $idDataType = '';
  public $kind;
  protected $producerConfigurationType = 'Google_Service_Devprojects_ProducerConfiguration';
  protected $producerConfigurationDataType = '';

  public function setConsumerInformation(Google_Service_Devprojects_ConsumerInfo $consumerInformation)
  {
    $this->consumerInformation = $consumerInformation;
  }
  public function getConsumerInformation()
  {
    return $this->consumerInformation;
  }
  public function setId(Google_Service_Devprojects_ApiConsumerId $id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setProducerConfiguration(Google_Service_Devprojects_ProducerConfiguration $producerConfiguration)
  {
    $this->producerConfiguration = $producerConfiguration;
  }
  public function getProducerConfiguration()
  {
    return $this->producerConfiguration;
  }
}
