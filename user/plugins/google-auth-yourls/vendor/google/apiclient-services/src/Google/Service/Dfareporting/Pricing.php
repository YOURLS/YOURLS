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

class Google_Service_Dfareporting_Pricing extends Google_Collection
{
  protected $collection_key = 'flights';
  public $capCostType;
  public $endDate;
  protected $flightsType = 'Google_Service_Dfareporting_Flight';
  protected $flightsDataType = 'array';
  public $groupType;
  public $pricingType;
  public $startDate;

  public function setCapCostType($capCostType)
  {
    $this->capCostType = $capCostType;
  }
  public function getCapCostType()
  {
    return $this->capCostType;
  }
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param Google_Service_Dfareporting_Flight
   */
  public function setFlights($flights)
  {
    $this->flights = $flights;
  }
  /**
   * @return Google_Service_Dfareporting_Flight
   */
  public function getFlights()
  {
    return $this->flights;
  }
  public function setGroupType($groupType)
  {
    $this->groupType = $groupType;
  }
  public function getGroupType()
  {
    return $this->groupType;
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
}
