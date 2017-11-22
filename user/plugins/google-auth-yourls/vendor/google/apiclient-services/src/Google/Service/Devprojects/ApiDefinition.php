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

class Google_Service_Devprojects_ApiDefinition extends Google_Collection
{
  protected $collection_key = 'serviceSubsetId';
  public $activationMessage;
  public $activationRequirement;
  public $apiPanelToken;
  protected $billableDailyLimitType = 'Google_Service_Devprojects_ApiLimitDefinition';
  protected $billableDailyLimitDataType = '';
  protected $bucketType = 'Google_Service_Devprojects_QuotaBucketDefinition';
  protected $bucketDataType = 'array';
  protected $concurrentLimitType = 'Google_Service_Devprojects_ApiLimitDefinition';
  protected $concurrentLimitDataType = '';
  protected $dailyLimitType = 'Google_Service_Devprojects_ApiLimitDefinition';
  protected $dailyLimitDataType = '';
  public $description;
  public $exampleUrl;
  public $kind;
  public $learnmoreUrl;
  public $name;
  public $pricingLink;
  public $requestQuotaUrl;
  public $requiresActivationToken;
  public $requiresOrganizationRegistration;
  public $serviceSubsetId;
  public $supportsBilling;
  public $token;
  public $variableTermQuotaDescription;
  public $visible;
  protected $visitorRateLimitType = 'Google_Service_Devprojects_ApiLimitDefinition';
  protected $visitorRateLimitDataType = '';

  public function setActivationMessage($activationMessage)
  {
    $this->activationMessage = $activationMessage;
  }
  public function getActivationMessage()
  {
    return $this->activationMessage;
  }
  public function setActivationRequirement($activationRequirement)
  {
    $this->activationRequirement = $activationRequirement;
  }
  public function getActivationRequirement()
  {
    return $this->activationRequirement;
  }
  public function setApiPanelToken($apiPanelToken)
  {
    $this->apiPanelToken = $apiPanelToken;
  }
  public function getApiPanelToken()
  {
    return $this->apiPanelToken;
  }
  public function setBillableDailyLimit(Google_Service_Devprojects_ApiLimitDefinition $billableDailyLimit)
  {
    $this->billableDailyLimit = $billableDailyLimit;
  }
  public function getBillableDailyLimit()
  {
    return $this->billableDailyLimit;
  }
  public function setBucket($bucket)
  {
    $this->bucket = $bucket;
  }
  public function getBucket()
  {
    return $this->bucket;
  }
  public function setConcurrentLimit(Google_Service_Devprojects_ApiLimitDefinition $concurrentLimit)
  {
    $this->concurrentLimit = $concurrentLimit;
  }
  public function getConcurrentLimit()
  {
    return $this->concurrentLimit;
  }
  public function setDailyLimit(Google_Service_Devprojects_ApiLimitDefinition $dailyLimit)
  {
    $this->dailyLimit = $dailyLimit;
  }
  public function getDailyLimit()
  {
    return $this->dailyLimit;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setExampleUrl($exampleUrl)
  {
    $this->exampleUrl = $exampleUrl;
  }
  public function getExampleUrl()
  {
    return $this->exampleUrl;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLearnmoreUrl($learnmoreUrl)
  {
    $this->learnmoreUrl = $learnmoreUrl;
  }
  public function getLearnmoreUrl()
  {
    return $this->learnmoreUrl;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPricingLink($pricingLink)
  {
    $this->pricingLink = $pricingLink;
  }
  public function getPricingLink()
  {
    return $this->pricingLink;
  }
  public function setRequestQuotaUrl($requestQuotaUrl)
  {
    $this->requestQuotaUrl = $requestQuotaUrl;
  }
  public function getRequestQuotaUrl()
  {
    return $this->requestQuotaUrl;
  }
  public function setRequiresActivationToken($requiresActivationToken)
  {
    $this->requiresActivationToken = $requiresActivationToken;
  }
  public function getRequiresActivationToken()
  {
    return $this->requiresActivationToken;
  }
  public function setRequiresOrganizationRegistration($requiresOrganizationRegistration)
  {
    $this->requiresOrganizationRegistration = $requiresOrganizationRegistration;
  }
  public function getRequiresOrganizationRegistration()
  {
    return $this->requiresOrganizationRegistration;
  }
  public function setServiceSubsetId($serviceSubsetId)
  {
    $this->serviceSubsetId = $serviceSubsetId;
  }
  public function getServiceSubsetId()
  {
    return $this->serviceSubsetId;
  }
  public function setSupportsBilling($supportsBilling)
  {
    $this->supportsBilling = $supportsBilling;
  }
  public function getSupportsBilling()
  {
    return $this->supportsBilling;
  }
  public function setToken($token)
  {
    $this->token = $token;
  }
  public function getToken()
  {
    return $this->token;
  }
  public function setVariableTermQuotaDescription($variableTermQuotaDescription)
  {
    $this->variableTermQuotaDescription = $variableTermQuotaDescription;
  }
  public function getVariableTermQuotaDescription()
  {
    return $this->variableTermQuotaDescription;
  }
  public function setVisible($visible)
  {
    $this->visible = $visible;
  }
  public function getVisible()
  {
    return $this->visible;
  }
  public function setVisitorRateLimit(Google_Service_Devprojects_ApiLimitDefinition $visitorRateLimit)
  {
    $this->visitorRateLimit = $visitorRateLimit;
  }
  public function getVisitorRateLimit()
  {
    return $this->visitorRateLimit;
  }
}
