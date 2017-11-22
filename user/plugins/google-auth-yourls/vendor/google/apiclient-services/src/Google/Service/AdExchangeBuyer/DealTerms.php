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

class Google_Service_AdExchangeBuyer_DealTerms extends Google_Model
{
  public $brandingType;
  public $crossListedExternalDealIdType;
  public $description;
  protected $estimatedGrossSpendType = 'Google_Service_AdExchangeBuyer_Price';
  protected $estimatedGrossSpendDataType = '';
  public $estimatedImpressionsPerDay;
  protected $guaranteedFixedPriceTermsType = 'Google_Service_AdExchangeBuyer_DealTermsGuaranteedFixedPriceTerms';
  protected $guaranteedFixedPriceTermsDataType = '';
  protected $nonGuaranteedAuctionTermsType = 'Google_Service_AdExchangeBuyer_DealTermsNonGuaranteedAuctionTerms';
  protected $nonGuaranteedAuctionTermsDataType = '';
  protected $nonGuaranteedFixedPriceTermsType = 'Google_Service_AdExchangeBuyer_DealTermsNonGuaranteedFixedPriceTerms';
  protected $nonGuaranteedFixedPriceTermsDataType = '';
  protected $rubiconNonGuaranteedTermsType = 'Google_Service_AdExchangeBuyer_DealTermsRubiconNonGuaranteedTerms';
  protected $rubiconNonGuaranteedTermsDataType = '';
  public $sellerTimeZone;

  public function setBrandingType($brandingType)
  {
    $this->brandingType = $brandingType;
  }
  public function getBrandingType()
  {
    return $this->brandingType;
  }
  public function setCrossListedExternalDealIdType($crossListedExternalDealIdType)
  {
    $this->crossListedExternalDealIdType = $crossListedExternalDealIdType;
  }
  public function getCrossListedExternalDealIdType()
  {
    return $this->crossListedExternalDealIdType;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_Price
   */
  public function setEstimatedGrossSpend(Google_Service_AdExchangeBuyer_Price $estimatedGrossSpend)
  {
    $this->estimatedGrossSpend = $estimatedGrossSpend;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_Price
   */
  public function getEstimatedGrossSpend()
  {
    return $this->estimatedGrossSpend;
  }
  public function setEstimatedImpressionsPerDay($estimatedImpressionsPerDay)
  {
    $this->estimatedImpressionsPerDay = $estimatedImpressionsPerDay;
  }
  public function getEstimatedImpressionsPerDay()
  {
    return $this->estimatedImpressionsPerDay;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_DealTermsGuaranteedFixedPriceTerms
   */
  public function setGuaranteedFixedPriceTerms(Google_Service_AdExchangeBuyer_DealTermsGuaranteedFixedPriceTerms $guaranteedFixedPriceTerms)
  {
    $this->guaranteedFixedPriceTerms = $guaranteedFixedPriceTerms;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_DealTermsGuaranteedFixedPriceTerms
   */
  public function getGuaranteedFixedPriceTerms()
  {
    return $this->guaranteedFixedPriceTerms;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_DealTermsNonGuaranteedAuctionTerms
   */
  public function setNonGuaranteedAuctionTerms(Google_Service_AdExchangeBuyer_DealTermsNonGuaranteedAuctionTerms $nonGuaranteedAuctionTerms)
  {
    $this->nonGuaranteedAuctionTerms = $nonGuaranteedAuctionTerms;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_DealTermsNonGuaranteedAuctionTerms
   */
  public function getNonGuaranteedAuctionTerms()
  {
    return $this->nonGuaranteedAuctionTerms;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_DealTermsNonGuaranteedFixedPriceTerms
   */
  public function setNonGuaranteedFixedPriceTerms(Google_Service_AdExchangeBuyer_DealTermsNonGuaranteedFixedPriceTerms $nonGuaranteedFixedPriceTerms)
  {
    $this->nonGuaranteedFixedPriceTerms = $nonGuaranteedFixedPriceTerms;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_DealTermsNonGuaranteedFixedPriceTerms
   */
  public function getNonGuaranteedFixedPriceTerms()
  {
    return $this->nonGuaranteedFixedPriceTerms;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_DealTermsRubiconNonGuaranteedTerms
   */
  public function setRubiconNonGuaranteedTerms(Google_Service_AdExchangeBuyer_DealTermsRubiconNonGuaranteedTerms $rubiconNonGuaranteedTerms)
  {
    $this->rubiconNonGuaranteedTerms = $rubiconNonGuaranteedTerms;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_DealTermsRubiconNonGuaranteedTerms
   */
  public function getRubiconNonGuaranteedTerms()
  {
    return $this->rubiconNonGuaranteedTerms;
  }
  public function setSellerTimeZone($sellerTimeZone)
  {
    $this->sellerTimeZone = $sellerTimeZone;
  }
  public function getSellerTimeZone()
  {
    return $this->sellerTimeZone;
  }
}
