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

class Google_Service_AdExchangeBuyer_Product extends Google_Collection
{
  protected $collection_key = 'sharedTargetings';
  protected $billedBuyerType = 'Google_Service_AdExchangeBuyer_Buyer';
  protected $billedBuyerDataType = '';
  protected $buyerType = 'Google_Service_AdExchangeBuyer_Buyer';
  protected $buyerDataType = '';
  public $creationTimeMs;
  protected $creatorContactsType = 'Google_Service_AdExchangeBuyer_ContactInformation';
  protected $creatorContactsDataType = 'array';
  public $creatorRole;
  protected $deliveryControlType = 'Google_Service_AdExchangeBuyer_DeliveryControl';
  protected $deliveryControlDataType = '';
  public $flightEndTimeMs;
  public $flightStartTimeMs;
  public $hasCreatorSignedOff;
  public $inventorySource;
  public $kind;
  protected $labelsType = 'Google_Service_AdExchangeBuyer_MarketplaceLabel';
  protected $labelsDataType = 'array';
  public $lastUpdateTimeMs;
  public $legacyOfferId;
  public $marketplacePublisherProfileId;
  public $name;
  public $privateAuctionId;
  public $productId;
  public $publisherProfileId;
  protected $publisherProvidedForecastType = 'Google_Service_AdExchangeBuyer_PublisherProvidedForecast';
  protected $publisherProvidedForecastDataType = '';
  public $revisionNumber;
  protected $sellerType = 'Google_Service_AdExchangeBuyer_Seller';
  protected $sellerDataType = '';
  protected $sharedTargetingsType = 'Google_Service_AdExchangeBuyer_SharedTargeting';
  protected $sharedTargetingsDataType = 'array';
  public $state;
  public $syndicationProduct;
  protected $termsType = 'Google_Service_AdExchangeBuyer_DealTerms';
  protected $termsDataType = '';
  public $webPropertyCode;

  /**
   * @param Google_Service_AdExchangeBuyer_Buyer
   */
  public function setBilledBuyer(Google_Service_AdExchangeBuyer_Buyer $billedBuyer)
  {
    $this->billedBuyer = $billedBuyer;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_Buyer
   */
  public function getBilledBuyer()
  {
    return $this->billedBuyer;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_Buyer
   */
  public function setBuyer(Google_Service_AdExchangeBuyer_Buyer $buyer)
  {
    $this->buyer = $buyer;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_Buyer
   */
  public function getBuyer()
  {
    return $this->buyer;
  }
  public function setCreationTimeMs($creationTimeMs)
  {
    $this->creationTimeMs = $creationTimeMs;
  }
  public function getCreationTimeMs()
  {
    return $this->creationTimeMs;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_ContactInformation
   */
  public function setCreatorContacts($creatorContacts)
  {
    $this->creatorContacts = $creatorContacts;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_ContactInformation
   */
  public function getCreatorContacts()
  {
    return $this->creatorContacts;
  }
  public function setCreatorRole($creatorRole)
  {
    $this->creatorRole = $creatorRole;
  }
  public function getCreatorRole()
  {
    return $this->creatorRole;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_DeliveryControl
   */
  public function setDeliveryControl(Google_Service_AdExchangeBuyer_DeliveryControl $deliveryControl)
  {
    $this->deliveryControl = $deliveryControl;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_DeliveryControl
   */
  public function getDeliveryControl()
  {
    return $this->deliveryControl;
  }
  public function setFlightEndTimeMs($flightEndTimeMs)
  {
    $this->flightEndTimeMs = $flightEndTimeMs;
  }
  public function getFlightEndTimeMs()
  {
    return $this->flightEndTimeMs;
  }
  public function setFlightStartTimeMs($flightStartTimeMs)
  {
    $this->flightStartTimeMs = $flightStartTimeMs;
  }
  public function getFlightStartTimeMs()
  {
    return $this->flightStartTimeMs;
  }
  public function setHasCreatorSignedOff($hasCreatorSignedOff)
  {
    $this->hasCreatorSignedOff = $hasCreatorSignedOff;
  }
  public function getHasCreatorSignedOff()
  {
    return $this->hasCreatorSignedOff;
  }
  public function setInventorySource($inventorySource)
  {
    $this->inventorySource = $inventorySource;
  }
  public function getInventorySource()
  {
    return $this->inventorySource;
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
   * @param Google_Service_AdExchangeBuyer_MarketplaceLabel
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_MarketplaceLabel
   */
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLastUpdateTimeMs($lastUpdateTimeMs)
  {
    $this->lastUpdateTimeMs = $lastUpdateTimeMs;
  }
  public function getLastUpdateTimeMs()
  {
    return $this->lastUpdateTimeMs;
  }
  public function setLegacyOfferId($legacyOfferId)
  {
    $this->legacyOfferId = $legacyOfferId;
  }
  public function getLegacyOfferId()
  {
    return $this->legacyOfferId;
  }
  public function setMarketplacePublisherProfileId($marketplacePublisherProfileId)
  {
    $this->marketplacePublisherProfileId = $marketplacePublisherProfileId;
  }
  public function getMarketplacePublisherProfileId()
  {
    return $this->marketplacePublisherProfileId;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPrivateAuctionId($privateAuctionId)
  {
    $this->privateAuctionId = $privateAuctionId;
  }
  public function getPrivateAuctionId()
  {
    return $this->privateAuctionId;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
  public function setPublisherProfileId($publisherProfileId)
  {
    $this->publisherProfileId = $publisherProfileId;
  }
  public function getPublisherProfileId()
  {
    return $this->publisherProfileId;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_PublisherProvidedForecast
   */
  public function setPublisherProvidedForecast(Google_Service_AdExchangeBuyer_PublisherProvidedForecast $publisherProvidedForecast)
  {
    $this->publisherProvidedForecast = $publisherProvidedForecast;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_PublisherProvidedForecast
   */
  public function getPublisherProvidedForecast()
  {
    return $this->publisherProvidedForecast;
  }
  public function setRevisionNumber($revisionNumber)
  {
    $this->revisionNumber = $revisionNumber;
  }
  public function getRevisionNumber()
  {
    return $this->revisionNumber;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_Seller
   */
  public function setSeller(Google_Service_AdExchangeBuyer_Seller $seller)
  {
    $this->seller = $seller;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_Seller
   */
  public function getSeller()
  {
    return $this->seller;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_SharedTargeting
   */
  public function setSharedTargetings($sharedTargetings)
  {
    $this->sharedTargetings = $sharedTargetings;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_SharedTargeting
   */
  public function getSharedTargetings()
  {
    return $this->sharedTargetings;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setSyndicationProduct($syndicationProduct)
  {
    $this->syndicationProduct = $syndicationProduct;
  }
  public function getSyndicationProduct()
  {
    return $this->syndicationProduct;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_DealTerms
   */
  public function setTerms(Google_Service_AdExchangeBuyer_DealTerms $terms)
  {
    $this->terms = $terms;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_DealTerms
   */
  public function getTerms()
  {
    return $this->terms;
  }
  public function setWebPropertyCode($webPropertyCode)
  {
    $this->webPropertyCode = $webPropertyCode;
  }
  public function getWebPropertyCode()
  {
    return $this->webPropertyCode;
  }
}
