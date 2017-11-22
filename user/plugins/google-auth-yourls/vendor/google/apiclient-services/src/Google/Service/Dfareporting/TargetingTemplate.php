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

class Google_Service_Dfareporting_TargetingTemplate extends Google_Model
{
  public $accountId;
  public $advertiserId;
  protected $advertiserIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $advertiserIdDimensionValueDataType = '';
  protected $dayPartTargetingType = 'Google_Service_Dfareporting_DayPartTargeting';
  protected $dayPartTargetingDataType = '';
  protected $geoTargetingType = 'Google_Service_Dfareporting_GeoTargeting';
  protected $geoTargetingDataType = '';
  public $id;
  protected $keyValueTargetingExpressionType = 'Google_Service_Dfareporting_KeyValueTargetingExpression';
  protected $keyValueTargetingExpressionDataType = '';
  public $kind;
  protected $languageTargetingType = 'Google_Service_Dfareporting_LanguageTargeting';
  protected $languageTargetingDataType = '';
  protected $listTargetingExpressionType = 'Google_Service_Dfareporting_ListTargetingExpression';
  protected $listTargetingExpressionDataType = '';
  public $name;
  public $subaccountId;
  protected $technologyTargetingType = 'Google_Service_Dfareporting_TechnologyTargeting';
  protected $technologyTargetingDataType = '';

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
  /**
   * @param Google_Service_Dfareporting_DayPartTargeting
   */
  public function setDayPartTargeting(Google_Service_Dfareporting_DayPartTargeting $dayPartTargeting)
  {
    $this->dayPartTargeting = $dayPartTargeting;
  }
  /**
   * @return Google_Service_Dfareporting_DayPartTargeting
   */
  public function getDayPartTargeting()
  {
    return $this->dayPartTargeting;
  }
  /**
   * @param Google_Service_Dfareporting_GeoTargeting
   */
  public function setGeoTargeting(Google_Service_Dfareporting_GeoTargeting $geoTargeting)
  {
    $this->geoTargeting = $geoTargeting;
  }
  /**
   * @return Google_Service_Dfareporting_GeoTargeting
   */
  public function getGeoTargeting()
  {
    return $this->geoTargeting;
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
   * @param Google_Service_Dfareporting_KeyValueTargetingExpression
   */
  public function setKeyValueTargetingExpression(Google_Service_Dfareporting_KeyValueTargetingExpression $keyValueTargetingExpression)
  {
    $this->keyValueTargetingExpression = $keyValueTargetingExpression;
  }
  /**
   * @return Google_Service_Dfareporting_KeyValueTargetingExpression
   */
  public function getKeyValueTargetingExpression()
  {
    return $this->keyValueTargetingExpression;
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
   * @param Google_Service_Dfareporting_LanguageTargeting
   */
  public function setLanguageTargeting(Google_Service_Dfareporting_LanguageTargeting $languageTargeting)
  {
    $this->languageTargeting = $languageTargeting;
  }
  /**
   * @return Google_Service_Dfareporting_LanguageTargeting
   */
  public function getLanguageTargeting()
  {
    return $this->languageTargeting;
  }
  /**
   * @param Google_Service_Dfareporting_ListTargetingExpression
   */
  public function setListTargetingExpression(Google_Service_Dfareporting_ListTargetingExpression $listTargetingExpression)
  {
    $this->listTargetingExpression = $listTargetingExpression;
  }
  /**
   * @return Google_Service_Dfareporting_ListTargetingExpression
   */
  public function getListTargetingExpression()
  {
    return $this->listTargetingExpression;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  /**
   * @param Google_Service_Dfareporting_TechnologyTargeting
   */
  public function setTechnologyTargeting(Google_Service_Dfareporting_TechnologyTargeting $technologyTargeting)
  {
    $this->technologyTargeting = $technologyTargeting;
  }
  /**
   * @return Google_Service_Dfareporting_TechnologyTargeting
   */
  public function getTechnologyTargeting()
  {
    return $this->technologyTargeting;
  }
}
