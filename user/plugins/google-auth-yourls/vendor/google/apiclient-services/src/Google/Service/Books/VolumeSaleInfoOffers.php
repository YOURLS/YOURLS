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

class Google_Service_Books_VolumeSaleInfoOffers extends Google_Model
{
  public $finskyOfferType;
  public $giftable;
  protected $listPriceType = 'Google_Service_Books_VolumeSaleInfoOffersListPrice';
  protected $listPriceDataType = '';
  protected $rentalDurationType = 'Google_Service_Books_VolumeSaleInfoOffersRentalDuration';
  protected $rentalDurationDataType = '';
  protected $retailPriceType = 'Google_Service_Books_VolumeSaleInfoOffersRetailPrice';
  protected $retailPriceDataType = '';

  public function setFinskyOfferType($finskyOfferType)
  {
    $this->finskyOfferType = $finskyOfferType;
  }
  public function getFinskyOfferType()
  {
    return $this->finskyOfferType;
  }
  public function setGiftable($giftable)
  {
    $this->giftable = $giftable;
  }
  public function getGiftable()
  {
    return $this->giftable;
  }
  /**
   * @param Google_Service_Books_VolumeSaleInfoOffersListPrice
   */
  public function setListPrice(Google_Service_Books_VolumeSaleInfoOffersListPrice $listPrice)
  {
    $this->listPrice = $listPrice;
  }
  /**
   * @return Google_Service_Books_VolumeSaleInfoOffersListPrice
   */
  public function getListPrice()
  {
    return $this->listPrice;
  }
  /**
   * @param Google_Service_Books_VolumeSaleInfoOffersRentalDuration
   */
  public function setRentalDuration(Google_Service_Books_VolumeSaleInfoOffersRentalDuration $rentalDuration)
  {
    $this->rentalDuration = $rentalDuration;
  }
  /**
   * @return Google_Service_Books_VolumeSaleInfoOffersRentalDuration
   */
  public function getRentalDuration()
  {
    return $this->rentalDuration;
  }
  /**
   * @param Google_Service_Books_VolumeSaleInfoOffersRetailPrice
   */
  public function setRetailPrice(Google_Service_Books_VolumeSaleInfoOffersRetailPrice $retailPrice)
  {
    $this->retailPrice = $retailPrice;
  }
  /**
   * @return Google_Service_Books_VolumeSaleInfoOffersRetailPrice
   */
  public function getRetailPrice()
  {
    return $this->retailPrice;
  }
}
