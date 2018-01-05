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

/**
 * The "billingInfo" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyerService = new Google_Service_AdExchangeBuyer(...);
 *   $billingInfo = $adexchangebuyerService->billingInfo;
 *  </code>
 */
class Google_Service_AdExchangeBuyer_Resource_BillingInfo extends Google_Service_Resource
{
  /**
   * Returns the billing information for one account specified by account ID.
   * (billingInfo.get)
   *
   * @param int $accountId The account id.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyer_BillingInfo
   */
  public function get($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdExchangeBuyer_BillingInfo");
  }
  /**
   * Retrieves a list of billing information for all accounts of the authenticated
   * user. (billingInfo.listBillingInfo)
   *
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdExchangeBuyer_BillingInfoList
   */
  public function listBillingInfo($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdExchangeBuyer_BillingInfoList");
  }
}
