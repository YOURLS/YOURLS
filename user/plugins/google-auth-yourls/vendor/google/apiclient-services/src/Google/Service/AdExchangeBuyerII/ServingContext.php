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

class Google_Service_AdExchangeBuyerII_ServingContext extends Google_Model
{
  public $all;
  protected $appTypeType = 'Google_Service_AdExchangeBuyerII_AppContext';
  protected $appTypeDataType = '';
  protected $auctionTypeType = 'Google_Service_AdExchangeBuyerII_AuctionContext';
  protected $auctionTypeDataType = '';
  protected $locationType = 'Google_Service_AdExchangeBuyerII_LocationContext';
  protected $locationDataType = '';
  protected $platformType = 'Google_Service_AdExchangeBuyerII_PlatformContext';
  protected $platformDataType = '';
  protected $securityTypeType = 'Google_Service_AdExchangeBuyerII_SecurityContext';
  protected $securityTypeDataType = '';

  public function setAll($all)
  {
    $this->all = $all;
  }
  public function getAll()
  {
    return $this->all;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_AppContext
   */
  public function setAppType(Google_Service_AdExchangeBuyerII_AppContext $appType)
  {
    $this->appType = $appType;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_AppContext
   */
  public function getAppType()
  {
    return $this->appType;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_AuctionContext
   */
  public function setAuctionType(Google_Service_AdExchangeBuyerII_AuctionContext $auctionType)
  {
    $this->auctionType = $auctionType;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_AuctionContext
   */
  public function getAuctionType()
  {
    return $this->auctionType;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_LocationContext
   */
  public function setLocation(Google_Service_AdExchangeBuyerII_LocationContext $location)
  {
    $this->location = $location;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_LocationContext
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_PlatformContext
   */
  public function setPlatform(Google_Service_AdExchangeBuyerII_PlatformContext $platform)
  {
    $this->platform = $platform;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_PlatformContext
   */
  public function getPlatform()
  {
    return $this->platform;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_SecurityContext
   */
  public function setSecurityType(Google_Service_AdExchangeBuyerII_SecurityContext $securityType)
  {
    $this->securityType = $securityType;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_SecurityContext
   */
  public function getSecurityType()
  {
    return $this->securityType;
  }
}
