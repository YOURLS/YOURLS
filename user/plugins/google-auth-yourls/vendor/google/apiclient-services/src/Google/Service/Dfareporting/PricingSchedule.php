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

class Google_Service_Dfareporting_PricingSchedule extends Google_Collection
{
  protected $collection_key = 'pricingPeriods';
  public $capCostOption;
  public $disregardOverdelivery;
  public $endDate;
  public $flighted;
  public $floodlightActivityId;
  protected $pricingPeriodsType = 'Google_Service_Dfareporting_PricingSchedulePricingPeriod';
  protected $pricingPeriodsDataType = 'array';
  public $pricingType;
  public $startDate;
  public $testingStartDate;

  public function setCapCostOption($capCostOption)
  {
    $this->capCostOption = $capCostOption;
  }
  public function getCapCostOption()
  {
    return $this->capCostOption;
  }
  public function setDisregardOverdelivery($disregardOverdelivery)
  {
    $this->disregardOverdelivery = $disregardOverdelivery;
  }
  public function getDisregardOverdelivery()
  {
    return $this->disregardOverdelivery;
  }
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  public function getEndDate()
  {
    return $this->endDate;
  }
  public function setFlighted($flighted)
  {
    $this->flighted = $flighted;
  }
  public function getFlighted()
  {
    return $this->flighted;
  }
  public function setFloodlightActivityId($floodlightActivityId)
  {
    $this->floodlightActivityId = $floodlightActivityId;
  }
  public function getFloodlightActivityId()
  {
    return $this->floodlightActivityId;
  }
  /**
   * @param Google_Service_Dfareporting_PricingSchedulePricingPeriod
   */
  public function setPricingPeriods($pricingPeriods)
  {
    $this->pricingPeriods = $pricingPeriods;
  }
  /**
   * @return Google_Service_Dfareporting_PricingSchedulePricingPeriod
   */
  public function getPricingPeriods()
  {
    return $this->pricingPeriods;
  }
  public function setPricingType($pricingType)
  {
    $this->pricingType = $pricingType;
  }
  public function getPricingType()
  {
    return $this->pricingType;
  }
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  public function getStartDate()
  {
    return $this->startDate;
  }
  public function setTestingStartDate($testingStartDate)
  {
    $this->testingStartDate = $testingStartDate;
  }
  public function getTestingStartDate()
  {
    return $this->testingStartDate;
  }
}
