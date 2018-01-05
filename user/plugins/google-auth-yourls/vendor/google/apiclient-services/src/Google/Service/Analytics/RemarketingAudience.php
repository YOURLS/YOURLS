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

class Google_Service_Analytics_RemarketingAudience extends Google_Collection
{
  protected $collection_key = 'linkedViews';
  public $accountId;
  protected $audienceDefinitionType = 'Google_Service_Analytics_RemarketingAudienceAudienceDefinition';
  protected $audienceDefinitionDataType = '';
  public $audienceType;
  public $created;
  public $description;
  public $id;
  public $internalWebPropertyId;
  public $kind;
  protected $linkedAdAccountsType = 'Google_Service_Analytics_LinkedForeignAccount';
  protected $linkedAdAccountsDataType = 'array';
  public $linkedViews;
  public $name;
  protected $stateBasedAudienceDefinitionType = 'Google_Service_Analytics_RemarketingAudienceStateBasedAudienceDefinition';
  protected $stateBasedAudienceDefinitionDataType = '';
  public $updated;
  public $webPropertyId;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param Google_Service_Analytics_RemarketingAudienceAudienceDefinition
   */
  public function setAudienceDefinition(Google_Service_Analytics_RemarketingAudienceAudienceDefinition $audienceDefinition)
  {
    $this->audienceDefinition = $audienceDefinition;
  }
  /**
   * @return Google_Service_Analytics_RemarketingAudienceAudienceDefinition
   */
  public function getAudienceDefinition()
  {
    return $this->audienceDefinition;
  }
  public function setAudienceType($audienceType)
  {
    $this->audienceType = $audienceType;
  }
  public function getAudienceType()
  {
    return $this->audienceType;
  }
  public function setCreated($created)
  {
    $this->created = $created;
  }
  public function getCreated()
  {
    return $this->created;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInternalWebPropertyId($internalWebPropertyId)
  {
    $this->internalWebPropertyId = $internalWebPropertyId;
  }
  public function getInternalWebPropertyId()
  {
    return $this->internalWebPropertyId;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Google_Service_Analytics_LinkedForeignAccount
   */
  public function setLinkedAdAccounts($linkedAdAccounts)
  {
    $this->linkedAdAccounts = $linkedAdAccounts;
  }
  /**
   * @return Google_Service_Analytics_LinkedForeignAccount
   */
  public function getLinkedAdAccounts()
  {
    return $this->linkedAdAccounts;
  }
  public function setLinkedViews($linkedViews)
  {
    $this->linkedViews = $linkedViews;
  }
  public function getLinkedViews()
  {
    return $this->linkedViews;
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
   * @param Google_Service_Analytics_RemarketingAudienceStateBasedAudienceDefinition
   */
  public function setStateBasedAudienceDefinition(Google_Service_Analytics_RemarketingAudienceStateBasedAudienceDefinition $stateBasedAudienceDefinition)
  {
    $this->stateBasedAudienceDefinition = $stateBasedAudienceDefinition;
  }
  /**
   * @return Google_Service_Analytics_RemarketingAudienceStateBasedAudienceDefinition
   */
  public function getStateBasedAudienceDefinition()
  {
    return $this->stateBasedAudienceDefinition;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  public function setWebPropertyId($webPropertyId)
  {
    $this->webPropertyId = $webPropertyId;
  }
  public function getWebPropertyId()
  {
    return $this->webPropertyId;
  }
}
