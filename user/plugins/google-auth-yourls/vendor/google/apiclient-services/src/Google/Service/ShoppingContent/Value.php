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

class Google_Service_ShoppingContent_Value extends Google_Model
{
  public $carrierRateName;
  protected $flatRateType = 'Google_Service_ShoppingContent_Price';
  protected $flatRateDataType = '';
  public $noShipping;
  public $pricePercentage;
  public $subtableName;

  public function setCarrierRateName($carrierRateName)
  {
    $this->carrierRateName = $carrierRateName;
  }
  public function getCarrierRateName()
  {
    return $this->carrierRateName;
  }
  /**
   * @param Google_Service_ShoppingContent_Price
   */
  public function setFlatRate(Google_Service_ShoppingContent_Price $flatRate)
  {
    $this->flatRate = $flatRate;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
   */
  public function getFlatRate()
  {
    return $this->flatRate;
  }
  public function setNoShipping($noShipping)
  {
    $this->noShipping = $noShipping;
  }
  public function getNoShipping()
  {
    return $this->noShipping;
  }
  public function setPricePercentage($pricePercentage)
  {
    $this->pricePercentage = $pricePercentage;
  }
  public function getPricePercentage()
  {
    return $this->pricePercentage;
  }
  public function setSubtableName($subtableName)
  {
    $this->subtableName = $subtableName;
  }
  public function getSubtableName()
  {
    return $this->subtableName;
  }
}
