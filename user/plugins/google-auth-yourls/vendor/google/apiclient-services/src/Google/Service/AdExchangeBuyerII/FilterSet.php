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

class Google_Service_AdExchangeBuyerII_FilterSet extends Google_Collection
{
  protected $collection_key = 'sellerNetworkIds';
  protected $absoluteDateRangeType = 'Google_Service_AdExchangeBuyerII_AbsoluteDateRange';
  protected $absoluteDateRangeDataType = '';
  public $creativeId;
  public $dealId;
  public $environment;
  public $format;
  public $name;
  public $platforms;
  protected $realtimeTimeRangeType = 'Google_Service_AdExchangeBuyerII_RealtimeTimeRange';
  protected $realtimeTimeRangeDataType = '';
  protected $relativeDateRangeType = 'Google_Service_AdExchangeBuyerII_RelativeDateRange';
  protected $relativeDateRangeDataType = '';
  public $sellerNetworkIds;
  public $timeSeriesGranularity;

  /**
   * @param Google_Service_AdExchangeBuyerII_AbsoluteDateRange
   */
  public function setAbsoluteDateRange(Google_Service_AdExchangeBuyerII_AbsoluteDateRange $absoluteDateRange)
  {
    $this->absoluteDateRange = $absoluteDateRange;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_AbsoluteDateRange
   */
  public function getAbsoluteDateRange()
  {
    return $this->absoluteDateRange;
  }
  public function setCreativeId($creativeId)
  {
    $this->creativeId = $creativeId;
  }
  public function getCreativeId()
  {
    return $this->creativeId;
  }
  public function setDealId($dealId)
  {
    $this->dealId = $dealId;
  }
  public function getDealId()
  {
    return $this->dealId;
  }
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  public function getEnvironment()
  {
    return $this->environment;
  }
  public function setFormat($format)
  {
    $this->format = $format;
  }
  public function getFormat()
  {
    return $this->format;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPlatforms($platforms)
  {
    $this->platforms = $platforms;
  }
  public function getPlatforms()
  {
    return $this->platforms;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_RealtimeTimeRange
   */
  public function setRealtimeTimeRange(Google_Service_AdExchangeBuyerII_RealtimeTimeRange $realtimeTimeRange)
  {
    $this->realtimeTimeRange = $realtimeTimeRange;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_RealtimeTimeRange
   */
  public function getRealtimeTimeRange()
  {
    return $this->realtimeTimeRange;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_RelativeDateRange
   */
  public function setRelativeDateRange(Google_Service_AdExchangeBuyerII_RelativeDateRange $relativeDateRange)
  {
    $this->relativeDateRange = $relativeDateRange;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_RelativeDateRange
   */
  public function getRelativeDateRange()
  {
    return $this->relativeDateRange;
  }
  public function setSellerNetworkIds($sellerNetworkIds)
  {
    $this->sellerNetworkIds = $sellerNetworkIds;
  }
  public function getSellerNetworkIds()
  {
    return $this->sellerNetworkIds;
  }
  public function setTimeSeriesGranularity($timeSeriesGranularity)
  {
    $this->timeSeriesGranularity = $timeSeriesGranularity;
  }
  public function getTimeSeriesGranularity()
  {
    return $this->timeSeriesGranularity;
  }
}
