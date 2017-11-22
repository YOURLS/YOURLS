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
 * The "payments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google_Service_AdSense(...);
 *   $payments = $adsenseService->payments;
 *  </code>
 */
class Google_Service_AdSense_Resource_AccountsPayments extends Google_Service_Resource
{
  /**
   * List the payments for the specified AdSense account.
   * (payments.listAccountsPayments)
   *
   * @param string $accountId Account for which to retrieve the payments.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdSense_Payments
   */
  public function listAccountsPayments($accountId, $optParams = array())
  {
    $params = array('accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdSense_Payments");
  }
}
