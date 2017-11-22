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

class Google_Service_ShoppingContent_AccountTaxTaxRule extends Google_Model
{
  public $country;
  public $locationId;
  public $ratePercent;
  public $shippingTaxed;
  public $useGlobalRate;

  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  public function getLocationId()
  {
    return $this->locationId;
  }
  public function setRatePercent($ratePercent)
  {
    $this->ratePercent = $ratePercent;
  }
  public function getRatePercent()
  {
    return $this->ratePercent;
  }
  public function setShippingTaxed($shippingTaxed)
  {
    $this->shippingTaxed = $shippingTaxed;
  }
  public function getShippingTaxed()
  {
    return $this->shippingTaxed;
  }
  public function setUseGlobalRate($useGlobalRate)
  {
    $this->useGlobalRate = $useGlobalRate;
  }
  public function getUseGlobalRate()
  {
    return $this->useGlobalRate;
  }
}
