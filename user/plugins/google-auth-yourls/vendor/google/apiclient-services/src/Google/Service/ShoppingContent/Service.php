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

class Google_Service_ShoppingContent_Service extends Google_Collection
{
  protected $collection_key = 'rateGroups';
  public $active;
  public $currency;
  public $deliveryCountry;
  protected $deliveryTimeType = 'Google_Service_ShoppingContent_DeliveryTime';
  protected $deliveryTimeDataType = '';
  protected $minimumOrderValueType = 'Google_Service_ShoppingContent_Price';
  protected $minimumOrderValueDataType = '';
  public $name;
  protected $rateGroupsType = 'Google_Service_ShoppingContent_RateGroup';
  protected $rateGroupsDataType = 'array';

  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  public function setCurrency($currency)
  {
    $this->currency = $currency;
  }
  public function getCurrency()
  {
    return $this->currency;
  }
  public function setDeliveryCountry($deliveryCountry)
  {
    $this->deliveryCountry = $deliveryCountry;
  }
  public function getDeliveryCountry()
  {
    return $this->deliveryCountry;
  }
  /**
   * @param Google_Service_ShoppingContent_DeliveryTime
   */
  public function setDeliveryTime(Google_Service_ShoppingContent_DeliveryTime $deliveryTime)
  {
    $this->deliveryTime = $deliveryTime;
  }
  /**
   * @return Google_Service_ShoppingContent_DeliveryTime
   */
  public function getDeliveryTime()
  {
    return $this->deliveryTime;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setMinimumOrderValue(Google_Service_ShoppingContent_Price $minimumOrderValue)
  {
    $this->minimumOrderValue = $minimumOrderValue;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getMinimumOrderValue()
  {
    return $this->minimumOrderValue;
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
   * @param Google_Service_ShoppingContent_RateGroup
   */
  public function setRateGroups($rateGroups)
  {
    $this->rateGroups = $rateGroups;
  }
  /**
   * @return Google_Service_ShoppingContent_RateGroup
   */
  public function getRateGroups()
  {
    return $this->rateGroups;
  }
}
