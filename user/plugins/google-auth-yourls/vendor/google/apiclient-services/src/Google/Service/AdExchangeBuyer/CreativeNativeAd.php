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

class Google_Service_AdExchangeBuyer_CreativeNativeAd extends Google_Collection
{
  protected $collection_key = 'impressionTrackingUrl';
  public $advertiser;
  protected $appIconType = 'Google_Service_AdExchangeBuyer_CreativeNativeAdAppIcon';
  protected $appIconDataType = '';
  public $body;
  public $callToAction;
  public $clickLinkUrl;
  public $clickTrackingUrl;
  public $headline;
  protected $imageType = 'Google_Service_AdExchangeBuyer_CreativeNativeAdImage';
  protected $imageDataType = '';
  public $impressionTrackingUrl;
  protected $logoType = 'Google_Service_AdExchangeBuyer_CreativeNativeAdLogo';
  protected $logoDataType = '';
  public $price;
  public $starRating;
  public $store;
  public $videoURL;

  public function setAdvertiser($advertiser)
  {
    $this->advertiser = $advertiser;
  }
  public function getAdvertiser()
  {
    return $this->advertiser;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_CreativeNativeAdAppIcon
   */
  public function setAppIcon(Google_Service_AdExchangeBuyer_CreativeNativeAdAppIcon $appIcon)
  {
    $this->appIcon = $appIcon;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_CreativeNativeAdAppIcon
   */
  public function getAppIcon()
  {
    return $this->appIcon;
  }
  public function setBody($body)
  {
    $this->body = $body;
  }
  public function getBody()
  {
    return $this->body;
  }
  public function setCallToAction($callToAction)
  {
    $this->callToAction = $callToAction;
  }
  public function getCallToAction()
  {
    return $this->callToAction;
  }
  public function setClickLinkUrl($clickLinkUrl)
  {
    $this->clickLinkUrl = $clickLinkUrl;
  }
  public function getClickLinkUrl()
  {
    return $this->clickLinkUrl;
  }
  public function setClickTrackingUrl($clickTrackingUrl)
  {
    $this->clickTrackingUrl = $clickTrackingUrl;
  }
  public function getClickTrackingUrl()
  {
    return $this->clickTrackingUrl;
  }
  public function setHeadline($headline)
  {
    $this->headline = $headline;
  }
  public function getHeadline()
  {
    return $this->headline;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_CreativeNativeAdImage
   */
  public function setImage(Google_Service_AdExchangeBuyer_CreativeNativeAdImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_CreativeNativeAdImage
   */
  public function getImage()
  {
    return $this->image;
  }
  public function setImpressionTrackingUrl($impressionTrackingUrl)
  {
    $this->impressionTrackingUrl = $impressionTrackingUrl;
  }
  public function getImpressionTrackingUrl()
  {
    return $this->impressionTrackingUrl;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_CreativeNativeAdLogo
   */
  public function setLogo(Google_Service_AdExchangeBuyer_CreativeNativeAdLogo $logo)
  {
    $this->logo = $logo;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_CreativeNativeAdLogo
   */
  public function getLogo()
  {
    return $this->logo;
  }
  public function setPrice($price)
  {
    $this->price = $price;
  }
  public function getPrice()
  {
    return $this->price;
  }
  public function setStarRating($starRating)
  {
    $this->starRating = $starRating;
  }
  public function getStarRating()
  {
    return $this->starRating;
  }
  public function setStore($store)
  {
    $this->store = $store;
  }
  public function getStore()
  {
    return $this->store;
  }
  public function setVideoURL($videoURL)
  {
    $this->videoURL = $videoURL;
  }
  public function getVideoURL()
  {
    return $this->videoURL;
  }
}
