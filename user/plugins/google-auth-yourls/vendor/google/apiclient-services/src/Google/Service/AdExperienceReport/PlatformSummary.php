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

class Google_Service_AdExperienceReport_PlatformSummary extends Google_Collection
{
  protected $collection_key = 'region';
  public $betterAdsStatus;
  public $enforcementTime;
  public $filterStatus;
  public $lastChangeTime;
  public $region;
  public $reportUrl;
  public $underReview;

  public function setBetterAdsStatus($betterAdsStatus)
  {
    $this->betterAdsStatus = $betterAdsStatus;
  }
  public function getBetterAdsStatus()
  {
    return $this->betterAdsStatus;
  }
  public function setEnforcementTime($enforcementTime)
  {
    $this->enforcementTime = $enforcementTime;
  }
  public function getEnforcementTime()
  {
    return $this->enforcementTime;
  }
  public function setFilterStatus($filterStatus)
  {
    $this->filterStatus = $filterStatus;
  }
  public function getFilterStatus()
  {
    return $this->filterStatus;
  }
  public function setLastChangeTime($lastChangeTime)
  {
    $this->lastChangeTime = $lastChangeTime;
  }
  public function getLastChangeTime()
  {
    return $this->lastChangeTime;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setReportUrl($reportUrl)
  {
    $this->reportUrl = $reportUrl;
  }
  public function getReportUrl()
  {
    return $this->reportUrl;
  }
  public function setUnderReview($underReview)
  {
    $this->underReview = $underReview;
  }
  public function getUnderReview()
  {
    return $this->underReview;
  }
}
