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

class Google_Service_AndroidPublisher_InAppProduct extends Google_Model
{
  public $defaultLanguage;
  protected $defaultPriceType = 'Google_Service_AndroidPublisher_Price';
  protected $defaultPriceDataType = '';
  protected $listingsType = 'Google_Service_AndroidPublisher_InAppProductListing';
  protected $listingsDataType = 'map';
  public $packageName;
  protected $pricesType = 'Google_Service_AndroidPublisher_Price';
  protected $pricesDataType = 'map';
  public $purchaseType;
  protected $seasonType = 'Google_Service_AndroidPublisher_Season';
  protected $seasonDataType = '';
  public $sku;
  public $status;
  public $subscriptionPeriod;
  public $trialPeriod;

  public function setDefaultLanguage($defaultLanguage)
  {
    $this->defaultLanguage = $defaultLanguage;
  }
  public function getDefaultLanguage()
  {
    return $this->defaultLanguage;
  }
  /**
   * @param Google_Service_AndroidPublisher_Price
   */
  public function setDefaultPrice(Google_Service_AndroidPublisher_Price $defaultPrice)
  {
    $this->defaultPrice = $defaultPrice;
  }
  /**
   * @return Google_Service_AndroidPublisher_Price
   */
  public function getDefaultPrice()
  {
    return $this->defaultPrice;
  }
  /**
   * @param Google_Service_AndroidPublisher_InAppProductListing
   */
  public function setListings($listings)
  {
    $this->listings = $listings;
  }
  /**
   * @return Google_Service_AndroidPublisher_InAppProductListing
   */
  public function getListings()
  {
    return $this->listings;
  }
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  public function getPackageName()
  {
    return $this->packageName;
  }
  /**
   * @param Google_Service_AndroidPublisher_Price
   */
  public function setPrices($prices)
  {
    $this->prices = $prices;
  }
  /**
   * @return Google_Service_AndroidPublisher_Price
   */
  public function getPrices()
  {
    return $this->prices;
  }
  public function setPurchaseType($purchaseType)
  {
    $this->purchaseType = $purchaseType;
  }
  public function getPurchaseType()
  {
    return $this->purchaseType;
  }
  /**
   * @param Google_Service_AndroidPublisher_Season
   */
  public function setSeason(Google_Service_AndroidPublisher_Season $season)
  {
    $this->season = $season;
  }
  /**
   * @return Google_Service_AndroidPublisher_Season
   */
  public function getSeason()
  {
    return $this->season;
  }
  public function setSku($sku)
  {
    $this->sku = $sku;
  }
  public function getSku()
  {
    return $this->sku;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setSubscriptionPeriod($subscriptionPeriod)
  {
    $this->subscriptionPeriod = $subscriptionPeriod;
  }
  public function getSubscriptionPeriod()
  {
    return $this->subscriptionPeriod;
  }
  public function setTrialPeriod($trialPeriod)
  {
    $this->trialPeriod = $trialPeriod;
  }
  public function getTrialPeriod()
  {
    return $this->trialPeriod;
  }
}
