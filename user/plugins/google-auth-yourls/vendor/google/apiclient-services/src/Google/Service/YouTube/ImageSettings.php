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

class Google_Service_YouTube_ImageSettings extends Google_Model
{
  protected $backgroundImageUrlType = 'Google_Service_YouTube_LocalizedProperty';
  protected $backgroundImageUrlDataType = '';
  public $bannerExternalUrl;
  public $bannerImageUrl;
  public $bannerMobileExtraHdImageUrl;
  public $bannerMobileHdImageUrl;
  public $bannerMobileImageUrl;
  public $bannerMobileLowImageUrl;
  public $bannerMobileMediumHdImageUrl;
  public $bannerTabletExtraHdImageUrl;
  public $bannerTabletHdImageUrl;
  public $bannerTabletImageUrl;
  public $bannerTabletLowImageUrl;
  public $bannerTvHighImageUrl;
  public $bannerTvImageUrl;
  public $bannerTvLowImageUrl;
  public $bannerTvMediumImageUrl;
  protected $largeBrandedBannerImageImapScriptType = 'Google_Service_YouTube_LocalizedProperty';
  protected $largeBrandedBannerImageImapScriptDataType = '';
  protected $largeBrandedBannerImageUrlType = 'Google_Service_YouTube_LocalizedProperty';
  protected $largeBrandedBannerImageUrlDataType = '';
  protected $smallBrandedBannerImageImapScriptType = 'Google_Service_YouTube_LocalizedProperty';
  protected $smallBrandedBannerImageImapScriptDataType = '';
  protected $smallBrandedBannerImageUrlType = 'Google_Service_YouTube_LocalizedProperty';
  protected $smallBrandedBannerImageUrlDataType = '';
  public $trackingImageUrl;
  public $watchIconImageUrl;

