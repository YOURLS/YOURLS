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

class Google_Service_ShoppingContent_Product extends Google_Collection
{
  protected $collection_key = 'warnings';
  public $additionalImageLinks;
  public $additionalProductTypes;
  public $adult;
  public $adwordsGrouping;
  public $adwordsLabels;
  public $adwordsRedirect;
  public $ageGroup;
  protected $aspectsType = 'Google_Service_ShoppingContent_ProductAspect';
  protected $aspectsDataType = 'array';
  public $availability;
  public $availabilityDate;
  public $brand;
  public $channel;
  public $color;
  public $condition;
  public $contentLanguage;
  protected $customAttributesType = 'Google_Service_ShoppingContent_ProductCustomAttribute';
  protected $customAttributesDataType = 'array';
  protected $customGroupsType = 'Google_Service_ShoppingContent_ProductCustomGroup';
  protected $customGroupsDataType = 'array';
  public $customLabel0;
  public $customLabel1;
  public $customLabel2;
  public $customLabel3;
  public $customLabel4;
  public $description;
  protected $destinationsType = 'Google_Service_ShoppingContent_ProductDestination';
  protected $destinationsDataType = 'array';
  public $displayAdsId;
  public $displayAdsLink;
  public $displayAdsSimilarIds;
  public $displayAdsTitle;
  public $displayAdsValue;
  public $energyEfficiencyClass;
  public $expirationDate;
  public $gender;
  public $googleProductCategory;
  public $gtin;
  public $id;
  public $identifierExists;
  public $imageLink;
  protected $installmentType = 'Google_Service_ShoppingContent_Installment';
  protected $installmentDataType = '';
  public $isBundle;
  public $itemGroupId;
  public $kind;
  public $link;
  protected $loyaltyPointsType = 'Google_Service_ShoppingContent_LoyaltyPoints';
  protected $loyaltyPointsDataType = '';
  public $material;
  public $maxHandlingTime;
  public $minHandlingTime;
  public $mobileLink;
  public $mpn;
  public $multipack;
  public $offerId;
  public $onlineOnly;
  public $pattern;
  protected $priceType = 'Google_Service_ShoppingContent_Price';
  protected $priceDataType = '';
  public $productType;
  public $promotionIds;
  protected $salePriceType = 'Google_Service_ShoppingContent_Price';
  protected $salePriceDataType = '';
  public $salePriceEffectiveDate;
  public $sellOnGoogleQuantity;
  protected $shippingType = 'Google_Service_ShoppingContent_ProductShipping';
  protected $shippingDataType = 'array';
  protected $shippingHeightType = 'Google_Service_ShoppingContent_ProductShippingDimension';
  protected $shippingHeightDataType = '';
  public $shippingLabel;
  protected $shippingLengthType = 'Google_Service_ShoppingContent_ProductShippingDimension';
  protected $shippingLengthDataType = '';
  protected $shippingWeightType = 'Google_Service_ShoppingContent_ProductShippingWeight';
  protected $shippingWeightDataType = '';
  protected $shippingWidthType = 'Google_Service_ShoppingContent_ProductShippingDimension';
  protected $shippingWidthDataType = '';
  public $sizeSystem;
  public $sizeType;
  public $sizes;
  public $targetCountry;
  protected $taxesType = 'Google_Service_ShoppingContent_ProductTax';
  protected $taxesDataType = 'array';
  public $title;
  protected $unitPricingBaseMeasureType = 'Google_Service_ShoppingContent_ProductUnitPricingBaseMeasure';
  protected $unitPricingBaseMeasureDataType = '';
  protected $unitPricingMeasureType = 'Google_Service_ShoppingContent_ProductUnitPricingMeasure';
  protected $unitPricingMeasureDataType = '';
  public $validatedDestinations;
  protected $warningsType = 'Google_Service_ShoppingContent_Error';
  protected $warningsDataType = 'array';

