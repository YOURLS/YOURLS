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

class Google_Service_Dfareporting_DirectorySite extends Google_Collection
{
  protected $collection_key = 'interstitialTagFormats';
  public $active;
  protected $contactAssignmentsType = 'Google_Service_Dfareporting_DirectorySiteContactAssignment';
  protected $contactAssignmentsDataType = 'array';
  public $countryId;
  public $currencyId;
  public $description;
  public $id;
  protected $idDimensionValueType = 'Google_Service_Dfareporting_DimensionValue';
  protected $idDimensionValueDataType = '';
  public $inpageTagFormats;
  public $interstitialTagFormats;
  public $kind;
  public $name;
  public $parentId;
  protected $settingsType = 'Google_Service_Dfareporting_DirectorySiteSettings';
  protected $settingsDataType = '';
  public $url;

  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  /**
   * @param Google_Service_Dfareporting_DirectorySiteContactAssignment
   */
  public function setContactAssignments($contactAssignments)
  {
    $this->contactAssignments = $contactAssignments;
  }
  /**
   * @return Google_Service_Dfareporting_DirectorySiteContactAssignment
   */
  public function getContactAssignments()
  {
    return $this->contactAssignments;
  }
  public function setCountryId($countryId)
  {
    $this->countryId = $countryId;
  }
  public function getCountryId()
  {
    return $this->countryId;
  }
  public function setCurrencyId($currencyId)
  {
    $this->currencyId = $currencyId;
  }
  public function getCurrencyId()
  {
    return $this->currencyId;
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
  public function setInpageTagFormats($inpageTagFormats)
  {
    $this->inpageTagFormats = $inpageTagFormats;
  }
  public function getInpageTagFormats()
  {
    return $this->inpageTagFormats;
  }
  public function setInterstitialTagFormats($interstitialTagFormats)
  {
    $this->interstitialTagFormats = $interstitialTagFormats;
  }
  public function getInterstitialTagFormats()
  {
    return $this->interstitialTagFormats;
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
  public function setParentId($parentId)
  {
    $this->parentId = $parentId;
  }
  public function getParentId()
  {
    return $this->parentId;
  }
  /**
   * @param Google_Service_Dfareporting_DirectorySiteSettings
   */
  public function setSettings(Google_Service_Dfareporting_DirectorySiteSettings $settings)
  {
    $this->settings = $settings;
  }
  /**
   * @return Google_Service_Dfareporting_DirectorySiteSettings
   */
  public function getSettings()
  {
    return $this->settings;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}
