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

class Google_Service_Devprojects_AuthSection extends Google_Collection
{
  protected $collection_key = 'termsOfServiceUrl';
  public $atMaximumClients;
  protected $clientType = 'Google_Service_Devprojects_Client';
  protected $clientDataType = 'array';
  public $displayName;
  public $homePageUrl;
  public $iconUrl;
  public $kind;
  protected $plusPageInfoType = 'Google_Service_Devprojects_PlusPageInfo';
  protected $plusPageInfoDataType = '';
  public $plusPageObfuscatedId;
  public $privacyPolicyUrl;
  public $supportEmail;
  public $termsOfServiceUrl;

  public function setAtMaximumClients($atMaximumClients)
  {
    $this->atMaximumClients = $atMaximumClients;
  }
  public function getAtMaximumClients()
  {
    return $this->atMaximumClients;
  }
  public function setClient($client)
  {
    $this->client = $client;
  }
  public function getClient()
  {
    return $this->client;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setHomePageUrl($homePageUrl)
  {
    $this->homePageUrl = $homePageUrl;
  }
  public function getHomePageUrl()
  {
    return $this->homePageUrl;
  }
  public function setIconUrl($iconUrl)
  {
    $this->iconUrl = $iconUrl;
  }
  public function getIconUrl()
  {
    return $this->iconUrl;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPlusPageInfo(Google_Service_Devprojects_PlusPageInfo $plusPageInfo)
  {
    $this->plusPageInfo = $plusPageInfo;
  }
  public function getPlusPageInfo()
  {
    return $this->plusPageInfo;
  }
  public function setPlusPageObfuscatedId($plusPageObfuscatedId)
  {
    $this->plusPageObfuscatedId = $plusPageObfuscatedId;
  }
  public function getPlusPageObfuscatedId()
  {
    return $this->plusPageObfuscatedId;
  }
  public function setPrivacyPolicyUrl($privacyPolicyUrl)
  {
    $this->privacyPolicyUrl = $privacyPolicyUrl;
  }
  public function getPrivacyPolicyUrl()
  {
    return $this->privacyPolicyUrl;
  }
  public function setSupportEmail($supportEmail)
  {
    $this->supportEmail = $supportEmail;
  }
  public function getSupportEmail()
  {
    return $this->supportEmail;
  }
  public function setTermsOfServiceUrl($termsOfServiceUrl)
  {
    $this->termsOfServiceUrl = $termsOfServiceUrl;
  }
  public function getTermsOfServiceUrl()
  {
    return $this->termsOfServiceUrl;
  }
}
