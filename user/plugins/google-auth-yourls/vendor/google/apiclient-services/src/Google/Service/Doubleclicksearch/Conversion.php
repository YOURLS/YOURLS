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

class Google_Service_Doubleclicksearch_Conversion extends Google_Collection
{
  protected $collection_key = 'customMetric';
  public $adGroupId;
  public $adId;
  public $advertiserId;
  public $agencyId;
  public $attributionModel;
  public $campaignId;
  public $channel;
  public $clickId;
  public $conversionId;
  public $conversionModifiedTimestamp;
  public $conversionTimestamp;
  public $countMillis;
  public $criterionId;
  public $currencyCode;
  protected $customDimensionType = 'Google_Service_Doubleclicksearch_CustomDimension';
  protected $customDimensionDataType = 'array';
  protected $customMetricType = 'Google_Service_Doubleclicksearch_CustomMetric';
  protected $customMetricDataType = 'array';
  public $deviceType;
  public $dsConversionId;
  public $engineAccountId;
  public $floodlightOrderId;
  public $inventoryAccountId;
  public $productCountry;
  public $productGroupId;
  public $productId;
  public $productLanguage;
  public $quantityMillis;
  public $revenueMicros;
  public $segmentationId;
  public $segmentationName;
  public $segmentationType;
  public $state;
  public $storeId;
  public $type;

  public function setAdGroupId($adGroupId)
  {
    $this->adGroupId = $adGroupId;
  }
  public function getAdGroupId()
  {
    return $this->adGroupId;
  }
  public function setAdId($adId)
  {
    $this->adId = $adId;
  }
  public function getAdId()
  {
    return $this->adId;
  }
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  public function setAgencyId($agencyId)
  {
    $this->agencyId = $agencyId;
  }
  public function getAgencyId()
  {
    return $this->agencyId;
  }
  public function setAttributionModel($attributionModel)
  {
    $this->attributionModel = $attributionModel;
  }
  public function getAttributionModel()
  {
    return $this->attributionModel;
  }
  public function setCampaignId($campaignId)
  {
    $this->campaignId = $campaignId;
  }
  public function getCampaignId()
  {
    return $this->campaignId;
  }
  public function setChannel($channel)
  {
    $this->channel = $channel;
  }
  public function getChannel()
  {
    return $this->channel;
  }
  public function setClickId($clickId)
  {
    $this->clickId = $clickId;
  }
  public function getClickId()
  {
    return $this->clickId;
  }
  public function setConversionId($conversionId)
  {
    $this->conversionId = $conversionId;
  }
  public function getConversionId()
  {
    return $this->conversionId;
  }
  public function setConversionModifiedTimestamp($conversionModifiedTimestamp)
  {
    $this->conversionModifiedTimestamp = $conversionModifiedTimestamp;
  }
  public function getConversionModifiedTimestamp()
  {
    return $this->conversionModifiedTimestamp;
  }
  public function setConversionTimestamp($conversionTimestamp)
  {
    $this->conversionTimestamp = $conversionTimestamp;
  }
  public function getConversionTimestamp()
  {
    return $this->conversionTimestamp;
  }
  public function setCountMillis($countMillis)
  {
    $this->countMillis = $countMillis;
  }
  public function getCountMillis()
  {
    return $this->countMillis;
  }
  public function setCriterionId($criterionId)
  {
    $this->criterionId = $criterionId;
  }
  public function getCriterionId()
  {
    return $this->criterionId;
  }
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  /**
   * @param Google_Service_Doubleclicksearch_CustomDimension
   */
  public function setCustomDimension($customDimension)
  {
    $this->customDimension = $customDimension;
  }
  /**
   * @return Google_Service_Doubleclicksearch_CustomDimension
   */
  public function getCustomDimension()
  {
    return $this->customDimension;
  }
  /**
   * @param Google_Service_Doubleclicksearch_CustomMetric
   */
  public function setCustomMetric($customMetric)
  {
    $this->customMetric = $customMetric;
  }
  /**
   * @return Google_Service_Doubleclicksearch_CustomMetric
   */
  public function getCustomMetric()
  {
    return $this->customMetric;
  }
  public function setDeviceType($deviceType)
  {
    $this->deviceType = $deviceType;
  }
  public function getDeviceType()
  {
    return $this->deviceType;
  }
  public function setDsConversionId($dsConversionId)
  {
    $this->dsConversionId = $dsConversionId;
  }
  public function getDsConversionId()
  {
    return $this->dsConversionId;
  }
  public function setEngineAccountId($engineAccountId)
  {
    $this->engineAccountId = $engineAccountId;
  }
  public function getEngineAccountId()
  {
    return $this->engineAccountId;
  }
  public function setFloodlightOrderId($floodlightOrderId)
  {
    $this->floodlightOrderId = $floodlightOrderId;
  }
  public function getFloodlightOrderId()
  {
    return $this->floodlightOrderId;
  }
  public function setInventoryAccountId($inventoryAccountId)
  {
    $this->inventoryAccountId = $inventoryAccountId;
  }
  public function getInventoryAccountId()
  {
    return $this->inventoryAccountId;
  }
  public function setProductCountry($productCountry)
  {
    $this->productCountry = $productCountry;
  }
  public function getProductCountry()
  {
    return $this->productCountry;
  }
  public function setProductGroupId($productGroupId)
  {
    $this->productGroupId = $productGroupId;
  }
  public function getProductGroupId()
  {
    return $this->productGroupId;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
  public function setProductLanguage($productLanguage)
  {
    $this->productLanguage = $productLanguage;
  }
  public function getProductLanguage()
  {
    return $this->productLanguage;
  }
  public function setQuantityMillis($quantityMillis)
  {
    $this->quantityMillis = $quantityMillis;
  }
  public function getQuantityMillis()
  {
    return $this->quantityMillis;
  }
  public function setRevenueMicros($revenueMicros)
  {
    $this->revenueMicros = $revenueMicros;
  }
  public function getRevenueMicros()
  {
    return $this->revenueMicros;
  }
  public function setSegmentationId($segmentationId)
  {
    $this->segmentationId = $segmentationId;
  }
  public function getSegmentationId()
  {
    return $this->segmentationId;
  }
  public function setSegmentationName($segmentationName)
  {
    $this->segmentationName = $segmentationName;
  }
  public function getSegmentationName()
  {
    return $this->segmentationName;
  }
  public function setSegmentationType($segmentationType)
  {
    $this->segmentationType = $segmentationType;
  }
  public function getSegmentationType()
  {
    return $this->segmentationType;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setStoreId($storeId)
  {
    $this->storeId = $storeId;
  }
  public function getStoreId()
  {
    return $this->storeId;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
