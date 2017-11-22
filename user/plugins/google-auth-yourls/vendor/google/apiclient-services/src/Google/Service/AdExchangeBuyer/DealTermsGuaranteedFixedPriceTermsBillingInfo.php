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

class Google_Service_AdExchangeBuyer_DealTermsGuaranteedFixedPriceTermsBillingInfo extends Google_Model
{
  public $currencyConversionTimeMs;
  public $dfpLineItemId;
  public $originalContractedQuantity;
  protected $priceType = 'Google_Service_AdExchangeBuyer_Price';
  protected $priceDataType = '';

  public function setCurrencyConversionTimeMs($currencyConversionTimeMs)
  {
    $this->currencyConversionTimeMs = $currencyConversionTimeMs;
  }
  public function getCurrencyConversionTimeMs()
  {
    return $this->currencyConversionTimeMs;
  }
  public function setDfpLineItemId($dfpLineItemId)
  {
    $this->dfpLineItemId = $dfpLineItemId;
  }
  public function getDfpLineItemId()
  {
    return $this->dfpLineItemId;
  }
  public function setOriginalContractedQuantity($originalContractedQuantity)
  {
    $this->originalContractedQuantity = $originalContractedQuantity;
  }
  public function getOriginalContractedQuantity()
  {
    return $this->originalContractedQuantity;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_Price
   */
  public function setPrice(Google_Service_AdExchangeBuyer_Price $price)
  {
    $this->price = $price;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_Price
   */
  public function getPrice()
  {
    return $this->price;
  }
}
