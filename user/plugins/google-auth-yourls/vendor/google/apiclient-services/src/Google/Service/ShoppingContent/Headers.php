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

class Google_Service_ShoppingContent_Headers extends Google_Collection
{
  protected $collection_key = 'weights';
  protected $locationsType = 'Google_Service_ShoppingContent_LocationIdSet';
  protected $locationsDataType = 'array';
  public $numberOfItems;
  public $postalCodeGroupNames;
  protected $pricesType = 'Google_Service_ShoppingContent_Price';
  protected $pricesDataType = 'array';
  protected $weightsType = 'Google_Service_ShoppingContent_Weight';
  protected $weightsDataType = 'array';

  /**
   * @param Google_Service_ShoppingContent_LocationIdSet
   */
  public function setLocations($locations)
  {
    $this->locations = $locations;
  }
  /**
   * @return Google_Service_ShoppingContent_LocationIdSet
   */
  public function getLocations()
  {
    return $this->locations;
  }
  public function setNumberOfItems($numberOfItems)
  {
    $this->numberOfItems = $numberOfItems;
  }
  public function getNumberOfItems()
  {
    return $this->numberOfItems;
  }
  public function setPostalCodeGroupNames($postalCodeGroupNames)
  {
    $this->postalCodeGroupNames = $postalCodeGroupNames;
  }
  public function getPostalCodeGroupNames()
  {
    return $this->postalCodeGroupNames;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setPrices($prices)
  {
    $this->prices = $prices;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getPrices()
  {
    return $this->prices;
  }
  /**
   * @param Google_Service_ShoppingContent_Weight
   */
  public function setWeights($weights)
  {
    $this->weights = $weights;
  }
  /**
   * @return Google_Service_ShoppingContent_Weight
   */
  public function getWeights()
  {
    return $this->weights;
  }
}
