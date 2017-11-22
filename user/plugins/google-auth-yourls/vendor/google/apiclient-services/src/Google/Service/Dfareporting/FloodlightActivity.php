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

class Google_Service_Dfareporting_FloodlightActivity extends Google_Collection
{
  protected $collection_key = 'userDefinedVariableTypes';
  public $accountId;
  public $advertiserId;
  protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $advertiserIdDimensionValueDataType = '';
  public $cacheBustingType;
  public $countingMethod;
  protected $defaultTagsType = 'Google_Service_Dfareporting_FloodlightActivityDynamicTag';
  protected $defaultTagsDataType = 'array';
  public $expectedUrl;
  public $floodlightActivityGroupId;
  public $floodlightActivityGroupName;
  public $floodlightActivityGroupTagString;
  public $floodlightActivityGroupType;
  public $floodlightConfigurationId;
  protected $floodlightConfigurationIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $floodlightConfigurationIdDimensionValueDataType = '';
  public $floodlightTagType;
  public $hidden;
  public $id;
  protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $idDimensionValueDataType = '';
  public $kind;
  public $name;
  public $notes;
  protected $publisherTagsType = 'Google_Service_Dfareporting_FloodlightActivityPublisherDynamicTag';
  protected $publisherTagsDataType = 'array';
  public $secure;
  public $sslCompliant;
  public $sslRequired;
  public $subaccountId;
  public $tagFormat;
  public $tagString;
  public $userDefinedVariableTypes;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setAdvertiserIdDimensionValue(Google_Service_Dfareporting_DimensionValue $advertiserIdDimensionValue)
  {
    $this->advertiserIdDimensionValue = $advertiserIdDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getAdvertiserIdDimensionValue()
  {
    return $this->advertiserIdDimensionValue;
  }
  public function setCacheBustingType($cacheBustingType)
  {
    $this->cacheBustingType = $cacheBustingType;
  }
  public function getCacheBustingType()
  {
    return $this->cacheBustingType;
  }
  public function setCountingMethod($countingMethod)
  {
    $this->countingMethod = $countingMethod;
  }
  public function getCountingMethod()
  {
    return $this->countingMethod;
  }
  /**
   * @param Google_Service_Dfareporting_FloodlightActivityDynamicTag
   */
  public function setDefaultTags($defaultTags)
  {
    $this->defaultTags = $defaultTags;
  }
  /**
   * @return Google_Service_Dfareporting_FloodlightActivityDynamicTag
   */
  public function getDefaultTags()
  {
    return $this->defaultTags;
  }
  public function setExpectedUrl($expectedUrl)
  {
    $this->expectedUrl = $expectedUrl;
  }
  public function getExpectedUrl()
  {
    return $this->expectedUrl;
  }
  public function setFloodlightActivityGroupId($floodlightActivityGroupId)
  {
    $this->floodlightActivityGroupId = $floodlightActivityGroupId;
  }
  public function getFloodlightActivityGroupId()
  {
    return $this->floodlightActivityGroupId;
  }
  public function setFloodlightActivityGroupName($floodlightActivityGroupName)
  {
    $this->floodlightActivityGroupName = $floodlightActivityGroupName;
  }
  public function getFloodlightActivityGroupName()
  {
    return $this->floodlightActivityGroupName;
  }
  public function setFloodlightActivityGroupTagString($floodlightActivityGroupTagString)
  {
    $this->floodlightActivityGroupTagString = $floodlightActivityGroupTagString;
  }
  public function getFloodlightActivityGroupTagString()
  {
    return $this->floodlightActivityGroupTagString;
  }
  public function setFloodlightActivityGroupType($floodlightActivityGroupType)
  {
    $this->floodlightActivityGroupType = $floodlightActivityGroupType;
  }
  public function getFloodlightActivityGroupType()
  {
    return $this->floodlightActivityGroupType;
  }
  public function setFloodlightConfigurationId($floodlightConfigurationId)
  {
    $this->floodlightConfigurationId = $floodlightConfigurationId;
  }
  public function getFloodlightConfigurationId()
  {
    return $this->floodlightConfigurationId;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setFloodlightConfigurationIdDimensionValue(Google_Service_Dfareporting_DimensionValue $floodlightConfigurationIdDimensionValue)
  {
    $this->floodlightConfigurationIdDimensionValue = $floodlightConfigurationIdDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getFloodlightConfigurationIdDimensionValue()
  {
    return $this->floodlightConfigurationIdDimensionValue;
  }
  public function setFloodlightTagType($floodlightTagType)
  {
    $this->floodlightTagType = $floodlightTagType;
  }
  public function getFloodlightTagType()
  {
    return $this->floodlightTagType;
  }
  public function setHidden($hidden)
  {
    $this->hidden = $hidden;
  }
  public function getHidden()
  {
    return $this->hidden;
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
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setIdDimensionValue(Google_Service_Dfareporting_DimensionValue $idDimensionValue)
  {
    $this->idDimensionValue = $idDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getIdDimensionValue()
  {
    return $this->idDimensionValue;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  public function getNotes()
  {
    return $this->notes;
  }
  /**
   * @param Google_Service_Dfareporting_FloodlightActivityPublisherDynamicTag
   */
  public function setPublisherTags($publisherTags)
  {
    $this->publisherTags = $publisherTags;
  }
  /**
   * @return Google_Service_Dfareporting_FloodlightActivityPublisherDynamicTag
   */
  public function getPublisherTags()
  {
    return $this->publisherTags;
  }
  public function setSecure($secure)
  {
    $this->secure = $secure;
  }
  public function getSecure()
  {
    return $this->secure;
  }
  public function setSslCompliant($sslCompliant)
  {
    $this->sslCompliant = $sslCompliant;
  }
  public function getSslCompliant()
  {
    return $this->sslCompliant;
  }
  public function setSslRequired($sslRequired)
  {
    $this->sslRequired = $sslRequired;
  }
  public function getSslRequired()
  {
    return $this->sslRequired;
  }
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  public function setTagFormat($tagFormat)
  {
    $this->tagFormat = $tagFormat;
  }
  public function getTagFormat()
  {
    return $this->tagFormat;
  }
  public function setTagString($tagString)
  {
    $this->tagString = $tagString;
  }
  public function getTagString()
  {
    return $this->tagString;
  }
  public function setUserDefinedVariableTypes($userDefinedVariableTypes)
  {
    $this->userDefinedVariableTypes = $userDefinedVariableTypes;
  }
  public function getUserDefinedVariableTypes()
  {
    return $this->userDefinedVariableTypes;
  }
}
