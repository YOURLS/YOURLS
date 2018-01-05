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

class Google_Service_Books_VolumeSaleInfo extends Google_Collection
{
  protected $collection_key = 'offers';
  public $buyLink;
  public $country;
  public $isEbook;
  protected $listPriceType = 'Google_Service_Books_VolumeSaleInfoListPrice';
  protected $listPriceDataType = '';
  protected $offersType = 'Google_Service_Books_VolumeSaleInfoOffers';
  protected $offersDataType = 'array';
  public $onSaleDate;
  protected $retailPriceType = 'Google_Service_Books_VolumeSaleInfoRetailPrice';
  protected $retailPriceDataType = '';
  public $saleability;

  public function setBuyLink($buyLink)
  {
    $this->buyLink = $buyLink;
  }
  public function getBuyLink()
  {
    return $this->buyLink;
  }
  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function setIsEbook($isEbook)
  {
    $this->isEbook = $isEbook;
  }
  public function getIsEbook()
  {
    return $this->isEbook;
  }
  /**
   * @param Google_Service_Books_VolumeSaleInfoListPrice
   */
  public function setListPrice(Google_Service_Books_VolumeSaleInfoListPrice $listPrice)
  {
    $this->listPrice = $listPrice;
  }
  /**
   * @return Google_Service_Books_VolumeSaleInfoListPrice
   */
  public function getListPrice()
  {
    return $this->listPrice;
  }
  /**
   * @param Google_Service_Books_VolumeSaleInfoOffers
   */
  public function setOffers($offers)
  {
    $this->offers = $offers;
  }
  /**
   * @return Google_Service_Books_VolumeSaleInfoOffers
   */
  public function getOffers()
  {
    return $this->offers;
  }
  public function setOnSaleDate($onSaleDate)
  {
    $this->onSaleDate = $onSaleDate;
  }
  public function getOnSaleDate()
  {
    return $this->onSaleDate;
  }
  /**
   * @param Google_Service_Books_VolumeSaleInfoRetailPrice
   */
  public function setRetailPrice(Google_Service_Books_VolumeSaleInfoRetailPrice $retailPrice)
  {
    $this->retailPrice = $retailPrice;
  }
  /**
   * @return Google_Service_Books_VolumeSaleInfoRetailPrice
   */
  public function getRetailPrice()
  {
    return $this->retailPrice;
  }
  public function setSaleability($saleability)
  {
    $this->saleability = $saleability;
  }
  public function getSaleability()
  {
    return $this->saleability;
  }
}
