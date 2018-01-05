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

class Google_Service_AndroidEnterprise_Product extends Google_Collection
{
  protected $collection_key = 'availableTracks';
  protected $appVersionType = 'Google_Service_AndroidEnterprise_AppVersion';
  protected $appVersionDataType = 'array';
  public $authorName;
  public $availableTracks;
  public $detailsUrl;
  public $distributionChannel;
  public $iconUrl;
  public $kind;
  public $productId;
  public $productPricing;
  public $requiresContainerApp;
  protected $signingCertificateType = 'Google_Service_AndroidEnterprise_ProductSigningCertificate';
  protected $signingCertificateDataType = '';
  public $smallIconUrl;
  public $title;
  public $workDetailsUrl;

  /**
   * @param Google_Service_AndroidEnterprise_AppVersion
   */
  public function setAppVersion($appVersion)
  {
    $this->appVersion = $appVersion;
  }
  /**
   * @return Google_Service_AndroidEnterprise_AppVersion
   */
  public function getAppVersion()
  {
    return $this->appVersion;
  }
  public function setAuthorName($authorName)
  {
    $this->authorName = $authorName;
  }
  public function getAuthorName()
  {
    return $this->authorName;
  }
  public function setAvailableTracks($availableTracks)
  {
    $this->availableTracks = $availableTracks;
  }
  public function getAvailableTracks()
  {
    return $this->availableTracks;
  }
  public function setDetailsUrl($detailsUrl)
  {
    $this->detailsUrl = $detailsUrl;
  }
  public function getDetailsUrl()
  {
    return $this->detailsUrl;
  }
  public function setDistributionChannel($distributionChannel)
  {
    $this->distributionChannel = $distributionChannel;
  }
  public function getDistributionChannel()
  {
    return $this->distributionChannel;
  }
  public function setIconUrl($iconUrl)
  {
    $this->iconUrl = $iconUrl;
  }
  public function getIconUrl()
  {
    return $this->iconUrl;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
  public function setProductPricing($productPricing)
  {
    $this->productPricing = $productPricing;
  }
  public function getProductPricing()
  {
    return $this->productPricing;
  }
  public function setRequiresContainerApp($requiresContainerApp)
  {
    $this->requiresContainerApp = $requiresContainerApp;
  }
  public function getRequiresContainerApp()
  {
    return $this->requiresContainerApp;
  }
  /**
   * @param Google_Service_AndroidEnterprise_ProductSigningCertificate
   */
  public function setSigningCertificate(Google_Service_AndroidEnterprise_ProductSigningCertificate $signingCertificate)
  {
    $this->signingCertificate = $signingCertificate;
  }
  /**
   * @return Google_Service_AndroidEnterprise_ProductSigningCertificate
   */
  public function getSigningCertificate()
  {
    return $this->signingCertificate;
  }
  public function setSmallIconUrl($smallIconUrl)
  {
    $this->smallIconUrl = $smallIconUrl;
  }
  public function getSmallIconUrl()
  {
    return $this->smallIconUrl;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setWorkDetailsUrl($workDetailsUrl)
  {
    $this->workDetailsUrl = $workDetailsUrl;
  }
  public function getWorkDetailsUrl()
  {
    return $this->workDetailsUrl;
  }
}
