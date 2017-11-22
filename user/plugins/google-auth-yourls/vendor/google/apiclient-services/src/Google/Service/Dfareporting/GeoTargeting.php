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

class Google_Service_Dfareporting_GeoTargeting extends Google_Collection
{
  protected $collection_key = 'regions';
  protected $citiesType = 'Google_Service_Dfareporting_City';
  protected $citiesDataType = 'array';
  protected $countriesType = 'Google_Service_Dfareporting_Country';
  protected $countriesDataType = 'array';
  public $excludeCountries;
  protected $metrosType = 'Google_Service_Dfareporting_Metro';
  protected $metrosDataType = 'array';
  protected $postalCodesType = 'Google_Service_Dfareporting_PostalCode';
  protected $postalCodesDataType = 'array';
  protected $regionsType = 'Google_Service_Dfareporting_Region';
  protected $regionsDataType = 'array';

  /**
   * @param Google_Service_Dfareporting_City
   */
  public function setCities($cities)
  {
    $this->cities = $cities;
  }
  /**
   * @return Google_Service_Dfareporting_City
   */
  public function getCities()
  {
    return $this->cities;
  }
  /**
   * @param Google_Service_Dfareporting_Country
   */
  public function setCountries($countries)
  {
    $this->countries = $countries;
  }
  /**
   * @return Google_Service_Dfareporting_Country
   */
  public function getCountries()
  {
    return $this->countries;
  }
  public function setExcludeCountries($excludeCountries)
  {
    $this->excludeCountries = $excludeCountries;
  }
  public function getExcludeCountries()
  {
    return $this->excludeCountries;
  }
  /**
   * @param Google_Service_Dfareporting_Metro
   */
  public function setMetros($metros)
  {
    $this->metros = $metros;
  }
  /**
   * @return Google_Service_Dfareporting_Metro
   */
  public function getMetros()
  {
    return $this->metros;
  }
  /**
   * @param Google_Service_Dfareporting_PostalCode
   */
  public function setPostalCodes($postalCodes)
  {
    $this->postalCodes = $postalCodes;
  }
  /**
   * @return Google_Service_Dfareporting_PostalCode
   */
  public function getPostalCodes()
  {
    return $this->postalCodes;
  }
  /**
   * @param Google_Service_Dfareporting_Region
   */
  public function setRegions($regions)
  {
    $this->regions = $regions;
  }
  /**
   * @return Google_Service_Dfareporting_Region
   */
  public function getRegions()
  {
    return $this->regions;
  }
}
