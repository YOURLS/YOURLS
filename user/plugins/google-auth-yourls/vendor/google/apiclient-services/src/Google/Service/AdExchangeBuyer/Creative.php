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

class Google_Service_AdExchangeBuyer_Creative extends Google_Collection
{
  protected $collection_key = 'vendorType';
  protected $internal_gapi_mappings = array(
        "hTMLSnippet" => "HTMLSnippet",
  );
  public $hTMLSnippet;
  public $accountId;
  public $adChoicesDestinationUrl;
  public $advertiserId;
  public $advertiserName;
  public $agencyId;
  public $apiUploadTimestamp;
  public $attribute;
  public $buyerCreativeId;
  public $clickThroughUrl;
  protected $correctionsType = 'Google_Service_AdExchangeBuyer_CreativeCorrections';
  protected $correctionsDataType = 'array';
  public $dealsStatus;
  public $detectedDomains;
  protected $filteringReasonsType = 'Google_Service_AdExchangeBuyer_CreativeFilteringReasons';
  protected $filteringReasonsDataType = '';
  public $height;
  public $impressionTrackingUrl;
  public $kind;
  public $languages;
  protected $nativeAdType = 'Google_Service_AdExchangeBuyer_CreativeNativeAd';
  protected $nativeAdDataType = '';
  public $openAuctionStatus;
  public $productCategories;
  public $restrictedCategories;
  public $sensitiveCategories;
  protected $servingRestrictionsType = 'Google_Service_AdExchangeBuyer_CreativeServingRestrictions';
  protected $servingRestrictionsDataType = 'array';
  public $vendorType;
  public $version;
  public $videoURL;
  public $width;

  public function setHTMLSnippet($hTMLSnippet)
  {
    $this->hTMLSnippet = $hTMLSnippet;
  }
  public function getHTMLSnippet()
  {
    return $this->hTMLSnippet;
  }
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setAdChoicesDestinationUrl($adChoicesDestinationUrl)
  {
    $this->adChoicesDestinationUrl = $adChoicesDestinationUrl;
  }
  public function getAdChoicesDestinationUrl()
  {
    return $this->adChoicesDestinationUrl;
  }
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  public function setAdvertiserName($advertiserName)
  {
    $this->advertiserName = $advertiserName;
  }
  public function getAdvertiserName()
  {
    return $this->advertiserName;
  }
  public function setAgencyId($agencyId)
  {
    $this->agencyId = $agencyId;
  }
  public function getAgencyId()
  {
    return $this->agencyId;
  }
  public function setApiUploadTimestamp($apiUploadTimestamp)
  {
    $this->apiUploadTimestamp = $apiUploadTimestamp;
  }
  public function getApiUploadTimestamp()
  {
    return $this->apiUploadTimestamp;
  }
  public function setAttribute($attribute)
  {
    $this->attribute = $attribute;
  }
  public function getAttribute()
  {
    return $this->attribute;
  }
  public function setBuyerCreativeId($buyerCreativeId)
  {
    $this->buyerCreativeId = $buyerCreativeId;
  }
  public function getBuyerCreativeId()
  {
    return $this->buyerCreativeId;
  }
  public function setClickThroughUrl($clickThroughUrl)
  {
    $this->clickThroughUrl = $clickThroughUrl;
  }
  public function getClickThroughUrl()
  {
    return $this->clickThroughUrl;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_CreativeCorrections
   */
  public function setCorrections($corrections)
  {
    $this->corrections = $corrections;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_CreativeCorrections
   */
  public function getCorrections()
  {
    return $this->corrections;
  }
  public function setDealsStatus($dealsStatus)
  {
    $this->dealsStatus = $dealsStatus;
  }
  public function getDealsStatus()
  {
    return $this->dealsStatus;
  }
  public function setDetectedDomains($detectedDomains)
  {
    $this->detectedDomains = $detectedDomains;
  }
  public function getDetectedDomains()
  {
    return $this->detectedDomains;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_CreativeFilteringReasons
   */
  public function setFilteringReasons(Google_Service_AdExchangeBuyer_CreativeFilteringReasons $filteringReasons)
  {
    $this->filteringReasons = $filteringReasons;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_CreativeFilteringReasons
   */
  public function getFilteringReasons()
  {
    return $this->filteringReasons;
  }
  public function setHeight($height)
  {
    $this->height = $height;
  }
  public function getHeight()
  {
    return $this->height;
  }
  public function setImpressionTrackingUrl($impressionTrackingUrl)
  {
    $this->impressionTrackingUrl = $impressionTrackingUrl;
  }
  public function getImpressionTrackingUrl()
  {
    return $this->impressionTrackingUrl;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLanguages($languages)
  {
    $this->languages = $languages;
  }
  public function getLanguages()
  {
    return $this->languages;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_CreativeNativeAd
   */
  public function setNativeAd(Google_Service_AdExchangeBuyer_CreativeNativeAd $nativeAd)
  {
    $this->nativeAd = $nativeAd;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_CreativeNativeAd
   */
  public function getNativeAd()
  {
    return $this->nativeAd;
  }
  public function setOpenAuctionStatus($openAuctionStatus)
  {
    $this->openAuctionStatus = $openAuctionStatus;
  }
  public function getOpenAuctionStatus()
  {
    return $this->openAuctionStatus;
  }
  public function setProductCategories($productCategories)
  {
    $this->productCategories = $productCategories;
  }
  public function getProductCategories()
  {
    return $this->productCategories;
  }
  public function setRestrictedCategories($restrictedCategories)
  {
    $this->restrictedCategories = $restrictedCategories;
  }
  public function getRestrictedCategories()
  {
    return $this->restrictedCategories;
  }
  public function setSensitiveCategories($sensitiveCategories)
  {
    $this->sensitiveCategories = $sensitiveCategories;
  }
  public function getSensitiveCategories()
  {
    return $this->sensitiveCategories;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_CreativeServingRestrictions
   */
  public function setServingRestrictions($servingRestrictions)
  {
    $this->servingRestrictions = $servingRestrictions;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_CreativeServingRestrictions
   */
  public function getServingRestrictions()
  {
    return $this->servingRestrictions;
  }
  public function setVendorType($vendorType)
  {
    $this->vendorType = $vendorType;
  }
  public function getVendorType()
  {
    return $this->vendorType;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
  public function setVideoURL($videoURL)
  {
    $this->videoURL = $videoURL;
  }
  public function getVideoURL()
  {
    return $this->videoURL;
  }
  public function setWidth($width)
  {
    $this->width = $width;
  }
  public function getWidth()
  {
    return $this->width;
  }
}
