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

class Google_Service_AdExchangeBuyer_Account extends Google_Collection
{
  protected $collection_key = 'bidderLocation';
  protected $bidderLocationType = 'Google_Service_AdExchangeBuyer_AccountBidderLocation';
  protected $bidderLocationDataType = 'array';
  public $cookieMatchingNid;
  public $cookieMatchingUrl;
  public $id;
  public $kind;
  public $maximumActiveCreatives;
  public $maximumTotalQps;
  public $numberActiveCreatives;

  /**
   * @param Google_Service_AdExchangeBuyer_AccountBidderLocation
   */
  public function setBidderLocation($bidderLocation)
  {
    $this->bidderLocation = $bidderLocation;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_AccountBidderLocation
   */
  public function getBidderLocation()
  {
    return $this->bidderLocation;
  }
  public function setCookieMatchingNid($cookieMatchingNid)
  {
    $this->cookieMatchingNid = $cookieMatchingNid;
  }
  public function getCookieMatchingNid()
  {
    return $this->cookieMatchingNid;
  }
  public function setCookieMatchingUrl($cookieMatchingUrl)
  {
    $this->cookieMatchingUrl = $cookieMatchingUrl;
  }
  public function getCookieMatchingUrl()
  {
    return $this->cookieMatchingUrl;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMaximumActiveCreatives($maximumActiveCreatives)
  {
    $this->maximumActiveCreatives = $maximumActiveCreatives;
  }
  public function getMaximumActiveCreatives()
  {
    return $this->maximumActiveCreatives;
  }
  public function setMaximumTotalQps($maximumTotalQps)
  {
    $this->maximumTotalQps = $maximumTotalQps;
  }
  public function getMaximumTotalQps()
  {
    return $this->maximumTotalQps;
  }
  public function setNumberActiveCreatives($numberActiveCreatives)
  {
    $this->numberActiveCreatives = $numberActiveCreatives;
  }
  public function getNumberActiveCreatives()
  {
    return $this->numberActiveCreatives;
  }
}
