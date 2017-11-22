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

class Google_Service_Cih_IncentivesData extends Google_Model
{
  public $campaignId;
  public $couponId;
  public $incentiveBatchId;
  public $incentiveId;

  public function setCampaignId($campaignId)
  {
    $this->campaignId = $campaignId;
  }
  public function getCampaignId()
  {
    return $this->campaignId;
  }
  public function setCouponId($couponId)
  {
    $this->couponId = $couponId;
  }
  public function getCouponId()
  {
    return $this->couponId;
  }
  public function setIncentiveBatchId($incentiveBatchId)
  {
    $this->incentiveBatchId = $incentiveBatchId;
  }
  public function getIncentiveBatchId()
  {
    return $this->incentiveBatchId;
  }
  public function setIncentiveId($incentiveId)
  {
    $this->incentiveId = $incentiveId;
  }
  public function getIncentiveId()
  {
    return $this->incentiveId;
  }
}
