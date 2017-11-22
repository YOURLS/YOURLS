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

class Google_Service_Doubleclicksearch_ReportRequestReportScope extends Google_Model
{
  public $adGroupId;
  public $adId;
  public $advertiserId;
  public $agencyId;
  public $campaignId;
  public $engineAccountId;
  public $keywordId;

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
  public function setCampaignId($campaignId)
  {
    $this->campaignId = $campaignId;
  }
  public function getCampaignId()
  {
    return $this->campaignId;
  }
  public function setEngineAccountId($engineAccountId)
  {
    $this->engineAccountId = $engineAccountId;
  }
  public function getEngineAccountId()
  {
    return $this->engineAccountId;
  }
  public function setKeywordId($keywordId)
  {
    $this->keywordId = $keywordId;
  }
  public function getKeywordId()
  {
    return $this->keywordId;
  }
}