  /**
   * @param Google_Service_YouTube_LocalizedProperty
   */
  public function setBackgroundImageUrl(Google_Service_YouTube_LocalizedProperty $backgroundImageUrl)
  {
    $this->backgroundImageUrl = $backgroundImageUrl;
  }
  /**
   * @return Google_Service_YouTube_LocalizedProperty
   */
  public function getBackgroundImageUrl()
  {
    return $this->backgroundImageUrl;
  }
  public function setBannerExternalUrl($bannerExternalUrl)
  {
    $this->bannerExternalUrl = $bannerExternalUrl;
  }
  public function getBannerExternalUrl()
  {
    return $this->bannerExternalUrl;
  }
  public function setBannerImageUrl($bannerImageUrl)
  {
    $this->bannerImageUrl = $bannerImageUrl;
  }
  public function getBannerImageUrl()
  {
    return $this->bannerImageUrl;
  }
  public function setBannerMobileExtraHdImageUrl($bannerMobileExtraHdImageUrl)
  {
    $this->bannerMobileExtraHdImageUrl = $bannerMobileExtraHdImageUrl;
  }
  public function getBannerMobileExtraHdImageUrl()
  {
    return $this->bannerMobileExtraHdImageUrl;
  }
  public function setBannerMobileHdImageUrl($bannerMobileHdImageUrl)
  {
    $this->bannerMobileHdImageUrl = $bannerMobileHdImageUrl;
  }
  public function getBannerMobileHdImageUrl()
  {
    return $this->bannerMobileHdImageUrl;
  }
  public function setBannerMobileImageUrl($bannerMobileImageUrl)
  {
    $this->bannerMobileImageUrl = $bannerMobileImageUrl;
  }
  public function getBannerMobileImageUrl()
  {
    return $this->bannerMobileImageUrl;
  }
  public function setBannerMobileLowImageUrl($bannerMobileLowImageUrl)
  {
    $this->bannerMobileLowImageUrl = $bannerMobileLowImageUrl;
  }
  public function getBannerMobileLowImageUrl()
  {
    return $this->bannerMobileLowImageUrl;
  }
  public function setBannerMobileMediumHdImageUrl($bannerMobileMediumHdImageUrl)
  {
    $this->bannerMobileMediumHdImageUrl = $bannerMobileMediumHdImageUrl;
  }
  public function getBannerMobileMediumHdImageUrl()
  {
    return $this->bannerMobileMediumHdImageUrl;
  }
  public function setBannerTabletExtraHdImageUrl($bannerTabletExtraHdImageUrl)
  {
    $this->bannerTabletExtraHdImageUrl = $bannerTabletExtraHdImageUrl;
  }
  public function getBannerTabletExtraHdImageUrl()
  {
    return $this->bannerTabletExtraHdImageUrl;
  }
  public function setBannerTabletHdImageUrl($bannerTabletHdImageUrl)
  {
    $this->bannerTabletHdImageUrl = $bannerTabletHdImageUrl;
  }
  public function getBannerTabletHdImageUrl()
  {
    return $this->bannerTabletHdImageUrl;
  }
  public function setBannerTabletImageUrl($bannerTabletImageUrl)
  {
    $this->bannerTabletImageUrl = $bannerTabletImageUrl;
  }
  public function getBannerTabletImageUrl()
  {
    return $this->bannerTabletImageUrl;
  }
  public function setBannerTabletLowImageUrl($bannerTabletLowImageUrl)
  {
    $this->bannerTabletLowImageUrl = $bannerTabletLowImageUrl;
  }
  public function getBannerTabletLowImageUrl()
  {
    return $this->bannerTabletLowImageUrl;
  }
  public function setBannerTvHighImageUrl($bannerTvHighImageUrl)
  {
    $this->bannerTvHighImageUrl = $bannerTvHighImageUrl;
  }
  public function getBannerTvHighImageUrl()
  {
    return $this->bannerTvHighImageUrl;
  }
  public function setBannerTvImageUrl($bannerTvImageUrl)
  {
    $this->bannerTvImageUrl = $bannerTvImageUrl;
  }
  public function getBannerTvImageUrl()
  {
    return $this->bannerTvImageUrl;
  }
  public function setBannerTvLowImageUrl($bannerTvLowImageUrl)
  {
    $this->bannerTvLowImageUrl = $bannerTvLowImageUrl;
  }
  public function getBannerTvLowImageUrl()
  {
    return $this->bannerTvLowImageUrl;
  }
  public function setBannerTvMediumImageUrl($bannerTvMediumImageUrl)
  {
    $this->bannerTvMediumImageUrl = $bannerTvMediumImageUrl;
  }
  public function getBannerTvMediumImageUrl()
  {
    return $this->bannerTvMediumImageUrl;
  }
  /**
   * @param Google_Service_YouTube_LocalizedProperty
   */
  public function setLargeBrandedBannerImageImapScript(Google_Service_YouTube_LocalizedProperty $largeBrandedBannerImageImapScript)
  {
    $this->largeBrandedBannerImageImapScript = $largeBrandedBannerImageImapScript;
  }
  /**
   * @return Google_Service_YouTube_LocalizedProperty
   */
  public function getLargeBrandedBannerImageImapScript()
  {
    return $this->largeBrandedBannerImageImapScript;
  }
  /**
   * @param Google_Service_YouTube_LocalizedProperty
   */
  public function setLargeBrandedBannerImageUrl(Google_Service_YouTube_LocalizedProperty $largeBrandedBannerImageUrl)
  {
    $this->largeBrandedBannerImageUrl = $largeBrandedBannerImageUrl;
  }
  /**
   * @return Google_Service_YouTube_LocalizedProperty
   */
  public function getLargeBrandedBannerImageUrl()
  {
    return $this->largeBrandedBannerImageUrl;
  }
  /**
   * @param Google_Service_YouTube_LocalizedProperty
   */
  public function setSmallBrandedBannerImageImapScript(Google_Service_YouTube_LocalizedProperty $smallBrandedBannerImageImapScript)
  {
    $this->smallBrandedBannerImageImapScript = $smallBrandedBannerImageImapScript;
  }
  /**
   * @return Google_Service_YouTube_LocalizedProperty
   */
  public function getSmallBrandedBannerImageImapScript()
  {
    return $this->smallBrandedBannerImageImapScript;
  }
  /**
   * @param Google_Service_YouTube_LocalizedProperty
   */
  public function setSmallBrandedBannerImageUrl(Google_Service_YouTube_LocalizedProperty $smallBrandedBannerImageUrl)
  {
    $this->smallBrandedBannerImageUrl = $smallBrandedBannerImageUrl;
  }
  /**
   * @return Google_Service_YouTube_LocalizedProperty
   */
  public function getSmallBrandedBannerImageUrl()
  {
    return $this->smallBrandedBannerImageUrl;
  }
  public function setTrackingImageUrl($trackingImageUrl)
  {
    $this->trackingImageUrl = $trackingImageUrl;
  }
  public function getTrackingImageUrl()
  {
    return $this->trackingImageUrl;
  }
  public function setWatchIconImageUrl($watchIconImageUrl)
  {
    $this->watchIconImageUrl = $watchIconImageUrl;
  }
  public function getWatchIconImageUrl()
  {
    return $this->watchIconImageUrl;
  }
}
