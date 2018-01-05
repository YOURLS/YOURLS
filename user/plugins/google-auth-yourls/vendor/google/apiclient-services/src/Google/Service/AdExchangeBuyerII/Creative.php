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

class Google_Service_AdExchangeBuyerII_Creative extends Google_Collection
{
  protected $collection_key = 'vendorIds';
  public $accountId;
  public $adChoicesDestinationUrl;
  public $advertiserName;
  public $agencyId;
  public $apiUpdateTime;
  public $attributes;
  public $clickThroughUrls;
  protected $correctionsType = 'Google_Service_AdExchangeBuyerII_Correction';
  protected $correctionsDataType = 'array';
  public $creativeId;
  public $dealsStatus;
  public $detectedAdvertiserIds;
  public $detectedDomains;
  public $detectedLanguages;
  public $detectedProductCategories;
  public $detectedSensitiveCategories;
  protected $filteringStatsType = 'Google_Service_AdExchangeBuyerII_FilteringStats';
  protected $filteringStatsDataType = '';
  protected $htmlType = 'Google_Service_AdExchangeBuyerII_HtmlContent';
  protected $htmlDataType = '';
  public $impressionTrackingUrls;
  protected $nativeType = 'Google_Service_AdExchangeBuyerII_NativeContent';
  protected $nativeDataType = '';
  public $openAuctionStatus;
  public $restrictedCategories;
  protected $servingRestrictionsType = 'Google_Service_AdExchangeBuyerII_ServingRestriction';
  protected $servingRestrictionsDataType = 'array';
  public $vendorIds;
  public $version;
  protected $videoType = 'Google_Service_AdExchangeBuyerII_VideoContent';
  protected $videoDataType = '';

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
  public function setApiUpdateTime($apiUpdateTime)
  {
    $this->apiUpdateTime = $apiUpdateTime;
  }
  public function getApiUpdateTime()
  {
    return $this->apiUpdateTime;
  }
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  public function getAttributes()
  {
    return $this->attributes;
  }
  public function setClickThroughUrls($clickThroughUrls)
  {
    $this->clickThroughUrls = $clickThroughUrls;
  }
  public function getClickThroughUrls()
  {
    return $this->clickThroughUrls;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_Correction
   */
  public function setCorrections($corrections)
  {
    $this->corrections = $corrections;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_Correction
   */
  public function getCorrections()
  {
    return $this->corrections;
  }
  public function setCreativeId($creativeId)
  {
    $this->creativeId = $creativeId;
  }
  public function getCreativeId()
  {
    return $this->creativeId;
  }
  public function setDealsStatus($dealsStatus)
  {
    $this->dealsStatus = $dealsStatus;
  }
  public function getDealsStatus()
  {
    return $this->dealsStatus;
  }
  public function setDetectedAdvertiserIds($detectedAdvertiserIds)
  {
    $this->detectedAdvertiserIds = $detectedAdvertiserIds;
  }
  public function getDetectedAdvertiserIds()
  {
    return $this->detectedAdvertiserIds;
  }
  public function setDetectedDomains($detectedDomains)
  {
    $this->detectedDomains = $detectedDomains;
  }
  public function getDetectedDomains()
  {
    return $this->detectedDomains;
  }
  public function setDetectedLanguages($detectedLanguages)
  {
    $this->detectedLanguages = $detectedLanguages;
  }
  public function getDetectedLanguages()
  {
    return $this->detectedLanguages;
  }
  public function setDetectedProductCategories($detectedProductCategories)
  {
    $this->detectedProductCategories = $detectedProductCategories;
  }
  public function getDetectedProductCategories()
  {
    return $this->detectedProductCategories;
  }
  public function setDetectedSensitiveCategories($detectedSensitiveCategories)
  {
    $this->detectedSensitiveCategories = $detectedSensitiveCategories;
  }
  public function getDetectedSensitiveCategories()
  {
    return $this->detectedSensitiveCategories;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_FilteringStats
   */
  public function setFilteringStats(Google_Service_AdExchangeBuyerII_FilteringStats $filteringStats)
  {
    $this->filteringStats = $filteringStats;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_FilteringStats
   */
  public function getFilteringStats()
  {
    return $this->filteringStats;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_HtmlContent
   */
  public function setHtml(Google_Service_AdExchangeBuyerII_HtmlContent $html)
  {
    $this->html = $html;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_HtmlContent
   */
  public function getHtml()
  {
    return $this->html;
  }
  public function setImpressionTrackingUrls($impressionTrackingUrls)
  {
    $this->impressionTrackingUrls = $impressionTrackingUrls;
  }
  public function getImpressionTrackingUrls()
  {
    return $this->impressionTrackingUrls;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_NativeContent
   */
  public function setNative(Google_Service_AdExchangeBuyerII_NativeContent $native)
  {
    $this->native = $native;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_NativeContent
   */
  public function getNative()
  {
    return $this->native;
  }
  public function setOpenAuctionStatus($openAuctionStatus)
  {
    $this->openAuctionStatus = $openAuctionStatus;
  }
  public function getOpenAuctionStatus()
  {
    return $this->openAuctionStatus;
  }
  public function setRestrictedCategories($restrictedCategories)
  {
    $this->restrictedCategories = $restrictedCategories;
  }
  public function getRestrictedCategories()
  {
    return $this->restrictedCategories;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_ServingRestriction
   */
  public function setServingRestrictions($servingRestrictions)
  {
    $this->servingRestrictions = $servingRestrictions;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_ServingRestriction
   */
  public function getServingRestrictions()
  {
    return $this->servingRestrictions;
  }
  public function setVendorIds($vendorIds)
  {
    $this->vendorIds = $vendorIds;
  }
  public function getVendorIds()
  {
    return $this->vendorIds;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_VideoContent
   */
  public function setVideo(Google_Service_AdExchangeBuyerII_VideoContent $video)
  {
    $this->video = $video;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_VideoContent
   */
  public function getVideo()
  {
    return $this->video;
  }
}
