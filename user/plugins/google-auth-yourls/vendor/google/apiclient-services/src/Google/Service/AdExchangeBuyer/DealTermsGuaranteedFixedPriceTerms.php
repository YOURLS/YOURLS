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

class Google_Service_AdExchangeBuyer_DealTermsGuaranteedFixedPriceTerms extends Google_Collection
{
  protected $collection_key = 'fixedPrices';
  protected $billingInfoType = 'Google_Service_AdExchangeBuyer_DealTermsGuaranteedFixedPriceTermsBillingInfo';
  protected $billingInfoDataType = '';
  protected $fixedPricesType = 'Google_Service_AdExchangeBuyer_PricePerBuyer';
  protected $fixedPricesDataType = 'array';
  public $guaranteedImpressions;
  public $guaranteedLooks;
  public $minimumDailyLooks;

  /**
   * @param Google_Service_AdExchangeBuyer_DealTermsGuaranteedFixedPriceTermsBillingInfo
   */
  public function setBillingInfo(Google_Service_AdExchangeBuyer_DealTermsGuaranteedFixedPriceTermsBillingInfo $billingInfo)
  {
    $this->billingInfo = $billingInfo;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_DealTermsGuaranteedFixedPriceTermsBillingInfo
   */
  public function getBillingInfo()
  {
    return $this->billingInfo;
  }
  /**
   * @param Google_Service_AdExchangeBuyer_PricePerBuyer
   */
  public function setFixedPrices($fixedPrices)
  {
    $this->fixedPrices = $fixedPrices;
  }
  /**
   * @return Google_Service_AdExchangeBuyer_PricePerBuyer
   */
  public function getFixedPrices()
  {
    return $this->fixedPrices;
  }
  public function setGuaranteedImpressions($guaranteedImpressions)
  {
    $this->guaranteedImpressions = $guaranteedImpressions;
  }
  public function getGuaranteedImpressions()
  {
    return $this->guaranteedImpressions;
  }
  public function setGuaranteedLooks($guaranteedLooks)
  {
    $this->guaranteedLooks = $guaranteedLooks;
  }
  public function getGuaranteedLooks()
  {
    return $this->guaranteedLooks;
  }
  public function setMinimumDailyLooks($minimumDailyLooks)
  {
    $this->minimumDailyLooks = $minimumDailyLooks;
  }
  public function getMinimumDailyLooks()
  {
    return $this->minimumDailyLooks;
  }
}
