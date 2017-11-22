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

class Google_Service_AdExchangeBuyer_DealTermsRubiconNonGuaranteedTerms extends Google_Model
{
  protected $priorityPriceType = 'Google_Service_AdExchangeBuyer_Price';
  protected $priorityPriceDataType = '';
  protected $standardPriceType = 'Google_Service_AdExchangeBuyer_Price';
  protected $standardPriceDataType = '';

  /**
   * @param Google_Service_AdExchangeBuyer_Price
   */
  public function setPriorityPrice(Google_Service_AdExchangeBuyer_Price $priorityPrice)
  {
    $this->priorityPrice = $priorityPrice;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_Price
   */
  public function getPriorityPrice()
  {
    return $this->priorityPrice;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_Price
   */
  public function setStandardPrice(Google_Service_AdExchangeBuyer_Price $standardPrice)
  {
    $this->standardPrice = $standardPrice;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_Price
   */
  public function getStandardPrice()
  {
    return $this->standardPrice;
  }
}
