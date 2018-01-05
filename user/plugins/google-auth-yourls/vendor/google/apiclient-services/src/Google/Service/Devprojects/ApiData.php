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

class Google_Service_Devprojects_ApiData extends Google_Model
{
  public $aliasedApiIdToken;
  protected $apiDefinitionType = 'Google_Service_Devprojects_ApiDefinition';
  protected $apiDefinitionDataType = '';
  public $apiIconUrl;
  protected $consumerConfigurationByProducerType = 'Google_Service_Devprojects_ProducerConfiguration';
  protected $consumerConfigurationByProducerDataType = '';
  public $kind;
  public $producedByListingProject;

  public function setAliasedApiIdToken($aliasedApiIdToken)
  {
    $this->aliasedApiIdToken = $aliasedApiIdToken;
  }
  public function getAliasedApiIdToken()
  {
    return $this->aliasedApiIdToken;
  }
  public function setApiDefinition(Google_Service_Devprojects_ApiDefinition $apiDefinition)
  {
    $this->apiDefinition = $apiDefinition;
  }
  public function getApiDefinition()
  {
    return $this->apiDefinition;
  }
  public function setApiIconUrl($apiIconUrl)
  {
    $this->apiIconUrl = $apiIconUrl;
  }
  public function getApiIconUrl()
  {
    return $this->apiIconUrl;
  }
  public function setConsumerConfigurationByProducer(Google_Service_Devprojects_ProducerConfiguration $consumerConfigurationByProducer)
  {
    $this->consumerConfigurationByProducer = $consumerConfigurationByProducer;
  }
  public function getConsumerConfigurationByProducer()
  {
    return $this->consumerConfigurationByProducer;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setProducedByListingProject($producedByListingProject)
  {
    $this->producedByListingProject = $producedByListingProject;
  }
  public function getProducedByListingProject()
  {
    return $this->producedByListingProject;
  }
}
