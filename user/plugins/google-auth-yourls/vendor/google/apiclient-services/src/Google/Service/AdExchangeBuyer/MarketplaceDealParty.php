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

class Google_Service_AdExchangeBuyer_MarketplaceDealParty extends Google_Model
{
  protected $buyerType = 'Google_Service_AdExchangeBuyer_Buyer';
  protected $buyerDataType = '';
  protected $sellerType = 'Google_Service_AdExchangeBuyer_Seller';
  protected $sellerDataType = '';

  /**
   * @param Google_Service_AdExchangeBuyer_Buyer
   */
  public function setBuyer(Google_Service_AdExchangeBuyer_Buyer $buyer)
  {
    $this->buyer = $buyer;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_Buyer
   */
  public function getBuyer()
  {
    return $this->buyer;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_Seller
   */
  public function setSeller(Google_Service_AdExchangeBuyer_Seller $seller)
  {
    $this->seller = $seller;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_Seller
   */
  public function getSeller()
  {
    return $this->seller;
  }
}
