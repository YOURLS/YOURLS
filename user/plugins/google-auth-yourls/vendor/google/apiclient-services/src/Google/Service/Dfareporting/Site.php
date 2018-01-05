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

class Google_Service_Dfareporting_Site extends Google_Collection
{
  protected $collection_key = 'siteContacts';
  public $accountId;
  public $approved;
  public $directorySiteId;
  protected $directorySiteIdDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $directorySiteIdDimensionValueDataType = '';
  public $id;
  protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $idDimensionValueDataType = '';
  public $keyName;
  public $kind;
  public $name;
  protected $siteContactsType = 'Google_Service_Dfareporting_SiteContact';
  protected $siteContactsDataType = 'array';
  protected $siteSettingsType = 'Google_Service_Dfareporting_SiteSettings';
  protected $siteSettingsDataType = '';
  public $subaccountId;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setApproved($approved)
  {
    $this->approved = $approved;
  }
  public function getApproved()
  {
    return $this->approved;
  }
  public function setDirectorySiteId($directorySiteId)
  {
    $this->directorySiteId = $directorySiteId;
  }
  public function getDirectorySiteId()
  {
    return $this->directorySiteId;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setDirectorySiteIdDimensionValue(Google_Service_Dfareporting_DimensionValue $directorySiteIdDimensionValue)
  {
    $this->directorySiteIdDimensionValue = $directorySiteIdDimensionValue;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getDirectorySiteIdDimensionValue()
  {
    return $this->directorySiteIdDimensionValue;
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
  public function setKeyName($keyName)
  {
    $this->keyName = $keyName;
  }
  public function getKeyName()
  {
    return $this->keyName;
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
  /**
   * @param Google_Service_Dfareporting_SiteContact
   */
  public function setSiteContacts($siteContacts)
  {
    $this->siteContacts = $siteContacts;
  }
  /**
   * @return Google_Service_Dfareporting_SiteContact
   */
  public function getSiteContacts()
  {
    return $this->siteContacts;
  }
  /**
   * @param Google_Service_Dfareporting_SiteSettings
   */
  public function setSiteSettings(Google_Service_Dfareporting_SiteSettings $siteSettings)
  {
    $this->siteSettings = $siteSettings;
  }
  /**
   * @return Google_Service_Dfareporting_SiteSettings
   */
  public function getSiteSettings()
  {
    return $this->siteSettings;
  }
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
}