  public function setAdditionalImageLinks($additionalImageLinks)
  {
    $this->additionalImageLinks = $additionalImageLinks;
  }
  public function getAdditionalImageLinks()
  {
    return $this->additionalImageLinks;
  }
  public function setAdditionalProductTypes($additionalProductTypes)
  {
    $this->additionalProductTypes = $additionalProductTypes;
  }
  public function getAdditionalProductTypes()
  {
    return $this->additionalProductTypes;
  }
  public function setAdult($adult)
  {
    $this->adult = $adult;
  }
  public function getAdult()
  {
    return $this->adult;
  }
  public function setAdwordsGrouping($adwordsGrouping)
  {
    $this->adwordsGrouping = $adwordsGrouping;
  }
  public function getAdwordsGrouping()
  {
    return $this->adwordsGrouping;
  }
  public function setAdwordsLabels($adwordsLabels)
  {
    $this->adwordsLabels = $adwordsLabels;
  }
  public function getAdwordsLabels()
  {
    return $this->adwordsLabels;
  }
  public function setAdwordsRedirect($adwordsRedirect)
  {
    $this->adwordsRedirect = $adwordsRedirect;
  }
  public function getAdwordsRedirect()
  {
    return $this->adwordsRedirect;
  }
  public function setAgeGroup($ageGroup)
  {
    $this->ageGroup = $ageGroup;
  }
  public function getAgeGroup()
  {
    return $this->ageGroup;
  }
  /**
   * @param Google_Service_ShoppingContent_ProductAspect
   */
  public function setAspects($aspects)
  {
    $this->aspects = $aspects;
  }
  /**
   * @return Google_Service_ShoppingContent_ProductAspect
   */
  public function getAspects()
  {
    return $this->aspects;
  }
  public function setAvailability($availability)
  {
    $this->availability = $availability;
  }
  public function getAvailability()
  {
    return $this->availability;
  }
  public function setAvailabilityDate($availabilityDate)
  {
    $this->availabilityDate = $availabilityDate;
  }
  public function getAvailabilityDate()
  {
    return $this->availabilityDate;
  }
  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  public function getBrand()
  {
    return $this->brand;
  }
  public function setChannel($channel)
  {
    $this->channel = $channel;
  }
  public function getChannel()
  {
    return $this->channel;
  }
  public function setColor($color)
  {
    $this->color = $color;
  }
  public function getColor()
  {
    return $this->color;
  }
  public function setCondition($condition)
  {
    $this->condition = $condition;
  }
  public function getCondition()
  {
    return $this->condition;
  }
  public function setContentLanguage($contentLanguage)
  {
    $this->contentLanguage = $contentLanguage;
  }
  public function getContentLanguage()
  {
    return $this->contentLanguage;
  }
  /**
   * @param Google_Service_ShoppingContent_ProductCustomAttribute
   */
  public function setCustomAttributes($customAttributes)
  {
    $this->customAttributes = $customAttributes;
  }
  /**
   * @return Google_Service_ShoppingContent_ProductCustomAttribute
   */
  public function getCustomAttributes()
  {
    return $this->customAttributes;
  }
  /**
   * @param Google_Service_ShoppingContent_ProductCustomGroup
   */
  public function setCustomGroups($customGroups)
  {
    $this->customGroups = $customGroups;
  }
  /**
   * @return Google_Service_ShoppingContent_ProductCustomGroup
   */
  public function getCustomGroups()
  {
    return $this->customGroups;
  }
  public function setCustomLabel0($customLabel0)
  {
    $this->customLabel0 = $customLabel0;
  }
  public function getCustomLabel0()
  {
    return $this->customLabel0;
  }
  public function setCustomLabel1($customLabel1)
  {
    $this->customLabel1 = $customLabel1;
  }
  public function getCustomLabel1()
  {
    return $this->customLabel1;
  }
  public function setCustomLabel2($customLabel2)
  {
    $this->customLabel2 = $customLabel2;
  }
  public function getCustomLabel2()
  {
    return $this->customLabel2;
  }
  public function setCustomLabel3($customLabel3)
  {
    $this->customLabel3 = $customLabel3;
  }
  public function getCustomLabel3()
  {
    return $this->customLabel3;
  }
  public function setCustomLabel4($customLabel4)
  {
    $this->customLabel4 = $customLabel4;
  }
  public function getCustomLabel4()
  {
    return $this->customLabel4;
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
   * @param Google_Service_ShoppingContent_ProductDestination
   */
  public function setDestinations($destinations)
  {
    $this->destinations = $destinations;
  }
  /**
   * @return Google_Service_ShoppingContent_ProductDestination
   */
  public function getDestinations()
  {
    return $this->destinations;
  }
  public function setDisplayAdsId($displayAdsId)
  {
    $this->displayAdsId = $displayAdsId;
  }
  public function getDisplayAdsId()
  {
    return $this->displayAdsId;
  }
  public function setDisplayAdsLink($displayAdsLink)
  {
    $this->displayAdsLink = $displayAdsLink;
  }
  public function getDisplayAdsLink()
  {
    return $this->displayAdsLink;
  }
  public function setDisplayAdsSimilarIds($displayAdsSimilarIds)
  {
    $this->displayAdsSimilarIds = $displayAdsSimilarIds;
  }
  public function getDisplayAdsSimilarIds()
  {
    return $this->displayAdsSimilarIds;
  }
  public function setDisplayAdsTitle($displayAdsTitle)
  {
    $this->displayAdsTitle = $displayAdsTitle;
  }
  public function getDisplayAdsTitle()
  {
    return $this->displayAdsTitle;
  }
  public function setDisplayAdsValue($displayAdsValue)
  {
    $this->displayAdsValue = $displayAdsValue;
  }
  public function getDisplayAdsValue()
  {
    return $this->displayAdsValue;
  }
  public function setEnergyEfficiencyClass($energyEfficiencyClass)
  {
    $this->energyEfficiencyClass = $energyEfficiencyClass;
  }
  public function getEnergyEfficiencyClass()
  {
    return $this->energyEfficiencyClass;
  }
  public function setExpirationDate($expirationDate)
  {
    $this->expirationDate = $expirationDate;
  }
  public function getExpirationDate()
  {
    return $this->expirationDate;
  }
  public function setGender($gender)
  {
    $this->gender = $gender;
  }
  public function getGender()
  {
    return $this->gender;
  }
  public function setGoogleProductCategory($googleProductCategory)
  {
    $this->googleProductCategory = $googleProductCategory;
  }
  public function getGoogleProductCategory()
  {
    return $this->googleProductCategory;
  }
  public function setGtin($gtin)
  {
    $this->gtin = $gtin;
  }
  public function getGtin()
  {
    return $this->gtin;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIdentifierExists($identifierExists)
  {
    $this->identifierExists = $identifierExists;
  }
  public function getIdentifierExists()
  {
    return $this->identifierExists;
  }
  public function setImageLink($imageLink)
  {
    $this->imageLink = $imageLink;
  }
  public function getImageLink()
  {
    return $this->imageLink;
  }
  /**
   * @param Google_Service_ShoppingContent_Installment
   */
  public function setInstallment(Google_Service_ShoppingContent_Installment $installment)
  {
    $this->installment = $installment;
  }
  /**
   * @return Google_Service_ShoppingContent_Installment
   */
  public function getInstallment()
  {
    return $this->installment;
  }
  public function setIsBundle($isBundle)
  {
    $this->isBundle = $isBundle;
  }
  public function getIsBundle()
  {
    return $this->isBundle;
  }
  public function setItemGroupId($itemGroupId)
  {
    $this->itemGroupId = $itemGroupId;
  }
  public function getItemGroupId()
  {
    return $this->itemGroupId;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLink($link)
  {
    $this->link = $link;
  }
  public function getLink()
  {
    return $this->link;
  }
  /**
   * @param Google_Service_ShoppingContent_LoyaltyPoints
   */
  public function setLoyaltyPoints(Google_Service_ShoppingContent_LoyaltyPoints $loyaltyPoints)
  {
    $this->loyaltyPoints = $loyaltyPoints;
  }
  /**
   * @return Google_Service_ShoppingContent_LoyaltyPoints
   */
  public function getLoyaltyPoints()
  {
    return $this->loyaltyPoints;
  }
  public function setMaterial($material)
  {
    $this->material = $material;
  }
  public function getMaterial()
  {
    return $this->material;
  }
  public function setMaxHandlingTime($maxHandlingTime)
  {
    $this->maxHandlingTime = $maxHandlingTime;
  }
  public function getMaxHandlingTime()
  {
    return $this->maxHandlingTime;
  }
  public function setMinHandlingTime($minHandlingTime)
  {
    $this->minHandlingTime = $minHandlingTime;
  }
  public function getMinHandlingTime()
  {
    return $this->minHandlingTime;
  }
  public function setMobileLink($mobileLink)
  {
    $this->mobileLink = $mobileLink;
  }
  public function getMobileLink()
  {
    return $this->mobileLink;
  }
  public function setMpn($mpn)
  {
    $this->mpn = $mpn;
  }
  public function getMpn()
  {
    return $this->mpn;
  }
  public function setMultipack($multipack)
  {
    $this->multipack = $multipack;
  }
  public function getMultipack()
  {
    return $this->multipack;
  }
  public function setOfferId($offerId)
  {
    $this->offerId = $offerId;
  }
  public function getOfferId()
  {
    return $this->offerId;
  }
  public function setOnlineOnly($onlineOnly)
  {
    $this->onlineOnly = $onlineOnly;
  }
  public function getOnlineOnly()
  {
    return $this->onlineOnly;
  }
  public function setPattern($pattern)
  {
    $this->pattern = $pattern;
  }
  public function getPattern()
  {
    return $this->pattern;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setPrice(Google_Service_ShoppingContent_Price $price)
  {
    $this->price = $price;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getPrice()
  {
    return $this->price;
  }
  public function setProductType($productType)
  {
    $this->productType = $productType;
  }
  public function getProductType()
  {
    return $this->productType;
  }
  public function setPromotionIds($promotionIds)
  {
    $this->promotionIds = $promotionIds;
  }
  public function getPromotionIds()
  {
    return $this->promotionIds;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setSalePrice(Google_Service_ShoppingContent_Price $salePrice)
  {
    $this->salePrice = $salePrice;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getSalePrice()
  {
    return $this->salePrice;
  }
  public function setSalePriceEffectiveDate($salePriceEffectiveDate)
  {
    $this->salePriceEffectiveDate = $salePriceEffectiveDate;
  }
  public function getSalePriceEffectiveDate()
  {
    return $this->salePriceEffectiveDate;
  }
  public function setSellOnGoogleQuantity($sellOnGoogleQuantity)
  {
    $this->sellOnGoogleQuantity = $sellOnGoogleQuantity;
  }
  public function getSellOnGoogleQuantity()
  {
    return $this->sellOnGoogleQuantity;
  }
  /**
   * @param Google_Service_ShoppingContent_ProductShipping
   */
  public function setShipping($shipping)
  {
    $this->shipping = $shipping;
  }
  /**
   * @return Google_Service_ShoppingContent_ProductShipping
   */
  public function getShipping()
  {
    return $this->shipping;
  }
  /**
   * @param Google_Service_ShoppingContent_ProductShippingDimension
   */
  public function setShippingHeight(Google_Service_ShoppingContent_ProductShippingDimension $shippingHeight)
  {
    $this->shippingHeight = $shippingHeight;
  }
  /**
   * @return Google_Service_ShoppingContent_ProductShippingDimension
   */
  public function getShippingHeight()
  {
    return $this->shippingHeight;
  }
  public function setShippingLabel($shippingLabel)
  {
    $this->shippingLabel = $shippingLabel;
  }
  public function getShippingLabel()
  {
    return $this->shippingLabel;
  }
  /**
   * @param Google_Service_ShoppingContent_ProductShippingDimension
   */
  public function setShippingLength(Google_Service_ShoppingContent_ProductShippingDimension $shippingLength)
  {
    $this->shippingLength = $shippingLength;
  }
  /**
   * @return Google_Service_ShoppingContent_ProductShippingDimension
   */
  public function getShippingLength()
  {
    return $this->shippingLength;
  }
  /**
   * @param Google_Service_ShoppingContent_ProductShippingWeight
   */
  public function setShippingWeight(Google_Service_ShoppingContent_ProductShippingWeight $shippingWeight)
  {
    $this->shippingWeight = $shippingWeight;
  }
  /**
   * @return Google_Service_ShoppingContent_ProductShippingWeight
   */
  public function getShippingWeight()
  {
    return $this->shippingWeight;
  }
  /**
   * @param Google_Service_ShoppingContent_ProductShippingDimension
   */
  public function setShippingWidth(Google_Service_ShoppingContent_ProductShippingDimension $shippingWidth)
  {
    $this->shippingWidth = $shippingWidth;
  }
  /**
   * @return Google_Service_ShoppingContent_ProductShippingDimension
   */
  public function getShippingWidth()
  {
    return $this->shippingWidth;
  }
  public function setSizeSystem($sizeSystem)
  {
    $this->sizeSystem = $sizeSystem;
  }
  public function getSizeSystem()
  {
    return $this->sizeSystem;
  }
  public function setSizeType($sizeType)
  {
    $this->sizeType = $sizeType;
  }
  public function getSizeType()
  {
    return $this->sizeType;
  }
  public function setSizes($sizes)
  {
    $this->sizes = $sizes;
  }
  public function getSizes()
  {
    return $this->sizes;
  }
  public function setTargetCountry($targetCountry)
  {
    $this->targetCountry = $targetCountry;
  }
  public function getTargetCountry()
  {
    return $this->targetCountry;
  }
  /**
   * @param Google_Service_ShoppingContent_ProductTax
   */
  public function setTaxes($taxes)
  {
    $this->taxes = $taxes;
  }
  /**
   * @return Google_Service_ShoppingContent_ProductTax
   */
  public function getTaxes()
  {
    return $this->taxes;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param Google_Service_ShoppingContent_ProductUnitPricingBaseMeasure
   */
  public function setUnitPricingBaseMeasure(Google_Service_ShoppingContent_ProductUnitPricingBaseMeasure $unitPricingBaseMeasure)
  {
    $this->unitPricingBaseMeasure = $unitPricingBaseMeasure;
  }
  /**
   * @return Google_Service_ShoppingContent_ProductUnitPricingBaseMeasure
   */
  public function getUnitPricingBaseMeasure()
  {
    return $this->unitPricingBaseMeasure;
  }
  /**
   * @param Google_Service_ShoppingContent_ProductUnitPricingMeasure
   */
  public function setUnitPricingMeasure(Google_Service_ShoppingContent_ProductUnitPricingMeasure $unitPricingMeasure)
  {
    $this->unitPricingMeasure = $unitPricingMeasure;
  }
  /**
   * @return Google_Service_ShoppingContent_ProductUnitPricingMeasure
   */
  public function getUnitPricingMeasure()
  {
    return $this->unitPricingMeasure;
  }
  public function setValidatedDestinations($validatedDestinations)
  {
    $this->validatedDestinations = $validatedDestinations;
  }
  public function getValidatedDestinations()
  {
    return $this->validatedDestinations;
  }
  /**
   * @param Google_Service_ShoppingContent_Error
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return Google_Service_ShoppingContent_Error
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}
